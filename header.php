<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'storefront' ); ?></a>

	<?php
	do_action( 'storefront_before_header' ); ?>


	<header id="masthead" class="site-header" role="banner" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
		<div class="col-full">
                        <div class="site-logo"></div>
			<?php
			/**
			 * @hooked storefront_social_icons - 10
			 * @hooked storefront_site_branding - 20
			 * @hooked storefront_secondary_navigation - 30
			 * @hooked storefront_product_search - 40
			 * @hooked storefront_primary_navigation - 50
			 * @hooked storefront_header_cart - 60
			 */
			do_action( 'storefront_header' ); ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle">Product Category</button>
		<div class="menu-newmenu-container">
		    <ul id="menu-newmenu" class="menu nav-menu">
         <?php
             /** Display Category **/
  	     	$taxonomy     = 'product_cat';
		$orderby      = 'name';  
		$show_count   = 0;      // 1 for yes, 0 for no
  		$pad_counts   = 0;      // 1 for yes, 0 for no
  		$hierarchical = 1;      // 1 for yes, 0 for no  
  		$title        = '';  
  		$empty        = 0;
		$args = array(
  		    'taxonomy'     => $taxonomy,
		    'orderby'      => $orderby,
		    'show_count'   => $show_count,
		    'pad_counts'   => $pad_counts,
		    'hierarchical' => $hierarchical,
		    'title_li'     => $title,
		    'hide_empty'   => $empty
		);
         ?>

 	<?php $all_categories = get_categories( $args );
	foreach ($all_categories as $cat) {
    	    if($cat->category_parent == 0) {
            $category_id = $cat->term_id;
	?>      
        <li class="menu-item menu-item-type-post_type menu-item-object-page">
	<?php       
        echo '<a class="cat-name menu nav-menu" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; ?>
        <?php
        $args2 = array(
          'taxonomy'     => $taxonomy,
          'child_of'     => 0,
          'parent'       => $category_id,
          'orderby'      => $orderby,
          'show_count'   => $show_count,
          'pad_counts'   => $pad_counts,
          'hierarchical' => $hierarchical,
          'title_li'     => $title,
          'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) { 
		//echo '<a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>'; 
            }
        } ?>
    	<?php } ?>    
        </li>
        <?php
	}

	?>
        <li class="menu-item menu-item-type-post_type menu-item-object-page">
	<?php if ( is_user_logged_in() ) { ?>
 		<a class="cat-name menu nav-menu loginlink" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>">
           		<?php _e('My Account','woothemes'); ?></a>
 		<?php } 
		else { ?>
 		<a class="cat-name menu nav-menu loginlink" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>">
		<?php _e('Login / Register','woothemes'); ?></a>
	<?php } ?>
        </li>
        </ul>
        </div>
	</nav>
        </div>

	</header><!-- #masthead -->
        <?php
        if (!is_product_category() && !is_cart() && !is_checkout() && !is_account_page()) {
        ?>
        <!-- Slide Show Start -->
        <div class="css-slideshow">
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/first.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/second.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/third.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/forth.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/first.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/second.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/third.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
    <figure>
        <img src="http://myfresh.g2shop.in/wp-content/uploads/sites/2/2015/03/forth.jpg" alt="class-header-css3" class="slide-image alignnone size-full wp-image-172" /><figcaption><strong></strong></figcaption> 
    </figure>
  </div>
       <?php } ?>
        <!-- Slide Show End --> 
	<?php
	/**
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content">
		<div class="col-full">

		<?php
		/**
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' ); ?>
