<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pr_company
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-summary">
		<div class="row">
	<div class="col-sm-3">
	 <a href="<?php echo get_permalink($post);?>"><?php echo get_the_post_thumbnail($post, 'pr-slider-thumb' , array( 'class' => 'img-responsive' ));?></a>
</div><div class="col-sm-9">
<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php pr_company_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
		<?php the_excerpt(); ?>
		</div>
	</div><!--row-->
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php pr_company_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
