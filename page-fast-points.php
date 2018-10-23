<?php get_header(); ?>

<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
$post_date = get_the_date( 'F d, Y' );
$subhead = get_field('subheader');
$hte_header = get_field('how_to_earn_header');
?>

	<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
		<div class="page-hero-content centered">
			<h1 class="standard-shadow"><?php the_title( __( '', 'fasttrac' ) ); ?></h1>
      <p class="subheader"><?php echo $subhead; ?></p>
		</div>
	</div>

  <section class="how-to-earn">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="superhero"><?php echo $hte_header; ?></h1>
        </div>
      </div>

      <div class="card-wrapper">
        <div class="grid-x grid-padding-x small-up-1 large-up-3">
          <?php if( have_rows('how_to_earn_cards') ): ?>
           <?php while( have_rows('how_to_earn_cards') ): the_row();
           // ACF Repeater Variables
           $icon = get_sub_field('icon');
           $header = get_sub_field('header');
           $p = get_sub_field('paragraph');
           ?>
          <div class="cell">
            <div class="card">
              <div class="card-icon-circle">
                <div class="card-icon">
                  <i class="<?php echo $icon; ?>"></i>
                </div>
              </div>
              <div class="card-section">
                <h4><?php echo $header; ?></h4>
                <p><?php echo $p; ?></p>
              </div>
            </div>
          </div>
          <?php
          endwhile;
          endif;
          ?>
        </div>
      </div>

    </div>
  </section> <!-- end how-to-earn -->

  <section class="in-store-fast-points">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="superhero">Fast Points Clubs</h1>
        </div>
      </div>
      <div class="fpc-table-wrapper">
        <?php
        $table = get_field( 'fast_points_club_table' );

          if ( $table ) {

              echo '<table>';

                  if ( $table['header'] ) {

                      echo '<thead>';

                          echo '<tr>';

                              foreach ( $table['header'] as $th ) {

                                  echo '<th>';
                                      echo $th['c'];
                                  echo '</th>';
                              }

                          echo '</tr>';

                      echo '</thead>';
                  }

                  echo '<tbody>';

                      foreach ( $table['body'] as $tr ) {

                          echo '<tr>';

                              foreach ( $tr as $td ) {

                                  echo '<td>';
                                      echo $td['c'];
                                  echo '</td>';
                              }

                          echo '</tr>';
                      }

                  echo '</tbody>';

              echo '</table>';
          }
        ?>

      </div>
    </div>
  </section> <!-- end in-store-fast-points -->


  <section class="rewards-faq">
    <div class="container">
      <div class="inner-row">
        <div class="section-title">
          <h1 class="superhero">Fast Points FAQ</h1>
        </div>
      </div>

      <div class="inner-row align-center">
        <div class="faq-accordion">
          <ul class="accordion" data-accordion data-allow-all-closed="true" data-multi-expand="true">
            <?php if( have_rows('faq') ): ?>
             <?php while( have_rows('faq') ): the_row();
             // ACF Repeater Variables
             $q = get_sub_field('question');
             $a = get_sub_field('answer');
             $i == 0;
             $faq_count = count(get_field('faq'));
             ?>

            <li class="<?php if( $faq_count == $i ) echo 'is-active'; ?> accordion-item" data-accordion-item>
              <a href="#" class="accordion-title"><h6><?php echo $q; ?></h6></a>
              <div class="accordion-content" data-tab-content>
                <?php echo $a; ?>
              </div>
            </li>
            <?php
            endwhile;
            endif;
            ?>

          </ul>
        </div>
      </div>

    </div>
  </section><!-- end rewards-faq -->

  <?php
  $jfp_img = get_field('join_fast_points_image');
  $jfp_img_array = wp_get_attachment_image_src($jfp_img, 'xlarge');
  $jfp_header = get_field('join_fast_points_header');
  $jfp_sub = get_field('join_fast_points_subheader');
  $jfp_btn = get_field('join_fast_points_button');
  $link = $jfp_btn['link'];
  $text = $jfp_btn['text'];
  ?>
  <div class="join-fastpoints-hero" style="background-image: url('<?php echo $jfp_img_array[0]; ?>');">
    <div class="join-fastpoints-hero-content">
      <h1><?php echo $jfp_header; ?></h1>
      <?php if( $jfp_btn ) : ?>
      <a href="<?php echo $link; ?>" class="button"><?php echo $text; ?></a>
      <?php endif; ?>
    </div>
  </div>

<?php get_footer(); ?>
