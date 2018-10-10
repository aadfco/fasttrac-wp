
<!-- style="background-image: url('<?php echo $slide_bg_image[0]; ?>');" -->
<!-- Begin Image Slider -->
<div class="fullscreen-image-slider animated fadeIn">
  <div class="orbit" role="region" aria-label="FullScreen Pictures" data-orbit>
    <?php if( have_rows('orbit_slider') ): ?>
    <ul class="orbit-container orbit-wrapper">
      <button class="orbit-previous">
        <span class="show-for-sr">Previous Slide</span>
        <span class="nav fa fa-chevron-left fa-3x"></span>
      </button>
      <button class="orbit-next">
        <span class="show-for-sr">Next Slide</span>
        <span class="nav fa fa-chevron-right fa-3x"></span>
      </button>

      <?php while( have_rows('orbit_slider') ): the_row();
      // ACF Vars for Orbit Slider
      $i == 0;
      $slide_image = get_sub_field('slide_image');
      $slide_bg_image = wp_get_attachment_image_src($slide_image, 'xlarge');
      $slide_heading = get_sub_field('slide_heading');
      $slide_subheading = get_sub_field('slide_subheading');
      $slide_button_link = get_sub_field('slide_button_link');
      $slide_button_text = get_sub_field('slide_button_text');
      ?>

      <?php if( $slide_image ): ?>
        <li class="<?php echo $i == 0 ? 'is-active' : '' ?> orbit-slide" style="background-image: url('<?php echo $slide_bg_image[0]; ?>');">
          <figcaption class="orbit-caption">
            <h1><?php echo $slide_heading; ?></h1>
            <p><?php echo $slide_subheading; ?></p>
            <a href="<?php echo $slide_button_link; ?>" class="button"><?php echo $slide_button_text; ?></a>
          </figcaption>
      <?php endif; ?>

      <?php if( $slide_image ): ?>
        </li>
      <?php endif; ?>

      <?php endwhile; ?>

    </ul>
    <?php endif; ?>

  <nav class="orbit-bullets">
    <?php $slide_count = count(get_field('orbit_slider')); ?>
    <?php for($i=0; $i<$slide_count; $i++) { ?>
      <button class="<?php echo $i==0 ? 'is-active' : '' ?>" data-slide="<?php echo $i; ?>"></button>
    <?php } ?>
  </nav>

  </div>
</div> <!-- end FullScreen Image Slider -->
