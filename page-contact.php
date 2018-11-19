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
$form_embed = get_field('contact_form_embed');
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

      </div><!--end contact-info Phone-->

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

      </div><!--end contact-info Email-->

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

      </div><!--end contact-info Fax-->

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

      </div><!--end contact-info Address-->

    </div><!-- end inner-row -->
  </div><!-- end container -->
</div><!--end contact-info-wrapper -->

    <div class="map-contact">

      <div class="container">

        <div class="inner-row">

          <div class="map-wrapper">
            <div class="responsive-embed">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.749641775663!2d-80.6749997839767!3d41.139991019256826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8833e5d438212a41%3A0xb9da7f68d5047fd9!2s1057+Trumbull+Ave%2C+Youngstown%2C+OH+44505!5e0!3m2!1sen!2sus!4v1535037782183" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>

          <div class="contact-form-wrapper">

            <?php echo $form_embed; ?>
          
          </div>

      </div><!-- end inner-row -->

    </div><!-- end container-->

<?php get_footer();
