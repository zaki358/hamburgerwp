<?php

//テーマサポート
//タイトル出力
add_theme_support('menus');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

//タイトル出力

add_filter('pre_get_document_title', function ($title) {
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) {
        $title = single_post_title(",false");
    }
    return $title;
});


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('add_google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap ', false);
    wp_enqueue_style('style-css', get_theme_file_uri() . '/css/style.css', '1.0.0');
    wp_enqueue_script('jquery', get_theme_file_uri() . 'js/jquery-3.6.0.min.js', true);
    wp_enqueue_script('js', get_theme_file_uri() . 'js/script.js', '1.0.0', true);
});
