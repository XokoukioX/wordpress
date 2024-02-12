<?php
if( !class_exists( 'tempo_gallery' ) ){

class tempo_gallery
{
	static function shortcode( $rett, $_attr )
	{
        if( !tempo_options::get( 'gallery-style' ) )
            return null;

		global $post;

        $attr = shortcode_atts( array(
            'order'                 => 'ASC',
            'orderby'               => 'menu_order ID',
            'id'                    => $post -> ID,
            'ids'                   => '',
            'itemtag'               => 'dl',
            'icontag'               => 'dt',
            'captiontag'            => 'dd',
            'columns'               => 3,
            'size'                  => 'thumbnail',
            'include'               => '',
            'exclude'               => '',
            'style'    				=> 'default'
        ) , $_attr );

        $cols = $attr[ 'columns' ];
		$style 	= $attr[ 'style' ];
        $ids = array();

        if( empty( $attr[ 'ids' ] ) ){

            $id         = intval( $attr[ 'id' ] );
            $orderby    = $attr[ 'order' ];
            $order      = $attr[ 'order' ];
            $include    = $attr[ 'include' ];
            $exclude    = $attr[ 'exclude' ];

            if ( 'RAND' == $attr[ 'order' ] ) {
                $orderby = 'none';
            }

            if ( !empty( $include ) ) {
                $attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } elseif ( !empty( $exclude ) ) {
                $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
            } else {
                $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
            }

            foreach ( $attachments as $key => $val ) {
                $ids[ ] = $val -> ID ;
            }
        }else{
            $ids = explode( ',' , $attr[ 'ids' ] );
        }

		$classes = esc_attr( 'tempo-gallery tempo-gallery-colls-' . absint( $cols ) );

		if( $style !== 'default' )
			$classes = trim( 'tempo-gallery tempo-gallery-colls-' . absint( $cols ) . ' ' . esc_attr( $attr[ 'style' ] ) );

		$rett  = '<div class="' . esc_attr( $classes ) . '">';

        foreach( $ids as $id ){

            $thumbnail = get_post( $id );

            if( !isset( $thumbnail -> ID ) ){
            	continue;
            }

			$media = array(
				// 0, default width: 991px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-classic' ),

				// 1, default width: 785px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-tablet' ),

				// 2, default width: 525px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-grid' ),

				// 3, default width: 480px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-480' ),

				// 4, default width: 420px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-gallery' ),

				// 5, default width: 315px
		        wp_get_attachment_image_src( $thumbnail -> ID , 'tempo-small' ),
		    );

			$picture = '';

		    if( $cols == 1 ){
		        $picture .= '<picture>';
		        $picture .= '<source media="(min-width: 768px)"		srcset="' . esc_url( $media[ 0 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 521px)"		srcset="' . esc_url( $media[ 1 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 481px)"		srcset="' . esc_url( $media[ 2 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 421px)"		srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 316px)"		srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 1px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

		        $picture .= '<img src="' . esc_url( $media[ 0 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '"/>';
		        $picture .= '</picture>';
		    }

			else if( $cols == 2 ){
				$picture .= '<picture>';
		        $picture .= '<source media="(min-width: 992px)"		srcset="' . esc_url( $media[ 3 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 768px)"		srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
		        $picture .= '<source media="(min-width: 1px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

		        $picture .= '<img src="' . esc_url( $media[ 3 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '"/>';
		        $picture .= '</picture>';
			}

			else if( $cols == 3 ){
				$picture .= '<picture>';
				$picture .= '<source media="(min-width: 481px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 316px)"		srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 1px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

		        $picture .= '<img src="' . esc_url( $media[ 5 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '"/>';
		        $picture .= '</picture>';
			}

			else if( $cols == 4 ){
				$picture .= '<picture>';
				$picture .= '<source media="(min-width: 481px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 316px)"		srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 1px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

		        $picture .= '<img src="' . esc_url( $media[ 5 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '"/>';
		        $picture .= '</picture>';
			}

			else{
				$picture .= '<picture>';
				$picture .= '<source media="(min-width: 481px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 316px)"		srcset="' . esc_url( $media[ 4 ][ 0 ] ) . '">';
				$picture .= '<source media="(min-width: 1px)"		srcset="' . esc_url( $media[ 5 ][ 0 ] ) . '">';

				$picture .= '<img src="' . esc_url( $media[ 5 ][ 0 ] ) . '" alt="' . esc_attr( get_the_title( $thumbnail ) ) . '"/>';
				$picture .= '</picture>';
			}


			$picture 	= apply_filters( 'tempo_gallery_picture', $picture, $thumbnail, $cols, $media );
			$item 		= apply_filters( 'tempo_gallery_item', null, $picture, $thumbnail, $attr );

			if( empty( $item ) ){
				$rett .= '<figure class="tempo-gallery-item">';
				$rett .= '<div class="tempo-gallery-thumbnail">' . $picture . '</div>';

				$rett .= '<figcaption>';
				$rett .= '<div class="tempo-gallery-content">';

				if( !empty( $thumbnail -> post_title ) ){
					$rett .= '<div class="tempo-gallery-title">' . apply_filters( 'tempo_gallery_title', get_the_title( $thumbnail ), $thumbnail ) . '</div>';
				}

				$excerpt = strip_tags( $thumbnail -> post_excerpt );

				if( !empty( $excerpt ) ){
					$rett .= '<div class="tempo-gallery-caption">' . strip_tags( $thumbnail -> post_excerpt ) . '</div>';
				}

				$rett .= '</div>';
				$rett .= '</figcaption>';

				$rett .= '</figure>';
			}
			else{
				$rett .= $item;
			}
        }

        $rett .= '<div class="clearfix clear"></div>';
        $rett .= '</div>';

        return $rett;
	}
}

}   /* END IF CLASS EXISTS */
?>
