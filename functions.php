<?php

//テーマサポート
//タイトル出力
add_action('after_setup_theme', function () {
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    ));
    add_theme_support('title-tag');
    //add_theme_support('menus');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'side-menu' => 'サイドメニュー'
        )
    );
});

//タイトル出力
add_filter('pre_get_document_title', function ($title) {
        $title = get_bloginfo('name', 'display');
    return $title;
});

//css&js読み込み
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('add_google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap ', false);
    wp_enqueue_style('style-css', get_theme_file_uri() . '/css/style.css', array());
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_theme_file_uri() . '/js/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('js', get_theme_file_uri() . '/js/script.js', array('jquery'), true);
});

//ウィジェット
add_action('widgets_init', function () {
    register_sidebar(
        array(
            'name' => 'メニュー',
            'id' => 'menu_widget',
            'description' => 'メニュー用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2><i class="fa fa-folder" aria-hidden="true"></i>',
            'after_title' => '</h2>\n'
        )
    );
});
