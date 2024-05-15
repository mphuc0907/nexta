<?php
define('DISALLOW_FILE_MODS', true);

function getimage($id, $size = 'large', $true = '')
{

    if ($true == 'post') {
        if (get_the_post_thumbnail($id) != null) {
            return get_the_post_thumbnail_url($id, $size);
        }
    } else {
        $attachment_url = wp_get_attachment_image_url($id, $size);
        if ($attachment_url) {
            return $attachment_url;
        }
    }
    return get_field('image_no_image', 'option');
}

function getimage2($id, $size = 'large', $true = '')
{

    if ($true == 'post') {
        if (get_the_post_thumbnail($id) != null) {
            return get_the_post_thumbnail_url($id, $size);
        }
    } else {
        $attachment_url = wp_get_attachment_image_url($id, $size);
        if ($attachment_url) {
            return $attachment_url;
        }
    }
    return get_field('image_no_image', 'option');
}

if (function_exists('acf_add_options_page')) {
    // add parent
    $parent = acf_add_options_page(array(
        'page_title' => 'Cấu hình chung',
        'menu_title' => 'Cấu hình chung',
        'redirect' => false
    ));
}

show_admin_bar(false);
// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '6.4.3') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');
// menu
function menu_header()
{
    $url = get_template_directory_uri();
    // $arr = wp_get_nav_menu_items('menu-1');
    //                print_r($arr);die();
    $arr = wp_get_nav_menu_items('Menu header');
    $menu1 = [];
    foreach ($arr as $key => $ar) {
        if ($ar->menu_item_parent == 0) {
            $menu1[$key]['ID'] = $ar->ID;
            $menu1[$key]['title'] = $ar->title;
            $menu1[$key]['url'] = $ar->url;
            $menu1[$key]['menu_item_parent'] = $ar->menu_item_parent;
            $menu1[$key]['classes'] = $ar->classes;
            $menu1[$key]['description'] = $ar->description;
            $class = $ar->classes;
            $menu1[$key]['classes'] = $class[0];
            $menusub = [];

            $i_sub = 0;
            foreach ($arr as $key_sub => $ar_sub) {
                if ($ar->ID == $ar_sub->menu_item_parent) {
                    $menusub[$i_sub]['ID'] = $ar_sub->ID;
                    $menusub[$i_sub]['title'] = $ar_sub->title;
                    $menusub[$i_sub]['url'] = $ar_sub->url;
                    $menusub[$i_sub]['menu_item_parent'] = $ar_sub->menu_item_parent;
                    $menusub[$i_sub]['description'] = $ar_sub->description;

                    $menusub_2 = [];
                    $i_sub2 = 0;
                    foreach ($arr as $key_sub2 => $ar_sub2) {
                        if ($ar_sub->ID == $ar_sub2->menu_item_parent) {
                            $menusub_2[$i_sub2]['ID'] = $ar_sub2->ID;
                            $menusub_2[$i_sub2]['title'] = $ar_sub2->title;
                            $menusub_2[$i_sub2]['url'] = $ar_sub2->url;
                            $menusub_2[$i_sub2]['menu_item_parent'] = $ar_sub2->menu_item_parent;
                            $menusub_2[$i_sub2]['description'] = $ar_sub2->description;

                            $menusub_3 = [];
                            $i_sub3 = 0;
                            foreach ($arr as $key_sub3 => $ar_sub3) {
                                if ($ar_sub2->ID == $ar_sub3->menu_item_parent) {
                                    $menusub_3[$i_sub3]['ID'] = $ar_sub3->ID;
                                    $menusub_3[$i_sub3]['title'] = $ar_sub3->title;
                                    $menusub_3[$i_sub3]['url'] = $ar_sub3->url;
                                    $menusub_3[$i_sub3]['menu_item_parent'] = $ar_sub3->menu_item_parent;
                                    $menusub_3[$i_sub3]['description'] = $ar_sub3->description;

                                    $menusub_4 = [];
                                    $i_sub4 = 0;
                                    foreach ($arr as $key_sub4 => $ar_sub4) {
                                        if ($ar_sub3->ID == $ar_sub4->menu_item_parent) {
                                            $menusub_4[$i_sub4]['ID'] = $ar_sub4->ID;
                                            $menusub_4[$i_sub4]['title'] = $ar_sub4->title;
                                            $menusub_4[$i_sub4]['url'] = $ar_sub4->url;
                                            $menusub_4[$i_sub4]['menu_item_parent'] = $ar_sub4->menu_item_parent;
                                            $menusub_4[$i_sub4]['description'] = $ar_sub4->description;
                                            $i_sub4++;
                                        }
                                    }
                                    $menusub_3[$i_sub3]['menusub_4'] = $menusub_4;
                                    $i_sub3++;
                                }
                            }
                            $menusub_2[$i_sub2]['menusub_3'] = $menusub_3;
                            $i_sub2++;
                        }
                    }
                    $menusub[$i_sub]['menusub_2'] = $menusub_2;
                    $i_sub++;
                }

            }
            $menu1[$key]['menu_sub'] = $menusub;
        }
    }
    $dem = 0;
    $menu = [];
    foreach ($menu1 as $mn) {
        $menu[$dem] = $mn;
        $dem++;
    }
//    print_r($menu);die();
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ke = strpos($actual_link, '?');
    if (!empty($ke)) {
        $actual_link = substr($actual_link, 0, $ke);
    }
    $actual_link = rtrim($actual_link, '/');
//    $menu_items = wp_get_nav_menu_items('Menu header');
//    if ($menu_items) {
//        foreach ((array) $menu_items as $key => $menu_item) :

    foreach ($menu as $key => $mn):
        ?>
        <?php
        $menu[$key]['active'] = 0;
        $active = '';

        $url_admin = $mn['url'];

        $arr_admin = explode('/', $url_admin);
        $check_t = '123';
        if ($arr_admin[3] == 'category_service') {
            $check_t = $arr_admin[3];
        }

        $ke = strpos($url_admin, '?');
        if (!empty($ke)) {
            $url_admin = substr($url_admin, 0, $ke);
        }
        $url_admin = rtrim($url_admin, '/');

        if ($actual_link == $url_admin) {
            $active = 'active';
            $menu[$key]['active'] = 1;
        }

        $count_mn = count($mn['menu_sub']);

        ?>
        <?php if ($count_mn >= 2): ?>
        <li>
            <div class="links">
                <a href="<?= $mn['url'] ?>"> <?= $mn['title'] ?></a>
                <?php if (!empty($mn['menu_sub'])): ?>
                    <i class="fas fa-caret-down"></i>
                <?php endif; ?>
            </div>
            <?php if (!empty($mn['menu_sub'])): ?>
                <?php if ($mn['classes'] == 'menu-main') : ?>
                    <div class="drop-menu">
                        <div class="drop-wrapper">
                            <div class="menu-left">
                                <ul>
                                    <?php foreach ($mn['menu_sub'] as $key__2 => $mn_sub): ?>
                                        <li class="paren" data-pra="<?= $mn_sub['ID'] ?>">
                                            <a href="<?= $mn_sub['url'] ?>">
                                                <span><?= $mn_sub['title'] ?></span>
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                         viewBox="0 0 19 19" fill="none">
                                                        <path d="M13.4768 10.3141L8.53837 5.37571L13.4768 0.437286L18.4152 5.37571L13.4768 10.3141ZM0.807617 8.64106V1.64114H7.80754V8.64106H0.807617ZM10.1922 18.0256V11.0257H17.1921V18.0256H10.1922ZM0.807617 18.0256V11.0257H7.80754V18.0256H0.807617ZM2.30759 7.14111H6.30759V3.14111H2.30759V7.14111ZM13.5018 8.22571L16.3268 5.40071L13.5018 2.57571L10.6768 5.40071L13.5018 8.22571ZM11.6921 16.5257H15.6921V12.5257H11.6921V16.5257ZM2.30759 16.5257H6.30759V12.5257H2.30759V16.5257Z"
                                                              fill="#2D55A5"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="menu-right">
                                <ul class="menu-child">
                                    <?php
                                    foreach ($mn['menu_sub'] as $key__2 => $mn_sub): ?>
                                        <?php foreach ($mn_sub['menusub_2'] as $key_2 => $mn_sub_2): ?>
                                            <li class="item-sup" data-sun="<?= $mn_sub_2['menu_item_parent'] ?>"
                                                style="display: none">
                                                <h4><?= $mn_sub_2['title'] ?></h4>
                                                <p><?= $mn_sub_2['description'] ?></p>
                                                <a href="<?= $mn_sub_2['url'] ?>">
                                                    <span>Tìm hiểu thêm</span>
                                                    <i class="far fa-angle-right"></i>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                <?php else: ?>
                    <div class="drop-menu-v2">
                        <ul>
                            <?php foreach ($mn['menu_sub'] as $key__2 => $mn_sub): ?>
                                <li>
                                    <div class="links">
                                        <a href="<?= $mn_sub['url'] ?>"><span><?= $mn_sub['title'] ?></span></a>
                                    </div>

                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </li>
    <?php else: ?>
        <li>
            <div class="links">
                <a href="<?= $mn['url'] ?>"> <?= $mn['title'] ?></a>
                <?php if (!empty($mn['menu_sub'])): ?>
                    <i class="fas fa-caret-down"></i>

                <?php endif; ?>
            </div>
            <?php if (!empty($mn['menu_sub'])): ?>

            <?php endif; ?>
        </li>

    <?php endif; ?>
    <?php
    endforeach;
//    } else {
//        echo 'Chưa có menu';
//    }
}

