<div class="row">
  <div class="col-md-6   home-events wow fadeInUp" data-wow-delay=".2s">      <div class="underline"> 
                                <h4>UPCOMING EVENTS</h4> 
                                <a href="<?php echo get_site_url() ; ?>/events" class="btn-view-all pull-right text-right">View All</a> 
                              </div>
 <?php dynamic_sidebar( 'home1' ); ?> <div class="clearfix"></div></div>

 <div class="col-md-5 col-md-push-1 home-releases">
<div class="underline"> 
                                <h4>LATEST PRESS RELEASES</h4> 
                                <a href="<?php echo get_site_url() ; ?>/press-release" class="btn-view-all pull-right text-right">View All</a> 
                             </div>
 

<?php // Display blog posts on any page @ https://m0n.co/l


    $the_artist_id = $_REQUEST['the_artist'];
    $temp = $wp_query; $wp_query= null;
    $wp_query = new WP_Query( array( 'post_type' => 'artist', 'paged' => $paged, p => $the_artist_id , 'posts_per_page' => 2 ) );
 
    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

     <?php if(types_child_posts("press-release")) : ?>
            <?php $child_posts = types_child_posts("press-release");
                foreach ($child_posts as $child_post) { ?>
               <article class="wow fadeInUp" data-wow-delay=".5s">
  <div class="row">
      <div class="col-sm-3">

        <?php if (has_post_thumbnail($child_post)): ?>

          <a href="<?php echo get_permalink($child_post);?>"><?php echo get_the_post_thumbnail($child_post , 'small' , array( 'class' => 'img-responsive' ) );?></a>

          


          <?php else : ?>

          <a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_post_thumbnail($artist_id , 'small' , array( 'class' => 'img-responsive' ) );?></a>
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
      
   
      </div> <!-- /.col-sm-8 -->
</div>