<?php
/* Template Name: demo test */
get_header();
?>
<?php
// section 1
$group_video_intro = get_field('group_video_intro');
$video_intro = $group_video_intro['video'];
$btn_text_1 = $group_video_intro['btn_text_1'];
$btn_text_2 = $group_video_intro['btn_text_2'];
$btn_url_1 = $group_video_intro['btn_url_1'];
$btn_url_2 = $group_video_intro['btn_url_2'];
// get url by id file
$video_intro_url = wp_get_attachment_url($video_intro);
// section 2 + 3
$group_model = get_field('group_nodel');
if ($group_model) {
    $menu_model = $group_model['menu'];
    $menu_model_title = $group_model['title'];
    $menu_model_img = $group_model['img'];
    $list_model = $group_model['re_model'];
}
//section 4
$group_device = get_field('group_device');
if ($group_device) {
    $device_title = $group_device['title'];
    $device_desc = $group_device['desc'];
    $device_list = $group_device['re_device'];
}
// section 5
$title_solution = get_field('title_solution');
$img_solution = get_field('img_solution');
$group_smart_class = get_field('group_smart_class');
if ($group_smart_class) {
    $title_solution_smart = $group_smart_class['title_solution'];
    $desc_solution_smart = $group_smart_class['desc'];
    $img_solution_smart = $group_smart_class['img'];
    $btn_text_1_smart = $group_smart_class['btn_text_1'];
    $btn_text_2_smart = $group_smart_class['btn_text_2'];
    $btn_url_1_smart = $group_smart_class['btn_url_1'];
    $btn_url_2_smart = $group_smart_class['btn_url_2'];
}
// section 6
$group_value = get_field('group_value');
if ($group_value) {
    $title_value = $group_value['title'];
    $desc_value = $group_value['desc'];
    $value_list_large = $group_value['re_value_1'];
}
//section 7
$group_why_choose = get_field('group_why_choose');
if ($group_why_choose) {
    $why_choose_title = $group_why_choose['title'];
    $why_choose_desc = $group_why_choose['desc'];
    $why_choose_list = $group_why_choose['re_why_choose'];
}
//section 8
$group_core_value = get_field('group_core_value');
if ($group_core_value) {
    $core_value_title = $group_core_value['title'];
    $core_value_desc = $group_core_value['desc'];
    $core_value_list = $group_core_value['re_core_value'];
}
$title_procedure = get_field('title_procedure');
$img_steps = get_field('img_steps');
// section 9
$group_about = get_field('group_about');
if ($group_about) {
    $about_title = $group_about['title'];
    $about_list = $group_about['re_news'];
}
// section 10
$group_deploy = get_field('group_deploy');
if ($group_deploy) {
    $deploy_title = $group_deploy['title'];
    $deploy_list = $group_deploy['re_school'];
}
//section 11
$title_trial = get_field('title_trial');
$background_trial = get_field('background_trial');
$btn_text_trial_1 = get_field('btn_text_trial_1');
$btn_text_trial_2 = get_field('btn_text_trial_2');
$btn_url_trial_1 = get_field('btn_url_trial_1');
$btn_url_trial_2 = get_field('btn_url_trial_2');
$map = get_field('location_map');
$map_arr =json_encode($map);

//print_r("dat");
//print_r($map);

?>
<style>
    #map {
        height: 100%;
    }
