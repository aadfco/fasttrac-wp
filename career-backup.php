<div class="inner-row large-up-3 small-up-2">
  <?php
  $taxonomy = 'jobpost_category';
  $terms = get_terms($taxonomy, $args = array(
    'hide_empty' => false,
  ));

  ?>

  <?php foreach( $terms as $term ) :
  $catIMG = get_field('job_cat_image', 'jobpost_category_' . $term->term_id);
  ?>


  <a class="image-nav-block" id="post-<?php the_ID(); ?>" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
    <div class="nav-block-overlay">
      <div class="title-overlay">
        <?php echo $term->name; ?>
      </div>
      <img src="<?php echo $catIMG['url']; ?>" alt="">
    </div>
  </a>

<?php
endforeach;
?>
