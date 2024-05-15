<?php
/* Template Name: Chi tiết thanh toán */
get_header();
$number = rand(1000, 9999999);
?>
<input type="hidden" id="paymentSelected" value="2">
<!--<div id="loading" style="display: none">-->
<!--    <img id="loading-image" src="--><? //= get_template_directory_uri() ?><!--/dist/images/ajax-loader.gif" alt="Loading..." />-->
<!--</div>-->
<input type="hidden" id="urlAjax" value="<?= admin_url() ?>admin-ajax.php">
<input type="hidden" id="success_code" value="success_code">
<!--<div class="divgif" style="display: none">-->
<!--    <img class="iconloadgif" src="--><? //= get_template_directory_uri() ?><!--/dist/images/ajax-loader.gif" alt="">-->
<!--</div>-->
<style>
    .error {
        color: #960101 !important;
    }
</style>
<main class="main">
    <section class="sectiom-top cart-section step-2">
        <div class="container">
            <div class="proce">
                <div class="title">
                    <h3>Chi tiết thanh toán</h3>
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
                            <span>2</span>
                        </div>
                        <p>Chi tiết thanh toán</p>
                    </div>
                    <div class="procedure-item">
                        <div class="icon">
                            <span>3</span>
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
            <div class="list-pro">
                <div class="row payment">
                    <div class="col-xl-7 col-md-12">
                        <div id="Formhome" class="needs-validation form" novalidate>
                            <div class="box-form form-one">
                                <h4>Thông tin liên hệ</h4>
                                <div class="form-group">
                                    <div class="form-check-op">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12 input-laber">
                                                <label for="validationServer01">Tên</label>
                                                <input type="text" name="name" class="form-control"
                                                       id="validationServer01" placeholder="Nhập tên của bạn"
                                                       required>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12 input-laber">
                                                <label for="validationServer02">Họ</label>
                                                <input type="text" name="surname" class="form-control"
                                                       id="validationServer02" placeholder="Nhập họ của bạn"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12 input-laber">
                                                <label for="validationServer03">Số điện thoại</label>
                                                <input type="number" name="phone" class="form-control"
                                                       id="validationServer03" placeholder="Nhập Số điện thoại của bạn"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12 input-laber">
                                                <label for="validationServer04">Địa chỉ email</label>
                                                <input type="email" name="email" class="form-control"
                                                       id="validationServer04" placeholder="Nhập emai của bạn"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-form form-two">
                                <h4>Địa chỉ nhận hàng</h4>
                                <div class="form-group">
                                    <div class="form-check-op">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-12 input-laber">
                                                <label for="validationServer05">Địa chỉ *</label>
                                                <input type="text" name="address" class="form-control"
                                                       id="validationServer05" placeholder="Nhập Địa chỉ của bạn"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="row d-none">
                                            <div class="col-xl-12 col-md-12 col-12 input-laber">
                                                <label for="validationServer06">Thành phố *</label>
                                                <input type="text" name="city" class="form-control"
                                                       id="validationServer06" placeholder="Nhập Thành phố của bạn"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="box-form form-three">-->
