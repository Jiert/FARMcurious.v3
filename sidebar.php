<?php
/**
 * Template: sidebar.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
?>

<div id="sidebar" class="">
	
	<div id="sandBox">
		<h2>Promotion!</h2>
	</div><!-- sandBox -->
		    	
	<div id="social">
		<!-- FaceBook -->
		<div class="fb-like" data-href="http://www.facebook.com/farmcurious" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>		<a href="https://twitter.com/farmcurious" class="twitter-follow-button" data-show-count="true" data-show-screen-name="false" data-size="medium" data-lang="en">Follow</a>
    	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div><!-- social -->
					
	
	<div id="twitterFeed" class="sideBarBox">
		<div id="twitterBox">
			<h2 class="ribbonHeader">Tweets</h2>
			<script type='text/javascript'>
			    $(document).ready(function () {

			        $("#list").tweet({
			            avatar_size: 0,
			            count: 3,
			            username: "farmcurious",
			            list: "",
			            loading_text: "loading list..."
			        });

			    });
			</script> 
			<div id="list" class="query"></div>
		</div><!-- twitterBox -->
	</div><!-- twitterFeed -->
	
	<p class="advertisement">advertisement</p>
	<div id="ad" class="sideBarBox">
		<div id="adImage">
			<script type="text/javascript"><!--
				google_ad_client = "ca-pub-4937431046712732";
				/* Side Bar 250x250 */
				google_ad_slot = "6627246111";
				google_ad_width = 250;
				google_ad_height = 250;
				//-->
			</script>
			<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div><!-- adImage -->	
	</div><!-- ad -->
	
	
	<div id="reading" class="sideBarBox">
		<h2 class="ribbonHeaderRed">Books:</h2>
		<div id="readingBox" class="">
			<?php query_posts($query_string . '&cat=37'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
				<div class="product">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?> "><img class="product-image" src="<?php echo get_post_meta($post->ID, "Product_Thumbnail", $single = true); ?>"/></a>
					</div><!-- thumbnail -->
					<a href="<?php the_permalink(); ?>"><p class="product-title"><?php the_title(); ?></p></a>
					<div class="data-cell">
						
						<div class="product-price"><?php echo get_post_meta($post->ID, "Product_Price", $single = true); ?></div>
						<div class="product-shipping"><?php echo get_post_meta($post->ID, "Product_Shipping", $single = true); ?></div>
						<!--<div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button"></div>-->
						<input type="hidden" class="product-weight" value="<?php echo get_post_meta($post->ID, "Product_Weight", $single = true); ?>"/>
					</div>
				</div><!-- product -->
			<?php endwhile; ?>
			<?php else : ?>
				<p>Oops! Something's missing, we're working on it!</p>	
			<?php endif; ?>
		</div><!-- readingBox -->
	</div><!-- reading -->



</div><!-- sidebar -->
