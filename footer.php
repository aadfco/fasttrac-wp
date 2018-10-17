<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fast_Trac
 */

?>

	<!-- </div> end content -->
	<footer>
    <div class="main-footer">
      <div class="container">
        <div class="inner-row">
          <div class="footer-widget-cell">
						<?php if(is_active_sidebar('fastpoints-footer-widget-links')){
		          dynamic_sidebar( 'fastpoints-footer-widget-links' );
			        }
		        ?>
          </div>
					<div class="footer-widget-cell">
						<?php if(is_active_sidebar('locations-footer-widget-links')){
		          dynamic_sidebar( 'locations-footer-widget-links' );
			        }
		        ?>
          </div>
					<div class="footer-widget-cell">
						<?php if(is_active_sidebar('about-footer-widget-links')){
		          dynamic_sidebar( 'about-footer-widget-links' );
			        }
		        ?>
          </div>
					<div class="footer-widget-cell">
						<?php if(is_active_sidebar('legal-footer-widget-links')){
		          dynamic_sidebar( 'legal-footer-widget-links' );
			        }
		        ?>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="full-container">
        <div class="inner-row bottom-footer-align">
          <div class="bf-copyright">
            <p>&copy; <?php
						/* translators: %s: CMS name, i.e. WordPress. */
						echo date("Y");
						printf( esc_html__( ' Fast Trac. %s', 'fasttrac' ), 'All rights reserved.' );
						?>
          </div>
          <div class="bf-social">
						<ul class="menu">
							<?php if( have_rows('social_media_icons','option') ): ?>
								<?php while( have_rows('social_media_icons','option') ): the_row();
									// ACF Repeater Vars
									$social_media_link = get_sub_field('social_media_link', 'option');
									$social_media_icon = get_sub_field('social_media_icon', 'option');
									?>
										<li>
											<a href="<?php echo $social_media_link; ?>" class="<?php echo $social_media_icon; ?>"></a>
										</li>
								<?php endwhile; ?>
							<?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>

</body>
</html>
