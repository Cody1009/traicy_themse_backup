<!-- ヘッダー読み込み -->
<?php get_header(); ?>

<section id="primary" class="site-content">
<div id="content" role="main">

<header class="archive-header">
	<h1 class="archive-title"><span class="catpage"><?php the_search_query(); ?></span> の検索結果</h1>
</header><!-- .archive-header -->

<?php if ( have_posts() && get_search_query()) : ?>
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

	<!-- 検索ワードに該当する記事がない場合の処理-->
	<?php else: ?>
	<!-- 検索ワードを出力-->
	<div class = "no_result">
	<div class = "result">
		<br><h1>見つかりません</h1>
		<ul style="list-style:none;"><li>ご指定の検索条件(<?php the_search_query(); ?>)に合う投稿がありませんでした。他のキーワードでもう一度検索してみてください。</li></ul>
	<br>
	</div>
	</div>
	<?php endif; ?>

</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
