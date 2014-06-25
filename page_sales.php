<?php

/*
Template Name: Sales Page
*/

//* Add custom body class to the head
add_filter( 'body_class', 'dm_add_body_class' );
function dm_add_body_class( $classes ) {
   $classes[] = 'dm-sales';
   return $classes;
}

//* Load Lato and Satisfy Google fonts
add_action( 'wp_enqueue_scripts', 'dm_google_fonts' );
function dm_google_fonts() {

	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,400,700,900', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'google-font-satisfy', '//fonts.googleapis.com/css?family=Satisfy', array(), CHILD_THEME_VERSION );

}

/** Remove footer widgets */
remove_theme_support( 'genesis-footer-widgets', 3 );

//* Remove header, navigation, breadcrumbs, page title, footer widgets, footer 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_header', 'sixteen_nine_site_gravatar', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_seo_site_description' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 11 );
remove_action( 'genesis_footer', 'genesis_do_footer', 12 );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 13 );

//* Adds top bar -- Remove comment tags to activate

add_action( 'genesis_after_header', 'dm_top_bar' );
function dm_top_bar() { ?>
	<div class="dm-top-bar">
		<div class="top-bar-wrapper">
			<div class="logo">
				<h2 class="dm-logo"><strong>DUSTON</strong>MCGROARTY</h2>
			</div>
			<div class="dm-links">
				<a href="mailto:support@customersupport.com">Email Support</a>
			</div>
			<div class="clear"></div>
		</div>
	</div><!-- /.dm-top-bar -->
<?php } 

//* Add custom footer to landing pages
add_action( 'genesis_before_footer', 'dm_landing_footer' );
function dm_landing_footer() { ?>
	<div class="landing-footer">
		<div class="one-half first">
			<p>&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></p>
		</div>
		<div class="one-half">
			<p style="text-align:right;"><a target="_blank" href="#">Terms</a>&nbsp;&nbsp;&#183;&nbsp;&nbsp;<a target="_blank" href="#">Contact</a>&nbsp;&nbsp;&#183;&nbsp;&nbsp;<a target="_blank" href="#">Disclaimer</a></p>
		</div>
	</div>
<?php }

genesis();
