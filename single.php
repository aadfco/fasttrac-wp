
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
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
$post_date = get_the_date( 'F d, Y' );
 ?>

	<div class="page-hero single-bg" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
		<div class="page-hero-content centered">
			<h1 class="standard-shadow"><?php the_title( __( '', 'fasttrac' ) ); ?></h1>
			<div class="hero-post-info">
		    <div class="date-info"><?php echo $post_date; ?></div>
		    <div class="category-info">
		      <span>|</span> In <a href="#"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; }; ?></a>
		    </div>
		    <!-- <div class="author-info">
		      <span>|</span> By <a href="#"><?php fasttrac_post_author(); ?></a>
		    </div> -->
		  </div>
		</div>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );
			?>
			<div class="post-navigation">
				<h5>Continue reading more posts</h5>
				<?php previous_post_link(  '%link', '&laquo; Previous Post', true ); ?> |
				<?php next_post_link( '%link', 'Next Post  &raquo;', true ); ?>
			</div>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;
			?>
		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
