<?php

    $items = tempo_cfgs::get( 'social' );

    $has_social_items = false;

    foreach( $items as $item ){
        $url = tempo_options::get( $item );
        $has_social_items = $has_social_items || !empty( $item );
    }

    if( tempo_options::get( 'display-rss' ) ){
        $rss = tempo_options::get( 'rss' );

        $has_social_items = $has_social_items || !empty( $rss );
    }

    if( !$has_social_items )
        return;
?>

    <!-- social items wrapper -->
    <div class="tempo-social">

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>


                        <!-- social items content -->
                        <div <?php echo tempo_full_class(); ?>>

                            <?php
                                foreach( $items as $item ){
                                    $url = tempo_options::get( $item );

                                    if( !empty( $url ) ){
                                        echo '<a href="' . esc_url( $url ) . '" class="tempo-icon-' . esc_attr( $item ) . '" target="_blank" rel="nofollow"></a>';
                                    }
                                }

                                if( tempo_options::get( 'display-rss' ) ){
                                    $rss = tempo_options::get( 'rss' );

                                    if( !empty( $rss ) ){
                                        echo '<a href="' . esc_url( $rss ) . '" class="tempo-icon-rss" target="_blank" rel="nofollow"></a>';
                                    }
                                }
                            ?>

                        </div><!-- end social items content -->


                    </div>
                </div><!-- content -->

            </div>
        </div><!-- container -->

    </div><!-- end social items wrapper -->
