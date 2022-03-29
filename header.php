<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ハンバーガーサイトのフロントページ">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="l-container">
        <header class="l-header p-header">
            <a class="c-title--header" href="<?php echo home_url('/'); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <?php get_search_form(); ?>
            <button class="c-btn--header js-menu--open">Menu</button>
        </header>



<!--コメントアウト（メモ代わり-->
        <?php //if (is_404()) {
    ?>
    <!--<meta http-equiv="refresh" content="3; URL=https://on-ze.com">-->
    <?php //}
    ?>