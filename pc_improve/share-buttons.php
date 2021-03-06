<?php
  $article_url  = get_the_permalink();
  $article_desc = get_the_title();

  $hatena_url   = "https://b.hatena.ne.jp/add?mode=confirm&url=" . $article_url . "&title=" . urlencode($article_desc);
  $twitter_url  = "http://twitter.com/intent/tweet?text=" . urlencode($article_desc) . "&amp;url=" . $article_url . "&amp;";
  $facebook_url = "https://www.facebook.com/sharer/sharer.php?u=" . $article_url . "&t=" . urlencode($article_desc) ;
  $google_url   = "https://plus.google.com/share?url=" . $article_url;
  $line_url     = "http://line.me/R/msg/text/?" . urlencode($article_desc) . " " . $article_url;

  // JSON形式のデータを取得
  /*
  $url = "http://graph.facebook.com/?id=" . rawurlencode($article_url);
  $json_data = file_get_contents("http://graph.facebook.com/?id=" . rawurlencode($article_url));
  $arr = json_decode($json_data, true);
  $facebook_like_count = isset($arr['share']) ? $arr['share']['share_count'] : 0;
   */
?>
<div class="share_buttons">
  <div class="sns_icon facebook_like">
    <div class="fb-like" data-href="<?php echo $article_url; ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
  </div>

  <div class="sns_icon facebook">
    <a href='<?php echo $facebook_url; ?>' target="_blank" title="Facebookでシェア"><img src="https://www.traicy.com/images/facebook.png" alt="facebook"></a>
  </div>

  <div class="sns_icon google">
    <a href='<?php echo $google_url; ?>' target="_blank" title="Google+で共有"><img src="https://www.traicy.com/images/google.png" alt="googleplus"></a>
  </div>

  <div class="sns_icon line">
    <a href='<?php echo $line_url; ?>' target="_blank" title="LINEに送る"><img src="https://www.traicy.com/images/line.png" alt="LINE"></a>
  </div>

  <div class="sns_icon hatena">
    <a href='<?php echo $hatena_url; ?>' target="_blank" title="はてなブックマークに登録"><img src="https://www.traicy.com/images/hatena.svg" alt="はてなブックマーク"></a>
  </div>

  <div class="sns_icon twitter">
    <a href='<?php echo $twitter_url; ?>' title="twitterでシェア"><img src="https://www.traicy.com/images/twitter.png" alt="twitter"></a>
  </div>
</div>
