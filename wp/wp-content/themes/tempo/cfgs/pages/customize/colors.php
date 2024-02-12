<?php

	/**
	 *	Appearance / Customize / Colors - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'colors' => array(
			'title' 		=> __( 'Colors', 'tempo' ),
			'description'	=> tempo_free_vs_premium(),
			'priority'      => 15,
			'fields'		=> array(
				'header_textcolor'	=> false,
			),
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
