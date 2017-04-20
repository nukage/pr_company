<?php
/**
 * Template Name: Artist Press Releases
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pr_company
 */

get_header(); ?>
 <div class="container top press-releases-archive"  >

 	<div class="page-title text-center center">
      <h1>Press Releases</h1>
      <hr>
    </div><!--/.page-title text-center center-->

    <div class="row">
          <div class="col-sm-8">



<?php // Display blog posts on any page @ https://m0n.co/l


		$the_artist_id = $_REQUEST['the_artist'];
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query( array( 'post_type' => 'artist', 'paged' => $paged, p => $the_artist_id , 'posts_per_page' => 3 ) );
 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		 <?php if(types_child_posts("press-release")) : ?>
            <?php $child_posts = types_child_posts("press-release");
                foreach ($child_posts as $child_post) { ?>
               <article>
  <div class="row">
      <div class="col-sm-4">

        <?php if (has_post_thumbnail($child_post)): ?>

          <a href="<?php echo get_permalink($child_post);?>"><?php echo get_the_post_thumbnail($child_post , 'pr-slider-image' , array( 'class' => 'img-responsive' ) );?></a>

          


          <?php else : ?>

          <a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_post_thumbnail($artist_id , 'pr-slider-image' , array( 'class' => 'img-responsive' ) );?></a>
        <?php endif;?>

      
    </div>  <!-- col-sm-4 -->
    <div class="col-sm-8">
 

<!-- this one -->
                        <p><a href="<?php echo get_permalink($child_post);?>"><?php echo the_title(); ?></a> &#8226; <?php echo get_the_time('F j, Y', $child_post); ?></p>
     
<h3><a href="<?php echo get_permalink($child_post);?>"><?php echo $child_post->post_title; ?></a></h3>
   <?php //the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>  
      <p><a href="<?php echo esc_url( get_permalink($child_post) ) ; ?>" class="btn-read-more">Read More</a></p>



                </article>
                  <?php
                }
           endif;
           endwhile; ?>
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
 
           	<?php // get_sidebar('archive');?>

 
            </section> <!-- /.past-release-nav -->
          </div><!--col-sm-3 col-sm-offset-1-->
        </div><!--row-->

    
</div> <!--container top-->





<?php
 
get_footer();
