<?php get_header(); ?>
<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
 ?>

<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
  <div class="page-hero-content centered">
    <h1 class="standard-shadow"><?php the_title( __( '', 'fast-trac' ) ); ?></h1>
  </div>
</div>

<section class="filter-tabs inner-row align-center">
  <div class="container">
    <div class="inner-row align-center">

    <?php if( have_rows('about_tabs') ): 
        $row_name = get_row();
        $sanitize_row = sanitize_title( $row_name );
    ?>
      <ul class="tabs" data-tabs id="about-tabs">
        <?php $i=0; while( have_rows('about_tabs') ): the_row(); 
            
            $link = get_sub_field('tab_title_link');
            $content = get_sub_field('tab_content');
            $sanitize = sanitize_title( $link );
        ?>
        <li class="tabs-title <?php if($i==0) echo 'is-active'; ?>"><a data-tabs-target="<?php echo $sanitize; ?>" href="#<?php echo $sanitize; ?>" href="#<?php echo $sanitize; ?>" aria-selected="true"><?php echo $link; ?></a></li>
        <?php $i++; endwhile; ?>
      </ul>

      <div class="tabs-content" data-tabs-content="about-tabs">

      <?php  $i=0; while( have_rows('about_tabs') ): the_row(); 
       
        $link = get_sub_field('tab_title_link');
        $content = get_sub_field('tab_content');
        $sanitize = sanitize_title( $link );
      ?>
        <div class="tabs-panel animated fadeIn <?php if($i==0) echo 'is-active'; ?>" id="<?php echo $sanitize; ?>">
          <p><?php echo $content; ?></p>
        </div>
        <?php $i++; endwhile; endif; ?>

      </div>
    </div>
  </div>
</section>

<section class="stacks">
<?php 
    $storyIMG = get_field('story_image');
    $storyIMGArray = wp_get_attachment_image_src($storyIMG, 'large');
    $storyTitle = get_field('story_title');
    $storyContent = get_field('story_content');
?>
  <div class="stacked-wrapper inner-row border-top" data-equalizer>
    <div class="stack-media large-order-2 wow animated fadeIn" role="img" aria-label="Success Image" data-equalizer-watch style="background-color: #e31b23; background-image: url('<?php echo $storyIMGArray[0]; ?>');">
    </div>
    <div class="stack-content container large-order-1 wow animated fadeIn" data-equalizer-watch>
      <h1><?php echo $storyTitle; ?></h1>
      <p><?php echo $storyContent; ?></p>
    </div>

  </div> <!-- end stacked-wrapper -->
</section>

<div class="about-counter-bar">
<?php
    $customers = get_field('customer_counter');
    $locations = get_field('locations_counter');
    $awards = get_field('awards_counter');
?>
  <div class="container">
    <div class="inner-row counter-items-container wow animatied flipInX">
      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-smile"></i>
        </span>
        <span class="counter-number" data-count="<?php echo $customers; ?>">
          0
        </span>
        <span class="counter-text">
          happy customers
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-building"></i>
        </span>
        <span class="counter-number" data-count="<?php echo $locations; ?>">
          0
        </span>
        <span class="counter-text">
          locations
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-trophy"></i>
        </span>
        <span class="counter-number" data-count="<?php echo $awards; ?>">
          0
        </span>
        <span class="counter-text">
          local awards
        </span>
      </div>

      <div class="counter-item">
        <span class="counter-icon">
          <i class="fas fa-award"></i>
        </span>
        <?php
        $startYear = new DateTime('2005-01-01');
        $currentYear = new DateTime();
        $diff= date_diff($currentYear, $startYear);
        ?>
        <span class="counter-number" data-count="<?php echo $diff->y; ?>">
          0
        </span>
        <span class="counter-text">
          years in business
        </span>
      </div>

    </div>
  </div>

</div>
<?php get_footer(); ?>
