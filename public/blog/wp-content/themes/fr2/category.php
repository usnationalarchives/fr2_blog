<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<h1 class="title"><span>Blog</span></h1>

<section>
  <div class="section blog_post_list" id="content_area">

    <h2 class="page-title"><?php
				printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?>s
    </h2>
    
    <?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '<div class="archive-meta">' . $category_description . '</div>';
		?>

  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <article>
        <div class="article" id="post-<?php the_ID(); ?>">        
          <div class="info firstchild">
            <h1 class="firstchild"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>          
            <div class="summary"><?php the_excerpt(); ?></div>
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
        </div>    
      </article>
    <?php endwhile; else: ?>
    <?php endif; ?>

</div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
