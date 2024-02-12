<?php

	function tempo_add_custom_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id )
	{
		// image base name
		$image_basename = wp_basename( $image_meta['file'] );
		// upload directory info array
		$upload_dir_info_arr = wp_get_upload_dir();
		// base url of upload directory
		$baseurl = $upload_dir_info_arr['baseurl'];

		// Uploads are (or have been) in year/month sub-directories.
		if ( $image_basename !== $image_meta['file'] ) {
			$dirname = dirname( $image_meta['file'] );

			if ( $dirname !== '.' ) {
				$image_baseurl = trailingslashit( $baseurl ) . $dirname;
			}
		}

		$image_baseurl 	= trailingslashit( $image_baseurl );
		$sizes 			= (array)tempo_cfgs::get( 'images-size' );

		if( isset( $size_array[ 0 ] ) && isset( $sizes[ 'tempo-header' ] )  &&
			$size_array[ 0 ] == $sizes[ 'tempo-header' ][ 'width' ] ){

			$sources = array();

			$header_sizes = apply_filters( 'tempo_header_sizes', array(
				'tempo-header',
				'tempo-classic',
				'tempo-tablet',
				'tempo-grid'
			));

			foreach( $header_sizes as $size_name ){
				if( !isset( $sizes[ $size_name ] ) )
					continue;

				$size = $sizes[ $size_name ];

				if( absint( $size_array[ 0 ] ) < absint( $size[ 'width' ] ) )
					continue;

				// check whether our custom image size exists in image meta
				if( array_key_exists( $size_name, $image_meta[ 'sizes' ] ) ){

					// add source value to create srcset
					$sources[ $image_meta[ 'sizes' ][ $size_name ][ 'width' ] ] = array(
							 'url'        => $image_baseurl .  $image_meta[ 'sizes' ][ $size_name ][ 'file' ],
							 'descriptor' => 'w',
							 'value'      => $image_meta[ 'sizes' ][ $size_name ][ 'width' ],
					);
				}
			}

			if( isset( $sizes[ 'tempo-header' ] ) && isset( $sizes[ 'tempo-header' ][ 'width' ] ) && !isset( $sources[ absint( $sizes[ 'tempo-header' ][ 'width' ] ) ] ) ){
				$sources[ $sizes[ 'tempo-header' ][ 'width' ] ] = array(
					'url'			=> $image_baseurl . basename( $image_meta[ 'file' ] ),
					'descriptor'	=> 'w',
					'value' 		=> absint( $sizes[ 'tempo-header' ][ 'width' ] )
				);
			}
		}

		else{
			foreach( $sizes as $size_name => $size ){
				// check whether our custom image size exists in image meta
				if( array_key_exists( $size_name, $image_meta[ 'sizes' ] ) ){
					//unset( $image_meta[ 'sizes' ][ $size_name ][ 'width' ] );
					unset( $sources[ $image_meta[ 'sizes' ][ $size_name ][ 'width' ] ] );
				}
			}
		}

		//return sources with new srcset value
		return $sources;
	}

	add_filter( 'wp_calculate_image_srcset', 'tempo_add_custom_image_srcset', 10, 5 );


	function tempo_max_srcset_image_width( $max_width, $size_array )
	{
		$sizes = (array)tempo_cfgs::get( 'images-size' );

		if( isset( $sizes[ 'tempo-header' ][ 'width' ] ) )
			$max_width = absint( $sizes[ 'tempo-header' ][ 'width' ] );

		return $max_width;
	}

	add_filter( 'max_srcset_image_width', 'tempo_max_srcset_image_width', 10, 2 );
?>
