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
            <?php  //$cats = get_the_category();
            //echo $cats[0]->cat_name;
            ?>
            <?php single_cat_title(); ?>
        </h3>
        <p class="p-description__text--archive">
            <?php echo category_description(); ?>
        </p>
    </section>




    <?php
        if (have_posts()):
        while (have_posts()) :the_post(); ?>

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
        ?> <p>表示する記事がありません</p> <?php
    endif;
    ?>


    <div class="p-pagination">
        <p class="c-text--page">page</p>
        
        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

    </div>

</main>

<?php get_footer(); ?>

<!--<p class="c-text--page">page</p>
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
        </ul> -->

<?php //the_posts_pagination(
//array(
//'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
//'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
//'prev_text'     => __('前へ'), // 「前へ」リンクのテキスト
//'next_text'     => __('次へ'), // 「次へ」リンクのテキスト
//'type'          => 'list', // 戻り値の指定 (plain/list)
//)
//); 
?>



<!--<ul class="p-pagination__list u-margin--pagination__list">
    <?php
    //if (function_exists('pagenation')) { // 関数が定義されていたらtrueになる
    //pagination();
    //} 
    ?>-->