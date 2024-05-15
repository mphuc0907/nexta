<?php
/**
 * Nexta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nexta
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nexta_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Nexta, use a find and replace
		* to change 'nexta' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nexta', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'nexta' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nexta_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'nexta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nexta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nexta_content_width', 640 );
}
add_action( 'after_setup_theme', 'nexta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nexta_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nexta' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nexta' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nexta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nexta_scripts() {
	wp_enqueue_style( 'nexta-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nexta-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nexta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nexta_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require get_template_directory() . '/function-quyenanh.php';
require get_template_directory() . '/function-admin.php';
function checkImage($id)
{
    $avatar_hot = get_the_post_thumbnail_url($id, 'full');
    if ($avatar_hot == '') {
        $avatar_hot = get_field('image_no_image', 'option');
    }
    return $avatar_hot;
}
// Map
function showMap($id) {
    $main_provinces = get_field('main_provinces', 'option');
    $replicated_provinces = get_field('replicated_provinces', 'option');
    if(!empty($main_provinces)) {
        foreach ($main_provinces as $item) {
            if (in_array($id, $item)) {
                return '#fff';
            }
        }
    }
//    if(!empty($replicated_provinces)) {
//        foreach ($replicated_provinces as $item) {
//            if(in_array($id, $item)) {
//                return '#1A8995';
//            }
//        }
//    }
    return '#2B54A5';
}
function getProvinces() {
    $main_provinces = get_field('main_provinces', 'option');
    $replicated_provinces = get_field('replicated_provinces', 'option');
    $provinces = [];
    if(!empty($main_provinces) && !empty($replicated_provinces)) {
        $provinces = array_merge($main_provinces, $replicated_provinces);
    } else if(!empty($main_provinces)) {
        $provinces = $main_provinces;
    } else if(!empty($replicated_provinces)) {
        $provinces = $replicated_provinces;
    }
    return $provinces;
}
function showListProvinces($id) {
    switch ($id) {
        case 'VN-01' :
            echo 'An Giang';
            break;
        case 'VN-02' :
            echo 'Bà Rịa-Vũng Tàu';
            break;
        case 'VN-03' :
            echo 'Bạc Liêu';
            break;
        case 'VN-04' :
            echo 'Bắc Giang';
            break;
        case 'VN-05' :
            echo 'Bắc Kạn';
            break;
        case 'VN-06' :
            echo 'Bắc Ninh';
            break;
        case 'VN-07' :
            echo 'Bến Tre';
            break;
        case 'VN-08' :
            echo 'Bình Dương';
            break;
        case 'VN-09' :
            echo 'Bình Định';
            break;
        case 'VN-10' :
            echo 'Bình Phước';
            break;
        case 'VN-11' :
            echo 'Bình Thuận';
            break;
        case 'VN-12' :
            echo 'Cà Mau';
            break;
        case 'VN-13' :
            echo 'Cao Bằng';
            break;
        case 'VN-14' :
            echo 'Cần Thơ';
            break;
        case 'VN-15' :
            echo 'Đà Nẵng';
            break;
        case 'VN-16' :
            echo 'Đắk Lắk';
            break;
        case 'VN-17' :
            echo 'Đắk Nông';
            break;
        case 'VN-18' :
            echo 'Điện Biên';
            break;
        case 'VN-19' :
            echo 'Đồng Nai';
            break;
        case 'VN-20' :
            echo 'Đồng Tháp';
            break;
        case 'VN-21' :
            echo 'Gia Lai';
            break;
        case 'VN-22' :
            echo 'Hà Giang';
            break;
        case 'VN-23' :
            echo 'Hà Nam';
            break;
        case 'VN-24' :
            echo 'Hà Nội';
            break;
        case 'VN-25' :
            echo 'Hà Tĩnh';
            break;
        case 'VN-26' :
            echo 'Hải Dương';
            break;
        case 'VN-27' :
            echo 'Hải Phòng';
            break;
        case 'VN-28' :
            echo 'Hậu Giang';
            break;
        case 'VN-29' :
            echo 'Hòa Bình';
            break;
        case 'VN-30' :
            echo 'Hưng Yên';
            break;
        case 'VN-31' :
            echo 'Khánh Hòa';
            break;
        case 'VN-32' :
            echo 'Kiên Giang';
            break;
        case 'VN-33' :
            echo 'Kon Tum';
            break;
        case 'VN-34' :
            echo 'Lai Châu';
            break;
        case 'VN-35' :
            echo 'Lạng Sơn';
            break;
        case 'VN-36' :
            echo 'Lào Cai';
            break;
        case 'VN-37' :
            echo 'Lâm Đồng';
            break;
        case 'VN-38' :
            echo 'Long An';
            break;
        case 'VN-39' :
            echo 'Nam Định';
            break;
        case 'VN-40' :
            echo 'Nghệ An';
            break;
        case 'VN-41' :
            echo 'Ninh Bình';
            break;
        case 'VN-42' :
            echo 'Ninh Thuận';
            break;
        case 'VN-43' :
            echo 'Phú Thọ';
            break;
        case 'VN-44' :
            echo 'Phú Yên';
            break;
        case 'VN-45' :
            echo 'Quảng Bình';
            break;
        case 'VN-46' :
            echo 'Quảng Nam';
            break;
        case 'VN-47' :
            echo 'Quảng Ngãi';
            break;
        case 'VN-48' :
            echo 'Quảng Ninh';
            break;
        case 'VN-49' :
            echo 'Quảng Trị';
            break;
        case 'VN-50' :
            echo 'Sóc Trăng';
            break;
        case 'VN-51' :
            echo 'Sơn La';
            break;
        case 'VN-52' :
            echo 'Tây Ninh';
            break;
        case 'VN-53' :
            echo 'Thái Bình';
            break;
        case 'VN-54' :
            echo 'Thái Nguyên';
            break;
        case 'VN-55' :
            echo 'Thanh Hóa';
            break;
        case 'VN-56' :
            echo 'Thừa Thiên Huế';
            break;
        case 'VN-57' :
            echo 'Tiền Giang';
            break;
        case 'VN-58' :
            echo 'TP Hồ Chí Minh';
            break;
        case 'VN-59' :
            echo 'Trà Vinh';
            break;
        case 'VN-60' :
            echo 'Tuyên Quang';
            break;
        case 'VN-61' :
            echo 'Vĩnh Long';
            break;
        case 'VN-62' :
            echo 'Vĩnh Phúc';
            break;
        case 'VN-63' :
            echo 'Yên Bái';
            break;
        default :
            echo '';
    }
}