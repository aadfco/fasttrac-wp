<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 */

?>
<?php
$categories = get_the_category();
$post_date = get_the_date( 'F d, Y' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
	<div class="card-image">
		<?php fasttrac_post_thumbnail(); ?>
	</div>

	<div class="post-category">
		<i class="fas fa-folder-open"></i>
		<span><?php echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?></span>
	</div>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="post-date entry-meta">
		<i class="fas fa-calendar-alt"></i>
		<span><?php echo $post_date ?></span>
	</div><!-- .post-date entry-meta -->

	<div class="post-excerpt">
    <p><?php echo wp_trim_words( get_the_content(), 20, '. . .' ); ?></p>
  </div>
  <a href="<?php echo get_permalink(); ?>" class="button"><?php esc_html_e( 'Read More', 'fasttrac' ); ?></a>


</article><!-- #post-<?php the_ID(); ?> -->
