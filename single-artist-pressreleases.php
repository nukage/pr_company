<?php
/**
 * The template for displaying artist pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pr_company
 */

get_header(); ?>
 <div class="container top"  >

 			<?php
		while ( have_posts() ) : the_post(); ?>

    <div class="page-title text-center center">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      <hr>
    </div>
    	<div class="row">
          <div class="col-sm-6">
              <section class="slider block">
                <div id="slider" class="flexslider">
                     <ul class="slides">
                  <?php   

if (has_post_thumbnail):
        echo '<li>';
        the_post_thumbnail( 'pr-slider-image' );
        echo '<p class="flex-caption">';
    $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
    echo '<a href="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" ';?>
     target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res</a></p>
                        </li>;
<?php
endif;                 

if( class_exists('Dynamic_Featured_Image') ):
    global $dynamic_featured_image;
    global $post;
     $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );

     if ( $featured_images ):
        ?>
            <?php foreach( $featured_images as $images ): 
            $largeSizedImage = $dynamic_featured_image->get_image_url($images['attachment_id'], 'pr-slider-image'); ?>
             

                      <li>
                        <?php echo "<img src = '" . $largeSizedImage . "' />"; ?>
                      <p class="flex-caption"><a href="<?php echo $images['full'] ?>" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res</a></p>
                        </li>


            <?php endforeach; ?>
        <?php
        endif;
endif;

?>
               
                     
                         
                  </ul>
                </div><!--/slider flexslider-->
                <div id="carousel" class="flexslider">
                  <ul class="slides">
                     <?php   
if (has_post_thumbnail):
        echo '<li>';
        the_post_thumbnail( 'pr-slider-thumb' );
        echo '<p class="flex-caption">';
    $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
    echo '<a href="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" ';?>
     target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res</a></p>
                        </li>;
<?php
endif;  
if( class_exists('Dynamic_Featured_Image') ):
    global $dynamic_featured_image;
    global $post;
     $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );

     if ( $featured_images ):
        ?>
            <?php foreach( $featured_images as $images ): 
              $largeSizedImage = $dynamic_featured_image->get_image_url($images['attachment_id'], 'pr-slider-thumb'); ?>

             

                       <li>
                       <?php echo "<img src = '" . $largeSizedImage . "' />"; ?>
                  <p class="flex-caption"><a href="<?php echo $images['full'] ?>" target="_blank">Download Hi-Res</a></p>
                        </li>


            <?php endforeach; ?>
        <?php
        endif;
endif;

?>



                    
                  </ul>
                </div><!--/carousel flexslider-->
              </section><!--/slider block -->
                  <?php
                if(get_field(audio_player_embed)) : ?>
                <section class="block client-music">
                  <div class="underline">
                              <h4>Listen Here</h4>   </div>                                   
                           <?php the_field(audio_player_embed); ?> 
                </section><!--/block client-music-->
                 <?php endif;?>
                <?php
                if(get_field(video_player_embed)) : ?>
                  
               
                <section class="block client-videos"> 
                      <div class="underline">
                            <h4>Videos</h4>   
                      </div><!--/underline-->
                 
                                <?php the_field(video_player_embed); ?>
                       
                                
                                   
                                
                 </section> <!--/block client-videos-->
                   <?php endif;?>
             </div>     <!--/col-sm-6-->             
            <div class="col-sm-5 col-sm-offset-1"> 
                  <div class="about-text artist-rt-col"> 
                        <div class="block music">
                             <div class="col-lg-12 underline" > 
                                <h4>MUSIC</h4> 
                                <a href="#" class="btn-view-all pull-right text-right" >View All</a> 
                             </div><!--/underline-->
                                <div class="row">
                                    <div class="col-md-6 col-lg-5">
                                        <img src="img/artist/mollytuttle3_th.jpg" class="img-responsive album-art" alt="Album Art"> <a class="album-art-link" href="img/artist/MollyTuttle3.jpg"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res    </a>      		
                                    </div><!--/col-md-6 col-lg-5-->
                                    <div class="col-md-6 col-lg-7">
                                        <h4>RISE</h4>
                                         <div>
                                            <strong>Release Date: </strong>6.2.2017<br>
                                            <strong>Label: </strong>Independent
                                         </div>
                                    </div>
                                </div><!--/row-->
                            </div><!--/block music-->
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
                            if(get_the_content()) : ?>

                            <section id="biography" class="block biography">
                                    <div class="underline">
                                        <h4>BIOGRAPHY <!--<a href="/client/overcoats/bio" class="btn-read-more pull-right">View</a>--></h4>
                                    </div><!--/underline-->
                                   <?php 
                                      $content = get_post_field( 'post_content', get_the_ID() );

// Get content parts
$content_parts = get_extended( $content );

// Output part before <!--more--> tag
echo $content_parts['main'];
                                    ?> 
                                    <div id="bio-more" class="collapse">
                                    <?php  the_content( '', TRUE ); ?>
                                    </div><!--/bio-more-->
                                    <a style="display:block;" class="bio-read-btn" data-toggle="collapse" data-target="#bio-more">Read More<span class="chevron"></span></a>
                            </section>
                            <?php
                            endif;
                              if(get_field(social_links)) : ?>
                            <section class="block social-info">
                                <div class="underline">
                                    <h4>Online</h4>
                                </div><!--/underline-->
                              <?php the_field(social_links); ?> 
                            </section> <!--/block social-info-->
                              <?php endif;
                              if(get_field(press_clippings)) :?>
                              <section class="block press-clippings">
                  <div class="underline">
                  <h4>Press Clippings</h4>
                  </div>
                  <?php the_field(press_clippings); ?> 
                </section>
              <?php endif;?>
                  </div><!--/about-text artist-rt-col-->
            </div><!--/col-sm-5 col-sm-offset-1-->
  
  		</div><!--/row-->
  		 <?php



		endwhile; // End of the loop.
		?>
	</div>

<?php
 
get_footer();
