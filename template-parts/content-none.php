<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 */

?>

<div class="container">
	<section class="no-results not-found">
		<header class="page-header">
<<<<<<< HEAD
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fast-trac' ); ?></h1>
=======
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fasttrac' ); ?></h1>
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
<<<<<<< HEAD
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fast-trac' ),
=======
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fasttrac' ),
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

<<<<<<< HEAD
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fast-trac' ); ?></p>
=======
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fasttrac' ); ?></p>
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
				<?php
				get_search_form();

			else :
				?>

<<<<<<< HEAD
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fast-trac' ); ?></p>
=======
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fasttrac' ); ?></p>
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
				<?php
				get_search_form();

			endif;
			?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->
</div><!-- end container -->
