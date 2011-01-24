<?php
/**
 * Template Name: Homepage Post List
 *
*/
?>

<h1><a href="/blog">Recent Blog Posts</a></h1>
<ul>
  <?php
    $recent_posts = wp_get_recent_posts(3);
    $i = 0;
    foreach($recent_posts as $post){
    ?>
    <li>  
      <h2><?php echo '<a href="' .get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a>' ?></h2>
      <p class="metadata">Posted by <?php echo $post["post_author"] ?> on <?php echo $post["post_date"] ?></p>
      <?php if($i == 0) { ?>
        <p><?php echo my_excerpt( $post["post_content"] ) . '... <a href="'. get_permalink($post["ID"]) . '">Continue reading <span class="meta-nav">&rarr;</span></a>' ?></p>
      <?php 
        }
        $i++;
      ?>
  </li>
  <?php 
    }
  ?>
</ul>