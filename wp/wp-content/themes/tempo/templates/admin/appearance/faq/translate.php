<?php $slug = tempo_core::theme( 'TextDomain' ); ?>

<p><?php printf( __( 'The theme is %1$s but not contain the translated files for each language.', 'tempo' ), '<b>' . esc_html__( 'Translation Ready', 'tempo' ) . '</b>' ); ?></p>
<p><?php printf( __( 'So, you can translate the theme in your favorite language. More details about %1$s you can find %2$s.', 'tempo' ), '<b>' . esc_html__( 'Localization', 'tempo' ) . '</b>', '<a href="https://developer.wordpress.org/themes/functionality/localization/#pot-portable-object-template-files" target="_blank">' . esc_html__( 'here', 'tempo' ) . '</a>' ); ?></p>

<p><big><strong><?php esc_html_e( 'Theme languages details', 'tempo' ); ?></strong></big></p>

<p><?php printf( __( 'After you will unzip the archive %1$s you must have folder %2$s with theme files. Go to %3$s here you can see file %3$s ( Portable Object Template ).', 'tempo' ), '<b>' . esc_html( $slug ) . '.zip</b>', '<b>' . esc_html( $slug ) . '</b>', '<b>' . esc_html( $slug ) . '/languages/</b>', '<b>' . esc_html( $slug ) . '.pot</b>' ); ?></p>
