<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<h1 class="title"><span><?php bloginfo('name')?> Search</span></h1>

<section>
  <div id="content_area" class="section blog_post_list">
    <?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    ?>
    
		<h1 class="page-title"><?php printf( __( $total_results . ' Results for: &nbsp; %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

      <?php if ( $wp_query->max_num_pages > 1 ) : ?>   
        <div class="blog_pagination top">
          <div class="older"><?php next_posts_link('Older Entries'); ?></div>
          <div class="newer"><?php previous_posts_link('Newer Entries'); ?></div>
        </div>
      <?php endif; ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
          <article>
            <div class="article" id="post-<?php the_ID(); ?>">        
              <div class="excerpt">  
                <h1 class="firstchild"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>          
                <div class="summary"><?php the_excerpt(); ?></div>
              </div>  
              <div class="meta">
                <ul>
                  <li class="author"><?php the_author(); ?></li>
                  <li class="date"><?php the_date(); ?></li>
                  <li class="comments"><?php $comments_count = wp_count_comments($post->ID); ?>
                  <a href="<?php the_permalink();?>#comments" class="comment<?php echo $comments_count->approved == 0 ? ' none' : '';  ?>">
                  <?php 
                    echo $comments_count->approved > 0 ? '<span>' . $comments_count->approved . '</span> Comments' : '<span>+</span> Add a comment'; 
                  ?></a>
                  </li>
              </div>
            </div>    
          </article>

          <?php endwhile; ?>
				
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h3 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h3>
					<article>
            <div class="article" id="post-<?php the_ID(); ?>">        
              <div class="info firstchild">
    						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						  </div>
						</div>
				  </article>
				</div><!-- #post-0 -->
<?php endif; ?>

  </div>
</section> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>
