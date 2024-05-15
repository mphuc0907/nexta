<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

define('DISALLOW_FILE_MODS', true);
session_start();
function returnajax($rs)
{
    echo json_encode($rs);
    die();
}
function getIdPage($name)
{
    // Lấy dữ liệu data
    $pages_data = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/' . $name . '.php'
    ));
    $id_dv = $pages_data[0]->ID;
    return $id_dv;
}
function getMethod($status){
    $text = "<strong class='stt stt-2'>Thanh toán khi nhận hàng</strong>";
    if($status == 1){
        $text = "<strong class='stt stt-1'>Thanh toán chuyển khoản</strong>";
    }
    return $text;
}
function getLastOrderNumberFromDatabase(){
    global $wpdb;
    $order = $wpdb->get_row("SELECT * FROM tt_orders ORDER BY id DESC");
    $dem = 1;
    if(!empty($order)){
        $dem = (int)$order->id+1;
    }
    return $dem;
}
function getStatusPayment($status){
    $trang_thai = [
        1 => 'Chưa thanh toán',
        2 => 'Đã thanh toán',
        4 => 'Đang xử lý',
        3 => 'Đã hủy'
    ];
    $text = '';
    for($i = 1; $i <= count($trang_thai); $i++) {
        if($status == $i) {
            $text .= "<option selected value='". $i ."'>". $trang_thai[$i] ."</option>";
        } else {
            $text .= "<option value='". $i ."'>". $trang_thai[$i] ."</option>";
        }
    }
    return $text;
}
add_action('wp_ajax_oderProduct', 'oderProduct');
add_action('wp_ajax_nopriv_oderProduct', 'oderProduct');
function oderProduct() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    global $wpdb;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $address = $_POST['address'];
//    $city = $_POST['city'];
    $methodPay = $_POST['methodPay'];
    $dataProduct = $_POST['dataProduct'];
    $dataBuyNow = $_POST['dataBuyNow'];
    if($dataBuyNow != "null"){
        $dataSave = $dataBuyNow;
    }else{
        $dataSave = $dataProduct;
    }

    $ip_user = $_POST['ip_user'];
    $ip_user = str_replace('+', "", $ip_user);
    $price = $_POST['money'];
    $pricetotal = $_POST['moneytotal'];
    $code_voucher = $_POST['voucher_code_2'];
    $voucher_id = $_POST['voucher_id'];
    $discount_amount = $_POST['discount_amount'];
  
    $discount_price = 0;
    $voucher = 0;
    $transport_fee = 0;

    $status = 1; // Trạng thái thanh toán, 1: Chưa thanh toán, 2: Đã thanh toán, 3: Hủy
    $status_transport = 1;
    // Thời gian đặt hàng
    $time_order = time();

    if (empty($_POST['dataProduct'])) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
    $order_code = "";
    $delivery_information = json_encode($address,JSON_UNESCAPED_UNICODE);
    $current_order_number = getLastOrderNumberFromDatabase(); // Hàm này trả về số đơn hàng mới nhất
    if (!empty($code)) {
        $order_code = $code;
    }else {
        $order_code = "NEX" . str_pad($current_order_number, 7, "0", STR_PAD_LEFT);

    }
    $status = 1;
    $fullname = $surname . " " . $name;
    $price_payment = $price;
    $_SESSION['code'] = $order_code;
    $_SESSION['date'] = $time_order;
    $_SESSION['price'] = $price_payment;
    $_SESSION['status'] = $methodPay;
