<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div class="title"><span><?php bloginfo('name')?></span></divs>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section>
  <div id="content_area" class="section">      
    		<article>
    		  <div class="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
            
            <div class="meta_actions">
               <?php echo get_avatar( get_the_author_meta( 'ID' ), 40); ?> 
               <p class="metadata">Posted by <?php the_author(); ?> <span><?php the_date(); ?></span></p>
            
              <ul>
                <li class="bookmark">Bookmark the <a href="<?php get_permalink(); ?>">permalink</a>.</li>
                <!-- <li class="email">Share with a friend</li> -->
                <li class="comments"><span><?php 
                  $comments_count = wp_count_comments($post->ID);
                  echo $comments_count->approved; ?></span><a href="#comments">Read and post comments</a></li>
                <li class="categories">
                  <ul>
                    <?php 
                      $post_categories = get_the_category(); 
                      foreach ($post_categories as $category) {
                        $link = get_category_link($category->cat_ID);
                        $name = $category->name;
                        echo '<li>';
                        echo '<a href="' . $link .'">' . $name . '</a>';
                        echo '</li>';
                      }
                    ?>
                  </ul>  
                </li>
                
                <?php
                  if(get_the_tag_list()) {
                   echo get_the_tag_list('<li class="tags"><ul><li>','</li><li>','</li></ul></li>');
                  }
                ?>
              </ul>
              <nav>
              <div class="navigation">
                <a href="/blog" class="back">Blog Home</a>
                <a href="<?php echo get_permalink(get_previous_post()->ID) ?>" class="prev"><?php echo get_previous_post()->post_title ?></a>
                <a href="<?php echo get_permalink(get_next_post()->ID) ?>" class="next"><?php echo get_next_post()->post_title ?></a>
              </div>
              </nav>
            </div>
            
            <div class="post_and_comment_wrapper">
              <div class="post_content">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
              </div>

              <div class="comment_area">
          		  <?php comments_template( '', true ); ?>
              </div>
            </div>
          </div>
        </article>
			  

        
    <?php endwhile; // end of the loop. ?>
  </div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
