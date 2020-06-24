<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121771582-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-121771582-1');
	</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/favicon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="top-nav">

			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a class="float-left" href="<?php echo get_home_url(); ?>/dashboard">
							<img src="<?php echo get_template_directory_uri(); ?>/images/NexJ Health Logo.png" class="nav-logo" alt="NexJ Health Documentation" itemprop="logo">
						</a>
					</div>


					<div class="col-md-6">
						<div class="float-right navbar-user">
							<a href="#" class="user-menu-button" data-menu="user">
								<span class="desktop">
									Hi, <?php echo um_user('first_name') . ' ' . um_user('last_name') ?> <i class="fas fa-level-down-alt"></i>
								</span>
								<span class="mobile">
									Account
								</span>
							</a>


							<a href="#" class="mobile-menu-button" data-menu="closed"><i class="fas fa-bars"></i></a>

							<div class="navbar-user-container" data-menu="closed">
								<?php
									wp_nav_menu(
											array(
											'theme_location'  => 'user-menu',
											'menu_id'         => 'user-menu',
											'container'       => 'div',
											'container_class' => 'navbar-collapse',
											'container_id'    => 'user-menu-wrap',
											'menu_class'      => 'ml-auto',
								            'fallback_cb'     => '__return_false',
								            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								            'depth'           => 2,
								            'walker'          => new WP_bootstrap_4_walker_nav_menu()
										)
									);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation navbar bottom-nav">
			<div class="container">
				<div class="row">
					<div class="bottom-nav">
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary-menu',
									'menu_id'         => 'primary-menu',
									'container'       => 'div',
									'container_class' => 'navbar-collapse',
									'container_id'    => 'primary-menu-wrap',
									'menu_class'      => 'navbar-bottom-container',
						            'fallback_cb'     => '__return_false',
						            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						            'depth'           => 2,
						            'walker'          => new WP_bootstrap_4_walker_nav_menu()
								)
							);
						?>
					</div>
				</div>
			</div>
		</nav><!-- #site-navigation -->
		<div id="navbar-block"></div>
	</header><!-- #masthead -->

	<?php if(is_search()) get_template_part('partials/header', 'search'); ?>

	<?php if(!is_home() && !is_front_page()) echo '<div id="content" class="site-content">'; ?>
