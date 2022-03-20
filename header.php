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
            <a href="<?php echo home_url('/'); ?>">
                <p class="c-title--header"><?php bloginfo('name'); ?></p>
            </a>
            <?php get_search_form(); ?>
            <button class="c-btn--header js-menu--open">Menu</button>
        </header>
        

        <!--<title>Hamburger</title>-->
        <!--<link href="">-->
        <!--CSS-->
        <!--<link href="css/style.css" rel="stylesheet">-->
        <!--font awesomeは使用していない-->
        <!--<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">-->
        <!--Google Fonts Roboto Thin100-->
        <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->
        <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
        <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">-->
        <!--<script src="js/jquery-3.6.0.min.js"></script>-->
        <!--<script src="js/script.js"></script>-->