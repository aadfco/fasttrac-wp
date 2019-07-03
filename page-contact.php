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
$map_embed = get_field('map_embed');
$form_embed = get_field('contact_form_embed');
?>

<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">

  <div class="page-hero-content centered">

    <h1 class="standard-shadow"><?php the_title( __( '', 'fast-trac' ) ); ?></h1>
    
  </div><!-- end page-hero-content -->

</div><!-- end page-hero -->

<div class="contact-info-wrapper">

    <div class="container">

        <div class="inner-row align-center">

        <?php if( have_rows('contact_info') ): ?>

        <?php while( have_rows('contact_info') ): the_row(); 
        $icon = get_sub_field('contact_info_icon');
        $title = get_sub_field('contact_info_title');
        $info = get_sub_field('contact_info_details');
        ?>

            <div class="contact-info">

                <div class="contact-circle">

                    <div class="circle-icon">

                        <i class="<?php echo $icon; ?>"></i>

                    </div><!-- end circle-icon -->

                </div><!-- end contact-circle -->

                <div class="contact-details">

                    <h1><?php echo $title; ?></h1>

                    <p><?php echo $info; ?>

                    <?php if( have_rows('contact_info_details_span') ): ?>

                    <?php while( have_rows('contact_info_details_span') ): the_row(); 
                    $span_line = get_sub_field('span_line') ;
                    ?>

                        <span><?php echo $span_line; ?></span>

                    <?php endwhile;
                    endif; ?>    

                    </p>
                    
                </div><!-- end contact-details -->

            </div><!--end contact-info -->


        <?php endwhile; 
        endif; ?>

        </div><!-- end inner-row -->

    </div><!-- end container -->

</div><!--end contact-info-wrapper -->

<div class="map-contact">

    <div class="container">

        <div class="inner-row">

            <div class="map-wrapper">

                <div class="responsive-embed">

                    <?php echo $map_embed; ?>

                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.749641775663!2d-80.6749997839767!3d41.139991019256826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8833e5d438212a41%3A0xb9da7f68d5047fd9!2s1057+Trumbull+Ave%2C+Youngstown%2C+OH+44505!5e0!3m2!1sen!2sus!4v1535037782183" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                </div><!-- end responsive-embed -->
        
            </div><!-- end map-wrapper -->

            <div class="contact-form-wrapper">

                <?php echo $form_embed; ?>
        
            </div><!-- end contact-form-wrapper -->

        </div><!-- end inner-row -->

    </div><!-- end container-->

</div><!-- end map-contact -->

<?php get_footer(); ?>