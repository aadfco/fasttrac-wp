<?php
/**
 * Archive page for Job Listings
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 *
 */

get_header();
?>

<?php
$term = get_queried_object();
$cat_image = get_field('job_cat_image', $term);
$cat_image_array = wp_get_attachment_image_src($cat_image, 'xxl');
$cat_color = get_field('job_cat_color', $term);
$cat_sub = get_field('category_subheading', $term);
?>

	<div class="page-hero" style="background-color: <?php echo $cat_color; ?>; background-image: url('<?php echo $cat_image_array[0]; ?>');">
		<div class="page-hero-content centered">
			<h1 class="standard-shadow"><?php single_cat_title( __( '', 'fast-trac' ) ); ?></h1>
			<p class="subheader">Listings</p>
		</div>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<div class="news-posts">
			  <div class="container">
			    <div class="inner-row grid-margin-x small-up-1 large-up-3">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive-jobs', get_post_type() );

			endwhile;
			?>

		<?php	else : ?>

			<div class="container">
				<h5><?php esc_html_e( 'Sorry, but there are no listings at this time. Please check back later.', 'fast-trac' ); ?></h5>
			</div>
			
		<?php endif; ?>

					</div> <!-- end innner-row -->
				</div> <!-- end container -->
			</div> <!-- end news-posts -->


			<div class="inner-row align-center">
				<div class="post-navigation">
					<?php if (function_exists("pagination")) {
    				pagination($custom_query->max_num_pages);
						}
					?>
				</div>
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
