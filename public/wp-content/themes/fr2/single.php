<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<h1 class="title"><span><?php bloginfo('name')?></span></h1>

<section>
  <div id="content_area">
    
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    		  <div class="article">
    			  <h1 class="entry-title"><?php the_title(); ?></h1>
    			  <p class="metadata">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
        
            <?php the_content(); ?>

          </div>
        </article>
    
        <nav>
      		<div id="nav-below" class="nav">
      			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
      			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
      		</div><!-- #nav-below -->
        </nav>
			
    		<?php comments_template( '', true ); ?>

    <?php endwhile; // end of the loop. ?>
  </div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
