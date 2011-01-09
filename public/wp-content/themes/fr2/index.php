<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<h1 class="title"><span><?php bloginfo('name')?></span></h1>

<section id="content_area">
	<?php query_posts('');
 	if (have_posts()) : while (have_posts()) : the_post(); ?>

 	<div class="post" id="post-<?php the_ID(); ?>">
 			<div><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div><br/>
 		  <?php the_content();?>
 	</div>
  <?php endwhile; else: ?>
  <?php endif; ?>
</section> 

<?php get_sidebar(); ?>

<?php get_footer(); ?>
