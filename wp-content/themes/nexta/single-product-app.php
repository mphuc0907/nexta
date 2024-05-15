<?php get_header(); ?>

<?php
$id = get_the_ID();
$img_des = get_field('img_des');
$des_low = get_field('des_low');
$reviews = get_field('reviews');
if ($reviews) {
    $star = $reviews['rating_stars'];
    $number_review = $reviews['number_of_reviews'];
}
$group_target = get_field('group_target');
if ($group_target) {
    $title_target = $group_target['title'];
    $re_target = $group_target['re_target'];
}
$group_lib = get_field('group_lib');
if ($group_lib) {
    $title_lib = $group_lib['title'];
    $desc_lib = $group_lib['desc'];
    $re_utilities = $group_lib['re_utilities'];
}
$group_method = get_field('group_method');
if ($group_method) {
    $title_method = $group_method['title'];
    $img_method = $group_method['img'];
    $btn_text_method = $group_method['btn_text'];
    $url_method_ios = $group_method['url_ios'];
    $url_method_android = $group_method['url_android'];
    $icon_method_ios = $group_method['icon_ios'];
    $icon_method_android = $group_method['icon_android'];
    $re_method = $group_method['re_method'];
}
$id = get_the_ID();

$args_post = new WP_Query(array(
    'post_type' => 'product-app',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',

));
$packet_product = get_field('packet_product', $id);
$news = $args_post->posts;
$product_move = get_field('product_move', $id);
?>
<main class="main">

    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li>
                    <a href="<?= home_url() ?>">Trang chủ</a>
                    <figure>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </figure>
                </li>
                <li>
                    <a href="#">Giải pháp học tập cá nhân</a>
                    <figure>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </figure>
                </li>
                <li><a href="#"><?= get_the_title() ?></a></li>
            </ul>
        </div>
    </div>
    <section class="section-1-device-detail section-1-app-intro">
        <div class="container">
            <div class="wrapper row">
                <div class="col-left col-lg-7 col-md-12" style="height: 100%" >
                    <div class="slider-galeria swiper ">
                        <div class="swiper-wrapper">
                            <?php foreach ($img_des as $key => $value) : ?>
                                <div class="swiper-slide">
                                    <div class="child">
                                        <figure>
                                            <img src="<?= getimage($value) ?>" alt="">
                                        </figure>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="slider-galeria-thumbs swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($img_des as $key => $value) : ?>
                                <div class="swiper-slide">
                                    <div class="child">
                                        <figure>
                                            <img src="<?= getimage($value) ?>" alt="">
                                        </figure>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="button-next">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/svg-next.svg" alt="">
                    </div>
                    <div class="button-prev">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/svg-prev.svg" alt="">
                    </div>
                </div>
                <div class="col-right col-lg-4 col-md-12">
                    <div class="list-social">
                        <a href="<?= 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ?>"
                           target="_blank">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/Facebook.png" alt="">
                            </figure>
                        </a>
                        <a href="<?= 'https://twitter.com/intent/tweet?url=' . get_the_permalink() ?>" target="_blank">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/Twitter.png" alt="">
                            </figure>
                        </a>
                        <a href="<?= 'https://www.linkedin.com/shareArticle?url=' . get_the_permalink() ?>"
                           target="_blank">
                            <figure>
                                <img src="<?= get_template_directory_uri() ?>/dist/images/Linkedin.png" alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="review">
                        <div class="star">
                            <?php for ($i = 0; $i < $star; $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="number-review">
                            <span><?= $number_review ?> Lượt đánh giá</span>
                        </div>
                    </div>
                    <div class="product-name">
                        <h2>
                            <?= get_the_title() ?>
                        </h2>
                    </div>
                    <div class="product-desc">
                        <p>
                            <?= $des_low ?>
                        </p>
                    </div>
                    <div class="packages">
                        <?php foreach ($packet_product as $key => $value) : ?>
                            <div class="child">
                                <input type="radio" class="change_packet" data-old="<?= $value['price'] ?>"
                                       data-price="<?= $value['price_packet'] ?>"
                                       name="pack" data-title="<?= get_the_title() . " - " . $value['name_packet'] ?>"
                                       value="<?= $key ?>" id="day-<?= $key ?>">
                                <label for="day-<?= $key ?>" class="time-pack"><?= $value['name_packet'] ?></label>
                            </div>
                        <?php endforeach; ?>
                        <div class="price-sale">
                            <span style="display: block"
                                  id="price_packet"><?= number_format($price, 0, ',', '.') ?>đ</span>
                            <div class="price gia_goc" style="display: none">
                                <span>Giá gốc: </span><span class="text-decoration-line-through" id="old-price">

                            </span>
                            </div>
                        </div>
                        <button class="btn btn-trial" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                            Dùng thử
                        </button>
                        <div class="action btn-oi" style="display:none;">
                            <a href="javascript:;" id="add-data"
                               class="btn btn-add-cart add-to-cart book_now book_now_<?= get_the_ID() ?>"
                                data-text="add-cart"
                               data-link="<?php echo get_permalink($id) ?>"
                               data-maxqty="<?= get_field('qty', $id) ?>"
                               data-id="<?= $id ?>"
                               data-img="<?php echo checkImage($id) ?>">Thêm vào giỏ hàng</a>

                            <a href="javascript:;" class="btn btn-buy-now"
                               data-id="<?= $id ?>"
                               id="buy_now"
                               data-maxqty="<?= get_field('qty',$id) ?>"
                               data-text="buy-now"
                               data-link="<?php echo get_permalink($id) ?>"
                               data-img="<?php echo checkImage($id) ?>"
                               data-price="<?= $value['price_packet'] ?>" >
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade modal-form" id="exampleModalToggle" aria-hidden="true"
         aria-labelledby="exampleModalToggleLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="form">
                    <div class="title">
                        <h3>Trải nghiệm 7 ngày miễn phí
                            gói Siêu ứng dụng</h3>
                        <!--                        <p>Lớp học chuyển đổi số cơ bản</p>-->
                    </div>
                    <form id="form-trial" action="" method="post">
                        <div class="div">
                            <div class="form-popup">
                                <div class="input-gr">
                                    <label for="">Họ và tên<span>*</span></label>
                                    <input type="text" placeholder="Nhập tên của bạn" name="name">
                                </div>
                                <div class="input-gr">
                                    <label for="">Email<span>*</span></label>
                                    <input type="email" placeholder="Nhập email của bạn" name="email">
                                </div>
                                <div class="input-gr">
                                    <label for="">Số điện thoại<span>*</span></label>
                                    <input type="tel" placeholder="Nhập số điện thoại của bạn" name="phone">
                                </div>
                                <div class="input-gr">
                                    <label for="">Địa chỉ<span>*</span></label>
                                    <input type="text" placeholder="Nhập địa chỉ của bạn" name="address">
                                </div>
                                <div class="input-gr">
                                    <label for="">Ghi chú</label>
                                    <input type="text" placeholder="Nhập lời nhắn của bạn" name="note">
                                </div>
                            </div>
                            <div class="btn">
                                <button type="button" id="btn_submit">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <section class="section-2-app-intro ">
        <div class="container">
            <div class="title-section">
                <h2>
                    <?= $title_target ?>
                </h2>
            </div>
            <div class="list-target row">
                <?php foreach ($re_target as $key => $value) : ?>
                    <div class="child col-lg-4 col-md-6 col-sm-6">
                        <div class="content-wrapper">
                            <figure>
                                <img src="<?= getimage($value['img']) ?>" alt="">
                            </figure>
                            <div class="text">
                                <div class="title">
                                    <h4><?= $value['title'] ?></h4>
                                </div>
                                <div class="desc">

                                    <?= $value['desc'] ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section-solution-11 " id="solution-11-app"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-solution-4.png');">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_lib ?>
                    </h2>

                    <?= $desc_lib ?>

                </div>
                <div class="list-number">
                    <?php foreach ($re_utilities as $key => $value) { ?>
                        <div class="box">
                            <div class="icon">
                                <div class="picture">
                                    <figure>
                                        <img src="<?= getimage($value['icon']) ?>" alt="images">
                                    </figure>
                                </div>
                            </div>
                            <div class="desc">
                                <h4 class="number_count_<?= $key + 1 ?>">
                                    <?= $value['quantity'] ?>
                                </h4>

                                <?= $value['desc'] ?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-12">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_method ?>
                    </h2>
                    <span class="trial">
                        Tải app dùng thử miễn phí
                    </span>
                    <div class="link-download">
                        <a href="<?= $url_method_ios ?>" download="">
                            <img src="<?= getimage($icon_method_ios) ?>" alt="">
                        </a>
                        <a href="<?= $url_method_android ?>" download="">
                            <img src="<?= getimage($icon_method_android) ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid-box">
                    <div class="col-box">
                        <?php foreach ($re_method as $key => $value) :
                            if ($key > 2) {
                                break;
                            }
                            ?>
                            <div class="box">
                                <div class="icon">
                                    <figure>
                                        <img src="<?= getimage($value['icon']) ?>" alt="icon">
                                    </figure>
                                </div>
                                <div class="desc">
                                    <h4>
                                        <?= $value['title'] ?>
                                    </h4>

                                    <?= $value['desc'] ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-box col-middle">
                        <div class="picture">
                            <figure>
                                <img src="<?= getimage($img_method) ?>" alt="img">
                            </figure>
                        </div>
                    </div>
                    <div class="col-box">
                        <?php foreach ($re_method as $key => $value) :
                            if ($key < 3) {
                                continue;
                            }
                            ?>
                            <div class="box">
                                <div class="icon">
                                    <figure>
                                        <img src="<?= getimage($value['icon']) ?>" alt="icon">
                                    </figure>
                                </div>
                                <div class="desc">
                                    <h4>
                                        <?= $value['title'] ?>
                                    </h4>

                                    <?= $value['desc'] ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="div-slider slick-wrapper">
                    <div id="slick1">
                    <?php foreach ($re_method as $key => $value) :
                    ?>
                    <div class="slider-item">
                        <div class="box">
                            <div class="icon">
                                <figure>
                                    <img src="<?= getimage($value['icon']) ?>" alt="icon">
                                </figure>
                            </div>
                            <div class="desc">
                                <h4>
                                    <?= $value['title'] ?>
                                </h4>

                                <?= $value['desc'] ?>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-3-device section-3-detail section-4-app-intro">
        <div class="container">
            <div class="title-general">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="list-device row">
                <?php foreach ($product_move as $key => $value)  :

                    ?>
                    <input type="hidden" data-src="<?= $value->ID ?>" id="soluong" name="quantity"
                           data-quantity-target="" min="1" value="1" readonly>
                    <div class="item col-lg-4 col-md-6">
                        <div class="image">
                            <figure>
                                <a href="<?= get_permalink($value->ID) ?>">
                                    <img src="<?= checkImage($value->ID) ?>" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="category">
                            <a href="<?= home_url() . '/may-tinh-bang-hoc-tap-thong-minh' ?>">
                                <span>Thiết bị thông minh</span>
                            </a>
                        </div>
                        <div class="name-product">
                            <a href="<?= get_permalink($value->ID) ?>">
                                <span><?= $value->post_title ?></span>
                            </a>
                        </div>
                        <div class="desc-product">
                            <p>
                                <?= get_field('des_low', $value->ID) ?>
                            </p>
                        </div>
                        <div class="price-sale-product">
                            <?php if (!empty(get_field('price', $value->ID))) : ?>
                                <span><?= number_format(get_field('price', $value->ID), 0, ',', '.') ?>đ</span>
                            <?php else: ?>
                                <span>Giá liên hệ</span>
                            <?php endif; ?>
                        </div>
                        <div class="price-product">
                            <?php if (!empty(get_field('old_price', $value->ID))) : ?>
                                <span>Giá gốc:</span> <span
                                        class="price text-decoration-line-through"><?= get_field('old_price', $value->ID) ?>đ</span>
                            <?php endif; ?>
                        </div>
                        <div class="action">
                            <a href="javascript:;"
                               class="btn btn-add-cart add-to-cart book_now book_now_<?= $value->ID ?>"
                               data-id="<?= $value->ID ?>" data-title="<?= $value->post_title ?>" data-text="add-cart"
                               data-link="<?php echo get_permalink($value->ID) ?>" data-id="<?= $value->ID ?>"
                               data-img="<?php echo checkImage($value->ID) ?>"
                               data-price="<?= get_field('price', $value->ID) ?>">Thêm vào giỏ hàng</a>
                            <a href="javascript:;" class="btn btn-buy-now" data-id="<?= $value->ID ?>" data-maxqty="<?= get_field('qty',$value->ID) ?>" data-title="<?= $value->post_title ?>" data-text="buy-now" data-link="<?php echo get_permalink($value->ID) ?>" data-img="<?php echo checkImage($value->ID) ?>" data-price="<?= get_field('price',$value->ID) ?>">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                <?php


                endforeach; ?>
            </div>
        </div>
    </section>
</main>
<input type="hidden" id="urlAjax" value="<?= admin_url() ?>admin-ajax.php">
<style>
</style>
<?php get_footer(); ?>
<script>
    $(".add-to-cart").on("click", function () {
        addToCart($(this));
    });
    const targetElement = document.getElementById('solution-11-app');
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                numberCount();
                observer.unobserve(entry.target);
            }
        });
    });
    observer.observe(targetElement);
    function buyNow(thiss) {
        var link_img = thiss.attr("data-img");
        var link = thiss.attr("data-link");
        var id = thiss.attr("data-id");
        var maxqty = parseInt(thiss.attr('data-maxqty'));
        var title = thiss.attr("data-title");
        var button = thiss.attr("data-text");
        var price = parseInt(thiss.attr("data-price"));
        var product = {
            id: id,
            title: title,
            price: price,
            qty: 1,
            img: link_img,
            link: link
        };
        var buyNowLocal = JSON.parse(localStorage.getItem("buyNow"));
        if (buyNowLocal == null) {
            buyNowLocal = [];
        }
        var check = false;
        for (var i = 0; i < buyNowLocal.length; i++) {
            if (buyNowLocal[i].id == product.id) {
                check = true;
                break;
            }
        }
        if (!check) {
            buyNowLocal.push(product);
        }
        localStorage.setItem("buyNow", JSON.stringify(buyNowLocal));
        setTimeout(function() {
            window.location.href = '<?= home_url() ?>/chi-tiet-thanh-toan/';
        }, 1000);
    }
    $(".btn-buy-now").on("click", function() {
        buyNow($(this));
    });

    $('#price_packet').text('Miễn phí');
    $('.nextButton').css('bottom', '6rem');
    $("body").on("change", ".change_packet", function () {
        $('#price_packet').css('display', 'block');
        var selecteMethot = $('input[name="pack"]:checked').val();
        var selecte = $('input[name="pack"]:checked').attr("data-price");
        var oldselecrte = $('input[name="pack"]:checked').attr("data-old");
        var title = $('input[name="pack"]:checked').attr("data-title");
        let i;
        for (i = 0; i < 9; i++) {
            if (selecteMethot == i) {
                if (selecte === '0') {
                    $('#price_packet').text('Miễn phí');
                    $('.nextButton').css('bottom', '6rem');
                    $('.btn-trial').css('display', 'block');
                    $('.btn-oi').css('display', 'none');
                    $('.gia_goc').css('display', 'none');
                } else {
                    let price = parseInt(selecte);
                    let old = parseInt(oldselecrte);
                    $('.btn-trial').css('display', 'none');
                    $('#add-data').attr('data-price', price);
                    $('#add-data').attr('data-title', title);
                    $('#buy_now').attr('data-price', price);
                    $('#buy_now').attr('data-title', title);
                    $('.nextButton').css('bottom', '6.6rem');
                    $('.btn-oi').css('display', 'flex  ');
                    $('.gia_goc').css('display', 'block');
                    $('#price_packet').text(price.toLocaleString('en-US') + ' đ');
                    $('#old-price').text(old.toLocaleString('en-US') + ' đ')
                }
            }
        }

    });
    var galleryThumbs = new Swiper('.slider-galeria-thumbs', {
        speed: 1000,
        loop: true,
        slideToClickedSlide: true,
        // next and prev buttons
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        breakpoints: {
            0: {
                navigation: {
                    nextEl: '.button-next',
                    prevEl: '.button-prev',
                },
                slidesPerView: 1,
                spaceBetween: 10,
                loopedSlides: 2,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
                loopedSlides: 3,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 24,
                loopedSlides: 4,
            }
        }
    });
    var galleryTop = new Swiper('.slider-galeria', {
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 1000,
        loop: true,
        loopedSlides: 4,
        breakpoints: {
            0: {
                loopedSlides: 1,
                navigation: {
                    nextEl: '.button-next',
                    prevEl: '.button-prev',
                },
            },
            640: {
                loopedSlides: 3,
            },
            1024: {
                loopedSlides: 4,
            }
        },
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
    $('.btn-minus').addClass('disabled');
    $('.btn-plus').click(function () {
        var value = parseInt($(this).prev('input').val());
        // bỏ disabled
        $('.btn-minus').removeClass('disabled');
        $(this).prev('input').val(value + 1);
    });
    $('.btn-minus').click(function () {
        var value = parseInt($(this).next('input').val());
        if (value > 1) {
            $(this).next('input').val(value - 1);
        }
        if (value == 1) {
            $(this).addClass('disabled');
        }
    });
    $(document).ready(function () {
        // checked input đầu tiên
        $('input[name="pack"]:first').prop('checked', true);
        var texts = $('.section-2-app-intro .container .list-target .child .content-wrapper .text');
        var maxHeight = 0;

        texts.each(function () {
            var height = $(this).outerHeight();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        var maxHeightRem = maxHeight / parseFloat($('html').css('font-size'));
        texts.css('min-height', maxHeightRem + 'rem');

        $(window).scroll(function () {
            if ($(window).scrollTop() > $('.section-1-device-detail').height() + 200) {
                $('.col-right').addClass('fixed');
            } else {
                $('.col-right').removeClass('fixed');
            }
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 1200) {
                $('.col-right').addClass('fixed-bot');
            } else {
                $('.col-right').removeClass('fixed-bot');
            }
        });
        if ($('.list-device .item').length > 3) {
            $('.list-device').css('max-width', '54rem');
        }
    });
    $('#slick1').slick({
        rows: 3,
        // centerMode: true,
        // centerPadding: '12px',
        autoplay:true,
        autoplaySpeed:1000,
        dots: false,
        arrows: false,
        infinite: false,
        swipeToSlide: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        loop:true
    });
</script>
<script>
    $(document).ready(function () {
        // fix height
        var texts = $(' main .section-solution-12 .content .grid-box .col-box .box');
        var maxHeight = 0;

        texts.each(function() {
            var height = $(this).outerHeight();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        var maxHeightRem = maxHeight / parseFloat($('html').css('font-size'));
        texts.css('min-height', maxHeightRem + 'rem');
        // ajax
        $('body').on('click', '#btn_submit', function (e) {
            //get data từ form
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
            var address = $("input[name='address']").val();
            var note = $("input[name='note']").val();
            // validation with regex
            var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var regexPhone = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
            if (name == '') {
                Swal.fire({
                    icon: 'error',
                    text: 'Vui lòng nhập họ và tên'
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
            var ajaxurl = $('#urlAjax').val();
            e.preventDefault();
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                cache: false,
                dataType: "json",
                data: {
                    name,
                    email,
                    phone,
                    address,
                    note,
                    action: 'reg_app',
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (response) {
                    $('.divgif').css('display', 'none');
                    if (response.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: response.message
                        });
                    }
                }
            });
            return false;
        });
        // texts2.css('min-height', maxHeightRem + 'rem');
    });
</script>