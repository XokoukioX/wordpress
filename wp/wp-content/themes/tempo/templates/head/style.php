<?php
    $bg_color   = esc_attr( get_theme_mod( 'background_color', '#e5e5e5' ) );
    $bg_image   = esc_url( get_theme_mod( 'background_image' ) );
?>

<style type="text/css" id="background">
    body{
        background-color: <?php echo esc_attr( $bg_color ); ?>;

        <?php
            if( !empty( $bg_image ) ){
        ?>
                background-image: url(<?php echo esc_url( $bg_image ); ?>);
                background-repeat: <?php echo esc_attr( get_theme_mod( 'background_repeat' , 'repeat' ) ); ?>;
                background-position: <?php echo esc_attr( get_theme_mod( 'background_position_x' , 'center' ) ); ?>;
                background-attachment: <?php echo esc_attr( get_theme_mod( 'background_attachment' , 'fixed' ) ); ?>;
        <?php
            }
        ?>
    }
</style>

<?php do_action( 'tempo_style_child' ); ?>

<style type="text/css" id="hyphens">
    <?php if( tempo_options::is_set( 'hyphens' ) ) : ?>

        <?php if( tempo_options::get( 'hyphens' ) ) : ?>
            *{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'header-hyphens' ) && tempo_options::get( 'header-hyphens' ) ) : ?>
            div.tempo-header-partial{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php else : ?>
            div.tempo-header-partial{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php else : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'content-hyphens' ) && tempo_options::get( 'content-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>

        <?php else : ?>
            .hentry{
                -webkit-hyphens: none;
                   -moz-hyphens: none;
                        hyphens: none;
            }
        <?php endif; ?>


    <?php else : ?>

        <?php if( tempo_options::is_set( 'header-hyphens' ) && tempo_options::get( 'header-hyphens' ) ) : ?>
            div.tempo-header-partial{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) : ?>
            h1, h2, h3, h4, h5, h6{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }
        <?php endif; ?>

        <?php if( tempo_options::is_set( 'content-hyphens' ) && tempo_options::get( 'content-hyphens' ) ) : ?>
            .hentry{
                -webkit-hyphens: auto;
                   -moz-hyphens: auto;
                        hyphens: auto;
            }

            <?php if( !( tempo_options::is_set( 'headings-hyphens' ) && tempo_options::get( 'headings-hyphens' ) ) ) : ?>
                .hentry h1,
                .hentry h2,
                .hentry h3,
                .hentry h4,
                .hentry h5,
                .hentry h6{
                    -webkit-hyphens: none;
                       -moz-hyphens: none;
                            hyphens: none;
                }
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
</style>

<?php

    /**
     *  This hook allow enable and disable
     *  default site indentity custom style
     */

    if( apply_filters( 'tempo_site_identity_style', true ) ) : ?>

        <style type="text/css" id="site-title-color">
            <?php
                if( tempo_options::is_set( 'site-title-color' ) ||
                    tempo_options::is_set( 'site-title-transp' ) ||
                    tempo_options::is_set( 'site-title-h-color' ) ) :

                    $hex        = tempo_options::get( 'site-title-color' );
                    $transp     = tempo_options::get( 'site-title-transp' );
                    $transp_h   = tempo_options::get( 'site-title-h-transp' );

                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
                    $rgba_h     = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp_h / 100 ), 2 ) . ' )';
            ?>
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-title{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-title:hover{
                        color: <?php echo esc_attr( $rgba_h ); ?>;
                    }

            <?php endif; ?>
        </style>

        <style type="text/css" id="tagline-color">
            <?php
                if( tempo_options::is_set( 'tagline-color' ) ||
                    tempo_options::is_set( 'tagline-transp' ) ||
                    tempo_options::is_set( 'tagline-h-color' ) ) :

                    $hex        = tempo_options::get( 'tagline-color' );
                    $transp     = tempo_options::get( 'tagline-transp' );
                    $transp_h   = tempo_options::get( 'tagline-h-transp' );

                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
                    $rgba_h     = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp_h / 100 ), 2 ) . ' )';
            ?>

                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-description{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }
                    header.tempo-header div.tempo-topper div.tempo-site-identity a.tempo-site-description:hover{
                        color: <?php echo esc_attr( $rgba_h ); ?>;
                    }

            <?php endif; ?>
        </style>

