<?php
    global $post;

    $thumbnail          = get_post( get_post_thumbnail_id( $post ) );
    $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

    if( !apply_filters( 'tempo_post_thumbnail', $has_post_thumbnail, $post -> ID ) )
        return;


    echo '<div class="tempo-thumbnail-wrapper">';


    /**
     *  Thumbnail Image
     */

    echo '<div class="tempo-image-wrapper overflow-hidden">';

    $media = array(
        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-classic' ),

        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-tablet' ),

        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-grid' ),

        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-480' ),

        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-gallery' ),

        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-small' )
    );

    $picture  = '<picture>';
    $picture .= '<source media="(min-width: 768px)"     srcset="' . esc_url( $media[ 0 ][ 0 ] ) . '">';
    $picture .= '<source media="(min-width: 521px)"     srcset="' . esc_url( $media[ 1 ][ 0 ] ) . '">';
    $picture .= '<source media="(min-width: 481px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
    $picture .= '<source media="(min-width: 421px)"     srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
    $picture .= '<source media="(min-width: 316px)"     srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
    $picture .= '<source media="(min-width: 1px)"       srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

    $picture .= '<img src="' . esc_url( $media[ 0 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $post ) ) . '">';
    $picture .= '</picture>';


    echo apply_filters( 'tempo_single_picture', $picture, $post, $media );


    echo '</div>';


    /**
     *  Thumbnail Caption
     */

    $caption = isset( $thumbnail -> post_excerpt ) ? strip_tags( $thumbnail -> post_excerpt ) : null;

    if( !empty( $caption ) ){
        echo '<div class="tempo-caption-wrapper">';
        echo '<p>' . esc_html( $caption ) . '</p>';
        echo '</div>';
    }

    echo '</div>';
?>
