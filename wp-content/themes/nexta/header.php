
<?php
$arr = wp_get_nav_menu_items('Menu header');
$menu1 = [];
foreach ($arr as $key => $ar) {
    if ($ar->menu_item_parent == 0) {
        $menu1[$key]['ID'] = $ar->ID;
        $menu1[$key]['title'] = $ar->title;
        $menu1[$key]['url'] = $ar->url;
        $menu1[$key]['menu_item_parent'] = $ar->menu_item_parent;
        $menu1[$key]['classes'] = $ar->classes;
        $menu1[$key]['description'] = $ar->description;
        $class = $ar->classes;
        $menu1[$key]['classes'] = $class[0];
        $menusub = [];

        $i_sub = 0;
        foreach ($arr as $key_sub => $ar_sub) {
            if ($ar->ID == $ar_sub->menu_item_parent) {
                $menusub[$i_sub]['ID'] = $ar_sub->ID;
                $menusub[$i_sub]['title'] = $ar_sub->title;
                $menusub[$i_sub]['url'] = $ar_sub->url;
                $menusub[$i_sub]['menu_item_parent'] = $ar_sub->menu_item_parent;
                $menusub[$i_sub]['description'] = $ar_sub->description;

                $menusub_2 = [];
                $i_sub2 = 0;
                foreach ($arr as $key_sub2 => $ar_sub2) {
                    if ($ar_sub->ID == $ar_sub2->menu_item_parent) {
                        $menusub_2[$i_sub2]['ID'] = $ar_sub2->ID;
                        $menusub_2[$i_sub2]['title'] = $ar_sub2->title;
                        $menusub_2[$i_sub2]['url'] = $ar_sub2->url;
                        $menusub_2[$i_sub2]['menu_item_parent'] = $ar_sub2->menu_item_parent;
                        $menusub_2[$i_sub2]['description'] = $ar_sub2->description;

                        $menusub_3 = [];
                        $i_sub3 = 0;
                        foreach ($arr as $key_sub3 => $ar_sub3) {
                            if ($ar_sub2->ID == $ar_sub3->menu_item_parent) {
                                $menusub_3[$i_sub3]['ID'] = $ar_sub3->ID;
                                $menusub_3[$i_sub3]['title'] = $ar_sub3->title;
                                $menusub_3[$i_sub3]['url'] = $ar_sub3->url;
                                $menusub_3[$i_sub3]['menu_item_parent'] = $ar_sub3->menu_item_parent;
                                $menusub_3[$i_sub3]['description'] = $ar_sub3->description;

                                $menusub_4 = [];
                                $i_sub4 = 0;
                                foreach ($arr as $key_sub4 => $ar_sub4) {
                                    if ($ar_sub3->ID == $ar_sub4->menu_item_parent) {
                                        $menusub_4[$i_sub4]['ID'] = $ar_sub4->ID;
                                        $menusub_4[$i_sub4]['title'] = $ar_sub4->title;
                                        $menusub_4[$i_sub4]['url'] = $ar_sub4->url;
                                        $menusub_4[$i_sub4]['menu_item_parent'] = $ar_sub4->menu_item_parent;
                                        $menusub_4[$i_sub4]['description'] = $ar_sub4->description;
                                        $i_sub4++;
                                    }
                                }
                                $menusub_3[$i_sub3]['menusub_4'] = $menusub_4;
                                $i_sub3++;
                            }
                        }
                        $menusub_2[$i_sub2]['menusub_3'] = $menusub_3;
                        $i_sub2++;
                    }
                }
                $menusub[$i_sub]['menusub_2'] = $menusub_2;
                $i_sub++;
            }

        }
        $menu1[$key]['menu_sub'] = $menusub;
    }
}
$dem = 0;
$menu = [];
foreach ($menu1 as $mn) {
    $menu[$dem] = $mn;
    $dem++;
}
//    print_r($menu);die();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ke = strpos($actual_link, '?');
if (!empty($ke)) {
    $actual_link = substr($actual_link, 0, $ke);
}
$actual_link = rtrim($actual_link, '/');
//    $menu_items = wp_get_nav_menu_items('Menu header');
//    if ($menu_items) {
//        foreach ((array) $menu_items as $key => $menu_item) :

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <?php wp_head() ?>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta name="google-site-verification" content="UFpOnplJDcwARXywjtADVRrLg_gxXVnUFpOgHJnQwM8" />
    <link rel="shortcut icon" href="#" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/dist/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/dist/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?= get_template_directory_uri() ?>/dist/lib/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/assets/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/assets/aos.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/scss/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/scss/phuc.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/assets/quyenanh.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/assets/quyenanh-edit.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/scss/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" /><!--    <link rel="stylesheet" href="--><?//= get_template_directory_uri() ?><!--/dist/lib/jquery.fancybox.min.css">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/dist/scss/phuc-edit.css">
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/dist/js/noframework.waypoints.min.js"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N64V82CL');</script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MGGKS62W');</script>
    <!-- End Google Tag Manager -->



    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '955056862656488');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=955056862656488&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->


    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '778047384277070');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=778047384277070&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SD0CJWNJFD"></script>

    <script>

        window.dataLayer = window.dataLayer || [];

        function gtag(){dataLayer.push(arguments);}

        gtag('js', new Date());



        gtag('config', 'G-SD0CJWNJFD');

    </script>
    <!-- Meta Pixel Code -->