<?php endif; ?>

<?php

    /**
     *  This hook allow enable and disable
     *  default menu custom style
     */

    if( apply_filters( 'tempo_menu_style', true ) ) : ?>

        <style type="text/css" id="menu-link-color">
            <?php
                if( tempo_options::is_set( 'menu-link-color' ) ||
                    tempo_options::is_set( 'menu-link-transp' ) ) :

                    $hex        = tempo_options::get( 'menu-link-color' );
                    $transp     = tempo_options::get( 'menu-link-transp' );
                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
            ?>
                    header.tempo-header nav ul li a,
                    header.tempo-header nav button.tempo-btn-collapse{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }

            <?php endif; ?>
        </style>

        <style type="text/css" id="menu-link-h-color">
            <?php
                if( tempo_options::is_set( 'menu-link-h-color' ) ||
                    tempo_options::is_set( 'menu-link-h-transp' ) ) :

                    $hex        = tempo_options::get( 'menu-link-h-color' );
                    $transp     = tempo_options::get( 'menu-link-h-transp' );
                    $rgba       = 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
            ?>

                    header.tempo-header nav ul li.current-menu-ancestor > a,
                    header.tempo-header nav ul li.current-menu-item > a,
                    header.tempo-header nav ul li:hover > a,
                    header.tempo-header nav button.tempo-btn-collapse:hover{
                        color: <?php echo esc_attr( $rgba ); ?>;
                    }

            <?php endif; ?>
        </style>

<?php endif; ?>

<style type="text/css" id="header-bkg-color">
    <?php if( tempo_options::is_set( 'header-bkg-color' ) ) :  ?>

        div.tempo-header-partial{
            background-color: <?php echo tempo_options::get( 'header-bkg-color' ); ?>;
        }

    <?php endif; ?>
</style>

<?php
    $headers = (array)tempo_cfgs::get( 'headers' );
?>

