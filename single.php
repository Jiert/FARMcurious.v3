<?php
/**
 * Template: single.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
get_header();
?>

<?php if (have_posts()) :?> 
    
	<?php while (have_posts()) :?>
	<?php the_post(); ?> 
		
		<div id="<?php the_ID(); ?>" class="product">
			
			<a href="<?php the_permalink(); ?> "><img class="product-image" src="<?php echo get_post_meta($post->ID, "Product_Image", $single = true); ?>"/></a>
			
			<h2 class="product-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2> 				
			
			<div class="post" id="post-<?php the_ID(); ?>">  
				
				<?php the_excerpt(); ?>				
							        					        
				<?php //Get product values
					$myprice_string = get_post_meta($post->ID, "price", $single = true);
				  	$myprice_values = explode(",", $myprice_string);				  					  					  			
					
					$mysize_string = get_post_meta($post->ID, "size", $single = true);
					$mysize_values = explode(",", $mysize_string);
					$arrayLength = count($mysize_values);
					
					$mycolor_string = get_post_meta($post->ID, "color", $single = true);
					$mycolor_values = explode(",", $mycolor_string);					
					$colorLength = count($mycolor_values);									
				?>		
		
				Size:				
				<select class="product-attr-size">	
					<?php 
						for ($i = 0; $i < $arrayLength ; $i++) { //Print out options from size array
						    echo "<option googlecart-set-product-price='$myprice_values[$i]'>$mysize_values[$i]</option>";
						}
					?>					
				</select><br/><br/>			
		  
				Color: 
					
				<select class="product-attr-color">					
				<?php
					for ($j = 0; $j < $colorLength ; $j++) { //Print out colors from colors array
					    echo "<option>$mycolor_values[$j]</option>";
					}
				?>										
				</select><br><br>
		  
				Price: 
				<span class="product-price"><?php echo"$myprice_values[0]";?></span><br/>
					
				<input type="hidden" class="product-weight" value="<?php //echo get_post_meta($post->ID, "Product_Weight", $single = true); ?>"/>
				
				<div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button"></div>
			
				<div id="facebook-badge">
					<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like layout="box_count" font="arial"></fb:like>
				</div><!-- facebook-badge -->
				
				<div id="twitter-badge">
					<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div><!-- twitter-badge -->
				
				<div id="stumble-badge">
					<script src="http://www.stumbleupon.com/hostedbadge.php?s=5"></script>
				</div>

				
			</div>
		</div>
	<?php endwhile; ?>

<?php else : ?>
	<p>Oops! Something's missing, we're working on it!</p>
<?php endif; ?>    

<?php get_sidebar(); ?>
<?php get_footer(); ?>