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
                <h3 class="c-title--description--archive">小見出しが入ります</h3>
                <p class="p-description__text--archive">
                    テキストが入ります。テキストが入ります。
                    テキストが入ります。テキストが入ります。
                    テキストが入ります。テキストが入ります。
                </p>
            </section>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="p-card--archive">
                <section class="p-card__body--archive u-margin-card--archive">
                    <?php the_post_thumbnail('thumbnail',array('class' => 'c-img--card--archive')); ?>
                    <div class="p-card__item--archive">
                        <h3 class="c-title--card__menu--archive"><?php the_title()?></h3>
                        <div class="p-card__text-archive"> <?php the_content()?></div>
                        <a href="<?php the_permalink(); ?>">
                        <button class="c-btn--card--archive">詳しく見る</button></a>
                    </div>
                </section>
            </article>

        <?php endwhile;
        else :
            ?> <p>表示する記事がありません</p> <?php
        endif;
        ?>

            <div class="p-pagination">
                <p class="c-text--page">page</p>
                <p class="p-pagination__item">1/10</p>
                <ul class="p-pagination__list u-margin--pagination__list">
                    <li class="p-pagination__unit">
                        <div class="c-icon--pagination__prev"></div>
                        <div class="c-icon--pagination__prev"></div>
                    </li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li class="p-pagination__unit">
                        <div class="c-icon--pagination__next"></div>
                        <div class="c-icon--pagination__next"></div>
                    </li>
                </ul>
            </div>
        </main>

<?php get_footer(); ?>