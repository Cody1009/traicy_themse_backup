<script type="text/javascript">
jQuery(function($){
	$('.main-gallery').flickity({
	// 最初に表示させる画像（セル）を指定できます。0から始まります。
	initialIndex: 0,
		// 各画像（セル）の基準位置をしていできます。デフォルトはcenter。
		cellAlign: 'center',
		// trueでラッパー内に収まるようにスライドします。
		contain: true,
		// trueで無限スライダーになります。
		wrapAround: true,
		// 画像（セル）を読み込んだ後、再度、位置を調節します。デフォルトはtrue
		imagesLoaded: true,
		// falseにするとフリックできなくなります。
		draggable: true,
		// falseで矢印ボタンを非表示にします。
		prevNextButtons: true,
		// falseで下のドットを非表示にします。
		pageDots: true,
		// キーボードの左右で切り替えできるかどうかを指定します。
		accessibility: true,
		// 自動再生するかどうかを指定します。trueで3秒間隔で切り替わります。
		//autoPlay: 800 //数字を指定するとその速さで切り替わります。
		freeScroll: false,
	});
});
</script>

<div class="articleCards">
	<div class="main-gallery">
<?php
$getNum = 6 + 1;
for($j=0;$j<6;$j++) :
	//カテゴリの選択
	if($j==0)	$tmp = array(0);
	else if($j==1)	$tmp = array(82);
	else if($j==2)	$tmp = array(1844);
	else if($j==3)	$tmp = array(2287);
	else if($j==4)	$tmp = array(213,870,243,7,242);
	else if($j==5)	$tmp = array(760,272,606,443,1,8939,8481,159,92,8461,1399);
$get_posts_args = array(
	'category' => $tmp,
	'numberposts' => $getNum,
	'order' => 'DESC',
);
$article = get_posts( $get_posts_args );
//カテゴリの選択
?>
		<div class="gallery-cell">
			<div class="category">
<?php

switch ($j) {
case 0:
	echo '<a href="https://www.traicy.com/newarticle">新着</a>';
	break;
case 1:
	echo '<a href="https://www.traicy.com/airline/sale">セール</a>';
	break;
case 2:
	echo '<a href="https://www.traicy.com/airline/route">運行情報</a>';
	break;
case 3:
	echo '<a href="https://www.traicy.com/travelinformation">旅行情報</a>';
	break;
case 4:
	echo '<a href="https://www.traicy.com/hotel">乗り物・コラム</a>';
	break;
case 5:
	echo '<a href="https://www.traicy.com/information">その他</a>';
	break;
default:
	break;
}
?>
			</div>
<?php //記事の表示 ?>
			<a href="<?php echo $article[0] -> guid; ?>">
				<div class="newest">
					<div class="imgLeft">
<?php
if(has_post_thumbnail($article[0] -> ID)){
	echo get_the_post_thumbnail($article[0] -> ID, array(158,158));
}else{
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
}
?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $article[0] -> post_title; ?></p>
						<p class="articleText"><?php echo mb_substr(strip_tags($article[0] -> post_content),0,100).'...'; ?></p>
					</div>
				</div>
			</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
			<a href="<?php echo $article[$i] -> guid; ?>">
				<div class="old">
					<div class="imgLeft">
<?php
if(has_post_thumbnail($article[$i] -> ID))	echo get_the_post_thumbnail($article[$i] -> ID, array(158,158));
else	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $article[$i] -> post_title; ?></p>
					</div>
				</div> <!-- old -->
			</a>
<?php endfor; ?>
<?php //記事の表示 ?>
		</div> <!-- gallery-cell -->
<?php endfor; ?>

<?php
/**
 * feedを読み込む
 */ ?>
<?php
 include_once( ABSPATH . WPINC . '/feed.php' );
$rss = fetch_feed('http://release.traicy.com/feed');
if ( !is_wp_error( $rss ) ) {
	$rss->set_cache_duration(3600); /* cache間隔の設定 */
	$rss->init();
	$maxitems = $rss->get_item_quantity( $getNum );
	$rss_items = $rss->get_items( 0, $maxitems );
}
?>

		<div class="gallery-cell">
			<div class="category">
				<a href="http://release.traicy.com/" title="カテゴリー名">リリース</a>
			</div>
<?php
$item = $rss_items[0];
$first_img = '';
// 記事中の1枚目の画像を取得
if ( preg_match( '/<img.+?src=[\'"]([^\'"]+?)[\'"].*?>/msi', $item->get_content(), $matches ) ) {
	$first_img = $matches[1];
}
?>

	<?php if ( !empty( $maxitems ) ) : ?>
	<a href="<?php echo $item -> get_permalink(); ?>">
	<div class="newest">
	<div class="imgLeft">
<?php
if(!empty( $first_img )) {
	echo '<img src="',esc_attr( $first_img ),'">';
}else{
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
}
?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $item -> get_title(); ?></p>
						<p class="articleText"><?php echo mb_substr(strip_tags($item-> get_title()),0,100).'...'; ?></p>
					</div>
				</div>
			</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
<?php $item = $rss_items[$i]; ?>
<?php 
$first_img = '';
// 記事中の1枚目の画像を取得
if ( preg_match( '/<img.+?src=[\'"]([^\'"]+?)[\'"].*?>/msi', $item->get_content(), $matches ) ) {
	$first_img = $matches[1];
}
?>
	<a href="<?php echo $item -> get_permalink(); ?>">
	<div class="old">
	<div class="imgLeft">
<?php
if(!empty( $first_img )) {
	echo '<img src="',esc_attr( $first_img ),'">';
}else{
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
} ?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $item -> get_title(); ?></p>
					</div>
				</div>
			</a>
<?php endfor; ?>
<?php //記事の表示 ?>
<?php endif; ?> <!-- !empty( $maxitems ) -->
		</div> <!-- gallery-cell -->
		<div class="gallery-cell">

<?php $article = wmp_get_popular( array( 'limit' => 7, 'post_type' => 'post', 'range' => 'daily' ) ); ?>

			<div class="category">ランキング</div>
<?php //記事の表示 ?>
			<a href="<?php echo $article[0] -> guid; ?>">
				<div class="newest">
					<div class="imgLeft">
<?php
	if(has_post_thumbnail($article[0] -> ID)){
		echo get_the_post_thumbnail($article[0] -> ID, array(158,158));
	}else{
		echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
	}
?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $article[0] -> post_title; ?></p>
						<p class="articleText"><?php echo mb_substr(strip_tags($article[0] -> post_content),0,100).'...'; ?></p>
					</div>
				</div>
			</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
			<a href="<?php echo $article[$i] -> guid; ?>">
				<div class="old">
					<div class="imgLeft">
<?php
if(has_post_thumbnail($article[$i] -> ID))	echo get_the_post_thumbnail($article[$i] -> ID, array(158,158));
else	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
?>
					</div>
					<div class="articleRight">
						<p class="title"><?php echo $article[$i] -> post_title; ?></p>
					</div>
				</div> <!-- old -->
			</a>
<?php endfor; ?>
<?php //記事の表示 ?>
		</div> <!-- gallery-cell -->

	</div> <!-- main-gallery -->
</div> <!-- articleCards -->

