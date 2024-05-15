<?php
/* Template Name: Homepage */
get_header();
?>
<?php
$group_discover = get_field('group_discover');
if ($group_discover) {
    $title_discover = $group_discover['title'];
    $desc_discover = $group_discover['desc'];
    $btn_text_discover = $group_discover['btn_text'];
    $btn_url_discover = $group_discover['btn_url'];
    $img_discover = $group_discover['img'];
}
//section 2
$group_intro = get_field('group_intro');
if ($group_intro) {
    $title_intro = $group_intro['title'];
    $desc_intro = $group_intro['desc'];
    $btn_text_intro = $group_intro['btn_text'];
    $btn_url_intro = $group_intro['url'];
    $img_intro = $group_intro['img'];
    $re_intro = $group_intro['re_intro'];
}
//section 3
$group_trending = get_field('group_trending');
if ($group_trending) {
    $title_trending = $group_trending['title'];
    $re_nhan_vat = $group_trending['re_nhan_vat'];
}
//section 4
$group_solution = get_field('group_solution');
if ($group_solution) {
    $title_solution = $group_solution['title'];
    $re_solution = $group_solution['re_solution'];
}
//section 5
$group_value = get_field('group_value');
if ($group_value) {
    $title_value = $group_value['title'];
    $re_value = $group_value['re_value'];
}
//section 6
$title_partner = get_field('title_partner');
$gallery_partner = get_field('gallery_partner');
//section 7
$title_listen = get_field('title_listen');
$re_position = get_field('re_position');
//section 8
$group_community = get_field('group_community');
if ($group_community) {
    $title_community = $group_community['title'];
    $desc_community = $group_community['desc'];
    $btn_text_community = $group_community['btn_text'];
    $btn_url_community = $group_community['url'];
    $img_community = $group_community['img'];
}
//section 8 news
$title_news = get_field('title_news');
$choose_category = get_field('choose_category');
$text_btn_news = get_field('text_btn_news');
$url_news = get_field('url_news');
// section 9
$group_about = get_field('group_about');
if ($group_about) {
    $title_about = $group_about['title'];
    $re_list_news = $group_about['re_list_news'];
}
// section 10
$title_form = get_field('title_form');
$embed_form = get_field('embed_form');
$img_form = get_field('img_form');
?>

