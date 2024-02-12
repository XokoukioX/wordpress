<?php
	/**
	 *	All functions, actions and filters to customize the Header
	 */

	// HEADER MASK STYLE
	function tempo_header_mask_style( $style, $options )
	{
		$hex	= tempo_validator::color( $options[ 'color' ] );
		$transp	= absint( $options[ 'transp' ] );
		$rgba	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
		$style	= 'background-color: ' . esc_attr( $rgba ) . ';';

		return $style;
	}

	add_filter( 'tempo_header_mask_style', 'tempo_header_mask_style', 10, 2 );

?>
