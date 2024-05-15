<?php
include __DIR__ . "/../includes/padding.php";
global $wpdb;

$idOrder = xss(no_sql_injection($_GET['id']));
$queryOrders = $wpdb->get_row("SELECT * FROM tt_orders where id=".$idOrder);
$queryOrdersDetail = $wpdb->get_results("SELECT * FROM tt_orders_detail where id_orders=".$idOrder);
$delivery_information = json_decode($queryOrders->dataproduct);
$adress = $queryOrders->delivery_information;
$adress = str_replace('"', '', $adress);
$p = $queryOrders->price_payment;
$ps = $queryOrders->price;

$prce = $p;
$pr = $ps;
?>

<style>
    input {
        width: 100%;
    }

    .d-none {
        display: none;
    }
    .order-item-product img{
        width: 100%;
    }
    .order-item-product{
        padding: 40px 45px;
        /*background: #ecf1ff;*/
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .order-item-product .order-status{
        margin: 20px auto;
    }
    .order-item-product .order-status .st-main{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
    }
    .order-item-product .order-status .st-main .st-left{
        display: flex;
        align-items: center;
        gap: 40px;
        flex-basis: 70%;
    }
    .order-item-product .order-status .st-main .st-left .status{
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .order-item-product .order-status .st-main .st-left .status span{
        display: block;
        font-size: 14px;
        line-height: 20px;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-left .status strong{
        display: block;
        font-size: 14px;
        line-height: 20px;
        color: #e91c24;
        font-family: K2D-Bold, sans-serif;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-right{
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        text-align: right;
        gap: 50px;
    }
    .order-item-product .order-status .st-main .st-right span{
        flex: 1;
        display: block;
        font-size: 16px;
        line-height: 24px;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-status .st-main .st-right strong{
        display: block;
        font-size: 20px;
        line-height: 26px;
        color: #e91c24;
        font-family: K2D-Bold, sans-serif;
    }
    .order-item-product .order-detail{
        border-bottom: 1px solid #d9d9d9;
        padding-bottom: 25px;
    }
    .order-item-product .order-detail .list-product{

    }
    .order-item-product .order-detail .list-product .morth-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
        margin-bottom: 20px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img{
        display: flex;
        align-items: center;
        gap: 50px;
        flex-basis: 70%;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img figure{
        position: relative;
        width: 150px;
        height: 125px;
        border-radius: 10px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img figure img {
        height: 160px;
        object-fit: contain;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info{

    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info h4{
        font-size: 20px;
        line-height: 26px;
        font-family: var(--f-bold);
        color: #292b2e;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info .type{
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-img .info .type span{
        display: block;
        font-size: 14px;
        line-height: 24px;
        color: rgba(22, 7, 8, 0.5019607843);
    }

    .order-item-product .order-detail .list-product .morth-item .morth-price strong{
        font-size: 20px;
        line-height: 26px;
        font-family: K2D-ExtraBold, sans-serif;
        color: #292b2e;
        margin: 0;
    }
    .order-item-product .order-detail .list-product .morth-item .morth-price{
        flex: 1;
        text-align: right;
    }
    .order-item-product .order-detail .list-info{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        margin-top: 30px;
        border-top: 1px solid #d9d9d9;
    }
    .order-item-product .order-detail .list-info .info__left ul li{
        display: flex;
        align-items: center;
        flex-basis: 50%;
        gap: 15px;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-info .info__left ul{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .order-item-product .order-detail .list-info .info__left{
        flex-basis: 70%;
    }
    .order-item-product .order-detail .list-info .info__right ul{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .order-item-product .order-detail .list-info .info__right ul li{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 10px;
    }
    .order-item-product .order-detail .list-info .info__right{
        flex: 1;
        padding-left: 120px;
    }
    .order-item-product strong{
        display: block;
        font-size: 16px;
        line-height: 26px;

        color: #292b2e;
        margin: 0;
    }
    .order-item-product span{
        display: block;
        font-size: 16px;
        line-height: 26px;
        color: #292b2e;
        margin: 0;
    }
    .st-left button{
        padding: 9px 30px;
        border: none;
        font-size: 14px;
        line-height: 20px;
        color: #e91c24;
        border: 1px solid #e91c24;
        background: rgba(0, 0, 0, 0);
        border-radius: 10px;
    }
</style>
<style>
    .flr{
        display: flex;
        float: right;
    }
    .d-none{
        display: none;
    }
    .divgif {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1100;
        display: none;
        background: #dedede;
        opacity: 0.5;
        top: 0;
        left: 0;
    }
    .iconloadgif {
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        position: absolute;
        margin: auto;
        width: 150px;
        height: 150px;
    }
</style>
<div class="divgif">
    <img class="iconloadgif" src="<?php echo get_template_directory_uri(); ?>/ajax/images/loading2.gif" alt="">
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="wrap">
    <h1>
        Quản lý đơn hàng
    </h1>
    <form id="adddaily" method="post" action="<?php echo $module_path . '&sub=edit&edit_action=1&id=' . $id; ?>"
          name="post">
        <div id="poststuff">
            <input type="hidden" value="<?php echo $id; ?>" name="id"/>
            <div class="metabox-holder columns-2" id="post-body">
                <!---left-->
                <div id="post-body-content" class="pos1">
                    <div class="postbox">
                        <div class="inside">
                            <div class="order-table">
                                <div class="order-item-product">
                                    <div class="order-detail">

                                        <div class="list-product">

                                            <?php foreach ($delivery_information as $key => $orderdetail): ?>
                                            <?php

                                                $giasim = get_field('gia_sim', $orderdetail->id);
                                                $qly = $orderdetail->qty;
                                                $tatol = $giasim * $qly;
                                                ?>
                                                <div class="morth-item">
                                                    <div class="morth-img">
                                                        <figure>
                                                            <?php if($orderdetail->link_img) : ?>
                                                            <img src="<?= $orderdetail->link_img ?>" alt="">
                                                            <?php else: ?>
                                                                <img src="<?= $orderdetail->img ?>" alt="">
                                                            <?php endif ?>
                                                        </figure>
                                                        <div class="info">
                                                            <h4><?= $orderdetail->title ?></h4>

                                                            <div class="type">
                                                                <?php if($orderdetail->type_pl != 1): ?>
                                                                    <?php
                                                                    $datakey1 = $orderdetail->datakey1;
                                                                    $datakey2 = $orderdetail->datakey2;
                                                                    $pl1 = json_decode($orderdetail->pl1_content);
                                                                    $pl2 = json_decode($orderdetail->pl2_content);
                                                                    ?>
                                                                <?php endif ?>
                                                                <span>Số lượng: <?= $orderdetail->qty ?></span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="morth-price">
                                                        <strong><?=
                                                            number_format($orderdetail->price * $orderdetail->qty, 0, ',', '.') ?> đ</strong>
                                                    </div>
                                                </div>
                                            <?php $tatolpro +=  $tatol  ?>
                                            <?php endforeach; ?>
                                           <h1><b> Thành tiền : <?= number_format($pr, 0, ',', '.') ?> vnđ </b></h1>
                                        </div>

                                        <div class="list-info">
                                            <div class="info__left">
                                                <ul>

                                                    <li>
                                                        <span>Họ và tên:</span>
                                                        <strong><?= $queryOrders->fullname ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Mã đơn hàng:</span>
                                                        <strong><?= $queryOrders->order_code ?></strong>
                                                    </li>

                                                    <li>
                                                        <span>Số điện thoại:</span>
                                                        <strong><?= $queryOrders->phone ?></strong>
                                                    </li>

                                                    <li>
                                                        <span>Phương thức thanh toán:</span>
                                                        <strong><?= getMethod($queryOrders->payment_method) ?></strong>
                                                    </li>

                                                    <li>
                                                        <span>Địa chỉ:</span>
                                                        <strong><?= $adress ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Thời gian đặt:</span>
                                                        <strong><?= date('H:i d/m/Y', $queryOrders->time_order) ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Email:</span>
                                                        <strong><?= $queryOrders->emailaddress ?></strong>
                                                    </li>
                                                    <li>
                                                        <span>Trạng thái đơn hàng:</span>
                                                        <strong> <select class="statusPayment" data-order-id="<?php echo $queryOrders->id; ?>">
                                                                <?php echo getStatusPayment($queryOrders->status); ?>
                                                            </select></strong>
                                                    </li>
                                                    <li>
                                                        <span>Quốc gia/Thành phố:</span>
                                                        <strong><?= $queryOrders->country ?></strong>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="info__right">
                                                <ul>

                                                    <li>
                                                        <span>Giảm giá:</span>
                                                        <strong><?= number_format($queryOrders->discount_price, 0, ',', '.') ?> vnđ</strong>
                                                    </li>
                                                    <li>
                                                        <span>Tổng tiền:</span>
                                                        <strong style="font-size: 25px; color: red"><?php if ($queryOrders->payment_method == 1) {
                                                            print number_format($prce, 0, ',', '.')  . " vnđ";
                                                            } else {
                                                                print number_format($queryOrders->price_payment, 0, ',', '.')  . " vnđ" ;
                                                            }  ?></strong>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<?php
//add_admin_js('image.upload.js');

add_admin_js('jquery.min.js');
add_admin_js('jquery.validate.min.js');
?>

<script>
    $(document).ready(function () {
        $("#adddaily").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                // phonenumber: {
                //     required: true,
                //     minlength: 10,
                //     maxlength: 11,
                //     number: true
                // },
                // address: {
                //     required: true,
                //     minlength: 3,
                // },
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Tối thiểu 3 ký tự",
                },
                // address: {
                //     required: "Vui lòng nhập địa chỉ",
                //     minlength: "Tối thiểu 3 ký tự",
                // },
                // phonenumber: {
                //     required: "Vui lòng nhập số điện thoại",
                //     number: "Số điện thoại không đúng định dạng",
                //     minlength: "Số điện thoại không đúng định dạng",
                //     maxlength: "Số điện thoại không đúng định dạng",
                // },

            }
        });
        $('.statusPayment').on('change', function () {
            let newPayment = $(this).val();
            let orderId = $(this).attr('data-order-id');

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                cache: false,
                dataType: "text",
                data: {
                    status: newPayment,
                    orderId: orderId,
                    action: 'changePaymentStatus',
                },
                beforeSend: function() {
                    $('.divgif').css('display', 'block');
                },
                success: function(rs) {
                    $('.divgif').css('display', 'none');
                    rs = JSON.parse(rs);
                    Swal.fire({
                        icon: 'success',
                        text: rs.mess,
                    });
                    if (rs.status == <?php echo 'success_code' ?>) {

                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: rs.mess,
                        });
                    }
                }
            });
        });
    });
</script>
