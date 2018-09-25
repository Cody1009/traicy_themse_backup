  <!-- 広告 -->
  <center>
    <amp-ad
        type="adsense"
        width="300"
        height="60"
        data-ad-client="ca-pub-3121993718200907"
        data-ad-slot="6481590338"
    ></amp-ad>
  </center>
  <!-- 広告 -->

  <header class="entry-header">
  <!-- メタ情報  -->
  <span class="hideSpan" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
    <span class="hideSpan" itemprop="url"><?php the_post_thumbnail_url('medium'); ?></span>
    <span class="hideSpan" itemprop="width">400</span>
    <span class="hideSpan" itemprop="height">600</span>
    <span class="hideSpan" itemprop="mainEntityOfPage"><?php the_permalink(); ?></span>
    <span class="hideSpan" itemprop="datePublished"><?php echo get_the_time('c') ?></span>
    <span class="hideSpan" itemprop="dateModified"><?php echo get_the_modified_time('c') ?></span>
  </span>
  
  <!-- パンくずリスト -->
  <?php $breadcrumbDom = breadcrumb(false); ?>
  <?php
    // ごめんなさい！
    echo preg_replace('/style=".*?"/', 'class="_breadcrumb"', $breadcrumbDom);
  ?>
  <div class="clear"></div>
  <!-- パンくずリスト -->

  <h1 itemprop="name" class="entry-title" itemprop="headline"><abbr itemprop='headline'><?php the_title(); ?></abbr></h1>

  <div class="date updated">
    <p>
      <?php the_time('Y年n月j日 g:i a'); ?>
      <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>" title="<?php get_the_author() ?>" class="vcard author">
        <span class="fn" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <span itemprop="name"><?php echo get_the_author(); ?></span>
        </span>
      </a>
    </p>
    <div class="clear"></div>
  </div><!-- .date -->

  <!-- シェアボタン -->
  <?php include("share-buttons-amp.php"); ?>
  <!-- シェアボタン -->

  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php $content = get_the_content(); ?>
    <?php
    // {{{ 記事本文
    $content = apply_filters( 'the_content', get_the_content() );
    //echo $content;
    $content = str_replace( ']]>', ']]&gt;', $content );
    $content = preg_replace("/<img/i", "<amp-img width='300' height='200' layout='responsive'", $content);

    // SNSのshareボタンを消す処理
    // wordpressプラグインなのでif (!$myAmp)が書けないと思ったので追加
    $result = preg_replace("/(<div class='wp_social_bookmarking_light'>.*?)<p>/", "<p>", $content);

    echo $result;
    // }}}
    ?>

    <span class="sponsor">スポンサーリンク</span>

    <!-- ad st -->
    <center>
      <amp-ad
        type="adsense"
        width="300"
        height="250"
        data-ad-client="ca-pub-3121993718200907"
        data-ad-slot="6481590338"
      ></amp-ad>
    </center>
    <!-- ad end -->
    <amp-analytics type="googleanalytics" id="analytics1">
      <script type="application/json">
      {
        "vars": {
          "account": "UA-24526458-1"
        },
        "triggers": {
          "trackPageview": {
            "on": "visible",
            "request": "pageview"
          }
        }
      }
      </script>
    </amp-analytics>
  </div><!-- .entry-content -->

  <footer>
    <!-- タグ -->
    <div class="entry-meta tag_box">
      <?php the_tags('<p>タグ : ',' ','</p>'); ?>
    </div>
    <!-- タグ -->
    
    <!-- シェアボタン -->
    <?php include("share-buttons-amp.php"); ?>
    <!-- シェアボタン -->
    
    <!-- popin -->
    <center>
      <amp-ad
        type="popin"
        width=300
        height=568
        layout=responsive
        heights="(min-width:1907px) 39%, (min-width:1200px) 46%, (min-width:780px) 64%, (min-width:480px) 98%, (min-width:460px) 167%, 196%"
        data-mediaid="traicy_amp"
      ></amp-ad>
    </center>
    <!-- popin -->
  </footer><!-- .entry-meta -->
