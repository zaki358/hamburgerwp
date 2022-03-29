<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="l-main">
    <div class="p-box--archive">
        <div class="p-box__title--archive">
            <h2 class="c-title--box--archive">search</h2>
            <p class="c-title--box__text--archive"><?php echo $_GET['s']; ?></p>
        </div>
    </div>

    <section class="p-description--archive">
        <h3 class="c-title--description--archive">
            <?php echo $_GET['s']; ?></p>
        </h3>
        <p class="p-description__text--archive">
            <?php
            if (isset($_GET['s']) && empty($_GET['s'])) {
                echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
            } else {
                echo $_GET['s'] . 'の検索結果：' . $wp_query->found_posts . '件です'; // 検索キーワードと該当件数を表示
            }
            ?>
        </p>
    </section>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="p-card--archive">
                <section class="p-card__body--archive u-margin-card--archive">
                    <?php the_post_thumbnail('large', array('class' => 'c-img--card--archive')); ?>
                    <div class="p-card__item--archive">
                        <h3 class="c-title--card__menu--archive"><?php the_title() ?></h3>
                        <div class="p-card__text-archive"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>">
                            <button class="c-btn--card--archive">詳しく見る</button></a>
                    </div>
                </section>
            </article>

        <?php endwhile;
        else :
        ?> <p>表示する記事がありません</p> <?php
        endif;?>

    <div class="p-pagination">
        <p class="c-text--page">page</p>
        <ul class="p-pagination__list u-margin--pagination__list">
        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </div>
</main>

<?php get_footer(); ?>
