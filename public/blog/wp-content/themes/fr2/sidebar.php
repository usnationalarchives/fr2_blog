<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<aside>
  <div class="aside" id="sidebar">
        
    <ul class="widget-list">

      <li id="search" class="widget-container widget_search"> 
				<?php get_search_form(); ?>
      </li>

      <li id="subscribe">
        <div class="aside_box subscribe">
            <a href="<?php echo get_feed_url() ?>" class="rss">Subscribe</a>   
        </div>
      </li>
      
      <li id="policy">
        <a href="/blog/2011/02/announcing-the-federal-register-blog#caveat">Policy</a>
      </li> 
      
      <li id="about">
        <h3 class="widget-title">About this blog</h3>
        <p>In the FR Blog, we aim to give you an insider’s view of FederalRegister.gov (FR 2.0) and open up lines of discussion about the Federal Register system.  We will post news updates about the FederalRegister.gov website, create a forum for readers, and also stray into items about our other publications and services on FDsys.gov, OFR.gov, and Archives.gov.</p>
      </li>
      
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
			  <h3>Search Blog</h3>
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
				<ul class="bullets">
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
    </div>
  </aside>

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>


