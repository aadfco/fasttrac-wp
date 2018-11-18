<?php get_header(); ?>

<?php get_template_part( 'template-parts/orbit', 'slider'); ?>

<!-- Fast Points -->
<?php
//ACF Variables for Fast Points section
$fp_heading = get_field('fast_points_heading');
$fp_sub = get_field('fast_points_subheading');
$fp_p = get_field('fast_points_paragraph');
$fp_sub_2 = get_field('fast_points_sub_2');
$fp_btn_1_text = get_field('fast_points_btn_1_text');
$fp_btn_1_link = get_field('fast_points_btn_1_link');
$fp_btn_2_text = get_field('fast_points_btn_2_text');
$fp_btn_2_link = get_field('fast_points_btn_2_link');
?>

  <section class="fast-points-home">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="superhero wow animated bounceIn animation-delay-300ms"><?php echo $fp_heading; ?></h1>
        </div>
      </div>
      <div class="inner-row align-center">
        <figure class="section-content wow animated fadeIn animation-delay-300ms">
          <h2 class="standard-shadow"><?php echo $fp_sub; ?></h2>
          <p><?php echo $fp_p; ?></p>
        </figure>
      </div>

      <div class="inner-row earn-steps align-center wow animted lightSpeedIn animation-delay-300ms">
         <?php if( have_rows('rewards_steps_circles') ): ?>
          <?php while( have_rows('rewards_steps_circles') ): the_row();
          // ACF Repeater Variables
          $icon = get_sub_field('icon');
          $icon_title = get_sub_field('icon_title');
          ?>
          <div class="rewards-steps-circle">
            <div class="circle-content">
              <i class="<?php echo $icon; ?>"></i>
              <span><?php echo $icon_title; ?></span>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="inner-row align-center wow animated fadeIn animation-delay-300ms">
        <div class="join-today-heading section-content">
          <h2 class="standard-shadow"><?php echo $fp_sub_2; ?></h2>
        </div>
      </div>
      <div class="inner-row align-center wow animated bounceIn animation-delay-300ms">
        <div class="btn-row">
          <a href="<?php echo $fp_btn_1_link; ?>" class="button black-btn"><?php echo $fp_btn_1_text; ?></a>
          <a href="<?php echo $fp_btn_2_link; ?>" class="button white-btn"><?php echo $fp_btn_2_text; ?></a>
        </div>
      </div>
    </div>
  </section> <!-- end Fast Points Home -->

<!-- Begin Food and Drinks -->
<?php
// ACF Food and Drinks Variables
$fad_heading = get_field('food_and_drinks_heading');
$fad_sub = get_field('food_and_drinks_sub');
$fad_p = get_field('food_and_drinks_paragraph');
?>
  <section class="fad-home">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="superhero wow animated bounceIn animation-delay-300ms"><?php echo $fad_heading; ?></h1>
        </div>
        <figure class="section-content wow animated fadeIn animation-delay-300ms">
          <h2 class="standard-shadow"><?php echo $fad_sub; ?></h2>
          <?php if($fad_p):
            echo "<p>$fad_p</p>"; ?>
            <?php endif; ?>
        </figure>
      </div>
    </div>
    <div class="inner-row promo-banner-row wow animated fadeIn animation-delay-300ms">
      <?php if( have_rows('food_and_drinks_banners') ): ?>
      <?php while( have_rows('food_and_drinks_banners') ): the_row();
       // ACF Repeater Variables
       $banner = get_sub_field('banner');
       ?>
      <div class="fad-promo-banner">
        <?php echo wp_get_attachment_image($banner, 'full', false, array( 'class' => 'orbit-image' ) ); ?>
      </div>
      <?php endwhile; ?>
      <?php endif;?>
    </div>

    <?php
    // ACF Group Vars Food and Drink Button
    $fad_btn = get_field('fad_btn');
    $link = $fad_btn['link'];
    $text = $fad_btn['text'];

    if( $fad_btn ): ?>
    <div class="inner-row align-center wow animated fadeIn animation-delay-300ms">
      <a href="<?php echo $link; ?>" class="button"><?php echo $text; ?></a>
    </div>
    <?php endif; ?>
  </section>

<!-- Begin Store Locator -->
<?php
// ACF Store Locator Variables
$sl_heading = get_field('store_locator_heading');
$sl_p = get_field('store_locator_paragraph');
$sl_shortcode = get_field('store_locator_shortcode');
?>
  <section class="store-locator-home">
    <div class="container">
      <div class="inner-row align-center">
        <div class="section-title">
          <h1 class="superhero wow animated bounceIn animation-delay-300ms"><?php echo $sl_heading; ?></h1>
        </div>
        <div class="section-content wow animated fadeIn animation-delay-300ms">
          <p><?php echo $sl_p; ?></p>
        </div>
      </div>
      <div class="inner-row align-center wow animated fadeIn animation-delay-300ms">
        <div class="store-locator-form">
          <?php if(is_active_sidebar('store-locator-homepage-widget')){
            dynamic_sidebar( 'store-locator-homepage-widget' );
            }
          ?>
        </div>
      </div>
    </div>
  </section>

<!-- Begin Careers -->
<?php
// ACF Careers Variables
$careers_heading = get_field('careers_heading');
$careers_p = get_field('careers_paragraph');
$careers_img = get_field('careers_img');
$careers_btn = get_field('careers_btn');
$link = $careers_btn['link'];
$text = $careers_btn['text'];
?>
  <section class="careers-home">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="standard-shadow wow animated lightSpeedIn"><?php echo $careers_heading; ?></h1>
        </div>
      </div>
      <div class="inner-row">
        <div class="careers-content small-order-2 medium-order-1 wow animated slideInLeft animation-delay-300ms">
          <p><?php echo $careers_p; ?></p>
          <?php if( $careers_btn ) :?>
          <a href="<?php echo $link; ?>" class="button"><?php echo $text; ?></a>
          <?php endif; ?>
        </div>
        <div class="employee-cutout small-order-1 medium-order-2 wow animated slideInRight animation-delay-300ms">
          <?php echo wp_get_attachment_image($careers_img, 'full', false, array()); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Fast Points Reminder Popup -->
  <div class="fast-points-reminder" data-closable>
    <button class="close-button" onclick="fprDismiss()" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="inner-row reminder-window align-middle">
      <div class="cell small-4">
        <img src="<?php echo get_template_directory_uri(); ?>/img/turtle.svg" alt="">
      </div>
      <div class="cell small-8 reminder-message">
        <h1>Did you forget to sign up for Fast Points?</h1>
        <p>Earn instant rewards with each purchase at checkout!</p>
        <a href="<?php echo get_home_url(); ?>/fast-points" class="button">Learn More</a>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
