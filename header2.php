<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pr_company
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/flexslider.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">

 
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<!--
<script type="text/javascript" src="js/modernizr.custom.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body id="page-top"  >
<!--
<div id="preloader">
  <div id="status"> <img src="img/preloader.gif" height="64" width="64" alt=""> </div>s
</div>
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      <a class="navbar-brand page-scroll" href="<?php get_site_url() ?>">THE PRESS HOUSE</a> </div>
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    <!-- Collect the nav links, forms, and other content for toggling --> 

<?php $defaults = array(
  'theme_location'  => '',
  'menu'            => '',
  'container_id'    => '',
  'menu_class'      => 'nav navbar-nav',
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  // 'items_wrap'      => '<ul class="nav navbar-nav"> <li></ul>',
  'depth'           => 0,
  'walker'          => ''
);
 
wp_nav_menu( $defaults );
?>
 
<form role="search" method="get" id="searchform" class="searchform" action="http://www.thepresshouse.dev/"> 
<!-- <label class="screen-reader-text" for="s">Search for:</label>  -->
<input type="text" value="" name="s" id="s" /> 
<input type="submit" id="searchsubmit" value="Search" /> 
</form>
    
</div>
   <!--  <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
       
        <li> <a class="page-scroll" href="#">Home</a> </li>
        <li> <a class="page-scroll" href="#">About</a> </li>
        <li> <a class="page-scroll" href="press-releases.html">Releases</a> </li>
        <li> <a class="page-scroll" href="#">Calendar</a> </li>
        <li> <a class="page-scroll" href="#">Case Studies</a> </li>
        <li> <a class="page-scroll" href="#">Blog</a>
       </li><li>
          <form class="navbar-form" role="search">
        <div class="input-group">
         
            <input type="text" class="form-control search-custom-form" placeholder="Search Clients" name="q">
           <div class="input-group-btn">
                <button class="btn btn-default search-custom-button" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </li>

      </ul>
    </div> -->
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>

<!-- Header -->
<div id="page-content">
