<?php

//テーマサポート、タイトル、ナビゲーション取得
add_action('after_setup_theme', function () {
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
    ));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'side-menu' => 'サイドメニュー',
            'footer-menu' => 'フッターメニュー'
        )
    );
});

//タイトル出力（<title>取得）
add_filter('pre_get_document_title', function ($title) {
    if (is_front_page() && is_home()) {
        $title = get_bloginfo('name', 'display');
    } elseif (is_singular()) {
        $title = single_post_title('', false);
    } elseif (is_archive()) {
        $title = single_cat_title('', false);
    }
    return $title;
});

//css&js読み込み
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('add_google_fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap ', false);
    wp_enqueue_style('style-css', get_theme_file_uri() . '/css/style.css', array());
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_theme_file_uri() . '/js/jquery-3.6.0.min.js', array(), '3.6.0', false);
    wp_enqueue_script('js', get_theme_file_uri() . '/js/script.js', array('jquery'), false);
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

//メインループのカスタマイズ（archive）
add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    } elseif ($query->is_archive()) {
        $query->set('order', 'ASC');
        $query->set('orderby', 'date');
    }
});

//カスタム投稿追加
function create_my_post_types()
{
    //カスタム投稿タイプを登録
    register_post_type(
        'new', //投稿タイプ名（識別子：半角英数字の小文字）
        array(
            'label' => '新メニュー',  //カスタム投稿タイプの名前（管理画面のメニューに表示される）
            'labels' => array(  //管理画面に表示されるラベルの文字を指定
                'add_new' => '新メニュー追加',
                'edit_item' => '新メニューの編集',
                'view_item' => '新メニューを表示',
                //'search_items' => '新メニューを検索',
                //'not_found' => '新メニューは見つかりませんでした。',
                //'not_found_in_trash' => 'ゴミ箱に新メニューはありませんでした。',
            ),
            'public' => true,  // 管理画面に表示しサイト上にも表示する
            'description' => 'カスタム投稿タイプ「新メニュー」の説明文です。',  //説明文
            'hierarchicla' => false,  //コンテンツを階層構造にするかどうか
            'has_archive' => true,  //trueにすると投稿した記事の一覧ページを作成することができる
            'show_in_rest' => true,  //新エディタ Gutenberg を有効化（REST API を有効化）
            'supports' => array(  //記事編集画面に表示する項目を配列で指定することができる
                'title',  //タイトル
                'editor',  //本文の編集機能
                'thumbnail',  //アイキャッチ画像（add_theme_support('post-thumbnails')が必要）
                'excerpt',  //抜粋
                'custom-fields', //カスタムフィールド
                'revisions'  //リビジョンを保存
            ),
            'menu_position' => 5, //「投稿」の下に追加
            'taxonomies' => array('new_cat', 'new_tag')  //使用するタクソノミー
        )
    );
}
add_action('init', 'create_my_post_types');


//画像タグのwidth/heighを削除１←削除されてないような
function customize_img_attribute($content)
{
    $re_content = preg_replace('/(<img[^>]*)width="\d+"\s+height="\d+"\s/', '$1', $content);
    return $re_content;
}
add_filter('the_content', 'customize_img_attribute');

//画像タグのwidth/heighを削除２←削除されてないような
add_filter( 'wp_img_tag_add_width_and_height_attr', '__return_false' );

//本体ギャラリーCSS停止←停止している？
add_filter( 'use_default_gallery_style', '__return_false' );




//single.phpであるコンテンツのクラス名変更→できない
//add_filter('wp_insert_post_data', function ($content) {
    //$content['post_content'] = str_replace('<h2>', '<h2 class="c-title--article__heading">',
    //$content['post_content'] );
    //return $content;
//});


//single.phpであるコンテンツのクラス名変更→これもclassが吐き出されない
//function my_replace_to_custom_tags( $postarr ) {
//    $postarr['post_content'] = str_replace('<p>', '<p class="ppp">', $postarr['post_content'] );
//    return $postarr;
//}
//add_filter('wp_insert_post_data', 'my_replace_to_custom_tags');
