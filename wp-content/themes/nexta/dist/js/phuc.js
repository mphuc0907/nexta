function addToCart(thiss) {

    var datacheck = thiss.attr("data-datacheck");
    var datakey1 = thiss.attr("data-datakey1");
    var datakey2 = thiss.attr("data-datakey2");
    var datapl = thiss.attr("data-datapl") ? JSON.parse(thiss.attr("data-datapl")) : [];
    var price = parseInt(thiss.attr("data-price"));

    var orginal_price = thiss.attr("data-orginal_price");
    // var maxqty = thiss.attr("data-maxqty");
    var link_img = thiss.attr("data-img");
    var link = thiss.attr("data-link");
    var id = thiss.attr("data-id");
    var maxqty = parseInt(thiss.attr('data-maxqty'));
    var title = thiss.attr("data-title");
    var button = thiss.attr("data-text");
    var qty = 1;
    if (thiss.attr("data-qty") == true) {
        qty = parseInt(thiss.attr("data-qty"));
    } else {
        qty = parseInt($("#soluong").val());
    }
    var keyidpl = id + "-" + datakey1 + "-" + datakey2;
    var listpl = thiss.attr('data-list-pl') ? JSON.parse(thiss.attr('data-list-pl')) : [];
    var product = {
        datakey1,
        datakey2,
        title,
        id,
        maxqty,
        link,
        link_img,
        price,
        orginal_price,
        qty,
        datapl,
        datacheck,
        // pl1_content: listpl[id]["pl1"],
        // pl2_content: listpl[id]["pl2"],
        keyidpl,
        // maxqty
    };
    // Lấy thông tin giỏ hàng từ localStorage
    var cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
    var found = false;
    let cartfillter = [];
    for (var i = 0; i < cart.length; i++) {
        // cart[i].dem = i;
        var case1 = 1;
        var case2 = 1;
        var case3 = 1;
        var case4 = 1;
        // Kiểm tra điều kiện xem có nhóm phân loại không
        if (datacheck == "1" || datacheck == "2") {
            case1 = cart[i].datakey1;
            case2 = product.datakey1;
            if (datacheck == "2") {
                case3 = cart[i].datakey2;
                case4 = product.datakey2;
            }
        }
        if (cart[i].id === product.id && case1 === case2 && case3 === case4) {
            found = true;
            cartfillter = cart[i];
            cart[i].qty = cart[i].qty + product.qty;
            break;
        }
        if (cart[i].id === product.id) {
            // cart[i].dem = i;
        }
    }

    // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm vào giỏ hàng
    // Lấy thông tin giỏ hàng từ localStorage
    var maxqtycheck = 0;
    var inputqty = 1;
    if (found) { // Đã có trong giỏi hàng
        // Lấy số lượng max trong giỏ hàng của sản phẩm đó
        maxqtycheck = parseInt(cartfillter.maxqty) - parseInt(cartfillter.qty);
        inputqty = inputqty + parseInt(cartfillter.qty);

    } else { // Chưa có trong giỏ hàng
        maxqtycheck = maxqty;
        cart.push(product);
    }
    var checkqty = checkQtyCartList(maxqtycheck, inputqty, maxqty);
    if (checkqty) {
        // Lưu thông tin giỏ hàng vào localStorage
        localStorage.setItem("cart", JSON.stringify(cart));

        if (button == "add-cart") {
            loadQtyCart();
            showCart();
            // $('.vf-icon-cart').click(function(){
            $('.cart').addClass('active-menu');
            $('.overlay').fadeIn();
            // });
            // Swal.fire({
            //     icon: 'success',
            //     text: "Sản phẩm đã được thêm vào giỏ hàng",
            // });
        }
    }


}
// function buyNow(thiss) {
//     var link_img = thiss.attr("data-img");
//     var link = thiss.attr("data-link");
//     var id = thiss.attr("data-id");
//     var maxqty = parseInt(thiss.attr('data-maxqty'));
//     var title = thiss.attr("data-title");
//     var button = thiss.attr("data-text");
//     var qty = parseInt($("#soluong").val());
//     var price = parseInt(thiss.attr("data-price"));
//     var product = {
//         id: id,
//         title: title,
//         price: price,
//         qty: qty,
//         img: link_img,
//         link: link
//     };
//     var buyNowLocal = JSON.parse(localStorage.getItem("buyNow"));
//     if (buyNowLocal == null) {
//         buyNowLocal = [];
//     }
//     var check = false;
//     for (var i = 0; i < buyNowLocal.length; i++) {
//         if (buyNowLocal[i].id == product.id) {
//             buyNowLocal[i].qty += product.qty;
//             check = true;
//             break;
//         }
//     }
//     if (!check) {
//         buyNowLocal.push(product);
//     }
//     localStorage.setItem("buyNow", JSON.stringify(buyNowLocal));
//     window.location.href = 'http://nexta.vn/chi-tiet-thanh-toan/';
// }
function showCart() {
    let dataSave = [];
    if (localStorage.getItem('cart')) { // Lấy thông tin giỏ hàng từ loacl
        let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
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
        let money = 0;
        dataSave.map(function (value, index) {
            // let datakey1 = parseInt(value["datakey1"]);
            // let datakey2 = parseInt(value["datakey2"]);
            let datapl = value["datapl"];


            let link = value["link"];
            let link_img = value["link_img"];
            let price = value["price"];
            // let orginal_price = value["orginal_price"];
            let qty = value["qty"];
            let title = value["title"];
            let keyidpl = value["keyidpl"];
            let id = value["id"];
            let moneyqly = price * qty;
            let maxqty = value['maxqty'];
            money += price * qty;
            // let maxqty = value["maxqty"];

            // var valuepl = "Ngẫu nhiên";
            // if (datacheck == "1") {
            //     valuepl = pl1_content[datakey1]["phan_loai_hang"];
            // }
            // if (datacheck == "2") {
            //     valuepl = pl1_content[datakey1]["phan_loai_hang"] + "," + pl2_content[datakey2]["phan_loai_hang"]
            // }

            html = html +
                '<div class="item-cart li-item-' + id + '">\n' +
                '<div class="d-flex w-100">\n' +
                '<div class="img">\n' +
                '<img src="' + link_img + '" alt="">\n' +
                '</div>\n' +
                '<div class="note w-100">\n' +
                '<div class="d-flex justify-content-between">\n' +
                '<h4>' + title + '</h4>\n' +
                '<div class="remo-pro">\n' +
                '<button class="delete-item" data-id="' + id + '">\n' +
                '<span></span>\n' +
                '<span></span>\n' +
                ' </button>\n' +

                '</div>\n' +
                '</div>\n' +

                '<p>' + qty + ' x <span>$ ' + price + '</span></p>\n' +
                ' </div>\n' +
                ' </div>\n' +
                '<hr>\n' +
                '</div>';
            htmltatol =
                '   <tr>\n' +
                '                                    <td>Tổng tiền hàng</td>\n' +
                '                                    <td class="pice-t">$<span id="priced">' + money + '</span></td>\n' +
                '                                </tr>\n' +
                '                                <tr>\n' +
                '                                    <td>Tổng số tiền</td>\n' +
                '                                    <td class="pice-t"><span>$</span><span id="priced">' + money + '</span></td>\n' +
                '                                </tr>'

        });
        loadQtyCart();
        $(".list-cart").html(html);

        $(".show-total").html(htmltatol);

        // countTotal()
    } else {
        $(".show-cart").html('<h6>Bạn chưa có sản phẩm nào trong giỏ hàng!</h6>');
    }
}

