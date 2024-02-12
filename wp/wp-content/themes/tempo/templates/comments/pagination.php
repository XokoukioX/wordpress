<?php
    $args = array(
        'echo'      => false,
        'prev_text' => sprintf( __( '%1$s Prev' , 'tempo' ) , '<i class="tempo-icon-left-open-1"></i>' ),
        'next_text' => sprintf( __( 'Next %1$s' , 'tempo' ) , '<i class="tempo-icon-right-open-1"></i>' )
    );

    $pgn = paginate_comments_links( $args );

    /* WORDPRESS PAGINATION FOR COMMENTS */
    if( !empty( $pgn ) ){
        echo '<div class="pagination aligncenter comments">';
        echo '<nav class="tempo-nav-inline">';
        echo $pgn;
        echo '</nav>';
        echo '</div>';
    }
?>
