<?php get_header(); ?>

<section id="primary" class="site-content">
<div id="content" role="main">

<header class="archive-header">
<h1 class="archive-title"><span class="catpage"><?php the_author(); ?></span> の記事一覧</h1>
</header><!-- .archive-header -->

<?php if ( have_posts()) : ?>
<div class="allCategory">

<?php $count = 0; ?>
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'content-archive' );
			$count++;
		endwhile;
	?>

	<?php
		$t = $count % 2;
		for( $i=0; $i<(2-$t); $i++ ) {
			echo "<div class='catCards' style='background:none;'></div>";
		}
	 ?>


<?php	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div>
	<br style="clear:both;">
<?php endif; ?>

</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