<!--                                <h4>Phương thức thanh toán</h4>-->
<!--                                <div class="form-check">-->
<!--                                    <input class="form-check-input methodpay" type="radio" data-type="1" value="1"-->
<!--                                           name="method"-->
<!--                                           id="flexRadioDefault1">-->
<!--                                    <label class="form-check-label" for="flexRadioDefault1">-->
<!--                                        <p>Chuyển khoản</p> <img-->
<!--                                                src="--><?//= get_template_directory_uri() ?><!--/dist/images/ck_ng.png" alt="">-->
<!--                                    </label>-->
<!--                                    <div class="content-bank" style="display: none">-->
<!--                                        <div class="info-bank">-->
<!--                                                <div class="info-bank-item">-->
<!--                                                <span>Ngân hàng</span>-->
<!--                                                <p id="inf">BIDV</p>-->
<!--                                            </div>-->
<!--                                            <div class="info-bank-item">-->
<!--                                                <span>Số tài khoản</span>-->
<!--                                                <p id="inf">2609289999</p>-->
<!--                                            </div>-->
<!--                                            <div class="info-bank-item">-->
<!--                                                <span>Chủ tài khoản</span>-->
<!--                                                <p id="inf">CÔNG TY CP MASSCOM VN</p>-->
<!--                                            </div>-->
<!--                                            <div class="info-bank-item">-->
<!--                                                <span>Mã đơn hàng</span>-->
<!--                                                <p id="code" data-codecod="NEX--><?//= $number?><!--">NEX--><?//= $number?><!--</p>-->
<!--                                            </div>-->
<!--                                            <div class="info-bank-item">-->
<!--                                                <span>Nội dung</span>-->
<!--                                                <p id="inf">Thanh toan don hang <span id="code2">NEX--><?//= $number      ?><!--</span></p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="qr">-->
<!--                                            <img src="--><?//= get_template_directory_uri() ?><!--/dist/images/859f8fc72cc228b9a999ca7fc588d804.png" alt="">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-check">-->
<!--                                    <input class="form-check-input methodpay" type="radio" value="2" name="method"-->
<!--                                           id="flexRadioDefault2" data-type="2">-->
<!--                                    <label class="form-check-label" for="flexRadioDefault2">-->
<!--                                        Thanh toán khi nhận hàng-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                                <input type="hidden" name="voucher_code_2" id="voucher_code_2">-->
<!--                                <input type="hidden" name="voucher_id" id="voucher_id">-->
<!--                                <input type="hidden" name="discount_amount" id="discount_amount">-->
<!--                            </div>-->
                            <div class="policy">
                                <div class="form-check-policy d-flex">
                                    <input class="form-check input-policy" type="checkbox" value="" id="flexCheckDefault"
                                           required>
                                    <label class="form-check label-policy" for="flexCheckDefault" style="padding-left: 0.25rem;">
                                        Tôi đồng ý với <a href="<?= get_field('url_policy', 'option') ?>" target="_blank">
                                            Điều khoản của Nexta</a>
                                    </label>
                                </div>
                            </div>
                            <div class="gotype">
                                <a class="repla" href="<?= home_url() ?>/gio-hang/">Quay lại</a>
                                <button class="btn btn-ucss" onclick="xac_nhan()">Tiếp tục đặt hàng</button>
                            </div>
                            
</div>
                    </div>
                    <div class="col-xl-5 col-md-12">

                        <div class="box-toltal">
                            <h3>Tóm tắt đơn hàng </h3>
                            <div class="products">

                            </div>
                            <div class="discount-code">
                                <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                            viewBox="0 0 25 24" fill="none">
  <g clip-path="url(#clip0_1613_22019)">
    <path d="M23.5766 12.4856L14.2653 3.17438C14.0917 2.99963 13.8851 2.86109 13.6576 2.76679C13.43 2.67248 13.186 2.62429 12.9397 2.62501H4.25001C3.95164 2.62501 3.66549 2.74353 3.45451 2.95451C3.24353 3.16549 3.12501 3.45164 3.12501 3.75001V12.4397C3.12429 12.686 3.17248 12.93 3.26679 13.1576C3.36109 13.3851 3.49963 13.5917 3.67438 13.7653L12.9856 23.0766C13.3372 23.4281 13.8141 23.6255 14.3113 23.6255C14.8084 23.6255 15.2853 23.4281 15.6369 23.0766L23.5766 15.1369C23.9281 14.7853 24.1255 14.3084 24.1255 13.8113C24.1255 13.3141 23.9281 12.8372 23.5766 12.4856ZM14.3113 21.2203L5.37501 12.2813V4.87501H12.7813L21.7175 13.8113L14.3113 21.2203ZM9.87501 7.87501C9.87501 8.17168 9.78703 8.46169 9.62221 8.70836C9.45739 8.95504 9.22312 9.1473 8.94903 9.26083C8.67494 9.37436 8.37334 9.40406 8.08237 9.34619C7.7914 9.28831 7.52413 9.14545 7.31435 8.93567C7.10457 8.72589 6.96171 8.45861 6.90383 8.16764C6.84595 7.87667 6.87566 7.57507 6.98919 7.30098C7.10272 7.02689 7.29498 6.79263 7.54165 6.6278C7.78833 6.46298 8.07834 6.37501 8.37501 6.37501C8.77283 6.37501 9.15436 6.53304 9.43567 6.81435C9.71697 7.09565 9.87501 7.47718 9.87501 7.87501Z"
          fill="black" fill-opacity="0.4"/>
  </g>
  <defs>
    <clipPath id="clip0_1613_22019">
      <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
    </clipPath>
  </defs>
