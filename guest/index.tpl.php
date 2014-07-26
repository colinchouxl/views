<!-- 
        __                                    
  ____ |  | __   _____   ____   _____   ____  
 /  _ \|  |/ /  /     \_/ __ \ /     \ /  _ \ 
(  <_> )    <  |  Y Y  \  ___/|  Y Y  (  <_> )
 \____/|__|_ \ |__|_|  /\___  >__|_|  /\____/ 
            \/       \/     \/      \/        
 What matters isn't the lifespan, but richness.

 -->
<!DOCTYPE html>
<!-- [if lt IE 7]><html class="ie ie6 lt9"><![endif]-->
<!-- [if IE 7]><html class="ie ie7 lt9"><![endif]-->
<!-- [if IE 8]><html class="ie ie8 lt9"><![endif]-->
<!-- [if !IE]><!--><html lang="zh_CN"><!--<![endif]-->
<head>
    <script type="text/javascript">
    if (!window.location.origin) window.location.origin = window.location.protocol+"//"+window.location.host;
    if(window.localStorage){
        <?php if(isset($this->lang)): ?>
        if(localStorage.lang == undefined) localStorage.lang = JSON.stringify(<?php echo json_encode($this->lang); ?>);
        <?php endif; ?>
    }
   </script>

    <title><?php echo $this->title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="IDL Innovative Design Lab">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/fonts/ok-icon-fonts/icon-fonts.css">
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/lightbox.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/guest.css" />
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/nejabgnmljggkeofllackkopgjgdcamp">
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
</head>
<body class="note-app visitor" data-last-app="note-app">
    <div id="wrapper">
        <!-- 新便签添加框 -->
        <header class="main-header">
            <div class="header-wrapper">
            <!-- 菜单与用户信息 -->
            <div class="menu">
                <div class="user-info">
                    <span class="email"><?php echo $this->lang->WELCOME; ?>!</span><a href="#" class="login-btn">请登录</a>
                </div>
                <a href="#" class="config" title="<?php echo $this->lang->CONFIGURE; ?>"><span class="ok-icon-config icon-font"></span></a>
            </div>
            <!-- 新便签 -->
            <div id="blank_sheet">
                <div class="note-con new">
                    <form class="note">
                        <div class="field-con">
                            <div class="entities-con"><div class="img-entity"></div></div>
                            <div class="note editable expand0-600" contenteditable="true" spellcheck=false tabIndex="-1"></div>
                        </div>
                        <div class="bottom">
                            <a href="#" class="submit" title="<?php echo $this->lang->SUBMIT; ?>"><span class="ok-icon-submit icon-font"></span></a>
                            <span class="hint"><italic>Press <i>[Cmd/Ctrl+S]</i>&nbsp; to save or click --></italic></span>
                        </div>
                        <div class="checkbox"></div>
                    </form>
                </div>
            </div>
            </div>
        </header>

    <div id="app_wrapper">
        <!-- =========================便签区域结束=========================-->
        <div id="note" class="app-section">
            <div id="notes_con">
                <div class="inner-wrapper searching">
                    <div id="search_area">
                        <div class="fixed-shadow"><div class="left-shadow"></div><div class="middle-shadow"></div><div class="right-shadow"></div></div>
                        <div class="search-options">
                        <div class="by-keywords">
                            <div class="field-con"><span class=" ok-icon-search icon-font"></span><input class="search-field" autocomplete=off spellcheck=false type="search" name="keyword" /><a class="close-input" href="#"></a></div>
                        </div>
                        
                        <!-- 如果不是pined tag的id，则让其展开 -->
                        
                        <div class="by-tag custom">
                            <!-- 上部分为被固定的tag，默认包括任务与笔记，用户可拖拽其他的tag上来作为快捷方式 -->
                            <div class="pined-tags">
                            </div>

                            <!-- 其余的标签需要有分页的功能 -->
                            <!-- 按最后查看时间排序 -->
                            <!-- 新加的标签放在第一个位置上（最后查看时间为添加时间） -->
                            <div class="custom-tags">
                                <div class="tags-con">
                                                                                              
                                    <!-- 添加标签 -->
                                    <div class="new-tag-con">
                                        <input name="tag_name" class="tag-name" size="3" placeholder="    ,    " type="text">
                                        <input class="submit"  type="button">
                                        <span class="ok-icon-complete icon-font"></span> 
                                    </div>
                                    <a href="#" class="new-btn"><span class="ok-icon-submit icon-font"></span></a>
                                </div>
                                <a href="#" id="edit_tag"><span class="ok-icon-eidt-tag icon-font"></span></a><a href="#" id="edit_tag_finish"><span class="ok-icon-eidt-tag icon-font"></span></a>
                            </div>
                            <a href="#" class="expand-tags">
                                <span class="ok-icon-tagExpand icon-font"></span>
                                <span class="ok-icon-tagBack icon-font"></span>
                            </a>
                        </div>
                        </div>

                        <!-- 提示用户安装 -->
                        <div id="install_area">
                            <div class="install-btn"><a href="#"><p class="btn">安装浏览器扩展</p><p class="btn hint">正在安装...</p><p class="info">安装<span class="browser-name"></span>扩展，体验完整功能</p></a></div>
                        </div>
                    </div>

                    <!-- 搜索结果展示区域 -->
                    <div id="search_results">
                        <div id="title_sec">
                            <h2>
                                <span class="title">
                                    
                                </span>
                                <span class="num"></span>
                            </h2>
                            <!-- 打开图片墙按钮 -->
                            <a href="#" class="img-wall-btn"></a>
                        </div>
                        <div class="by-keywords result"></div>
                        <div class="archived result"></div>
                        <div class="by-tag result">
                            
                        </div>
                    </div>
                </div><!-- Inner Wrapper -->
            </div>

            <!-- 正在加载图标 -->
            <div id="loading"></div>

            <!-- 点击记事底部菜单所出现的内容 -->
            <div id="note_ops">
                <div class="del-confirm section">
                    <p><?php echo $this->lang->DELETE_CONFIRMATION; ?></p>
                    <div>
                        <div class="confirm"><a href="#" class="button"><?php echo $this->lang->CONFIRM; ?></a></div><div class="cancel"><a href="#" class="button"><?php echo $this->lang->CANCEL; ?></a></div>
                    </div>
                </div>
                <div class="cal section">
                    <!-- 日历 由jQuery UI Datepicker 插件加载 -->
                    <div class="cal-con"></div>
                </div>
                <div class="info section">
                    <!-- 便签的添加信息 -->
                    <div class="detail">
                    <div class="modified-time"><label><?php echo $this->lang->MODIFIED; ?>: </label><span class="content"></span></div>
                    <div class="create-time"><label><?php echo $this->lang->CREATED; ?>: </label><span class="content"></span></div>
                    <div class="device"><label><?php echo $this->lang->DEVICE; ?>: </label><span class="content"></span></div>
                    <div class="location"><label><?php echo $this->lang->LOCATION; ?>: </label><span class="content"></span></div>
                    <div class="source"><label><?php echo $this->lang->SOURCE; ?>: </label><a target="_blank" class="content" href="#"></a></div>
                    </div>
                </div>
                
                <div class="share section">
                    <!-- 各大社交组件分享图标 -->
                    <div class="default">
                        <div class="share-icon"><div><a href="#" class="qqmail component"><span class="ok-icon-email-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="weibo component"><span class="ok-icon-sinaweibo-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="douban component"><span class="ok-icon-douban-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="qzone component"><span class="ok-icon-qqzone-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="tqq component"><span class="ok-icon-tencentweibo-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="gmail component"><span class="ok-icon-wechat-line icon-font"></span></a></div></div>
                        <div class="share-icon last"><div><a href="#" class="gmail component"><span class="ok-icon-wechat-line icon-font"></span></a></div></div>
                    </div>
                </div>

                <div class="tags section">
                    <!-- 自定义创建标签 -->
                    <div class="custom">
                        <!-- 由js插入数据 -->
                        <div class="new-tag-con">
                            <input name="tag_name" class="tag-name" size="3" placeholder="    ,    " type="text" />
                            <input class="submit" type="button" />
                            <span class="ok-icon-complete icon-font"></span>
                        </div>     
                        <a href="#" class="new-btn"><span class="ok-icon-submit"></span></a>
        
                    </div>
                </div>
            </div>
            <a href="#" id="backtotop"></a>
        </div><!-- note app ends -->
        <!-- =========================便签区域结束========================= -->
    </div><!-- 应用包含容器#app_wrapper结束 -->
    </div>
    <!-- #wrapper结束 -->

    <!-- =========================设置页面========================= -->
    <div id="settings">
        <div class="settings-wrapper">
            <header>
                <h2 class="main-title"><?php echo $this->lang->SETTINGS; ?><a href="#" class="back"></a></h2>
               <!--  <nav>
                    <a href="#"><?php echo $this->lang->ACCOUNT_SETTINGS; ?></a>
                    <a href="#"><?php echo $this->lang->APPEARANCE_SETTINGS; ?></a>
                    <a href="#"><?php echo $this->lang->SHARE_SETTINGS; ?></a>
                    <a href="#"><?php echo $this->lang->LOCATION_SETTINGS; ?></a>
                    <a href="#"><?php echo $this->lang->SYNC_SETTINGS; ?></a>
                    <a href="#" class="last"><?php echo $this->lang->DEVICE_LOGIN_MANAGEMENT; ?></a>
                </nav> -->
            </header>

            <div class="sections">
                <!-- 用户设置，包括昵称，短网址，icon -->
                <section class="user">
                    <h3><?php echo $this->lang->ACCOUNT_SETTINGS; ?><a class="logout" href="<?php echo SITE_URL; ?>/user/logout"><?php echo $this->lang->LOGOUT; ?></a></h3>
                    <div class="inner-con">
                        <div class="nickname">
                            <label><?php echo $this->lang->NICKNAME; ?></label><div class="name-con"><span>Vincenrow</span><input name="nickname" value="" maxlength="15"/></div>
                        </div>
                        <div class="password">
                            <label><?php echo $this->lang->PASSWORD; ?></label><div class="password-con"><a href="#" id="reset_pwd"><?php echo $this->lang->MODIFY_PASSWORD; ?></a><a href="#" class="cancel"><?php echo $this->lang->CANCEL; ?></a></div>
                            <form>
                                <label>当前密码</label>
                                <div><input name="cur_pwd" id="cur_pwd" type="password" /></div>
                                <label>新密码</label>
                                <div><input name="new_pwd" id="new_pwd" type="password" /></div>
                                <label>重输新密码</label>
                                <div><input name="re_new_pwd" id="re_new_pwd" type="password" /></div>
                                <input type="button" id="reset_pw_btn" value="提交" />
                            </form>
                        </div>
                        <div class="fancyurl unavailable">
                            <label>个性短网址</label><a href="#" class="url">http://eff.do/vincenrow</a><a href="#" class="configure">设置</a>
                        </div>
                    </div>
                </section><!-- 用户设置结束 -->

                <!-- 界面设置，包括主题，字体，语言 -->
                <section class="ui">
                    <h3><?php echo $this->lang->APPEARANCE_SETTINGS; ?></h3>
                    <div class="inner-con">
                        <div class="langs">
                            <label><?php echo $this->lang->UI_LANGUAGE; ?></label>
                            <ul class="langs-con">
                                <li class="lang choosed"><a href="#" data-lang="zh_cn">简体中文</a></li>
                                <li class="lang"><a href="#" data-lang="zh_tw">繁体中文</a></li>
                                <li class="lang"><a href="#" data-lang="jp">日文</a></li>
                                <li class="lang"><a href="#" data-lang="en">英语</a></li>
                            </ul>
                        </div>
                        <div class="favicon check">
                            <label><?php echo $this->lang->SHOW_FAVICON; ?></label>
                            <p class="status"><span class="on"><?php echo $this->lang->ON; ?></span><span class="off">已关闭</span></p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                        <div class="themes unavailable">
                            <label><?php echo $this->lang->CHOOSE_THEME; ?></label>
                            <div class="themes-con">
                                <a class="theme green choosed" data-color="" data-name=""></a>
                                <a class="theme green" data-color="" data-name=""></a>
                                <a class="theme green" data-color="" data-name=""></a>
                                <a class="theme green" data-color="" data-name=""></a>
                                <a class="theme green" data-color="" data-name=""></a>
                            </div>
                        </div>
                        <div class="fonts unavailable">
                            <div class="fonts-con">
                                <label><?php echo $this->lang->FONT_SETTING; ?></label>
                                <ul>
                                    <li class="font choosed"><a href="#" data-font="">微软雅黑</a></li>
                                    <li class="font"><a href="#" data-font="">Nixie One</a></li>
                                    <li class="font"><a href="#" data-font="">Gill Sans</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section><!-- 界面设置结束 -->

                <!-- 分享组件管理 -->
                <section class="share unavailable">
                    <h3><?php echo $this->lang->SHARE_SETTINGS; ?></h3>
                    <div class="inner-con">
                        <div class=""></div>
                        <div class="img-share"></div>
                    </div>
                </section><!-- 分享组件管理结束 -->

                <!-- 地理位置开关管理 -->
                <section class="geo">
                    <h3><?php echo $this->lang->LOCATION_SETTINGS; ?></h3>
                    <div class="inner-con">
                        <span class="desc">开启地理位置可以帮助您快速查找过往便签，地理位置的信息只有您本人可以看到。</span>
                        <div class="geo-web on check">
                            <label>网页版地理位置</label>
                            <p class="status"><span class="on"><?php echo $this->lang->ON; ?></span><span class="off"><?php echo $this->lang->OFF; ?></span>&nbsp;<span class="loc"></span></p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                    </div>
                </section><!-- 地理位置开关管理结束 -->

                <!-- 各大记事账户同步管理 -->
                <section class="accounts unavailable">
                    <h3><?php echo $this->lang->SYNC_SETTINGS; ?></h3>
                    <div class="inner-con">
                        <span class="desc">开启地理位置可以帮助您快速查找过往便签，地理位置的信息只有您本人可以看到。</span>
                        <div class="evernote open-app check">
                            <label>Evernote</label>
                            <p class="status">
                                <span class="on"><?php echo $this->lang->ON; ?></span><span class="off"><?php echo $this->lang->OFF; ?></span><span class="safe">|同步正常</span>
                                <a href="#" class="configure"><?php echo $this->lang->CONFIGURE; ?></a>
                            </p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                        <div class="gtask open-app check">
                            <label>Google Task</label>
                            <p class="status">
                                <span class="on"><?php echo $this->lang->ON; ?></span><span class="off"><?php echo $this->lang->OFF; ?></span><span class="safe">|同步正常</span>
                                <a href="#" class="configure"><?php echo $this->lang->CONFIGURE; ?></a>
                            </p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                        <div class="maiku open-app check">
                            <label>麦库笔记</label>
                            <p class="status">
                                <span class="on"><?php echo $this->lang->ON; ?></span><span class="off"><?php echo $this->lang->OFF; ?></span><span class="safe">|同步正常</span>
                                <a href="#" class="configure"><?php echo $this->lang->CONFIGURE; ?></a>
                            </p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                        <div class="youdao open-app check">
                            <label>有道</label>
                            <p class="status">
                                <span class="on"><?php echo $this->lang->ON; ?></span><span class="off"><?php echo $this->lang->OFF; ?></span><span class="safe">|同步正常</span>
                                <a href="#" class="configure"><?php echo $this->lang->CONFIGURE; ?></a>
                            </p>
                            <div class="checkbox">
                                <img class="checkmark" src="<?php echo SITE_URL; ?>/layout/images/tick_32.png" width="18">
                            </div>
                        </div>
                    </div>
                </section><!-- 各大记事账户同步管理结束 -->

                <!-- 设备认证管理 -->
                <section class="devices-auth unavailable">
                    <h3><?php echo $this->lang->DEVICE_LOGIN_MANAGEMENT; ?></h3>
                    <div class="inner-con">
                        <span class="desc">管理您的多台设备，当您取消其选项后，该设备必备重新输入密码方可访问账户。</span>
                        <div class="device">
                            <label></label>
                            <p class="status">上次访问:<span class="date"></span> 在<span class="location"></span></p>
                        </div>
                    </div>
                </section><!-- 设备认证管理结束 -->

                <section class="about"><!-- 关于模块 -->
                    <h3>关于</h3>
                    <div class="inner-con">
                        <div class="versions">版本号：<span>1.0.0.1</span></div>
                        <div class="update"><a href="#">检测更新</a></div>
                        <div class="contact">联系Q群:228781627</div>
                        <div class="feedback">
                            <a href="#">意见反馈</a>
                            <div class="feedback-con">
                                <a href="#" class="close"><span class="ok-icon-undefinded02 icon-font"></span></a>
                                <form action="" mothod="">
                                    <span>*</span>
                                    <textarea class="info" id="info" cols="20" rows="8" placeholder="骚年，哪有不爽，来喷吧！"></textarea>
                                    <input type="text"class="user-contact" placeholder="求联系方式(邮箱/QQ/电话)！">
                                    <input type="submit" id="submit" value="提交">
                                </form>    
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- =========================设置页面结束========================= -->

    <!-- 标签颜色菜单 -->
    <div id="colors">
        <?php if($this->colors): ?>
        <?php $color_num = count($this->colors); ?>
        <?php $cube_width = 100/($color_num+2); ?>
        <div class="colors-con">
            <?php foreach($this->colors as $color): ?>
            <div class="color-con" style="width:<?php echo $cube_width; ?>%"><a href="#" class="color" data-color="<?php echo $color; ?>" style="background:<?php echo $color; ?>"></a></div>
            <?php endforeach; ?>
            <div class="color-con nocolor" style="width:<?php echo $cube_width; ?>%"><a href="#" class="color nocolor" style="background:#cccccc"></a></div>
            <div class="trash-bin" style="width:<?php echo $cube_width; ?>%"><a class="remove-tag" href="#"></a></div>
        </div>
        <div class="triangle-border"></div>
        <div class="triangle"></div>
        <?php endif; ?>
    </div>

    <!-- 在框架中打开记事中的链接 -->
    <!-- =========================点击链接展开浮窗页====开始========================= -->
    <div id="new_windows">
        <div class="link-frame" style="-webkit-overflow-scrolling:touch">
            <div class="frame-header">
                <div class="operations">
                    <a href="#" class="blank"><span class="ok-icon-blank icon-font"></span></a>
                    <a href="#" class="close"><span class="ok-icon-undefinded02 icon-font"></span></a>
                </div>
            </div>
           <iframe src="">
            
           </iframe>
        </div>   
    </div>
    <!-- =========================点击链接展开浮窗页====结束========================= -->




     <!-- =========================点击链接展开浮窗页====开始========================= -->
    <div id="image_wall">
        <div class="wall-op"><div>
            <a href="#" class="refresh"></a>
            <a href="#" class="close"></a>
            </div>
        </div>
        <div class="image-wall drop-down">
            <div class="wall-header">
                <div class="wall-title">
                    <h1><span class="title">image-wall</span><span class="num">(51)</span></h1>
                </div>
                <div class="img-tags">
                    <div class="tags-con">
                        <div class="fixed-shadow"><div class="left-shadow"></div><div class="middle-shadow"></div><div class="right-shadow"></div></div>
                    </div>
                </div>
            </div>
            
            <div class="con-wrap" style="-webkit-overflow-scrolling:touch">
                <iframe src="" id="container" class="content"></iframe>
            </div>
            <div class="multi-choice">
                <div class="fixed-shadow"><div class="left-shadow"></div><div class="middle-shadow"></div><div class="right-shadow"></div></div>
                    <div class="overall">
                        <a class="all-choice">全选</a>
                        <a class="cancel">取消</a>
                    </div>
                    <div class="footer-op">
                        <a class="share" href="#"></a>
                        <a class="delete" href="#"></a>
                        <a class="download" href="#"></a>
                    </div>
                    <div id="bulk-del-msg"><p>选中的图片已从图片墙中隐藏 <a href="#" class="revocation">撤销</a></p></div>
            </div>
        </div>   
    </div>
    <!-- =========================点击链接展开浮窗页====结束========================= -->


    <!-- 登录部分 -->
    <div id="login_wrapper">
    <div id="login">
        <div class="wrapper">
            <div class="close-btn"><span class="ok-icon-undefinded02 icon-font"></span></div>
            <div class="logo"></div>
            <div class="content-area checked">
                <div class="description">
                    <p class="no-account">您必须先进行登录.或者花3秒钟进行最简单注册.</p>
                    <p class="welcome-back">---欢迎回来---</p>
                    <p class="valid quote">"A fool thinks himself to be wise, but a wise man knows himself to be a fool."<span class="author">-William Shakespeare</span></p>
                    <!-- "There is nothing either good or bad, but thinking makes it so" -->
                </div>
                <form action="" id="login_form" method="post">
                    <div class="mail-con">
                        <div>
                            <span class="ok-icon-account icon-font"></span>
                            <input type="email" name="email" autocomplete="off" autofocus placeholder="输入电子邮件">
                            <span class="ok-icon-complete iocn-font"></span>
                        </div>
                    </div>
                    <div class="pwd-con"> 
                        <span class="ok-icon-password icon-font"></span>
                        <input type="password" name="password" placeholder="请输入密码">
                    </div>
                    <div class="logging-status">
                        <input type="submit" id="submit_btn" name="submit" value="登录/注册" >
                    </div>
                    <div class="condition">
                            <div><a class="back-register" href="#">注册</a><a class="forget-password" href="#">忘记密码?</a></div>
                            <div class="back-login"><a href="#">登录</a></div><div class="agreement" href="#">
                                <a href="#"><span class="checkbox"><span class="ok-icon-complete icon-font"></span></span></a><a class="protocol" href="#">同意<span>《xxx协议》</span></a>
                            </div>
                    </div>
                </form>
            </div>
            <div class="account-choosing">
                <div class="line"></div>
                <div class="other-account">
                    <div><a class="login-icon wechat" href="#"><span class="ok-icon-wechat-line icon-font"></span></a></div>
                    <div><a class="login-icon weibo" href="#"><span class="ok-icon-sinaweibo-line icon-font"></span></a></div>
                    <div><a class="login-icon twitter" href="#"><span class="ok-icon-tumblr-line icon-font"></span></a></div>
                    <div><a class="login-icon qq" href="#"><span class="ok-icon-QQfriend-line icon-font"></span></a></div>
                    <div><a class="login-icon facebook" href="#"><span class="ok-icon-facebook-line icon-font"></span></a></div>
                    <div><a class="login-icon google" href="#"><span class="ok-icon-douban-line icon-font"></span></a></div>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- <div id="iframe_modal"><div id="win_wrapper"><iframe src="" id="view_win">></iframe><a class="close" href="#"></a></div></div> -->

    <!-- 打开外部链接时给出加载动画 -->
    <div class="resource_loading"></div>

    <!-- 提示消息 -->
    <div id="message"></div>

    <!-- 加载javascript文件 -->
    <?php if(!empty($this->js) && count($this->js) > 0): ?>
        <?php foreach($this->js as $js): ?>
        <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/jquery.sortable.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/guest.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/masonry.js"></script>
</body>
</html>