function addVoucher()
{
    global $wpdb;
    // Lấy dữ liệu từ form
    $ten_chuong_trinh = sanitize_text_field($_POST['ten_chuong_trinh']);
    $ma_voucher = sanitize_text_field($_POST['ma_voucher']);
    $time_start = sanitize_text_field($_POST['time_start']);
    $time_end = sanitize_text_field($_POST['time_end']);
    $loai_giam_gia = sanitize_text_field($_POST['loai_giam_gia']);
    $muc_giam = sanitize_text_field($_POST['muc_giam']);
    $muc_giam_2 = sanitize_text_field($_POST['muc_giam_2']);
    $muc_giam_co_gioi_han = sanitize_text_field($_POST['muc_giam_co_gioi_han']);
    $so_luong = sanitize_text_field($_POST['so_luong']);
    // nếu loai_giam_gia = 0 thì dùng muc_giam còn loai_giam_gia = 1 thì dùng muc_giam_2
    $muc_giam_ins = 0;
    if ($loai_giam_gia == 1) {
        $muc_giam_ins = $muc_giam;
    } else {
        $muc_giam_ins = $muc_giam_2;
    }
    $data = array(
        'voucher_name' => $ten_chuong_trinh,
        'voucher_code' => $ma_voucher,
        'start_date' => $time_start,
        'end_date' => $time_end,
        'discount_type' => $loai_giam_gia,
        'discount_amount' => $muc_giam_ins,
        'max_discount' => $muc_giam_co_gioi_han,
        'number_of_vouchers' => $so_luong,
        'status' => 1,
    );
    $check = $wpdb->get_row("SELECT * FROM voucher WHERE voucher_code = '$ma_voucher'");
    if ($check) {
        $rs = ['status' => 0, 'message' => 'Mã voucher đã tồn tại'];
    } elseif ($wpdb->insert('voucher', $data)) {
        $rs = ['status' => 1, 'message' => 'Thêm voucher thành công'];
    } else {
        $rs = ['status' => 0, 'message' => 'Thêm voucher thất bại'];
    }
    returnajax($rs);
}

