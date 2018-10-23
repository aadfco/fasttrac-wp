<?php
/**
 * Category Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fast_Trac
 */

get_header();
?>

<?php
$term = get_queried_object();
$cat_image = get_field('image', $term);
$cat_image_array = wp_get_attachment_image_src($cat_image, 'xlarge');
$cat_color = get_field('color', $term);
$cat_sub = get_field('category_subheading', $term);
?>

<div class="page-hero" style="background-color: <?php echo $cat_color; ?>; background-image: url('<?php echo $cat_image_array[0]; ?>');">

  <div class="page-hero-content centered">
    <h1 class="standard-shadow"><?php single_cat_title( __( '', 'fasttrac' ) ); ?></h1>
    <p class="subheader"><?php echo $cat_sub; ?></p>
  </div>
</div>

<div class="news-posts">
  <div class="container">
    <div class="inner-row grid-margin-x small-up-1 large-up-3">

      <article class="news-card">
        <div class="card-image">
          <img src="img/featured_post_image-thumb.jpg" alt="">
        </div>
        <div class="post-category">
          <i class="fas fa-folder-open"></i>
          <span>community</span>
        </div>
        <header>
          <h1>News Post Title</h1>
        </header>
        <div class="post-date">
          <i class="fas fa-calendar-alt"></i>
          <span>August 19, 2018</span>
        </div>
        <div class="post-excerpt">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever...</p>
        </div>
        <a href="./single.php" class="button">Read More</a>
      </article>


    </div>
  </div>
</div>
