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
	
	$featuredCategoryID = 23;	
	$blogCategoryID = 25;

} else {

	/****** PRODUCTION VARIABLES ******/
	
	$featuredCategoryID = 15;
	$blogCategoryID = 6;
}

?>

	<div id="featured" class="flex-container">
	
	<div class="flexslider">
	
		<?php query_posts($query_string . '&cat=' . $featuredCategoryID); ?>
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
							<?php the_content('read more'); ?>
		
							<div class="data-cell">
								<div class="product-price"><?php echo get_post_meta($post->ID, "Product_Price", $single = true); ?></div>
								<div class="product-shipping"><?php echo get_post_meta($post->ID, "Product_Shipping", $single = true); ?></div>
								<div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button"></div>
								<input type="hidden" class="product-weight" value="<?php echo get_post_meta($post->ID, "Product_Weight", $single = true); ?>"/>
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
	
		    	

	
	

	
	<!-- Latest Blog Posts -->
	<div class="homePageSection">
		<h2>Latest from the Blog:</h2>
		<?php query_posts($query_string . '&cat=' . $blogCategoryID . '&posts_per_page=2'); ?>
		<?php if (have_posts()) : ?>
			<h3 class="ribbon">Inspiration:</h3>
			<a href="<?php bloginfo('url');?>/inspire" class="seeMore button">See more!</a>
			<?php while (have_posts()) : the_post(); ?> 
				<div class="post" id="post-<?php the_ID(); ?>">  
					<h2 class="clear"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>

					<?php the_content('Read more...'); ?>
				
					<p class="meta">
						<?php the_time('F jS, Y'); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php the_tags(' | Tags: ', ', ', ''); ?>
					</p>
				</div>

		<?php endwhile; ?>
		
		<?php else : ?>
			<p>Oops! Something's missing, we're working on it!</p>
		<?php endif; ?>
	</div>



	
</div><!-- content -->


	
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>