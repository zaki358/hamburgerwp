<footer id="l-footer">

<?php wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container' => 'div',
                'container_id' => '',
                'container_class' => 'p-menu--footer',
                'menu_class' => 'c-title--footer__text__shop'
            )
        ); ?>

    <p class="c-title--footer__text__info">Copyright: RaiseTech</p>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>