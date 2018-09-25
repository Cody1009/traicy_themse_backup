

<div id="primary" class="site-content">
	<div id="content" role="main">	

<!-- top -->
<?php get_template_part('compe-box-sp'); ?>
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
	//キャンペーン情報
?>

<?php
$today = date( 'Ymd' );
$args = array(
	'numberposts' => -1,
	'orderby' => 'date',
	'post_status' => 'publish',
	'relation'=>'AND',
	//'order' => 'DESC',
	'meta_query' => array(
		array(
			'key'=>'CampaignStart',
			'value'=> $today,
			'compare' => '<=',
			'type' => 'DATETIME'
		),
		array(
			'key'=>'CampaignEnd',
			'value' => $today,
			'compare' => '>=',
			'type'=>'DATETIME'
		),
	),
);
$posts = get_posts($args);
?>

<h1>イベント・キャンペーン情報</h1>

<div id="campaign">
<?php
foreach($posts as $item) : 
  $id = $item -> ID;
?>
	<a href="<?php echo $item -> guid; ?>">
		<div class="campaignContents">
			<div class="campaginContentsRight">
				<div class="campaignTitle">
<?php shortingTitle($item -> post_title,75); ?>
				</div>
                <div class="campaignDate">
                    <?php 
                      $startTime = strtotime(get_post_meta($id, 'CampaignStart' ,true));
                      $endTime   = strtotime(get_post_meta($id, 'CampaignEnd' ,true));
                      
                      // google カレンダーのリンク用
                      $baseUrl = "https://www.google.com/calendar/event?action=TEMPLATE&";
                      $params = array(
                        "text" => $item -> post_title,
                        "dates" => date('Ymd',  $startTime) . "/" . date('Ymd',  $endTime),
                        "details" => $item -> guid
                      );

                      $gcalenderUrl = $baseUrl . http_build_query($params);
                    ?>
					期間 :
					<?php echo str_replace('<br>', '', date('n月j日',  $startTime)); ?>
					〜
					<?php echo str_replace('<br>', '', date('n月j日',  $endTime)); ?>
                    &nbsp;aaa
                    <object class="addGcalender"><a href="<?php echo $gcalenderUrl; ?>" >
                      <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                    </a></object>
				</div>
			</div>
			<div class="campaignImg">
<?php
	if(has_post_thumbnail($id)){
		echo get_the_post_thumbnail($id,'thumbnail');
	}else{
		echo '<img src="'.get_stylesheet_directory_uri().'/images/dummy_600_400.jpg">';
	}
?>
			</div>
		</div>
	</a>
<?php endforeach; ?>

<script>
// Googleカレンダーのイベントパブリング防止用
// 特にhoverの時に使いたいがうまく動いていない
$(".addGcalender").on("click", function(e){ e.stopPropagation(); });
//$(".addGcalender").on("mouseover", function(e){ e.stopPropagation(); });
</script>

</div> <!-- campaign -->

	</div><!-- #content -->
</div><!-- #primary -->

