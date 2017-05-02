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
    <div id="twitter-widget">
    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
    </div>
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
