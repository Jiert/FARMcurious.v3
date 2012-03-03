<?php
/**
 * Template: search.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
get_header();
?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<div class="">
			<h2 class="pageTitle">Search Results:</h2>
		</div>

		<?php while (have_posts()) : the_post(); ?>

			<div class="">
			
			<div class="post"<?php post_class() ?>>
				<img class="staple" src="<?php bloginfo('template_url'); ?>/images/staple.jpg" />
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
			<div id="meta">	
				
				<!-- meta: post date, author -->
				<p class="meta">
					By: <?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php the_tags(' | Tags: ', ', ', ''); ?><?php edit_post_link(' | Edit this entry.'); ?>
				</p>
							
			<!-- end meta -->
			</div>

				
			</div>

			<!-- end postWrapper -->
			</div>
		
		<?php endwhile; ?>

		<?php previous_posts_link('<div id="newer" class="shadow">&laquo; Newer Posts</div>'); ?>
		<?php next_posts_link('<div id="older" class="shadow">Older Posts &raquo;</div>'); ?>


	<?php else : ?>

	<div class="">
		
		<div class="post" id="post-<?php the_ID(); ?>"> 
					
			<h2 class="center">No posts found. Try a different search?</h2>	
						
		<!-- end post -->
		</div>
	
		
	<!-- end postWrapper -->	
	</div>
	

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
