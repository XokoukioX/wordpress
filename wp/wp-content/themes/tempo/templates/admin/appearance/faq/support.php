<div class="tempo-center tempo-support">
	<a href="<?php echo esc_url( tempo_core::theme( 'uri' ) ); ?>" class="tempo-button large-button" target="_blank" title="<?php echo esc_attr( tempo_core::theme( 'description' ) ); ?>"><?php esc_html_e( 'Theme Details', 'tempo' ); ?></a>
	<a href="<?php echo esc_url( tempo_core::theme( 'support' ) ); ?>" class="tempo-button large-button" target="_blank" title="<?php printf( esc_attr__( '%1$s - %2$s Support', 'tempo' ), esc_attr( tempo_core::author( 'name' ) ), esc_attr( tempo_core::theme( 'Name' ) ) ); ?>"><?php esc_html_e( 'Support', 'tempo' ); ?></a>
	<a href="<?php echo esc_url( tempo_core::theme( 'bug-report' ) ); ?>" class="tempo-button large-button" target="_blank" title="<?php printf( esc_attr__( '%1$s - %2$s bug Report', 'tempo' ), esc_attr( tempo_core::author( 'name' ) ), esc_attr( tempo_core::theme( 'Name' ) ) ); ?>"><?php esc_html_e( 'Bug Report', 'tempo' ); ?></a>
</div>
