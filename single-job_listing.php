<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fast_Trac
 */

get_header();
?>

<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xxl' );
 ?>

	<div class="page-hero single-bg" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
		<div class="page-hero-content centered">
			<h1 class="standard-shadow"><?php the_title( __( 'Job Posting For: ', 'fasttrac' ) ); ?></h1>
		</div>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );
			?>

		<?php endwhile;?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
