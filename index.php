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





	
</div><!-- content -->
	
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>