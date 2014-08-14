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
    <meta name="description" content="<?php echo $this->description; ?>">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/images_share.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/fonts/ok-icon-fonts/icon-fonts.css" />
    
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes" />

    <!-- Twitter Card -->
    <meta name="twitter:site" content="@okmemo">
    <meta name="twitter:url" content="">
    <meta name="twitter:title" content="<?php echo $this->title; ?>">
    <meta name="twitter:description" content="<?php echo $this->post->article; ?>">
    <meta name="twitter:image" content="">

    <!-- For Open Graph Protocol -->
    <meta property="og:type" content="image" />
    <meta property="og:title" content="<?php echo $this->title; ?>" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="<?php echo $this->description; ?>">
    <meta property="og:url" content="" />
    <meta property="og:locale" content="zh_CN" />
    <meta name="weibo: article:create_at" content="<?php echo $this->post->created; ?> +0800" />
    <meta name="weibo: article:update_at" content="<?php if($this->post->modified){echo $this->post->modified;}else{echo $this->post->created; } ?> +0800" />

    <?php if(isset($this->other_posts) && count($this->other_posts) > 0): ?>
    <!-- 相关资源预载 -->
    <?php foreach($this->other_posts as $prefetch_post): ?>
    <link rel="prefetch" href="<?php echo $prefetch_post->url; ?>" />
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($this->other_posts) && count($this->other_posts) > 0): ?>
    <!-- 相关资源预载 -->
    <?php foreach($this->other_posts as $prefetch_post): ?>
    <link rel="prerender" href="<?php echo $prefetch_post->url; ?>" />
    <?php endforeach; ?>
    <?php endif; ?>

    <link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad-retina.png">
    <!-- <link rel="apple-touch-startup-image" href="startup.png"> -->
    
    <meta name="renderer" content="webkit">
    <!--[if ie]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" /><![endif]-->
    <!--[if lt IE 9]>
    	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <![endif]-->

   <script type="text/javascript">
    if (!window.location.origin) window.location.origin = window.location.protocol+"//"+window.location.host;
   </script>
