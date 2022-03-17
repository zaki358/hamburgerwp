<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="l-main">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>

            <!--投稿IDとクラスを取得-->
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php the_post_thumbnail(); ?>
                <div class="p-box--single">
                    <h1 class="c-title--box"><?php the_title(); ?></h1>
                </div>
                <div class="u-margin--article">
                    <article class="p-article">
                        <?php the_content(); ?>
                    </article>
                </div>

            </div>

        <?php endwhile;
    else :
        ?><p>表示する記事がありません</p><?php
    endif; ?>

</main>

<?php get_footer(); ?>