</svg></span>
                                    <input type="text" class="form-control" placeholder="Thêm mã giảm giá"
                                           aria-label="Username"
                                           aria-describedby="addon-wrapping"
                                             id="voucher_code"
                                           name="voucher_code">
                                </div>
                                <button class="submit-discout">Áp dụng</button>
                            </div>
                            <div class="list-total">

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
<script>

    $(document).ready(function () {
        if (localStorage.getItem("voucher") != null) {
            var voucher = JSON.parse(localStorage.voucher);

        if (voucher) {
            var type_voucher = voucher.discount_type;
            if (type_voucher == 1) {
                var discount = parseFloat(voucher.discount_amount);
                var voucher_code = voucher.voucher_code;
                $('#voucher_code_2').val(voucher_code);
                var voucher_id = voucher.id;
                $('#voucher_id').val(voucher_id);
                var discount_amount = voucher.discount_amount;
                $('#discount_amount').val(discount_amount);
                $('.discount .total-number').html(parseFloat(discount).toLocaleString('en-US') + 'đ');
                var total = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) - discount;
                $('.amount .total-number').html(parseFloat(total).toLocaleString('en-US') + 'đ');
                var voucher_code = voucher.voucher_code;
                $('#voucher_code').val(voucher_code);
                $('#voucher_code').prop('disabled', true);
                $('.submit-discout').css('opacity', '0.5');
                $('.submit-discout').prop('disabled', true);
            }
            if(type_voucher == 2){
                var discount = parseFloat(voucher.discount_amount);
                var voucher_code = voucher.voucher_code;
                $('#voucher_code_2').val(voucher_code);
                var voucher_id = voucher.id;
                $('#voucher_id').val(voucher_id);
                var discount_amount = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) * discount / 100;
                var max_discount = parseFloat(voucher.max_discount);
                if (max_discount) {
                    if (discount_amount > max_discount) {
                        discount_amount = max_discount;
                    }
                }
                $('#discount_amount').val(discount_amount);
                $('.discount .total-number').html(parseFloat(discount_amount).toLocaleString('en-US') + 'đ');
                var total = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) - discount_amount;
                $('.amount .total-number').html(parseFloat(total).toLocaleString('en-US') + 'đ');
                var voucher_code = voucher.voucher_code;
                $('#voucher_code').val(voucher_code);
                $('#voucher_code').prop('disabled', true);
                $('.submit-discout').css('opacity', '0.5');
                $('.submit-discout').prop('disabled', true);

            }

        }
        }
    });
    function xac_nhan() {
        var name = $('input[name="name"]').val();
        var surname = $('input[name="surname"]').val();
        var phone = $('input[name="phone"]').val();
        var email = $('input[name="email"]').val();
        var address = $('input[name="address"]').val();
        // var city = $('input[name="city"]').val();
        var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var regexPhone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
        if (name == '') {
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng nhập tên'
            });
            return false;
        }
        if (surname == '') {
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng nhập họ'
            });
            return false;
        }
        if (email == '') {
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng nhập email'
            });
            return false;
        }
        if (!regexEmail.test(email)) {
            Swal.fire({
                icon: 'error',
                text: 'Email không hợp lệ'
            });
            return false;
        }
        if (phone == '') {
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng nhập số điện thoại'
            });
            return false;
        }
        if (!regexPhone.test(phone)) {
            Swal.fire({
                icon: 'error',
                text: 'Số điện thoại không hợp lệ'
            });
            return false;
        }
        if (address == '') {
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng nhập địa chỉ'
            });
            return false;
        }
        var user_po = {
            name,
            surname,
            phone,
            email,
            address
            // city
        }
        localStorage.setItem("usser", JSON.stringify(user_po));
        $('.divgif').css('display', 'block');
        setTimeout(function () {
            window.location='https://nexta.vn/xac-nhan-thanh-toan/'
        }, 1000 )
    }
