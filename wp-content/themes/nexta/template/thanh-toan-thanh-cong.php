<?php
/* Template Name: Thanh toán thành công */
get_header();
session_start();
global $wpdb;
$url = get_template_directory_uri();
$ip_user = str_replace('+', "", $ip_user);
$get_newest_order = $wpdb->get_results("SELECT * FROM tt_orders WHERE order_code = '{$ip_user}' ORDER BY id DESC");

$datapro =  $wpdb->get_results("SELECT * FROM tt_orders WHERE order_code = '{$ip_user}' ORDER BY id DESC");


$code = $_SESSION['code'];
$date = $_SESSION['date'];
$price = $_SESSION['price'];
$status = $_SESSION['status'];

$data = $datapro[0];

?>
<main class="main">
    <section class="sectiom-top cart-section step-2 step-3">
        <div class="container">
            <div class="proce">
                <div class="title">
                    <h3>Hoàn thành đơn hàng</h3>
                </div>
                <div class="procedure">
                    <div class="procedure-item">
                        <div class="icon">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                       fill="none">
  <path d="M6 12L10 16L18 8" stroke="#FCFCFD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
        stroke-linejoin="round"/>
</svg></span>
                        </div>

                        <p>Giỏ hàng</p>
                    </div>
                    <div class="procedure-item">
                        <div class="icon">
                             <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
  <path d="M6 12L10 16L18 8" stroke="#FCFCFD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
        stroke-linejoin="round"/>
</svg></span>
                        </div>
                        <p>Chi tiết thanh toán</p>
                    </div>
                    <div class="procedure-item">
                        <div class="icon">
                             <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
  <path d="M6 12L10 16L18 8" stroke="#FCFCFD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
        stroke-linejoin="round"/>
</svg></span>
                        </div>
                        <p>Xác nhận thông tin</p>
                    </div>
                    <div class="procedure-item">
                        <div class="icon">
                            <span>4</span>
                        </div>
                        <p>Hoàn thành đơn hàng</p>
                    </div>
                </div>
            </div>
            <div class="div-ko">
                <div class="infomation-sucsce">
                    <h1>Bạn đã đặt hàng thành công!</h1>
                    <div class="list">
                        <div class="list-item">
                            <p>Mã đơn hàng</p> <span><?= $code ?></span>
                        </div>
                        <div class="list-item">
                            <p>Ngày đặt hàng</p> <span><?= date('d/m/Y H:i', $date) ?></span>
                        </div>
                        <div class="list-item">
                            <p>Tổng số tiền</p> <span><?= number_format($price, 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="list-item">
                            <p>Hình thức thanh toán</p> <span><?php if ($status == 1):?>Thanh toán chuyển khoản<?php else:?>Thanh toán sau<?php endif;?></span>
                        </div>
                    </div>
                    <button onclick="location.href='<?= home_url() ?>';">Trở về trang chủ</button>
                </div>
            </div>


        </div>
    </section>
</main>
<?php
get_footer();
?>
<script !src="">
    localStorage.removeItem('cart');
    localStorage.removeItem('voucher');
    localStorage.removeItem('buyNow');
    $(document).ready(function () {
       $('.menu__cart .number').text(0);
    });
    var delete_cookie = function(name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    };
    delete_cookie('js_var_value');
</script>