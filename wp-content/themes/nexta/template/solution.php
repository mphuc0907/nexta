<?php
/* Template Name: Solution */
get_header();
?>
<?php
// seciton 1
$group_tutor = get_field('group_tutor');
if ($group_tutor) {
    $title_tutor = $group_tutor['title'];
    $desc_tutor = $group_tutor['desc'];
    $btn_text_tutor = $group_tutor['btn_text'];
    $url_tutor = $group_tutor['url'];
    $img_tutor = $group_tutor['img'];
}
//section 2
$group_why_choose = get_field('group_why_choose');
if ($group_why_choose) {
    $title_why_choose = $group_why_choose['title'];
    $img_why_choose = $group_why_choose['img'];
    $img_why_choose_mobile = $group_why_choose['img_mob'];
}
// section 3
$group_trending = get_field('group_trending');
if ($group_trending) {
    $title_trending = $group_trending['title'];
    $desc_trending = $group_trending['desc'];
    $img_trending = $group_trending['img'];
    $re_trending = $group_trending['re_trending'];
}
// seciton 4
$group_device = get_field('group_device');
if ($group_device) {
    $title_device = $group_device['title'];
    $desc_device = $group_device['desc'];
    $re_device = $group_device['re_utilities'];
}
// section 5
$group_space = get_field('group_space');
if ($group_space) {
    $title_space = $group_space['title'];
    $desc_space = $group_space['desc'];
    $btn_text_space = $group_space['btn_text'];
    $url_space = $group_space['url'];
    $background = $group_space['background'];
    $re_app_utilities = $group_space['re_app_utilities'];
}
// section 6
$group_manager = get_field('group_manager');
if ($group_manager) {
    $title_manager = $group_manager['title'];
    $desc_manager = $group_manager['desc'];
    $re_app_manager = $group_manager['re_app_manager'];
}
// section 7
$group_display = get_field('group_display');
if ($group_display) {
    $title_display = $group_display['title'];
    $slide_display = $group_display['slide'];
}
//section 8
$group_device_nexta = get_field('group_device_nexta');
if ($group_device_nexta) {
    $title_device_nexta = $group_device_nexta['title'];
    $re_product = $group_device_nexta['choose_product'];
}

//section 9
$title_discover = get_field('title_discover');
$desc_discover = get_field('desc_discover');
$gallery_discover = get_field('gallery_discover');
$gallery_dis = get_field('gallery_discover_copy');
// section 10
$group_target = get_field('group_target');
if ($group_target) {
    $title_target = $group_target['title'];
    $re_target = $group_target['re_target'];
}
//section 11
$group_lib = get_field('group_lib');
if ($group_lib) {
    $title_lib = $group_lib['title'];
    $desc_lib = $group_lib['desc'];
    $re_utilities = $group_lib['re_utilities'];
}
// section 12
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
?>

