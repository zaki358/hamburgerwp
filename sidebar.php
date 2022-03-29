<aside id="sidebar">
    <div class="c-layer--sidebar"></div>
    <nav class="p-menu">
        <h2 class="c-title--sidebar">Menu</h2>

        <?php wp_nav_menu(
            array(
                'theme_location' => 'side-menu',
                'container' => '',
                'container_id' => '',
                'container_class' => '',
                'menu_class' => 'p-menu__list'
            )
        ); ?>

        <button class="c-btn--menu js-menu--close">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/sidebar_menu_btn_icon.svg" alt="phpファイルで画像取得するには関数が必要">
        </button>
    </nav>
</aside>