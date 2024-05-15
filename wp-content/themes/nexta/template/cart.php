<?php
/* Template Name: Giỏ hàng */
get_header();
?>
<main class="main">
    <section class="sectiom-top cart-section">
        <div class="container">
            <div class="proce">
                <div class="title">
                    <h3>Giỏ hàng</h3>
                </div>
                <div class="procedure">
                    <div class="procedure-item">
                        <div class="icon">
                            <span>1</span>
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
                <div class="row">
                    <div class="col-xl-7 col-md-12">
                        <div class="table-cart table-sm">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá tiền</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody class="show-cart">
                                <!--                                <tr>-->
                                <!--                                    <th scope="row">-->
                                <!--                                        <div class="product-item">-->
                                <!--                                            <div class="img">-->
                                <!--                                                <picture>-->
                                <!--                                                    <img src="-->
                                <? //= get_template_directory_uri() ?><!--/dist/images/box-9.png"-->
                                <!--                                                         alt="">-->
                                <!--                                                </picture>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="content">-->
                                <!--                                                <h4>Máy tính bảng học tập Smart Study 1</h4>-->
                                <!--                                                <p>Màu: Đen</p>-->
                                <!--                                                <button class="dis-remove">-->
                                <!--                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"-->
                                <!--                                                         viewBox="0 0 25 24" fill="none">-->
                                <!--                                                        <path fill-rule="evenodd" clip-rule="evenodd"-->
                                <!--                                                              d="M5.79289 5.29289C6.18342 4.90237 6.81658 4.90237 7.20711 5.29289L12.5 10.5858L17.7929 5.29289C18.1834 4.90237 18.8166 4.90237 19.2071 5.29289C19.5976 5.68342 19.5976 6.31658 19.2071 6.70711L13.9142 12L19.2071 17.2929C19.5976 17.6834 19.5976 18.3166 19.2071 18.7071C18.8166 19.0976 18.1834 19.0976 17.7929 18.7071L12.5 13.4142L7.20711 18.7071C6.81658 19.0976 6.18342 19.0976 5.79289 18.7071C5.40237 18.3166 5.40237 17.6834 5.79289 17.2929L11.0858 12L5.79289 6.70711C5.40237 6.31658 5.40237 5.68342 5.79289 5.29289Z"-->
                                <!--                                                              fill="#FF3333"/>-->
                                <!--                                                    </svg>-->
                                <!--                                                    <span>Bỏ chọn</span>-->
                                <!--                                                </button>-->
                                <!---->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </th>-->
                                <!--                                    <td>-->
                                <!--                                        <div class="quantity">-->
                                <!--                                            <button class="btn-minus">-</button>-->
                                <!--                                            <input type="text" value="1" readonly>-->
                                <!--                                            <button class="btn-plus">+</button>-->
                                <!--                                        </div>-->
                                <!--                                    </td>-->
                                <!--                                    <td>5.900.000đ</td>-->
                                <!--                                    <td>-->
                                <!--                                    <span>-->
                                <!--                                         5.900.000đ-->
                                <!--                                    </span>-->
                                <!--                                    </td>-->
                                <!--                                </tr>-->

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-12">
                        <div class="box-toltal">
                            <h3>Tóm tắt đơn hàng </h3>
                            <div class="list-total">

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
                                           name="voucher_code">
                                </div>
                                <button class="submit-discout">Áp dụng</button>
                            </div>
                            <div class="submit-cart">
                                <a ><span>Thanh toán</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                                         fill="none">
                                        <path d="M14.7959 4.4541L21.5459 11.2041C21.6508 11.3086 21.734 11.4328 21.7908 11.5696C21.8476 11.7063 21.8768 11.8529 21.8768 12.001C21.8768 12.149 21.8476 12.2957 21.7908 12.4324C21.734 12.5691 21.6508 12.6933 21.5459 12.7979L14.7959 19.5479C14.5846 19.7592 14.2979 19.8779 13.9991 19.8779C13.7002 19.8779 13.4135 19.7592 13.2022 19.5479C12.9908 19.3365 12.8721 19.0499 12.8721 18.751C12.8721 18.4521 12.9908 18.1654 13.2022 17.9541L18.0313 13.125L4.25 13.125C3.95163 13.125 3.66548 13.0065 3.4545 12.7955C3.24353 12.5846 3.125 12.2984 3.125 12C3.125 11.7017 3.24353 11.4155 3.45451 11.2045C3.66548 10.9936 3.95163 10.875 4.25 10.875L18.0313 10.875L13.2013 6.04598C12.9899 5.83463 12.8712 5.54799 12.8712 5.2491C12.8712 4.95022 12.9899 4.66357 13.2013 4.45223C13.4126 4.24088 13.6992 4.12215 13.9981 4.12215C14.297 4.12215 14.5837 4.24088 14.795 4.45223L14.7959 4.4541Z"
                                              fill="white"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="link">
                    <a href="<?= home_url() ?>/may-tinh-bang-hoc-tap-thong-minh/">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>