</head>
<?php
$logo = get_field('logo_header', 'option');
$logo_mobile = get_field('logo_header_mob', 'option');
?>
<style>
    .divgif {
        position: fixed;
        top: 0;
        left: 0;
        display: table;
        height: 100%;
        width: 100%;
        background: #fff;
        z-index: 99999;
    }
    .divgif .loader_34 {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }
    .divgif .loader_34 .ytp-spinner {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 64px;
        margin-left: -32px;
        z-index: 18;
        pointer-events: none;
    }
    .divgif .loader_34 .ytp-spinner .ytp-spinner-container {
        pointer-events: none;
        position: absolute;
        width: 100%;
        padding-bottom: 100%;
        top: 50%;
        left: 50%;
        margin-top: -50%;
        margin-left: -50%;
        -webkit-animation: ytp-spinner-linspin 1568.23529647ms linear infinite;
        -moz-animation: ytp-spinner-linspin 1568.23529647ms linear infinite;
        -o-animation: ytp-spinner-linspin 1568.23529647ms linear infinite;
        animation: ytp-spinner-linspin 1568.23529647ms linear infinite;
    }
    .divgif .loader_34 .ytp-spinner .ytp-spinner-container .ytp-spinner-rotator {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-animation: ytp-spinner-easespin 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -moz-animation: ytp-spinner-easespin 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -o-animation: ytp-spinner-easespin 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        animation: ytp-spinner-easespin 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    }
    .divgif .loader_34 .ytp-spinner .ytp-spinner-container .ytp-spinner-rotator .ytp-spinner-left {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        overflow: hidden;
        right: 50%;
    }
    .divgif .loader_34 .ytp-spinner-left .ytp-spinner-circle {
        left: 0;
        right: -100%;
        border-right-color: #ededed;
        -webkit-animation: ytp-spinner-left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -moz-animation: ytp-spinner-left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -o-animation: ytp-spinner-left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        animation: ytp-spinner-left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    }
    .divgif .loader_34 .ytp-spinner-circle {
        box-sizing: border-box;
        position: absolute;
        width: 200%;
        height: 100%;
        border-style: solid;
        border-color: #089CFF #089CFF #ededed;
        border-radius: 50%;
        border-width: 6px;
    }
    .divgif .loader_34 .ytp-spinner .ytp-spinner-container .ytp-spinner-rotator .ytp-spinner-right {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        left: 50%;
    }
    .divgif .loader_34 .ytp-spinner-circle {
        box-sizing: border-box;
        position: absolute;
        width: 200%;
        height: 100%;
        border-style: solid;
        border-color: #089CFF #089CFF #ededed;
        border-radius: 50%;
        border-width: 6px;
    }
    .divgif .loader_34 .ytp-spinner-right .ytp-spinner-circle {
        left: -100%;
        right: 0;
        border-left-color: #ededed;
        -webkit-animation: ytp-right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -moz-animation: ytp-right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        -o-animation: ytp-right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
        animation: ytp-right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    }
    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -50%);
        left: 50%;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #ed4a4a;
        border-color: #f35050 transparent #d42c2c transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @-webkit-keyframes ytp-spinner-linspin {
        to {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg); } }

    @keyframes ytp-spinner-linspin {
        to {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg); } }

    @-webkit-keyframes ytp-spinner-easespin {
        12.5% {
            -webkit-transform: rotate(135deg);
            -moz-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            -o-transform: rotate(135deg);
            transform: rotate(135deg); }
        25% {
            -webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg); }
        37.5% {
            -webkit-transform: rotate(405deg);
            -moz-transform: rotate(405deg);
            -ms-transform: rotate(405deg);
            -o-transform: rotate(405deg);
            transform: rotate(405deg); }
        50% {
            -webkit-transform: rotate(540deg);
            -moz-transform: rotate(540deg);
            -ms-transform: rotate(540deg);
            -o-transform: rotate(540deg);
            transform: rotate(540deg); }
        62.5% {
            -webkit-transform: rotate(675deg);
            -moz-transform: rotate(675deg);
            -ms-transform: rotate(675deg);
            -o-transform: rotate(675deg);
            transform: rotate(675deg); }
        75% {
            -webkit-transform: rotate(810deg);
            -moz-transform: rotate(810deg);
            -ms-transform: rotate(810deg);
            -o-transform: rotate(810deg);
            transform: rotate(810deg); }
        87.5% {
            -webkit-transform: rotate(945deg);
            -moz-transform: rotate(945deg);
            -ms-transform: rotate(945deg);
            -o-transform: rotate(945deg);
            transform: rotate(945deg); }
        to {
            -webkit-transform: rotate(1080deg);
            -moz-transform: rotate(1080deg);
            -ms-transform: rotate(1080deg);
            -o-transform: rotate(1080deg);
            transform: rotate(1080deg); } }

    @keyframes ytp-spinner-easespin {
        12.5% {
            -webkit-transform: rotate(135deg);
            -moz-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            -o-transform: rotate(135deg);
            transform: rotate(135deg); }
        25% {
            -webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg); }
        37.5% {
            -webkit-transform: rotate(405deg);
            -moz-transform: rotate(405deg);
            -ms-transform: rotate(405deg);
            -o-transform: rotate(405deg);
            transform: rotate(405deg); }
        50% {
            -webkit-transform: rotate(540deg);
            -moz-transform: rotate(540deg);
            -ms-transform: rotate(540deg);
            -o-transform: rotate(540deg);
            transform: rotate(540deg); }
        62.5% {
            -webkit-transform: rotate(675deg);
            -moz-transform: rotate(675deg);
            -ms-transform: rotate(675deg);
            -o-transform: rotate(675deg);
            transform: rotate(675deg); }
        75% {
            -webkit-transform: rotate(810deg);
            -moz-transform: rotate(810deg);
            -ms-transform: rotate(810deg);
            -o-transform: rotate(810deg);
            transform: rotate(810deg); }
        87.5% {
            -webkit-transform: rotate(945deg);
            -moz-transform: rotate(945deg);
            -ms-transform: rotate(945deg);
            -o-transform: rotate(945deg);
            transform: rotate(945deg); }
        to {
            -webkit-transform: rotate(1080deg);
            -moz-transform: rotate(1080deg);
            -ms-transform: rotate(1080deg);
            -o-transform: rotate(1080deg);
            transform: rotate(1080deg); } }

    @-webkit-keyframes ytp-spinner-left-spin {
        0% {
            -webkit-transform: rotate(130deg);
            -moz-transform: rotate(130deg);
            -ms-transform: rotate(130deg);
            -o-transform: rotate(130deg);
            transform: rotate(130deg); }
        50% {
            -webkit-transform: rotate(-5deg);
            -moz-transform: rotate(-5deg);
            -ms-transform: rotate(-5deg);
            -o-transform: rotate(-5deg);
            transform: rotate(-5deg); }
        to {
            -webkit-transform: rotate(130deg);
            -moz-transform: rotate(130deg);
            -ms-transform: rotate(130deg);
            -o-transform: rotate(130deg);
            transform: rotate(130deg); } }

    @keyframes ytp-spinner-left-spin {
        0% {
            -webkit-transform: rotate(130deg);
            -moz-transform: rotate(130deg);
            -ms-transform: rotate(130deg);
            -o-transform: rotate(130deg);
            transform: rotate(130deg); }
        50% {
            -webkit-transform: rotate(-5deg);
            -moz-transform: rotate(-5deg);
            -ms-transform: rotate(-5deg);
            -o-transform: rotate(-5deg);
            transform: rotate(-5deg); }
        to {
            -webkit-transform: rotate(130deg);
            -moz-transform: rotate(130deg);
            -ms-transform: rotate(130deg);
            -o-transform: rotate(130deg);
            transform: rotate(130deg); } }

    @-webkit-keyframes ytp-right-spin {
        0% {
            -webkit-transform: rotate(-130deg);
            -moz-transform: rotate(-130deg);
            -ms-transform: rotate(-130deg);
            -o-transform: rotate(-130deg);
            transform: rotate(-130deg); }
        50% {
            -webkit-transform: rotate(5deg);
            -moz-transform: rotate(5deg);
            -ms-transform: rotate(5deg);
            -o-transform: rotate(5deg);
            transform: rotate(5deg); }
        to {
            -webkit-transform: rotate(-130deg);
            -moz-transform: rotate(-130deg);
            -ms-transform: rotate(-130deg);
            -o-transform: rotate(-130deg);
            transform: rotate(-130deg); } }

    @keyframes ytp-right-spin {
        0% {
            -webkit-transform: rotate(-130deg);
            -moz-transform: rotate(-130deg);
            -ms-transform: rotate(-130deg);
            -o-transform: rotate(-130deg);
            transform: rotate(-130deg); }
        50% {
            -webkit-transform: rotate(5deg);
            -moz-transform: rotate(5deg);
            -ms-transform: rotate(5deg);
            -o-transform: rotate(5deg);
            transform: rotate(5deg); }
        to {
            -webkit-transform: rotate(-130deg);
            -moz-transform: rotate(-130deg);
            -ms-transform: rotate(-130deg);
            -o-transform: rotate(-130deg);
</style>
<div class="divgif" style="display: none">
    <div class="loader_34">
        <div class="ytp-spinner">
            <div class="ytp-spinner-container">
                <div class="ytp-spinner-rotator">
                    <div class="ytp-spinner-left">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                    <div class="ytp-spinner-right">
                        <div class="ytp-spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="preloader" style="display: none;">

</div>
<input type="hidden" id="urlAjax" value="<?= admin_url() ?>admin-ajax.php">
<header class="header">
    <div class="header-wrapper">
        <div class="header-desktop">
            <div class="container-fulid">
                <div class="header-inner">
                    <div class="logo"><a href="<?= home_url() ?>">
                            <figure>
                                <img src="<?= getimage($logo) ?>" alt="logo">
                            </figure>
                        </a></div>
                    <div class="menu-right">
                        <div class="mega-menu">
                            <ul>
                                <?php menu_header() ?>
                                <li class="menu__cart">
                                    <a href="<?= home_url() ?>/gio-hang/">Giỏ hàng</p><span class="number">0</span></a>
                                    <img src="<?= get_template_directory_uri() ?>/dist/images/cart.svg" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mobile">
            <div class="mobile-bar">
                <div class="mobile-logo">
                    <a href="<?= home_url() ?>">
                        <figure>
                            <img src="<?= getimage($logo_mobile) ?>" alt="logo">
                        </figure>
                    </a>
                </div>
                <div class="bar-right">
                    <div class="menu__cart">
                        <a href="https://nexta.vn/gio-hang/">Giỏ hàng</p><span class="number">0</span></a>
                        <img src="<?= get_template_directory_uri() ?>/dist/images/cart.svg" alt="">
                    </div>
                    <button class="open-mobi"><i class="far fa-bars"></i></button>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-inner">
                    <div class="menu-top">
                        <div class="top-bar">
                            <div class="mobile-logo">
                                <a href="<?= home_url() ?>">
                                    <figure>
                                        <img src="<?= getimage($logo_mobile) ?>" alt="logo">
                                    </figure>
                                </a>
                            </div>
                            <button class="close-mobi">
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="menu-middle">
                        <ul>
                            <?php foreach ($menu as $key => $mn):?>
                                <?php
                                $menu[$key]['active'] = 0;
                                $active = '';

                                $url_admin = $mn['url'];

                                $arr_admin = explode('/', $url_admin);
                                $check_t = '123';
                                if ($arr_admin[3] == 'category_service') {
                                    $check_t = $arr_admin[3];
                                }

                                $ke = strpos($url_admin, '?');
                                if (!empty($ke)) {
                                    $url_admin = substr($url_admin, 0, $ke);
                                }
                                $url_admin = rtrim($url_admin, '/');

                                if ($actual_link == $url_admin) {
                                    $active = 'active';
                                    $menu[$key]['active'] = 1;
                                }

                                $count_mn = count($mn['menu_sub']);
                                ?>
                                <?php if (!empty($mn['menu_sub'])): ?>
                                    <li class="<?= $active ?>">
                                        <a href="<?= $mn['url'] ?>"><?= $mn['title'] ?><i class="fas fa-caret-down"></i></a>
                                        <ul>
                                            <?php foreach ($mn['menu_sub'] as $key_1 => $mn_sub): ?>
                                                <?php if (!empty($mn_sub['menusub_2'])): ?>
                                                    <li>
                                                        <a href="<?= $mn_sub['url'] ?>"><?= $mn_sub['title'] ?><i class="fas fa-caret-down"></i></a>
                                                        <ul>
                                                            <?php foreach ($mn_sub['menusub_2'] as $key_2 => $mn_sub_2): ?>
                                                                <li><a href="<?= $mn_sub_2['url'] ?>"><?= $mn_sub_2['title'] ?></a></li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <a href="<?= $mn_sub['url'] ?>"><?= $mn_sub['title'] ?></a>
                                                    </li>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        </ul>
                                    </li>
                                <?php else:?>
                                    <li class="<?= $active ?>">
                                        <a href="<?= $mn['url'] ?>"><?= $mn['title'] ?></a>
                                    </li>
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<body>



<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGGKS62W"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N64V82CL"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->