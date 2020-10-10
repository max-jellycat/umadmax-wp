<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package U_Mad_Max_?
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="egEJ7dO9IZ9oaReAMb1lfwQr_mdetE0BygQGP5Sc3YU" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Bootstrap core CSS -->
	<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">

	<!-- Font Awesome Icons -->
	<link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Pacifico|Roboto:400,400italic,300,700italic,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75044096-1', 'auto');
ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'u-mad-max' ); ?></a>

	<header class="site-header" role="banner">

		<!-- NAVBAR
		================================================== -->
		<div class="navbar-wrapper">

			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo_umad.png" alt="U mad, Max?"></a>
					</div>

					<?php
						wp_nav_menu( array(
							'theme_location'		=> 'primary',
							'container'					=> 'nav',
							'container_class'		=> 'navbar-collapse collapse',
							'menu_class'				=> 'nav navbar-nav navbar-right'
						) );
					?>
				</div>
			</div>

		</div>
	</header>
