<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ハンバーガーサイトのフロントページ">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div id="l-container">
        <header class="l-header p-header">
            <a class="c-title--header" href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <?php get_search_form(); ?>
            <button class="c-btn--header js-menu--open">Menu</button>
        </header>