<?php

$options = get_option('york_twentythirteen_options');

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Glendon Bootstrap.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 *
 * @return void
 */
function glendon_bootstrap_setup() {
    $templatepath = get_template_directory();
    /*
     * Makes Theme available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Twenty Thirteen, use a find and
     * replace to change 'twentythirteen' to the name of your theme in all
     * template files.
     */
    load_theme_textdomain('glendon', $templatepath . '/languages');

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style('css/editor-style.css');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    /*
     * This theme supports all available post formats.
     * See http://codex.wordpress.org/Post_Formats
     *
     * Structured post formats are formats where Twenty Thirteen handles the
     * output instead of the default core HTML output.
     */
    //add_theme_support( 'structured-post-formats', array(
    //	'link', 'video'
    //) );
    //add_theme_support( 'post-formats', array(
    //	'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status'
    //) );
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('homepage', 'Homepage Navigation');
    register_nav_menu('homepage-fr', 'Homepage Navigation FR');
    register_nav_menu('getting-started', 'Getting Started');
    register_nav_menu('getting-started-fr', 'Getting Started FR');
    register_nav_menu('exploring', 'Exploring');
    register_nav_menu('exploring-fr', 'Exploring FR');
    register_nav_menu('pulling-it-together', 'Pulling It Together');
    register_nav_menu('pulling-it-together-fr', 'Pulling It Together FR');
    register_nav_menu('faculty', 'Faculty');
    register_nav_menu('faculty-fr', 'Faculty FR');
    register_nav_menu('footer-links', 'Footer Links');
    register_nav_menu('homepage-bottom-navbar-red', 'Homepage Bottom Nav(red) - EN');
    register_nav_menu('homepage-bottom-navbar-grey', 'Homepage Bottom Nav(grey) - EN');
    register_nav_menu('homepage-bottom-navbar-red-fr', 'Homepage Bottom Nav(red) - FR');
    register_nav_menu('homepage-bottom-navbar-grey-fr', 'Homepage Bottom Nav(grey) - FR');
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(604, 270, true);

    // Register custom image size for image post formats.
    add_image_size('glendon-bootstrap-image-post', 724, 1288);
}

add_action('after_setup_theme', 'glendon_bootstrap_setup');


/*
 * Enqueue scripts and style
 */
function glendon_scripts_styles() {
    global $wp_styles;
    global $theme_path;
    /*
     * Adds JavaScript to pages with the comment form to support sites with
     * threaded comments (when in use).
     */
    
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array('jquery'), '20130423', false);
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20130423', false);
    wp_enqueue_script('glendon-script', get_template_directory_uri() . '/js/glendon.js', array('jquery'), '20130423', false);
    wp_enqueue_script('bootstrap-tabcollapse', get_template_directory_uri() . '/js/bootstrap-tabcollapse.js', array('jquery'), '20130423', false);
    wp_enqueue_script('smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.js', array('jquery'), '20130423', false);
    wp_enqueue_script('bootstrap-smartmenus', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js', array('jquery'), '20130423', false);

    

    wp_register_style('google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,900,200italic,400italic,600italic,900italic|Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic', ('google-fonts'), false, 'all');
    wp_enqueue_style('google-fonts');

    wp_register_style('google-fonts-lato', '//fonts.googleapis.com/css?family=Lato:400,900', ('google-fonts'), false, 'all');
    wp_enqueue_style('google-fonts-lato');

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', ('bootstrap'), true, 'all');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('jquery-ui-style', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.css', ('jquery-ui'), true, 'all');
    wp_enqueue_style('jquery-ui-style');
    
    wp_register_style('smartmenus-style', get_template_directory_uri() . '/css/jquery.smartmenus.bootstrap.css', ('smartmenus'), true, 'all');
    wp_enqueue_style('smartmenus-style');
    
    wp_register_style('styles', get_template_directory_uri() . '/style.css', ('style'), true, 'all');
    wp_enqueue_style('styles');
    
