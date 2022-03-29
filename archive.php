<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="l-main">
    <div class="p-box--archive">
        <div class="p-box__title--archive">
            <h2 class="c-title--box--archive">Menu:</h2>
            <p class="c-title--box__text--archive"><?php single_cat_title(); ?></p>
        </div>
    </div>

    <section class="p-description--archive">
        <h3 class="c-title--description--archive">
            <?php single_cat_title(); ?>
        </h3>
        <p class="p-description__text--archive">
            <?php echo category_description(); ?>
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
                        <div class="p-card__text-archive"> <?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>">
                            <button class="c-btn--card--archive">詳しく見る</button></a>
                    </div>
                </section>

            </article>

        <?php endwhile;
         else :
        ?> <p class="c-text__nothing">表示する記事がありません</p> <?php
        endif;?>

    <div class="p-pagination">
        <?php $page = max_show_page_number(); ?>
        <p class="c-text--page">
            <?php if ($page > 1) {
                echo "page";
            } ?>
        </p>

        <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
        } ?>
    </div>
</main>

<?php get_footer(); ?>