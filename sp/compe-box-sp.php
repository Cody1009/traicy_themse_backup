<!-- flickpage -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . "/dist/flickity.min.css" ?>">
<script src="<?php echo get_stylesheet_directory_uri() . "/dist/flickity.pkgd.min.js" ?>"></script>
<!-- flickpage -->

<script type="text/javascript">
jQuery(function($){
	$('#main-gallery').flickity({
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

<div id="articleCards">
<div id="main-gallery">

<?php
$getNum = 4 + 1;
for($j=0;$j<6;$j++) :
	//カテゴリの選択
	if($j==0)	$tmp = array(0);
	else if($j==1)	$tmp = array(82);
	else if($j==2)	$tmp = array(1844);
	else if($j==3)	$tmp = array(2287);
	else if($j==4)	$tmp = array(213,870,243,7,242);
	else if($j==5)	$tmp = array(760,272,606,443,1,8939,8481,159,92,8461,1399);
	//カテゴリに合う記事をデータベースから引っ張ってくる
	$get_posts_args = array(
		'category' => $tmp,
		'numberposts' => $getNum,
		'order' => 'DESC',
	);
	$article = get_posts( $get_posts_args );
?>
<?php
switch ($j) {
	case 0:
		$href = "/newarticle";
		$detail = "新着";
	break;
	case 1:
		$href = "/airline/sale";
		$detail = "セール";
	break;
	case 2:
		$href = "/airline/route";
		$detail = "運航情報";
	break;
	case 3:
		$href = "/travelinformation";
		$detail = "旅行情報";
	break;
	case 4:
		$href = "/hotel";
		$detail = "乗り物・コラム";
	break;
	case 5:
		$href = "/information";
		$detail = "その他";
	break;
	default:
		break;
}
?>
<div id="gallery-cell">
	<header id="galleryTitle">
		<div class="continue"><a href="<?php echo $href; ?>">一覧を見る<i class="fa fa-chevron-right"></i></a></div>
		<h1 class="category"><?php echo $detail; ?></h1> <!-- category -->
	</header>
<?php //記事の表示 ?>
	<a href="<?php echo $article[0] -> guid; ?>" id="aCompe">
		<div id="compeNewest">
			<div id="compeImgLeft">
<?php
if(has_post_thumbnail($article[0] -> ID)) :
	echo get_the_post_thumbnail($article[0] -> ID,'medium');
else :
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
endif;
?>
			</div> <!-- imgLeft -->
			<div id="compeArticleRight"><?php echo $article[0] -> post_title; ?></div>
		</div> <!-- compeNewest -->
	</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
	<a href="<?php echo $article[$i] -> guid; ?>" id="aCompe">
		<div id="compeOld">
			<div id="compeImgLeft">
<?php
if(has_post_thumbnail($article[$i] -> ID))	echo get_the_post_thumbnail($article[$i] -> ID, 'thumbnail');
else	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
?>
			</div> <!-- compeImgLeft -->
			<div id="compeArticleRight"><?php echo $article[$i] -> post_title; ?></div>
		</div> <!-- old -->
	</a>
<?php endfor; ?>
<?php //記事の表示 記事のfor文?>
</div> <!-- gallery-cell -->
<?php endfor; ?>
<?php カテゴリのfor文 ?>

<?php
/**
 * feedを読み込む
 */ ?>
<?php
// var_dump(ABSPATH . WPINC . '/feed.php');
include_once( ABSPATH . WPINC . '/feed.php' );
$rss = fetch_feed('http://release.traicy.com/feed');
if ( !is_wp_error( $rss ) ) {
	$rss->set_cache_duration(3600); /* cache間隔の設定 */
	$rss->init();
	$maxitems = $rss->get_item_quantity( $getNum );
	$rss_items = $rss->get_items( 0, $maxitems );
}
?>

<div id="gallery-cell">
	<header id="galleryTitle">
		<div class="continue">
			<a href="http://release.traicy.com/" title="カテゴリー名">一覧を見る<i class="fa fa-chevron-right"></i></a>
		</div>
		<h1 class="category">リリース</h1>
	</header>

<?php
$item = $rss_items[0];
$first_img = '';
// 記事中の1枚目の画像を取得
if ( preg_match( '/<img.+?src=[\'"]([^\'"]+?)[\'"].*?>/msi', $item->get_content(), $matches ) ) {
	$first_img = $matches[1];
	preg_match('/resize=(\d{3,})%2C(\d{3,})/', $first_img, $size);
	$oriSize = $size;
 	$size[1] /= ($size[2] / 210);
	$first_img = str_replace($oriSize[1],(int)$size[1],$first_img);
	$first_img = str_replace($oriSize[2],210,$first_img);
}
?>

<?php if ( !empty( $maxitems ) ) : ?>
	<a href="<?php echo $item -> get_permalink(); ?>" id="aCompe">
		<div id="compeNewest">
			<div id="compeImgLeft">
<?php
if(!empty( $first_img )) {
	echo '<img src="',esc_attr( $first_img ),'">';
}else{
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
}
?>
			</div> <!-- compeImgLeft -->
			<div id="compeArticleRight">
<?php
	$title = $item -> get_title();
	$len = strlen($title);
	$con = $len < 40 ? '' : '...';
?>
			<?php echo mb_substr(strip_tags($title),0,40).$con; ?>
			</div> <!-- compeArticleRight -->
		</div>
	</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
<?php $item = $rss_items[$i]; ?>
<?php
$first_img = '';
// 記事中の1枚目の画像を取得
if ( preg_match( '/<img.+?src=[\'"]([^\'"]+?)[\'"].*?>/msi', $item->get_content(), $matches ) ) {
	$first_img = $matches[1];
	preg_match('/resize=(\d{3,})%2C(\d{3,})/', $first_img, $size);
	$oriSize = $size;
 	$size[1] /= ($size[2] / 60);
	$first_img = str_replace($oriSize[1],(int)$size[1],$first_img);
	$first_img = str_replace($oriSize[2],60,$first_img);
}
?>
	<a href="<?php echo $item -> get_permalink(); ?>" id="aCompe">
		<div id="compeOld">
			<div id="compeImgLeft">
<?php
if(!empty( $first_img )) {
	echo '<img src="',esc_attr( $first_img ),'">';
}else{
	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
} ?>
			</div>
			<div id="compeArticleRight"><?php echo mb_substr(strip_tags($item -> get_title()),0,60).'...'; ?></div>
		</div>
	</a>
<?php endfor; ?>
<?php //記事の表示 ?>
<?php endif; ?> <!-- !empty( $maxitems ) -->
</div> <!-- gallery-cell -->

<?php // ランキングの表示 ?>

<div id="gallery-cell">
	<header id="galleryTitle"><h1 class="category">ランキング</h1></header>
<?php //記事の表示 ?>
<?php $article = wmp_get_popular( array( 'limit' => 7, 'post_type' => 'post', 'range' => 'daily' ) ); ?>
	<a href="<?php echo $article[0] -> guid; ?>" id="aCompe">
		<div id="compeNewest">
			<div id="compeImgLeft">
<?php
	if(has_post_thumbnail($article[0] -> ID)){
		echo get_the_post_thumbnail($article[0] -> ID, 'medium');
	}else{
		echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
	}
?>
			</div> <!-- compeImgLeft -->
			<div id="compeArticleRight"><?php echo $article[0] -> post_title; ?></div>
		</div> <!-- compeNewest -->
	</a>
<?php for($i=1;$i<$getNum;$i++) : ?>
	<a href="<?php echo $article[$i] -> guid; ?>" id="aCompe">
		<div id="compeOld">
			<div id="compeImgLeft">
<?php
if(has_post_thumbnail($article[$i] -> ID))	echo get_the_post_thumbnail($article[$i] -> ID, 'thumbnail');
else	echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
?>
			</div>
			<div id="compeArticleRight"><?php echo $article[$i] -> post_title; ?></div>
		</div> <!-- old -->
	</a>
<?php endfor; ?>
<?php //記事の表示 ?>
</div> <!-- gallery-cell -->

</div> <!-- main-gallery -->
</div> <!-- articleCards -->
