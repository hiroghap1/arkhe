<form role="search" method="get" class="c-searchForm" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="text" value="" name="s" class="c-searchForm__s s"
		placeholder="<?php esc_attr_e( 'Search', 'arkhe' ); ?>..."
		aria-label="<?php esc_attr_e( 'Search word', 'arkhe' ); ?>"
	>
	<button type="submit" class="c-searchForm__submit" value="search"
		aria-label="<?php esc_attr_e( 'Search button', 'arkhe' ); ?>"
	></button>
</form>

<button type="button" class="c-closeBtn--search" data-onclick="toggleSearch">
	<i class="arkhe-icon-close"></i><?php esc_html_e( 'CLOSE', 'arkhe' ); ?>
</button>
