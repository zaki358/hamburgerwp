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
    //add_theme_support('menus');
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'side-menu' => 'サイドメニュー',
            'footer-menu' => 'フッターメニュー'
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
add_action('pre_get_post', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_category()) {
        $query->set('posts_per_page', 3);
    }
    if ($query->is_search()) {
        $query->set('cat', -1);
    }
});



//ページネーション呼び出し関数
function pagination($pages = '', $range = 2)
{
    $showitems = ($range * 1) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if(1 != $pages){
        // 画像を使う時用に、テーマのパスを取得
        //$img_pass = get_template_directory_uri();
        //echo "<div class=\"m-pagenation\">";
        // 「1/2」表示 現在のページ数 / 総ページ数
        // echo "<div class=\"m-pagenation__result\">". $paged."/". $pages."</div>";
        // 「前へ」を表示
        // if($paged > 1) echo "<div class=\"m-pagenation__prev\">
        //                        <a href='".get_pagenum_link($paged - 1)."'>前へ</a>
         //                       </div>";
        // ページ番号を出力
        //echo "<ol class=\"m-pagenation__body\">\n";
        //for ($i=1; $i <= $pages; $i++){
        //    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
        //        echo ($paged == $i)? "<li class=\"-current\">".$i."</li>": // 現在のページの数字はリンク無し
        //            "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
        //    }
        //}
        // [...] 表示
        // if(($paged + 4 ) < $pages){
        //     echo "<li class=\"notNumbering\">...</li>";
        //     echo "<li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";
        // }
        //echo "</ol>\n";
        // 「次へ」を表示
        // if($paged < $pages) echo "<div class=\"m-pagenation__next\">
        //            <a href='".get_pagenum_link($paged + 1)."'>次へ</a></div>";
        //echo "</div>\n";
    }
}


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

