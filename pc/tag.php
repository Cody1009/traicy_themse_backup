<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
<!-- タグページの装飾はここだよ! -->
				<div class="tag-description">
					<?php $tag_description = tag_description();?>
					<?php if( !empty($tag_description) ): ?>
						<h2><?php single_tag_title(); ?></h2>
						<div><?php echo $tag_description;?></div>
					<?php endif; ?>
				</div>
<!-- タグページの装飾はここまでだよ! -->
				<h1 class="archive-title"><?php printf(single_tag_title( '', false ).'の記事一覧' ); ?></h1>

			</header><!-- .archive-header -->


<div class="allCategory">

	<?php
		$count = 0;
		while ( have_posts() ) : the_post();
			get_template_part( 'content-archive' );
			$count++;
		endwhile;
	?>

	<?php
		$t = $count % 3;
		for( $i=0; $i<(3-$t); $i++ ) {
			echo "<div class='catCards' style='background:none;'></div>";
		}
	 ?>

<?php	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
