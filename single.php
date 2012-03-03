<?php
/**
 * Template: single.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
get_header();
?>

	<?php if (have_posts()) : ?> 
		
		<?php while (have_posts()) : the_post(); ?> 
				
			<div class="post" id="post-<?php the_ID(); ?>"> 
				
				<h1><?php the_title(); ?></h1> 
				
				<?php // only gets the single category
					//$category = get_the_category(); 
					//echo $category[0]->cat_name;
				?>
				
				<ul id="meta">
					<li>From <a href="#"><?php echo get_post_meta($post->ID, "Brand_Name", $single = true); ?></a> /&nbsp;</li>
					<!-- maybe we can use categories for Brank Names?  Where doe the Brand names click through to? -->
					<!-- Brand Name meant to click through to hardcoded newsstand application -->
					<li><a href="#">Issue <?php echo get_post_meta($post->ID, "Issue_Number", $single = true); ?></a> --&nbsp;</li>
					<li><?php the_category(); ?></li>
					<li>&nbsp;|&nbsp;<?php the_tags('',', '); ?></li>
					<li>&nbsp;|&nbsp;<?php the_author_posts_link(); ?></li>
					<li>&nbsp;|&nbsp;<?php the_date(); ?></li>
					<li>&nbsp;|&nbsp;<?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
				</ul>

				<div id="content">				

					<?php
					
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	  						the_post_thumbnail();
	  						the_post_thumbnail_caption();
						}
						
					?>
					
					<ul id="sharing">
						<li><div class="fb-like" data-send="false" data-layout="box_count" data-width="" data-show-faces="true" data-font="arial"></div></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-lang="en">Tweet</a></li>
						<li><div class="g-plusone" data-size="tall"></div></li>					
					</ul>
					
					
					<?php 
						$customValue = get_post_meta($post->ID, "Video_ID", $single = true);
						if (gallery_shortcode($post->ID) || $customValue != ''){ 
					?>
					
						<div id="multimedia">						
							<h3>Multimedia Features</h3>
														
							<div id="articleSlideShow"> 
								<?php echo do_shortcode('[gallery link="file" itemtag="div" icontag="div" captiontag="span"]'); ?>
							</div><!-- articleSlideshow -->
							
							
							<img src="http://i4.ytimg.com/vi/<?php echo get_post_meta($post->ID, "Video_ID", $single = true); ?>/0.jpg" rel="#mies1" />
							<a class="vidOverlay" rel="#mies1">Click for Video</a>
							
							<div class="simple_overlay" id="mies1">
								<?php echo get_post_meta($post->ID, "Video_Embed", $single = true); ?>
							</div>
													
							<script type="text/javascript">
							$(function() {
							
								$("img[rel]").overlay();
								$("a.vidOverlay[rel]").overlay();
	
							});		
							</script>
							
						</div><!-- multimedia -->
					<? } ?>
					
					<?php
						
						the_excerpt();			
					 	
					 	the_content('Read Full Article');
					 
					?>
					
					
					
					<!--  
						we can relate by tag, category, or... maybe custom hierarchy?
						
						maybe we can relate article to one another by a common key?
					
						will we need to related ouside content?
					
						need to write a for loop for the following 
					-->
					<?php
						
						$myID = get_post_meta($post->ID, "Related_Article_ID", $single = true);
						$myPost = get_post($myID); 
						$myTitle = $myPost->post_title;
						$myExcerpt = $myPost->post_excerpt;
						
						if ($myID != '') { ?>
							
							<div id="relatedContent">
								<h2>Related Content</h2>
															
								<h2><a href="<?php echo get_permalink($myID); ?>" rel="bookmark" title="Permanent Link to <?php echo $myTitle ?>"><?php echo $myTitle ?></a></h2>
								<p><?php echo $myExcerpt ?></p>
						
							</div><!-- relatedContent -->
					
						<? } 
						
					?>
					
					<div id="appAlert">
						<h2>Alert!:</h2>
						<p>The text above is old and you should buy the app</p>
					</div><!-- appAlert -->
					
					<div id="relatedIssue">
						<h2>More From this Issue:</h2>
						<!-- trying to query posts based on a custom field value -->
						<?php						
							$issueNumber = get_post_meta($post->ID,'Issue_Number',TRUE);
							echo($issueNumber);
							
						?>



					
					</div><!-- relatedIssue -->
					
				
					<div class="comments-template">
			            <?php comments_template(); ?>
			        </div><!-- comments-template -->
			
			
				</div><!-- content -->
        		
        		<?php endwhile; else : ?>
			
					<h2>Nothing Found</h2>
			
				<?php endif; ?>
				
		</div><!-- post -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>