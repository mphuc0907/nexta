<?php
/* Template Name: About */
get_header(); ?>
<?php
$group_over_view = get_field('group_over_view');
if ($group_over_view) {
    $title_over_view = $group_over_view['title'];
    $logo_1 = $group_over_view['logo_1'];
    $logo_2 = $group_over_view['logo_2'];
    $re_over_view = $group_over_view['re_over_view'];
    $desc_over_view = $group_over_view['desc'];
}
$group_intro = get_field('group_intro');
if ($group_intro) {
    $title_general_intro = $group_intro['title_general'];
    $title_intro = $group_intro['title'];
    $desc_intro = $group_intro['desc'];
    $img_intro = $group_intro['img'];
}
$group_philosophy = get_field('group_philosophy');
if ($group_philosophy) {
    $title_philosophy = $group_philosophy['title'];
    $desc_philosophy = $group_philosophy['desc'];
    $name_person = $group_philosophy['name'];
    $position_person = $group_philosophy['position'];
    $img_person = $group_philosophy['image'];
    $re_philosophy = $group_philosophy['re_philosophy'];
}
$group_time_line = get_field('group_time_line');
if ($group_time_line) {
    $title_time_line = $group_time_line['title'];
    $re_time_line = $group_time_line['re_time_line'];
}
$group_view_mission = get_field('group_view');
if ($group_view_mission) {
    $title_view = $group_view_mission['title'];
    $desc_view = $group_view_mission['desc'];
    $re_view = $group_view_mission['re_view'];
}
$title_news = get_field('title_news');
$choose_category = get_field('choose_category');
$group_contact = get_field('group_contact');
if ($group_contact) {
    $title_contact = $group_contact['title'];
    $desc_contact = $group_contact['desc'];
    $btn_text_contact = $group_contact['btn_text'];
    $url_contact = $group_contact['url'];
    $title_form = $group_contact['title_form'];
    $embed_form = $group_contact['embed_form'];
    $re_policy = $group_contact['re_policy'];
}
?>
<style>
    .wpcf7-response-output {
        color: #1fa8df;
    }
