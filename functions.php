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
