<?php
/**
 * Template: Index.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
get_header();

$domain = $_SERVER['HTTP_HOST'];

if ($domain == 'localhost:8888') {
	
	/****** LOCALHOST VARIABLES ******/
	
	$blogCategoryID = 6;
	$slide = 4;
	

} else {

	/****** PRODUCTION VARIABLES ******/
	
	$blogCategoryID = 6;
	$slide = 15;

}

?>

	<div id="featured" class="flex-container">
	
		<div class="flexslider">
		
			<?php query_posts($query_string . '&cat=' . $slide); ?>
			<?php if (have_posts()) :?> 
			    
			    <ul class="slides">
		
					<?php while (have_posts()) :?>
					<?php the_post(); ?> 
					<li>	
						<div id="featuredProduct-<?php the_ID(); ?>" class="homePagePost product featuredProduct">
							
							<div class="thumbnail">
								
								<a href="<?php the_permalink(); ?> "><img class="product-image" src="<?php echo get_post_meta($post->ID, "Product_Image", $single = true); ?>"/></a>
								
							</div><!-- thumbnail -->
							
							<?php if ( in_category($categoryID)) { ?>
								<h2 class="product-title product-digital"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2> 					
							<?php } else { ?>
								<h2 class="product-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2> 				
							<?php } ?>
							
							<div class="post" id="post-<?php the_ID(); ?>">  
								<?php the_excerpt('read more'); ?>
			
								<div class="data-cell">
									<div class="product-price"><?php echo get_post_meta($post->ID, "Product_Price", $single = true); ?></div>
									<!--<div class="product-shipping"><?php //echo get_post_meta($post->ID, "Product_Shipping", $single = true); ?></div>
									<div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button"></div>-->
									<input type="hidden" class="product-weight" value="<?php //echo get_post_meta($post->ID, "Product_Weight", $single = true); ?>"/>
								</div>
							
							</div>
						</div>
					</li>
					<?php endwhile; ?>
		
			    </ul>
			<?php else : ?>
				<p>Oops! Something's missing, we're working on it!</p>
			<?php endif; ?>    
		
		
		</div>
		
		</div><!-- featured -->
	
	
	<div class="homePageSection">
		
		<div class="ribbonHeader">
			<h2>Our Products:</h2>
		</div><!-- ribbonHeader -->		
		
		<div class="productPod">
			<h2>Grow:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>
		
		<div class="productPod">
			<h2>Brew:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>


		<div class="productPod">
			<h2>Conserve:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>
		
		
		<div class="productPod">
			<h2>Preserve:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>
		
		<div class="productPod">
			<h2>Lifestyle:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>		
		
		<div class="productPod">
			<h2>Culture:</h2>
			<img src="http://dummyimage.com/200x128/cccccc/fff" alt="product image" />
			<p>Everything you need for your garden</p>	
		</div>	
		
		
		<div class="ribbonHeader">
			<h2>Latest from the Blog:</h2>
		</div><!-- ribbonHeader -->
		
		<?php query_posts($query_string . '&cat=' . $blogCategoryID . '&posts_per_page=3'); ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?> 
				<div class="post" id="post-<?php the_ID(); ?>">  
					<h2 class="clear"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>

					<?php the_excerpt('Read more...'); ?>
				
					<p class="meta">
						<?php the_time('F jS, Y'); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php the_tags(' | Tags: ', ', ', ''); ?>
					</p>
				</div>

		<?php endwhile; ?>
		
		<?php else : ?>
			<p>Oops! Something's missing, we're working on it!</p>
		<?php endif; ?>
	</div>
	
	<div id="events">
		<h2 class="ribbonHeaderRed">Upcoming Events:</h2>
		
		<div class="post">
			<h3 class="product-title"><a href="#">DIY Mozzarella Class - March 11, 2012 (2:30-5pm)</a></h3>
			<img src="http://dummyimage.com/255x128/cccccc/fff" />
			<p>One part learning, one part meeting like-minded individuals and one part culinary delight, this class will inspire you to raise your own backyard flock and reap the tasty benefits!</p>
		</div><!-- post -->
		
		<div class="post">
			<h3 class="product-title"><a href="#">Backyard Chickens Class - April 1, 2012 (2-5pm)</a></h3>
			<img src="http://dummyimage.com/255x128/cccccc/fff" />
			<p>One part learning, one part meeting like-minded individuals and one part culinary delight, this class will inspire you to raise your own backyard flock and reap the tasty benefits!</p>
		</div><!-- post -->
		
	</div>



	


	
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>