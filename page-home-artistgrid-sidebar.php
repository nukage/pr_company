<?php
/**
 *  Template Name: Home - Artist Grid w/ sidebars
 *
 *
 * @package pr_company
 */

get_header(); ?>

  <div class="container">
          <div class="row">
            <div class="col-sm-12">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pr_company' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

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
 <div class="page-title text-center center wow fadeInUp">
      <h1>Artists</h1>
      <hr>
    </div>
  <div class="container wow fadeInUp" data-wow-delay=".5s"> 
    <?php


  $letter = $_REQUEST['letter'];
   

    if ($letter): 

            global $wpdb; 
         $request = $letter ;// could be any letter you want
         $results = $wpdb->get_results(
                "
                SELECT * FROM $wpdb->posts
                WHERE post_title LIKE '$request%'
                AND post_type = 'artist'
                AND post_status = 'publish'; 
                "
              
          ); 
endif;

         if ($results):
       



       //  echo 'WE HAVE A LETTER, FOOLS';
       //  $query = new WP_Query( array( 
       //  'post_type' => 'artist', 
       //  'paged' => $paged, 
       // p => $the_artist_id , 
    //  'posts_per_page' => 3 
    //   ) 
   //   );



    else:
          $query = new WP_query(
    array(
        'post_type' => array('artist'),
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
      )
    );
    
  

  
endif;



 

 $terms = get_terms('category', array(
    'post_type' => 'artist',
    'fields' => 'all'

));

?>
  <?php
        if ($results):
 
          else: 
              // echo 'We currently do not have any artists with that letter';


             $results = $query->posts;?>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
          	 
			
			<?php	if ( !empty( $terms ) && !is_wp_error( $terms ) ) {

          echo '<li><a href="#" data-filter="*" id="all">All</a></li>';
                foreach( $terms as $term) {
                    ?>
                    <li>
                        <a href="#" data-filter='.category-<?php echo $term->slug; ?>' id='category-<?php echo $term->slug; ?>'><?php echo $term->name; ?></a>
                    </li>
                     
                    
                    <?php
                }
            }



				?>
 
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>

  <?php endif;
 
  ?>

<div class="letters">
  <ul>
    <li><a href="?letter=A">A</a></li>
    <li><a href="?letter=B">B</a></li>
    <li><a href="?letter=C">C</a></li>
    <li><a href="?letter=D">D</a></li>
    <li><a href="?letter=E">E</a></li>
    <li><a href="?letter=F">F</a></li>
    <li><a href="?letter=G">G</a></li>
    <li><a href="?letter=H">H</a></li>
    <li><a href="?letter=I">I</a></li>
    <li><a href="?letter=J">J</a></li>
    <li><a href="?letter=K">K</a></li>
    <li><a href="?letter=L">L</a></li>
    <li><a href="?letter=M">M</a></li>
    <li><a href="?letter=N">N</a></li>
    <li><a href="?letter=O">O</a></li>
    <li><a href="?letter=P">P</a></li>
    <li><a href="?letter=Q">Q</a></li>
    <li><a href="?letter=R">R</a></li>
    <li><a href="?letter=S">S</a></li>
    <li><a href="?letter=T">T</a></li>
    <li><a href="?letter=U">U</a></li>
    <li><a href="?letter=V">V</a></li>
    <li><a href="?letter=W">W</a></li>
    <li><a href="?letter=X">X</a></li>
    <li><a href="?letter=Y">Y</a></li>
    <li><a href="?letter=Z">Z</a></li>
  </ul>
</div>

<!-- 
  <div class="letter-selectbox"><select onChange="window.location.href=this.value">
  <option value="">Filter Artists By Letter</option>
  <option value="?letter=A">A</option>
  <option value="?letter=B">B</option>
  <option value="?letter=C">C</option>
  <option value="?letter=D">D</option>
  <option value="?letter=E">E</option>
  <option value="?letter=F">F</option>
  <option value="?letter=G">G</option>
  <option value="?letter=H">H</option>
  <option value="?letter=I">I</option>
  <option value="?letter=J">J</option>
  <option value="?letter=K">K</option>
  <option value="?letter=L">L</option>
  <option value="?letter=M">M</option>
  <option value="?letter=N">N</option>
  <option value="?letter=O">O</option>
  <option value="?letter=P">P</option>
  <option value="?letter=Q">Q</option>
  <option value="?letter=R">R</option>
  <option value="?letter=S">S</option>
  <option value="?letter=T">T</option>
  <option value="?letter=U">U</option>
  <option value="?letter=V">V</option>
  <option value="?letter=W">W</option>
  <option value="?letter=X">X</option>
  <option value="?letter=Y">Y</option>
  <option value="?letter=Z">Z</option>
 
</select></div> -->
 
       <div id="artists" class="row " >

   	 <div class="portfolio-items " >

    	<?php 
    
       
      foreach ($results as $post) {  ?>
 
<?php $allClasses = get_post_class();   ?>  
 <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3   <?php foreach ($allClasses as $class) { echo $class . " "; } ?>">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="<?php echo get_permalink($post);?>" title="<?php echo the_title();?>"  >
                   <?php if ( in_category('on-tour') ) :
echo '<div class="tour-icon">On Tour</div>';
                endif;?>
              <div class="hover-text">
            
                <h4><?php echo the_title();?></h4>
               
                 
              </div>
          <a href="<?php echo get_permalink($post);?>"><?php echo get_the_post_thumbnail($post, 'pr-slider-image' , array( 'class' => 'img-responsive' ));?></a>
              </div>
          </div>
        </div>

 

   
    <?php
} ?>
     
     
       
      

</div>
    </div>

<div class="row">
  <div class="col-md-6   home-events wow fadeInUp" data-wow-delay=".2s">      <div class="underline"> 
                                <h4>UPCOMING EVENTS</h4> 
                                <a href="../../events" class="btn-view-all pull-right text-right">View All</a> 
                              </div>
 <?php dynamic_sidebar( 'home1' ); ?> <div class="clearfix"></div></div>

 <div class="col-md-5 col-md-push-1 home-releases">
<div class="underline"> 
                                <h4>LATEST PRESS RELEASES</h4> 
                                <a href="../../press-release" class="btn-view-all pull-right text-right">View All</a> 
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

  </div><!-- Container -->
		</div>
	</div>
	</div><!-- #primary -->

<?php
 
get_footer();
