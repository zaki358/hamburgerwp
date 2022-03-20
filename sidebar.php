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
            <img src="img/sidebar_menu_btn_icon.svg" alt="どうして・・・">
        </button>
    </nav>

</aside>


<!--<?php
    //if (is_active_sidebar('menu_widget')) :
    //dynamic_sidebar('menu_widget');
    //else :
    ?>
                <div class="widget">
                    <h2>No Widget</h2>
                    <p>ウィジェットは設定されていません。</p>
                </div> -->
<?php //endif; 
?>