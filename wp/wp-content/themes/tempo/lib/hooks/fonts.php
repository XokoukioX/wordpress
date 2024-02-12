<?php
	/**
	 *	All functions, actions and filters to customize the Custom Fonts Features
	 */

	/**
	 *  Change Panel Priority for the plugin Easy Google Fonts
	 */

	function tempo__get_panels( $panels ){
		if( isset( $panels[ 'tt_font_typography_panel' ] ) && is_array( $panels[ 'tt_font_typography_panel' ] ) )
			$panels[ 'tt_font_typography_panel' ][ 'priority' ] = 56;

		return $panels;
	}

	add_filter( 'tt_font_get_panels', 'tempo__get_panels' );
?>
