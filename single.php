
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

            </div>

		</div>

	</div>

	<div id="primary" class="content-area">

	    <main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content-single', get_post_type() );

        endwhile; ?>

		</main><!-- #main -->

	</div><!-- #primary -->

    <?php if(get_the_tag_list()) : ?>
    
    <hr>

        <div class="container">

            <h2 class="widget-title">tags</h2>

            <?php echo get_the_tag_list('<ul class="tag-cloud"><li>','</li><li>','</li></ul>'); ?>

        </div>
        
    <?php endif; ?>
   

<?php get_footer();
