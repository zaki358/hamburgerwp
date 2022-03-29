<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="l-main">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post(); ?>

            <!--投稿IDとクラスを取得-->
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="p-box--page" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(),'full'); ?>)">
                    <h1 class="c-title--box"><?php the_title(); ?></h1>
                </div>

                <div class="u-margin--article">
                    <article class="p-article">
                        <?php the_content(); ?>
                    </article>
                </div>
            </div>

        <?php endwhile;
        else : ?>
        <p>表示する記事がありません</p><?php
        endif; ?>

</main>

<?php get_footer(); ?>