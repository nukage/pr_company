<?php
/**
 * The template for displaying album pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pr_company
 */

get_header(); ?>

    <?php
    while ( have_posts() ) : the_post(); ?>

<div class="container top press-releases-single"  >
    <div class="page-title text-center center">
      <h1>ALBUM</h1>
      <hr>
    </div><!--/page-title text-center center-->
  <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <article>
                <div class="row">
                    <div class="col-sm-4 wow fadeInUp" data-wow-delay=".5s">

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
 
 
    <?php if (has_post_thumbnail($post->id)): ?>

        <?php echo get_the_post_thumbnail($post->id , 'large' , array( 'class' => 'img-responsive' ) );?>

          


          <?php else : ?>

          
                      <a href="<?php echo get_permalink($artist_id);?>">
                     <?php echo get_the_post_thumbnail($artist_id , 'large' , array( 'class' => 'img-responsive' ) );?>   
                      </a>
        <?php endif;?>
 


                  <h3 class="artist-name"><a href="<?php echo get_permalink($artist_id);?>"><?php echo $artist_name; ?></a></h3>
              

                  <?php 

// get raw date
$date = get_field(release_date); 


// make date object
$date = new DateTime($date);
?>


                                         <div>
                                            <strong>Release Date: </strong><?php echo $date->format('j.m.Y'); ?> <br>
                                            <strong>Label: </strong><?php echo get_field(label); ?> 
                                         </div>


                </div><!--/row-->
                <div class="col-sm-8 wow fadeInUp" data-wow-delay="1s">
                     <section>
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); 
                        if(get_field(sub_title)) : 
                          echo '<h3 class="sub-title">';
                        echo the_field(social_links);
                        echo '</h3>';
                        endif;
                         the_content(); ?> 

                     
                       
                                  </section>            
                            </div>
                   
                 </div><!-- /.row -->
              
              </article>
            </div> <!-- /.col-sm-8 -->
          </div>
   </div><!-- /.container -->

    <?php endwhile; ?>
  </div><!-- /.container top -->
<?php
 
get_footer();
