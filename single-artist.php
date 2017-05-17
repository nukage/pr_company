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
    
    $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
    if ($image_caption): ?>
     <p class="caption"><?php echo $image_caption; ?></p>

    <?php 
    endif;
    echo '<a href="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" ';?>
     target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res</a></p>
          

        
                        </li>
<?php
endif;                 

if( class_exists('Dynamic_Featured_Image') ):
    global $dynamic_featured_image;
    global $post;
     $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );


     if ( $featured_images ):
        ?>
            <?php foreach( $featured_images as $images ): 
          
            $image_caption = $dynamic_featured_image->get_image_caption_by_id($images['attachment_id'] );
            $largeSizedImage = $dynamic_featured_image->get_image_url($images['attachment_id'], 'pr-slider-image'); 
            
            ?>

             

                      <li>
                        <?php echo "<img src = '" . $largeSizedImage . "' />"; ?>
                      <p class="flex-caption">

                        <?php if ($image_caption): ?>
     <p class="caption"><?php echo $image_caption; ?></p>

                        <?php 
                        endif; ?>
                        <a href="<?php echo $images['full'] ?>" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true">
                        
                      </span> Download Hi-Res</a></p>
                 
                        </li>


            <?php endforeach; ?>
        <?php
        endif;
endif;

?>
               
                     
                         
                  </ul>
                </div><!--/slider flexslider-->
                <?php if($featured_images): ?>
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
     <p>Photographer: Buttface McGee</p>
                        </li>
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
                  <p>Photographer: Buttface McGee</p>
                        </li>


            <?php endforeach; ?>
        <?php
        endif;
endif;

?>



                    
                  </ul>
                </div><!--/carousel flexslider-->
              <?php endif;?>
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
                     <?php if(types_child_posts("album")) : 
                 
                     ?>

                        <div class="block music">
                             <div class="col-lg-12 underline" > 
                                <h4>MUSIC</h4> 
                                <a href="../../albums/?the_artist=<?php echo get_the_ID();?>" class="btn-view-all pull-right text-right" >View All</a> 
                             </div><!--/underline-->

                             <?php $childargs = array(
                                  'post_type' => 'album',
                                  'numberposts' => -1,
                                  'orderby' => 'date',
                                  'order' => 'ASC',
                                  'meta_query' => array(array('key' => '_wpcf_belongs_artist_id', 'value' => get_the_ID()))
 
                                  );
                                  $child_posts = get_posts($childargs);
                                  foreach ($child_posts as $child_post) {  ?>


                                <div class="row">
                                    <div class="col-md-6 col-lg-5">

                                      <?php if (has_post_thumbnail($child_post)): ?>
               <?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($child_post), 'full');?>
          <a href="<?php echo get_permalink($child_post);?>"><?php echo get_the_post_thumbnail($child_post , 'medium' , array( 'class' => 'img-responsive' ) );?></a>

         

           <a class="album-art-link" target="_blank" href="<?php echo $full_image_url[0];?>"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download Hi-Res    </a> 
 
 

 



 
 

     <?php else : ?>

          <a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_post_thumbnail($artist_id , 'pr-slider-image' , array( 'class' => 'img-responsive' ) );?></a>
        <?php endif;?>



                                            		
                                    </div><!--/col-md-6 col-lg-5-->
                                    <div class="col-md-6 col-lg-7">
                                        <h4><?php echo $child_post->post_title; ?></h4>

                                        <?php 

// get raw date
$date = $child_post->release_date; 


// make date object
$date = new DateTime($date);
?>


                                         <div>
                                            <strong>Release Date: </strong><?php echo $date->format('j.m.Y'); ?> <br>
                                            <strong>Label: </strong><?php echo $child_post->label; ?> 
                                         </div>
                                    </div>
                                </div><!--/row-->

                              <?php  }
                                          ?>  
                            </div><!--/block music-->

                          <?php  endif; ?>
                            <?php if(types_child_posts("press-release")) : ?>
                            <div class="press-releases block">
                                <div class="col-lg-12 underline" >
                                  
                                    <h4>PRESS RELEASES</h4>
                                    <a href="../../artist-press-releases/?the_artist=<?php echo get_the_ID();?>" class="btn-view-all pull-right text-right" >View All</a> 
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
              <?php endif;
               if(get_field(contact_info)) :?>
                              <section class="block contact-info">
                  <div class="underline">
                  <h4>Contact</h4>
                  </div>
                  <?php the_field(contact_info); ?> 
                </section>
              <?php endif;
              if(get_field(tour_widget)) :?>
               <section class="block contact-info">
                  <div class="underline">
                  <h4>Tour Dates</h4>
                  </div>
                  <?php the_field(tour_widget); ?> 
                </section>
              <?php endif;?>
                  </div><!--/about-text artist-rt-col-->
            </div><!--/col-sm-5 col-sm-offset-1-->
  
  		</div><!--/row-->
  		 <?php



		endwhile; // End of the loop.
		?>
	</div>
  <!-- jQuery -->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.7.min.js">\x3C/script>')</script>

 
<?php
 
get_footer();
