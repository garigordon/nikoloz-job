<?php

error_reporting(E_ERROR | E_PARSE);

//support <title>'s
add_theme_support('title-tag');

//enqueue styles
add_action('wp_enqueue_scripts', 'nikoloz_enqueue_styles');
function nikoloz_enqueue_styles()
{
    wp_enqueue_style('nikoloz-sub-style', get_stylesheet_directory_uri() . '/css/app.css', [], null);
}

//enqueue scripts
add_action('wp_enqueue_scripts', 'nikoloz_enqueue_scripts');
function nikoloz_enqueue_scripts()
{
    $jquery = "jquery";
    $jqueryUri = "//code.jquery.com/jquery-3.4.1.min.js";
    $jqueryV = "1.1";
    $jqueryInFooter = false;

    $tweenmax = "tweenmax";
    $tweenmaxUri = "//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js";
    $tweenmaxV = "1.1";
    $tweenmaxInFooter = false;

    $app = "app";
    $appUri = get_stylesheet_directory_uri() . "/js/app.js";
    $appV = null; // TODO set version for deployment
    $appInFooter = true;

    wp_deregister_script($jquery);

    //wp_enqueue_script($jquery, $jqueryUri, [], $jqueryV, $jqueryInFooter);
    wp_enqueue_script($tweenmax, $tweenmaxUri, [], $tweenmaxV, $tweenmaxInFooter);
    wp_enqueue_script($app, $appUri, [], $appV, $appInFooter);


    wp_localize_script($app, 'frontendAjax', ['ajaxurl' => admin_url('admin-ajax.php')]);
}

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');

add_theme_support('post-thumbnails');