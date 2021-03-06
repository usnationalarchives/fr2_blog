<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div class="title"><span><?php echo get_the_title($post->post_parent); ?></span></div>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
<aside>
  <div class="aside" id="subnav">
    <nav>
        <?php
        if(!$post->post_parent){
        	// will display the subpages of this top level page
        	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
        }else{
        	// diplays only the subpages of parent level
        	//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");

        	if($post->ancestors)
        	{
        		// now you can get the the top ID of this page
        		// wp is putting the ids DESC, thats why the top level ID is the last one
        		$ancestors = end($post->ancestors);
        		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
        		// you will always get the whole subpages list
        	}
        }

        if ($children) { ?>
        	<ul>
        		<?php echo $children; ?>
        	</ul>
        <?php } ?>

    </nav>  
  </div>  
</aside>
  
<section>
  <div id="content_area" class="section static_page">       
      <article>
      	<div class="article" id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><?php echo get_the_title($post); ?></h1>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
        </div>
      </article>
  </div>
</section>

<?php endwhile; ?>

<?#php get_sidebar(); ?>
<?php get_footer(); ?>
