<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 */

get_header();
?>

<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
?>

<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
  <div class="page-hero-content centered">
    <h1 class="standard-shadow"><?php the_title(); ?></h1>
    <!-- <p class="subheader">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
  </div>
</div>

<div class="contact-info-wrapper">
  <div class="container">
    <div class="inner-row align-center">

      <div class="contact-info">
        <div class="contact-circle">
          <div class="circle-icon">
            <i class="fas fa-phone"></i>
          </div>
        </div>
        <div class="contact-details">
          <h1>Call</h1>
          <p>330-759-1025</p>
        </div>
      </div>

      <div class="contact-info">
        <div class="contact-circle">
          <div class="circle-icon">
            <i class="fas fa-paper-plane"></i>
          </div>
        </div>
        <div class="contact-details">
          <h1>Email</h1>
          <p>info@fasttracstores.com</p>
        </div>
      </div>

      <div class="contact-info">
        <div class="contact-circle">
          <div class="circle-icon">
            <i class="fas fa-fax"></i>
          </div>
        </div>
        <div class="contact-details">
          <h1>fax</h1>
          <p>330-759-1028</p>
        </div>
      </div>

      <div class="contact-info">
        <div class="contact-circle">
          <div class="circle-icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
        </div>
        <div class="contact-details">
          <h1>Address</h1>
          <p>1057 Trumbull Ave.
          <span>Suite A</span>
          <span>Girard, Ohio 44420</span>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

      <div class="map-contact">
        <div class="container">
          <div class="inner-row">
            <div class="map-wrapper">
            <div class="responsive-embed">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.749641775663!2d-80.6749997839767!3d41.139991019256826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8833e5d438212a41%3A0xb9da7f68d5047fd9!2s1057+Trumbull+Ave%2C+Youngstown%2C+OH+44505!5e0!3m2!1sen!2sus!4v1535037782183" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            </div>

          	<div class="wpforms-container wpforms-container-full contact-form-wrapper" id="wpforms-360">
              <form id="wpforms-form-360" class="wpforms-validate wpforms-form" data-formid="360" method="post" enctype="multipart/form-data" action="/fasttrac-wp/contact/">
                <div class="wpforms-field-container"><div id="wpforms-360-field_5-container" class="wpforms-field wpforms-field-html" data-field-id="5">
                  <div id="wpforms-360-field_5">
                    <h4>Contact Us</h4>
                  </div>
                </div>

                <div id="wpforms-360-field_1-container" class="wpforms-field wpforms-field-name" data-field-id="1">
                  <div class="input-group">
                    <span class="input-group-label">
                      <i class="fa fa-user"></i>
                    </span>

                    <input type="text" id="wpforms-360-field_1" class="input-group-field wpforms-field-required" name="wpforms[fields][1]" placeholder="Full Name" required></div>
                  </div>


                  <div id="wpforms-360-field_2-container" class="wpforms-field wpforms-field-email" data-field-id="2">
                    <div class="input-group">
                      <span class="input-group-label">
                        <i class="fa fa-envelope"></i>
                      </span>

                      <input type="email" id="wpforms-360-field_2" class="input-group-field wpforms-field-required" name="wpforms[fields][2]" placeholder="Email" required></div>
                  </div>

                    <div id="wpforms-360-field_3-container" class="wpforms-field wpforms-field-phone" data-field-id="3">
                      <div class="input-group">
                        <span class="input-group-label">
                          <i class="fa fa-phone"></i>
                        </span>

                      <input type="tel" id="wpforms-360-field_3" class="input-group-field wpforms-masked-input" data-inputmask="&#039;mask&#039;: &#039;(999) 999-9999&#039;" name="wpforms[fields][3]" placeholder="Phone Number" ></div>
                    </div>

                      <div id="wpforms-360-field_4-container" class="wpforms-field wpforms-field-textarea" data-field-id="4">
                        <div class="input-group">
                          <span class="input-group-label">
                            <i class="fa fa-edit"></i>
                          </span>
                          <textarea id="wpforms-360-field_4" class="message wpforms-field-required" rows="5" name="wpforms[fields][4]" placeholder="Type your message." required></textarea>
                        </div>
                      </div>
                    </div>

                      <div class="wpforms-submit-container">
                        <input type="hidden" name="wpforms[id]" value="360">
                        <input type="hidden" name="wpforms[author]" value="1"><input type="hidden" name="wpforms[post_id]" value="32">
                        <button type="submit" name="wpforms[submit]" class="wpforms-submit button expanded" id="wpforms-submit-360" value="wpforms-submit" data-alt-text="Sending...">Send Message</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
      </div>

      <?php
      while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
