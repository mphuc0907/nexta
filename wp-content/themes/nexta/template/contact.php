<?php
/* Template Name: Contact */
get_header();
$group_banner = get_field('group_banner');
if($group_banner){
   $img_banner = $group_banner['img'];
   $title_banner = $group_banner['title'];
   $desc_banner = $group_banner['desc'];
}
?>
<style>
    .wpcf7-response-output {
        color: #1fa8df;
    }
</style>
<main class="main">
    <section class="banner-page">
        <div class="bg-video">
            <?php if($img_banner) : ?>
            <img src="<?= getimage($img_banner)?>" alt="">
            <?php endif; ?>
            <div class="content-main">
                <div class="title">
                    <h3>
                        <?= $title_banner ?>
                    </h3>
                </div>
                <div class="des">

                        <?= $desc_banner ?>

                </div>
            </div>
        </div>

    </section>
    <section class="contact-1">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-md-6 col-sm-12" data-aos="fade-right">
                    <div class="form">
                        <h3>
                            <?= get_field('title_form') ?>
                        </h3>
                        <?= do_shortcode(get_field('embed_form')) ?>
                    </div>
                </div>
                <div class="col-xl-5 col-info col-md-6 col-sm-12" data-aos="fade-left">
                    <div class="info">
                        <h3>
                            <?= get_field('title_info') ?>
                        </h3>
                        <hr>
                        <div class="infomation">
                            <h4>
                                <?= get_field('name_company') ?>
                            </h4>
                            <ul>
                                <?php foreach (get_field('re_info') as $item) : ?>
                                    <li>
                                        <img src="<?= getimage($item['icon']) ?>" alt="" style="width: 1.5rem;height: 1.5rem;" />
                                        <span><?= $item['desc'] ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="social-media">
                        <div class="link-social">
                            <?php foreach (get_field('re_list_social') as $item) : ?>
                                <a href="<?= $item['url'] ?>">
                                    <img src="<?= getimage($item['icon_social']) ?>" alt="" />
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-2" data-aos="fade-up">
        <?= get_field('embed_map') ?>
    </section>
</main>

<?php get_footer(); ?>
    <script !src="">
        $(document).ready(function($) {

            $('.form .wpcf7 .wpcf7-form').submit(function(event) {
                event.preventDefault();
                Crmform();

            })
        });
    </script>