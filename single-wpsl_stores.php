<?php
/**
 * WPSL Single Store Page Template
 *
 * @package Fast Trac
 */
get_header(); ?>

<?php
global $post;
$queried_object = get_queried_object();
$address       = get_post_meta( $queried_object->ID, 'wpsl_address', true );
$city          = get_post_meta( $queried_object->ID, 'wpsl_city', true );
$country       = get_post_meta( $queried_object->ID, 'wpsl_country', true );
$destination   = $address . ',' . $city . ',' . $country;
$direction_url = "https://maps.google.com/maps?saddr=&daddr=" . urlencode( $destination ) . "";
$featuredBGImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium' );
$bgOverlay = 'linear-gradient(rgba(10,10,10,0.2), rgba(10,10,10,0.2))';
$featuredIMG = get_the_post_thumbnail( $page->ID, 'medium-square' );
?>

  <div class="store-details-section">
    <div class="store-info-wrap">
      <div class="ft-store-image">
        <div class="ft-store-image-wrap">
          <?php
          if( has_post_thumbnail() ){
            echo $featuredIMG;
          }
          else {
            echo '<img src="' . get_template_directory_uri() . '/img/fasttrac-logo-2_color@500px.jpg">';
          }
          ?>
        </div>
      </div>
      <div class="ft-store-details">
          <h1><?php single_post_title(); ?></h1>
          <?php echo do_shortcode( '[wpsl_address name="false" country="false"]' ); ?>
          <p>
            <?php echo '<a class="get-directions-link" target="_blank" href="' . esc_url( $direction_url ) . '">' . __( 'Get Directions', 'wpsl' ) . '</a>' ;?>
          </p>
      </div>
    </div>

    <div class="store-map-wrap">
      <?php echo do_shortcode( '[wpsl_map zoom="15" map_type_control="false" height="200"]' ); ?>
    </div>
  </div>


  <div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content-padded">
            <div class="inner-row">
              <div class="cell small-12 medium-6">
                <?php

                    // Add the content
                    $post = get_post( $queried_object->ID );
                    setup_postdata( $post );
                    the_content();
                    wp_reset_postdata( $post );

                ?>
              </div>
              <div class="cell small-12 medium-6">
                <h4 class="heading-underlined">Store Hours</h4>
                <?php
                // Add store hours shortcode
                  echo do_shortcode( '[wpsl_hours]' );
                ?>
              </div>
            </div>
          </div>

        </article>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
