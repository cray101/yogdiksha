<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>gsearch/">
	<label>
		<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
		<input type="hidden" name="cx" value="009916347540183123834:szl_ul-5vzm" />
		<input type="search" class="search-field" placeholder="Search.." name="q" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
	</label>
	<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
</form>