<style type="text/css" id="header-top-space">
    <?php
        if( tempo_options::is_set( 'header-top-space' ) ) :
            $top = tempo_options::get( 'header-top-space' );
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-content{
                padding-top: <?php echo absint( $top ); ?>px;
            }

            @media (max-width: 991px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-top: <?php echo absint( 991 * $top/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }

            @media (max-width: 767px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-top: <?php echo absint( 767 * $top/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }
            @media (max-width: 520px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-top: <?php echo absint( 520 * $top/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }
            @media (max-width: 480px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-top: <?php echo absint( 480 * $top/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }

    <?php endif; ?>
</style>

<style type="text/css" id="header-bottom-space">
    <?php
        if( tempo_options::is_set( 'header-bottom-space' ) ) :
            $bottom = tempo_options::get( 'header-bottom-space' );
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-content{
                padding-bottom: <?php echo absint( $bottom ); ?>px;
            }

            @media (max-width: 991px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-bottom: <?php echo absint( 991 * $bottom/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }

            @media (max-width: 767px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-bottom: <?php echo absint( 767 * $bottom/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }
            @media (max-width: 520px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-bottom: <?php echo absint( 520 * $bottom/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }

            @media (max-width: 480px ){
                header.tempo-header div.tempo-header-partial .tempo-header-content{
                    padding-bottom: <?php echo absint( 480 * $bottom/absint( $headers[ 'width' ] ) ); ?>px;
                }
            }

    <?php endif; ?>
</style>

<style type="text/css" id="header-buttons-space">
	<?php
		if( tempo_options::is_set( 'header-buttons-space' ) ) :

	        $space	= tempo_options::get( 'header-buttons-space' );
	?>
			header.tempo-header div.tempo-header-partial .tempo-header-text + .tempo-header-buttons{
				padding-top: <?php echo absint( $space ) ?>px;
			}
			@media (max-width: 991px ){
				header.tempo-header div.tempo-header-partial .tempo-header-text + .tempo-header-buttons{
					padding-top: <?php echo absint( $space * 991/absint( $headers[ 'width' ] ) ) ?>px;
				}
	        }
	        @media (max-width: 767px ){
				header.tempo-header div.tempo-header-partial .tempo-header-text + .tempo-header-buttons{
					padding-top: <?php echo absint( $space * 767/absint( $headers[ 'width' ] ) ) ?>px;
				}
	        }
	        @media (max-width: 520px ){
				header.tempo-header div.tempo-header-partial .tempo-header-text + .tempo-header-buttons{
					padding-top: <?php echo absint( $space * 520/absint( $headers[ 'width' ] ) ) ?>px;
				}
	        }
			@media (max-width: 480px ){
				header.tempo-header div.tempo-header-partial .tempo-header-text + .tempo-header-buttons{
					padding-top: <?php echo absint( $space * 480/absint( $headers[ 'width' ] ) ) ?>px;
				}
			}

	<?php endif;?>
</style>

<style type="text/css" id="header-mask-color">
    <?php
        $header_mask_is_set = tempo_options::is_set( 'header-mask-color' ) || tempo_options::is_set( 'header-mask-transp' );
        if( apply_filters( 'tempo_header_mask_is_set', $header_mask_is_set ) ) :

            $mask_color         = tempo_options::get( 'header-mask-color' );
            $mask_transp        = tempo_options::get( 'header-mask-transp' );
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-mask{
                <?php
                    echo apply_filters( 'tempo_header_mask_style', null, array(
                        'color'     => $mask_color,
                        'transp'    => $mask_transp
                    ));
                ?>
            }

    <?php endif; ?>
</style>

<style type="text/css" id="header-headline-color">
    <?php if( tempo_options::is_set( 'header-headline-color' ) ) :  ?>

        header.tempo-header div.tempo-header-partial .tempo-header-headline{
            color: <?php echo tempo_options::get( 'header-headline-color' ); ?>;
        }

    <?php endif; ?>
</style>

<style type="text/css" id="header-description-color">
    <?php
        if( tempo_options::is_set( 'header-description-color' ) ) :

            $hex    = tempo_options::get( 'header-description-color' );
            $rgba1  = 'rgba( ' . tempo_hex2rgb( $hex ) . ', 0.8 )';
            $rgba2  = 'rgba( ' . tempo_hex2rgb( $hex ) . ', 1.0 )';
    ?>
            header.tempo-header div.tempo-header-partial .tempo-header-description{
                color: <?php echo esc_attr( $rgba1 ); ?>;
            }
            header.tempo-header div.tempo-header-partial .tempo-header-description:hover{
                color: <?php echo esc_attr( $rgba2 ); ?>;
            }

    <?php endif; ?>
</style>


<!-- BUTTONS -->
<!-- HEADER BUTTON 1 -->
<style type="text/css" id="header-btn-1-text-color">
	<?php
		if( tempo_options::is_set( 'header-btn-1-text-color' ) ||
		 	tempo_options::is_set( 'header-btn-1-text-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-1-text-color' );
			$transp = tempo_options::get( 'header-btn-1-text-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-1{
				color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-1-text-h-color">
	<?php
		if( tempo_options::is_set( 'header-btn-1-text-h-color' ) ||
		 	tempo_options::is_set( 'header-btn-1-text-h-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-1-text-h-color' );
			$transp = tempo_options::get( 'header-btn-1-text-h-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-1:hover{
				color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-1-bkg-color">
	<?php
		if( tempo_options::is_set( 'header-btn-1-bkg-color' ) ||
		 	tempo_options::is_set( 'header-btn-1-bkg-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-1-bkg-color' );
			$transp = tempo_options::get( 'header-btn-1-bkg-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-1{
				background-color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-1-bkg-h-color">
	<?php
		if( tempo_options::is_set( 'header-btn-1-bkg-h-color' ) ||
		 	tempo_options::is_set( 'header-btn-1-bkg-h-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-1-bkg-h-color' );
			$transp = tempo_options::get( 'header-btn-1-bkg-h-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-1:hover{
				background-color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>


<!-- HEADER BUTTON 2 -->
<style type="text/css" id="header-btn-2-text-color">
	<?php
		if( tempo_options::is_set( 'header-btn-2-text-color' ) ||
		 	tempo_options::is_set( 'header-btn-2-text-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-2-text-color' );
			$transp = tempo_options::get( 'header-btn-2-text-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-2{
				color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-2-text-h-color">
	<?php
		if( tempo_options::is_set( 'header-btn-2-text-h-color' ) ||
		 	tempo_options::is_set( 'header-btn-2-text-h-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-2-text-h-color' );
			$transp = tempo_options::get( 'header-btn-2-text-h-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-2:hover{
				color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-2-bkg-color">
	<?php
		if( tempo_options::is_set( 'header-btn-2-bkg-color' ) ||
		 	tempo_options::is_set( 'header-btn-2-bkg-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-2-bkg-color' );
			$transp = tempo_options::get( 'header-btn-2-bkg-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-2{
				background-color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>

<style type="text/css" id="header-btn-2-bkg-h-color">
	<?php
		if( tempo_options::is_set( 'header-btn-2-bkg-h-color' ) ||
		 	tempo_options::is_set( 'header-btn-2-bkg-h-transp' ) ) :

			$hex 	= tempo_options::get( 'header-btn-2-bkg-h-color' );
			$transp = tempo_options::get( 'header-btn-2-bkg-h-transp' );
			$rgba 	= 'rgba( ' . tempo_hex2rgb( $hex ) . ', ' . number_format( floatval( $transp / 100 ), 2 ) . ' )';
	?>

			header.tempo-header div.tempo-header-partial .tempo-header-buttons .tempo-btn.btn-2:hover{
				background-color: <?php echo esc_attr( $rgba ); ?>;
			}

	<?php endif; ?>
</style>


<style type="text/css" id="menu-mobile-search-box">
	<?php if( tempo_options::is_set( 'mobile-search-box' ) && !tempo_options::get( 'mobile-search-box' ) ) : ?>
		body div.nav-collapse.tempo-navigation-wrapper nav.tempo-navigation form.tempo-search-form{
			display: none;
		}
	<?php endif; ?>
</style>


<style type="text/css" id="breadcrumbs-space">
    <?php
        if( tempo_options::is_set( 'breadcrumbs-space' ) ) :
            $padding = tempo_options::get( 'breadcrumbs-space' );
    ?>
            div.tempo-breadcrumbs div.tempo-container.main{
                padding-top: <?php echo absint($padding); ?>px;
                padding-bottom: <?php echo absint($padding); ?>px;
            }

            @media (max-width: 991px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 991/absint( $headers[ 'width' ] )); ?>px;
                    padding-bottom: <?php echo absint($padding * 991/absint( $headers[ 'width' ] )); ?>px;
                }
            }

            @media (max-width: 767px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 767/absint( $headers[ 'width' ] )); ?>px;
                    padding-bottom: <?php echo absint($padding * 767/absint( $headers[ 'width' ] )); ?>px;
                }
            }

            @media (max-width: 520px ){
                div.tempo-breadcrumbs div.tempo-container.main{
                    padding-top: <?php echo absint($padding * 520/absint( $headers[ 'width' ] )); ?>px;
                    padding-bottom: <?php echo absint($padding * 520/absint( $headers[ 'width' ] )); ?>px;
                }
            }

    <?php endif; ?>
</style>

<style type="text/css" id="custom-css">
    <?php
        if( tempo_options::is_set( 'custom-css' ) ){
            echo tempo_options::get( 'custom-css' );
        }
    ?>
</style>