//    $_SESSION('js_var_value', $order_code, 0, '/');
    $queryStr = "insert into tt_orders(`id_user`,`order_code`,`delivery_information`,`price`,`transport_fee`,`code_voucher`,`discount_price`,`price_payment`,`payment_method`,`status`,`status_transport`,`time_order`,`fullname`,`phone`,`emailaddress`,`country`,`dataproduct`)
                             values('".$ip_user."','".$order_code."','".$delivery_information."','".$pricetotal."','".$transport_fee."','".$code_voucher."','".$discount_amount."','".$price_payment."','".$methodPay."','".$status."','".$status_transport."','".$time_order."','".$fullname."','".$phone."','".$email."','','".$dataSave."')";
    // giảm số lượng voucher đi 1
    $queryUpdate = "UPDATE voucher SET 	number_of_vouchers = number_of_vouchers - 1 WHERE id = '{$voucher_id}'";
    $wpdb->query($queryUpdate);
    $wpdb->query($queryStr);

    $new_id = $wpdb->insert_id;
    // End Lưu bảng orders

    // Lưu bảng detail
    $proorder = $wpdb->get_results("SELECT * FROM tt_orders WHERE order_code = '{$order_code}' ORDER BY id DESC");

    $datapros = $proorder[0];


    $delivery_information = json_decode($datapros->dataproduct);
   
//gửi mail
    $table = '<table style="width: 1000px;
    border: solid 1px;
    text-align: center;
    border-collapse: collapse;">
                        <thead style="    background: #e5c9c9;">
                        <th>#</th>
                        <th> Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                       
</thead>
<tbody>';
    foreach ($delivery_information as $key => $value):
        $title = get_the_title($value->id);
        $total = $value->price * $value->qty;
        $table.= '
               <tr>
               <td style="border: solid 1px;">'.($key + 1 ).'</td>
               <td style="border: solid 1px;">'.$title.'</td>
               <td style="border: solid 1px;">'.$value->qty.'</td>
               <td style="border: solid 1px;">'. $value->price.'</td>
               <td style="border: solid 1px;">'. $total.'</td>
             
</tr>    

                ';
    endforeach;
    $table.= '</tbody>';
    if ($methodPay == 1) {
        $payme = 'Thanh toán chuyển khoản';
    }elseif($methodPay == 2) {
        $payme = 'Thanh toán sau';
    }


        // Gửi mail đến khách hàng
        $time_pay = date('d/m/Y', $time_order);

        $headers[] = "Content-type:text/html;charset=utf-8" . "\r\n";
        $body = get_field('config_order', 'option');
        $body = str_replace('__fullname__', $fullname, $body);
        $body = str_replace('__address__', $address, $body);
        $body = str_replace('__phonenumber__', $phone, $body);
        $body = str_replace('__email__', $email, $body);
//        $body = str_replace('__cty__', $city, $body);
        $body = str_replace('__html__', $table, $body);
        $body = str_replace('__codeoders__', $order_code, $body);
        $body = str_replace('__timeorder__', $time_pay, $body);
        $body = str_replace('__methodpay__', $payme, $body);
        wp_mail($email, 'Nexta - Order', $body, $headers);;
        // Gửi mail đến admin
        $admin_email = get_field('config_order_admin_email', 'option');

        $tables = '<table style="width: 1000px;
    border: solid 1px;
    text-align: center;
    border-collapse: collapse;">
                        <thead style="background: #e5c9c9;">
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                       
</thead>
<tbody>';
        foreach ($delivery_information as $key => $value):
            $title = get_the_title($value->id);
            $total = $value->price * $value->qty;
            $tables.= '
               <tr>
               <td style="border: solid 1px;">'.($key + 1 ).'</td>
               <td style="border: solid 1px;">'.$title.'</td>
               <td style="border: solid 1px;">'.$value->qty.'</td>
               <td style="border: solid 1px;">'. $value->price.'</td>
               <td style="border: solid 1px;">'. $total.'</td>
             
</tr>    

                ';
        endforeach;
        $tables.= '</tbody>';
        $body = get_field('config_order', 'option');
        $body = str_replace('__fullname__', $fullname, $body);
        $body = str_replace('__address__', $address, $body);
        $body = str_replace('__phonenumber__', $phone, $body);
        $body = str_replace('__html__', $tables, $body);
        $body = str_replace('__email__', $email, $body);

        $body = str_replace('__codeoders__', $order_code, $body);
        $body = str_replace('__timeorder__', $time_pay, $body);
        $body = str_replace('__methodpay__', $payme, $body);
