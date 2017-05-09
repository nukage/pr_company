<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pr_company
 */

get_header(); ?>

  <div class="container">
          <div class="row">
            <div class="col-sm-12">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pr_company' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content" align="center">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'pr_company' ); ?></p>

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
				 

						/* translators: %1$s: smiley */
						 
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			</div>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
