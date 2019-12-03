<!-- Begin Image Slider -->
<div class="inner-row promo-block-container">
		<div class="inner-row block-stack-container small-order-2 large-order-2">
			<?php if( have_rows('promo_block_one') ): ?>
				<?php while( have_rows('promo_block_one') ): the_row();
					$promo_one_img = get_sub_field('promo_block_one_image');
					$img_size = 'full';
					$promo_one_link = get_sub_field('promo_block_one_link');
				?>
				<div class="block-promo">
					<a href="<?php echo $promo_one_link; ?>">
						<?php
							if($promo_one_img) : 
								echo wp_get_attachment_image($promo_one_img, $img_size); 
							endif; 
						?>
					</a>
				</div>	
			<?php endwhile;
			endif; ?>	

			<?php if( have_rows('promo_block_two') ): ?>
				<?php while( have_rows('promo_block_two') ): the_row();
					$promo_two_img = get_sub_field('promo_block_two_image');
					$img_size = 'full';
					$promo_two_link = get_sub_field('promo_block_two_link');
				?>
				<div class="block-promo block-promo--count">
					<a href="<?php echo $promo_two_link; ?>">
						<?php
							if($promo_two_img) : 
								echo wp_get_attachment_image($promo_two_img, $img_size); ?>
								<div class="five-k-count-wrapper" id="countdown"></div> 
							<?php endif; 
						?>
					</a>
				</div>	
			<?php endwhile;
			endif; ?>
		</div>

	<div class="block-slider small-order-1 large-order-2 animated fadeIn">
		<div class="orbit" role="region" aria-label="Promotional Slider" data-orbit data-options="timer-delay: 7000; pause-on-hover: true; animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out; auto-play:false;" >
			<div class="orbit-wrapper">
				<?php if( have_rows('orbit_slider') ): ?>
					<ul class="orbit-container">
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
						$slide_img = get_sub_field('slide_image');
						$slide_heading = get_sub_field('slide_heading');
						$slide_subheading = get_sub_field('slide_subheading');
						$slide_button_link = get_sub_field('slide_button_link');
						$slide_button_text = get_sub_field('slide_button_text');
						?>

						<?php if( $slide_img ): ?>
							<li class="<?php echo $i == 0 ? 'is-active' : '' ?> orbit-slide">
								<figure class="orbit-figure">
									<?php echo wp_get_attachment_image($slide_img, 'full', false, array( 'class' => 'orbit-image' ) ); ?>

									<figcaption class="orbit-caption">

									<?php if( $slide_heading ): ?>
									<h1><?php echo $slide_heading; ?></h1>
									<?php endif; ?>

									<?php if( $slide_subheading ): ?>
									<p><?php echo $slide_subheading; ?></p>
									<?php endif; ?>

									<?php if( $slide_button_link ): ?>
									<a href="<?php echo $slide_button_link; ?>" class="button"><?php echo $slide_button_text; ?></a>
									<?php endif; ?>

									</figcaption>
								</figure>
						<?php endif; ?>

						<?php if( $slide_img ): ?>
							</li>
						<?php endif; ?>

						<?php endwhile; ?>

					</ul>
				<?php endif; ?>
			</div>

		<nav class="orbit-bullets">
			<?php $slide_count = count(get_field('orbit_slider')); ?>
			<?php for($i=0; $i<$slide_count; $i++) { ?>
			<button class="<?php echo $i==0 ? 'is-active' : '' ?>" data-slide="<?php echo $i; ?>"></button>
			<?php } ?>
		</nav>

		</div>
	</div> <!-- end Orbit Slider-->
</div>