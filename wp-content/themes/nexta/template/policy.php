<?php
/* Template Name: Chính sách     */
get_header();
$group_banner = get_field('group_banner');
if($group_banner){
    $img_banner = $group_banner['img'];
    $title_banner = $group_banner['title'];
    $desc_banner = $group_banner['desc'];
}
$re_policy = get_field('re_policy');
?>
<style>
    td, th {
        border: 1px double;
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
    <section class="section-news section-event content-poly">
        <div class="container">
            <div class="wrapper">
                <div class="col-left">
                    <div class="tabs-control">
                        <ul>
                            <?php foreach ($re_policy as $key => $item) { ?>
                                <li class="<?= $key == 0 ? 'active' : '' ?>">
                                    <a href="#<?= $key + 1 ?>">
                                        <?= $item['title_tab'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-right">

                    <div class="tabs-content">
                        <?php foreach ($re_policy as $key => $item) { ?>
                            <div class="tab-pane <?= $key == 0 ? 'active' : '' ?>" id="<?= $key + 1 ?>">
                                <div class="content">
                                    <?php foreach ($item['re_policy_detail'] as $key1 => $item1) { ?>
                                        <div class="note">
                                            <h4>
                                                <?= $key1 + 1 ?>.
                                                <?= $item1['title'] ?>
                                            </h4>
                                           <?= $item1['desc'] ?>
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
</main>
<?php get_footer(); ?>
