<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ハンバーガーサイトのフロントページ">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php //if (is_404()) { ?>
        <!--<meta http-equiv="refresh" content="3; URL=https://on-ze.com">-->
    <?php //} ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="l-container">
        <header class="l-header p-header">
            <a href="<?php echo home_url('/'); ?>">
                <p class="c-title--header"><?php bloginfo('name'); ?></p>
            </a>
            <?php get_search_form(); ?>
            <button class="c-btn--header js-menu--open">Menu</button>
        </header>