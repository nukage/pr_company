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
      <h1>Artists</h1>
      <hr>
    </div>
  <div class="container wow fadeInUp" data-wow-delay=".5s"> 
    <?php

    $query = new WP_query(
    array(
        'post_type' => array('artist'),
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    )
);

 

 $terms = get_terms('category', array(
    'post_type' => 'artist',
    'fields' => 'all'

));

?>

    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
          	 <li><a href="#" data-filter="*" >All</a></li>
				<?php
				if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
                foreach( $terms as $term) {
                    ?>
                    <li>
                        <a href="#" data-filter='.category-<?php echo $term->slug; ?>' id='category-<?php echo $term->slug; ?>'><?php echo $term->name; ?></a>
                    </li>
                     
                    
                    <?php
                }
            }



				?>
 
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div id="artists" class="row " >

   	 <div class="portfolio-items " >
    	<?php foreach ($query->posts as $post) {  ?>
 
<?php $allClasses = get_post_class();   ?>  
 <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3   <?php foreach ($allClasses as $class) { echo $class . " "; } ?>">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="<?php echo get_permalink($post);?>" title="<?php echo the_title();?>"  >
              <div class="hover-text">
                <h4><?php echo the_title();?></h4>
                 
              </div>
          <a href="<?php echo get_permalink($post);?>"><?php echo get_the_post_thumbnail($post, 'pr-slider-image' , array( 'class' => 'img-responsive' ));?></a>
              </div>
          </div>
        </div>

   
    <?php
} ?>
     
       
       
      

</div>
    </div>
  </div><!-- Container -->
		</div>
	</div>
	</div><!-- #primary -->

<?php
 
get_footer();
