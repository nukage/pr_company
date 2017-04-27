<?php
/**
 *  Template Name: About / Staff
 *
 *
 * @package pr_company
 */

get_header(); ?>

  <div class="container">
          <div  >
            <div  >

			<?php
			while ( have_posts() ) : the_post(); ?>

<div class="page-title text-center center">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <hr>
    </div><!--/.page-title text-center center-->






				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div>
	<div class="entry-content ">
		<?php
    //col-sm-offset-2
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pr_company' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div><!--row-->
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
           wp_reset_postdata();
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
 
  <div class=" wow fadeInUp" data-wow-delay=".5s"> 
    <?php
     

    $query = new WP_query(
    array(
        'post_type' => array('staff-member'),
        'post_status' => 'publish',
        'posts_per_page'  => -1,
        'meta_key'      => 'order',
        'orderby'     => 'meta_value',
        'order'       => 'DESC'
    )
);

 


?>
 
    <div id="staffmembers" class="row" >

   	 <div class="row" >
    	<?php foreach ($query->posts as $post) {  ?>
 
 
 <div class="staffmember col-sm-6">
          <div class="col-sm-6">
            <div>  
              
         <?php echo get_the_post_thumbnail($post, 'pr-slider-image' , array( 'class' => 'img-responsive' ));?>
              </div>
             
          </div>
          <div class="col-sm-6"><h4><?php echo the_title();?></h4>
           <?php the_field(contact_info); ?> 
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
