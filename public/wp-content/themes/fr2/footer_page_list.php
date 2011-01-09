<?php foreach(array('policy','learn') as $slug) { 
    $page = get_page_by_path($slug);
    if ($page) { ?>
    <div class="grid_3">
      <h2><?= $page->post_title; ?></h2>
      <ul class="bullets">
        <?php wp_list_pages('title_li=&depth=1&child_of=' . $page->ID) ?>
      </ul>
    </div>
    <?php } ?>
<?php } ?>
