<?php
/**
 * Template: Page.php
 *
 * @package WordPress
 * @subpackage FanStand
 */
get_header();
?>

<div id="content">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<div class="" id="post-<?php the_ID(); ?>">
	
		<h2><?php the_title(); ?></h2>
		
		<div class="post">		
			<?php the_content(); ?>	
		</div>
		
		<div id="meta-div">	
				
			<p class="meta">
				By: <?php the_author_posts_link(); ?> | <?php the_time('F jS, Y'); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php the_tags(' | Tags: ', ', ', ''); ?><?php edit_post_link(' | Edit this entry.'); ?>
			</p>
							
		</div>	
			
		<?php endwhile; endif; ?>

	</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>