</style>
<main class="main">
    <section id="smart1" class="section-class-1">
        <div class="container-fulid" style="height: inherit;">
            <div class="content">
                <div class="container" style="height: inherit;">
                    <div class="smart-bnt">
                        <a href="<?= $btn_url_1 ?>" class="next-bnt">
                            <?= $btn_text_1 ?>
                        </a>
                        <a href="<?= $btn_url_2 ?>" class="next-bnt"><?= $btn_text_2 ?></a>
                    </div>
                </div>
                <div class="bg-video">
                    <video autoplay="autoplay" loop="loop" muted="true" preload="auto" playsinline control="true" src="<?= $video_intro_url ?>"></video>
                </div>
            </div>
        </div>
    </section>
    <section id="smart2" class="section-class-2">
        <div class="container">
            <div class="content">
                <div class="list-link">
                    <ul>
                        <?php foreach ($menu_model as $item) : ?>
                            <li>
                                <a href="<?= $item['url'] ?>">
                                    <img src="<?= getimage($item['icon']) ?>" alt="images" style="width: 24px; height: 24px;" />
                                    <span>
                                        <?= $item['title'] ?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="smart3" class="section-class-3">
        <div class="container">
            <div class="content">
                <div class="title">
                    <?= $menu_model_title ?>
                </div>
                <div class="grid-box">
                    <?php if($menu_model_img) : ?>
                        <div class="img-left">
                            <figure><img src="<?= getimage($menu_model_img) ?>" alt="images"></figure>
                        </div>
                    <?php endif; ?>
                    <div class="list-right">
                        <ul>
                            <?php foreach ($list_model as $item) : ?>
                                <li>
                                    <img src="<?= getimage($item['icon']) ?>" alt="images" />
                                    <span>
                                        <?= $item['title'] ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="smart4" class="section-class-4">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $device_title ?>
                    </h2>
                    <p>
                        <?= $device_desc ?>
                    </p>
                </div>
                <div class="fan-tabs">
                    <?php foreach ($device_list as $item) : ?>
                        <div class="fan-box" style="background-image: url('<?= getimage($item['img']) ?>;">
                            <div class="text">
                                <div class="icon">
                                    <figure>
                                        <img src="<?= getimage($item['icon']) ?>" alt="images" />
                                    </figure>
                                </div>
                                <h3>
                                    <?= $item['title'] ?>
                                </h3>
                                <a href="<?= $item['url'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="14" viewBox="0 0 9 14" fill="none">
                                        <path d="M8.03998 6.29004L2.37998 0.640037C2.28702 0.546308 2.17642 0.471914 2.05456 0.421145C1.9327 0.370377 1.80199 0.344238 1.66998 0.344238C1.53797 0.344238 1.40726 0.370377 1.28541 0.421145C1.16355 0.471914 1.05294 0.546308 0.959982 0.640037C0.773731 0.827399 0.669189 1.08085 0.669189 1.34504C0.669189 1.60922 0.773731 1.86267 0.959982 2.05004L5.90998 7.05004L0.959982 12C0.773731 12.1874 0.669189 12.4409 0.669189 12.705C0.669189 12.9692 0.773731 13.2227 0.959982 13.41C1.0526 13.5045 1.16304 13.5797 1.28492 13.6312C1.40679 13.6827 1.53767 13.7095 1.66998 13.71C1.80229 13.7095 1.93317 13.6827 2.05505 13.6312C2.17692 13.5797 2.28737 13.5045 2.37998 13.41L8.03998 7.76004C8.14149 7.66639 8.2225 7.55274 8.2779 7.42624C8.33331 7.29974 8.36191 7.16314 8.36191 7.02504C8.36191 6.88693 8.33331 6.75033 8.2779 6.62383C8.2225 6.49733 8.14149 6.38368 8.03998 6.29004Z" fill="white" />
                                    </svg>
                                    <span>
                                        <?= $item['btn_text'] ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="fan-tabs--mobile">
                    <div class="swiper listbox6mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($device_list as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="fan-box">
                                        <div class="picture">
                                            <figure><img src="<?= getimage($item['img']) ?>" alt="images"></figure>
                                        </div>
                                        <div class="text">
                                            <div class="icon">
                                                <figure>
                                                    <img src="<?= getimage($item['icon']) ?>" alt="images" />
                                                </figure>
                                            </div>
                                            <h3>
                                                <?= $item['title'] ?>
                                            </h3>
                                            <a href="<?= $item['url'] ?>">
                                                <?= $item['btn_text'] ?>
                                            </a>
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
    <section id="smart5" class="section-class-5">
        <div class="container">
            <div class="content">
                <div class="mini-section">
                    <div class="title">
                        <h2>
                            <?= $title_solution ?>
                        </h2>
                    </div>
                    <?php if ($img_solution) : ?>
                        <div class="list-solution">
                            <figure><img src="<?= getimage($img_solution) ?>" alt="images"></figure>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mini-section">
                    <div class="title">
                        <h2>
                            <?= get_field('title_large') ?>
                        </h2>
                    </div>
                    <div class="slide-system">
                        <div class="slide-inner">
                            <div class="double-slide">
                                <div class="swiper sys1Swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="box-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                                <div class="text">
                                                    <h3>Hệ thống học liệu phong phú</h3>
                                                    <p>Hệ thống học liệu phong phú cập nhật liên tục theo chương trình mới của Bộ Giáo dục đào tạo 3 môn Toán, Tiếng Việt, Tiếng Anh với các bộ sách tương ứng: Kết nối tri thức, Cánh Diều, Chân trời sáng tạo</p>
                                                    <ul>
                                                        <li>2.000 bài giảng lý thuyết tiểu học</li>
                                                        <li>1.500 bài giảng tiểu học</li>
                                                        <li>30.000 câu hỏi bài tập phân hóa theo năng lực học sinh từ cơ bản đến nâng cao. Đặc biệt chương trình Nâng cao dành riêng cho lớp 4 và lớp 5 luyện thi chuyên và trường chất lượng cao</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="box-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                                <div class="text">
                                                    <h3>Hệ thống học liệu phong phú</h3>
                                                    <p>Hệ thống học liệu phong phú cập nhật liên tục theo chương trình mới của Bộ Giáo dục đào tạo 3 môn Toán, Tiếng Việt, Tiếng Anh với các bộ sách tương ứng: Kết nối tri thức, Cánh Diều, Chân trời sáng tạo</p>
                                                    <ul>
                                                        <li>2.000 bài giảng lý thuyết tiểu học</li>
                                                        <li>1.500 bài giảng tiểu học</li>
                                                        <li>30.000 câu hỏi bài tập phân hóa theo năng lực học sinh từ cơ bản đến nâng cao. Đặc biệt chương trình Nâng cao dành riêng cho lớp 4 và lớp 5 luyện thi chuyên và trường chất lượng cao</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="box-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                                <div class="text">
                                                    <h3>Hệ thống học liệu phong phú</h3>
                                                    <p>Hệ thống học liệu phong phú cập nhật liên tục theo chương trình mới của Bộ Giáo dục đào tạo 3 môn Toán, Tiếng Việt, Tiếng Anh với các bộ sách tương ứng: Kết nối tri thức, Cánh Diều, Chân trời sáng tạo</p>
                                                    <ul>
                                                        <li>2.000 bài giảng lý thuyết tiểu học</li>
                                                        <li>1.500 bài giảng tiểu học</li>
                                                        <li>30.000 câu hỏi bài tập phân hóa theo năng lực học sinh từ cơ bản đến nâng cao. Đặc biệt chương trình Nâng cao dành riêng cho lớp 4 và lớp 5 luyện thi chuyên và trường chất lượng cao</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-slide">
                                        <div class="swiper-pagination"></div>
                                        <div class="naviga">
                                            <div class="bnt-nav swiper-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                                            <div class="bnt-nav swiper-button-next"><i class="fal fa-long-arrow-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper sys2Swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="thumb-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="thumb-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="box-slide">
                                                <div class="picture">
                                                    <figure><img src="<?= get_template_directory_uri() ?>/dist/images/sys-1.png" alt="images"></figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-section">
                    <div class="grid-box">
                        <div class="text-left">
                            <div class="text">
                                <h2>
                                    <?= $title_solution_smart ?>
                                </h2>
                                <p>
                                    <?= $desc_solution_smart ?>
                                </p>
                                <div class="bnt-nex">
                                    <a href="<?= $btn_url_1_smart ?>">
                                        <?= $btn_text_1_smart ?>
                                    </a>
                                    <a href="<?= $btn_url_2_smart ?>">
                                        <?= $btn_text_2_smart ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="img-right">
                            <figure><img src="<?= getimage($img_solution_smart) ?>" alt="images"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="smart6" class="section-class-6">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $title_value ?>
                    </h2>
                    <p>
                        <?= $desc_value ?>
                    </p>
                </div>
                <div class="tabs-value">
                    <ul class="nav" id="nex-tab" role="tablist">
                        <?php foreach ($value_list_large as $key => $item) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="nex-<?= $key ?>" data-bs-toggle="pill" data-bs-target="#nex<?= $key ?>" type="button" role="tab" aria-controls="nex<?= $key ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                                    <?= $item['title'] ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="nex-tabContent">
                        <?php foreach ($value_list_large as $key => $item) : ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="nex<?= $key ?>" role="tabpanel" aria-labelledby="nex-<?= $key ?>">
                                <div class="grid-box">
                                    <div class="box-text">
                                        <?php foreach ($item['re_value_2'] as $key_2 => $item_2) :
                                            if ($key_2 > 1) break;
                                            ?>
                                            <div class="box">
                                                <div class="icon">
                                                    <img src="<?= getimage($item_2['icon']) ?>" alt="images" style="width: 44px;height: 44px;" />
                                                </div>
                                                <h3>
                                                    <?= $item_2['desc'] ?>
                                                </h3>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="box-img">
                                        <div class="image">
                                            <figure><img src="<?= getimage($item['img']) ?>" alt="images"></figure>
                                        </div>
                                    </div>
                                    <div class="box-text">
                                        <?php foreach ($item['re_value_2'] as $key_2 => $item_2) :
                                            if ($key_2 < 2) continue;
                                            ?>
                                            <div class="box">
                                                <div class="icon">
                                                    <img src="<?= getimage($item_2['icon']) ?>" alt="images" style="width: 44px;height: 44px;" />
                                                </div>
                                                <h3>
                                                    <?= $item_2['desc'] ?>
                                                </h3>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="smart7" class="section-class-7" style="background-image: url(<?= get_template_directory_uri() ?>/dist/images/bg-s.png);">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $why_choose_title ?>
                    </h2>
                    <p>
                        <?= $why_choose_desc ?>
                    </p>
                </div>
                <div class="list-slide">
                    <?php foreach ($why_choose_list as $item) : ?>
                        <div class="ideal-slide">
                            <div class="ideal-box">
                                <figure><img src="<?= getimage($item['img']) ?>" alt="images"></figure>
                            </div>
                            <div class="desc">
                                <h3>
                                    <?= $item['desc'] ?>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="smart8" class="section-class-8">
        <div class="container-fuild">
            <div class="content">
                <div class="mini-section" style="background-image: url(<?= get_template_directory_uri() ?>/dist/images/bg-s1.png);">
                    <div class="container">
                        <div class="title">
                            <h2>
                                <?= $core_value_title ?>
                            </h2>
                            <p>
                                <?= $core_value_desc ?>
                            </p>
                        </div>
                        <div class="list-solution">
                            <div class="list-box">
                                <div class="row row-10">
                                    <?php foreach ($core_value_list as $item) : ?>
                                        <div class="col-md-6 col-lg-4 col-item">
                                            <div class="box">
                                                <h3>
                                                    <?= $item['title'] ?>
                                                </h3>
                                                <p>
                                                    <?= $item['desc'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="list-solution--mobile">
                            <div class="swiper listbox7mSwiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($core_value_list as $item) : ?>
                                        <div class="swiper-slide">
                                            <div class="col-item">
                                                <div class="box">
                                                    <h3>
                                                        <?= $item['title'] ?>
                                                    </h3>
                                                    <p>
                                                        <?= $item['desc'] ?>
                                                    </p>
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
                <div class="mini-section">
                    <div class="container">
                        <div class="title">
                            <h2>
                                <?= $title_procedure ?>
                            </h2>
                        </div>
                        <div class="chart">
                            <div class="picture">
                                <figure>
                                    <img src="<?= getimage($img_steps) ?>" alt="images">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="smart9" class="section-home-9 section-class-9">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $about_title ?>
                    </h2>
                </div>
                <div class="list-sharp">
                    <?php foreach ($about_list as $item) : ?>
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
                                        <?= $item['desc'] ?>
                                    </h4>
                                    <a href="<?= $item['url'] ?>" class="viewmore">
                                        <span>
                                            <?= $item['btn_text'] ?>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.707159 7.52529C0.307804 7.58027 -6.92429e-07 7.92768 -6.5568e-07 8.34803C-6.15591e-07 8.80661 0.366312 9.17835 0.818181 9.17835L15.1999 9.17835L10.0047 14.4295L9.92528 14.5224C9.68696 14.847 9.71243 15.3083 10.0023 15.6037C10.3212 15.9287 10.8392 15.9298 11.1594 15.6062L17.7477 8.94769C17.787 8.90956 17.8224 8.86751 17.8536 8.82216C18.0766 8.4979 18.0452 8.04808 17.7593 7.7592L11.1593 1.09008L11.0674 1.00988C10.7466 0.769397 10.2921 0.797189 10.0022 1.0926C9.68342 1.41756 9.68453 1.94329 10.0047 2.26685L15.2012 7.51771L0.818181 7.51771L0.707159 7.52529Z" fill="#2D55A5" />
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
                            <?php foreach ($about_list as $item) : ?>
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
                                                    <?= $item['desc'] ?>
                                                </h4>
                                                <a href="<?= $item['url'] ?>" class="viewmore">
                                                    <span>
                                                        <?= $item['btn_text'] ?>
                                                    </span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.707159 7.52529C0.307804 7.58027 -6.92429e-07 7.92768 -6.5568e-07 8.34803C-6.15591e-07 8.80661 0.366312 9.17835 0.818181 9.17835L15.1999 9.17835L10.0047 14.4295L9.92528 14.5224C9.68696 14.847 9.71243 15.3083 10.0023 15.6037C10.3212 15.9287 10.8392 15.9298 11.1594 15.6062L17.7477 8.94769C17.787 8.90956 17.8224 8.86751 17.8536 8.82216C18.0766 8.4979 18.0452 8.04808 17.7593 7.7592L11.1593 1.09008L11.0674 1.00988C10.7466 0.769397 10.2921 0.797189 10.0022 1.0926C9.68342 1.41756 9.68453 1.94329 10.0047 2.26685L15.2012 7.51771L0.818181 7.51771L0.707159 7.52529Z" fill="#2D55A5" />
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
    <section id="smart12" class="section-class-12">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2><?= get_field('title_map') ?></h2>
                </div>
                <div class="list-point">
                    <div class="row row-10">
                        <div class="col-lg-4 p-10 col-left">
                            <div class="list-country">
                                <ul>
                                    <li>Tất cả</li>
                                    <li>Hòa Bình</li>
                                    <li>Hải Dương</li>
                                    <li>Hà Nội</li>
                                    <li>Hải Phòng</li>
                                    <li>Nghệ An</li>
                                    <li>Hà Tĩnh</li>
                                    <li>Quảng Bình</li>
                                    <li>Đà Nẵng</li>
                                    <li>Hồ Chí Minh</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 p-10 col-right">
                            <div class="map" id="map">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="smart10" class="section-class-10">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2>
                        <?= $deploy_title ?>
                    </h2>
                </div>
                <div class="list-class">
                    <div class="row row-10">
                        <?php foreach ($deploy_list as $item) : ?>
                            <div class="col-md-6 col-lg-4 p-10 col-item">
                                <div class="box">
                                    <div class="picture">
                                        <figure><img src="<?= getimage($item['img']) ?>" alt="images"></figure>
                                    </div>
                                    <div class="desc">
                                        <h4><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></h4>
                                        <p><?= $item['desc'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="list-class--mobile">
                    <div class="swiper listbox5mSwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($about_list as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="col-item">
                                        <div class="box">
                                            <div class="picture">
                                                <figure><img src="<?= getimage($item['img']) ?>" alt="images"></figure>
                                            </div>
                                            <div class="desc">
                                                <h4><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></h4>
                                                <p><?= $item['desc'] ?></p>
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
    <section id="smart11" class="section-class-11" style="background-image: url(<?= getimage($background_trial) ?>);">
        <div class="container" style="height: inherit;">
            <div class="content">
                <div class="banner-box">
                    <?= $title_trial ?>
                    <div class="double-bnt">
                        <a href="<?= $btn_url_trial_1 ?>">
                            <?= $btn_text_trial_1 ?>
                        </a>
                        <a href="<?= $btn_url_trial_2 ?>">
                            <?= $btn_text_trial_2 ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        if ($(window).width() > 1023) {
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
        }
    });
