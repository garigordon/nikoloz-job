<?php

error_reporting(E_ERROR | E_PARSE);

//support <title>'s
add_theme_support('title-tag');

function my_custom_mime_types($mimes)
{

// New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';

// Optional. Remove a mime type.
    unset($mimes['exe']);

    return $mimes;
}

add_filter('upload_mimes', 'my_custom_mime_types');

//enqueue styles
add_action('wp_enqueue_scripts', 'nikoloz_enqueue_styles');
function nikoloz_enqueue_styles()
{
    wp_enqueue_style('nikoloz-sub-style', get_stylesheet_directory_uri() . '/css/app.css', [], null);
}

//enqueue scripts
add_action('wp_enqueue_scripts', 'nikoloz_enqueue_scripts');
function nikoloz_enqueue_scripts() {


    $jquery = "jquery";
    $jqueryUri = "//code.jquery.com/jquery-3.4.1.min.js";
    $jqueryV = "1.1";
    $jqueryInFooter = false;

    $tweenmax = "tweenmax";
    $tweenmaxUri = "//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js";
    $tweenmaxV = "1.1";
    $tweenmaxInFooter = false;

    $imgname = "imagesloaded";
    $imgnameUri = "//unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js";
    $imgnameV = "1.1";
    $imgnameInFooter = true;

    $app = "app";
    $appUri = get_stylesheet_directory_uri() . "/js/app.js";
    $appV = null; // TODO set version for deployment
    $appInFooter = false;

    wp_deregister_script($jquery);
    wp_enqueue_script($tweenmax, $tweenmaxUri, [], $tweenmaxV, $tweenmaxInFooter);
    wp_enqueue_script($imgname, $imgnameUri, [], $imgnameV, $imgnameInFooter);
    wp_enqueue_script($jquery, $jqueryUri, [], $jqueryV, $jqueryInFooter);
    wp_enqueue_script($app, $appUri, [], $appV, $appInFooter);
}


function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');

add_theme_support('post-thumbnails');

function the_breadcrumb(){
    global $post;
    if(!is_home()){
        echo '<li><a href="'.site_url().'">Главная</a></li>';
        if(is_single()){ // записи
            echo "</span></li>";
            echo the_category();
            echo "</span></li>";

            echo "<li><span>";
            echo the_title();
            echo "</span></li>";
        }
        elseif (is_page()) { // страницы
            if ($post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) echo $crumb . ' &raquo; ';
            }
            echo '<li><span>' . the_title() . '</span></li>';
        }
        elseif (is_category()) { // категории
            global $wp_query;
            $obj_cat = $wp_query->get_queried_object();
            $current_cat = $obj_cat->term_id;
            $current_cat = get_category($current_cat);
            $parent_cat = get_category($current_cat->parent);
            if ($current_cat->parent != 0)
                echo "<li><span>". (get_category_parents($parent_cat, TRUE)) ."</span></li>";
            echo "<li><span>";
            echo  single_cat_title();
            echo "</span></li>";
        }
        elseif (is_search()) { // страницы поиска
            echo 'Результаты поиска для "' . get_search_query() . '"';
        }
        elseif (is_tag()) { // теги (метки)
            echo single_tag_title('', false);
        }
        elseif (is_day()) { // архивы (по дням)
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> &amp;raquo; ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> &amp;raquo; ';
            echo get_the_time('d');
        }
        elseif (is_month()) { // архивы (по месяцам)
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> &amp;raquo; ';
            echo get_the_time('F');
        }
        elseif (is_year()) { // архивы (по годам)
            echo get_the_time('Y');
        }
        elseif (is_author()) { // авторы
            global $author;
            $userdata = get_userdata($author);
            echo 'Опубликовал(а) ' . $userdata->display_name;
        } elseif (is_404()) { // если страницы не существует
            echo 'Ошибка 404';
        }

        if (get_query_var('paged')) // номер текущей страницы
            echo ' (' . get_query_var('paged').'-я страница)';

    } else { // главная
        $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
        if($pageNum>1)
            echo '<li><a href="'.site_url().'">Главная</a></li> '.$pageNum.'-я страница';
        else
            echo 'Вы находитесь на главной странице';
    }
}


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('просмотров');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_filter('upload_mimes', 'my_custom_mime_types');

function create_jobs()
{
    register_post_type('job', array(
        'labels' => array(
            'name' => __('Вакансии'),
            'singular_name' => __('Вакансии'),
            'add_new' => __('Add post'),
            'add_new_item' => __('Add'),
            'edit' => __('Edit vacancy'),
            'edit_item' => __('Edited vacancy'),
            'new_item' => __('Vacancy'),
            'all_items' => __('All Vacancy'),
            'view' => __('View Vacancy'),
            'view_item' => __('View Vacancy'),
            'search_items' => __('Search Vacancy'),
            'not_found' => __('Vacancy not found'),
        ),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('vid', 'type', 'type_author', 'col_room'),
        'has_archive' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-admin-site',
        'rewrite' => array('slug' => 'job'),
    ));
}

add_action('init', 'create_jobs');


function vid_create_taxonomies()
{
    // Cats Categories
    register_taxonomy('jobs-cat', array('job'), array(
        'hierarchical' => true,
        'label' => 'Categories',
        'singular_name' => 'Categories',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'jobs-cat')
    ));
}

add_action('init', 'vid_create_taxonomies', 0);
