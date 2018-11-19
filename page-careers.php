<?php get_header();
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
?>

<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
  <div class="page-hero-content centered">
    <h1 class="standard-shadow">Careers</h1>
    <p class="subheader">Join the Fast Trac Team!</p>
  </div>
</div>

<section class="filter-tabs inner-row align-center">
  <div class="container">
    <div class="inner-row align-center">
      <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#jobs" aria-selected="true">jobs</a></li>
        <!-- <li class="tabs-title"><a data-tabs-target="benefits" href="#benefits">benefits</a></li>
        <li class="tabs-title"><a data-tabs-target="philosophy" href="#philosophy">our philosophy</a></li> -->
      </ul>
    </div>

      <div class="tabs-content" data-tabs-content="example-tabs">

        <div class="tabs-panel is-active animated fadeIn" id="jobs">

          <div class="inner-row large-up-3 small-up-2">
            <?php if(have_posts()) : while(have_posts()) : ?>
              <?php the_post(); ?>
            <?php
            $taxonomy = 'job_listing_category';
            $terms = get_terms($taxonomy, $args = array(
              'hide_empty' => false,
            ));

            ?>

            <?php foreach( $terms as $term ) :
            $catIMG = get_field('job_cat_image', 'job_listing_category_' . $term->term_id);
            ?>


            <a class="image-nav-block" id="post-<?php the_ID(); ?>" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
              <div class="nav-block-overlay">
                <div class="title-overlay">
                  <?php echo $term->name; ?>
                </div>
                <?php echo wp_get_attachment_image($catIMG, 'medium'); ?>
              </div>
            </a>

            <?php endforeach;?>
          <?php endwhile; ?>

            <?php else : ?>
              <h4><?php esc_html_e( 'Sorry, but no job listings are availble at this time. Please check back later.', 'fasttrac' ); ?></h4>
            <?php endif; ?>
          </div>

        </div>

        <div class="tabs-panel animated fadeIn" id="benefits">
          <p>What we do is suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
        </div>

        <div class="tabs-panel animated fadeIn" id="philosophy">
          <p>Our mission is suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
        </div>

      </div>

  </div>
</section>

<?php get_footer(); ?>
