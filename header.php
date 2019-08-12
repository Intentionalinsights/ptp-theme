<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pro-Truth_Pledge_Theme
 */

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
		<!-- Google Analytics -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-108158299-1', 'auto');
		ga('send', 'pageview');

		</script>
		<!-- End Google Analytics -->
	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="<?php bloginfo( 'charset' ); ?>">

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=xQoer2lgJ2">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=xQoer2lgJ2">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=xQoer2lgJ2">
		<link rel="manifest" href="/manifest.json?v=xQoer2lgJ2">
		<link rel="mask-icon" href="/safari-pinned-tab.svg?v=xQoer2lgJ2" color="#5bbad5">
		<link rel="shortcut icon" href="/favicon.ico?v=xQoer2lgJ2">
		<meta name="theme-color" content="#ffffff">	

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <header id="masthead" class="site-header" role="banner">
                <nav class="navbar navbar-inverse">
                    <div class="container">

                        <div id="navbar-header" class="navbar-header pull-right">
                          
                            <a class="btn btn-primary navbar-btn" href="/take-the-pro-truth-pledge">
                                <span class="hidden-xs">Take the </span> Pledge
                            </a>

                        </div>

                        <div class="navbar-header">

                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                PRO <span class="truthBrand">TRUTH</span> PLEDGE
                            </a>
                        </div>


                            <?php wp_nav_menu( array(
                            'theme_location' => 'menu-1') ); ?>

                    </div>
                </nav>

            </header>

            <div id="content" class="site-content container">