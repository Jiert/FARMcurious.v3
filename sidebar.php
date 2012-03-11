<?php
/**
 * Template: sidebar.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
?>

<div id="sidebar" class="">
	
		    	<div id="social">
		    		<img src="http://dummyimage.com/30x30/cccccc/fff" />
					<img src="http://dummyimage.com/30x30/cccccc/fff" />
					<img src="http://dummyimage.com/50x30/cccccc/fff" />
				</div><!-- social -->
		
	<div id="sandBox">
		<h2>Promotion!</h2>
	</div><!-- sandBox -->
	
	
	<div id="twitterFeed" class="sideBarBox">
		
		
		<div id="twitterBox">
			
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>	
			<script>
				new TWTR.Widget({
				  version: 2,
				  type: 'profile',
				  rpp: 4,
				  interval: 12000,
				  width: 280,
				  height: 200,
				  theme: {
				    shell: {
				      background: '#adadad',
				      color: '#ffffff'
				    },
				    tweets: {
				      background: '#ffffff',
				      color: '#000000',
				      links: '#d67303'
				    }
				  },
				  features: {
				    scrollbar: false,
				    loop: false,
				    live: false,
				    hashtags: true,
				    timestamp: true,
				    avatars: false,
				    behavior: 'all'
				  }
				}).render().setUser('farmcurious').start();
			</script>
			
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
		</div>	
	</div>
	
		<div id="reading" class="sideBarBox">
		
		<h2>What I'm Reading</h2>
		
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
						<div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button"></div>
						<input type="hidden" class="product-weight" value="<?php echo get_post_meta($post->ID, "Product_Weight", $single = true); ?>"/>
					</div>
				</div><!-- product -->
			
			<?php endwhile; ?>
		
			<?php else : ?>
				<p>Oops! Something's missing, we're working on it!</p>	
			<?php endif; ?>
		</div>
	</div>

</div>