//        $body = str_replace('__order__', '<p style="font-weight: bold; font-size: 20px;">Test</p>', $body);


        wp_mail($admin_email, 'Nexta - Thông tin đặt hàng của khách hàng', $body, $headers);

        //CRM Biz
    $mictorime = time() * 1000;
    $array_body = [
        'table' => 'data_customer',   //data_customer = khách hàng || data_activity = hành động
        'mappingBy' => ['emails', 'phones'],   //sẽ mapping theo emails hoặc phones, tùy thuộc vào trường mapping,
        'data' => [
            [
                'fields' => [
                    ['key' => 'emails', 'value' => [
                        ['value' => '' . $email . '']//CUSTOMER EMAILS
                    ]],
                    ['key' => 'phones', 'value' => [
                        ['value' => '' . $phone . '']//CUSTOMER EMAILS
                    ]],
                    ['key' => 'name',
                        'value' => '' . $fullname . ''],
                    ['key' => 'dia_chi_chi_tiet',
                        'value' => '' . $address . ''],
//                    ['key' => 'tinh_thanh_sinh_song', 'value' => [
//                        ['province' => '' . $city . '']//CUSTOMER EMAILS
//                    ]],
                    ['key' => 'source',
                        'value' => [
                            //Cái source này vô cùng quan trọng , dùng để phân loại nguồn khách
                            [
                                'value' => [['value' => 'NGUỒN WEBSITE']],//ví dụ: Đăng ký từ website | Đăng ký từ facebook | Mua hàng qua app...
                                'thoi_gian' => $mictorime,
                                'ghi_chu' => ''// mô tả thêm nếu thấy cần thiết
                            ],
                        ]],
                    [
                        'key' => 'tags',//Đánh tags phân loại dữ liệu nếu thấy cần thiết
                        'value' => [
                            ['value' => 'website nexta.vn']
                        ]
                    ],
                    [
                        'key' => 'created_at',//Nếu bạn bỏ qua trường này thì sẽ tự động theo time hệ thống của bên crm bizfly
                        'value' => $mictorime
                    ],
                    ///.... Và có thể nhiều key khác nếu bạn muốn, có thể xem chi tiết các key trên crm.bizfly.vn (vào menu Khách hàng -> Thông tin về các trường)
                ],
                "activity" => [
                    //activity là cần thiết nếu có hành động tương ứng không có thể bỏ qua
                    "activity_id" => "activity_xxx",
                    "object_name" => "Đăng ký form tư vấn ngà $mictorime",
                    "object_type" => "customer",
                    "object_type_label" => "Khách hàng",
                    "action" => "dang-ky-form",
                    "action_label" => "Đăng ký form",
                    "object_tag" => [
                        ["key" => "link", "value" => "https://link-form-popup.com/form"],
                    ]
                ],
            ]
        ]
    ];


    $API_URL = "https://crm.bizfly.vn/_api/base-table/update";
    $API_KEY = "w6SCy6GSc8f30277ca0f4c80f1fbc2c6521b1a55rtj3PmlS";
    $API_SECRET = "80752abfff47460b9fc0ac5930f837654beff8c2";
    $API_EMBED_KEY = "a7e577c4ca27c7885cc52a2642951477";
    $PROJECT_TOKEN = "27715267-6193-4dc3-aa41-ddfe4fdd5a8e";
    $TIME_NOW = time();

