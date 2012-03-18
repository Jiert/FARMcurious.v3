<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><![endif]-->

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<!-- begin head -->
	<head>
	
		<!-- set content type -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		
		<!-- smart page titles -->
		<title>
			<?php if (function_exists('is_tag') && is_tag()) {
		        single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
		    } elseif (is_archive()) {
		        wp_title(''); echo ' Archive - ';
		    } elseif (is_search()) {
		        echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
		    } elseif (!(is_404()) && (is_single()) || (is_page())) {
		        wp_title(''); echo ' - ';
		    } elseif (is_404()) {
		        echo 'Not Found - ';
		    }
		    if (is_home()) {
		        bloginfo('name'); echo ' - '; bloginfo('description');
		    } else {
		        bloginfo('name');
		    }
		    if ($paged > 1) {
		        echo ' - page '. $paged;
		    } ?>
		</title>
		
		<!-- style sheets -->
		<link rel='stylesheet' href='<?php bloginfo("stylesheet_url"); ?>' type='text/css' media='screen' />
		<link rel='stylesheet' href='<?php bloginfo('template_url'); ?>/css/font-awesome.css'>
		
		<!-- loads jquery -->
		<?php wp_enqueue_script('jquery'); ?>
		
		<script src="http://cdn.jquerytools.org/1.2.6/jquery.tools.min.js"></script>
		
		<script src="http://platform.twitter.com/widgets.js"></script>
		
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Cutive' rel='stylesheet' type='text/css'>
		
		
		<!-- FlexSlider pieces http://flex.madebymufffin.com/-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css" type="text/css" media="screen" />
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
		
		
		
		
		<script type="text/javascript" charset="utf-8">
			$(window).load(function() {
				$('.flexslider').flexslider({
					animation: "slide", //making this true removes the small dots
					directionNav: true,
					//controlNav: true
					pauseOnHover: false,
					pauseOnAction: true,
					controlsContainer: ".flex-container"	
				});
			});
		</script>
		
		
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
		
		<!-- provides a hook for the head -->
		<?php wp_head(); ?>  
	
	<!-- end head -->   
	</head>

	<!-- begin body -->
	<body>
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		
	<?php if ( is_user_logged_in() ) { ?>
		<div id="navWrapper" class="logged-in">
	<? } else { ?>		
		<div id="navWrapper">
	<? } ?>  	
	    	<div id="fixedNav">			    	
		    	<div id="nav">
		    		
		    		<div id="logoSmall"></div>					
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>		
				
					<div id="cart">
						<div id="googlecart-widget">
							<script id="googlecart-script" type="text/javascript" src="http://checkout.google.com/seller/gsc/v2/cart.js?mid=233330624398126" currency="USD"></script>						
						</div>
					</div><!-- cart -->
									
				</div><!-- nav -->
		    </div><!-- fixedNav -->
		</div><!-- navWrapper -->     


		<div id="contentWrapper">
		
			<div id="content">
			
				<div id="header">    
			    
				    <h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
			    	<p><?php bloginfo('description'); ?></p>
			    	
			    	<div id="search">	    	
						<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
							<div>
								<input type="text" id="searchfield" value="" name="s" />
								<input type="submit" id="searchsubmit" value="Search" />
							</div>
						</form>
					</div>
			    
			    </div><!-- header -->
		
