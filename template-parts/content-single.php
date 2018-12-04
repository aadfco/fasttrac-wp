<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-content-wrapper">

		<div class="container">

			<div class="inner-row align-center">

				<div class="post-content">

					<?php

					the_content( sprintf(

						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fasttrac' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),

						get_the_title()

					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fasttrac' ),
						'after'  => '</div>',
					) );

					?>
				</div>

			</div>

		</div>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
