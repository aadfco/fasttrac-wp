<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fast_Trac
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="navigation">
		<div class="top-nav">
			<div class="full-container">
				<div class="inner-row align-justify">
					<div class="top-social">
						<ul class="menu">
							<?php if( have_rows('social_media_icons','option') ): ?>
								<?php while( have_rows('social_media_icons','option') ): the_row();
									// ACF Repeater Variables
									$social_media_link = get_sub_field('social_media_link', 'option');
									$social_media_icon = get_sub_field('social_media_icon', 'option');
									?>
										<li>
											<a href="<?php echo $social_media_link; ?>" class="<?php echo $social_media_icon; ?>"></a>
										</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					<nav class="secondary-menu" role="navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'secondary-menu',
								'menu_id'        => 'secondary-menu',
								'menu_class'		 => 'menu',
								'container'			 => 'ul'
							) );
						?>
					</nav>
				</div>
			</div>
		</div><!-- end top-nav -->

      <!-- Begin Main Nav -->
		<div class="main-nav">
				<div class="full-container">
					<div class="inner-row align-justify align-middle">
						<div class="logo animated">

							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
							?>
							<?php endif; ?>
						</div>

						<nav class="mobile-menu hide-for-large" role="navigation">
							<div class="mobile-btn-wrap animated">
								<button class="hamburger hamburger--elastic" type="button" data-toggle="mobile-menu-overlay">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
								</button>
							</div>
							<div class="mobile-menu-overlay transition-duration-300ms" role="navigation" id="mobile-menu-overlay" data-toggler data-animate="hinge-in-from-top hinge-out-from-top">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary-menu',
										'menu_id'        => 'primary-menu',
										'menu_class'		 => 'primary-mobile-menu',
										'container'			 => 'ul'
									) );
								?>
								<?php
									wp_nav_menu( array(
										'theme_location' => 'secondary-menu',
										'menu_id'        => 'secondary-menu',
										'menu_class'		 => 'secondary-mobile-menu',
										'container'			 => 'ul'
									) );
								?>
							</div>
						</nav>

						<!-- Begin Desktop Navigation Menus -->
						<nav class="primary-menu animated">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary-menu',
									'menu_id'        => 'primary-menu',
									'menu_class'		 => 'menu',
									'container'			 => 'ul'
								) );
							?>
						</nav>

						<div class="fp-login animated">
							<?php
							// ACF Fast Points Logo Variables
							$fp_logo = get_field('fast_points_logo', 'option');
							$fp_logo_link = get_field('fast_points_link', 'option')
							?>
							<div class="fp-logo">
								<a href="<?php echo $fp_logo_link['url']; ?>" target="<?php echo $fp_logo_link['target']; ?>">
									<?php
										if( !empty($fp_logo) ): ?>
											<img src="<?php echo $fp_logo['url']; ?>" alt="<?php echo $fp_logo['alt']; ?>" />
									<?php endif; ?>
								<span class="fp-login-link">Login | Sign Up</span>
								</a>
							</div>
						</div>

					</div> <!-- end inner-row -->
				</div> <!-- end full-container -->
		</div> <!-- end main-nav -->
    </header> <!-- end navigation -->