<script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/pay.js"></script>
<script !src="">
    loadCart();
    eventAddCart();
    nexta_pay();

    $('.btn-plus').click(function () {
        var value = parseInt($(this).prev('input').val());
        // var value = $(this).attr('data-value');
        var status = false;
        let qtytotal = 0;

        var id = $(this).attr('data-id');
        var getCart = JSON.parse(localStorage.cart);
        if (parseInt(value) >= 1) {
            for (let cart of getCart) {
                var price = cart.price;
                // if (cart.qty < cart.maxqty && cart.id == id) {

                if (cart.id == id) {
                    $(this).prev('input').val(value + 1);
                    value = parseInt(value) + 1;
                    var newValue = parseInt(value);
                    var newPrice = parseFloat(price);
                    status = true;
                    var newSubtotal = parseFloat((newPrice * newValue));
                    $('.product-item-note-' + id).html(newSubtotal.toLocaleString('en-US') + 'đ');
                    // update cart
                    if (status) {
                        var newTotal = 0;
                        for (let i = 0; i < getCart.length; i++) {
                            if (getCart[i].id == id) {
                                // getCart[i].price = newPrice;
                                getCart[i].qty = value;
                                getCart[i].subTotal = newSubtotal;

                            }
                            newTotal += getCart[i].subTotal;
                        }
                        localStorage.setItem('cart', JSON.stringify(getCart));
                        var getCartNew = JSON.parse(localStorage.cart);
                        for (let i = 0; i < getCartNew.length; i++) {
                            qtytotal += getCartNew[i].qty;
                        }
                        $(".menu__cart .number").html(qtytotal);
                        // $('.total-number').empty();
                        // // $('.total-number').append('$' + parseFloat(newTotal.toFixed(4)));
                        // $('.total-number').append(parseFloat(newTotal.toFixed(4)) + 'đ');
                        totalNumber();

                    }
                }
                // }else  {
                //     alert('Số lượng đặt quá lớn');
                // }

            }
        }

    });
    $('.btn-minus').click(function () {
        let qtytotal = 0;
        var value = parseInt($(this).next('input').val());
        var id = $(this).attr('data-id');
        var status = false;
        var getCart = JSON.parse(localStorage.cart);
        if (parseInt(value) > 1) {
            $(this).next('input').val(value - 1);
            for (let cart of getCart) {
                var price = cart.price;
                if (cart.id == id) {
                    value = parseInt(value) - 1;
                    var newValue = parseInt(value);
                    var newPrice = parseFloat(price);
                    status = true;
                    var newSubtotal = parseFloat((newPrice * newValue));
                    $('.product-item-note-' + id).html(newSubtotal.toLocaleString('en-US') + 'đ');

                }
            }
        }
        // update cart
        if (status) {
            var newTotal = 0;
            for (let i = 0; i < getCart.length; i++) {
                if (getCart[i].id == id) {
                    // getCart[i].price = newPrice;
                    getCart[i].qty = value;
                    getCart[i].subTotal = newSubtotal;
                }
                newTotal += getCart[i].subTotal;
            }
            localStorage.setItem('cart', JSON.stringify(getCart));
            // $('.total-number').empty();
            // // $('.total-number').append('$' + parseFloat(newTotal.toFixed(4)));
            // $('.total-number').append(parseFloat(newTotal.toFixed(4)) + 'đ');
            totalNumber();
            var getCartNew = JSON.parse(localStorage.cart);
            for (let i = 0; i < getCartNew.length; i++) {
                qtytotal += getCartNew[i].qty;
            }
            $(".menu__cart .number").html(qtytotal);
        }
    });
    // minus and plus product quantity
    pay_ajax();
</script>
<script>
    $(document).ready(function (){
        $('.list-total-item.discount').hide();
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
    });
</script>