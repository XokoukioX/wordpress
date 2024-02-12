<?php

    $name = tempo_core::theme( 'Name' );
    $slug = tempo_core::theme( 'TextDomain' );

    /**
     *	Author Config
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'author' ), array(
        'name'			=> 'myThem.es',
        'description'	=> __( 'myThem.es Marketplace provides WordPress themes with the best quality and the smallest prices.', 'tempo' ),
        'uri'			=> 'http://mythem.es/',
        'contact'		=> 'http://mythem.es/contact/'
    ));

    tempo_cfgs::set( 'author', $cfgs );


    /**
     *	Theme Config
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'themes' ), array(

        'Tempo'		=> array(
            'description'       => __( 'Tempo is a clean white and free WordPress theme mainly focused on blogging websites.', 'tempo' ),
            'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/',
            'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/',
            'support'	        => 'http://mythem.es/forums/forum/themes/tempo/',
        ),

        'Cronus'	=> array(
            'description'       => __( 'Cronus is a free WordPress child Theme that extends the Tempo free WordPress theme.', 'tempo' ),
            'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/',
            'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/',
            'support'           => 'http://mythem.es/forums/forum/themes/cronus/',
        ),

        'Sarmys'	=> array(
            'description'       => __( 'Sarmys is a free WordPress child Theme that extends the Tempo free WordPress theme.', 'tempo' ),
            'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/',
            'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/',
            'support'           => 'http://mythem.es/forums/forum/themes/sarmys/'
        ),

        'Gardener'	=> array(
            'description'       => __( 'Gardener is a free WordPress child Theme that extends the Tempo free WordPress theme.', 'tempo' ),
            'uri'				=> 'http://mythem.es/item/gardener/',
            'premium'           => 'http://mythem.es/item/gardener-pro/',
            'support'           => 'http://mythem.es/forums/forum/themes/gardener/',
        )
    ));

    foreach( $cfgs as $theme => $args ){
        if( $theme == $name ){

            $source = $slug;

            if( tempo_core::is_active_premium() )
                $source .= '-pro';

            $uri 		= $args[ 'uri' ];
            $support	= $args[ 'support' ];
            $contact 	= tempo_core::author( 'contact' );

            $cfgs[ $theme ][ 'uri' ] 			= esc_url( $uri . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=theme-details' );
            $cfgs[ $theme ][ 'uri-version' ] 	= esc_url( $uri . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=version' );

            $cfgs[ $theme ][ 'support' ] 		= esc_url( $support . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=support' );
            $cfgs[ $theme ][ 'contact' ] 		= esc_url( $contact . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=contact' );
            $cfgs[ $theme ][ 'bug-report' ] 	= esc_url( $contact . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=bug-report' );

            $cfgs[ $theme ][ 'wordpress' ]		= esc_url( '//wordpress/themes/' . esc_attr( $slug ) . '/' );

            if( isset( $args[ 'premium' ] ) ){
                $premium	= $args[ 'premium' ];

                $cfgs[ $theme ][ 'premium' ] 			= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=customizer&utm_campaign=analiza-tema&utm_content=button' );
                $cfgs[ $theme ][ 'premium-header' ] 	= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=header' );
                $cfgs[ $theme ][ 'premium-version' ]    = esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=version' );
                $cfgs[ $theme ][ 'premium-link' ] 		= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=link' );
                $cfgs[ $theme ][ 'premium-image' ] 		= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=image' );
                $cfgs[ $theme ][ 'premium-features' ] 	= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=features' );
                $cfgs[ $theme ][ 'premium-button' ] 	= esc_url( $premium . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=button' );
            }
        }
    }

    tempo_cfgs::set( 'themes', $cfgs );

    /**
     *	Author Reset Config
     */

    $cfgs = (array)tempo_cfgs::get( 'author' );

    $source = $slug;

    if( tempo_core::is_active_premium() )
        $source .= '-pro';

    $cfgs[ 'uri-title' ] 		=  esc_url( tempo_core::author( 'uri' ) . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=mythemes-title' );
    $cfgs[ 'uri-description' ] 	=  esc_url( tempo_core::author( 'uri' ) . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=mythemes-description' );
    $cfgs[ 'contact' ] 			=  esc_url( tempo_core::author( 'contact' ) . '?utm_source=' . $source . '&utm_medium=faq&utm_campaign=analiza-tema&utm_content=mythemes-contact' );

    tempo_cfgs::set( 'author', $cfgs );
?>
