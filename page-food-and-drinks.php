<?php get_header(); ?>

<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xxl' );
$breakfastIMG = get_field('breakfast_image');
$breakfastIMGArray = wp_get_attachment_image_src($breakfastIMG, 'large');
$lunchIMG = get_field('lunch_image');
$lunchIMGArray = wp_get_attachment_image_src($lunchIMG, 'large');
$coldDrinksIMG = get_field('cold_drinks_image');
$coldDrinksIMGArray = wp_get_attachment_image_src($coldDrinksIMG, 'large');
$hotDrinksIMG = get_field('hot_drinks_image');
$hotDrinksIMGArray = wp_get_attachment_image_src($hotDrinksIMG, 'large');
?>

<div class="page-hero food-and-drinks" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">

</div>

<section class="filter-simple">
  <div class="tab-nav-group">
    <button class="tab-btn filter-simple-button is-active" data-filter="food">food</button>
    <button class="tab-btn filter-simple-button" data-filter="drinks">drinks</button>
  </div>

  <div class="stacked-wrapper inner-row food animated fadeIn" data-equalizer>
    <div class="stack-media large-order-2" style="background-image: url('<?php echo $breakfastIMGArray[0]; ?>');" role="img" aria-label="Breakfast Image" data-equalizer-watch>
      <!-- <img src="img/breakfast.jpg" alt=""> -->
    </div>
    <div class="stack-content container large-order-1" data-equalizer-watch>
      <div class="stack-title">
        <h1>Breakfast</h1>
      </div>
      <?php if( have_rows('breakfast_content') ): ?>
      <ul class="stack-items">
        <?php while( have_rows('breakfast_content') ): the_row();
        // ACF Vars for Orbit Slider
        $item = get_sub_field('items');
        ?>
        <?php if( $item ): ?>
        <li><?php echo $item; ?></li>
      <?php endif; ?>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    </div>

    <div class="stack-media large-order-3" style="background-image: url('<?php echo $lunchIMGArray[0]; ?>');" role="img" aria-label="Breakfast Image" data-equalizer-watch>
      <!-- <img src="img/breakfast.jpg" alt=""> -->
    </div>
    <div class="stack-content container large-order-4" data-equalizer-watch>
      <div class="stack-title">
        <h1>Lunch</h1>
      </div>
      <?php if( have_rows('lunch_content') ): ?>
      <ul class="stack-items">
        <?php while( have_rows('lunch_content') ): the_row();
        // ACF Vars for Orbit Slider
        $item = get_sub_field('items');
        ?>
        <?php if( $item ): ?>
        <li><?php echo $item; ?></li>
      <?php endif; ?>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    </div>
  </div>

  <div class="stacked-wrapper inner-row drinks animated fadeIn" data-equalizer>
    <div class="stack-media large-order-2" style="background-image: url('<?php echo $coldDrinksIMGArray[0]; ?>');" role="img" aria-label="Coffee Image" data-equalizer-watch>
      <!-- <img src="img/coffee.jpg" alt=""> -->
    </div>
    <div class="stack-content container large-order-1" data-equalizer-watch>
      <div class="stack-title">
        <h1>cold drinks</h1>
      </div>
      <?php if( have_rows('cold_drinks_content') ): ?>
      <ul class="stack-items">
        <?php while( have_rows('cold_drinks_content') ): the_row();
        // ACF Vars for Orbit Slider
        $item = get_sub_field('items');
        ?>
        <?php if( $item ): ?>
        <li><?php echo $item; ?></li>
      <?php endif; ?>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    </div>

    <div class="stack-media large-order-3" style="background-image: url('<?php echo $hotDrinksIMGArray[0]; ?>');" role="img" aria-label="Coffee Image" data-equalizer-watch>
      <!-- <img src="img/coffee.jpg" alt=""> -->
    </div>
    <div class="stack-content container large-order-4" data-equalizer-watch>
      <div class="stack-title">
        <h1>Hot and Cold Brew</h1>
      </div>
      <?php if( have_rows('hot_drinks_content') ): ?>
      <ul class="stack-items">
        <?php while( have_rows('hot_drinks_content') ): the_row();
        // ACF Vars for Orbit Slider
        $item = get_sub_field('items');
        ?>
        <?php if( $item ): ?>
        <li><?php echo $item; ?></li>
      <?php endif; ?>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    </div>
  </div>

</section>

<?php get_footer(); ?>
