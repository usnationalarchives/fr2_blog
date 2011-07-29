<?php
/**
 * Template Name: Blog Page List
 *
*/
get_header(); ?>

<div class="title"><span>Blog</span></div>

<section>
  <div id="content_area" class="section blog_post_list">

    
  	<?php 
  	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  	$args = array(
  	 'paged' => $paged
  	);
  	query_posts($args);
  	?>
  	
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
          
    <?php endwhile; else: ?>
    <?php endif; ?>
    
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>   
      <div class="blog_pagination bottom">
        <div class="older"><?php next_posts_link('Older Entries'); ?></div>
        <div class="newer"><?php previous_posts_link('Newer Entries'); ?></div>
      </div>
    <?php endif; ?>
    
  </div>
</section> 



<?php get_sidebar(); ?>

<?php get_footer(); ?>