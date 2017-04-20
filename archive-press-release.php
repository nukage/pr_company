<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pr_company
 */

get_header(); ?>

	<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pr_company
 */

get_header(); ?>



<div class="container top press-releases-archive"  >
			<?php
		if ( have_posts() ) :  ?>
    <div class="page-title text-center center">
      <h1>Press Releases</h1>
      <hr>
    </div><!--/.page-title text-center center-->

    <div class="row">
          <div class="col-sm-8">
                         
<?php

while ( have_posts() ) : the_post(); ?>

				 
				

<?php 
                          // Get the ID of the parent post, which belongs to the "Writer" post type
                          $artist_id = wpcf_pr_post_get_belongs( get_the_ID(), 'artist' );
                          // Get all the parent (writer) post data
                          $artist_post = get_post( $artist_id );
                           
                          // Get the title of the parent (writer) post
                          $artist_name = $artist_post->post_title;
                          // Get the contents of the parent (writer) post
                          $artist_content = $artist_post->post_content;
                          ?>


  <article>
  <div class="row">
      <div class="col-sm-4">

                <?php if (has_post_thumbnail()): ?>
         <a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail($post, 'pr-slider-image' , array( 'class' => 'img-responsive' ) );?></a>
<?php else :  ?>
  <a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_post_thumbnail($artist_id , 'pr-slider-image' , array( 'class' => 'img-responsive' ) );?></a>
   
      
 <?php endif ; ?>

    </div>  <!-- col-sm-4 -->
    <div class="col-sm-8">
      <p><a href="<?php echo get_permalink($artist_id);?>"><?php echo $artist_name; ?></a> &#8226; <?php echo get_the_time('F j, Y'); ?></p>
      <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
      
      <p><a href="<?php echo esc_url( get_permalink() ) ; ?>" class="btn-read-more">Read More</a></p>
    </div><!-- col-sm-8 -->
  </div> <!-- /.row -->
</article>
 

 <?php


			endwhile;

		//	the_posts_navigation();



	 ?>





          
             

                
              
                  <div class="paginate">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="pagination">
                      <?php previous_posts_link( 'Newer Press Releases', $the_query->max_num_pages ); ?> 
                      </div></div>
                      <div class="col-sm-6 text-center">
                        <?php    the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => __( '', 'textdomain' ),
    'next_text' => __( '', 'textdomain' ),
) ); ?>
                      </div>
                      <div class="col-sm-3 text-right"><div class="pagination">
                       <?php next_posts_link( 'Older Press Releases', $the_query->max_num_pages ); ?> 
                      </div></div>
                    </div>
                  </div>
                
      </div> <!-- /.col-sm-8 -->

          <div class="col-sm-3 col-sm-offset-1">
            <section class="block past-release-nav">

            	<?php get_sidebar('archive');?>

 
            </section> <!-- /.past-release-nav -->
          </div><!--col-sm-3 col-sm-offset-1-->
        </div><!--row-->

   <?php     else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
</div> <!--container top-->

<?php

get_footer();