</head>
<body style="-webkit-overflow-scrolling:touch" class="<?php if($this->in_social_page): ?>in_social_page<?php endif; ?> <?php if($this->logged_in): ?>logged-in<?php else: ?>visitor<?php endif; ?> <?php if(isset($this->is_author) && $this->is_author): ?>author<?php endif; ?>">
    <?php if(isset($this->post)): ?>
        <div id="header">
            <div class="share-title">
              <div class="title-con">
                    <h1><span class="images-num"></span>张最棒的图片分享</h1>
                    <?php if($this->logged_in && isset($this->is_author)): ?><input type="text" name="title" size="16" value="16张最棒的图片分享"><?php endif; ?>
                    <div class="logo"></div>
                    <!-- <div class="logo"></div> -->
              </div>     
            </div>
         </div>
     <div id="wrapper">

        <div id="main-con">
            <div class="state">
                <div class="shere-time"><a href="#"><?php echo $this->post->created; ?> OKMEMO  |</a><span class="editor">分享者:</span><a href="#"><?php echo $this->author->nickname; ?></a></div>
                <div class="read-times"><span><?php echo $this->post->read_times; ?></span><span>阅读人次</span></div>
                <div class="share-op">
                  <span>分享</span>
                  <a href="#" class="weibo" title="新浪微博"><span class="ok-icon-sinaweibo-line icon-font"></span></a>
                  <a href="#" class="wechat" title="微信" ><span class="ok-icon-wechat-line icon-font"></span></a>
                  <a href="#" class="qzone" title="QQ空间" ><span class="ok-icon-qqzone-line icon-font"></span></a>
                  <a href="#" class="twitter" title="twitter" ><span class="ok-icon-twitter-line icon-font"></span></a>
                  <a href="#" class="qqwb" title="腾讯微博" ><span class="ok-icon-tencentweibo-line icon-font"></span></a>
                  <a href="#" class="douban" title="豆瓣网" ><span class="ok-icon-douban-line icon-font"></span></a>
                </div>
            </div>
           
            
            <div class="description">
              <div class="title"><span>描述:</span></div>
              <div></div>
              <div class="show-des">
                <pre><?php if(isset($this->post->description) && $this->post->description != null): ?><?php echo $this->post->description; ?><?php else: ?>人世间最美好的事莫过美图分享，今天选出<span class="images-num"></span>张最棒的图片集结成页，供大家分享，使美人美景更多人欣赏，您可在此段描述分享心得和编辑语。亦可多左侧便签中挑出内容放置与此<?php endif; ?></pre>
                <?php if($this->logged_in && isset($this->is_author)): ?><textarea name="share-info" class="expand20-1000"></textarea><?php endif; ?>
              </div>
            </div>
         


          <div id="share_iframe" style="-webkit-overflow-scrolling:touch">
              <!-- 图片区域 -->
              <iframe src="" id="images_pad" style="overflow:hidden"></iframe>
          </div>

        <div id="share_component"><!--其他分享组件-->
            <h2>分享此图片墙</h2>
            <div class="Share-module">
                <div class="share-custom" style="text-align:center;">
                    <a title="分享到新浪微博" class="share-weibo"><span class="ok-icon-sinaweibo-line icon-font"></span></a>
                    <a title="分享到微信" class="share-wechat"><span class="ok-icon-wechat-line icon-font"></span></a>
                    <a title="分享到QQ空间" class="share-qzone"><span class="ok-icon-qqzone-line icon-font"></span></a>
                    <a title="分享到QQ好友" class="share-qqim"><span class="ok-icon-QQfriend-line icon-font"></span></a>   
                    <a title="分享到豆瓣网" class="share-douban"><span class="ok-icon-douban-line icon-font"></span></a>
                    <a title="分享到腾讯微博" class="share-qqwb"><span class="ok-icon-tencentweibo-line icon-font"></span></a>
                    <a title="分享到印象笔记" class="share-evernote"><span class="ok-icon-evernote-line icon-font"></span></a>
                    <a title="分享到email" class="share-qmail"><span class="ok-icon-email-line icon-font"></span></a>
                    <a title="分享到google+" class="share-gplus"><span class="ok-icon-google icon-font"></span></a>
                    <a title="分享到gmail" class="share-gmail"><span class=" ok-icon-gmail-line icon-font"></span></a>
                    <a title="分享到twitter" class="share-twitter"><span class="ok-icon-twitter-line icon-font"></span></a>
                    <a title="分享到facebook" class="share-facebook"><span class="ok-icon-facebook-line icon-font"></span></a>
                    <a title="分享到tumblr" class="share-tumblr"><span class="ok-icon-tumblr-line icon-font"></span></a>
                    
                </div>
            </div>
        </div>

            <div>
                <div class="editor-info">
                  <div>
                    <p><a class="portrait" href="#"><img width="80" height="80" src="<?php echo SITE_URL; ?>/layout/images/avatar.jpeg"></a></p>
                    <p class="editor"><strong><?php echo $this->author->nickname; ?></strong></p>
                    <p class="per-sig">喜欢追求女神的吊丝，文学和摄影爱好者。创新设计实验室交互设计师。</p>
                  </div>
                </div>

                <div class="other-share">
                  <h2><?php if(isset($this->is_author) && $this->is_author): ?>我<?php else: ?>Ta<?php endif; ?>的其它分享</h2>
                  <iframe src="" id="other_share" frameborder="0"></iframe>
                </div>
           </div>

            <!-- 加载javascript文件 -->
            <?php if(!empty($this->js) && count($this->js) > 0): ?>
                <?php foreach($this->js as $js): ?>
                <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/<?php echo $js; ?>"></script>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- 载入数据 -->
            <script type="text/javascript">
            <?php if(isset($this->items) && count($this->items) > 0): ?>
            __items = <?php echo json_encode($this->items); ?>;
            <?php endif; ?>

            <?php if(isset($this->other_posts) && count($this->other_posts) > 0): ?>
            __other_posts = <?php echo json_encode($this->other_posts); ?>;
            <?php endif; ?>

            var __post = new Post({id:<?php echo $this->post_id; ?>});
            </script>

          <?php endif; ?>

          <div class="ok-ji">
            <div class="logo">
              <a href="#"></a>
              <p>这个星球上最高效最有趣的便签工具</p>
            </div>
          </div>
     
    </div>
  </div>

    <script type="text/javascript">
    //微信分享
    var dataForWeixin = {
        appId: "",
        img:    (__items && __items.length > 0) ? __items[0].url : "",
        url:    location.href,
        title:  document.title,
        desc:   $(".show-des pre").text(),
        fakeid: ""
    };

    (function(){
        var onBridgeReady=function(){
            // 发送给好友;
            WeixinJSBridge.on('menu:share:appmessage', function(argv){
                WeixinJSBridge.invoke('sendAppMessage',{
                    "appid":        dataForWeixin.appId,
                    "img_url":      dataForWeixin.img,
                    "img_width":    "120",
                    "img_height":   "120",
                    "link":             dataForWeixin.url,
                    "desc":             dataForWeixin.desc,
                    "title":            dataForWeixin.title
                }, function(res){});
            });

            // 分享到朋友圈;
            WeixinJSBridge.on('menu:share:timeline', function(argv){
                WeixinJSBridge.invoke('shareTimeline',{
                "img_url":dataForWeixin.img,
                "img_width":"120",
                "img_height":"120",
                "link":dataForWeixin.url,
                "desc":dataForWeixin.desc,
                "title":dataForWeixin.title
                }, function(res){});
            });

            // 分享到微博;
            WeixinJSBridge.on('menu:share:weibo', function(argv){
                WeixinJSBridge.invoke('shareWeibo',{
                "content":dataForWeixin.title+' '+dataForWeixin.url,
                "url":dataForWeixin.url
                }, function(res){});
            });

            // 分享到Facebook
            WeixinJSBridge.on('menu:share:facebook', function(argv){
                WeixinJSBridge.invoke('shareFB',{
                "img_url":dataForWeixin.img,
                "img_width":"120",
                "img_height":"120",
                "link":dataForWeixin.url,
                "desc":dataForWeixin.desc,
                "title":dataForWeixin.title
                }, function(res){});
            });
        };

        if(document.addEventListener){
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        }else if(document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady'   , onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady' , onBridgeReady);
        }

        //关注指定的微信号
        function weixinAddContact(name){
            WeixinJSBridge.invoke("addContact", {webtype: "1",username: name}, function(e) {
                WeixinJSBridge.log(e.err_msg);
                //e.err_msg:add_contact:added 已经添加
                //e.err_msg:add_contact:cancel 取消添加
                //e.err_msg:add_contact:ok 添加成功
                if(e.err_msg == 'add_contact:added' || e.err_msg == 'add_contact:ok'){
                    //关注成功，或者已经关注过
                }
            })
        }

    // WeixinJSBridge.call('hideToolbar');                 //隐藏右下面工具栏
    // WeixinJSBridge.call('showToolbar');                 //显示右下面工具栏
    // WeixinJSBridge.call('hideOptionMenu');              //隐藏右上角三个点按钮。
    // WeixinJSBridge.call('showOptionMenu');              //显示右上角三个点按钮。

    // 在Android版本的微信环境中，依然可以通过如下两种方式进行微信（公众）号的推广：
    // 1、<a href="weixin://contacts/profile/微信号原始ID（如：gh_dd4b2c2ada8b）">Baidufe</a>
    // 这种方法能直接打开该号的微信资料页，直接关注；但获取原始ID比较麻烦。

    // 2、<a href="weixin://contacts/profile/微信号（如：www_baidufe_com）">Baidufe</a>
    // 这种方法会打开“加入到通讯录"的界面，然后再是资料页
    })();
</script>
</body>
</html>