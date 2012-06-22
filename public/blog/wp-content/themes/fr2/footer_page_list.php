<?php
/**
 * Template Name: Footer Page List
 *
*/
?>
<?php foreach(array('policy','learn') as $slug) { 
    $page = get_page_by_path($slug);
    $children = wp_list_pages('title_li=&depth=1&echo=0&child_of=' . $page->ID);
    if ($page) { ?>
    <div class="grid_4">
      <h2><?= $page->post_title; ?></h2>
      <ul class="bullets">
        <?php echo preg_replace('/\/blog\//', '/', $children); ?>
      </ul>
    </div>
    <?php } ?>
<?php } ?>
