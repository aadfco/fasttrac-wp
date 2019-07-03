<?php get_header(); ?>

<?php
$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'xlarge' );
$post_date = get_the_date( 'F d, Y' );
$subhead = get_field('subheader');
$hte_header = get_field('how_to_earn_header');
?>

<<<<<<< HEAD
	<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
		<div class="page-hero-content centered">
			<h1 class="standard-shadow"><?php the_title( __( '', 'fast-trac' ) ); ?></h1>
      <p class="subheader"><?php echo $subhead; ?></p>
		</div>
	</div>

  <section class="how-to-earn">
=======
<div class="page-hero" style="background-color: #e31b23; background-image: url('<?php echo $featuredImg[0]; ?>');">
    <div class="page-hero-content centered">
        <h1 class="standard-shadow"><?php the_title( __( '', 'fasttrac' ) ); ?></h1>
    <p class="subheader"><?php echo $subhead; ?></p>
    </div>
</div>

<section class="how-to-earn">
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
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

        <div class="fpc-cards-wrapper">

            <div class="grid-x grid-padding-x small-up-1 large-up-3">
                <?php if( have_rows('fast_points_club_cards') ): ?>
                <?php while( have_rows('fast_points_club_cards') ): the_row();
                $img = get_sub_field('card_image');
                $imgArray = wp_get_attachment_image($img, 'full');
                $header = get_sub_field('card_header');
                $subhead = get_sub_field('card_subheader');
                ?>
                <div class="cell">
                    <div class="card fpc-card">

                        <div class="card-image">
                            <?php echo $imgArray; ?>
                        </div>

                        <div class="card-title">
                            <h4><?php echo $header; ?></h4>
                            <h6><?php echo $subheader; ?></h6>
                        </div>

                        <div class="card-content">

                            <?php if( have_rows('card_items') ): ?>

                            <ul>

                                <?php while( have_rows('card_items') ): the_row();
                                $item = get_sub_field('item');
                                ?>

                                    <li><?php echo $item; ?></li>

                                <?php endwhile; ?>

                            </ul>

                            <?php endif; ?>

                        </div>

                    </div><!-- end card fpc-card -->
                </div><!-- end cell -->
                <?php endwhile; ?>
                <?php endif; ?>

            </div><!-- end grid-x -->

        </div><!-- end fpc-cards-wrapper -->

    </div><!-- end container -->

    <div class="banner-wrapper">
        <?php if( have_rows('fast_points_club_banners') ): ?>
        <?php while(have_rows('fast_points_club_banners') ): the_row();
            $bgColor = get_sub_field_object('banner_background_color');
            $position = get_sub_field_object('image_content_position');
            $img = get_sub_field('image');
            $imgArray = wp_get_attachment_image($img, 'full');
            $header = get_sub_field('banner_header');
            $subheader= get_sub_field('banner_subheader');
            $conditional = get_sub_field('banner_conditions');
        ?>
        <div class="section-banner inner-row <?php echo $bgColor['value']; ?>">
            <?php
                if(strpos($position['value'], 'left') === 0) {
                    echo 
                        '<div class="banner-img-wrapper small-order-1 large-order-1">
                            '. $imgArray .'
                        </div>
                        <div class="banner-content small-order-2 large-order-2">
                            <h2 class="standard-shadow">'. $header .'</h2>
                            <p>'. $subheader .'</p>';

                        if( have_rows('banner_items') ):
                            echo '<ul>';
                            while( have_rows('banner_items') ): the_row();
                            $item = get_sub_field('item');
                                echo '<li>'. $item .'</li>';
                            endwhile;
                            echo '</ul>';
                        endif;
                        echo '</div>';
                }

                else {
                    echo 
                        '<div class="banner-img-wrapper small-order-1 large-order-2">
                            '. $imgArray .'
                        </div>
                        <div class="banner-content small-order-1 large-order-1">
                            <h2 class="standard-shadow">'. $header .'</h2>
                            <p>'. $subheader .'</p>';

                        if( have_rows('banner_items') ):
                            echo '<ul>';
                            while( have_rows('banner_items') ): the_row();
                            $item = get_sub_field('item');
                                echo '<li>'. $item .'</li>';
                            endwhile;
                            echo '</ul>
                            <p class="conditional-rules">'. $conditional .'</p>';
                        endif;
                        echo '</div>';
                }
            ?>

        </div>
        <?php endwhile;
        endif;
        ?>
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
<section class="join-fastpoints-hero" style="background-image: url('<?php echo $jfp_img_array[0]; ?>');">
    <div class="join-fastpoints-hero-content">
<<<<<<< HEAD
      <h1><?php echo $jfp_header; ?></h1>
      <?php if( $jfp_btn ) : ?>
      <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="button"><?php echo $text; ?></a>
      <?php endif; ?>
=======
        <h1><?php echo $jfp_header; ?></h1>
        <?php if( $jfp_btn ) : ?>
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="button"><?php echo $text; ?></a>
        <?php endif; ?>
>>>>>>> 8a547ec8fadb188275781a28a75d501ae72414fc
    </div>
</section>

<?php get_footer(); ?>