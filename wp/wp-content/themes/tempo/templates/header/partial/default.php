<?php
    if( !tempo_has_header() )
        return;

    $headline           = tempo_options::get( 'header-headline' );
    $headline_text      = tempo_options::get( 'header-headline-text' );
    $headline_url       = tempo_options::get( 'header-headline-url' );
    $headline_title     = tempo_options::get( 'header-headline-title' );
    $headline_target    = tempo_options::get( 'header-headline-target' );


    $description        = tempo_options::get( 'header-description' );
    $description_text   = tempo_options::get( 'header-description-text' );
    $description_url    = tempo_options::get( 'header-description-url' );
    $description_title  = tempo_options::get( 'header-description-title' );
    $description_target = tempo_options::get( 'header-description-target' );

?>
    <div class="<?php echo esc_attr(apply_filters( 'tempo_header_partial_classes', 'tempo-header-partial default-header overflow-wrapper' )); ?>">

        <!-- default header media -->
        <?php the_custom_header_markup(); ?>

        <!-- mask - a transparent foil over the header image -->
        <div class="tempo-header-mask"></div>

        <!-- header content -->
        <div class="tempo-header-content">

            <!-- container -->
        	<div <?php echo tempo_container_class( 'main' ); ?>>
        		<div <?php echo tempo_row_class(); ?>>

        			<!-- content -->
        			<div <?php echo tempo_content_class( null, apply_filters( 'tempo_header_content_classes', 'col-lg-10 col-lg-offset-1' ) ); ?>>
        				<div <?php echo tempo_row_class(); ?>>

                            <!-- full width content length -->
                            <div <?php echo tempo_full_class(); ?>>

                                    <!-- header text -->
                                    <div class="<?php echo esc_attr(apply_filters( 'tempo_header_text_classes', 'tempo-header-text' )); ?>">
                                        <?php
                                            // headline
                                            if( $headline ){
                                                if( !empty( $headline_url ) ){

                                                    if( empty( $headline_title ) )
                                                        $headline_title = $headline_text;

                                                    echo '<a class="tempo-header-headline" href="' . esc_url( $headline_url ) . '" title="' . esc_attr( $headline_title ) . '"';

                                                    if( $headline_target ){
                                                        echo ' target="_blank">';
                                                    }else{
                                                        echo '>';
                                                    }

                                                    echo esc_html( $headline_text );

                                                    echo '</a>';
                                                }

                                                else{
                                                    echo '<h1 class="tempo-header-headline">' . esc_html( $headline_text ) . '</h1>';
                                                }
                                            }

                                            tempo_get_template_part( 'templates/header/partial/content/between-text' );

                                            // description
                                            if( $description ){
                                                if( !empty( $description_url ) ){

                                                    if( empty( $description_title ) )
                                                        $description_title = $description_text;

                                                    echo '<a class="tempo-header-description" href="' . esc_url( $description_url ) . '" title="' . esc_attr( $description_title ) . '"';

                                                    if( $description_target ){
                                                        echo ' target="_blank">';
                                                    }else{
                                                        echo '>';
                                                    }

                                                    echo esc_html( $description_text );

                                                    echo '</a>';
                                                }

                                                else{
                                                    echo '<p class="tempo-header-description">' . esc_html( $description_text ) . '</p>';
                                                }
                                            }
                                        ?>
                                    </div><!-- end header text -->

                                    <?php
                                        // buttons
                                        tempo_get_template_part( 'templates/header/partial/content/buttons' );
                                    ?>

                                </div><!-- end header content -->

                        </div>
    	    		</div><!-- end content -->

    	    	</div>
    		</div><!-- end main content -->

        </div><!-- end full width content length -->

    </div>
