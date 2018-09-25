<?php
echo '<article  id="post-',the_ID(),'"',post_class(),'>';
if( is_sticky() && is_home() && !is_paged() ){
	echo '<div class="featured-post">';
	_e( 'Featured post', 'twentytwelve' );
	echo '<div>';
}
?>

<header class="entry-header">

<?php if ( ! post_password_required() && ! is_attachment() && ! is_single()) : ?>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
<?php endif; ?>

<?php //記事が存在するかをチェック?>
<?php if ( is_single() ) : ?>

	<div class="breadAndCat">
	<?php
		breadcrumb();
		$tmp = get_the_category( '' );
		foreach($tmp as $item) : ?>
			<span class="category hide_u600"><a href="<?= get_category_link( $item -> cat_ID ); ?>"><?= $item -> name; ?></a></span>
		<?php endforeach; ?>
	</div>

<?php	//タイトルを表示 ?>
	<h1 itemprop="name" class="entry-title" itemprop="headline"><abbr itemprop="headline"> <?php the_title(); ?></abbr></h1>
	<div class="date updated">
		<p>
<?php	//記事の更新日時を表示	?>
			<span itemprop="datePublished" content="',the_time('Y-n-jTg:i'),'"><?php the_time('Y年n月j日 g:i a'); ?></span>
<?php	//著者情報 ?>
<?= '<a href="',get_author_posts_url( get_the_author_meta( 'ID' ) ), '" title="',get_the_author(),'" class="vcard author"><span class="fn" itemprop="author" itemscope itemtype="http://schema.org/Person">',get_the_author(),'</span></a>'; ?>
		</p>
	</div>

<?php else : ?>

	<h1 class="entry-title">
		<?= '<a href="',the_permalink(),'" rel="bookmark">',the_title(),'</a>'; ?>
	</h1>

<?php endif; ?>

</header>

<?php if( is_single() ) : ?>
	<div class="entry-content">

<?php
	/**
	 * 中平作成のphpを使用して，SNSのマークをそれぞれ挿入
	 */ ?>
<?php include "share-buttons.php"; ?>

<?php
// セール情報の場合はGoogleカレンダーに追加するボタンを表示
$startTime = strtotime(get_post_meta($id, 'CampaignStart' ,true));
$endTime   = strtotime(get_post_meta($id, 'CampaignEnd' ,true));

if ($startTime && $endTime):
  // google カレンダーのリンク用
  $baseUrl = "https://www.google.com/calendar/event?action=TEMPLATE&";
  $params = array(
    "text" => $post->post_title,
    "dates" => date('Ymd',  $startTime) . "/" . date('Ymd',  $endTime),
    "details" => $post->guid
  );
  $gcalenderUrl = $baseUrl . http_build_query($params);
?>

	<div class="addGcalender singlePage">
		<a href="<?php echo $gcalenderUrl; ?>">
			<button><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;Googleカレンダーに追加</button>
		</a>
	</div> <!-- addGcalender -->
<?php else: ?>

<div style="height: 10px;"></div>

<?php endif; ?>


<?php /**
	* 記事の表示　*/ ?>
<?php the_content( __( '<span class="meta-nav"></span>', 'twentytwelve' ) ); ?>

<?php /**
	ページを区切る方法
 */ ?>
<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>

	<?php if(get_the_author_id() == '28') : ?>
		<h2><?php the_author_nickname(); ?></h2>
		<div class="description">
			<div class="authordesc"><?php the_author_meta('description'); ?></div>
			<div class="image"><?= get_avatar( get_the_author_id(), 85 ); ?></div>
		</div>
	<?php endif; ?>

<?php	/**
	 * 広告挿入
 */ ?>
	<span class="sponsor">スポンサーリンク</span>
	<?php	if(!is_NoAdsense())	get_template_part('ad-336-280-bottom'); ?>
</div> <!-- entry-content -->

<?php /**
	* 記事下
	*/ ?>
<?php get_template_part('bottom-article'); ?>


<footer class="entry-meta tag_box">
	<?php the_tags('<p>タグ : ',' ','</p>'); ?>
</footer>

<?php
	/**
	 * 中平作成のphpを使用して，SNSのマークをそれぞれ挿入
	 */ ?>
<?php get_template_part('share-buttons'); ?>


<!-- popinタグ（レコメンド） -->
<?php /**
	 * popinのレコメンドが挿入される
	 * divのほうでjsを読み込んでくれている
 */ ?>
<div id="_popIn_recommend"></div>
	<script type="text/javascript">
	(function() {
		var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.charset = "utf-8"; pa.async = true;
		pa.src = window.location.protocol + "//api.popin.cc/searchbox/traicy.js";
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
	})();
	</script>
<!-- popinタグ（レコメンド） -->

<?php //ほとんど起きない条件 ?>
<?php else : ?>
		<div class="entry-summary" itemprop="headline">
			<?php the_excerpt(); ?>
		</div>
<?php endif; ?>

		<?php //}}} ?>
</article><!-- #post -->
