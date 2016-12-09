<?php
/**
 * Created by PhpStorm.
 * User: eugene
 * Date: 12/8/16
 * Time: 3:40 PM
 */

//add scripts and stylesheets

function startwordpress_scripts(){

    wp_enqueue_style('bootstrap' , get_template_directory_uri(). '/bootstrap/css/bootstrap.min.css' , array(), '3.3.7');
    wp_enqueue_style('blog' , get_template_directory_uri(). '/css/blog.css');
    wp_enqueue_script('bootstrap', get_template_directory_uri(). '/bootstrap/js/bootstrap.min.css', array(), '3.3.7', true);
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
    wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
    wp_enqueue_style( 'OpenSans');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');

// WordPress Titles support to out theme
add_theme_support( 'title-tag' );

// we will add our theme's custom menu to the admin side bar

// Custom settings
function custom_settings_add_menu() {
    add_menu_page( 'Theme Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action( 'admin_menu', 'custom_settings_add_menu' );


// Create Custom Global Settings Page
function custom_settings_page() { ?>
    <div class="wrap">
        <h1> StartWordpress Custom Theme Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('section');
            do_settings_sections('theme-options');
            submit_button();
            ?>
        </form>
    </div>
<?php }

//-------------------------  Options in side bar which include setting side bar Everywhere section -----------//

// Twitter
function setting_twitter() { ?>
    <input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />
<?php }

// FaceBook
function setting_facebook() { ?>
    <input type="text" name="Facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
<?php }

// Github
function setting_github() { ?>
    <input type="text" name="Github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

//------------------------------------------------------------------------------------------------ -----------//


// we setup a page to accept and save the twitter settings
function custom_settings_page_setup() {

    add_settings_section('section', 'All Settings', null, 'theme-options');
    add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
    add_settings_field('facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section');
    add_settings_field('github', 'Github URL', 'setting_github', 'theme-options', 'section');

    register_setting('section', 'twitter');
    register_setting('section', 'facebook');
    register_setting('section', 'github');
}

add_action( 'admin_init', 'custom_settings_page_setup' );



// we add support for featured image for our posts

// Support Featured Images
add_theme_support( 'post-thumbnails' );