function checkQtyCartList(maxqtycheck, qtyinput, maxqty) {
    if (qtyinput > maxqtycheck) {
        // Thông báo lỗi qty khi thêm vào giỏ hàng
        Swal.fire({
            icon: 'error',
            text: "Bạn đã có " + maxqty + " sản phẩm trong giỏ hàng. Không thể thêm số lượng đã chọn vào giỏ hàng vì sẽ vượt quá giới hạn mua hàng của bạn.",
        });
        return false
    }
    return true;
}

function eventAddCart() {
    // Xóa sản phẩm trong giỏ hàng;
    $("body").on("click", ".delete-item", function () {
        var id = $(this).attr("data-id");
        let qtytotal = 0;
        $(".li-item-" + id).remove();
        if (localStorage.getItem('cart')) { // Lấy thông tin giỏ hàng từ loacl
            let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
            dataSave = cartLocal ? JSON.parse(cartLocal) : [];
            if (dataSave.length == 0) {
                localStorage.removeItem("cart");
            } else {
                for (var i = 0; i < dataSave.length; i++) {
                    if (dataSave[i].id == id) {
                        dataSave.splice(i, 1);
                        break;
                    }
                }
                localStorage.setItem('cart', JSON.stringify(dataSave));
                var getCartNew = JSON.parse(localStorage.cart);
                for (let i = 0; i < getCartNew.length; i++) {
                    qtytotal += getCartNew[i].qty;
                }
                $(".menu__cart .number").html(qtytotal);
            }
            if (dataSave.length === 0) {
                $(".cart-notfound").removeClass("d-none");
                // $(".box-toltal").addClass("d-none");
                $(".table-label").addClass("d-none");
            }
        }
        // location.reload()

        totalNumber();
        nexta_pay();
    });
    // End Xóa sản phẩm trong giỏ hàng
    // Bắt sự kiện click vào nút "Thêm vào giỏ hàng"
    // $("body").on("click", ".add-to-cart", function () {
    //     addCart($(this));
    // });
    // // End Bắt sự kiện click vào nút "Thêm vào giỏ hàng"
    // // Sự kiên keyup input số lượng sản phẩm
    // $("body").on("keyup", ".qty-validate", function () {
    //     addCart($(this));
    // });
    // End Sự kiên keyup input số lượng sản phẩm
}

