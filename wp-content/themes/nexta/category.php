<?php
$category = get_the_category();
// get-slug by category
$slug = $category[0]->slug;
$name = $category[0]->name;
// get category parent
$parent = get_term($category[0]->parent, 'category');
$parent_name = $parent->name;
$parent_slug = $parent->slug;
$terms = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
    'child_of' => $category[0]->term_id
]);
?>
<?php get_header(); ?>
<main>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/lib/jquery/jquery.min.js"></script>

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
                    <a href="<?= home_url() ?>/tin-tuc-va-su-kien">Tin tức & Sự kiện</a>
                    <figure>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M4.58398 3L7.58398 6L4.58398 9" stroke="#9CA3AF" stroke-width="0.75"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </figure>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <?php if ($category[0]->slug == "nha-truong") :?>
                        Sự kiện
                        <?php else:?>
                        <?= $category[0]->name ?>
                        <?php endif;?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php if ($slug == 'tin-tuc' || $parent_slug == 'tin-tuc') : ?>
        <section class="section-news">
            <div class="container">
                <div class="wrapper">
                    <div class="col-left">
                        <div class="title">
                            <h2>Khám phá tất cả
                                <?= $parent_name ?>
                            </h2>
                        </div>
                        <div class="tabs-control">
                            <ul>

                                <li class="active">
                                    <a href="#1">
                                        <?php if (!$parent_slug) : ?>
                                            Tất cả
                                        <?php endif; ?>
                                        <?php if ($slug && $parent_slug) : ?>
                                                <?= $name ?>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <?php
                                $terms_tin_tuc = $terms;
                                $child = '';
                                if($category[0]->term_id == 13){
                                    $child = '13';
                                }
                                if ($slug == 'tin-tuc') {
                                    $terms_tin_tuc = get_terms([
                                        'taxonomy' => 'category',
                                        'hide_empty' => false,
                                        'child_of' =>$category[0]->term_id
                                    ]);
                                }
                                if ($parent_slug == 'tin-tuc') {
                                    $terms_tin_tuc = get_terms([
                                        'taxonomy' => 'category',
                                        'hide_empty' => false,
                                        'child_of' => $category[0]->term_id
                                    ]);
                                }
                                ?>
                                <?php foreach ($terms_tin_tuc as $term): ?>
                                    <li>
                                        <a href="#<?= $term->term_id ?>">
                                            <?= $term->name ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="search">
                            <div class="top">
                                <form action="<?= home_url() ?>/category/<?= $slug ?>" method="get" style="display: flex; flex: 1">
                                <input type="text" placeholder="Tìm kiếm tin tức" name="search"
                                       value="<?= sanitize_text_field($_GET['search']) ?>">
                                <button>
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            </div>
                            <div class="bot">
                                <span class="hide_1">Hiển thị
                                    <span id="number_tin_tuc">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php foreach ($terms_tin_tuc as $term): ?>
                                <span class="hide_<?= $term->term_id ?>">Hiển thị
                                    <span id="number_tin_tuc_<?= $term->term_id ?>">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <div class="tabs-content">
                            <div class="tab-pane active" id="1">
                                <div class="list-post row">
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $slug_tin_tuc = $parent_slug;
                                    if ($parent_slug == null) {
                                        $slug_tin_tuc = 'tin-tuc';
                                    }
                                    if($parent_slug == 'tin-tuc'){
                                        $slug_tin_tuc = $category[0]->slug;
                                    }
                                    $args = array(
                                        'paged' => $paged,
                                        'post_type' => 'post',
                                        'posts_per_page' => get_option('posts_per_page'),
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'category_name' => $slug_tin_tuc,
                                        's' => sanitize_text_field($_GET['search'])
                                    );
                                    $query = new WP_Query($args);
                                    $number_post = $query->found_posts;
                                    ?>
                                    <input type="hidden" id="number_tin_tuc_hide" value="<?= $number_post ?>">
                                    <?php if ($query->have_posts()) : ?>
                                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                                            <div class="item col-lg-6">
                                                <div class="content-wrapper">
                                                    <figure>
                                                        <img src=" <?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                                    </figure>
                                                    <div class="text">
                                                        <div class="category">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20"
                                                                 viewBox="0 0 20 20" fill="none">
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
                                                                <?= the_excerpt() ?>
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
                                        <?php wp_reset_postdata(); ?>
                                    <?php else: ?>
                                        <div class="item col-lg-12">
                                            <div class="content-wrapper">
                                                <div class="text">
                                                    <div class="title">
                                                    <span class="text-danger">
                                                        Không có bài viết nào
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                    <nav class="pagination">
                                        <ul>
                                            <li class="pre">
                                                <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                    <i class="fas fa-chevron-left"></i>
                                                    <span> Trước</span>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $query->max_num_pages; $i++): ?>
                                                <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                    <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="next">
                                                <a href="<?= esc_url(add_query_arg('paged', min($query->max_num_pages, $paged + 1))) ?>">
                                                    <span>Sau</span>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                            </div>
                            <?php foreach ($terms_tin_tuc as $index => $term) : ?>
                                <div class="tab-pane" id="<?= $term->term_id ?>">
                                    <div class="list-post row">
                                        <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $args_2 = array(
                                            'paged' => $paged,
                                            'post_type' => 'post',
                                            'posts_per_page' => get_option('posts_per_page'),
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'category_name' => $term->slug,
                                            's' => sanitize_text_field($_GET['search']),
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'category',
                                                    'field' => 'slug',
                                                    'terms' => $term->slug
                                                )
                                            )
                                        );
                                        $args_array["arg" . ($index + 1)] = $args_2;
                                        $query_post_2 = new WP_Query($args_2);
                                        $number_post_2_tin_tuc = $query_post_2->found_posts;
                                        ?>
                                        <input type="hidden" id="number_tin_tuc_<?= $term->term_id ?>_hide"
                                               value="<?= $number_post_2_tin_tuc ?>">
                                        <script>
                                            $(document).ready(function () {
                                                $('.hide_<?= $term->term_id ?>').hide();
                                                $('.hide_1').show();
                                                $('.tabs-control ul li').on('click', function () {
                                                    var term_id = $(this).find('a').attr('href').replace('#', '');
                                                    var number = <?= $term->term_id ?>;
                                                    if(term_id == number){
                                                        $('.hide_' + term_id).show();
                                                        $('.hide_' + term_id).find('span').text($('#number_tin_tuc_' + term_id + '_hide').val());
                                                        $('.hide_' + term_id).siblings().hide();
                                                    }
                                                    if(term_id == 1){
                                                        $('.hide_1').show();
                                                        $('.hide_1').find('span').text($('#number_tin_tuc_hide').val());
                                                        $('.hide_1').siblings().hide();
                                                    }
                                                });
                                            });
                                        </script>
                                        <?php if ($query_post_2->have_posts()) : ?>
                                            <?php while ($query_post_2->have_posts()) : $query_post_2->the_post(); ?>
                                                <div class="item col-lg-6">
                                                    <div class="content-wrapper">
                                                        <figure>
                                                            <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                                        </figure>
                                                        <div class="text">
                                                            <div class="category">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20"
                                                                     viewBox="0 0 20 20" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M9.36656 2.33239C8.85485 2.40001 8.22299 2.54515 7.32413 2.75258L6.30065 2.98877C5.54147 3.16396 5.01865 3.28542 4.61932 3.42247C4.2338 3.55479 4.01569 3.68523 3.85112 3.8498C3.68654 4.01438 3.5561 4.23248 3.42379 4.61801C3.28673 5.01734 3.16528 5.54016 2.99008 6.29934L2.75389 7.32282C2.54647 8.22167 2.40133 8.85354 2.3337 9.36524C2.26782 9.86375 2.28301 10.201 2.37095 10.5077C2.45889 10.8143 2.62477 11.1084 2.94485 11.4962C3.2734 11.8943 3.73136 12.3532 4.38365 13.0055L5.90835 14.5301C7.04125 15.6631 7.84741 16.4673 8.54048 16.9961C9.21912 17.5139 9.71537 17.7083 10.2199 17.7083C10.7244 17.7083 11.2207 17.5139 11.8993 16.9961C12.5924 16.4673 13.3986 15.6631 14.5315 14.5302C15.6644 13.3972 16.4686 12.5911 16.9974 11.898C17.5152 11.2194 17.7096 10.7231 17.7096 10.2186C17.7096 9.71406 17.5152 9.21781 16.9974 8.53916C16.4686 7.8461 15.6644 7.03994 14.5315 5.90703L13.0068 4.38234C12.3545 3.73005 11.8956 3.27208 11.4975 2.94354C11.1097 2.62346 10.8156 2.45758 10.509 2.36964C10.2024 2.2817 9.86506 2.26651 9.36656 2.33239ZM9.20278 1.09316C9.80055 1.01417 10.3247 1.0164 10.8536 1.16808C11.3825 1.31976 11.8281 1.59567 12.2932 1.97947C12.7427 2.3505 13.2434 2.85116 13.8688 3.47663L15.4486 5.05644C16.5408 6.14861 17.4055 7.01331 17.9912 7.78094C18.5938 8.57077 18.9596 9.33086 18.9596 10.2186C18.9596 11.1063 18.5938 11.8664 17.9912 12.6562C17.4055 13.4239 16.5408 14.2886 15.4486 15.3808L15.3821 15.4473C14.2899 16.5395 13.4252 17.4042 12.6576 17.9899C11.8677 18.5925 11.1076 18.9583 10.2199 18.9583C9.33217 18.9583 8.57208 18.5925 7.78225 17.9899C7.01462 17.4042 6.14991 16.5395 5.05773 15.4473L3.47793 13.8675C2.85247 13.2421 2.35181 12.7414 1.98079 12.2919C1.59698 11.8268 1.32107 11.3812 1.16939 10.8523C1.01771 10.3234 1.01548 9.79923 1.09448 9.20147C1.17084 8.62362 1.33006 7.93372 1.52896 7.07184L1.77951 5.98611C1.94548 5.26685 2.08083 4.68032 2.24148 4.21223C2.40926 3.72337 2.62058 3.31257 2.96723 2.96592C3.31389 2.61927 3.72468 2.40795 4.21354 2.24017C4.68163 2.07952 5.26816 1.94417 5.98742 1.7782L7.07315 1.52765C7.93503 1.32874 8.62493 1.16953 9.20278 1.09316ZM7.91042 6.66261C7.50362 6.25581 6.84407 6.25581 6.43728 6.66261C6.03048 7.06941 6.03048 7.72895 6.43728 8.13575C6.84407 8.54255 7.50362 8.54255 7.91042 8.13575C8.31721 7.72895 8.31721 7.06941 7.91042 6.66261ZM5.55339 5.77873C6.44835 4.88377 7.89935 4.88377 8.7943 5.77873C9.68925 6.67368 9.68925 8.12468 8.7943 9.01963C7.89935 9.91458 6.44835 9.91458 5.55339 9.01963C4.65844 8.12468 4.65844 6.67368 5.55339 5.77873ZM15.8772 9.15847C16.1213 9.40254 16.1213 9.79827 15.8772 10.0423L10.0614 15.8584C9.8173 16.1025 9.42158 16.1025 9.17749 15.8584C8.93341 15.6143 8.9334 15.2186 9.17748 14.9745L14.9933 9.15848C15.2374 8.9144 15.6331 8.91439 15.8772 9.15847Z"
                                                                          fill="#7A7E86"/>
                                                                </svg>
                                                                <span>
                                                    <?= $term->name ?>
                                                </span>
                                                            </div>
                                                            <div class="title">
                                                                <a href="<?= the_permalink() ?>">
                                                                    <?= the_title() ?>
                                                                </a>
                                                            </div>
                                                            <div class="desc">
                                                                <p>
                                                                    <?= the_excerpt() ?>
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
                                            <?php wp_reset_postdata(); ?>
                                        <?php else: ?>
                                            <div class="item col-lg-12">
                                                <div class="content-wrapper">
                                                    <div class="text">
                                                        <div class="title">
                                                    <span class="text-danger">
                                                        Không có bài viết nào
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($query_post_2->max_num_pages > 1 && isset($_GET['search'])): ?>
                                        <nav class="pagination">
                                            <ul>
                                                <li class="pre">
                                                    <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span> Trước</span>
                                                    </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $query_post_2->max_num_pages; $i++): ?>
                                                    <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                        <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                            <?= $i ?>
                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                                <li class="next">
                                                    <a href="<?= esc_url(add_query_arg('paged', min($query_post_2->max_num_pages, $paged + 1))) ?>">
                                                        <span>Sau</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($slug == 'su-kien' || $parent_slug == 'su-kien') : ?>
        <section class="section-news section-event">
            <div class="container">
                <div class="wrapper">
                    <div class="col-left">
                        <div class="title">
                            <h2>Khám phá tất cả
                                Sự kiện
                            </h2>
                        </div>
                        <div class="tabs-control">
                            <ul>
                                <li class="active">
                                    <a href="#1">
                                        Tất cả
                                    </a>
                                </li>
                                <?php
                                $terms_su_kien = $terms;
                                if ($slug == 'su-kien') {
                                    $terms_su_kien = get_terms([
                                        'taxonomy' => 'category',
                                        'hide_empty' => false,
                                        'child_of' =>$category[0]->term_id
                                    ]);
                                }
                                if ($parent_slug == 'su-kien') {
                                    $terms_su_kien = get_terms([
                                        'taxonomy' => 'category',
                                        'hide_empty' => false,
                                        'child_of' => 3
                                    ]);
                                }
                                ?>
                                <?php foreach ($terms_su_kien as $term): ?>
                                    <li>
                                        <a href="#<?= $term->term_id ?>">
                                            <?= $term->name ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="search">
                            <div class="top">
                                <form action="<?= home_url() ?>/category/<?= $slug ?>" method="get" style="display: flex; flex: 1">
                                    <input type="text" placeholder="Tìm kiếm sự kiện" name="search"
                                           value="<?= sanitize_text_field($_GET['search']) ?>">
                                    <button>
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="bot">
                                <span class="hide_1">Hiển thị
                                    <span id="number_su_kien">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php foreach ($terms_su_kien as $term): ?>
                                    <span class="hide_<?= $term->term_id ?>">Hiển thị
                                    <span id="number_su_kien_<?= $term->term_id ?>">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tabs-content">
                            <div class="tab-pane active" id="1">
                                <div class="list-post row">
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $parent_slug_event = $parent_slug;
                                    if ($parent_slug == null) {
                                        $parent_slug_event = 'su-kien';
                                    }
                                    if ($parent_slug == 'su-kien') {
                                        $parent_slug_event = 'su-kien';

                                    }
                                    $args = array(
                                        'paged' => $paged,
                                        'post_type' => 'post',
                                        'posts_per_page' => get_option('posts_per_page'),
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'category_name' => $parent_slug_event,
                                        's' => sanitize_text_field($_GET['search'])
                                    );
                                    $query_event = new WP_Query($args);
                                    $number_post_event = $query_event->found_posts;
                                    ?>
                                    <input type="hidden" id="number_su_kien_hide" value="<?= $number_post_event ?>">
                                    <?php if ($query_event->have_posts()) : ?>
                                        <?php while ($query_event->have_posts()) : $query_event->the_post();
                                            $event_date = get_field('event_date', get_the_ID());
                                            $location = get_field('location', get_the_ID());
                                        ?>
                                            <div class="item col-lg-6">
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20" viewBox="0 0 20 20" fill="none">
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
                                                                <?= the_excerpt() ?>
                                                            </p>
                                                        </div>
                                                        <?php if ($location) : ?>
                                                        <div class="location">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span>Địa điểm: <?= $location ?></span>
                                                        </div>
                                                        <?php endif; ?>
                                                        <div class="date">
                                                            <i class="far fa-calendar-alt"></i>
                                                            <span>
                                                                <?= get_the_date('d/m/Y') ?>
                                                            </span>
                                                        </div>
                                                        <div class="reg">
                                                            <a href="<?= the_permalink() ?>" class="btn">
                                                                Đăng ký ngay
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php else: ?>
                                        <div class="item col-lg-12">
                                            <div class="content-wrapper">
                                                <div class="text">
                                                    <div class="title">
                                                    <span class="text-danger">
                                                        Không có bài viết nào
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($query_event->max_num_pages > 1) : ?>
                                    <nav class="pagination">
                                        <ul>
                                            <li class="pre">
                                                <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                    <i class="fas fa-chevron-left"></i>
                                                    <span> Trước</span>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $query_event->max_num_pages; $i++): ?>
                                                <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                    <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="next">
                                                <a href="<?= esc_url(add_query_arg('paged', min($query_event->max_num_pages, $paged + 1))) ?>">
                                                    <span>Sau</span>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                <?php endif; ?>
                            </div>
                            <?php foreach ($terms_su_kien as $index => $term) : ?>
                                <div class="tab-pane" id="<?= $term->term_id ?>">
                                    <div class="list-post row">
                                        <?php
                                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                        $parent_slug_event = $parent_slug;
                                        if ($parent_slug == null) {
                                            $parent_slug_event = 'su-kien';
                                        }
                                        $args = array(
                                            'paged' => $paged,
                                            'post_type' => 'post',
                                            'posts_per_page' => get_option('posts_per_page'),
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'category_name' => $parent_slug_event,
                                            's' => sanitize_text_field($_GET['search']),
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'category',
                                                    'field' => 'slug',
                                                    'terms' => $term->slug
                                                )
                                            )
                                        );
                                        $query_event = new WP_Query($args);
                                        $number_post_event_2 = $query_event->found_posts;
                                        ?>
                                        <input type="hidden" id="number_su_kien_<?= $term->term_id ?>_hide"
                                               value="<?= $number_post_event_2 ?>">
                                        <script>
                                            $(document).ready(function () {
                                                $('.hide_<?= $term->term_id ?>').hide();
                                                $('.hide_1').show();
                                                $('.tabs-control ul li').on('click', function () {
                                                    var term_id = $(this).find('a').attr('href').replace('#', '');
                                                    var number = <?= $term->term_id ?>;
                                                    if(term_id == number){
                                                        $('.hide_' + term_id).show();
                                                        $('.hide_' + term_id).find('span').text($('#number_su_kien_' + term_id + '_hide').val());
                                                        $('.hide_' + term_id).siblings().hide();
                                                    }
                                                    if(term_id == 1){
                                                        $('.hide_1').show();
                                                        $('.hide_1').find('span').text($('#number_su_kien_hide').val());
                                                        $('.hide_1').siblings().hide();
                                                    }
                                                });
                                            });
                                        </script>
                                        <?php if ($query_event->have_posts()) : ?>
                                            <?php while ($query_event->have_posts()) : $query_event->the_post();
                                                $event_date = get_field('event_date', get_the_ID());
                                                $location = get_field('location', get_the_ID());
                                                ?>
                                                <div class="item col-lg-6">
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
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20" viewBox="0 0 20 20" fill="none">
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
                                                                    <?= the_excerpt() ?>
                                                                </p>
                                                            </div>
                                                            <?php if ($location) : ?>
                                                                <div class="location">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    <span>Địa điểm: <?= $location ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="date">
                                                                <i class="far fa-calendar-alt"></i>
                                                                <span>
                                                                <?= get_the_date('d/m/Y') ?>
                                                            </span>
                                                            </div>
                                                            <div class="reg">
                                                                <a href="<?= the_permalink() ?>" class="btn">
                                                                    Đăng ký ngay
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        <?php else: ?>
                                            <div class="item col-lg-12">
                                                <div class="content-wrapper">
                                                    <div class="text">
                                                        <div class="title">
                                                    <span class="text-danger">
                                                        Không có bài viết nào
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($query_event->max_num_pages > 1) : ?>
                                        <nav class="pagination">
                                            <ul>
                                                <li class="pre">
                                                    <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span> Trước</span>
                                                    </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $query_event->max_num_pages; $i++): ?>
                                                    <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                        <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                            <?= $i ?>
                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                                <li class="next">
                                                    <a href="<?= esc_url(add_query_arg('paged', min($query_event->max_num_pages, $paged + 1))) ?>">
                                                        <span>Sau</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($slug == 'bao-chi-noi-gi-ve-nexta' || $parent_slug == 'bao-chi-noi-gi-ve-nexta') : ?>
        <section class="section-news section-about-nexta">
            <div class="container">
                <div class="wrapper">
                    <div class="col-left">
                        <div class="title">
                            <h2>Khám phá tất cả
                                Báo chí nói gì về Nexta
                            </h2>
                        </div>
                        <div class="tabs-control">
                            <ul>
                                <li class="active">
                                    <a href="#1">
                                        Tất cả
                                    </a>
                                </li>
                                <?php foreach ($terms as $term): ?>
                                    <li>
                                        <a href="#<?= $term->term_id ?>">
                                            <?= $term->name ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="search">
                            <div class="top">
                                <form action="<?= home_url() ?>/category/<?= $slug ?>" method="get" style="display: flex; flex: 1">
                                    <input type="text" placeholder="Tìm kiếm" name="search"
                                           value="<?= sanitize_text_field($_GET['search']) ?>">
                                    <button>
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="bot">
                                <span class="hide_1">Hiển thị
                                    <span id="number_bao_chi">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php foreach ($terms as $term): ?>
                                    <span class="hide_<?= $term->term_id ?>">Hiển thị
                                    <span id="number_bao_chi_<?= $term->term_id ?>">
                                    </span>
                                    kết quả tìm kiếm
                                </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="tabs-content">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args_nex = array(
                                'paged' => $paged,
                                'post_type' => 'post',
                                'posts_per_page' => get_option('posts_per_page'),
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'category_name' => $slug,
                                's' => sanitize_text_field($_GET['search'])
                            );
                            $query_nex = new WP_Query($args_nex);
                            $number_post_nex = $query_nex->found_posts;
                            ?>
                            <input type="hidden" id="number_bao_chi_hide" value="<?= $number_post_nex ?>">
                            <div class="tab-pane active" id="1">
                                <div class="list-post row">
                                    <?php if ($query_nex->have_posts()) : ?>
                                        <?php while ($query_nex->have_posts()) : $query_nex->the_post();
                                            $logo = get_field('logo_news', get_the_ID());
                                            $url_news = get_field('url_news', get_the_ID());
                                            $link = get_the_permalink();
                                             $href = '';
                                            if ($url_news) {
                                                $href = $url_news;
                                            } else {
                                                $href = $link;
                                            }
                                            ?>
                                            <div class="item col-xl-12">
                                                <div class="content-wrapper">
                                                    <figure>
                                                        <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                                    </figure>
                                                    <div class="col-right">
                                                        <div class="text">
                                                            <div class="category">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20"
                                                                     viewBox="0 0 20 20" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M9.36656 2.33248C8.85485 2.40011 8.22299 2.54524 7.32413 2.75267L6.30065 2.98886C5.54147 3.16406 5.01865 3.28551 4.61932 3.42256C4.2338 3.55488 4.01569 3.68532 3.85112 3.8499C3.68654 4.01447 3.5561 4.23258 3.42379 4.6181C3.28673 5.01743 3.16528 5.54025 2.99008 6.29943L2.75389 7.32291C2.54647 8.22177 2.40133 8.85363 2.3337 9.36533C2.26782 9.86384 2.28301 10.2011 2.37095 10.5078C2.45889 10.8144 2.62477 11.1085 2.94485 11.4963C3.2734 11.8944 3.73136 12.3533 4.38365 13.0055L5.90835 14.5302C7.04125 15.6631 7.84741 16.4674 8.54048 16.9962C9.21912 17.514 9.71537 17.7084 10.2199 17.7084C10.7244 17.7084 11.2207 17.514 11.8993 16.9962C12.5924 16.4674 13.3986 15.6631 14.5315 14.5302C15.6644 13.3973 16.4686 12.5912 16.9974 11.8981C17.5152 11.2195 17.7096 10.7232 17.7096 10.2187C17.7096 9.71415 17.5152 9.2179 16.9974 8.53925C16.4686 7.84619 15.6644 7.04003 14.5315 5.90713L13.0068 4.38243C12.3545 3.73014 11.8956 3.27218 11.4975 2.94363C11.1097 2.62355 10.8156 2.45767 10.509 2.36973C10.2024 2.28179 9.86506 2.2666 9.36656 2.33248ZM9.20278 1.09326C9.80055 1.01426 10.3247 1.01649 10.8536 1.16817C11.3825 1.31985 11.8281 1.59576 12.2932 1.97956C12.7427 2.35059 13.2434 2.85125 13.8688 3.47672L15.4486 5.05654C16.5408 6.1487 17.4055 7.0134 17.9912 7.78103C18.5938 8.57086 18.9596 9.33095 18.9596 10.2187C18.9596 11.1064 18.5938 11.8665 17.9912 12.6563C17.4055 13.424 16.5408 14.2887 15.4486 15.3808L15.3821 15.4474C14.2899 16.5396 13.4252 17.4043 12.6576 17.99C11.8677 18.5926 11.1076 18.9584 10.2199 18.9584C9.33217 18.9584 8.57208 18.5926 7.78225 17.99C7.01462 17.4043 6.14991 16.5396 5.05773 15.4474L3.47793 13.8676C2.85247 13.2421 2.35181 12.7415 1.98079 12.2919C1.59698 11.8269 1.32107 11.3812 1.16939 10.8524C1.01771 10.3235 1.01548 9.79933 1.09448 9.20156C1.17084 8.62371 1.33006 7.93381 1.52896 7.07193L1.77951 5.9862C1.94548 5.26694 2.08083 4.68041 2.24148 4.21232C2.40926 3.72346 2.62058 3.31267 2.96723 2.96601C3.31389 2.61936 3.72468 2.40804 4.21354 2.24026C4.68163 2.07961 5.26816 1.94426 5.98742 1.77829L7.07315 1.52774C7.93503 1.32884 8.62493 1.16962 9.20278 1.09326ZM7.91042 6.6627C7.50362 6.25591 6.84407 6.25591 6.43728 6.6627C6.03048 7.0695 6.03048 7.72904 6.43728 8.13584C6.84407 8.54264 7.50362 8.54264 7.91042 8.13584C8.31721 7.72904 8.31721 7.0695 7.91042 6.6627ZM5.55339 5.77882C6.44835 4.88387 7.89935 4.88387 8.7943 5.77882C9.68925 6.67377 9.68925 8.12477 8.7943 9.01972C7.89935 9.91468 6.44835 9.91468 5.55339 9.01972C4.65844 8.12477 4.65844 6.67377 5.55339 5.77882ZM15.8772 9.15856C16.1213 9.40263 16.1213 9.79836 15.8772 10.0424L10.0614 15.8585C9.8173 16.1026 9.42158 16.1026 9.17749 15.8585C8.93341 15.6144 8.9334 15.2187 9.17748 14.9746L14.9933 9.15857C15.2374 8.91449 15.6331 8.91448 15.8772 9.15856Z"
                                                                          fill="#7A7E86"/>
                                                                </svg>
                                                                <span>
                                                            <?= get_the_category()[0]->name ?>
                                                        </span>
                                                            </div>
                                                            <?php if ($logo) : ?>
                                                                <div class="logo">
                                                                    <img src="<?= getimage($logo) ?>" alt="">
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="title">
                                                                <a href="<?= $href ?>">
                                                                    <?= the_title() ?>
                                                                </a>
                                                            </div>
                                                            <div class="desc">
                                                                <p>
                                                                    <?= the_excerpt() ?>
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
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($query_nex->max_num_pages > 1 && isset($_GET['search'])): ?>
                                    <nav class="pagination">
                                        <ul>
                                            <li class="pre">
                                                <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                    <i class="fas fa-chevron-left"></i>
                                                    <span> Trước</span>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $query_nex->max_num_pages; $i++): ?>
                                                <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                    <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="next">
                                                <a href="<?= esc_url(add_query_arg('paged', min($query_nex->max_num_pages, $paged + 1))) ?>">
                                                    <span>Sau</span>
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                <?php endif; ?>
                            </div>
                            <?php foreach ($terms as $index => $term) : ?>
                                <div class="tab-pane" id="<?= $term->term_id ?>">
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $args_nex_2 = array(
                                        'paged' => $paged,
                                        'post_type' => 'post',
                                        'posts_per_page' => get_option('posts_per_page'),
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'category_name' => $term->slug,
                                        's' => sanitize_text_field($_GET['search']),
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'category',
                                                'field' => 'slug',
                                                'terms' => $term->slug
                                            )
                                        )
                                    );
                                    $query_nex_2 = new WP_Query($args_nex_2);
                                    $number_post_nex_2 = $query_nex_2->found_posts;
                                    ?>
                                    <input type="hidden" id="number_bao_chi_<?= $term->term_id ?>_hide"
                                           value="<?= $number_post_nex_2 ?>">
                                    <script>
                                        $(document).ready(function () {
                                            $('.hide_<?= $term->term_id ?>').hide();
                                            $('.hide_1').show();
                                            $('.tabs-control ul li').on('click', function () {
                                                var term_id = $(this).find('a').attr('href').replace('#', '');
                                                var number = <?= $term->term_id ?>;
                                                if(term_id == number){
                                                    $('.hide_' + term_id).show();
                                                    $('.hide_' + term_id).find('span').text($('#number_bao_chi_' + term_id + '_hide').val());
                                                    $('.hide_' + term_id).siblings().hide();
                                                }
                                                if(term_id == 1){
                                                    $('.hide_1').show();
                                                    $('.hide_1').find('span').text($('#number_bao_chi_hide').val());
                                                    $('.hide_1').siblings().hide();
                                                }
                                            });
                                        });
                                    </script>
                                    <div class="list-post row">
                                        <?php if ($query_nex_2->have_posts()) : ?>
                                            <?php while ($query_nex_2->have_posts()) : $query_nex_2->the_post();
                                                $logo = get_field('logo_news', get_the_ID());
                                                ?>
                                                <div class="item col-xl-12">
                                                    <div class="content-wrapper">
                                                        <figure>
                                                            <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                                        </figure>
                                                        <div class="col-right">
                                                            <div class="text">
                                                                <div class="category">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                         height="20"
                                                                         viewBox="0 0 20 20" fill="none">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                              d="M9.36656 2.33248C8.85485 2.40011 8.22299 2.54524 7.32413 2.75267L6.30065 2.98886C5.54147 3.16406 5.01865 3.28551 4.61932 3.42256C4.2338 3.55488 4.01569 3.68532 3.85112 3.8499C3.68654 4.01447 3.5561 4.23258 3.42379 4.6181C3.28673 5.01743 3.16528 5.54025 2.99008 6.29943L2.75389 7.32291C2.54647 8.22177 2.40133 8.85363 2.3337 9.36533C2.26782 9.86384 2.28301 10.2011 2.37095 10.5078C2.45889 10.8144 2.62477 11.1085 2.94485 11.4963C3.2734 11.8944 3.73136 12.3533 4.38365 13.0055L5.90835 14.5302C7.04125 15.6631 7.84741 16.4674 8.54048 16.9962C9.21912 17.514 9.71537 17.7084 10.2199 17.7084C10.7244 17.7084 11.2207 17.514 11.8993 16.9962C12.5924 16.4674 13.3986 15.6631 14.5315 14.5302C15.6644 13.3973 16.4686 12.5912 16.9974 11.8981C17.5152 11.2195 17.7096 10.7232 17.7096 10.2187C17.7096 9.71415 17.5152 9.2179 16.9974 8.53925C16.4686 7.84619 15.6644 7.04003 14.5315 5.90713L13.0068 4.38243C12.3545 3.73014 11.8956 3.27218 11.4975 2.94363C11.1097 2.62355 10.8156 2.45767 10.509 2.36973C10.2024 2.28179 9.86506 2.2666 9.36656 2.33248ZM9.20278 1.09326C9.80055 1.01426 10.3247 1.01649 10.8536 1.16817C11.3825 1.31985 11.8281 1.59576 12.2932 1.97956C12.7427 2.35059 13.2434 2.85125 13.8688 3.47672L15.4486 5.05654C16.5408 6.1487 17.4055 7.0134 17.9912 7.78103C18.5938 8.57086 18.9596 9.33095 18.9596 10.2187C18.9596 11.1064 18.5938 11.8665 17.9912 12.6563C17.4055 13.424 16.5408 14.2887 15.4486 15.3808L15.3821 15.4474C14.2899 16.5396 13.4252 17.4043 12.6576 17.99C11.8677 18.5926 11.1076 18.9584 10.2199 18.9584C9.33217 18.9584 8.57208 18.5926 7.78225 17.99C7.01462 17.4043 6.14991 16.5396 5.05773 15.4474L3.47793 13.8676C2.85247 13.2421 2.35181 12.7415 1.98079 12.2919C1.59698 11.8269 1.32107 11.3812 1.16939 10.8524C1.01771 10.3235 1.01548 9.79933 1.09448 9.20156C1.17084 8.62371 1.33006 7.93381 1.52896 7.07193L1.77951 5.9862C1.94548 5.26694 2.08083 4.68041 2.24148 4.21232C2.40926 3.72346 2.62058 3.31267 2.96723 2.96601C3.31389 2.61936 3.72468 2.40804 4.21354 2.24026C4.68163 2.07961 5.26816 1.94426 5.98742 1.77829L7.07315 1.52774C7.93503 1.32884 8.62493 1.16962 9.20278 1.09326ZM7.91042 6.6627C7.50362 6.25591 6.84407 6.25591 6.43728 6.6627C6.03048 7.0695 6.03048 7.72904 6.43728 8.13584C6.84407 8.54264 7.50362 8.54264 7.91042 8.13584C8.31721 7.72904 8.31721 7.0695 7.91042 6.6627ZM5.55339 5.77882C6.44835 4.88387 7.89935 4.88387 8.7943 5.77882C9.68925 6.67377 9.68925 8.12477 8.7943 9.01972C7.89935 9.91468 6.44835 9.91468 5.55339 9.01972C4.65844 8.12477 4.65844 6.67377 5.55339 5.77882ZM15.8772 9.15856C16.1213 9.40263 16.1213 9.79836 15.8772 10.0424L10.0614 15.8585C9.8173 16.1026 9.42158 16.1026 9.17749 15.8585C8.93341 15.6144 8.9334 15.2187 9.17748 14.9746L14.9933 9.15857C15.2374 8.91449 15.6331 8.91448 15.8772 9.15856Z"
                                                                              fill="#7A7E86"/>
                                                                    </svg>
                                                                    <span>
                                                            <?= get_the_category()[0]->name ?>
                                                        </span>
                                                                </div>
                                                                <?php if ($logo) : ?>
                                                                    <div class="logo">
                                                                        <img src="<?= getimage($logo) ?>" alt="">
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="title">
                                                                    <a href="<?= the_permalink() ?>">
                                                                        <?= the_title() ?>
                                                                    </a>
                                                                </div>
                                                                <div class="desc">
                                                                    <p>
                                                                        <?= the_excerpt() ?>
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
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($query_nex_2->max_num_pages > 1 && isset($_GET['search'])): ?>
                                        <nav class="pagination">
                                            <ul>
                                                <li class="pre">
                                                    <a href="<?= esc_url(add_query_arg('paged', max(1, $paged - 1))) ?>">
                                                        <i class="fas fa-chevron-left"></i>
                                                        <span> Trước</span>
                                                    </a>
                                                </li>
                                                <?php for ($i = 1; $i <= $query_nex_2->max_num_pages; $i++): ?>
                                                    <li class="<?= $i == $paged ? 'active' : '' ?>">
                                                        <a href="<?= esc_url(add_query_arg('paged', $i)) ?>">
                                                            <?= $i ?>
                                                        </a>
                                                    </li>
                                                <?php endfor; ?>
                                                <li class="next">
                                                    <a href="<?= esc_url(add_query_arg('paged', min($query_nex_2->max_num_pages, $paged + 1))) ?>">
                                                        <span>Sau</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        $('#number_tin_tuc').text($('#number_tin_tuc_hide').val());
        $('#number_su_kien').text($('#number_su_kien_hide').val());
        $('#number_bao_chi').text($('#number_bao_chi_hide').val());
        // fix height
        var texts = $(' .container .wrapper .col-right .tabs-content .tab-pane .list-post .item .content-wrapper .text');
        var maxHeight = 0;

        texts.each(function() {
            var height = $(this).outerHeight();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        var maxHeightRem = maxHeight / parseFloat($('html').css('font-size'));
        console.log(maxHeightRem);
        texts.css('min-height', maxHeightRem + 'rem');
    });
</script>
