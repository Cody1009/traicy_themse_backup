<?php
// エラーを画面に表示(1を0にすると画面上にはエラーは出ない)
	//ini_set('display_errors',1);
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
//var_dump($posts);
?>

<ul class="hide_u600">

<div id="campaign">

<h1>イベント・キャンペーン情報</h1>

<?php /*
<?php foreach($posts as $item) : 
	$id = $item -> ID;
?>
	<a href="<?php echo $item -> guid; ?>">
		<div class="campaignContents">
			<div>
				<div class="campaignTitle">
					<?php shortingTitle($item -> post_title,100); ?>
				</div>
				<div class="campaignDate">
						期間 :
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignStart' ,true)))); ?>
						〜
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignEnd' ,true)))); ?>
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
 */ ?>

<div class="flexBox">
<div class="right">

<?php for($i=0;$i<(count($posts) / 2);$i++) :
	$item = $posts[$i];
	$id = $item -> ID;
?>
	<a href="<?php echo $item -> guid; ?>">
		<div class="campaignContents">
			<div>
				<div class="campaignTitle">
					<?php shortingTitle($item -> post_title,100); ?>
				</div>
				<div class="campaignDate">
						期間 :
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignStart' ,true)))); ?>
						〜
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignEnd' ,true)))); ?>
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
<?php endfor; ?>

</div>

<div class="left">

<?php for($i=(count($posts) / 2);$i<count($posts);$i++) : 
	$item = $posts[$i];
	$id = $item -> ID;
?>
	<a href="<?php echo $item -> guid; ?>">
		<div class="campaignContents">
			<div>
				<div class="campaignTitle">
					<?php shortingTitle($item -> post_title,100); ?>
				</div>
				<div class="campaignDate">
						期間 :
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignStart' ,true)))); ?>
						〜
						<?php echo str_replace('<br>', '', date('n月j日', strtotime(get_post_meta($id, 'CampaignEnd' ,true)))); ?>
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
<?php endfor; ?>


</div>

</div>

</div> <!-- campaign -->
</ul> <!-- hide_u600 -->


