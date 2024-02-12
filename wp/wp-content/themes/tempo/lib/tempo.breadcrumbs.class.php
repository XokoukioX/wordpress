<?php
if( !class_exists( 'tempo_breadcrumbs' ) ){

class tempo_breadcrumbs
{
	static function home()
    {
        $rett  = '<li id="home-text">';
        $rett .= '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( tempo_options::get( 'breadcrumbs-home-description' ) ) . '">';
        $rett .= '<i class="tempo-icon-home-5"></i> <span>' . tempo_options::get( 'breadcrumbs-home-text' ) . '</span>';
        $rett .= '</a>';
        $rett .= '</li>';

        return $rett;
    }

    static function categories( $c_id )
	{
		$rett = '';

		$c = get_category( $c_id );

		if( isset( $c -> category_parent ) && $c -> category_parent > 0 ){
			$rett .= self::categories( $c -> category_parent );
		}

		$category_link = get_category_link( $c -> term_id );

		if( is_wp_error( $category_link ) ){
			return '';
		}

		if( is_category( $c -> term_id ) ){
			$rett .= '<li>' . esc_html( $c -> name ) . '</li>';
		}
		else{
			$rett .= '<li>';
			$rett .= '<a href="' . esc_url( $category_link ) . '" title="' . sprintf( __( 'See articles from category - %1$s' , 'tempo' ), esc_attr( $c -> name ) ) . '">' . esc_html( $c -> name ) . '</a>';
			$rett .= '</li>';
		}

		return $rett;
	}

	static function terms( $t_id, $tax )
	{
		$rett = '';

		$t = get_term( $t_id );

		if( isset( $t -> parent ) && $t -> parent > 0 ){
			$rett .= self::terms( $t -> parent, $tax );
		}

		$link = get_term_link( $t -> term_id );

		if( is_wp_error( $link ) ){
			return '';
		}

		if( is_tax( $tax, $t -> term_id ) ){
			$rett .= '<li>' . esc_html( $t -> name ) . '</li>';
		}
		else{
			$rett .= '<li>';
			$rett .= '<a href="' . esc_url( $link ) . '" title="' . sprintf( __( 'See articles from - %1$s' , 'tempo' ), esc_attr( $t -> name ) ) . '">' . esc_html( $t -> name ) . '</a>';
			$rett .= '</li>';
		}

		return $rett;
	}

	static function pages( $p )
	{
        $rett = '';

        if( isset( $p -> post_parent ) && $p -> post_parent > 0 ){
            $parent = get_post( $p -> post_parent );
            $rett .= self::pages( $parent );
        }

        if( !is_page( $p -> ID  ) ){
            $rett .= '<li>';
            $rett .= '<a href="' . esc_url( get_permalink( $p ) ) . '" title="' . esc_attr( get_the_title( $p ) ) . '">' .  get_the_title( $p ) . '</a>';
            $rett .= '</li>';
        }

        return $rett;
    }

    static function count( $query )
    {
        $query 	= apply_filters( 'tempo_breadcrumbs_counter_query', $query );
		$nr 	= absint( $query -> found_posts );
		$label 	= sprintf( __( '%1$s Articles', 'tempo' ), $nr );

		if( $nr == 1 )
    		$label = __( 'One Article', 'tempo' );

		if( is_search() ){
			$label 	= sprintf( __( '%1$s Results', 'tempo' ), $nr );

			if( $nr == 1 )
	    		$label = __( 'One Result', 'tempo' );
		}

        return '<span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( $nr ) . '</span>' ) . '</span>';
    }
}

}   /* END IF CLASS EXISTS */
?>
