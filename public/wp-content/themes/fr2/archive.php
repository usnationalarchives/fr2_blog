<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<h1 class="title"><span>Blog</span></h1>
  <section>
    <div class="section" id="content_area">
      <h2 class="page-title">
        <?php if ( is_day() ) : ?>
        				<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
        <?php elseif ( is_month() ) : ?>
        				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
        <?php elseif ( is_year() ) : ?>
        				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
        <?php else : ?>
        				<?php _e( 'Blog Archives', 'twentyten' ); ?>
        <?php endif; ?>
      </h2>
      <section>
        <div id="content_area">

        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

         	<div class="post" id="post-<?php the_ID(); ?>">
         			<div><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div><br/>
         		  <?php the_content();?>
         	</div>
          <?php endwhile; else: ?>
          <?php endif; ?>

        </div>
      </section>
      
  </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