<main class="main">
    <section class="section-home-1" data-aos="fade-right" data-aos-duration="1000">
        <div class="container-fulid">
            <div class="content">
                <div class="text-left">
                    <div class="text">
                        <h2>
                            <?= $title_discover ?>
                        </h2>

                            <?= $desc_discover ?>

                        <a href=" <?= $btn_url_discover ?>" class="nex-bnt">
                            <?= $btn_text_discover ?>
                        </a>
                    </div>
                </div>
                <?php if ($img_discover) : ?>
                <div class="picture-right">
                    <figure>
                        <img src="<?= getimage2($img_discover) ?>" alt="images">
                    </figure>
                </div>
                <?php endif; ?>
            </div>
            <div class="detail-img">
                <figure><img src="<?= get_template_directory_uri() ?>/dist/images/detail.png" alt="images"></figure>
            </div>
        </div>
    </section>
    <section class="section-home-2" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="box">
                    <div class="row row-10">
                        <div class="col-lg-6 col-left p-10">
                            <div class="text">
                                <h2>
                                    <?= $title_intro ?>
                                </h2>

                                    <?= $desc_intro ?>

                                <a href="<?= $btn_url_intro ?>" class="nex-bnt">
                                    <?= $btn_text_intro ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-right p-10">
                            <?php if ($img_intro) : ?>
                            <div class="picture">
                                <figure>
                                    <img src="<?= getimage2($img_intro) ?>" alt="images">
                                </figure>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="list-box" data-aos="fade-right" >
                    <?php foreach ($re_intro as $item) : ?>
                        <div class="item">
                            <?php if ($item['icon']) : ?>
                            <div class="icon">
                                <figure><img src="<?= getimage2($item['icon']) ?>" alt="images"></figure>
                            </div>
                            <?php endif; ?>
                            <div class="desc">
                                <h4>
                                    <?= $item['title'] ?>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="list-box--mobile">
                    <div class="swiper listbox1mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($re_intro as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <?php if ($item['icon']) : ?>
                                        <div class="icon">
                                            <figure><img src="<?= getimage($item['icon']) ?>" alt="images"></figure>
                                        </div>
                                        <?php endif; ?>
                                        <div class="desc">
                                            <h4>
                                                <?= $item['title'] ?>
                                            </h4>
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
    </section>
    <section class="section-home-3" data-aos="fade-up" data-aos-duration="1000"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-3.png');">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_trending ?>
                    </h2>
                </div>
                <div class="list-box" data-aos="fade-left">
                    <div class="row row-10">
                        <?php foreach ($re_nhan_vat as $item) : ?>
                            <div class="col-md-6 col-lg-4 col-item p-10">
                                <div class="box">
                                    <?php if ($item['icon']) : ?>
                                    <div class="icon">
                                        <figure><img src="<?= getimage($item['icon']) ?>" alt="svg"></figure>
                                    </div>
                                    <?php endif; ?>
                                    <div class="desc">
                                        <h4>
                                            <?= $item['title'] ?>
                                        </h4>

                                            <?= $item['desc'] ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="list-box--mobile">
                    <div class="swiper listbox2mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($re_nhan_vat as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="col-item">
                                        <div class="box">
                                            <?php if ($item['icon']) : ?>
                                            <div class="icon">
                                                <figure><img src="<?= getimage($item['icon']) ?>" alt="svg"></figure>
                                            </div>
                                            <?php endif; ?>
                                            <div class="desc">
                                                <h4>
                                                    <?= $item['title'] ?>
                                                </h4>

                                                    <?= $item['desc'] ?>

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
    </section>
    <section class="section-home-4" data-aos="fade-up data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_solution ?>
                    </h2>
                </div>
                <div class="list-box">
                    <?php foreach ($re_solution as $key => $item) :
                            if($key == 0){
                                $aos = 'fade-left';
                            }
                            if($key == 1){
                                $aos = 'fade-right';
                            }
                            if($key == 2){
                                $aos = 'fade-up';
                            }
                        ?>
                        <div class="box" data-aos="<?= $aos ?>" data-aos-duration="1000">
                            <div class="row row-10 row-flex center-mod">
                                <div class="col-lg-7 p-10 col-img">
                                    <?php if ($item['img']) : ?>
                                    <div class="picture">
                                        <figure>
                                            <img src="<?= getimage($item['img']) ?>" alt="images">
                                        </figure>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-5 p-10 col-list">
                                    <div class="text">
                                        <a href="<?= $item['url'] ?>">
                                            <h3>
                                                <?= $item['title'] ?>
                                            </h3>
                                        </a>

                                            <?= $item['desc'] ?>

                                        <div class="list-item">
                                            <?php foreach ($item['re_utilities'] as $item) : ?>
                                                <div class="item">
                                                    <?php if ($item['icon']) : ?>
                                                    <div class="icon">
                                                        <figure><img src="<?= getimage($item['icon']) ?>" alt="images"></figure>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="desc">
                                                        <h4>
                                                            <?= $item['title'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-home-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_value ?>
                    </h2>
                </div>
                <div class="list-value">
                    <div class="row row-10">
                        <?php foreach ($re_value as $item) : ?>
                            <div class="col-md-6 col-lg-4 p-10 col-item">
                                <div class="box">
                                    <?php if ($item['icon']) : ?>
                                    <div class="icon">
                                        <figure><img src="<?= getimage($item['icon']) ?>" alt="svg"></figure>
                                    </div>
                                    <?php endif; ?>
                                    <div class="desc">
                                        <h4>
                                            <?= $item['title'] ?>
                                        </h4>

                                            <?= $item['desc'] ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="list-value--mobile">
                    <div class="swiper listbox3mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($re_value as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="col-item">
                                        <div class="box">
                                            <?php if ($item['icon']) : ?>
                                            <div class="icon">
                                                <figure><img src="<?= getimage($item['icon']) ?>" alt="svg"></figure>
                                            </div>
                                            <?php endif; ?>
                                            <div class="desc">
                                                <h4>
                                                    <?= $item['title'] ?>
                                                </h4>

                                                    <?= $item['desc'] ?>

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
    </section>
    <section class="section-home-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fulid">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_partner ?>
                    </h2>
                </div>
                <div class="list-partner partnerslideSwiper">
                    <div class="partner-slide swiper-wrapper">
                        <?php foreach ($gallery_partner as $item) : ?>
                            <div class="swiper-slide item">
                                <div class="picture">
                                    <figure><img src="<?= getimage($item) ?>" alt="img"></figure>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-home-7" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="list-slide-tabs">
                    <div class="title" data-aos="fade-right">
                        <h2>
                            <?= $title_listen ?>
                        </h2>
                    </div>
                    <div class="tabs-slide">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <?php foreach ($re_position as $key => $item) : ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="pills-<?= $key ?>" data-bs-toggle="pill" data-bs-target="#pills-tab<?= $key ?>" type="button" role="tab" aria-controls="pills-tab<?= $key ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>"><?= $item['title'] ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <?php foreach ($re_position as $key => $item) : ?>
                                <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="pills-tab<?= $key ?>" role="tabpanel" aria-labelledby="pills-<?= $key ?>">
                                    <div class="box-slide">
                                        <div class="swiper tabslideSwiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($item['re_review'] as $item) : ?>
                                                    <div class="swiper-slide">
                                                        <div class="box">
                                                            <div class="icon">
                                                                <figure><img src="<?= get_template_directory_uri() ?>/dist/images/icon.svg" alt="icon"></figure>
                                                            </div>
                                                            <div class="short">
                                                                <p>
                                                                    <?= $item['quote'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="user">
                                                                <?php if ($item['avatar']) : ?>
                                                                <div class="ava">
                                                                    <figure><img src="<?= getimage($item['avatar']) ?>" alt="images"></figure>
                                                                </div>
                                                                <?php endif; ?>
                                                                <div class="info">
                                                                    <h4>
                                                                        <?= $item['title'] ?>
                                                                    </h4>
                                                                    <p>
                                                                        <?= $item['position'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="button-controls">
                                            <div class="swiper-pagination"></div>
                                            <div class="swiper-nav">
                                                <div class="swiper-button swiper-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                                                <div class="swiper-button swiper-button-next"><i class="fal fa-long-arrow-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-home-8 home-8-new" >
        <div class="container">
            <div class="double-banner">
                <div class="row row-10">
                    <div class="col-lg-6 col-img p-10">
                        <?php if ($img_community) : ?>
                        <div class="picture">
                            <figure>
                                <img src="<?= getimage($img_community) ?>" alt="images">
                            </figure>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-text p-10">
                        <div class="text">
                            <h2>
                                <?= $title_community ?>
                            </h2>

                                <?= $desc_community ?>

                            <a href="<?= $btn_url_community ?>" class=nex-bnt>
                                <?= $btn_text_community ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="section-home-8" >
        <div class="container">
            <div class="content">
                <div class="tabs-news" data-aos="fade-right">
                    <div class="title">
                        <h2>
                            <?= $title_news ?>
                        </h2>
                    </div>
                    <ul class="news-tab">
                        <li rel="#news1" class="new-item">Tất cả</li>
                        <?php foreach ($choose_category as $key => $item) :
                            // get name by term id
                            $term = get_term($item);
                            $item_name = $term->name;
                            ?>
                            <li rel="#news<?= $key + 2 ?>" class="new-item"><?= $item_name ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= $url_news ?>" class="viewmore">
                        <span>
                            <?= $text_btn_news ?>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 5.46967C13.7626 5.17678 14.2374 5.17678 14.5303 5.46967L20.5303 11.4697C20.8232 11.7626 20.8232 12.2374 20.5303 12.5303L14.5303 18.5303C14.2374 18.8232 13.7626 18.8232 13.4697 18.5303C13.1768 18.2374 13.1768 17.7626 13.4697 17.4697L18.1893 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H18.1893L13.4697 6.53033C13.1768 6.23744 13.1768 5.76256 13.4697 5.46967Z" fill="#2D55A5" />
                        </svg>
                    </a>
                </div>
                <div class="news-content"  data-aos="fade-up">
                    <div class="tab-pane" id="news1">
                        <div class="list-news">
                            <div class="row row-10">
                                <?php
                                $args_all = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'post_status' => 'publish',
                                );
                                $query_all = new WP_Query($args_all);
                                ?>
                                <?php if ($query_all->have_posts()) : ?>
                                    <?php while ($query_all->have_posts()) : $query_all->the_post(); ?>
                                        <div class="col-md-6 col-lg-4 col-news">
                                            <article class="blog">
                                                <div class="picture">
                                                    <figure><img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="images"></figure>
                                                </div>
                                                <div class="desc">
                                                    <span class="category">
                                                        <a href="javascript:void(0)"><?= get_the_category()[0]->name ?></a>
                                                    </span>
                                                    <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                                    <p><?= get_the_excerpt() ?></p>
                                                    <time><?= get_the_date() ?></time>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($choose_category as $key => $item) :
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'category__in' => $item,
                        );
                        $query = new WP_Query($args);
                        ?>
                        <div class="tab-pane" id="news<?= $key + 2 ?>">
                            <div class="list-news">
                                <div class="row row-10">
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="col-md-6 col-lg-4 col-news">
                                                <article class="blog">
                                                    <div class="picture">
                                                        <figure><img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="images"></figure>
                                                    </div>
                                                    <div class="desc">
                                                        <span class="category">
                                                            <a href="javascript:void(0)"><?= get_the_category()[0]->name ?></a>
                                                        </span>
                                                        <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                                        <p><?= get_the_excerpt() ?></p>
                                                        <time><?= get_the_date() ?></time>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-home-9">
        <div class="container">
            <div class="content">
                <div class="title" data-aos="fade-down">
                    <h2>
                        <?= $title_about ?>
                    </h2>
                </div>
                <div class="list-sharp">
                    <?php foreach ($re_list_news as $key => $item) :
                            if($key == 0){
                                $aos = 'fade-right';
                            }
                            if($key == 1){
                                $aos = 'fade-left';
                            }
                            if($key == 2){
                                $aos = 'fade-right';
                            }
                        ?>
                        <div class="box-radius" data-aos="<?= $aos ?>" data-aos-duration="1000">
                            <div class="box">
                                <?php if ($item['img']) : ?>
                                <div class="picture">
                                    <figure>
                                        <img src="<?= getimage($item['img']) ?>" alt="images">
                                    </figure>
                                </div>
                                <?php endif; ?>
                                <div class="desc">
                                    <div class="logo">
                                        <figure>
                                            <img src="<?= getimage($item['logo']) ?>" alt="images">
                                        </figure>
                                    </div>
                                    <h4>
                                        <?= $item['title_news'] ?>
                                    </h4>
                                    <a href="<?= $item['url'] ?>" class="viewmore">
                                        <span>
                                            <?= $item['btn_text'] ?>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.707159 7.17715C0.307804 7.23213 -6.92429e-07 7.57953 -6.5568e-07 7.99989C-6.15591e-07 8.45846 0.366312 8.83021 0.818181 8.83021L15.1999 8.83021L10.0047 14.0813L9.92528 14.1743C9.68696 14.4989 9.71243 14.9602 10.0023 15.2556C10.3212 15.5805 10.8392 15.5816 11.1594 15.258L17.7477 8.59955C17.787 8.56142 17.8224 8.51937 17.8536 8.47401C18.0766 8.14976 18.0452 7.69994 17.7593 7.41106L11.1593 0.741931L11.0674 0.661736C10.7466 0.421252 10.2921 0.449044 10.0022 0.74446C9.68342 1.06942 9.68453 1.59515 10.0047 1.91871L15.2012 7.16957L0.818181 7.16957L0.707159 7.17715Z" fill="#2D55A5" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="list-sharp--mobile">
                    <div class="swiper listbox4mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($re_list_news as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="box-radius">
                                        <div class="box">
                                            <div class="picture">
                                                <figure>
                                                    <img src="<?= getimage($item['img']) ?>" alt="images">
                                                </figure>
                                            </div>
                                            <div class="desc">
                                                <div class="logo">
                                                    <figure>
                                                        <img src="<?= getimage($item['logo']) ?>" alt="images">
                                                    </figure>
                                                </div>
                                                <h4>
                                                    <?= $item['title_news'] ?>
                                                </h4>
                                                <a href="<?= $item['url'] ?>" class="viewmore">
                                                    <span>
                                                        <?= $item['btn_text'] ?>
                                                    </span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.707159 7.17715C0.307804 7.23213 -6.92429e-07 7.57953 -6.5568e-07 7.99989C-6.15591e-07 8.45846 0.366312 8.83021 0.818181 8.83021L15.1999 8.83021L10.0047 14.0813L9.92528 14.1743C9.68696 14.4989 9.71243 14.9602 10.0023 15.2556C10.3212 15.5805 10.8392 15.5816 11.1594 15.258L17.7477 8.59955C17.787 8.56142 17.8224 8.51937 17.8536 8.47401C18.0766 8.14976 18.0452 7.69994 17.7593 7.41106L11.1593 0.741931L11.0674 0.661736C10.7466 0.421252 10.2921 0.449044 10.0022 0.74446C9.68342 1.06942 9.68453 1.59515 10.0047 1.91871L15.2012 7.16957L0.818181 7.16957L0.707159 7.17715Z" fill="#2D55A5" />
                                                    </svg>
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
    </section>
    <section class="section-home-10" >
        <div class="container-fulid">
            <div class="content">
                <div class="col-left form" data-aos="fade-right"
                     style="background-image: url(<?= get_template_directory_uri() ?>/dist/images/bg-10.png);">
                        <h2>
                            <?= $title_form ?>
                        </h2>
                        <?= do_shortcode($embed_form) ?>
                </div>
                <div class="col-right" data-aos="fade-left">
                    <div class="picture">
                        <figure>
                            <img src="<?= getimage($img_form) ?>" alt="images">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        $('body').css('overflow-x', 'hidden');
        $(".news-content .tab-pane").hide();
        $(".news-tab").each(function() {
            $(this).find('li:first').addClass("active");
            $(this).closest('.tabs-news').nextAll('.news-content').find('.tab-pane:first').show();
        });
        $(".news-tab li").click(function() {
            var cTab = $(this);
            cTab.siblings('li').removeClass("active");
            cTab.addClass("active");
            cTab.closest('.tabs-news').nextAll('.news-content:first').find('.tab-pane').hide();
            var activeTab = $(this).attr("rel");
            $(activeTab).fadeIn();
            return false;
        });
            // fix height
            var texts = $(' main.main .section-home-9 .content .list-sharp--mobile .box .desc');
            var maxHeight = 0;

            texts.each(function() {
                var height = $(this).outerHeight();
                if (height > maxHeight) {
                    maxHeight = height;
                }
            });

            var maxHeightRem = maxHeight / parseFloat($('html').css('font-size'));
            texts.css('min-height', maxHeightRem + 'rem');
    });
</script>
<script !src="">
    $(document).ready(function($) {

        $('.form .wpcf7 .wpcf7-form').submit(function(event) {
            event.preventDefault();
            Crmform();

        })
    });
</script>