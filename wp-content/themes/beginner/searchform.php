<form method="get" class="searchform" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="field" name="s" id="search" placeholder="<?php esc_attr_e( 'Search', 'beginner' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit" id="searchform-submit" class="fa fa-search"></button>
</form>
