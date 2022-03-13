<?php

//テーマサポート
add_theme_support( 'title-tag' );

//タイトル出力
//add_theme_support( 'menus' );
add_theme_support( 'title-tag' );

//タイトル出力
function humburgerwp_title($title) {
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('name','display');
    } elseif (is_singular()) {
        $title = single_post_title(",false");
    }
    return $title;
    }
add_filter( 'pre_get_document_title', 'humburgerwp_title');