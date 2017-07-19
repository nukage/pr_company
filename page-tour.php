<?php
/**
 * Template Name: Tour
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
 <div class="container top"  >

 	<div class="page-title text-center center">
      <h1>Tour</h1>
      <hr>
    </div><!--/.page-title text-center center-->
<div class="row">
   



<?php // Display blog posts on any page @ https://m0n.co/l


		$the_artist_id = $_REQUEST['the_artist'];
		$temp = $wp_query; $wp_query= null;
    add_filter('posts_where', 'metakey_no_featured' );
		$wp_query = new WP_Query( 
      array( 
        'post_type' => 'artist', 
       // 'paged' => $paged, 
        //p => $the_artist_id , 
        'posts_per_page' => -1, 
        'meta_key' => 'tour_widget',
        'meta_value' => '',
        'meta_compare' => '=',
        'orderby' => 'name',
        'order' => 'ASC'
        ) );
    remove_filter('posts_where', 'metakey_no_featured' );
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

    <?php 
     if(get_field(tour_widget)) : ?>
    <article class="col-sm-12 col-md-4 wow fadeInUp" data-wow-delay=".5s">
      <h3> <?php echo the_title(); ?></h3>
   
       <?php the_field(tour_widget); ?>


       </article>
                <?php $counter++;
                  if ($counter % 3 == 0) {
                  echo '</div><div class="row">';
                }
                ?>


    <?php endif; ?>

           <?php endwhile; ?>
       </div><div class="paginate">
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
   
 

          <div class="col-sm-3 col-sm-offset-1">
            <section class="block past-release-nav wow fadeInUp" data-wow-delay=".5s">
 
           	<?php // get_sidebar('archive');?>

 
            </section> <!-- /.past-release-nav -->
          </div><!--col-sm-3 col-sm-offset-1-->
        </div><!--row-->

    
</div> <!--container top-->





<?php
 
get_footer();