//    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', ('font-awesome'), true, 'all');
//    wp_enqueue_style('font-awesome');
    wp_register_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', ('font-awesome'), true, 'all');
    wp_enqueue_style('font-awesome');

}


add_action('wp_enqueue_scripts', 'glendon_scripts_styles', 0);

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function glendon_bootstrap_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->remove_section('colors');

    //$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    //$wp_customize->add_setting( 'horizontal_nav' , array('default' => false, 'transport' => 'refresh'));
// Add Post Settings for Date display, etc
    $wp_customize->add_section('yu_post_settings', array('title' => __('Theme Options', 'glendon'), 'capability' => 'edit_theme_options', 'priority' => 400,));

    $wp_customize->add_setting(
            'york_twentythirteen_options[layout_setting]', array(
        'default' => 'postdate_option',
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_postdate_option', array(
        'settings' => 'york_twentythirteen_options[layout_setting]',
        'label' => __('Hide Post Dates?'),
        'section' => 'yu_post_settings',
        'type' => 'checkbox',
    ));

// SOCIAL MEDIA
    $wp_customize->add_section('yu_social_media', array('title' => __('Social Media Options', 'york_twentythirteen'), 'capability' => 'edit_theme_options', 'priority' => 300,));

// FACEBOOK URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[facebook_url]', array(
        'default' => __('Facebook URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_facebook_option', array(
        'settings' => 'york_twentythirteen_options[facebook_url]',
        'label' => __('Facebook URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));

//TWITTER URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[twitter_url]', array(
        'default' => __('Twitter URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_twitter_option', array(
        'settings' => 'york_twentythirteen_options[twitter_url]',
        'label' => __('Twitter URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));

// YOUTUBE URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[youtube_url]', array(
        'default' => __('YouTube URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );


    $wp_customize->add_control('display_youtube_option', array(
        'settings' => 'york_twentythirteen_options[youtube_url]',
        'label' => __('YouTube URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));

// FLICKR URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[flickr_url]', array(
        'default' => __('Flickr URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_flickr_option', array(
        'settings' => 'york_twentythirteen_options[flickr_url]',
        'label' => __('Flickr URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));


    // VIMEO URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[vimeo_url]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_vimeo_option', array(
        'settings' => 'york_twentythirteen_options[vimeo_url]',
        'label' => __('Vimeo URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));

    // LINKEDIN URL
    $wp_customize->add_setting(
            'york_twentythirteen_options[linkedin_url]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_linkedin_option', array(
        'settings' => 'york_twentythirteen_options[linkedin_url]',
        'label' => __('LinkedIn URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));

// RSS Link
    $wp_customize->add_setting(
            'york_twentythirteen_options[rss_url]', array(
        'default' => __('RSS URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_rss_option', array(
        'settings' => 'york_twentythirteen_options[rss_url]',
        'label' => __('RSS URL'),
        'section' => 'yu_social_media',
        'type' => 'text',
    ));


// YFILE Link
    $wp_customize->add_setting(
            'york_twentythirteen_options[yfile_link]', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_yfile_option', array(
        'settings' => 'york_twentythirteen_options[yfile_link]',
        'label' => __('Show Yfile Link'),
        'section' => 'yu_social_media',
        'type' => 'checkbox'
    ));


// Instagram Link
    $wp_customize->add_setting(
            'york_twentythirteen_options[instagram_url]', array(
        'default' => __('Instagram URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_instagram_option', array(
        'settings' => 'york_twentythirteen_options[instagram_url]',
        'label' => __('Instagram URL'),
        'section' => 'yu_social_media',
        'type' => 'text'
    ));

// Tumblr Link
    $wp_customize->add_setting(
            'york_twentythirteen_options[tumblr_url]', array(
        'default' => __('Tumblr URL'),
        'capability' => 'edit_theme_options',
        'type' => 'option'
            )
    );

    $wp_customize->add_control('display_tumblr_option', array(
        'settings' => 'york_twentythirteen_options[tumblr_url]',
        'label' => __('Tumblr URL'),
        'section' => 'yu_social_media',
        'type' => 'text'
    ));


    $wp_customize->add_setting('york_twentythirteen_options[site_link]', array('default' => get_site_url(), 'type' => 'option', 'transport' => 'refresh'));
    $wp_customize->add_control('set_site_link', array(
        'settings' => 'york_twentythirteen_options[site_link]',
        'label' => __('Site Link'),
        'section' => 'title_tagline',
        'type' => 'text',
        'priority' => 1
    ));



    $wp_customize->add_setting('glendon-bootstrap_options[post_featured_images]', array('default' => false, 'type' => 'option', 'transport' => 'postMessage'));
    $wp_customize->add_control('use_post_featured_images', array(
        'settings' => 'glendon-bootstrap_options[post_featured_images]',
        'label' => __('Use Featured Images on Posts?'),
        'section' => 'yu_post_settings',
        'type' => 'checkbox',
        'priority' => 2
    ));


    $wp_customize->add_setting('york_twentythirteen_options[breadcrumb]', array('default' => false, 'type' => 'option', 'transport' => 'refresh'));
    $wp_customize->add_control('use_breadcrumb', array(
        'settings' => 'york_twentythirteen_options[breadcrumb]',
        'label' => __('Use Breadcrumbs?'),
        'section' => 'yu_post_settings',
        'type' => 'checkbox',
        'priority' => 3
    ));

    $wp_customize->add_setting('york_twentythirteen_options[yu_social_html]', array('default' => "", 'type' => 'option', 'transport' => 'refresh'));
    $wp_customize->add_control('yu_social_html', array(
        'settings' => 'york_twentythirteen_options[yu_social_html]',
        'label' => __('HTML'),
        'default' => glendonsocial(),
        'section' => 'yu_social_media',
        'type' => 'text',
        'priority' => 50
    ));
}

add_action('customize_register', 'glendon_bootstrap_customize_register');

/**
 * Registers two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function glendon_bootstrap_widgets_init() {

    register_sidebar(array(
        'name' => __('Right Sidebar Widget Area', 'glendon'),
        'id' => 'sidebar-2',
        'description' => __('Appears on posts and pages in the sidebar. Widgets flow to below content on smaller screens.', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer column 1', 'glendon'),
        'id' => 'footer-sidebar-1',
        'description' => __('Optional widget area for first column in footer', 'glendon'),
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Footer column 2', 'glendon'),
        'id' => 'footer-sidebar-2',
        'description' => __('Optional widget area for second column in footer', 'glendon'),
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Footer column 3', 'glendon'),
        'id' => 'footer-sidebar-3',
        'description' => __('Optional widget area for third column in footer', 'glendon'),
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Alternate side bar', 'glendon'),
        'id' => 'sidebar-4',
        'description' => __('Alternate side bar for deferent widgets than the default side bar', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Homepage sidebar', 'glendon'),
        'id' => 'homepage-sidebar',
        'description' => __('This sidebar will only work with the homepage template', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Tab-1', 'glendon'),
        'id' => 'tab-1',
        'description' => __('This will only work with the homepage template', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Tab-2', 'glendon'),
        'id' => 'tab-2',
        'description' => __('This will only work with the homepage template', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Tab-3', 'glendon'),
        'id' => 'tab-3',
        'description' => __('This will only work with the homepage template', 'glendon'),
        'before_widget' => '<div id="%1$s" class="%2$s widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Slideshow Area', 'twentythirteen'),
        'id' => 'sidebar-8',
        'description' => __('Optional slideshow or static image for Home page', 'twentythirteen'),
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'glendon_bootstrap_widgets_init');

/*
 * YorkU social icons
 */

function glendonsocial() {
    global $options;
    $hs = false;
    if ($options['yfile_link']) {
        $hs = true;
        $yf = '<div class="sm-link-box"><a class="yfile-link" href="http://yfile.news.yorku.ca/"><i class="fa yfile-icon yuicons"></i><span class="accessible">yfile</span></a></div>';
    } else {
        $yf = '';
    }
    if (!empty($options['facebook_url'])) {
        $hs = true;
        $fb = '<div class="sm-link-box"><a href="' . $options['facebook_url'] . '"><i class="fa fa-facebook yuicons"></i><span class="accessible">facebook</span></a></div>';
    } else {
        $fb = "";
    }

    if (!empty($options['twitter_url'])) {
        $hs = true;
        $tw = '<div class="sm-link-box"><a href="' . $options['twitter_url'] . '"><i class="fa fa-twitter yuicons"></i><span class="accessible">twitter</span></a></div>';
    } else {
        $tw = "";
    }

    if (!empty($options['flickr_url'])) {
        $hs = true;
        $flickr = '<div class="sm-link-box"><a href="' . $options['flickr_url'] . '"><i class="fa fa-flickr  yuicons"></i><span class="accessible">flickr</span></a></div>';
    } else {
        $flickr = "";
    }

    if (!empty($options['youtube_url'])) {
        $hs = true;
        $ytube = '<div class="sm-link-box"><a href="' . $options['youtube_url'] . '"><i class="fa fa-youtube yuicons"></i><span class="accessible">youtube</span></a></div>';
    } else {
        $ytube = "";
    }

    if (!empty($options['linkedin_url'])) {
        $hs = true;
        $ln = '<div class="sm-link-box"><a href="' . $options['linkedin_url'] . '"><i class="fa fa-linkedin yuicons"></i><span class="accessible">linkedin</span></a></div>';
    } else {
        $ln = "";
    }

    if (!empty($options['vimeo_url'])) {
        $hs = true;
        $vm = '<div class="sm-link-box"><a href="' . $options['vimeo_url'] . '"><i class="fa fa-vimeo-square yuicons"></i><span class="accessible">vimeo</span></a></div>';
    } else {
        $vm = "";
    }

    if (!empty($options['rss_url'])) {
        $hs = true;
        $yrss = '<div class="sm-link-box"><a href="' . $options['rss_url'] . '"><i class="fa fa-rss yuicons"></i><span class="accessible">rss</span></a></div>';
    } else {
        $yrss = "";
    }

    if (!empty($options['instagram_url'])) {
        $hs = true;
        $ig = '<div class="sm-link-box"><a href="' . $options['instagram_url'] . '"><i class="fa fa-instagram yuicons"></i><span class="accessible">instagram</span></a></div>';
    } else {
        $ig = "";
    }

    if (!empty($options['tumblr_url'])) {
        $hs = true;
        $tr = '<div class="sm-link-box"><a href="' . $options['tumblr_url'] . '"><i class="fa fa-tumblr yuicons"></i><span class="accessible">tumblr</span></a></div>';
    } else {
        $tr = "";
    }

    if ($hs) {
        return "<div id='link_buttons'>" . $fb . $tw . $ln . $ytube . $flickr . $yrss . $yf . $ig . $tr . $vm . "</div>";
    } else {
        return "";
    }
}

add_shortcode('glendonsocial', 'glendonsocial');

function edit_admin_menus() {
    global $menu;
    global $submenu;
    $submenu['themes.php'][6][0] = 'Glendon Theme Options';
}

add_action('admin_menu', 'edit_admin_menus');

function print_object($object) {
    echo '<pre>';
    print_r($object);
    echo '</pre>';
}

/**
 * Converts stdClass object to an array
 * @param array $d  stdClass object
 * @return array    Returns an array of stdClass object
 */
function objectToArray($d) {
    if (is_object($d)) {
// Gets the properties of the given object
// with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
         * Return array converted to object
         * Using __FUNCTION__ (Magic constant)
         * for recursive call
         */
        return array_map(__FUNCTION__, $d);
    } else {
// Return array
        return $d;
    }
}

function count_submenus_per_parent_id($menu_items, $parent_id) {

    $count_items = count($menu_items);

    $found = 0;
    for ($i = 0; $i < $count_items; $i++) {
        $object[$i] = objectToArray($menu_items[$i]);
        $search[$i] = array_search($parent_id, $object[$i]);
        if ($search[$i] == 'menu_item_parent') {
            $found = $found + 1;
        }
    }
    return $found;
}

/**
 * Create bootstrap capable menu using smartmenus classes
 * @param string $location
 * @param string $class
 */
function nav_create_menu_from_wp_nav_menu($location = 'primary', $class = '') {
    $nav = wp_nav_menu(array(
        'theme_location' => $location,
        'echo' => false
    ));

    $nav = str_replace('class="menu"', 'class="nav navbar-nav ' . $class . '"', $nav);
    $nav = str_replace('class="sub-menu"', 'class="dropdown-menu"', $nav);
    $nav = str_replace('current-menu-ancestor', 'active', $nav);
    $nav = str_replace('current-menu-parent', 'active-submenu', $nav);
    $nav = str_replace('current-menu-item', 'active active-submenu', $nav);

    echo $nav;
}

function mod_mce($initArray) {
    $initArray['verify_html'] = false;
    return $initArray;
}

add_filter('tiny_mce_before_init', 'mod_mce');

if (!function_exists('glendon_entry_meta')) :

    /**
     * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
     *
     * Create your own twentythirteen_entry_meta() to override in a child theme.
     *
     * @since Twenty Thirteen 1.0
     *
     * @return void
     */
    function glendon_entry_meta() {
        if (is_sticky() && is_home() && !is_paged())
            echo '<span class="featured-post">' . __('Sticky', 'glendon') . '</span>';

        if (!has_post_format('link') && 'post' == get_post_type())
            glendon_entry_date();

        // Only show categories for posts if there are more than one and  
        $cats = get_the_category();
        if ('post' == get_post_type()) {
            if (count($cats) > 1 && $cats[0]->term_id != get_option('default_category')) {
                // Translators: used between list items, there is a space after the comma.
                $categories_list = get_the_category_list(__(', ', 'glendon'));

                if ($categories_list) {
                    echo '<span class="categories-links">' . $categories_list . '</span>';
                }
            }
        }

        // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list('', __(', ', 'glendon'));
        if ($tag_list) {
            echo '<span class="tags-links">' . $tag_list . '</span>';
        }

        // Post author
//        if ('post' == get_post_type()) {
//            printf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'twentythirteen'), get_the_author())), get_the_author()
//            );
//        }
    }

endif;

if (!function_exists('glendon_entry_date')) :

    /**
     * Prints HTML with date information for current post.
     *
     * Create your own twentythirteen_entry_date() to override in a child theme.
     *
     * @since Twenty Thirteen 1.0
     *
     * @param boolean $echo Whether to echo the date. Default true.
     * @return string
     */
    function glendon_entry_date($echo = true) {
        $format_prefix = ( has_post_format('chat') || has_post_format('status') ) ? _x('%1$s on %2$s', '1: post format name. 2: date', 'glendon') : '%2$s';

        $date = sprintf('<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', esc_url(get_permalink()), esc_attr(sprintf(__('Permalink to %s', 'glendon'), the_title_attribute('echo=0'))), esc_attr(get_the_date('c')), esc_html(sprintf($format_prefix, get_post_format_string(get_post_format()), get_the_date()))
        );

        if ($echo)
            echo $date;

        return $date;
    }

endif;

function new_excerpt_more($more) {
    return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'glendon') . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function spark_video_widget($id, $wwwroot, $fileFLV, $captionXML, $fileMP4, $hasTranscripts, $displaySize = 'sm', $language = 'en') {
    $ht = 180;
    $wt = 294;
    if ($displaySize == 'lr') {
        $ht = 262;
        $wt = 428;
    }

    $p = '<div class="video-player-container" title="">';
    $p = $p.'<div class="video-player">';
/*
    $p = $p.'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="'.$wt.'" height="'.$ht.'" name="swfvideo3043" id="swfvideo3043">';
    $p = $p.'<param name="movie" value="' . $wwwroot . '/media/player.swf">';
    $p = $p.'<param name="allowScriptAccess" value="always">';
    $p = $p.'<param name="wmode" value="transparent">';
    $p = $p.'<param name="allowFullScreen" value="true">';
    $p = $p.'<param name="FlashVars" value="file=' . $fileFLV . '&amp;fullscreen=true&amp;stretching=exactfit&amp;displayclick=none&amp;width='.$wt.'&amp;height='.$ht.'&amp;plugins=' . $wwwroot . '/media/captions.swf&amp;captions.file=' . $captionXML . '&amp;captions.back=true&amp;">';
    $p = $p.'<embed src="' . $wwwroot . '/media/player.swf" width="'.$wt.'" height="'.$ht.'" type="application/x-shockwave-flash" 
        pluginspage="//www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" name="swfvideo3043" id="swfvideo3043" 
        allowfullscreen="true" swliveconnect="true" wmode="transparent" allowscriptaccess="always" 
        flashvars="file=' . $fileFLV . '&amp;fullscreen=true&amp;stretching=exactfit&amp;displayclick=none&amp;width='.$wt.'&amp;height='.$ht.'&amp;plugins=' . $wwwroot . '/media/captions.swf&amp;captions.file=' . $captionXML . '&amp;captions.back=true&amp;">';
    $p = $p.'</object></div></div>';
*/
    $p = $p . '<video width="'. $wt . '" height="'. $ht . '" controls>';
    $p = $p . '<source src="' . $fileMP4 . '" type="video/mp4">';
    $p = $p . '</video>';
    $p = $p . '</div></div>';

    $p = $p.'<div class="video-alt-controls-container">';

    if (!empty($fileMP4)) {
        $p = $p.'<div class="video-mac-view' . ($language === 'fr' ? '-fr' : '') . '" loc="' . $fileMP4 . '"></div>';
    }

    if ($hasTranscripts) {
        $p = $p.'<div class="video-transcript-pop' . ($language === 'fr' ? '-fr' : '') . '" rel-id="'.$id.'"></div>';
    }
    $p = $p.'</div>';
    
    return $p;
}

            
add_filter('upload_mimes', 'custom_upload_xml');
 
function custom_upload_xml($mimes) {
    $mimes = array_merge($mimes, array('xml' => 'application/xml'));
    return $mimes;
}
                	
// shortcodes
//remove_filter( 'the_content', 'wpautop' );

            
// [spark_gloss term="Your Term" alt="Tooltip text" width='N(in px)' height='N(in px)']contnet[/spark_gloss]
add_shortcode( 'sparkgloss', 'sparkgloss_func' );
function sparkgloss_func( $atts, $content = null ){
	// default shortcode attributes
	 $a = shortcode_atts( array(
        'term' => '',
        'alt' => '',
		'width' => 280,
		'height' => 180,
		'offset' => 0,
		'titlebreak' => 0,
		'showtitle' => 1
    ), $atts );
	
	$leader = '<em class="content-gloss-term" title="' . $a['alt'] . '" ofs="' . $a['offset'] . '">' . $a['term'] . '</em><em class="content-gloss-pop" style="text-align:left;width:' . $a['width'] . 'px;height:' . $a['height'] . 'px;">';
	if ($a['showtitle']!="0") {
		$leader = $leader . '<strong>' . $a['term'] . ': </strong>';
		if ($a['titlebreak']=="1") {
			$leader = $leader. '<br/>';
		}
	}
	$trailer = '</em>';

	return $leader . $content . $trailer;
}
            
// [sparkpop id="page_id" pos="n"]
add_shortcode( 'sparkpop', 'sparkpop_func' );
function sparkpop_func( $atts ) {
	extract( shortcode_atts( array(
		'id' => null,
		'pos' => 0,
		'lang' => "en",
	), $atts ) );
	$myWidth = 0;
	$myHeight = 0;
	$myContent = "";
	$the_query = new WP_Query( 'page_id='.$id );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			$myWidth = get_field('width');
			$myHeight = get_field('height');
			if ($lang=="en") {
				$myContent = apply_filters('the_content',get_the_content());
			} else {
				$myContent = apply_filters('the_content',get_field("content_fr"));
			}
	}
	wp_reset_postdata();
	$myString =  '<div class="popup pop-cart-' . $pos . '" style="height:' . ($myHeight+33) . 'px;width:' . ($myWidth+8) . 'px;">';
	$myString =  $myString . '<div class="popup-header DLG_titleBarLine">';
    $myString =  $myString . '  <div class="popup-header-title DLG_titleText">' . ($lang === "en" ? "SPARK York University" : "SPARK York Université") . '</div>';
    $myString =  $myString . '    <div class="popup-header-button DLG_titleBtns">';
    $myString =  $myString . '      <div class="popup-header-button DLG_titleCloseBtn"></div>';
    $myString =  $myString . '    </div>';
    $myString =  $myString . '  </div>';
    $myString =  $myString . '  <div class="popup-content" style="overflow:hidden;height:' . $myHeight . 'px;">';
	$myString =  $myString . $myContent;
    $myString =  $myString . '</div>';
	$myString =  $myString . '</div>';
	
	return $myString;
}

function spark_get_objectives( $id = null, $lang = "en" ) {
	
	$myWidth = 0;
	$myHeight = 0;
	$myContent = "";
	$the_query = new WP_Query( 'page_id='.$id );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			$myWidth = get_field('width');
			$myHeight = get_field('height');
			if ($lang=="en") {
				$myContent = apply_filters('the_content',get_the_content());
			} else {
				$myContent = apply_filters('the_content',get_field("content_fr"));
			}
	}
	wp_reset_postdata();
	$myString =  '<div class="popup pop-objectives" style="height:' . ($myHeight+33) . 'px;width:' . ($myWidth+8) . 'px;">';
	$myString =  $myString . '<div class="popup-header DLG_titleBarLine">';
    $myString =  $myString . '  <div class="popup-header-title DLG_titleText">' . ($lang === "en" ? "SPARK York University" : "SPARK York Université") . '</div>';
    $myString =  $myString . '    <div class="popup-header-button DLG_titleBtns">';
    $myString =  $myString . '      <div class="popup-header-button DLG_titleCloseBtn"></div>';
    $myString =  $myString . '    </div>';
    $myString =  $myString . '  </div>';
    $myString =  $myString . '  <div class="popup-content" style="overflow:hidden;height:' . $myHeight . 'px;">';
	$myString =  $myString . $myContent;
    $myString =  $myString . '</div>';
	$myString =  $myString . '</div>';
	
	return $myString;
}
function sess_start() {
    if (!session_id())
    session_start();
}
add_action('init','sess_start');

function spark_get_transcript( $id = null, $lang = "en" ) {
	
	$myWidth = 0;
	$myHeight = 0;
	$myContent = "";
	$the_query = new WP_Query( 'page_id='.$id );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		if ($lang=="en") {
			$myContent = apply_filters('the_content',get_field("transcript_english"));
		} else {
			$myContent = apply_filters('the_content',get_field("transcript_french"));
		}
	}
	wp_reset_postdata();
	$myString =  '<div id="pop-transcript-'.$id.'" style="display:none">';
	$myString =  $myString . $myContent;
	$myString =  $myString . '</div>';
	
	return $myString;
}
