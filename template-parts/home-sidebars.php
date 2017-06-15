<div class="row">

  <?php get_template_part( 'template-parts/home-sidebar1', 'none' ); ?>
 <div class="col-md-5 col-md-push-1 home-releases">
<div class="underline"> 
                                <h4>Latest Press Releases</h4> 
                                <a href="<?php echo get_site_url() ; ?>/press-release" class="btn-view-all pull-right text-right">View All</a> 
                             </div>
           
 

<?php // Display blog posts on any page @ https://m0n.co/l


     $args = array( 
        'numberposts' => '4', 
        'post_status' => 'publish', 
        'post_type' => 'press-release' ,
        'paged' => $paged,
    );

    $recent = wp_get_recent_posts( $args );
 
 

 if ( $recent )  : ?>
            <?php  
                foreach ( $recent as $item )  { 

                   $artist_id = wpcf_pr_post_get_belongs( $item['ID'], 'artist' );
                          // Get all the parent (writer) post data
                          $artist_post = get_post( $artist_id );
                           
                          // Get the title of the parent (writer) post
                          $artist_name = $artist_post->post_title;
                          // Get the contents of the parent (writer) post
                          $artist_content = $artist_post->post_content;

                          ?>
               <article class="wow fadeInUp" data-wow-delay=".5s">
  <div class="row">
      <div class="col-sm-3">

        <?php if (has_post_thumbnail($item)): ?>

          <a href="<?php echo get_permalink($item['ID']);?>"><?php echo get_the_post_thumbnail($item , 'pr-slider-thumb' , array( 'class' => 'img-responsive' ) );?></a>

          


          <?php else : ?>

          <a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_post_thumbnail($artist_id , 'pr-slider-thumb' , array( 'class' => 'img-responsive' ) );?></a>
        <?php endif;?>

      
    </div>  <!-- col-sm-4 -->
    <div class="col-sm-8">
 

<!-- this one -->
                        <p><a href="<?php echo get_permalink($artist_id);?>"><?php echo get_the_title($artist_id); ?></a> &#8226; <?php echo get_the_time('F j, Y', $item['ID']); ?></p>
     
<h3><a href="<?php echo get_permalink($item['ID']);?>"><?php echo get_the_title($item['ID']); ?></a></h3>
   <?php //the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>  
      <p><a href="<?php echo esc_url( get_permalink($item['ID']) ) ; ?>" class="btn-read-more">Read More</a></p>



                </article>
                  <?php
                }
           endif;
  ?>
      
   
      </div> <!-- /.col-sm-8 -->
</div>