//Băm token
    $SIGN = hash_hmac('sha512', $TIME_NOW . $PROJECT_TOKEN, $API_SECRET);


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($array_body),
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "cb-access-key: $API_KEY",
            "cb-access-sign: $SIGN",
            "cb-access-timestamp: $TIME_NOW",
            "cb-project-token: $PROJECT_TOKEN",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
        exit();
    }

    //kết thúc

    $rs['status'] = 'success_code';

    $rs['urlreturn'] = 'https://nexta.vn/hoan-thanh-don-hang';

    $rs['codeOder'] = $order_code;

    $rs['price'] = $price_payment;

    $rs['mess'] = "Đặt hàng thành công";

    returnajax($rs);

}
function xss($input)
{
    $input = str_replace('=', '', $input);
    $input = str_replace(';', '', $input);
    $input = str_replace(':', '', $input);
    $input = str_replace('[', '', $input);
    $input = str_replace(']', '', $input);
    $input = str_replace('?', '', $input);
    $input = str_replace('AND', '', $input);
    $input = str_replace('OR ', '', $input);
//    $input = str_replace('&', '', $input);
    $input = str_replace('\'', '', $input);
    $input = str_replace('"', '', $input);
    $input = str_replace('`', '', $input);
    $input = str_replace("'", '', $input);
    $input = str_replace('%', '', $input);
    $input = str_replace('<', '', $input);
    $input = str_replace('>', '', $input);
    $input = str_replace('*', '', $input);
    $input = str_replace('+', '', $input);
    $input = str_replace('#', '', $input);
    $input = str_replace(')', '', $input);
    $input = str_replace('(', '', $input);
    $input = str_replace('\\', '', $input);
    $input = str_replace('\/', '', $input);
//    $input = str_replace('-', '', $input);
    $input = str_replace('SHUTDOWN', '', $input);
    $input = str_replace('DROP', '', $input);
    $input = preg_replace("/[`]/", '', $input);
    $input = addslashes($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);

    return $input;
}
function no_sql_injection($input)
{
    $arr = array("from", "select", "insert", "insert", "delete", "where", "drop", "drop table", "show tables", "*", "=", "update");
    $sql = str_replace($arr, "", $input);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}
// Thay đổi trạng thái đơn hàng
add_action('wp_ajax_nopriv_changeTransportStatus', 'changeTransportStatus');
add_action('wp_ajax_changeTransportStatus', 'changeTransportStatus');

function changeTransportStatus() {
    global $wpdb;
    if(!isset($_POST['status']) || !isset($_POST['orderId'])) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
    $status = no_sql_injection(xss($_POST['status']));
    $orderId = no_sql_injection(xss($_POST['orderId']));
    if($status < 1 || $status > 5) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
    $getOrder = $wpdb->get_row("SELECT * FROM tt_orders WHERE id = {$orderId}");
    if(empty($getOrder)) {
        $rs['status'] = error_code;
        $rs['mess'] = "Không tìm thấy đơn hàng. Mời kiểm tra và thử lại.";
        returnajax($rs);
    }
    $wpdb->update(
        'tt_orders',
        array('status_transport' => $status),
        array('id' => $orderId)
    );
    // Cap nhat vao thong bao
    $tieu_de = '';
    $noi_dung = '';
//    $link = site_url() . '/chi-tiet-don-hang/?token=' . $getOrder->id;
    if($status == 2) {
        $tieu_de = 'Đã xác nhận đơn hàng';
        $noi_dung = 'Đơn hàng <strong>'. $getOrder->order_code .'</strong> đã được xác nhận.';
    } elseif ($status == 3) {
        $tieu_de = 'Đang vận chuyển';
        $noi_dung = 'Đơn hàng <strong>'. $getOrder->order_code .'</strong> đang trên đường vận chuyển đến bạn.';
    } elseif ($status == 4) {
        $tieu_de = 'Đơn hàng giao thành công';
        $noi_dung = 'Đơn hàng <strong>'. $getOrder->order_code .'</strong> đã giao thành công đến bạn.';
    } elseif ($status == 5) {
        $tieu_de = 'Đơn hàng đã bị hủy';
        $noi_dung = 'Đơn hàng <strong>'. $getOrder->order_code .'</strong> đã bị hủy.';
    }
    $wpdb->insert(
        'notification_',
        array(
            'user_id' => $getOrder->id_user,
            'order_id' => $getOrder->id,
            'tieu_de' => $tieu_de,
            'noi_dung' => $noi_dung,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        )
    );
    $rs['status'] = 'success_code';
    $rs['mess'] = "Cập nhật trạng thái thành công!";
    returnajax($rs);
}

