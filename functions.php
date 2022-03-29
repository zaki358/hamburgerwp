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
add_filter('wp_img_tag_add_width_and_height_attr', '__return_false');

//本体ギャラリーCSS停止←停止している？
add_filter('use_default_gallery_style', '__return_false');

//総ページ数取得
function max_show_page_number()
{
    global $wp_query;
    $max_page = $wp_query->max_num_pages;
    return $max_page;
}


//以下コメントアウト（メモ代わり）

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


//$cat = get_the_category();
// カテゴリー名の取得
//$cat_name = $cat[0]->name;
// カテゴリーidの取得
//$cat_id = $cat[0]->cat_ID;
// カテゴリースラッグの取得
//$cat_slug = $cat[0]->slug;
// カテゴリーの説明の取得
//$cat_description = $cat[0]->category_description;
// 親カテゴリーのIDを取得
//$cat_parent_id = $cat[0]->category_parent;
// 親カテゴリーのIDから情報を取得
//$cat_parent = get_category($cat[0]->category_parent);
// 親カテゴリー名を取得
//$cat_parent_catname = $parent->cat_name;


//ページネーション（案１）
//function pagination($pages = '', $range = 2)
//{
//    $showitems = ($range * 1) + 1;
//    global $paged;
//    if (empty($paged)) $paged = 1;
//    if ($pages == '') {
//        global $wp_query;
//        $pages = $wp_query->max_num_pages;
//        if (!$pages) {
//            $pages = 1;
//        }
//    }
//    if (1 != $pages) {

        //「1/2」表示 現在のページ数 / 総ページ数
//        echo "<div class=\"m-pagenation__result\">" . $paged . "/" . $pages . "</div>";
        // 「前へ」を表示
//        if ($paged > 1) echo "<div class=\"m-pagenation__prev\">
//                                <a href='" . get_pagenum_link($paged - 1) . "'>前へ</a>
//                               </div>";
//        // ページ番号を出力
//        echo "<ol class=\"m-pagenation__body\">\n";
//        for ($i = 1; $i <= $pages; $i++) {
//            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
//                echo ($paged == $i) ? "<li class=\"-current\">" . $i . "</li>" : // 現在のページの数字はリンク無し
//                    "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
//            }
//        }
        // [...] 表示
//        if (($paged + 4) < $pages) {
//            echo "<li class=\"notNumbering\">...</li>";
//            echo "<li><a href='" . get_pagenum_link($pages) . "'>" . $pages . "</a></li>";
//        }
//        echo "</ol>\n";
//        // 「次へ」を表示
//        if ($paged < $pages) echo "<div class=\"m-pagenation__next\">
//                    <a href='" . get_pagenum_link($paged + 1) . "'>次へ</a></div>";
//        echo "</div>\n";
//    }
//}

// ページネーション(案２)
//function the_pagination() {
//    // 一覧ページのクエリ
//    global $wp_query;
//    // ありそうもない数字をセット
//    $big = 999999999;
//    // １ページ以下なら非表示
//    if ( $wp_query->max_num_pages <= 1 ) return;
//    echo paginate_links( array(
//      'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//      'format'       => '?paged=%#%',
//      'current'      => max( 1, get_query_var('paged') ),
//      'total'        => $wp_query->max_num_pages,
//      'type'         => 'list',
//      'end_size'     => 2,
//      'mid_size'     => 2
//    ) );
//  }