<main class="main">

    <section class="section-solution-1" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-solution.png');">
        <div class="container-fulid" style="height: inherit;">
            <div class="content" data-aos="fade-up">
                <div class="container" style="height: inherit;">
                    <div class="row row-10" style="height: 100%;">
                        <div class="col-lg-6 p-10 col-left">
                            <div class="text">
                                <div class="short">
                                    <h3>
                                        <?= $title_tutor ?>
                                    </h3>

                                        <?= $desc_tutor ?>

                                </div>
                                <div class="list-social">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <figure><img src="<?= get_template_directory_uri() ?>/dist/images/1.svg" alt="icon"></figure>
                                            </div>
                                            <div class="info">
                                                <span>Thiết bị thông minh</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <figure><img src="<?= get_template_directory_uri() ?>/dist/images/2.svg" alt="icon"></figure>
                                            </div>
                                            <div class="info">
                                                <span>Siêu ứng dụng học tập Nexta</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <figure><img src="<?= get_template_directory_uri() ?>/dist/images/3.svg" alt="icon"></figure>
                                            </div>
                                            <div class="info">
                                                <span>Nền tảng công nghệ kết nối an toàn</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="smart-bnt">
                                    <a href="<?= $url_tutor ?>" class="next-bnt">
                                        <?= $btn_text_tutor ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-10 col-right">
                            <div class="detail-img">
                                <figure><img src="<?= getimage($img_tutor) ?>" alt="images"></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-2" data-aos="zoom-in" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_why_choose ?>
                    </h2>
                </div>
                <div class="picture">
                    <figure>
                        <img class="img-pc" src="<?= getimage($img_why_choose) ?>" alt="images">
                        <?php if($img_why_choose_mobile) : ?>
                        <img class="img-mobile" src="<?= getimage($img_why_choose_mobile) ?>" alt="images">
                        <?php endif; ?>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-3" data-aos="fade-right" data-aos-duration="1000">
        <div class="container-fulid">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_trending ?>
                    </h2>

                        <?= $desc_trending ?>

                </div>
                <div class="tabs-solution">
                    <div class="picture">
                        <figure>
                            <img src="<?= getimage($img_trending) ?>" alt="images">
                        </figure>
                    </div>
                    <div class="solu-tabs" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-detail.png');">
                        <div class="tabs-verti">
                            <div class="nav" id="veti-tab" role="tablist" aria-orientation="vertical">
                                <?php foreach ($re_trending as $key => $value) { ?>
                                    <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="solu-<?= $key + 1 ?>" data-bs-toggle="pill" data-bs-target="#solu<?= $key + 1 ?>" type="button" role="tab" aria-controls="solu<?= $key + 1 ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                                        <i class="fal fa-arrow-circle-right"></i>
                                        <span><?= $value['title'] ?></span>
                                    </button>
                                <?php } ?>
                            </div>
                            <div class="tab-content" id="veti-tabContent">
                                <?php foreach ($re_trending as $key => $value) { ?>
                                    <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="solu<?= $key + 1 ?>" role="tabpanel" aria-labelledby="solu-<?= $key + 1 ?>">
                                        <div class="text">
                                            <h3><?= $value['title_big'] ?></h3>
                                            <ul>
                                                <?= $value['desc'] ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-4" >
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_device ?>
                    </h2>

                        <?= $desc_device ?>

                </div>
                <div class="grid-box">
                    <div class="grid-one" data-aos="zoom-in-down" data-aos-duration="1000">
                        <div class="row row-10">
                            <?php foreach ($re_device as $key => $value) :
                                if ($key > 1) {
                                    break;
                                }
                            ?>
                                <div class="col-md-6 col-box p-10">
                                    <div class="box" style="background-image: url('<?= getimage($value['img']) ?>');">
                                        <div class="box-text">  
                                               <h3>
                                            <?= $value['desc'] ?>
                                        </h3>
                                        </div>
                                     
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="grid-two" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="row row-10">
                            <?php foreach ($re_device as $key => $value) :
                                if ($key < 2) {
                                    continue;
                                }
                            ?>
                                <div class="col-lg-4 col-box p-10">
                                    <div class="box" style="background-image: url('<?= getimage($value['img']) ?>');">
                                     <div class="box-text">  
                                        <h3>
                                            <?= $value['desc'] ?>
                                        </h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="list-grid--mobile">
                    <div class="swiper listbox8mSwiper">
                        <div class="swiper-wrapper">
                           <?php foreach ($re_device as $key => $value) : ?>
                            <div class="swiper-slide">
                                <div class="box" style="background-image: url('<?= getimage($value['img']) ?>');">
                                    <h3> <?= $value['desc'] ?> </h3>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-5"
             style="background-image: url('<?= getimage($background) ?>');">
        <div class="container">
            <div class="content">
                <div class="title" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <?= $title_space ?>
                    </h2>

                        <?= $desc_space ?>

                    <a href="<?= $url_space ?>">
                        <?= $btn_text_space ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="tabs-absolute" data-aos="fade-up" data-aos-duration="1000">
            <nav>
                <div class="nav" id="nav-tab" role="tablist">
                    <?php foreach ($re_app_utilities as $key => $value) { ?>
                        <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="abso-<?= $key + 1 ?>" data-bs-toggle="tab" data-bs-target="#abso<?= $key + 1 ?>" type="button" role="tab" aria-controls="abso<?= $key + 1 ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                            <?= $value['title'] ?>
                        </button>
                    <?php } ?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <?php foreach ($re_app_utilities as $key => $value) { ?>
                    <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="abso<?= $key + 1 ?>" role="tabpanel" aria-labelledby="abso-<?= $key + 1 ?>">
                        <div class="container">
                            <div class="desc-tab">
                                <div class="row row-10">
                                    <div class="col-md-6 p-10 col-left">
                                        <div class="text">
                                            <h4><?= $value['title'] ?></h4>
                                            <ul>
                                                <?= $value['desc'] ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-10 col-right">
                                        <div class="picture">
                                            <figure><img src="<?= getimage($value['img']) ?>" alt="images"></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="section-solution-6" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-solution-2.png');">
        <div class="container">
            <div class="content">
                <div class="title" data-aos="zoom-in" data-aos-duration="1000">
                    <h2>
                        <?= $title_manager ?>
                    </h2>

                        <?= $desc_manager ?>

                </div>
                <div class="slide-space" data-aos="fade-up" data-aos-duration="1000">
                    <?php foreach ($re_app_manager as $key => $value) { ?>
                        <div class="space-slide">
                            <div class="box">
                                <div class="picture">
                                    <figure><img src="<?= getimage($value['img']) ?>" alt="images"></figure>
                                </div>
                                <div class="desc">
                                    <h4><?= $value['title'] ?></h4>
                                   <?= $value['desc'] ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-7" data-aos="zoom-in-down" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_display ?>
                    </h2>
                </div>
                <div class="grid-box">
                    <div class="slide-grid">
                        <?php foreach ($slide_display as $key => $value) { ?>
                            <div class="g-item">
                                <div class="col-box">
                                    <div class="picture">
                                        <figure>
                                            <img src="<?= getimage($value['img']) ?>" alt="images">
                                        </figure>
                                    </div>
                                    <?php foreach ($value['re_config'] as $value) { ?>
                                        <div class="box">
                                            <div class="icon">
                                                <figure>
                                                    <img src="<?= getimage($value['icon']) ?>" alt="icon">
                                                </figure>
                                            </div>
                                            <div class="desc">

                                                    <?= $value['desc'] ?>

                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-8" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fulid">
            <div class="content">
                <div class="box-title" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-box.png');">
                    <div class="container">
                        <div class="title">
                            <h2>
                                <?= $title_device_nexta ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="absolute-box">
                    <div class="container">
                        <div class="list-absolute">
                            <div class="row row-10">
                                <?php foreach ($re_product as $key => $value) :
                                    if ($key > 2) {
                                        break;
                                    }
                                    $img_device = $value['img'];
                                    $name = $value['name'];
                                    $link = $value['url'];
                                    $desc = $value['desc'];
                                ?>
                                <div class="col-md-4 p-10 col-item">
                                    <div class="box">
                                        <?php if ($img_device) : ?>
                                        <div class="picture">
                                            <figure>
                                                <img src="<?= getimage($img_device) ?>" alt="images" />
                                            </figure>
                                        </div>
                                        <?php endif; ?>
                                        <div class="desc">
                                            <h4>
                                                <?= $name ?>
                                            </h4>
                                            <p>
                                                <?= $desc ?>
                                            </p>
                                            <a href="<?= $link ?>">
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="list-absolute--mobile">
                            <div class="swiper listbox9mSwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($re_product as $key => $value) :
                                        $img_device = $value['img'];
                                        $name = $value['name'];
                                        $link = $value['url'];
                                        $desc = $value['desc'];

                                        ?>
                                    <div class="swiper-slide">
                                        <div class="col-item">
                                            <div class="box">
                                                <div class="picture">
                                                    <figure>
                                                        <img src="<?= getimage($img_device) ?>" alt="images" />
                                                    </figure>
                                                </div>
                                                <div class="desc">
                                                    <h4>
                                                        <?= $name ?>
                                                    </h4>
                                                    <p>
                                                        <?= $desc ?>
                                                    </p>
                                                    <a href="<?= $link ?>">
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-9" data-aos="fade-down" data-aos-duration="1000"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-solution-3.png');">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_discover ?>
                    </h2>
                    <p>
                        <?= $desc_discover ?>
                    </p>
                </div>
                <div class="gird-layer">
                    <?php
                    $div_classes = ['box box-one', 'box box-two', 'box box-three', 'box box-four', 'box box-one'];
                    $div_keys = [[0], [1, 2], [3], [4, 5], [6]];
                    ?>
                    <?php foreach ($div_classes as $key => $div_class) : ?>
                        <div class="<?= $div_class ?>">
                            <?php foreach ($div_keys[$key] as $value) : ?>
                                <div class="picture">
                                    <figure>
                                        <img src="<?= getimage($gallery_discover[$value]) ?>" alt="images">
                                    </figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="slider">
                    <div class="slideds">
                        <?php foreach ($gallery_dis as $key => $div_class) : ?>
                        <div class="child-element">
                            <div class="picture">
                                <figure>
                                    <img src="<?= getimage($div_class) ?>" alt="images">
                                </figure>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-10" data-aos="zoom-in" data-aos-duration="1000">
        <div class="container-fulid">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_target ?>
                    </h2>
                </div>
                <div class="opacity-slide">
                    <div class="swiper opaSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($re_target as $value) { ?>
                                <div class="swiper-slide">
                                    <div class="box">
                                        <div class="picture">
                                            <figure><img src="<?= getimage($value['img']) ?>" alt="images"></figure>
                                        </div>
                                        <div class="desc">
                                            <h4><?= $value['title'] ?></h4>
                                            <?= $value['desc'] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-solution-11 linesing" id="solution-11"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-solution-4.png');">
        <div class="container">
            <div class="content">
                <div class="title" >
                    <h2>
                        <?= $title_lib ?>
                    </h2>
                    <p>
                        <?= $desc_lib ?>
                    </p>
                </div>
                <div class="list-number" >
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
                                <h4 class="number_count_<?= $key + 1?>" >
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
                <div class="title" data-aos="fade-up" data-aos-duration="1000">
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
                    <div class="col-box" data-aos="fade-right" data-aos-duration="1000">
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
                    <div class="col-box col-middle" data-aos="fade-up" data-aos-duration="1000">
                        <div class="picture">
                            <figure>
                                <img src="<?= getimage($img_method) ?>" alt="img">
                            </figure>
                        </div>
                    </div>
                    <div class="col-box" data-aos="fade-left" data-aos-duration="1000">
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
</main>
<?php get_footer(); ?>

<script>
    $('#slick1').slick({
        rows: 3,
        // centerMode: true,
        // centerPadding: '12px',
        autoplay:true,
        autoplaySpeed: 1000,
        dots: false,
        arrows: false,
        infinite: false,
        swipeToSlide: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        loop:true
    });
    $('.slideds').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        autoplay: true,
        autoplaySpeed: 1000,
        // centerMode: true,
        // centerPadding: "0px",
        arrows:false,

    });

    if ($(".slide-grid .g-item").length > 1) {
        $(".slide-grid").flickity({
            lazyLoad: 2,
            initialIndex: 1,
            pageDots: true,
            prevNextButtons: false,
            contain: true,
            cellAlign: "right",
            imagesLoaded: true,
            draggable: true,
            wrapAround: true,
            autoPlay: 1500,
        });
    }
    const targetElement = document.getElementById('solution-11');
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                numberCount();
                observer.unobserve(entry.target);
            }
        });
    });
    observer.observe(targetElement);
</script>