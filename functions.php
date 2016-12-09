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