</script>

<script>
    // console.log("dả");
    var key = 0;
    var maps_1 = <?= $map_arr ?>;
    console.log(maps_1);
    var map;
    var InforObj = [];
    var markers = [];
    var inforwindows = [];
    if (maps_1.length >0){
        var centerCords = {
            lat: Number(maps_1[0].latitude),
            lng: Number(maps_1[0].longitude)
        };
    }
    else {
        var centerCords = {
            lat: Number(20.9925),
            lng: Number(105.847)
        };
    }
    window.onload = function () {
        initMap(9, centerCords);
    };
    // window.initMap = initMap(6, centerCords);
    var markersOnMap = [];
    var id = 0;
    maps_1.forEach(function (val) {
        var clonedobj = {
            LatLng: [{
                lat: Number(val.latitude),
                lng: Number(val.longitude)
            }],
            id: '#map' + id,
            title: val.name,
            address: val.address,
            image: val.image,
            link: val.link,
        };
        markersOnMap.push(clonedobj);
        id = id + 1;
    })
    var image = 'https://vacxin.pharbaco.com.vn/wp-content/themes/theme/assets/images/location.png';
    function addMarkerInfo() {
        for (var i = 0; i < markersOnMap.length; i++) {
            // var contentString = '<span class="tiptip-content ws-tiptip">' +
            //     '<img src="'+ markersOnMap[i].image +'" alt="">' +
            //     '<a href="'+ markersOnMap[i].link +'"" ><h3>' + markersOnMap[i].title + '<br>' + markersOnMap[i].address + '</h3><br>' +
            //     '</span>';
            var a = Number(markersOnMap[i].LatLng[0].lat);
            var b = Number(markersOnMap[i].LatLng[0].lng);
            const marker = new google.maps.Marker({
                position: markersOnMap[i].LatLng[0],
                map: map,
                // icon: markersOnMap[i].img,
                icon: image,
            }, {location: new google.maps.LatLng(a, b), weight: 3});

            const infowindow = new google.maps.InfoWindow({
                // content: contentString,
                maxWidth: 300,
            });
            google.maps.event.addListener(marker, 'click', function() {
                closeOtherInfo();
                infowindow.open(marker.get('map'), marker);
                InforObj[0] = infowindow;
                map.setZoom(15);
                map.setCenter(marker.getPosition());
            });
            // marker.addListener('click', function () {
            //     closeOtherInfo();
            //     infowindow.open(marker.get('map'), marker);
            //     InforObj[0] = infowindow;
            //     map.setZoom(15);
            //     map.setCenter(marker.getPosition());
            // });
            markers.push(marker);
            inforwindows.push(infowindow);
        }

    }

    function closeOtherInfo() {
        if (InforObj.length > 0) {
            /* detach the info-window from the marker ... undocumented in the API docs */
            InforObj[0].set("marker", null);
            /* and close it */
            InforObj[0].close();
            /* blank the array */
            InforObj.length = 0;
        }
    }

    function initMap(z, c) {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: z,
            center: c
        });
        addMarkerInfo();
    }
    jQuery('.click-show').on('click',function () {

    });
</script>
