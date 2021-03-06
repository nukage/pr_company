<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pr_company
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'pr_company' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content" align="center">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pr_company' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pr_company' ); ?></p>
			<form role="search" method="get" id="searchform" class="searchform navbar-form" action="<?php echo get_site_url() ; ?>"> 
<!-- <label class="screen-reader-text" for="s">Search for:</label>  -->
 <div class="input-group">
<input type="text" value="" name="s" id="s" placeholder="Search" class="form-control search-custom-form"  /> 
    <div class="input-group-btn">
                <button class="btn btn-default search-custom-button" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
</div>
</form>
			<?php

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pr_company' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
