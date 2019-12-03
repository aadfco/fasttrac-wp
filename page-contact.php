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

<div class="page-hero" style="background-color: #e31b23; background-image: linear-gradient(rgba(0,0,0, 0.3), rgba(0,0,0,0.3)), url('<?php echo $featuredImg[0]; ?>');">

  <div class="page-hero-content centered">

    <h1 class="superhero"><?php the_title( __( '', 'fast-trac' ) ); ?></h1>
    
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

                </div><!-- end responsive-embed -->
        
            </div><!-- end map-wrapper -->

            <div class="contact-form-wrapper">

                <?php echo $form_embed; ?>
        
            </div><!-- end contact-form-wrapper -->

        </div><!-- end inner-row -->

    </div><!-- end container-->

</div><!-- end map-contact -->

<?php get_footer(); ?>