// $("#Formhome").validate({
//     rules: {
//         name: {
//             required: true,
//             minlength: 2
//         },
//         surname: {
//             required: true,
//             minlength: 2
//         },
//         phone: {
//             required: true,
//             minlength: 8,
//             number : true,
//         },
//         email: {
//             required: true,
//             email : true,
//         },
//         address: {
//             required: true,
//         },
//         city: {
//             required: true,
//         },
//     },
//     messages: {
//         name: {
//             required: "Hãy nhập tên của bạn!",
//             minlength: "Hãy nhập tối thiệu 2 ký tự!"
//         },
//         surname: {
//             required: "Hãy nhập họ của bạn!",
//             minlength: "Hãy nhập tối thiệu 2 ký tự!",
//
//         },
//         phone: {
//             required: "Hãy nhập số điện thoại của bạn!",
//             minlength: "Hãy nhập tối thiệu 8 ký tự!",
//             number: "Hãy nhập đúng dịnh dạng số điện thoại"
//         },
//         email: {
//             required: "Hãy nhập vào địa chỉ email của bạn!",
//             email : "hãy nhập đúng định dạng của email!"
//         },
//         address: {
//             required: "Hãy nhập vào địa chỉ của bạn!",
//         },
//         city: {
//             required: "Hãy nhập tên thành phố của bạn"
//         }
//     }
// });


// $(".btn-ucss").on('click',function() {
// var name = $('input[name="name"]').val();
// var surname = $('input[name="surname"]').val();
// var phone = $('input[name="phone"]').val();
// var email = $('input[name="email"]').val();
// var address = $('input[name="address"]').val();
// var city = $('input[name="city"]').val();
//
// if (name === "" && surname === "" && phone === "" && email === "" && address === "" && city === "" ) {
//     alert("Hãy nhập thông tin đầy đủ khi chon phương thức thanh toán")
// }
// else {
//
//     $("body").on("change", ".methodpay", function () {
//         console.log('ábhasdbasbd');
//         var selecteMethot = $('input[name="method"]:checked').val();
//         var dataPro = localStorage.getItem("cart");
//         var data = "";
//         data = dataPro;
//         let urlAjax = $("#urlAjax").val(); // Url ajax
//         if (selecteMethot == '1') {
//
//             $('#Formhome').submit(function(event) {
//                 event.preventDefault();
//                 alert('comming soon');
//             });
//         }else if (selecteMethot == '2') {
//
//             $('#Formhome').submit(function(event) {
//                 let dataSave = [];
//                 let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
//                 dataSave = cartLocal ? JSON.parse(cartLocal) : [];
//                 let dataProduct = data;
//                 let money = 0;
//                 dataSave.map(function (value, index) {
//                     let pri = value["price"];
//                     let qty = value["qty"];
//
//                     money += pri * qty;
//                 });
//                 event.preventDefault();
//                 let name = $('input[name="name"]').val();
//                 let surname = $('input[name="surname"]').val();
//                 let phone = $('input[name="phone"]').val();
//                 let email = $('input[name="email"]').val();
//                 let address = $('input[name="address"]').val();
//                 let city = $('input[name="city"]').val();
//                 let ip_user = $('input[name="email"]').val();
//                 let methodPay = selecteMethot;
//                 // Corrected file input retrieval
//                 // let fileinputhome = $('.file-input-note')[0].files[0];
//                 var form = new FormData();
//                 form.append('name', name);
//                 form.append('surname', surname);
//                 form.append('phone', phone);
//                 form.append('money',money);
//                 form.append('email', email);
//                 form.append('address', address);
//                 form.append('city', city);
//                 form.append('ip_user', ip_user);
//                 form.append('methodPay', methodPay);
//                 form.append('dataProduct', dataProduct);
//                 form.append('action', 'oderProduct');
//
//                 $.ajax({
//                     url: urlAjax,
//                     type: 'POST',
//                     dataType: "json",
//                     processData: false,
//                     contentType: false,
//
//                     data: form,
//
//                     beforeSend: function () {
//                         $('.divgif').css('display', 'block');
//                     },
//                     success: function(ms) {
//
//                         $('.divgif').css('display', 'none');
//                         Swal.fire({
//                             icon: 'success',
//                             text: ms.mess,
//                         });
//                         setTimeout(function () {
//                             // console.log(urlhome);
//                             window.location.href = "http://nexta.vn/hoan-thanh-don-hang";
//                         }, 2000);
//                     }
//                 })
//             });
//         }
//     });
// }
// })
// $(".btn-ucss").on('click', function () {
//     var name = $('input[name="name"]').val();
//     var surname = $('input[name="surname"]').val();
//     var phone = $('input[name="phone"]').val();
//     var email = $('input[name="email"]').val();
//     var address = $('input[name="address"]').val();
//     var city = $('input[name="city"]').val();


