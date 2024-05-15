<?php
/* Template Name: smart */
get_header();
$chose_pr = get_field('chose_pr');

$argss = new WP_Query(array(
    'post_type' => 'smart_screen',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'order' => 'ASC',
    'orderby' => 'date',
//    'tax_query' => array(                     //(array) - Lấy bài viết dựa theo taxonomy
//        'relation' => 'AND',                      //(string) - Mối quan hệ giữa các tham số bên trong, AND hoặc OR
//        array(
//            'taxonomy' => 'category_produoct',                //(string) - Tên của taxonomy
//            'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
//            'terms' => "thiet-bi-thong-minh",    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
////            'include_children' => true,           //(bool) - Lấy category con, true hoặc false
//            'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
//        ),
//    ),
));

$news_hot = $argss->posts;

$argss1 = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'order' => 'ASC',
    'orderby' => 'date',
//    'tax_query' => array(                     //(array) - Lấy bài viết dựa theo taxonomy
//        'relation' => 'AND',                      //(string) - Mối quan hệ giữa các tham số bên trong, AND hoặc OR
//        array(
//            'taxonomy' => 'category_produoct',                //(string) - Tên của taxonomy
//            'field' => 'slug',                    //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
//            'terms' => "san-pham-lien-quan",    //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
////            'include_children' => true,           //(bool) - Lấy category con, true hoặc false
//            'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
//        ),
//    ),
));

$news_hot2 = $argss1->posts;
$re_features = get_field('re_features');
$re_trending = get_field('re_trending');

