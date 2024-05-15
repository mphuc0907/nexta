<?php get_header();

$category = get_the_category();
$cat_id = $category[0]->cat_ID;
$cat_name = $category[0]->name;
$slug = $category[0]->slug;

// get category parent
$parent = get_term($category[0]->parent, 'category');
$parent_name = $parent->name;
$parent_slug = $parent->slug;

// get post event
$choose_post_event = get_field('choose_post_event', get_the_ID());
// get post news
$choose_post_news = get_field('choose_post_news', get_the_ID());

$post = get_post();
$author_id = $post->post_author;
$author_info_1 = get_userdata($author_id);
$author_info = $author_info_1->display_name;


?>

<?php if ($slug == 'tin-tuc' || $slug == 'bao-chi-noi-gi-ve-nexta' || $parent_slug == 'tin-tuc') : ?>
    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?= home_url() ?>">Trang chủ</a>
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </figure>
                    </li>
                    <li>
                        <a href="<?= home_url() . '/tin-tuc-va-su-kien' ?>">Tin tức & Sự kiện</a>
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </figure>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <?= the_title() ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="section-1-news-detail">
            <div class="container">
                <div class="wrapper row">
                    <div class="col-left col-lg-1">
                        <div class="list-socials">
                            <div class="icon">
                                <a href="<?= 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ?>"
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/images/nd-fb.png" alt="">
                                </figure>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="<?= 'mailto:?subject=' . get_the_title() . '&body=' . get_the_permalink() ?>">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/nd-mail.png" alt="">
                                    </figure>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="#" class="copy_link">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/nd-link.png" alt="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-mid col-lg-7">
                        <div class="post">
                            <div class="top">
                                <div class="title">
                                    <h2>
                                        <?= the_title() ?>
                                    </h2>
                                </div>
                                <div class="date__admin mt-3 d-flex">
                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>
                                            <?= get_the_date('d/m/Y') ?>
                                        </span>
                                    </div>
                                    <?php if ($author_info) : ?>
                                        <div class="admin">
                                            <span>
                                                Nguời đăng: <?= $author_info ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="line mt-3"
                                     style="width: 100%;height: 0.0625rem; background: #D1D5DB;">
                                </div>
                                <?php if (get_field('desc_low', get_the_ID())): ?>
                                    <div class="desc mt-3">
                                        <?= get_field('desc_low', get_the_ID()) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="text">
                                <?= the_content() ?>
                            </div>
                            <div class="list-tag d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                     viewBox="0 0 20 20"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M9.36656 2.33236C8.85485 2.39998 8.22299 2.54512 7.32413 2.75255L6.30065 2.98874C5.54147 3.16393 5.01865 3.28539 4.61932 3.42244C4.2338 3.55476 4.01569 3.68519 3.85112 3.84977C3.68654 4.01435 3.5561 4.23245 3.42379 4.61797C3.28673 5.01731 3.16528 5.54013 2.99008 6.29931L2.75389 7.32279C2.54647 8.22164 2.40133 8.85351 2.3337 9.36521C2.26782 9.86372 2.28301 10.201 2.37095 10.5076C2.45889 10.8143 2.62477 11.1083 2.94485 11.4962C3.2734 11.8942 3.73136 12.3531 4.38365 13.0054L5.90835 14.5301C7.04125 15.663 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.663 14.5315 14.5301C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2193 17.7096 10.7231 17.7096 10.2186C17.7096 9.71403 17.5152 9.21778 16.9974 8.53913C16.4686 7.84607 15.6644 7.03991 14.5315 5.907L13.0068 4.38231C12.3545 3.73002 11.8956 3.27205 11.4975 2.94351C11.1097 2.62343 10.8156 2.45755 10.509 2.36961C10.2024 2.28167 9.86506 2.26648 9.36656 2.33236ZM9.20278 1.09313C9.80055 1.01414 10.3247 1.01637 10.8536 1.16805C11.3825 1.31973 11.8281 1.59564 12.2932 1.97944C12.7427 2.35047 13.2434 2.85113 13.8688 3.4766L15.4486 5.05641C16.5408 6.14858 17.4055 7.01328 17.9912 7.78091C18.5938 8.57074 18.9596 9.33083 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4238 16.5408 14.2885 15.4486 15.3807L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.242 2.35181 12.7414 1.98079 12.2918C1.59698 11.8268 1.32107 11.3811 1.16939 10.8522C1.01771 10.3234 1.01548 9.7992 1.09448 9.20144C1.17084 8.62359 1.33006 7.93369 1.52896 7.07181L1.77951 5.98608C1.94548 5.26682 2.08083 4.68029 2.24148 4.2122C2.40926 3.72334 2.62058 3.31254 2.96723 2.96589C3.31389 2.61924 3.72468 2.40792 4.21354 2.24014C4.68163 2.07948 5.26816 1.94414 5.98742 1.77817L7.07315 1.52762C7.93503 1.32871 8.62493 1.1695 9.20278 1.09313ZM7.91042 6.66258C7.50362 6.25578 6.84407 6.25578 6.43728 6.66258C6.03048 7.06938 6.03048 7.72892 6.43728 8.13572C6.84407 8.54251 7.50362 8.54251 7.91042 8.13572C8.31721 7.72892 8.31721 7.06938 7.91042 6.66258ZM5.55339 5.7787C6.44835 4.88374 7.89935 4.88374 8.7943 5.7787C9.68925 6.67365 9.68925 8.12465 8.7943 9.0196C7.89935 9.91455 6.44835 9.91455 5.55339 9.0196C4.65844 8.12465 4.65844 6.67365 5.55339 5.7787ZM15.8772 9.15843C16.1213 9.40251 16.1213 9.79824 15.8772 10.0423L10.0614 15.8584C9.8173 16.1024 9.42158 16.1024 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15845C15.2374 8.91437 15.6331 8.91436 15.8772 9.15843Z"
                                          fill="#7A7E86"/>
                                </svg>
                                <a href="<?= home_url() . '/category/' . $category[0]->slug ?>">
                                    <?= $category[0]->name ?>
                                </a>
                            </div>
                            <div class="line" style="width: 100%;height: 0.0625rem; background: #D1D5DB;"></div>
                            <div class="back d-flex">
                                <i class="fas fa-arrow-left"></i>
                                <a href="<?= home_url() . '/tin-tuc-va-su-kien' ?>">
                                    Quay lại tin tức
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-right col-lg-4">
                        <div class="card-post">
                            <div class="title-card">
                                <h3>Tin xem nhiều nhất</h3>
                            </div>
                            <?php $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                                'orderby' => 'date',
                                'publish' => true,
                                'post__not_in' => array(get_the_ID()),
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="child">
                                        <div class="category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20"
                                                 fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.36656 2.33239C8.85485 2.40001 8.22299 2.54515 7.32413 2.75258L6.30065 2.98877C5.54147 3.16396 5.01865 3.28542 4.61932 3.42247C4.2338 3.55479 4.01569 3.68523 3.85112 3.8498C3.68654 4.01438 3.5561 4.23248 3.42379 4.61801C3.28673 5.01734 3.16528 5.54016 2.99008 6.29934L2.75389 7.32282C2.54647 8.22167 2.40133 8.85354 2.3337 9.36524C2.26782 9.86375 2.28301 10.201 2.37095 10.5077C2.45889 10.8143 2.62477 11.1084 2.94485 11.4962C3.2734 11.8943 3.73136 12.3532 4.38365 13.0055L5.90835 14.5301C7.04125 15.6631 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.6631 14.5315 14.5302C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2194 17.7096 10.7231 17.7096 10.2186C17.7096 9.71406 17.5152 9.21781 16.9974 8.53916C16.4686 7.8461 15.6644 7.03994 14.5315 5.90703L13.0068 4.38234C12.3545 3.73005 11.8956 3.27208 11.4975 2.94354C11.1097 2.62346 10.8156 2.45758 10.509 2.36964C10.2024 2.2817 9.86506 2.26651 9.36656 2.33239ZM9.20278 1.09316C9.80055 1.01417 10.3247 1.0164 10.8536 1.16808C11.3825 1.31976 11.8281 1.59567 12.2932 1.97947C12.7427 2.3505 13.2434 2.85116 13.8688 3.47663L15.4486 5.05644C16.5408 6.14861 17.4055 7.01331 17.9912 7.78094C18.5938 8.57077 18.9596 9.33086 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4239 16.5408 14.2886 15.4486 15.3808L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.2421 2.35181 12.7414 1.98079 12.2919C1.59698 11.8268 1.32107 11.3812 1.16939 10.8523C1.01771 10.3234 1.01548 9.79923 1.09448 9.20147C1.17084 8.62362 1.33006 7.93372 1.52896 7.07184L1.77951 5.98611C1.94548 5.26685 2.08083 4.68032 2.24148 4.21223C2.40926 3.72337 2.62058 3.31257 2.96723 2.96592C3.31389 2.61927 3.72468 2.40795 4.21354 2.24017C4.68163 2.07952 5.26816 1.94417 5.98742 1.7782L7.07315 1.52765C7.93503 1.32874 8.62493 1.16953 9.20278 1.09316ZM7.91042 6.66261C7.50362 6.25581 6.84407 6.25581 6.43728 6.66261C6.03048 7.06941 6.03048 7.72895 6.43728 8.13575C6.84407 8.54255 7.50362 8.54255 7.91042 8.13575C8.31721 7.72895 8.31721 7.06941 7.91042 6.66261ZM5.55339 5.77873C6.44835 4.88377 7.89935 4.88377 8.7943 5.77873C9.68925 6.67368 9.68925 8.12468 8.7943 9.01963C7.89935 9.91458 6.44835 9.91458 5.55339 9.01963C4.65844 8.12468 4.65844 6.67368 5.55339 5.77873ZM15.8772 9.15847C16.1213 9.40254 16.1213 9.79827 15.8772 10.0423L10.0614 15.8584C9.8173 16.1025 9.42158 16.1025 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15848C15.2374 8.9144 15.6331 8.91439 15.8772 9.15847Z"
                                                      fill="#7A7E86"/>
                                            </svg>
                                            <a href="javascript:void(0)">
                                                <?= get_the_category()[0]->name ?>
                                            </a>
                                        </div>
                                        <div class="title">
                                            <a href="<?= the_permalink() ?>">
                                                <h4>
                                                    <?= the_title() ?>
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span>
                                                <?= get_the_date('d/m/Y') ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2-news-detail">
            <div class="container">
                <div class="title-section">
                    <h2>
                        Bài viết liên quan
                    </h2>
                </div>
                <div class="list-post row">
                    <?php
                    $args_related = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'publish' => true,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'tin-tuc'
                            )
                        )
                    );
                    $query_related = new WP_Query($args_related);
                    ?>
                    <?php if ($query_related->have_posts()) : ?>
                        <?php while ($query_related->have_posts()) : $query_related->the_post(); ?>
                            <div class="item col-lg-4 col-md-6 col-sm-12">
                                <div class="content-wrapper">
                                    <figure>
                                        <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                    </figure>
                                    <div class="text">
                                        <div class="category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20"
                                                 fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.36656 2.33239C8.85485 2.40001 8.22299 2.54515 7.32413 2.75258L6.30065 2.98877C5.54147 3.16396 5.01865 3.28542 4.61932 3.42247C4.2338 3.55479 4.01569 3.68523 3.85112 3.8498C3.68654 4.01438 3.5561 4.23248 3.42379 4.61801C3.28673 5.01734 3.16528 5.54016 2.99008 6.29934L2.75389 7.32282C2.54647 8.22167 2.40133 8.85354 2.3337 9.36524C2.26782 9.86375 2.28301 10.201 2.37095 10.5077C2.45889 10.8143 2.62477 11.1084 2.94485 11.4962C3.2734 11.8943 3.73136 12.3532 4.38365 13.0055L5.90835 14.5301C7.04125 15.6631 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.6631 14.5315 14.5302C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2194 17.7096 10.7231 17.7096 10.2186C17.7096 9.71406 17.5152 9.21781 16.9974 8.53916C16.4686 7.8461 15.6644 7.03994 14.5315 5.90703L13.0068 4.38234C12.3545 3.73005 11.8956 3.27208 11.4975 2.94354C11.1097 2.62346 10.8156 2.45758 10.509 2.36964C10.2024 2.2817 9.86506 2.26651 9.36656 2.33239ZM9.20278 1.09316C9.80055 1.01417 10.3247 1.0164 10.8536 1.16808C11.3825 1.31976 11.8281 1.59567 12.2932 1.97947C12.7427 2.3505 13.2434 2.85116 13.8688 3.47663L15.4486 5.05644C16.5408 6.14861 17.4055 7.01331 17.9912 7.78094C18.5938 8.57077 18.9596 9.33086 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4239 16.5408 14.2886 15.4486 15.3808L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.2421 2.35181 12.7414 1.98079 12.2919C1.59698 11.8268 1.32107 11.3812 1.16939 10.8523C1.01771 10.3234 1.01548 9.79923 1.09448 9.20147C1.17084 8.62362 1.33006 7.93372 1.52896 7.07184L1.77951 5.98611C1.94548 5.26685 2.08083 4.68032 2.24148 4.21223C2.40926 3.72337 2.62058 3.31257 2.96723 2.96592C3.31389 2.61927 3.72468 2.40795 4.21354 2.24017C4.68163 2.07952 5.26816 1.94417 5.98742 1.7782L7.07315 1.52765C7.93503 1.32874 8.62493 1.16953 9.20278 1.09316ZM7.91042 6.66261C7.50362 6.25581 6.84407 6.25581 6.43728 6.66261C6.03048 7.06941 6.03048 7.72895 6.43728 8.13575C6.84407 8.54255 7.50362 8.54255 7.91042 8.13575C8.31721 7.72895 8.31721 7.06941 7.91042 6.66261ZM5.55339 5.77873C6.44835 4.88377 7.89935 4.88377 8.7943 5.77873C9.68925 6.67368 9.68925 8.12468 8.7943 9.01963C7.89935 9.91458 6.44835 9.91458 5.55339 9.01963C4.65844 8.12468 4.65844 6.67368 5.55339 5.77873ZM15.8772 9.15847C16.1213 9.40254 16.1213 9.79827 15.8772 10.0423L10.0614 15.8584C9.8173 16.1025 9.42158 16.1025 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15848C15.2374 8.9144 15.6331 8.91439 15.8772 9.15847Z"
                                                      fill="#7A7E86"/>
                                            </svg>
                                            <span>
                                        <?= get_the_category()[0]->name ?>
                                    </span>
                                        </div>
                                        <div class="title">
                                            <a href="<?= the_permalink() ?>">
                                                <?= the_title() ?>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <p>
                                                <?= get_the_excerpt() ?>
                                            </p>
                                        </div>
                                        <div class="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span>
                                        <?= get_the_date('d/m/Y') ?>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