function loadCart() {
    let dataSave = [];

    if (localStorage.getItem('cart')) { // Lấy thông tin giỏ hàng từ loacl
        let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
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
            let link_img = value["link_img"];
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

            // var valuepl = "Ngẫu nhiên";
            // if (datacheck == "1") {
            //     valuepl = pl1_content[datakey1]["phan_loai_hang"];
            // }
            // if (datacheck == "2") {
            //     valuepl = pl1_content[datakey1]["phan_loai_hang"] + "," + pl2_content[datakey2]["phan_loai_hang"]
            // }

            // html = html +
            //     ' <tr class=" li-item-'+ id + '">\n' +
            //     '<th scope="row">\n' +
            //     '<a href="' + link + '" target="_blank">\n' +
            //     '<div class="d-flex">\n' +
            //     '<img src="' + link_img + '" alt="">\n' +
            //     '<div class="content-pro">\n ' +
            //     '<h4 class="text-dark">' + title + '</h4>\n' +
            //     '<p  class="text-dark"><span  class="text-dark">10GB</span> for <span  class="text-dark">16 days</span></p>\n' +
            //     ' </div>\n' +
            //     '</div>\n' +
            //     '</a>\n' +
            //     '</th>\n' +
            //     '<td class="pice-t">$<span id="price">' + price.toLocaleString('en-US') + '</span></td>\n' +
            //     '<td>\n' +
            //     '<div class="quantity-control" data-quantity="">\n' +
            //     '<button class="quantity-btn minus_sp" data-quantity-minus=""><svg viewBox="0 0 409.6 409.6">\n' +
            //     '<g>\n' +
            //     '<g>\n' +
            //     '<path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />\n'+
            //     '</g>\n' +
            //     '</g>\n' +
            //     '</svg></button>\n' +
            //     '<input type="number" class="quantity-input soluong_sp" data-src="' + id + '" id="soluong"  data-quantity-target="" value="' + qty + '" step="1" min="1" max="' + qty + '" name="quantity">\n' +
            //     '<button class="quantity-btn plus_sp right" data-quantity-plus=""><svg viewBox="0 0 426.66667 426.66667">\n' +
            //     '<path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" /></svg>\n' +
            //     '</button>\n' +
            //     '</div>\n' +
            //     '</td>\n' +
            //     '<td class="kq pice-t">\n' +
            //     '<div class="d-flex justify-content-between">\n' +
            //     '<span id="total">$' + format + '</span>\n' +
            //     '<button class="delete-item" data-id="' + id + '"><i class="fa-sharp fa-solid fa-xmark" style="color: #D9D9D9"></i></button>\n' +
            //     ' </div>\n' +
            //     '</td>\n' +
            //     ' </tr>';
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
            // htmltatol =
            //     '   <tr>\n' +
            //     '                                    <td>Total amount of goods</td>\n' +
            //     '                                    <td class="pice-t">$<span id="priced">' + money.toLocaleString('en-US') + '</span></td>\n' +
            //     '                                </tr>\n' +
            //     '                                <tr>\n' +
            //     '                                    <td>The total amount</td>\n' +
            //     '                                    <td class="pice-t"><span>$</span><span id="priced">' + money.toLocaleString('en-US') + '</span></td>\n' +
            //     '                                </tr>'

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

function loadQtyCart() {
    var imgnotcart = $(".carticon").attr("data-cart");
    var imgcart = $(".carticon").attr("data-cart2");
    if (localStorage.getItem('cart')) { // Lấy thông tin giỏ hàng từ loacl
        let cartLocal = localStorage.getItem('cart') ? localStorage.getItem('cart') : "";
        let dataSave = cartLocal ? JSON.parse(cartLocal) : [];

        var dem = 0;
        dataSave.forEach(function (e) {
            dem += e.qty;
        });

        $(".menu__cart .number").text(dem);

        // $(".carticon").attr("src",imgcart);
        // $(".qty__cart").removeClass("d-none");
    } else {
        $(".menu__cart .number").html(0)
        // $(".carticon").attr("src",imgnotcart);
        // $(".qty__cart").addClass("d-none");
    }

}

$(document).ready(function (e) {
    $('.book_now').click(function () {
        var target = $('.menu__cart').first(),
            target_offset = target.offset();

        var target_x = target_offset.left,
            target_y = target_offset.top;

        // console.log('target: ' + target_x + ', ' + target_y);

        var obj_id = 1 + Math.floor(Math.random() * 100000),
            obj_class = 'cart-animation-helper',
            obj_class_id = obj_class + '_' + obj_id;

        var obj = $("<div>", {
            'class': obj_class + ' ' + obj_class_id
        });

        $(this).parent().parent().append(obj);

        var obj_offset = obj.offset(),
            dist_x = target_x - obj_offset.left + 10,
            dist_y = target_y - obj_offset.top + 10,
            delay = 0.8; // seconds

        // console.log('obj_off: ' + obj_offset.left + ', ' + obj_offset.top);

        setTimeout(function () {
            obj.css({
                'transition': 'transform ' + delay + 's ease-in',
                'transform': "translateX(" + dist_x + "px)"
            });
            $('<style>.' + obj_class_id + ':after{ \
				transform: translateY(' + dist_y + 'px); \
				opacity: 1; \
				z-index: 999; \
				border-radius: 100%; \
				max-height: 20px; \
				max-width: 20px; margin: 0; \
			}</style>').appendTo('head');
        }, 0);


        obj.show(1).delay((delay + 0.02) * 1000).hide(1, function () {
            $(obj).remove();
        });
    });
});

function totalNumber() {
    var total = 0;
    // var getSelectedProducts = $('.cart-checkbox:checked').map(function () {
    //     return $(this).attr('data-product-id');
    // }).get();
    var getCart = JSON.parse(localStorage.cart);

    for (let item of getCart) {

        total += (item.qty * item.price);

    }

    $('.total-number').empty();
    $('.total-number').append(total.toLocaleString('en-US') + 'đ');
}

function nexta_pay() {

    var getCart = JSON.parse(localStorage.cart);
    if (getCart.length <= 0) {
        alert("Hãy chọn sản phẩm trước khi thanh toán đơn hàng!");
        $(".submit-cart a").removeAttr("href");
    } else {
        $(".submit-cart a").attr("href", "https://nexta.vn/chi-tiet-thanh-toan/")

    }
}

// var currentHovered = null;
//
// $('.paren').mouseenter(function(){
//     var pr = $(this).attr("data-pra");
//
//     var sub = $('.item-sup[data-sun="' + pr + '"]').attr("data-sun");
//     var su_old = $('.item-sup[data-sun="' + sub + '"][style="display: block"]').attr("data-sun");
//
//     // console.log(sub, pr);
//     // if (pr === sub) {
//     //     $('.item-sup[data-sun="' + pr + '"]').css('display','block');
//     //     $('.item-sup[data-sun="' + pr + '"]').addClass('acti');
//     //     var po =  $('.item-sup.acti[data-sun="' + pr + '"]').attr("data-sun");
//     //     // currentHovered = $('.item-sup[data-sun="' + pr + '"]');
//     // }
//     console.log($('.item-sup[data-sun="' + pr + '"]').attr("data-sun"))
//     if (pr === sub) {
//         $('.item-sup[data-sun="' + pr + '"]').css('display','block');
//     } else {
//         $('.item-sup[data-sun="' + pr + '"]').css('display','none');
//     }
// });

// $('.paren').mouseleave(function(){
//     // Khi rời khỏi '.paren', kiểm tra nếu không hover vào cùng một phần tử nữa
//     if(currentHovered !== null) {
//         $('.item-sup').css('display','none');
//         currentHovered = null;
//     }
// });
const parentEl = $('.paren')
const parentData = $('.paren').attr("data-pra");
const menuChild = $('.menu-child li')

function handleShowMenuChild(e, display) {
    const dataPra = e.currentTarget.getAttribute('data-pra')
    menuChild.each(function(){
        const item = $(this).attr("data-sun");
        if(item === dataPra) {
            $('.item-sup[data-sun="' + item + '"]').css('display', 'block');
        } else {
            $('.item-sup[data-sun="' + item + '"]').css('display', 'none');
        }
    })
    // console.log("dataPra", dataPra)
}

parentEl.mouseover(function (e) {
    handleShowMenuChild(e, 'block')
});
let hasRun = false;

function numberCount() {
    if (!hasRun) {
        hasRun = true;
        for (let i = 1; i < 7; i++) {
            (function(index) {
                var text = $('.number_count_' + index).find('span').text();
                var numberOnly = parseFloat(text.replace(/[.,]/g, '').replace(/[^0-9]/g, ''));
                var targetNumber = numberOnly;
                var count = 0;
                var speed = 500;
                var increment = targetNumber / speed;
                var currentNumber = 0;
                var interval = setInterval(function() {
                    if (currentNumber < targetNumber) {
                        currentNumber += increment;
                        $('.number_count_' + index).find('span').text(Math.ceil(currentNumber) + ' ' + text.replace(/[0-9]/g, ''));
                    } else {
                        clearInterval(interval);
                        $('.number_count_' + index).find('span').text(text);
                    }
                }, 1);
            })(i);
        }
    }
}

// $('.item-sup').mouseover(function(){
//     var child = $(this).attr("data-sun");
//     $('.item-sup[data-sun="' + child + '"]').css('display','block');
//
// });

function Crmform() {
    let urlAjax = $("#urlAjax").val(); // Url ajax
    let namehome = $('input[name="names"]').val();
    let phonehome = $('input[name="tel"]').val();
    let emailhome = $('input[name="email"]').val();
    let contenthome = $('textarea[name="noi-dung"]').val();
    // Corrected file input retrieval
    // let fileinputhome = $('.file-input-note')[0].files[0];
    var form = new FormData();
    // form.append('file', fileinputhome);
    form.append('namehome', namehome);
    form.append('phonehome', phonehome);
    form.append('emailhome', emailhome);
    form.append('contenthome', contenthome);
    form.append('action', 'CrmForm');

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
        success: function () {
            $('.divgif').css('display', 'none');
        }
    })
}