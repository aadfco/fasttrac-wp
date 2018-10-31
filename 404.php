<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fast_Trac
 */

get_header();
?>

<div class="page-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/404.jpg'); background-position: bottom;">
  <div class="page-hero-content centered page-not-found">
    <h1 class="superhero">404</h1>
    <p class="subheader"><?php esc_html_e( "Looks like we've used up all the fuel!", 'fasttrac' ); ?></p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">&larr;<?php esc_html_e( "Let's get you back home", 'fasttrac' ); ?></a>

  </div>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
