<?php
/**
 *  Template Name: Home - Artist Grid
 *
 *
 * @package pr_company
 */

get_header(); ?>

  <div class="container">
          <div class="row">
            <div class="col-sm-12">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pr_company' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'pr_company' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## --> <?php

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
 <div class="page-title text-center center wow fadeInUp">
      <h1>

<?php
  $letter = $_REQUEST['letter'];
   if ($letter){
	echo '<a href="'. get_site_url() .'/artists/">' . get_option('clientstxt') . '</a>' . ' - ' . $letter;
} else{
	echo get_option('clientstxt');;
}
      	?></h1>
      <hr>
    </div>

     <div class="container wow fadeInUp" data-wow-delay=".5s"> 

     <?php get_template_part( 'template-parts/artist-grid', 'none' ); ?>

      </div> <!--container-->



		</div>
	</div>
	</div><!-- #primary -->

<?php
 
get_footer();
