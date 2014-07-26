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
    
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes" />
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
<body>
    <div id="container">
        <?php if($this->posts && count($this->posts) >0): ?>
        <?php foreach($this->posts as $post): ?>
            <?php $thumbnail = $post->get_thumbnail(); ?>
            <?php if($thumbnail): ?>
                <div class="item" data-id="<?php echo $thumbnail->pid; ?>">
                    <div class=""><img src="<?php echo $thumbnail->feature_img->url; ?>" width="<?php echo $thumbnail->feature_img->width; ?>" height="<?php echo $thumbnail->feature_img->height; ?>"></div>
                    <div class="title"><?php echo $thumbnail->title; ?></div>
                    <div class="desc"><?php echo $thumbnail->description; ?></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>