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

<div class="title"><span><?php bloginfo('name')?> Archives</span></div>

  <section>
    <div class="section blog_post_list" id="content_area">
      
      <h2 class="page-title">
        <?php if ( is_day() ) : ?>
        				<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
        <?php elseif ( is_month() ) : ?>
        				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
        <?php elseif ( is_year() ) : ?>
        				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
          <?php elseif ( is_tag() ) : ?>
            <?php $tags = get_tags(); ?>
    				<?php printf( __('Tag Archives: <span>%s</span>', 'twentyten' ), $tags[0]->slug ); ?>
        <?php else : ?>
        				<?php _e( 'Blog Archives', 'twentyten' ); ?>
        <?php endif; ?>
      </h2>

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
      <?php endwhile; else: ?>
      <?php endif; ?>
      
  </div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