add_action('wp_ajax_add_voucher', 'addVoucher');
add_action('wp_ajax_nopriv_add_voucher', 'addVoucher');

function updateVoucher()
{
    global $wpdb;
    $id = $_POST['id'];
    $ten_chuong_trinh = $_POST['ten_chuong_trinh'];
    $muc_giam = $_POST['muc_giam'];
    $muc_giam_2 = $_POST['muc_giam_2'];
    $muc_giam_co_gioi_han = $_POST['muc_giam_co_gioi_han'];
    $loai_giam_gia = $_POST['loai_giam_gia'];
    $so_luong = $_POST['so_luong'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $muc_giam_ins = 0;
    if ($loai_giam_gia == 1) {
        $muc_giam_ins = $muc_giam;
    } else {
        $muc_giam_ins = $muc_giam_2;
    }
    $data = array(
        'voucher_name' => $ten_chuong_trinh,
        'discount_type' => $loai_giam_gia,
        'discount_amount' => $muc_giam_ins,
        'max_discount' => $muc_giam_co_gioi_han,
        'number_of_vouchers' => $so_luong,
        'start_date' => $time_start,
        'end_date' => $time_end,
    );
    $where = array('id' => $id);
    if ($wpdb->update('voucher', $data, $where)) {
        $rs['status'] = 1;
        $rs['message'] = 'Cập nhật voucher thành công';
        returnajax($rs);
    } else {
        $rs['status'] = 0;
        $rs['message'] = 'Cập nhật voucher thất bại';
        returnajax($rs);
    }

}

add_action('wp_ajax_update_voucher', 'updateVoucher');
add_action('wp_ajax_nopriv_update_voucher', 'updateVoucher');
function hideVoucher()
{
    global $wpdb;
    $id = $_POST['id'];
    if ($wpdb->update('voucher', array('status' => 0), array('id' => $id))) {
        $rs['status'] = success_code;
        $rs['message'] = 'Ẩn voucher thành công';
        returnajax($rs);
    } else {
        $rs['status'] = error;
        $rs['message'] = 'Ẩn voucher thất bại';
        returnajax($rs);

    }
    die();
}

add_action('wp_ajax_hide_voucher', 'hideVoucher');
add_action('wp_ajax_nopriv_hide_voucher', 'hideVoucher');
function regApp()
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
            returnajax(['status' => 1, 'message' => 'Đăng ký thành công']);
        } else {
            returnajax(['status' => 0, 'message' => 'Đăng ký thất bại']);
        }
    }
}