?>
    <main class="main">
        <section class="banner-page">
            <div class="bg-video">
                <img src="<?= get_field('img_banner') ?>" alt="">
                <div class="content-main">
                    <div class="title">
                        <h3><?= get_field('title_banner') ?></h3>
                    </div>
                    <div class="des">
                        <?= get_field('desc') ?>
                    </div>
                </div>
            </div>

        </section>
        <section class="section trend-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="title-gradient">
                    <h3>
                        <?= get_field('title_trending') ?>
                    </h3>
                    <?= get_field('desc_trending') ?>
                </div>
                <div class="content">
                    <div class="img">
                        <picture>
                            <img src="<?= get_field('img_trending') ?>" alt="">
                        </picture>
                    </div>
                    <div class="tab-content">
                        <div class="accordion" id="accordionExample">
                            <?php foreach ($re_trending as $key => $value) :?>

                            <div class="accordion-item">
                                <h2 class="accordion-header collapsed" id="heading<?= $key ?>" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>">
                                    <?= $value['icon'] ?>
                                    <span><?= $value['title'] ?></span>

                                </h2>
                                <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= $value['desc'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="characteristic section" data-aos="fade-right" data-aos-duration="1000"  data-aos-delay="300">
            <div class="container">
                <div class="title">
                    <h3><?= get_field('title_features') ?></h3>
                    <?= get_field('desc_features') ?>
                </div>
                <div class="grid-box">
                    <div class="box-text">
                        <?php foreach ($re_features as $key => $value) :?>
                        <?php if ($key <= 1) :?>
                        <div class="box">
                            <div class="icon">
                                <img src="<?= $value['icon'] ?>" alt="">
                            </div>
                            <h3>
                                <?= $value['desc'] ?>
                            </h3>

                        </div>
                                <?php endif; ?>
                        <?php endforeach;?>
                    </div>
                    <div class="box-img">
                        <div class="image">
                            <img src="<?= get_field('img_features') ?>" alt="images">
                        </div>
                    </div>
                    <div class="box-text">
                        <?php foreach ($re_features as $key => $value) :
                                if ($key >3){
                                    break;
                                }
                            ?>
                            <?php if ($key >= 2) :?>
                                <div class="box">
                                    <div class="icon">
                                        <img src="<?= $value['icon'] ?>" alt="">

                                    </div>
                                    <h3>
                                        <?= $value['desc'] ?>
                                    </h3>

                                </div>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-3-device" data-aos="fade-left" data-aos-duration="1000"  data-aos-delay="300">
            <div class="container">
                <div class="title-section">
                    <h2>
                        <?= get_field('title_screen') ?>
                    </h2>
                </div>
                <div class="list-device row">
                    <?php foreach ($news_hot as $key => $value) :
                        $term_list = get_the_terms($value->ID, 'category_produoct');
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
                                <?php foreach ($term_list as $key => $val) :?>
                                    <span><?= $val->name ?></span>
                                <?php endforeach;?>
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
                                <?php if(!empty(get_field('price', $value->ID))) :?>
                                    <span style="color: #3F3D48"><?= number_format(get_field('price', $value->ID), 0, ',', '.')  ?>đ</span>
                                <?php else:?>
                                    <span style="color: #3F3D48">Giá liên hệ</span>
                                <?php endif;?>
                            </div>
                            <div class="price-product">
                                <?php if(!empty(get_field('old_price', $value->ID))) :?>
                                    <span style="color: #3F3D48">Giá gốc:</span> <span style="color: #3F3D48" class="price text-decoration-line-through"><?= get_field('old_price', $value->ID) ?>đ</span>
                                <?php endif;?>
                            </div>
                            <?php if (get_field('price', $value->ID) == 0 || empty(get_field('price', $value->ID))) :?>
                            <div class="action">
                                <a class="btn-trial" style="text-align: center" href="<?= get_permalink($value->ID) ?>">Xem chi tiết</a>
                            </div>
                            <?php else:?>
                                <div class="action">
                                    <a href="javascript:;" class="btn btn-add-cart add-to-cart book_now book_now_<?= $value->ID ?>" data-id="<?= $value->ID ?>" data-maxqty="<?= get_field('qty',$value->ID) ?>"  data-title="<?= $value->post_title ?>" data-text="add-cart" data-link="<?php echo get_permalink($value->ID) ?>" data-id="<?= $value->ID ?>" data-img="<?php echo checkImage($value->ID) ?>" data-price="<?= get_field('price',$value->ID) ?>">Thêm vào giỏ hàng</a>
                                    <a href="javascript:;" class="btn btn-buy-now" data-id="<?= $value->ID ?>" data-maxqty="<?= get_field('qty',$value->ID) ?>" data-title="<?= $value->post_title ?>" data-text="buy-now" data-link="<?php echo get_permalink($value->ID) ?>" data-img="<?php echo checkImage($value->ID) ?>" data-price="<?= get_field('price',$value->ID) ?>">
                                        Mua ngay
                                    </a>
                                </div>
                            <?php endif;?>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <section class="section-4-device section-3-device" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300">
            <div class="container">
                <div class="title-section">
                    <h3 style="text-align: start">Sản phẩm liên quan</h3>
                </div>
                <div class="list-device row">
                    <?php foreach ($chose_pr as $key => $value) :
                        $term_list = get_the_terms($value->ID, 'category_produoct');
                        ?>
                        <div class="item col-lg-4 col-md-6">
                            <div class="image">
                                <figure>
                                    <a href="<?= get_permalink($value->ID) ?>">
                                        <img src="<?= checkImage($value->ID) ?>" alt="">
                                    </a>
                                </figure>
                            </div>
                            <div class="category">
                                <?php foreach ($term_list as $key => $val) :?>
                                    <a href="<?= home_url() . '/may-tinh-bang-hoc-tap-thong-minh/' ?>">
                                        <span><?= $val->name ?></span>
                                    </a>
                                <?php endforeach;?>
                            </div>
                            <div class="name-product">
                                <span><?= $value->post_title ?></span>
                            </div>
                            <div class="desc-product">
                                <p><?= get_field('des_low', $value->ID) ?></p>
                            </div>
                            <div class="action">
                                <a href="javascript:;" class="btn btn-add-cart add-to-cart book_now book_now_<?= $value->ID ?>" data-id="<?= $value->ID ?>" data-maxqty="<?= get_field('qty',$value->ID) ?>"  data-title="<?= $value->post_title ?>" data-text="add-cart" data-link="<?php echo get_permalink($value->ID) ?>" data-id="<?= $value->ID ?>" data-img="<?php echo checkImage($value->ID) ?>" data-price="<?= get_field('price',$value->ID) ?>">Thêm vào giỏ hàng</a>
                                <a href="javascript:;" class="btn btn-buy-now" data-id="<?= $value->ID ?>" data-maxqty="<?= get_field('qty',$value->ID) ?>" data-title="<?= $value->post_title ?>" data-text="buy-now" data-link="<?php echo get_permalink($value->ID) ?>" data-img="<?php echo checkImage($value->ID) ?>" data-price="<?= get_field('price',$value->ID) ?>">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
        </section>
    </main>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        var getslide = $('.fan-tabs .fan-box').length - 1;
        var slidecal = 50 / getslide + '%';
        $('.fan-box').css({
            "width": slidecal
        });
        $('.fan-tabs .fan-box:first-child').addClass('show');
        $('.fan-box').click(function() {
            $('.fan-box').removeClass('show');
            $(this).addClass('show');
        });
    });
    $(".add-to-cart").on("click", function() {
        addToCart($(this));
    });
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
</script>
