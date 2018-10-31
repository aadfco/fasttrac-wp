<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fast_Trac
 */

get_header();
$image = get_post($id);
$image_caption = $image->post_excerpt;
?>
	<div id="primary" class="content-area">

		<main id="main" class="site-main">

      <div class="container">

        <div class="entry-content-padded">

          <div class="inner-row grid-padding-x">

            <div class="cell small-12 large-6">
              <?php echo wp_get_attachment_image( get_the_ID(), 'medium' ); ?>
            </div>

            <div class="cell-small-12 large-6">

              <h2 class="heading-underlined"><i class="fas fa-info-circle"></i> Attachment information</h2>

              <ul class="attachment-details">
                <li><strong>Title: </strong><?php the_title(); ?></li>
                <li><strong>Attachment Post Date: </strong><?php echo get_the_date( 'F d, Y' ); ?></li>
                <li><strong>Caption: </strong><?php if($image_caption){
                  echo $image_caption;
                }
                else {
                  echo 'No caption entered.';
                }
                ?>
                </li>

              </ul>

            </div>

          </div>

        </div>

      </div>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();