$("body").on("change", ".methodpay", function () {
    var selectedMethod = $('input[name="method"]:checked').val();
    if (!selectedMethod) {
        alert('Vui lòng chọn phương thức thanh toán')
    }
    if (selectedMethod == '1') {
        $('.content-bank').css('display', 'flex');
        $('.btn-ucss').on('click', function (event) {

            pay_ajax();

        });
    } else if (selectedMethod == '2') {
        $('.content-bank').css('display', 'none');
        $('.btn-ucss').on('click', function (event) {

            pay_ajax()
        });
    }
});

// });

function pay_ajax() {

    var dataProduct = localStorage.getItem("cart");
    var dataBuyNow = localStorage.getItem("buyNow");
    var selectedMethod = $('input[name="method"]:checked').val();
    let urlAjax = $("#urlAjax").val(); // Url ajax
    event.preventDefault();
    let dataSave = [];
    let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
    let buyNowLocal = localStorage.getItem('buyNow') ? localStorage.getItem('buyNow') : "";
    dataSave = buyNowLocal.length > 0 ? JSON.parse(buyNowLocal) : JSON.parse(cartLocal);
    let voucherLocal = localStorage.getItem('voucher') ? localStorage.getItem('voucher') : "";
    let voucher_code = $('input[name="voucher_code"]').val()
    let voucher = voucherLocal ? JSON.parse(voucherLocal) : [];
    let money = 0;
    let priqty = 0;
    let code = $('#code').attr('data-codecod');
    let moneytotal = 0;
    if (voucherLocal) {
        let discount_amount = voucher["discount_amount"];
        let discount_type = voucher["discount_type"];
        let max_discount_amount = voucher["max_discount"];

        if (discount_type == 2) {
            dataSave.forEach(function (item) {
                let pri = item["price"];
                let qty = item["qty"];
                priqty += pri * qty;


            });
            moneytotal = priqty;
            let percent = priqty * parseFloat(discount_amount) / 100;

                // if (percent > max_discount_amount && max_discount_amount != null ) {
                //     percent = max_discount_amount;
                // }


            money = priqty - percent;

        } else {
            dataSave.forEach(function (item) {
                let pri = item["price"];
                let qty = item["qty"];
                priqty += pri * qty;
                money = priqty - discount_amount;
            });
            moneytotal = priqty;
        }
    } else {

        dataSave.forEach(function (item) {
            let pri = item["price"];
            let qty = item["qty"];
            priqty += pri * qty;
            money = priqty;
        });
        moneytotal = priqty;
    }

    // dataSave.forEach(function (value) {
    //     let pri = value["price"];
    //     let qty = value["qty"];
    //     money += pri * qty;
    // });

    let ip_user = $('input[name="email"]').val();
    let methodPay = selectedMethod;
    // Corrected file input retrieval
    // let fileinputhome = $('.file-input-note')[0].files[0];
    var form = new FormData($('#Formhome')[0]);
    form.append('money', money);
    form.append('moneytotal', moneytotal);
    form.append('ip_user', ip_user);
    form.append('methodPay', methodPay);
    form.append('code', code);
    form.append('dataProduct', dataProduct);
    form.append('voucher_code_2', voucher_code);
    form.append('dataBuyNow', dataBuyNow);
    form.append('action', 'oderProduct');
    var errorLabels = $('label.error').filter(function () {
        return $(this).css('display') !== 'none';
    });

    var name = $('input[name="name"]').val();
    var surname = $('input[name="surname"]').val();
    var phone = $('input[name="phone"]').val();
    var email = $('input[name="email"]').val();
    var address = $('input[name="address"]').val();
    // var city = $('input[name="city"]').val();
    var methodpay = $('input[name="method"]').prop('checked');


    if (name === '' || surname === '' || email === '' ||
        phone === '' || address === '') {
        // $('.error-log-mem').addClass('show');
        // $('.error-log-mem-content').text("Please complete all information");
        $('input[name="name"]').focus();

    } else if (errorLabels.length > 0) {
        // $('.error-log-mem').addClass('show');
        // $('.error-log-mem-content').text("Please fill in the information accurately");
        $('input[name="name"]').focus();

    } else {

        // $('.error-log-mem').removeClass('show');
        $('.error-log-mem-content').text("");
        $.ajax({
            url: urlAjax,
            type: 'POST',
            dataType: "json",
            processData: false,
            contentType: false,
            data: form,
            beforeSend: function () {
                $('.divgif').css('display', 'block');
            },
            success: function (ms) {
                $('.divgif').css('display', 'none');
                Swal.fire({
                    icon: 'success',
                    text: 'Đặt hàng thành công',
                });
                setTimeout(function () {
                    window.location.href = "https://nexta.vn/hoan-thanh-don-hang";
                }, 2000);
            }
        });
    }
}