</script>
<script !src="">
    loadCart();
    // eventAddCart();
    var cart = localStorage.getItem("cart");
    var buyNow = localStorage.getItem("buyNow");
    var voucher = localStorage.getItem("voucher");
    function loadbuyNow() {
        let dataSave = [];

        if (localStorage.getItem('buyNow')) { // Lấy thông tin giỏ hàng từ loacl
            let cartLocal = localStorage.getItem('buyNow') ? localStorage.getItem('buyNow') : "";
            dataSave = cartLocal ? JSON.parse(cartLocal) : [];
            // dataSave = $.grep(dataSave, function (e) {
            //     return e.id != dataID;
            // });
            $(".cart-notfound").addClass("d-none");
            dataSave.sort(function (a, b) { // Gom nhóm id pro theo thứ tự tăng dần
                return parseInt(a["id"]) - parseInt(b["id"]);
            });
            var html = "";
            var htmltatol = "";
            var htmldetal = "";
            let money = 0;
            let qtytotal = 0;
            dataSave.map(function (value, index) {
                // let datakey1 = parseInt(value["datakey1"]);
                // let datakey2 = parseInt(value["datakey2"]);
                let datapl = value["datapl"];


                let link = value["link"];
                let link_img = value["img"];
                let pri = value["price"];

                // let orginal_price = value["orginal_price"];
                let qty = value["qty"];
                let title = value["title"];
                qtytotal += qty;
                let keyidpl = value["keyidpl"];
                let id = value["id"];
                let moneyqly = pri * qty;
                money += pri * qty;
                let price = parseInt(pri);
                let format = moneyqly.toLocaleString('en-US');
                let maxqty = value["maxqty"];
                htmldetal = htmldetal +
                    '<div class="products-item">\n' +
                    '                                            <div class="img">\n' +
                    '                                                <img src="' + link_img + '" alt="">\n' +
                    '                                            </div>\n' +
                    '                                            <div class="title">\n' +
                    '                                                <p>' + title + '</p>\n' +
                    '                                                <span>\n' +
                    '                                                Màu: Ngẫu nhiên\n' +
                    '                                            </span>\n' +
                    '                                                <div class="quantity">\n' +
                    '                                                    <p>Số lượng : ' + qty + '</p>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="price">\n' +
                    '                                                <p>' + format + 'đ</p>\n' +
                    '                                            </div>\n' +
                    '                                        </div>';
                html = html +
                    ' <tr class=" li-item-' + id + '">\n' +
                    '                                    <th scope="row">\n' +
                    '                                        <div class="product-item">\n' +
                    '                                            <div class="img">\n' +
                    '                                                <picture>\n' +
                    '                                                    <img src="' + link_img + '"\n' +
                    '                                                         alt="">\n' +
                    '                                                </picture>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="content">\n' +
                    '                                                <h4>' + title + '</h4>\n' +
                    '                                                <p>Màu: Ngẫu nhiên</p>\n' +
                    '                                                <button class="dis-remove delete-item"   data-id="' + id + '">\n' +
                    '                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"\n' +
                    '                                                         viewBox="0 0 25 24" fill="none">\n' +
                    '                                                        <path fill-rule="evenodd" clip-rule="evenodd"\n' +
                    '                                                              d="M5.79289 5.29289C6.18342 4.90237 6.81658 4.90237 7.20711 5.29289L12.5 10.5858L17.7929 5.29289C18.1834 4.90237 18.8166 4.90237 19.2071 5.29289C19.5976 5.68342 19.5976 6.31658 19.2071 6.70711L13.9142 12L19.2071 17.2929C19.5976 17.6834 19.5976 18.3166 19.2071 18.7071C18.8166 19.0976 18.1834 19.0976 17.7929 18.7071L12.5 13.4142L7.20711 18.7071C6.81658 19.0976 6.18342 19.0976 5.79289 18.7071C5.40237 18.3166 5.40237 17.6834 5.79289 17.2929L11.0858 12L5.79289 6.70711C5.40237 6.31658 5.40237 5.68342 5.79289 5.29289Z"\n' +
                    '                                                              fill="#FF3333"/>\n' +
                    '                                                    </svg>\n' +
                    '                                                    <span>Bỏ chọn</span>\n' +
                    '                                                </button>\n' +
                    '\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </th>\n' +
                    '                                    <td>\n' +
                    '                                        <div class="quantity">\n' +
                    '                                            <button class="btn-minus" data-value="' + qty + '" data-id="' + id + '">-</button>\n' +
                    '                                            <input type="number" max="' + maxqty + '" data-src="' + id + '" value="' + qty + '" readonly>\n' +
                    '                                            <button class="btn-plus" data-value="' + qty + '" data-id="' + id + '">+</button>\n' +
                    '                                        </div>\n' +
                    '                                    </td>\n' +
                    '                                    <td >' + price.toLocaleString("en-US") + 'đ</td>\n' +
                    '                                    <td>\n' +
                    '                                    <span class="product-item-note-' + id + '">\n' +
                    '                                         ' + format + 'đ\n' +
                    '                                    </span>\n' +
                    '                                    </td>\n' +
                    '                                </tr>';

                htmltatol =
                    '<div class="list-total-item shipping">\n' +
                    '                                    <div class="item">\n' +
                    '                                        <span>Phí vận chuyển</span>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="price">\n' +
                    '                                    <span>\n' +
                    '                                        Miễn phí\n' +
                    '                                    </span>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '\n' +
                    '                                <div class="list-total-item provisional">\n' +
                    '                                    <div class="item">\n' +
                    '                                        <span>Tạm tính</span>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="price">\n' +
                    '                                    <span class="total-number">\n' +
                    '                                        ' + money.toLocaleString('en-US') + 'đ\n' +
                    '                                    </span>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="list-total-item discount">\n' +
                    '                                    <div class="item">\n' +
                    '                                        <span>Giảm giá</span>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="price">\n' +
                    '                                    <span class="total-number" id="discount">\n' +
                    '                                        0đ\n' +
                    '                                    </span>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="list-total-item amount">\n' +
                    '                                    <div class="item">\n' +
                    '                                        <span>Tổng tiền</span>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="price">\n' +
                    '                                    <span class="total-number">\n' +
                    '                                        ' + money.toLocaleString('en-US') + 'đ\n' +
                    '                                    </span>\n' +
                    '                                    </div>\n' +
                    '                                </div>';

            });
            $(".menu__cart .number").html(qtytotal);

            $(".show-cart").html(html);
            $(".products").html(htmldetal);
            $(".list-total").html(htmltatol);
            $(".user-info").removeClass("d-none");
            $(".table-label").removeClass("d-none");
            // countTotal()
        } else {
            $(".cart-notfound").removeClass("d-none");
            $(".user-info").addClass("d-none");
            $(".table-label").addClass("d-none");
            $(".cart-right").addClass("d-none");
        }
    }
    var submit = $('.btn-ucss');
    submit.click(function () {
        window.onbeforeunload = null;
    });
    window.onbeforeunload = function (e) {
        localStorage.removeItem("buyNow");
        return 'Bạn có chắc chắn muốn rời khỏi trang này?';
    };
    if (voucher == null) {
        $('.submit-discout').click(function () {
            var voucher_code = $('input[name="voucher_code"]').val();
            $.ajax({
                url: '<?= admin_url('admin-ajax.php') ?>',
                type: 'POST',
                data: {
                    action: 'get_info_voucher',
                    voucher_code: voucher_code
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (res) {
                    $('.divgif').css('display', 'none');
                    var data = JSON.parse(res);
                    console.log(data.status);
                    if (data.status == 0) {
                        Swal.fire({
                            icon: 'error',
                            text: data.message,
                            timer: 1500
                        });
                    } else if (data.status == 1) {
                        $('.list-total-item.discount').show();
                        var type = data.voucher.discount_type;
                        if (type == 2) {
                            var discount = parseFloat(data.voucher.discount_amount);
                            var max_discount = parseFloat(data.voucher.max_discount);
                            var so_tien_duoc_giam = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) * discount / 100;
                            if (max_discount) {
                                if (so_tien_duoc_giam > max_discount) {
                                    so_tien_duoc_giam = max_discount;
                                }
                            }
                            var total = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) - so_tien_duoc_giam;

                            $('.discount .total-number').html(so_tien_duoc_giam.toLocaleString('en-US') + 'đ');
                            $('.amount .total-number').html(parseFloat(total).toLocaleString('en-US') + 'đ');
                            localStorage.setItem('voucher', JSON.stringify(data.voucher));
                            $('input[name="voucher_code"]').change(function () {
                                var voucher_code = $('input[name="voucher_code"]').val();
                                var voucher = JSON.parse(localStorage.getItem('voucher'));
                                var voucher_code_local = voucher.voucher_code;
                                if (voucher_code != voucher_code_local) {
                                    localStorage.removeItem('voucher');
                                    localStorage.setItem('voucher', JSON.stringify(data.voucher));
                                }
                            });
                        }
                        if (type == 1) {
                            var discount = parseFloat(data.voucher.discount_amount);
                            $('.discount .total-number').html(parseFloat(discount).toLocaleString('en-US') + 'đ');
                            var total = parseFloat($('.total-number').html().replace(/[^0-9.-]+/g, "")) - discount;
                            $('.amount .total-number').html(parseFloat(total).toLocaleString('en-US') + 'đ');
                            localStorage.setItem('voucher', JSON.stringify(data.voucher));
                            $('input[name="voucher_code"]').change(function () {
                                var voucher_code = $('input[name="voucher_code"]').val();
                                var voucher = JSON.parse(localStorage.getItem('voucher'));
                                var voucher_code_local = voucher.voucher_code;
                                if (voucher_code != voucher_code_local) {
                                    localStorage.removeItem('voucher');
                                    localStorage.setItem('voucher', JSON.stringify(data.voucher));
                                }
                            });
                        }
                        Swal.fire({
                            icon: 'success',
                            text: data.message,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: data.message
                        });
                    }

                }
            });
            return false;
        });
    }
    if (buyNow) {
        localStorage.removeItem("voucher");
        loadbuyNow();
    } else {
        loadCart();
    }
    if (!cart && !buyNow) {
        alert("Vui lòng chọn môt sản phẩm trước khi thanh toán!");
        window.location.href = "https://nexta.vn/may-tinh-bang-hoc-tap-thong-minh/#sanpham";
    }
</script>

<script>
    $('.btn-ucss').prop('disabled', true);
    $('#flexCheckDefault').change(function () {
        if ($(this).is(':checked')) {
            $('.btn-ucss').prop('disabled', false);
        } else {
            $('.btn-ucss').prop('disabled', true);
        }
    });
</script>
