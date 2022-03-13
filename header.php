<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Hamburger</title>
    <meta name="description" content="ハンバーガーサイトのフロントページ">
    <link href="">
    <!--CSS-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!--Google Fonts Roboto Thin100-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <?php wp_head(); ?>
</head>

<body>
    <div id="l-container">
        <header class="l-header p-header">
            <p class="c-title--header"><?php bloginfo('name'); ?></p>

            <form class="p-header__form" method="get" action="<!?php echo home_url('/'); ?>">
                <div class="p-header__form__search">
                    <input class="c-form--header__text" type="search" name="s" id="s">
                </div>
                <input class="c-form--header__submit" type="submit" value="検索">
            </form>

            <button class="c-btn--header js-menu--open">Menu</button>
        </header>