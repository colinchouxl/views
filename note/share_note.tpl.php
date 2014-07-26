<!DOCTYPE html>
<!-- [if lt IE 7]><html class="ie ie6"><![endif]-->
<!-- [if IE 7]><html class="ie ie7"><![endif]-->
<!-- [if IE 8]><html class="ie ie8"><![endif]-->
<!-- [if !(IE 6) | !(IE 7) | !(IE 8)]><!--><html lang="zh_CN"><!--<![endif]-->
<head>
    <title><?php echo $this->title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="IDL Innovative Design Lab">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="<?php echo get_description(process_sharetext($this->post->article)); ?>">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/note-share-icon-font.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/note-sharing.css" />

    
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes" />

    <!-- Twitter Card -->
    <meta name="twitter:site" content="@okmemo">
    <meta name="twitter:url" content="<?php echo $this->social_card['url']; ?>">
    <meta name="twitter:title" content="<?php echo $this->social_card['title']; ?>">
    <meta name="twitter:description" content="<?php echo $this->social_card['description']; ?>">
    <meta name="twitter:image" content="<?php echo $this->social_card['image']; ?>">

    <!-- For Open Graph Protocol -->
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $this->social_card['url']; ?>" />
    <meta property="og:title" content="<?php echo $this->social_card['title']; ?>" />
    <meta property="og:description" content="<?php echo $this->social_card['description']; ?>" />
    <meta property="og:image" content="<?php echo $this->social_card['image']; ?>" />
    <meta property="og:locale" content="zh_CN" />
    <meta name="weibo: article:create_at" content="<?php echo $this->post->created; ?> +0800" />
    <meta name="weibo: article:update_at" content="<?php if($this->post->modified){echo $this->post->modified;}else{echo $this->post->created; } ?> +0800" />
    

    <link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad-retina.png">
    
    <!-- webkit prerender -->
    <?php if(isset($this->other_posts) && count($this->other_posts) > 0): ?>
        <?php foreach($this->other_posts as $other_post): ?>
            <?php if(trim($other_post->article) != ""): ?>
    <link rel="prerender" href="<?php echo SITE_URL; ?>/note/share/<?php echo $other_post->hash; ?>">
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <meta name="renderer" content="webkit">
    <!--[if ie]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" /><![endif]-->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type="text/javascript" src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <![endif]-->

   <script type="text/javascript">
    if (!window.location.origin) window.location.origin = window.location.protocol+"//"+window.location.host;
   </script>
</head>
<body class="<?php if($this->in_social_page): ?>in_social_page<?php endif; ?> <?php if($this->logged_in): ?>logged-in<?php else: ?>visitor<?php endif; ?> <?php if(isset($this->is_author) && $this->is_author): ?>author<?php endif; ?>">
  <div id="wrapper">
    <div id="header">
        <div class="share-title">
          <div class="title-con">
            <h1><?php echo get_title(process_sharetext($this->post->article)); ?></h1>
            <input type="text" name="title" size="16" value="16张最棒的图片分享">
            <!-- <div class="logo"></div> -->
          </div>     
        </div>
    </div>
    <div id="main-con">
        <div class="state">
            <div class="shere-time"><a href="#"><?php echo $this->post->created; ?> OKMEMO  |</a><span class="editor">分享者:</span><a href="#"><?php echo $this->author->nickname; ?></a></div>
            <div class="read-times"><span><?php echo $this->post->read_times; ?></span><span>阅读人次</span></div>
            <div class="share-op">
              <span>分享</span>
              <a href="#" title="新浪微博" ><span class="ok-icon-share-sinaweibo-line icon-font"></span></a>
              <a href="#" title="微信" ><span class="ok-icon-share-wechat-line icon-font"></span></a>
              <a href="#" title="QQ空间" ><span class="ok-icon-share-qqzone-line icon-font"></span></a>
              <a href="#" title="人人网" ><span class="ok-icon-share-twitter-line icon-font"></span></a>
              <a href="#" title="腾讯微博" ><span class="ok-icon-share-tencentweibo-line icon-font"></span></a>
              <a href="#" title="豆瓣网" ><span class="ok-icon-share-douban-line icon-font"></span></a>
            </div>
        </div>

      <div id="share_cont" style="-webkit-overflow-scrolling:touch">
            <!-- 图片区域 -->
            <div class="furnish"><span class="ok-icon-share-comma icon-font"></span></div>
        <article>
            <p><?php echo $this->post->article; ?></p>         
        </article>
      </div>
      <div class="save-cont"><a href="#">存入OK笔记</a></div>
      <div class="line"><span></span></div>

      <div class="phone-hidden"><!--其他分享组件-->
        <h2>分享此页</h2>
        <div class="Share-module">
          <div class="bshare-custom" style="text-align:center;">
            <a title="分享到新浪微博" class="bshare-sinaminiblog"><span class="ok-icon-share-sinaweibo-line icon-font"></span></a>
            <a title="分享到微信" class="bshare-weixin"><span class="ok-icon-share-wechat-line icon-font"></span></a>
            <a title="分享到QQ空间" class="bshare-qzone"><span class="ok-icon-share-qqzone-line icon-font"></span></a>
            <a title="分享到人人网" class="bshare-renren"><span class="ok-icon-share-twitter-line icon-font"></span></a>
            <a title="分享到腾讯微博" class="bshare-qqmb"><span class="ok-icon-share-tencentweibo-line icon-font"></span></a>
            <a title="分享到豆瓣网" class="bshare-douban"><span class="ok-icon-share-douban-line icon-font"></span></a>
            <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"><span class="ok-icon-share-more icon-font"></span></a>
          </div>
        </div>
      </div>

      <div>
        <div class="editor-info">
          <div>
            <p><a class="portrait" href="#"></a></p>
            <p class="editor"><strong><?php echo $this->author->nickname; ?></strong></p>
            <p class="per-sig">喜欢追求女神的吊丝，文学和摄影爱好者。创新设计实验室交互设计师。</p>
          </div>
        </div>

        <div class="other-share">
          <h2>TA的其它分享</h2>
          <div class="other-con">

            <?php if(isset($this->other_posts) && count($this->other_posts) > 0): ?>
            <?php foreach($this->other_posts as $other_post): ?><?php if(trim($other_post->article) != ""): ?><div class="item"><a href="<?php echo SITE_URL; ?>/note/share/<?php echo $other_post->hash; ?>" class="block">
              <div class="cover"></div>
              <div class="mask">
                <div class="single-con">
                  <div class="furnish"><span class="ok-icon-share-comma icon-font"></span></div>
                  <div class="title"><h3><?php echo $other_post->get_title(); ?></h3></div>
                  <div class="share-time"><span><?php echo $other_post->get_display_time(); ?></span></div>
                </div>
              </div>
            </a>
            <div class="content"><?php echo $other_post->article; ?></div>
            </div><?php endif; ?><?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>

      <div class="ok-ji">
        <div class="logo">
          <a href="/"></a>
          <p>这个星球上最高效最有趣的便签工具</p>
        </div>
      </div>
     
    </div>
  </div>
        <!-- 加载javascript文件 -->
        <?php if(!empty($this->js) && count($this->js) > 0): ?>
            <?php foreach($this->js as $js): ?>
            <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/<?php echo $js; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
</body>
</html>