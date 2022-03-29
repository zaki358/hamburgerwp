<form class="p-header__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="p-header__form__search">
        <input class="c-form--header__text" type="search" name="s" id="s" value="<?php if(get_search_query()) echo get_search_query() ?>" placeholder="ハンバーガー名を検索">
    </div>
    <input class="c-form--header__submit" type="submit" value="検索">
</form>