<?php endif; ?>
<?php if ($slug == 'su-kien' || $parent_slug == 'su-kien') : ?>
    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?= home_url() ?>">Trang chủ</a>
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </figure>
                    </li>
                    <li>
                        <a href="<?= home_url() . '/tin-tuc-va-su-kien' ?>">Tin tức & Sự kiện</a>
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                 fill="none">
                                <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </figure>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <?= the_title() ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="section-1-news-detail section-2-event-detail">
            <div class="container">
                <div class="wrapper row">
                    <div class="col-left col-lg-1">
                        <div class="list-socials">
                            <div class="icon">
                                <a href="<?= 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ?>"
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/dist/images/nd-fb.png" alt="">
                                </figure>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="<?= 'mailto:?subject=' . get_the_title() . '&body=' . get_the_permalink() ?>">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/nd-mail.png" alt="">
                                    </figure>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="#" class="copy_link">
                                    <figure>
                                        <img src="<?= get_template_directory_uri() ?>/dist/images/nd-link.png" alt="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-mid col-lg-7">
                        <div class="post">
                            <div class="top">
                                <div class="title">
                                    <h2>
                                        <?= the_title() ?>
                                    </h2>
                                </div>
                                <div class="register mt-3 d-flex">
                                    <?php if (get_field('from', get_the_ID()) && get_field('to', get_the_ID()) && get_field('location', get_the_ID())): ?>
                                    <div class="left">
                                        <?php if (get_field('from', get_the_ID())): ?>
                                            <div class="from">
                                                <span>Từ</span>
                                                <span>
                                                <?= get_field('from', get_the_ID()) ?>
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_field('to', get_the_ID())): ?>
                                            <div class="to">
                                                <span>Đến</span>
                                                <span>
                                                <?= get_field('to', get_the_ID()) ?>
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (get_field('location', get_the_ID())): ?>
                                            <div class="location">
                                                <span>Địa điểm</span>
                                                <span>
                                                <?= get_field('location', get_the_ID()) ?>
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="right">
                                        <div class="btn-reg">
                                            <a type="button" class="btn" data-bs-toggle="modal"
                                               href="#exampleModalToggle" role="button">Đăng ký tham gia sự kiện</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="line mt-3"
                                     style="width: 100%;height: 0.0625rem; background: #D1D5DB;"></div>
                                <?php if (get_field('desc_low', get_the_ID())): ?>
                                    <div class="desc mt-3">
                                        <p>
                                            <?= get_field('desc_low', get_the_ID()) ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="text">
                                <?= the_content() ?>
                            </div>
                            <div class="list-tag d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20"
                                             fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M9.36656 2.33236C8.85485 2.39998 8.22299 2.54512 7.32413 2.75255L6.30065 2.98874C5.54147 3.16393 5.01865 3.28539 4.61932 3.42244C4.2338 3.55476 4.01569 3.68519 3.85112 3.84977C3.68654 4.01435 3.5561 4.23245 3.42379 4.61797C3.28673 5.01731 3.16528 5.54013 2.99008 6.29931L2.75389 7.32279C2.54647 8.22164 2.40133 8.85351 2.3337 9.36521C2.26782 9.86372 2.28301 10.201 2.37095 10.5076C2.45889 10.8143 2.62477 11.1083 2.94485 11.4962C3.2734 11.8942 3.73136 12.3531 4.38365 13.0054L5.90835 14.5301C7.04125 15.663 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.663 14.5315 14.5301C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2193 17.7096 10.7231 17.7096 10.2186C17.7096 9.71403 17.5152 9.21778 16.9974 8.53913C16.4686 7.84607 15.6644 7.03991 14.5315 5.907L13.0068 4.38231C12.3545 3.73002 11.8956 3.27205 11.4975 2.94351C11.1097 2.62343 10.8156 2.45755 10.509 2.36961C10.2024 2.28167 9.86506 2.26648 9.36656 2.33236ZM9.20278 1.09313C9.80055 1.01414 10.3247 1.01637 10.8536 1.16805C11.3825 1.31973 11.8281 1.59564 12.2932 1.97944C12.7427 2.35047 13.2434 2.85113 13.8688 3.4766L15.4486 5.05641C16.5408 6.14858 17.4055 7.01328 17.9912 7.78091C18.5938 8.57074 18.9596 9.33083 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4238 16.5408 14.2885 15.4486 15.3807L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.242 2.35181 12.7414 1.98079 12.2918C1.59698 11.8268 1.32107 11.3811 1.16939 10.8522C1.01771 10.3234 1.01548 9.7992 1.09448 9.20144C1.17084 8.62359 1.33006 7.93369 1.52896 7.07181L1.77951 5.98608C1.94548 5.26682 2.08083 4.68029 2.24148 4.2122C2.40926 3.72334 2.62058 3.31254 2.96723 2.96589C3.31389 2.61924 3.72468 2.40792 4.21354 2.24014C4.68163 2.07948 5.26816 1.94414 5.98742 1.77817L7.07315 1.52762C7.93503 1.32871 8.62493 1.1695 9.20278 1.09313ZM7.91042 6.66258C7.50362 6.25578 6.84407 6.25578 6.43728 6.66258C6.03048 7.06938 6.03048 7.72892 6.43728 8.13572C6.84407 8.54251 7.50362 8.54251 7.91042 8.13572C8.31721 7.72892 8.31721 7.06938 7.91042 6.66258ZM5.55339 5.7787C6.44835 4.88374 7.89935 4.88374 8.7943 5.7787C9.68925 6.67365 9.68925 8.12465 8.7943 9.0196C7.89935 9.91455 6.44835 9.91455 5.55339 9.0196C4.65844 8.12465 4.65844 6.67365 5.55339 5.7787ZM15.8772 9.15843C16.1213 9.40251 16.1213 9.79824 15.8772 10.0423L10.0614 15.8584C9.8173 16.1024 9.42158 16.1024 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15845C15.2374 8.91437 15.6331 8.91436 15.8772 9.15843Z"
                                                  fill="#7A7E86"/>
                                        </svg>
                                <a href="<?= home_url() . '/category/' . $category[0]->slug ?>">
                                    <?= $category[0]->name ?>
                                </a>
                            </div>
                            <div class="line" style="width: 100%;height: 0.0625rem; background: #D1D5DB;"></div>
                            <div class="back d-flex">
                                <i class="fas fa-arrow-left"></i>
                                <a href="<?= home_url() . '/tin-tuc-va-su-kien' ?>">
                                    Quay lại tin tức
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-right col-lg-4">
                        <div class="card-post">
                            <div class="title-card">
                                <h3>Sự kiện xem nhiều nhất</h3>
                            </div>
                            <?php
                            $args_2 = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'order' => 'DESC',
                                'orderby' => 'date',
                                'publish' => true,
                                'post__not_in' => array(get_the_ID()),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'su-kien'
                                    )
                                )
                            );
                            $query_2 = new WP_Query($args_2);
                            ?>
                            <?php if ($query_2->have_posts()) :
                                while ($query_2->have_posts()) : $query_2->the_post();
                                    ?>
                                    <div class="child">
                                        <div class="category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20"
                                                 fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.36656 2.33239C8.85485 2.40001 8.22299 2.54515 7.32413 2.75258L6.30065 2.98877C5.54147 3.16396 5.01865 3.28542 4.61932 3.42247C4.2338 3.55479 4.01569 3.68523 3.85112 3.8498C3.68654 4.01438 3.5561 4.23248 3.42379 4.61801C3.28673 5.01734 3.16528 5.54016 2.99008 6.29934L2.75389 7.32282C2.54647 8.22167 2.40133 8.85354 2.3337 9.36524C2.26782 9.86375 2.28301 10.201 2.37095 10.5077C2.45889 10.8143 2.62477 11.1084 2.94485 11.4962C3.2734 11.8943 3.73136 12.3532 4.38365 13.0055L5.90835 14.5301C7.04125 15.6631 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.6631 14.5315 14.5302C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2194 17.7096 10.7231 17.7096 10.2186C17.7096 9.71406 17.5152 9.21781 16.9974 8.53916C16.4686 7.8461 15.6644 7.03994 14.5315 5.90703L13.0068 4.38234C12.3545 3.73005 11.8956 3.27208 11.4975 2.94354C11.1097 2.62346 10.8156 2.45758 10.509 2.36964C10.2024 2.2817 9.86506 2.26651 9.36656 2.33239ZM9.20278 1.09316C9.80055 1.01417 10.3247 1.0164 10.8536 1.16808C11.3825 1.31976 11.8281 1.59567 12.2932 1.97947C12.7427 2.3505 13.2434 2.85116 13.8688 3.47663L15.4486 5.05644C16.5408 6.14861 17.4055 7.01331 17.9912 7.78094C18.5938 8.57077 18.9596 9.33086 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4239 16.5408 14.2886 15.4486 15.3808L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.2421 2.35181 12.7414 1.98079 12.2919C1.59698 11.8268 1.32107 11.3812 1.16939 10.8523C1.01771 10.3234 1.01548 9.79923 1.09448 9.20147C1.17084 8.62362 1.33006 7.93372 1.52896 7.07184L1.77951 5.98611C1.94548 5.26685 2.08083 4.68032 2.24148 4.21223C2.40926 3.72337 2.62058 3.31257 2.96723 2.96592C3.31389 2.61927 3.72468 2.40795 4.21354 2.24017C4.68163 2.07952 5.26816 1.94417 5.98742 1.7782L7.07315 1.52765C7.93503 1.32874 8.62493 1.16953 9.20278 1.09316ZM7.91042 6.66261C7.50362 6.25581 6.84407 6.25581 6.43728 6.66261C6.03048 7.06941 6.03048 7.72895 6.43728 8.13575C6.84407 8.54255 7.50362 8.54255 7.91042 8.13575C8.31721 7.72895 8.31721 7.06941 7.91042 6.66261ZM5.55339 5.77873C6.44835 4.88377 7.89935 4.88377 8.7943 5.77873C9.68925 6.67368 9.68925 8.12468 8.7943 9.01963C7.89935 9.91458 6.44835 9.91458 5.55339 9.01963C4.65844 8.12468 4.65844 6.67368 5.55339 5.77873ZM15.8772 9.15847C16.1213 9.40254 16.1213 9.79827 15.8772 10.0423L10.0614 15.8584C9.8173 16.1025 9.42158 16.1025 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15848C15.2374 8.9144 15.6331 8.91439 15.8772 9.15847Z"
                                                      fill="#7A7E86"/>
                                            </svg>
                                            <a href="javascript:void(0)">
                                                <?= get_the_category()[0]->name ?>
                                            </a>
                                        </div>
                                        <div class="title">
                                            <a href="<?= the_permalink() ?>">
                                                <h4>
                                                    <?= the_title() ?>
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span>
                                                <?= get_the_date('d/m/Y') ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2-news-detail section-2-event-detail">
            <div class="container">
                <div class="title-section">
                    <h2>
                        Sự kiện liên quan
                    </h2>
                </div>
                <div class="list-post row">
                    <?php
                    $args_related = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'publish' => true,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'su-kien'
                            )
                        )
                    );
                    $query_related = new WP_Query($args_related);
                    ?>
                    <?php if ($query_related->have_posts()) : ?>
                        <?php while ($query_related->have_posts()) : $query_related->the_post();
                            $event_date = get_field('event_date', get_the_ID());
                            $location = get_field('location', get_the_ID());
                            ?>
                            <div class="item col-lg-4 col-md-6 col-sm-12">
                                <div class="content-wrapper">
                                    <figure>
                                        <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                        <?php if ($event_date) : ?>
                                            <span class="day-end">
                                         <?= $event_date ?>
                                         </span>
                                        <?php endif; ?>
                                    </figure>
                                    <div class="text">
                                        <div class="category">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20"
                                                 fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.36656 2.33239C8.85485 2.40001 8.22299 2.54515 7.32413 2.75258L6.30065 2.98877C5.54147 3.16396 5.01865 3.28542 4.61932 3.42247C4.2338 3.55479 4.01569 3.68523 3.85112 3.8498C3.68654 4.01438 3.5561 4.23248 3.42379 4.61801C3.28673 5.01734 3.16528 5.54016 2.99008 6.29934L2.75389 7.32282C2.54647 8.22167 2.40133 8.85354 2.3337 9.36524C2.26782 9.86375 2.28301 10.201 2.37095 10.5077C2.45889 10.8143 2.62477 11.1084 2.94485 11.4962C3.2734 11.8943 3.73136 12.3532 4.38365 13.0055L5.90835 14.5301C7.04125 15.6631 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.6631 14.5315 14.5302C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2194 17.7096 10.7231 17.7096 10.2186C17.7096 9.71406 17.5152 9.21781 16.9974 8.53916C16.4686 7.8461 15.6644 7.03994 14.5315 5.90703L13.0068 4.38234C12.3545 3.73005 11.8956 3.27208 11.4975 2.94354C11.1097 2.62346 10.8156 2.45758 10.509 2.36964C10.2024 2.2817 9.86506 2.26651 9.36656 2.33239ZM9.20278 1.09316C9.80055 1.01417 10.3247 1.0164 10.8536 1.16808C11.3825 1.31976 11.8281 1.59567 12.2932 1.97947C12.7427 2.3505 13.2434 2.85116 13.8688 3.47663L15.4486 5.05644C16.5408 6.14861 17.4055 7.01331 17.9912 7.78094C18.5938 8.57077 18.9596 9.33086 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4239 16.5408 14.2886 15.4486 15.3808L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.2421 2.35181 12.7414 1.98079 12.2919C1.59698 11.8268 1.32107 11.3812 1.16939 10.8523C1.01771 10.3234 1.01548 9.79923 1.09448 9.20147C1.17084 8.62362 1.33006 7.93372 1.52896 7.07184L1.77951 5.98611C1.94548 5.26685 2.08083 4.68032 2.24148 4.21223C2.40926 3.72337 2.62058 3.31257 2.96723 2.96592C3.31389 2.61927 3.72468 2.40795 4.21354 2.24017C4.68163 2.07952 5.26816 1.94417 5.98742 1.7782L7.07315 1.52765C7.93503 1.32874 8.62493 1.16953 9.20278 1.09316ZM7.91042 6.66261C7.50362 6.25581 6.84407 6.25581 6.43728 6.66261C6.03048 7.06941 6.03048 7.72895 6.43728 8.13575C6.84407 8.54255 7.50362 8.54255 7.91042 8.13575C8.31721 7.72895 8.31721 7.06941 7.91042 6.66261ZM5.55339 5.77873C6.44835 4.88377 7.89935 4.88377 8.7943 5.77873C9.68925 6.67368 9.68925 8.12468 8.7943 9.01963C7.89935 9.91458 6.44835 9.91458 5.55339 9.01963C4.65844 8.12468 4.65844 6.67368 5.55339 5.77873ZM15.8772 9.15847C16.1213 9.40254 16.1213 9.79827 15.8772 10.0423L10.0614 15.8584C9.8173 16.1025 9.42158 16.1025 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15848C15.2374 8.9144 15.6331 8.91439 15.8772 9.15847Z"
                                                      fill="#7A7E86"/>
                                            </svg>
                                            <span>
                                            <?= get_the_category()[0]->name ?>
                                        </span>
                                        </div>
                                        <div class="title">
                                            <a href="<?= the_permalink() ?>">
                                                <?= the_title() ?>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <p>
                                                <?= get_the_excerpt() ?>
                                            </p>
                                        </div>
                                        <?php if ($location) : ?>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>
                                                Địa điểm:
                                                <?= $location ?>
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span>
                                            <?= get_the_date('d/m/Y') ?>
                                        </span>
                                        </div>
                                        <div class="reg">
                                            <a href="<?= the_permalink() ?>" class="btn">Đăng ký ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <div class="modal fade modal-form" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
             tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="form">
                        <div class="title">
                            <h3>Đăng ký tham gia sự kiện</h3>
                            <!--                        <p>Lớp học chuyển đổi số cơ bản</p>-->
                        </div>
                        <form id="form-event" action="" method="post">
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


    </main>
