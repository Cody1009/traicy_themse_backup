<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">
<!-- top -->
<?php get_template_part('slider-menu'); ?>
<!-- top -->

<!-- ad st -->
<!-- スマフォ版 -->
<div class="sp_ad">
	<center>
<script async defer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Traicy-New-Top-ArticleFooter-left -->
	<ins class="adsbygoogle"
		style="display:inline-block;width:300px;height:250px"
		data-ad-client="ca-pub-3121993718200907"
		data-ad-slot="7111125932"></ins>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
	</center>
</div>
<!-- スマフォ版 -->
<!-- ad en -->

<?php
	get_template_part('front-traicy-talk');
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<h1 id="friendsTitle">Traicyと友達になろう！</h1>
<div id="makeFriends">
	<div id="addLine">
		<a href="https://line.me/ti/p/%40traicy"><img height=”36″ border=”0″ alt=”友だち追加数” src="https://biz.line.naver.jp/line_business/img/btn/addfriends_ja.png"></a>
	</div>
	<div id="followTwitter">
		<a href="https://twitter.com/traicycom" class="twitter-follow-button" data-show-count="false" style="position : relative; display : block; height : 100%; width : 100%; ">Follow @traicycom</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
	<div id="followFeedly">
		<a href='http://cloud.feedly.com/#subscription%2Ffeed%2Fhttps%3A%2F%2Fwww.traicy.com%2Findex.rdf'  target='blank'><img id='feedlyFollow' src='https://s3.feedly.com/img/follows/feedly-follow-rectangle-flat-big_2x.png' alt='follow us in feedly' width='131' height='56'></a>
	</div>
	<div id="likeFacebook">
		<div class="fb-like" data-href="https://www.facebook.com/traicycom" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
	</div>
	<div id="addHatena">
		<a href="http://b.hatena.ne.jp/entry/www.traicy.com/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label-counter" data-hatena-bookmark-lang="ja" data-hatena-bookmark-width="140" data-hatena-bookmark-height="25" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
	</div>
	<div id="followTwitterSale">
		<a href="https://twitter.com/TraicyAirticket" class="twitter-follow-button" data-show-count="false">Follow @TraicyAirticket</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
	<div id="traicyMailMagazine">
		<a href="https://talk.traicy.com/signup" alt="TraiyTalk">Traicyのメールマガジンの登録はこちら！！</a>
	</div>
</div>

<sytle>

</style>

<?php get_template_part('campaign-information-sp'); ?>

<?php
	$options = get_option( 'wifiDaily' );
?>


<h1 class="kakakuwifi">WIFI価格比較</h1>
<div id="wifiFrontContainer">

<?php $end = count($options);
for($i=0;$i<($end-1);$i++) : ?>

<?php if($i==0)	: ?>
	<div class="left">
<?php elseif($i==3): ?>
	<div class="right">
<?php endif; ?>

<?php

$params = array();
switch ($i) {
	case 0:
		$params = [ 'china', '中国', 102, 85 ];
		break;
	case 1:
		$params = [ 'korea', '韓国', 94, 78 ];
		break;
	case 2:
		$params = [ 'usa', 'アメリカ', 6, 0 ];
		break;
	case 3:
		$params = [ 'taiwan', '台湾', 100, 83 ];
		break;
	case 4:
		$params = [ 'thai', 'タイ', 113, 82 ];
		break;
	case 5:
		$params = [ 'usa', 'ハワイ', 61, 50 ];
		break;
	default:
		break;
}
?>
	<a href="javascript:void(0)" onclick="document.defaultLink<?php echo $i;?>.submit(); return false;" style="height:60px">
			<div id="national">
				<div id="wifiFrontImg">
					<img src="<?php echo get_stylesheet_directory_uri() , '/images/national-flag/' , $params[0] , '.png'; ?>">
		 		</div> <!-- wifiFrontImg -->
				<div id="wifiFrontInfo">
					<h2><?= $params[1]; ?>	</h2>
			 	<div class="cost"><?= $options[$i]; ?>円/日</div>
				</div> <!-- wifiFrontInfo -->
				<div class="guide"><i class="fa fa-arrow-right" aria-hidden="true"></i></div>
			</div> <!-- wifiFrontInfo -->
		</a>
		<form name="defaultLink<?php echo $i;?>" method="post" action="https://www.traicy.com/wifi">
			<input type="hidden" name="country" value=<?= $params[2]; ?>>
			<input type="hidden" name="use_days" value=1>
			<input type="hidden" name="compensationType" value=7001>
			<input type="hidden" name="receipt" value=1>
			<input type="hidden" name="returnPlace" value=1>
			<input type="hidden" name="frontWifi" value=<?= $params[3]; ?>>
		</form>
<?php if($i==2 || $i==5)	: ?>
</div> <!-- right or left -->
<?php endif; ?>
<?php endfor; ?>
	<a href="https://www.traicy.com/wifi" style="height : 40px; line-height:40px;display:block; position:relative; background-color:white;font-size:20px;text-align:center;color:var(--main-color);border-top: 1px solid var(--bar-color);">
		Traicy Wifi価格比較 こちらから！
	</a>
</div> <!-- wifiFrontContainer -->

<!-- お知らせ -->
<?php get_template_part('notice'); ?>


	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
