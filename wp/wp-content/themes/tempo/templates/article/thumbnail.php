<?php
    global $post;

    $cols       = 1;
    $col_class  = esc_attr( apply_filters( 'zeon_columns_size_class', null ) );

    if( !empty( $col_class ) )
        $cols = 3;

    if( $col_class == 'col-lg-6' )
        $cols = 2;

	$thumbnail          = get_post( get_post_thumbnail_id( $post ) );
    $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

    if( !$has_post_thumbnail )
        return;


    echo '<div class="tempo-thumbnail-wrapper">';


    /**
     *  Image Thumbnail Image
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

    $picture  = '';

    if( $cols == 1 ){
        $picture  = '<picture>';
        $picture .= '<source media="(min-width: 768px)"     srcset="' . esc_url( $media[ 0 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 521px)"     srcset="' . esc_url( $media[ 1 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 481px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 421px)"     srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 316px)"     srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 1px)"       srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

        $picture .= '<img src="' . esc_url( $media[ 0 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $post ) ) . '">';
        $picture .= '</picture>';
    }

    else if( $cols == 2 ){

        $picture  = '<picture>';
        $picture .= '<source media="(min-width: 992px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 768px)"     srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 521px)"     srcset="' . esc_url( $media[ 1 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 481px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 421px)"     srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 316px)"     srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 1px)"       srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';
        $picture .= '<img src="' . esc_url( $media[ 2 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $post ) ) . '">';
        $picture .= '</picture>';
    }

    else{
        $picture  = '<picture>';
        $picture .= '<source media="(min-width: 1621px)"    srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 1200px)"    srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 992px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 768px)"     srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 521px)"     srcset="' . esc_url( $media[ 1 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 481px)"     srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 421px)"     srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 316px)"     srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
        $picture .= '<source media="(min-width: 1px)"       srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';
        $picture .= '<img src="' . esc_url( $media[ 2 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $post ) ) . '">';
        $picture .= '</picture>';
    }

    echo apply_filters( 'tempo_article_picture', $picture, $post, $cols, $media );


    /**
     *  Thumbnail Permalink ( go to single post )
     */

    echo '<a href="' . esc_url( get_permalink( $post ) ) . '" class="tempo-flex-container" title="' . esc_attr( get_the_title( $post ) ) . '">';
    echo '</a>';

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
