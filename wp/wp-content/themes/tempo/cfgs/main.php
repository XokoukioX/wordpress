<?php

	/**
	 *	General config settings
	 */


	/**
	 *	Custom Logo
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-logo' ), array(
        'height'      	=> 70,
        'width'       	=> 235,
        'flex-height' 	=> true,
		'flex-width'  	=> true,
		'header-text'	=> array( 'tempo-site-title', 'tempo-site-description' )
    ));

    tempo_cfgs::set( 'custom-logo', $cfgs );


    /**
     *	Custom Background
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-background' ), array(
        'default-color'         => '',
        'default-image'         => null,
        'default-attachment'    => 'fixed'
	));

	tempo_cfgs::set( 'custom-background', $cfgs );


	/**
     *	Custom Header
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-header' ), array(
        'default-image'			=> get_template_directory_uri() . '/media/img/header.jpg',
        'random-default'		=> true,
        'width'					=> 1170,
        'height'				=> 660,
        'flex-height'			=> true,
        'flex-width'			=> false,
        'default-text-color'	=> '',
        'header-text'			=> false,
        'uploads'				=> true
    ));

    tempo_cfgs::set( 'custom-header', $cfgs );


	/**
	 *	Images Size
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'images-size' ), array(
		'tempo-header' 	=> array(
			'width' 	=> 1170,
			'height'	=> 660,
			'crop' 		=> true
		),
		'tempo-classic' => array(
			'width' 	=> 991,
			'height'	=> 560,
			'crop' 		=> true
		),

		// portfolio picture sources
		'tempo-tablet' 	=> array(
			'width' 	=> 785,
			'height'	=> 445,
			'crop' 		=> true
		),
		'tempo-grid' 	=> array(
			'width' 	=> 525,
			'height'	=> 295,
			'crop' 		=> true
		),
		'tempo-480' 	=> array(
			'width' 	=> 480,
			'height'	=> 270,
			'crop' 		=> true
		),

		'tempo-gallery' => array(
			'width' 	=> 420,
			'height'	=> 240,
			'crop' 		=> true
		),
		'tempo-small' => array(
			'width' 	=> 315,
			'height'	=> 180,
			'crop' 		=> true
		),

		// portfolio picture sources
		'tempo-portfolio-tablet' => array(
			'width' 	=> 785,
			'height'	=> 880,
			'crop' 		=> true
		),
		'tempo-portfolio' => array(
			'width' 	=> 525,
			'height'	=> 590,
			'crop' 		=> true
		),
		'tempo-portfolio-480' 	=> array(
			'width' 	=> 480,
			'height'	=> 538,
			'crop' 		=> true
		)
	));

	tempo_cfgs::set( 'images-size', $cfgs );


	/**
	 *	Headers
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'headers' ), array(
		'width'			=> 1170,
		'min' 			=> 30,
		'mask-color'	=> '#000000',
		'mask-transp'	=> 40,
		'portfolio' 	=> array(
			'top' 			=> 220,
			'bottom'		=> 90
		),
		'hero' 			=> array(
			'top' 			=> 167,
			'bottom'		=> 166
		),
		'audio' 		=> array(
			'top' 			=> 220,
			'bottom'		=> 30
		),
		'gmap'			=> 615
	));

	tempo_cfgs::set( 'headers', $cfgs );

	/**
	 *	Asides Columns
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'asides' ), array(
	   'header-front-page' 	=> 3,
	   'header-blog' 		=> 3,
	   'footer-light' 		=> 3,
	   'footer-dark' 		=> 4
	));

	tempo_cfgs::set( 'asides', $cfgs );


	/**
	 *	Author Copyright
	 */

	 $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'options' ), array(
		 'author-copyright' => array(
			 'input' => array(
				 'type' 		=> 'copyright',
				 'default'		=> sprintf( __( ' Powered by %1$s. Designed by %2$s.' , 'tempo' ) , '<a href="http://wordpress.org/">WordPress</a>', '<a href="' . esc_url( tempo_core::author( 'uri' ) ) . '" target="_blank" title="' . esc_attr( tempo_core::author( 'name' ) ) . '">' . tempo_core::author( 'name' ) . '</a>' )
			 )
		 )
	 ));

	 tempo_cfgs::set( 'options', $cfgs );
?>