<?php endif; ?>
<input type="hidden" id="urlAjax" value="<?= admin_url() ?>admin-ajax.php">
<input type="hidden" id="name_event" value="<?= get_the_title() ?>">
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        $(".copy_link").click(function (e) {
            e.preventDefault();
            var url = window.location.href;
            copyToClipboard(url);
            Toastify({
                text: "Sao chép link thành công!",
                className: "info",
                position: "left",
                style: {
                    background: "linear-gradient(269deg, #2B54A5 49.86%, #22AAE1 99.34%)",
                }
            }).showToast();
        });

        function copyToClipboard(text) {
            var input = document.createElement('input');
            input.setAttribute('readonly', 'readonly');
            input.setAttribute('value', text);
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
        }

        // fix height
        var texts = $('.list-post .content-wrapper .text');
        var maxHeight = 0;

        texts.each(function () {
            var height = $(this).outerHeight();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        var maxHeightRem = maxHeight / parseFloat($('html').css('font-size'));
        texts.css('min-height', maxHeightRem + 'rem');
    });
</script>
<script>
    $(document).ready(function () {
        $('body').on('click', '#btn_submit', function (e) {
            //get data từ form
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
            var address = $("input[name='address']").val();
            var note = $("input[name='note']").val();
            var name_event = $('#name_event').val();
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
                    name_event,
                    action: 'reg_app',
                    action_2: 'send_mail_event'
                },
                beforeSend: function () {
                    $('.divgif').css('display', 'block');
                },
                success: function (response) {
                    console.log(response.status);
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
    });
</script>
<script>
    $(document).ready(function () {
        if (!$('.register').hasClass('left')) {
           $('.section-2-event-detail .container .wrapper .col-mid .post .top .register .right').css('position', 'unset');
            $('.section-2-event-detail .container .wrapper .col-mid .post .top .register').css('justify-content', 'unset');
        }
    });
</script>
