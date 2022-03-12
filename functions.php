<?php

/* ---------------------------------------


//ウィジェットの有効化・設定
//--------------------------------------- */
//ウィジェットを作成し、管理画面で設定できるようにします。
//また、各ウィジェットをくくるHTMLタグなども指定できます。
//表示にはテーマテンプレート内でdynamic_sidebar()に設定したidを指定します。
function theme_slug_widgets_init() {
register_sidebar(array(
	 'name' => 'サイドナビ',
	 'id' => 'sidenavi' ,
	 'before_widget' => '<div class="side_widget">',
	 'after_widget' => '</div>',
	 'before_title' => '<h2 class="side_widget_title">',
	 'after_title' => '</h2>'
));
register_sidebar(array(
	 'name' => 'フッター',
	 'id' => 'footerwidget' ,
	 'before_widget' => '<div class="footer_widget">',
	 'after_widget' => '</div>',
	 'before_title' => '<h2 class="footer_widget_title">',
	 'after_title' => '</h2>'
));
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );
