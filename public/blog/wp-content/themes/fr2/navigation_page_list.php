<?php
/**
 * Template Name: Navigation Page List
 *
*/
?>
<?php foreach(array('policy','learn') as $slug) { 
    $page = get_page_by_path($slug);
    $children = wp_list_pages('title_li=&depth=1&echo=0&child_of=' . $page->ID);
    if ($page) { ?>
      <li class="dropdown">
        <a href="#" class="<?= strtolower($page->post_title); ?>"><?= $page->post_title; ?><span class="arrow"></span></a>
        <ul class="subnav wordpress">
          <?php echo preg_replace('/\/blog\//', '/', $children); ?>
        </ul>
      </li>
    <?php } ?>
<?php } ?>