// Thay đổi trạng thái thanh toan
add_action('wp_ajax_nopriv_changePaymentStatus', 'changePaymentStatus');
add_action('wp_ajax_changePaymentStatus', 'changePaymentStatus');

function changePaymentStatus() {
    global $wpdb;
    if(!isset($_POST['status']) || !isset($_POST['orderId'])) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
    $status = no_sql_injection(xss($_POST['status']));
    $orderId = no_sql_injection(xss($_POST['orderId']));
    if($status < 1 || $status > 4) {
        $rs['status'] = error_code;
        $rs['mess'] = messerror . " Lỗi Validate";
        returnajax($rs);
    }
    $getOrder = $wpdb->get_row("SELECT * FROM tt_orders WHERE id = {$orderId}");
    if(empty($getOrder)) {
        $rs['status'] = error_code;
        $rs['mess'] = "Không tìm thấy đơn hàng. Mời kiểm tra và thử lại.";
        returnajax($rs);
    }
    $wpdb->update(
        'tt_orders',
        array('status' => $status),
        array('id' => $orderId)
    );
    $rs['status'] = 'success_code';
    $rs['mess'] = "Cập nhật trạng thái thành công!";
    returnajax($rs);
}

function my_enqueue($hook) {
    // Only add to the edit.php admin page.
    // See WP docs.
//    if ('edit.php' !== $hook) {
//        return;
//    }
    wp_enqueue_script('my_custom_script_0', get_template_directory_uri().'/ajax/js/sweetalert2.js');
//    wp_enqueue_script('my_custom_script_2', 'https://www.google.com/recaptcha/api.js?render='. get_field("setting_captcha","option")["site_key"]);
    wp_enqueue_script('my_custom_script_1', get_template_directory_uri().'/ajax/js/script-admin.js');
    wp_register_style('my_custom_style', get_template_directory_uri().'/ajax/css/main-admin.css');
    wp_enqueue_style( 'my_custom_style' );
}

add_action('admin_enqueue_scripts', 'my_enqueue');


add_action('wp_ajax_CrmForm', 'CrmForm');
add_action('wp_ajax_nopriv_CrmForm', 'CrmForm');

