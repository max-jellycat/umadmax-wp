<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package U_Mad_Max_?
 *
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'u-mad-max' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Farfouiller &hellip;', 'placeholder', 'u-mad-max' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'u-mad-max' ); ?>" />
	</label>
</form>
