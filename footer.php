<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pr_company
 */

?>


<div id="footer">
  <div class="container">

    
    <div class="col-sm-4 footer-contacts">
      <p>Kip Kouri /    <span>Principal</span><br><a href="mailto:kip@tellallyourfriendspr.com">kip[at]tellallyourfriendspr[dot]com</a></p>
      <p>Molly Small /  <span>Marketing &amp; Special Events</span> <br><a href="mailto:molly@tellallyourfriendspr.com">molly[at]tellallyourfriendspr[dot]com</a></p>
      <p>Hector Montes / <span>&nbsp;Radio</span><br><a href="mailto:hector@tellallyourfriendspr.com">hector[at]tellallyourfriendspr[dot]com</a></p>
      <p>Trevor Morrison / <span>&nbsp;Radio</span><br><a href="http://trevor[at]tellallyourfriendspr[dot]com">trevor[at]tellallyourfriendspr[dot]com</a></p>
      <p>o/ 212.226.3792<br>f/ 212.226.2373</p>


    </div>
    <div class="col-sm-4 footer-contacts">
      <p>Leslie Cuc / <span> Publicist</span> <br><a href="mailto:leslie@tellallyourfriendspr.com">leslie[at]tellallyourfriendspr[dot]com</a></p>
      <p>Wendy Waseige &nbsp;/ <span> Publicist</span> <br><a href="http://wendy[at]tellallyourfriendspr[dot]com">wendy[at]tellallyourfriendspr[dot]com</a></p>
      <p>Kate Rakvic / <span> Publicist</span> <br><a href="http://kate[at]tellallyourfirendspr[dot]com">kate[at]tellallyourfirendspr[dot]com</a></p>
<p>Michael Lantz / <span>&nbsp;Publicist</span>&nbsp;<br><a href="http://michael[at]tellallyourfriendspr[dot]com">michael[at]tellallyourfriendspr[dot]com</a></p>



    </div>
    <div class="col-sm-4"> <div id="twitter-widget"> <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    </div></div>
   
   
     Copyright &copy; <?php echo get_bloginfo('name') ; ?>. <a href="http://www.d4gp.com" target="blank" class="d4gp-link">
     <div id="f1_container">
     	<div id="f1_card">
     		<div class="front face">
     			<img src="<?php echo get_stylesheet_directory_uri()?>/img/layout/D4GP1.png" width="47" height="auto" alt="Design For Good People">
     		</div>
     		<div class="back face center"><img src="<?php echo get_stylesheet_directory_uri()?>/img/layout/D4GP2.png" width="47" height="auto" alt="Design For Good People"></div></div></div></a>
  <!-- for later: get_stylesheet_directory_uri()  -->
  </div>
</div>
</div><!--page-content-->
 
<?php 
wp_footer(); ?>

</body>
</html>