function CrmForm() {

    $name = $_POST['namehome'];
    $phone = $_POST['phonehome'];
    $email = $_POST['emailhome'];
    $content = $_POST['contenthome'];
    $mictorime = time() * 1000;
    $array_body = [
        'table' => 'data_customer',   //data_customer = khách hàng || data_activity = hành động
        'mappingBy' => ['emails', 'phones'],   //sẽ mapping theo emails hoặc phones, tùy thuộc vào trường mapping,
        'data' => [
            [
                'fields' => [
                    ['key' => 'emails', 'value' => [
                        ['value' => '' . $email . '']//CUSTOMER EMAILS
                    ]],
                    ['key' => 'phones', 'value' => [
                        ['value' => '' . $phone . '']//CUSTOMER EMAILS
                    ]],
                    ['key' => 'mo_ta_khach_hang', 'value' => '' . $content . ''//CUSTOMER EMAILS
                    ],
                    ['key' => 'name',
                        'value' => '' . $name . ''],
                    ['key' => 'source',
                        'value' => [
                            //Cái source này vô cùng quan trọng , dùng để phân loại nguồn khách
                            [
                                'value' => [['value' => 'NGUỒN WEBSITE']],//ví dụ: Đăng ký từ website | Đăng ký từ facebook | Mua hàng qua app...
                                'thoi_gian' => $mictorime,
                                'ghi_chu' => ''// mô tả thêm nếu thấy cần thiết
                            ],
                        ]],
                    [
                        'key' => 'tags',//Đánh tags phân loại dữ liệu nếu thấy cần thiết
                        'value' => [
                            ['value' => 'website nexta.vn']
                        ]
                    ],
                    [
                        'key' => 'created_at',//Nếu bạn bỏ qua trường này thì sẽ tự động theo time hệ thống của bên crm bizfly
                        'value' => $mictorime
                    ],
                    ///.... Và có thể nhiều key khác nếu bạn muốn, có thể xem chi tiết các key trên crm.bizfly.vn (vào menu Khách hàng -> Thông tin về các trường)
                ],
                "activity" => [
                    //activity là cần thiết nếu có hành động tương ứng không có thể bỏ qua
                    "activity_id" => "activity_xxx",
                    "object_name" => "Đăng ký form tư vấn ngà $mictorime",
                    "object_type" => "customer",
                    "object_type_label" => "Khách hàng",
                    "action" => "dang-ky-form",
                    "action_label" => "Đăng ký form",
                    "object_tag" => [
                        ["key" => "link", "value" => "https://link-form-popup.com/form"],
                    ]
                ],
            ]
        ]
    ];


    $API_URL = "https://crm.bizfly.vn/_api/base-table/update";
    $API_KEY = "w6SCy6GSc8f30277ca0f4c80f1fbc2c6521b1a55rtj3PmlS";
    $API_SECRET = "80752abfff47460b9fc0ac5930f837654beff8c2";
    $API_EMBED_KEY = "a7e577c4ca27c7885cc52a2642951477";
    $PROJECT_TOKEN = "27715267-6193-4dc3-aa41-ddfe4fdd5a8e";
    $TIME_NOW = time();

//Băm token
    $SIGN = hash_hmac('sha512', $TIME_NOW . $PROJECT_TOKEN, $API_SECRET);


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($array_body),
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "cb-access-key: $API_KEY",
            "cb-access-sign: $SIGN",
            "cb-access-timestamp: $TIME_NOW",
            "cb-project-token: $PROJECT_TOKEN",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
        exit();
    }
}
add_action('wp_ajax_contact_secren', 'contact_secren');
add_action('wp_ajax_nopriv_contact_secren', 'contact_secren');
function contact_secren()
{
    $action_2 = $_POST['action_2'];
    if ($action_2 == 'send_mail_event') {
        $data = $_POST;
        $to_admin = get_field('config_order_admin_email', 'option');
        $subject = 'Đăng ký tham gia sự kiện' . $data['name_event'];
        $message = 'Tên: ' . $data['name'] . '<br>Email: ' . $data['email'] . '<br>Số điện thoại: ' . $data['phone'] . '<br>Địa chỉ: ' . $data['address'] . '<br>Ghi chú: ' . $data['note'] . '<br>' . 'Sự kiện: ' . $data['name_event'];
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $customer_message = 'Chúng tôi đã nhận được thông tin đăng ký của bạn. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn đã quan tâm đến sự kiện của chúng tôi.';
        if (wp_mail($to_admin, $subject, $message, $headers) && wp_mail($data['email'], $subject, $customer_message, $headers)) {
            returnajax(['status' => 1, 'message' => 'Đăng ký thành công']);
        } else {
            returnajax(['status' => 0, 'message' => 'Đăng ký thất bại']);
        }
    } else {
        $data = $_POST;
        $to_admin = get_field('config_order_admin_email', 'option');
        $subject = 'Đăng ký trải nghiệm 7 ngày';
        $message = 'Tên: ' . $data['name'] . '<br>Email: ' . $data['email'] . '<br>Số điện thoại: ' . $data['phone'] . '<br>Địa chỉ: ' . $data['address'] . '<br>Ghi chú: ' . $data['note'] . '<br>';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $customer_message = 'Chúng tôi đã nhận được thông tin đăng ký của bạn. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn đã quan tâm đến dịch vụ của chúng tôi.';
        if (wp_mail($to_admin, $subject, $message, $headers) && wp_mail($data['email'], $subject, $customer_message, $headers)) {
            returnajax(['status' => 1, 'message' => 'Cảm ơn bạn đã liên hệ']);
        } else {
            returnajax(['status' => 0, 'message' => 'Vui lòng thử lại']);
        }
    }
}


?>