</style>
<main class="main">
    <section class="breadcrumb">
        <div class="container">
            <div class="content">
                <a href="<?= home_url() ?>"><span>Trang chủ</span><i class="fal fa-angle-right"></i></a><a
                        href="javascript:void(0)" class="current"><span>Giới thiệu</span></a>
            </div>
        </div>
    </section>
    <section class="section-about-1" id="about-1">
        <div class="container">
            <div class="content" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="title">
                    <?= $title_over_view ?>
                </div>
                <div class="list-box">
                    <?php if ($logo_1) : ?>
                        <div class="logo">
                            <figure>
                                <img src="<?= getimage($logo_1) ?>" alt="images">
                            </figure>
                        </div>
                    <?php endif; ?>
                    <div class="list-info">
                        <?php foreach ($re_over_view as $key => $value) { ?>
                            <div class="box">
                                <h4 class="number_count_<?= $key + 1 ?>">
                                    <?= $value['title'] ?></h4>
                                <?= $value['desc'] ?>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="title-logo">
                    <?php if ($logo_2) : ?>
                        <div class="logo">
                            <figure>
                                <img src="<?= getimage($logo_2) ?>" alt="images">
                            </figure>
                        </div>
                    <?php endif; ?>

                    <?= $desc_over_view ?>

                </div>
            </div>
        </div>
    </section>
    <section class="section-about-2">
        <div class="container">
            <div class="content">
                <div class="about-info">
                    <div class="title" data-aos="fade-right" data-aos-duration="1000">
                        <h2>
                            <?= $title_general_intro ?>
                        </h2>
                    </div>
                    <div class="text" data-aos="fade-left" data-aos-duration="1000">
                        <strong>
                            <?= $title_intro ?>
                        </strong>

                        <?= $desc_intro ?>

                    </div>
                </div>
                <div class="picture" data-aos="fade-up" data-aos-duration="1000">
                    <?php if ($img_intro) : ?>
                        <figure>
                            <img src="<?= getimage($img_intro) ?>" alt="images">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-3" data-aos="zoom-out-right" data-aos-duration="1000"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-about.png');">
        <div class="container">
            <div class="content">
                <div class="text">
                    <h2>
                        <?= $title_philosophy ?>
                    </h2>
                    <div class="short">
                        <?= $desc_philosophy ?>
                    </div>
                    <div class="user">
                        <h4>
                            <?= $name_person ?>
                        </h4>
                        <p>
                            <?= $position_person ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php if ($img_person) : ?>
                <div class="abso-img">
                    <figure>
                        <img src="<?= getimage($img_person) ?>" alt="images">
                    </figure>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="section-about-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="detail-img">
            <figure><img src="<?= get_template_directory_uri() ?>/dist/images/detail-1.svg" alt="images"></figure>
        </div>
        <div class="container">
            <div class="content">
                <div class="tabs-option">
                    <div class="nav" id="op-tab" role="tablist" aria-orientation="vertical">
                        <?php foreach ($re_philosophy as $key => $value) { ?>
                            <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="op<?= $key + 1 ?>"
                                    data-bs-toggle="pill" data-bs-target="#op-<?= $key + 1 ?>" type="button" role="tab"
                                    aria-controls="op-<?= $key + 1 ?>"
                                    aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                                <div class="name">
                                    <p>0<?= $key + 1 ?></p>
                                    <div class="title">
                                        <span><?= $value['title'] ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                             viewBox="0 0 36 36" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M20.2045 8.2045C20.6438 7.76517 21.3562 7.76517 21.7955 8.2045L30.7955 17.2045C31.2348 17.6438 31.2348 18.3562 30.7955 18.7955L21.7955 27.7955C21.3562 28.2348 20.6438 28.2348 20.2045 27.7955C19.7652 27.3562 19.7652 26.6438 20.2045 26.2045L27.284 19.125H6C5.37868 19.125 4.875 18.6213 4.875 18C4.875 17.3787 5.37868 16.875 6 16.875H27.284L20.2045 9.7955C19.7652 9.35616 19.7652 8.64384 20.2045 8.2045Z"
                                                  fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="tab-content" id="op-tab-tabContent">
                        <?php foreach ($re_philosophy as $key => $value) { ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="op-<?= $key + 1 ?>"
                                 role="tabpanel" aria-labelledby="op<?= $key + 1 ?>">
                                <div class="box-tab">
                                    <div class="item">
                                        <div class="picture">
                                            <figure><img src="<?= getimage($value['img']) ?>" alt="images"></figure>
                                        </div>
                                        <div class="desc">
                                            <h4><?= $value['title'] ?></h4>
                                            <?= $value['desc'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-5" data-aos="fade-right" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_time_line ?>
                    </h2>
                </div>
                <div class="hoziron-timeline">
                    <div class="timeline">
                        <?php foreach ($re_time_line as $key => $value) { ?>
                            <div class="time-box">
                                <div class="icon">
                                    <div class="picture">
                                        <figure>
                                            <img src="<?= getimage($value['icon']) ?>" alt="images">
                                        </figure>
                                    </div>
                                </div>
                                <div class="year"><span>
                                        <?= $value['year'] ?>
                                    </span></div>
                                <div class="text">

                                    <div class="dot" <?php if (!$value['desc']) { ?> style="opacity: 0" <?php } ?>>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>

                                    <div class="short">
                                        <?= $value['desc'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-6" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_view ?>
                    </h2>

                    <?= $desc_view ?>

                </div>
                <div class="list-box">
                    <div class="row row-10">
                        <?php foreach ($re_view as $key => $value) { ?>
                            <div class="col-md-6 col-lg-4 col-item p-10">
                                <div class="box">
                                    <div class="icon">
                                        <img src="<?= getimage($value['icon']) ?>" alt="images">
                                    </div>
                                    <div class="desc">
                                        <h3><?= $value['title'] ?></h3>
                                        <?= $value['desc'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (!empty($choose_category)) : ?>
        <section class="section-about-7">
            <div class="container">
                <div class="content">
                    <div class="title">
                        <h2>
                            <?= $title_news ?>
                        </h2>
                    </div>
                    <div class="list-news">
                        <div class="row row-10">
                            <div class="col-xl-7 p-10 col-left">
                                <?php foreach ($choose_category as $key => $value) :
                                    $post = get_post($value);
                                    $post_thumbnail = get_post_thumbnail_id($value);
                                    $link = get_permalink($value);
                                    $title = get_the_title($value);
                                    $date = get_the_date('d/m/Y', $value);
                                    $category = get_the_category($value);
                                    $category_name = $category[0]->name;
                                    $event_date = get_field('event_date', $value);
                                    if ($key > 1) {
                                        break;
                                    }
                                    ?>
                                    <article class="blog">
                                        <div class="picture">
                                            <a href="<?= $link ?>">
                                                <figure>
                                                    <img src="<?= getimage($post_thumbnail) ?>" alt="images">
                                                </figure>
                                                <?php if ($event_date) : ?>
                                                    <span>
                                                <?= $event_date ?>
                                            </span>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <div class="cate">
                                                <a href="javascript:void(0)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                                         viewBox="0 0 19 18" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M8.8646 1.33224C8.3529 1.39986 7.72103 1.545 6.82218 1.75243L5.7987 1.98862C5.03952 2.16381 4.5167 2.28527 4.11736 2.42232C3.73184 2.55463 3.51374 2.68507 3.34916 2.84965C3.18458 3.01423 3.05415 3.23233 2.92183 3.61785C2.78478 4.01718 2.66332 4.54001 2.48813 5.29918L2.25194 6.32267C2.04451 7.22152 1.89937 7.85339 1.83175 8.36509C1.76587 8.8636 1.78106 9.20089 1.869 9.50752C1.95694 9.81414 2.12282 10.1082 2.4429 10.496C2.77144 10.8941 3.22941 11.353 3.8817 12.0053L5.40639 13.53C6.5393 14.6629 7.34546 15.4672 8.03852 15.996C8.71717 16.5138 9.21342 16.7082 9.71795 16.7082C10.2225 16.7082 10.7187 16.5138 11.3974 15.996C12.0904 15.4672 12.8966 14.6629 14.0295 13.53C15.1624 12.3971 15.9667 11.5909 16.4955 10.8979C17.0133 10.2192 17.2077 9.72298 17.2077 9.21844C17.2077 8.7139 17.0133 8.21765 16.4955 7.53901C15.9667 6.84594 15.1624 6.03979 14.0295 4.90688L12.5048 3.38218C11.8525 2.7299 11.3936 2.27193 10.9955 1.94338C10.6077 1.62331 10.3137 1.45742 10.007 1.36949C9.7004 1.28155 9.36311 1.26636 8.8646 1.33224ZM8.70083 0.0930118C9.29859 0.0140144 9.82275 0.0162437 10.3516 0.167925C10.8805 0.319605 11.3262 0.595518 11.7912 0.979321C12.2408 1.35035 12.7414 1.85101 13.3669 2.47648L14.9467 4.05629C16.0389 5.14846 16.9036 6.01316 17.4893 6.78078C18.0919 7.57062 18.4577 8.33071 18.4577 9.21844C18.4577 10.1062 18.0919 10.8663 17.4893 11.6561C16.9036 12.4237 16.0389 13.2884 14.9467 14.3806L14.8801 14.4472C13.7879 15.5394 12.9232 16.4041 12.1556 16.9898C11.3658 17.5924 10.6057 17.9582 9.71795 17.9582C8.83022 17.9582 8.07013 17.5924 7.2803 16.9898C6.51266 16.4041 5.64796 15.5393 4.55578 14.4471L2.97598 12.8674C2.35051 12.2419 1.84985 11.7412 1.47883 11.2917C1.09503 10.8267 0.819117 10.381 0.667436 9.85212C0.515755 9.32324 0.513526 8.79908 0.592524 8.20132C0.66889 7.62347 0.828103 6.93357 1.02701 6.07169L1.27756 4.98596C1.44353 4.2667 1.57887 3.68017 1.73953 3.21208C1.90731 2.72322 2.11863 2.31242 2.46528 1.96577C2.81193 1.61911 3.22273 1.40779 3.71159 1.24002C4.17968 1.07936 4.76621 0.944019 5.48547 0.778047L6.5712 0.527495C7.43308 0.328592 8.12298 0.169378 8.70083 0.0930118ZM7.40846 5.66246C7.00167 5.25566 6.34212 5.25566 5.93533 5.66246C5.52853 6.06925 5.52853 6.7288 5.93533 7.1356C6.34212 7.54239 7.00167 7.54239 7.40846 7.1356C7.81526 6.7288 7.81526 6.06925 7.40846 5.66246ZM5.05144 4.77857C5.94639 3.88362 7.3974 3.88362 8.29235 4.77857C9.1873 5.67353 9.1873 7.12453 8.29235 8.01948C7.3974 8.91443 5.94639 8.91443 5.05144 8.01948C4.15649 7.12453 4.15649 5.67353 5.05144 4.77857ZM15.3752 8.15831C15.6193 8.40239 15.6193 8.79811 15.3753 9.0422L9.55942 14.8582C9.31535 15.1023 8.91962 15.1023 8.67554 14.8583C8.43146 14.6142 8.43145 14.2184 8.67552 13.9744L14.4914 8.15833C14.7354 7.91425 15.1312 7.91424 15.3752 8.15831Z"
                                                              fill="#7A7E86"/>
                                                    </svg>
                                                    <span>
                                                <?= $category_name ?>
                                            </span>
                                                </a>
                                            </div>
                                            <h4><a href="<?= $link ?>">
                                                    <?= $title ?>
                                                </a></h4>
                                            <time>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                     viewBox="0 0 17 19" fill="none">
                                                    <path d="M1 5C1 3.61929 2.11929 2.5 3.5 2.5H13.5C14.8807 2.5 16 3.61929 16 5V15C16 16.3807 14.8807 17.5 13.5 17.5H3.5C2.11929 17.5 1 16.3807 1 15V5Z"
                                                          stroke="#7A7E86" stroke-width="1.5"/>
                                                    <path d="M1 6.66667H16" stroke="#7A7E86" stroke-width="1.5"
                                                          stroke-linejoin="round"/>
                                                    <path d="M12.2507 1.25L12.2507 3.75" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4.75065 1.25L4.75065 3.75" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.91602 10.0003H4.74935" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.08203 10.0003H8.91537" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12.25 10.0003H13.0833" stroke="#7A7E86" stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.91602 13.3338H4.74935" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.08203 13.3338H8.91537" stroke="#7A7E86"
                                                          stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12.25 13.3338H13.0833" stroke="#7A7E86" stroke-width="1.5"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span>
                                            <?= $date ?>
                                        </span>
                                            </time>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-xl-5 p-10 col-right">
                                <div class="list-right">
                                    <?php foreach ($choose_category as $key => $value) :
                                        $post = get_post($value);
                                        $link_2 = get_permalink($value);
                                        $title_2 = get_the_title($value);
                                        $date_2 = get_the_date('d/m/Y', $value);
                                        $category = get_the_category($value);
                                        $category_name_2 = $category[0]->name;
                                        if ($key < 2) {
                                            continue;
                                        }
                                        ?>
                                        <article class="blog">
                                            <div class="desc">
                                                <div class="cate">
                                                    <a href="javascript:void(0)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                                             viewBox="0 0 19 18" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M8.8646 1.33224C8.3529 1.39986 7.72103 1.545 6.82218 1.75243L5.7987 1.98862C5.03952 2.16381 4.5167 2.28527 4.11736 2.42232C3.73184 2.55463 3.51374 2.68507 3.34916 2.84965C3.18458 3.01423 3.05415 3.23233 2.92183 3.61785C2.78478 4.01718 2.66332 4.54001 2.48813 5.29918L2.25194 6.32267C2.04451 7.22152 1.89937 7.85339 1.83175 8.36509C1.76587 8.8636 1.78106 9.20089 1.869 9.50752C1.95694 9.81414 2.12282 10.1082 2.4429 10.496C2.77144 10.8941 3.22941 11.353 3.8817 12.0053L5.40639 13.53C6.5393 14.6629 7.34546 15.4672 8.03852 15.996C8.71717 16.5138 9.21342 16.7082 9.71795 16.7082C10.2225 16.7082 10.7187 16.5138 11.3974 15.996C12.0904 15.4672 12.8966 14.6629 14.0295 13.53C15.1624 12.3971 15.9667 11.5909 16.4955 10.8979C17.0133 10.2192 17.2077 9.72298 17.2077 9.21844C17.2077 8.7139 17.0133 8.21765 16.4955 7.53901C15.9667 6.84594 15.1624 6.03979 14.0295 4.90688L12.5048 3.38218C11.8525 2.7299 11.3936 2.27193 10.9955 1.94338C10.6077 1.62331 10.3137 1.45742 10.007 1.36949C9.7004 1.28155 9.36311 1.26636 8.8646 1.33224ZM8.70083 0.0930118C9.29859 0.0140144 9.82275 0.0162437 10.3516 0.167925C10.8805 0.319605 11.3262 0.595518 11.7912 0.979321C12.2408 1.35035 12.7414 1.85101 13.3669 2.47648L14.9467 4.05629C16.0389 5.14846 16.9036 6.01316 17.4893 6.78078C18.0919 7.57062 18.4577 8.33071 18.4577 9.21844C18.4577 10.1062 18.0919 10.8663 17.4893 11.6561C16.9036 12.4237 16.0389 13.2884 14.9467 14.3806L14.8801 14.4472C13.7879 15.5394 12.9232 16.4041 12.1556 16.9898C11.3658 17.5924 10.6057 17.9582 9.71795 17.9582C8.83022 17.9582 8.07013 17.5924 7.2803 16.9898C6.51266 16.4041 5.64796 15.5393 4.55578 14.4471L2.97598 12.8674C2.35051 12.2419 1.84985 11.7412 1.47883 11.2917C1.09503 10.8267 0.819117 10.381 0.667436 9.85212C0.515755 9.32324 0.513526 8.79908 0.592524 8.20132C0.66889 7.62347 0.828103 6.93357 1.02701 6.07169L1.27756 4.98596C1.44353 4.2667 1.57887 3.68017 1.73953 3.21208C1.90731 2.72322 2.11863 2.31242 2.46528 1.96577C2.81193 1.61911 3.22273 1.40779 3.71159 1.24002C4.17968 1.07936 4.76621 0.944019 5.48547 0.778047L6.5712 0.527495C7.43308 0.328592 8.12298 0.169378 8.70083 0.0930118ZM7.40846 5.66246C7.00167 5.25566 6.34212 5.25566 5.93533 5.66246C5.52853 6.06925 5.52853 6.7288 5.93533 7.1356C6.34212 7.54239 7.00167 7.54239 7.40846 7.1356C7.81526 6.7288 7.81526 6.06925 7.40846 5.66246ZM5.05144 4.77857C5.94639 3.88362 7.3974 3.88362 8.29235 4.77857C9.1873 5.67353 9.1873 7.12453 8.29235 8.01948C7.3974 8.91443 5.94639 8.91443 5.05144 8.01948C4.15649 7.12453 4.15649 5.67353 5.05144 4.77857ZM15.3752 8.15831C15.6193 8.40239 15.6193 8.79811 15.3753 9.0422L9.55942 14.8582C9.31535 15.1023 8.91962 15.1023 8.67554 14.8583C8.43146 14.6142 8.43145 14.2184 8.67552 13.9744L14.4914 8.15833C14.7354 7.91425 15.1312 7.91424 15.3752 8.15831Z"
                                                                  fill="#7A7E86"/>
                                                        </svg>
                                                        <span>
                                                    <?= $category_name_2 ?>
                                                </span>
                                                    </a>
                                                </div>
                                                <h4><a href="<?= $link_2 ?>">
                                                        <?= $title_2 ?>
                                                    </a></h4>
                                                <time>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19"
                                                         viewBox="0 0 17 19" fill="none">
                                                        <path d="M1 5C1 3.61929 2.11929 2.5 3.5 2.5H13.5C14.8807 2.5 16 3.61929 16 5V15C16 16.3807 14.8807 17.5 13.5 17.5H3.5C2.11929 17.5 1 16.3807 1 15V5Z"
                                                              stroke="#7A7E86" stroke-width="1.5"/>
                                                        <path d="M1 6.66667H16" stroke="#7A7E86" stroke-width="1.5"
                                                              stroke-linejoin="round"/>
                                                        <path d="M12.2507 1.25L12.2507 3.75" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M4.75065 1.25L4.75065 3.75" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M3.91602 10.0003H4.74935" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.08203 10.0003H8.91537" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M12.25 10.0003H13.0833" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M3.91602 13.3338H4.74935" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.08203 13.3338H8.91537" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M12.25 13.3338H13.0833" stroke="#7A7E86"
                                                              stroke-width="1.5"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <span>
                                                <?= $date_2 ?>
                                            </span>
                                                </time>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="section-about-8"
             style="background-image: url('<?= get_template_directory_uri() ?>/dist/images/bg-about-1.png');">
        <div class="container">
            <div class="content">
                <div class="row row-10">
                    <div class="col-lg-6 p-10 col-left" data-aos="fade-right" data-aos-duration="1000">
                        <div class="title">
                            <h2>
                                <?= $title_contact ?>
                            </h2>

                            <?= $desc_contact ?>

                            <a href="<?= $url_contact ?>">
                                <?= $btn_text_contact ?>
                            </a>
                        </div>
                        <div class="faq-tabs">
                            <?php foreach ($re_policy as $key => $value) { ?>
                                <div class="item-tab <?= $key == 0 ? 'show' : '' ?>">
                                    <div class="btn-tab">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12.4697 8.46967C12.7626 8.17678 13.2374 8.17678 13.5303 8.46967L16.5303 11.4697C16.8232 11.7626 16.8232 12.2374 16.5303 12.5303L13.5303 15.5303C13.2374 15.8232 12.7626 15.8232 12.4697 15.5303C12.1768 15.2374 12.1768 14.7626 12.4697 14.4697L14.1893 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H14.1893L12.4697 9.53033C12.1768 9.23744 12.1768 8.76256 12.4697 8.46967Z"
                                                      fill="white"/>
                                            </svg>
                                            <span>
                                                <?= $value['title'] ?>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="collepsing">
                                        <?= $value['desc'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 p-10 col-right" data-aos="fade-left" data-aos-duration="1000">
                        <div class="form">
                            <h2>
                                <?= $title_form ?>
                            </h2>
                            <?= do_shortcode($embed_form) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        $(".faq-tabs .btn-tab button").click(function () {
            $(this).parent().siblings().slideToggle("slide");
            $(this).parent().parent().toggleClass("show");
            $(this).parent().parent().siblings().removeClass("show");
            $(this).parent().parent().siblings().children(".collepsing").slideUp("medium");
        });
    });

    var waypoint = new Waypoint({
        element: document.getElementById('about-1'),
        handler: function (direction) {
            numberCount();
        },
        offset: '50%'
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
