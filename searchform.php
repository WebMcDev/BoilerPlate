<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="search-field" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
    <button type="submit" value="Search" title="Search" alt="Search">
        <span class="dashicons dashicons-search"></span>
    </button>
</form>