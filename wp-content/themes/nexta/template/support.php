<?php
/* Template Name: Hỗ trọ khách hàng     */
get_header();
$group_banner = get_field('group_banner');
if($group_banner){
    $img_banner = $group_banner['img'];
    $title_banner = $group_banner['title'];
    $desc_banner = $group_banner['desc'];
    $img_person = $group_banner['img_person'];
}
$title_guide = get_field('title_guide');
$re_guide = get_field('re_guide');
// section 3
$title_policy = get_field('title_policy');
$re_policy = get_field('re_policy');
// section 4
$title_form = get_field('title_form');
$desc_form = get_field('desc_form');
$embed_form = get_field('embed_form');
$background_form = get_field('background_form');
?>
<style>
    .wpcf7-response-output {
        color: #000;
    }
</style>
<main class="main">
    <section class="section-solution-1 section-support" style="background-image: url('<?= getimage($img_banner) ?>');">
        <div class="container-fulid" style="height: inherit;">
            <div class="content">
                <div class="container" style="height: inherit;">
                    <div class="text">
                        <div class="short">
                            <h3>
                                <?= $title_banner ?>
                            </h3>

                                <?= $desc_banner ?>

                        </div>

                    </div>
                </div>
                <div class="detail-img">
                    <figure>
                        <img src="<?= getimage($img_person) ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="section-support-1" id="support-1">
        <div class="tab-post">
            <div class="container">
                <div class="title">
                    <h3>
                        <?= $title_guide ?>
                    </h3>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php foreach ($re_guide as $key => $value) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $key ?>" type="button" role="tab" aria-controls="pills-<?= $key ?>" aria-selected="true"><?= $value['title_tab'] ?></button>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <?php foreach ($re_guide as $key => $value) {

                ?>
            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="pills-<?= $key ?>" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php if (count($value['re_list_guide']) >= 3) :?>
                <div class="myswiper">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($value['re_list_guide'] as $item) { ?>
                            <div class="swiper-slide">
                                <div class="content-slider">
                                    <div class="video">
                                        <a data-fancybox href="<?= $item['embed_video'] ?>">
                                        <img src="<?= $item['img_note'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <div class="tab">
                                            <span>
                                                <?= $item['category'] ?>
                                            </span>
                                        </div>
                                        <div class="des">
                                            <h3>
                                                <?= $item['title'] ?>
                                            </h3>

                                                <?= $item['desc'] ?>

                                        </div>
                                        <div class="btn">
                                           <a href="<?= $item['url'] ?>">
                                               <button>
                                                   <span><?= $item['btn_text'] ?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 5.46967C13.7626 5.17678 14.2374 5.17678 14.5303 5.46967L20.5303 11.4697C20.8232 11.7626 20.8232 12.2374 20.5303 12.5303L14.5303 18.5303C14.2374 18.8232 13.7626 18.8232 13.4697 18.5303C13.1768 18.2374 13.1768 17.7626 13.4697 17.4697L18.1893 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H18.1893L13.4697 6.53033C13.1768 6.23744 13.1768 5.76256 13.4697 5.46967Z" fill="white"/>
                                                   </svg>
                                               </button>
                                           </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <?php elseif (count($value['re_list_guide']) == 2) :?>
                <div class="row-2">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($value['re_list_guide'] as $item) { ?>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="content-slider">
                                    <div class="video">
                                        <a data-fancybox href="<?= $item['embed_video'] ?>">
                                            <img src="<?= $item['img_note'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <div class="tab">
                                            <span>
                                                <?= $item['category'] ?>
                                            </span>
                                        </div>
                                        <div class="des">
                                            <h3>
                                                <?= $item['title'] ?>
                                            </h3>

                                            <?= $item['desc'] ?>

                                        </div>
                                        <div class="btn">
                                            <a href="<?= $item['url'] ?>">
                                                <button>
                                                    <span><?= $item['btn_text'] ?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 5.46967C13.7626 5.17678 14.2374 5.17678 14.5303 5.46967L20.5303 11.4697C20.8232 11.7626 20.8232 12.2374 20.5303 12.5303L14.5303 18.5303C14.2374 18.8232 13.7626 18.8232 13.4697 18.5303C13.1768 18.2374 13.1768 17.7626 13.4697 17.4697L18.1893 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H18.1893L13.4697 6.53033C13.1768 6.23744 13.1768 5.76256 13.4697 5.46967Z" fill="white"/>
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>

                <?php elseif(count($value['re_list_guide']) == 1):?>
                    <div class="row-1">
                        <div class="container">
                            <?php foreach ($value['re_list_guide'] as $item) { ?>
                            <div class="content-slider">
                                <div class="video">
                                    <a data-fancybox href="<?= $item['embed_video'] ?>">
                                        <img src="<?= $item['img_note'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="content-box">
                                    <div class="tab">
                                            <span>
                                                <?= $item['category'] ?>
                                            </span>
                                    </div>
                                    <div class="des">
                                        <h3>
                                            <?= $item['title'] ?>
                                        </h3>

                                        <?= $item['desc'] ?>

                                    </div>
                                    <div class="btn">
                                        <a href="<?= $item['url'] ?>">
                                            <button>
                                                <span><?= $item['btn_text'] ?></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 5.46967C13.7626 5.17678 14.2374 5.17678 14.5303 5.46967L20.5303 11.4697C20.8232 11.7626 20.8232 12.2374 20.5303 12.5303L14.5303 18.5303C14.2374 18.8232 13.7626 18.8232 13.4697 18.5303C13.1768 18.2374 13.1768 17.7626 13.4697 17.4697L18.1893 12.75H4C3.58579 12.75 3.25 12.4142 3.25 12C3.25 11.5858 3.58579 11.25 4 11.25H18.1893L13.4697 6.53033C13.1768 6.23744 13.1768 5.76256 13.4697 5.46967Z" fill="white"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <?php } ?>
        </div>
    </section>
    <section class="section-news section-event content-poly section-sup">
        <div class="container">
            <div class="wrapper">
                <div class="col-left los">
                    <h2>Câu hỏi thường gặp</h2>
                    <div class="tabs-control">
                        <ul>
                            <?php foreach ($re_policy as $key => $value) { ?>
                                <li class="<?= $key == 0 ? 'active' : '' ?>">
                                    <a href="#<?= $key + 1 ?>">
                                        <?= $value['title_tab'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-right">

                    <div class="tabs-content">
                        <?php foreach ($re_policy as $key => $value) { ?>
                        <div class="tab-pane <?= $key == 0 ? 'active' : '' ?>" id="<?= $key + 1 ?>">
                            <div class="content">
                                <div class="accordion" id="accordionPanelsStayOpenExample">

                                    <?php foreach ($value['re_policy_detail'] as $key => $item) { ?>
                                    <div class="accordion-item note">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button <?= $key == 0 ? '' : 'collapsed' ?>"
                                                    type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $key ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?= $key ?>">
                                               <h4>
                                                    <?= $item['title'] ?>
                                               </h4>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse<?= $key ?>" class="accordion-collapse collapse <?= $key == 0 ? 'show' : '' ?>" aria-labelledby="panelsStayOpen-heading<?= $key ?>">
                                            <div class="accordion-body">

                                                    <?= $item['desc'] ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-suppotor-2" style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/Frame 1000008017.png')">
        <div class="container">
            <div class="form-spo">
                <div class="content">
                    <h3>
                        <?= $title_form ?>
                    </h3>

                        <?= $desc_form ?>

                </div>
                <?= do_shortcode($embed_form) ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script !src="">

    if ($(".swiper .swiper-slide").length > 1) {
        var opaSwiper = new Swiper(".swiper", {
            grabCursor: true,
            slidesPerView: 'auto',
            centeredSlides: true,
            roundLengths: true,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 40,
            grabCursor: true,
            loop: true,
            loopAdditionalSlides: 30,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                },
            },
        });
    }
    // jQuery(document).ready(function () {
    //         $('.item:not(.slick-active) .content-slider .video').css('width', '100%');
    //         $('.item:not(.slick-active) .content-slider .content-box').css('display', 'none');
    //     $('.item.slick-active .content-slider .video').css('width', '50%');
    //     $('.item.slick-active .content-slider .content-box').css('display', 'none');
    // });
</script>
<script !src="">
    $(document).ready(function($) {

        $('.form-spo .wpcf7 .wpcf7-form').submit(function(event) {
            event.preventDefault();
            Crmform();

        })
    });
</script>
