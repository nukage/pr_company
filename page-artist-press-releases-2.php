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
      <a href="#">SOMETHING</a>
    </div>  <!-- col-sm-4 -->
    <div class="col-sm-8">
      <p><a href="#">SOMETHING</a> &#8226; TIME</p>
      <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
      
      <p><a href="<?php echo esc_url( get_permalink() ) ; ?>" class="btn-read-more">Read More</a></p>
    </div><!-- col-sm-8 -->
  </div> <!-- /.row -->
</article>
 <?php endif;?>


		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
		 <?php if(types_child_posts("press-release")) : ?>
                            <div class="press-releases block">
                                <div class="col-lg-12 underline" >
                                  
                                    <h4>PRESS RELEASES</h4>


                                    <a href="#" class="btn-view-all pull-right text-right" >View All</a> 
                                </div><!--/underline-->
                                      <?php
                                      
                                      $child_posts = types_child_posts("press-release");
                                          foreach ($child_posts as $child_post) { ?>
                                          <article>
                                    <h5><?php
                                            echo get_the_time('F j, Y', $child_post);
                                            echo '</h5><h2>';
                                            echo $child_post->post_title;
                                            echo '</h2>';
                                            echo '<a href="';
                                            echo get_permalink($child_post);
                                            echo'" class="btn-read-more">Read More</a></article>';
                                          }
                                          ?>                      
                            </div>
                            <?php 
                             endif;

	 endwhile; ?>

		<?php if ($paged > 1) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
		</nav>

		<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
		</nav>

		<?php } ?>

		<?php wp_reset_postdata(); ?>

 


                
              
                  
                
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
