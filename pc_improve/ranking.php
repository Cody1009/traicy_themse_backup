<?php
// エラーを画面に表示(1を0にすると画面上にはエラーは出ない)
	//ini_set('display_errors',1);
?>

<span class="rankingTitle">人気記事</span>

<ul class="hide_u600">


<?php
/* ここから下は
 * パソコン用のサイドバー用のランキングボックス
 */ ?>

<?php
wpp_get_mostpopular(
	array(
		// PV集計期間（daily, weekly, monthly, all から選べます）
		'range' => 'daily',
		// PV数順で並び替え（comments を指定するとコメント順になります）
		'order_by' => 'views',
		// post OR page 
		'post_type' => 'post',
		// 表示数
		'limit' => 5,
		// 日付
		'stats_date' => 1,
		'stats_date_format' => 'F j 日',
		// HTMLのラッパー　開始タグ
		'wpp_start' => '<div class="ranking">',
		// HTMLのラッパー　終了タグ
		'wpp_end' => '</div>',
		// サムネイル画像の幅
		'thumbnail_width' => '120',
		// サムネイル画像の高さ
		'thumbnail_height' => '80',
		// HTML部分
		'post_html' => '
		<article class="item">
		<a href="{url}">
		<div class="titleLeft"><div>
		{text_title}
		<br>
		<div>{views} pv　{date}</div>
		</div></div>
		<div class="thumbRight">{thumb_img}</div>
		</a>
		</article>'
	)
);
?>



</ul> <!-- hide_u600 -->