add_action('wp_ajax_reg_app', 'regApp');
add_action('wp_ajax_nopriv_reg_app', 'regApp');

function getInfoVoucher()
{
    global $wpdb;
    $voucher_code = $_POST['voucher_code'];
    $voucher = $wpdb->get_row("SELECT * FROM voucher WHERE voucher_code = '$voucher_code'");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date_now = date('d-m-Y H:i');
    if ($voucher) {
        $date_start = ($voucher->start_date);
        $date_end = ($voucher->end_date);
        $date_startFormat = date("m/d/Y H:i", strtotime(str_replace('/', '-', $date_start)));
        $strTimeStart = strtotime($date_startFormat);
        $date_endFormat = date("m/d/Y H:i", strtotime(str_replace('/', '-', $date_end)));
        $strTimeEnd = strtotime($date_endFormat);
        $date_nowFormat = date("m/d/Y H:i", strtotime(str_replace('/', '-', $date_now)));
        $strTimeNow = strtotime($date_nowFormat);
        $status = $voucher->status;
        $so_luong = $voucher->number_of_vouchers;
        $discount_type = $voucher->discount_type;
        $max_discount = $voucher->max_discount;
        $discount_amount = $voucher->discount_amount;
        if ($so_luong <= 0) {
            $response = ['status' => 0, 'message' => 'Mã voucher đã hết lượt sử dụng'];
        } else if ($status == 0) {
            $response = ['status' => 0, 'message' => 'Mã voucher không hợp lệ'];
        } else if ($strTimeNow < $strTimeStart) {
            $response = ['status' => 0, 'message' => 'Mã voucher chưa được kích hoạt'];
        } else if ($strTimeNow > $strTimeEnd) {
            $response = ['status' => 0, 'message' => 'Mã voucher đã hết hạn'];
        } else {
            $response = ['status' => 1, 'message' => 'Mã voucher hợp lệ', 'voucher' => $voucher];
        }
    } else {
        $response = ['status' => 0, 'message' => 'Mã voucher không hợp lệ'];
    }

    returnajax($response);
    wp_die();
}

add_action('wp_ajax_get_info_voucher', 'getInfoVoucher');
add_action('wp_ajax_nopriv_get_info_voucher', 'getInfoVoucher');



?>




