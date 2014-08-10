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
<!-- [if lt IE 7]><html class="ie ie6"><![endif]-->
<!-- [if IE 7]><html class="ie ie7"><![endif]-->
<!-- [if IE 8]><html class="ie ie8"><![endif]-->
<!-- [if !IE]><!--><html lang="zh_CN"><!--<![endif]-->
<head>
    <?php $panel = $this->last_opened_panel; ?>
    <script type="text/javascript">
    idl = {}; //idl.search_delay
    idl.apps = {};
    idl.apps.note = {};
    idl.apps.note.tasks = {};
    idl.apps.note.tag = {};
    idl.apps.note.tag._max_tag_num = 20;
    idl.apps.image = {};
    idl.apps.image.initWidth = 204;
    if (!window.location.origin) window.location.origin = window.location.protocol+"//"+window.location.host;

    (function(){
        var hash = location.hash.substr(1);
        
        var link_regexp = /((http\:\/\/|https\:\/\/|ftp\:\/\/)?([a-z0-9\-]+\.){0,5}[a-z0-9\-]+\.(?:[\d]+|com|cn|hr|io|org|do|fr|jp|tv|name|mobi|pro|us|fm|asia|net|gov|tel|la|travel|so|biz|info|hk|me|co|in|at|bz|ag|eu|in)\b(?:\:[\d+])?[^\s\,\"\'\[\]\{\}\<]{0,})/ig;
        var ip_link_regexp = /((http\:\/\/|https\:\/\/|ftp\:\/\/)?[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\b(?:\:[\d+])?[^\s\"\'\[\]\{\}\<]{0,})/ig;

        
        if(hash == "" || (!hash.match(link_regexp) && !hash.match(ip_link_regexp)) || hash.length > 2048){
            return false;
        }else{
            if(hash.indexOf('http') < 0) hash = "http://"+hash;
        }
        
        if(!!hash) location.href=hash;
    })();
    <?php if(isset($this->evernote_granted) && $this->evernote_granted): ?>var _evgranted = true;<?php else: ?>var _evgranted = false;<?php endif; ?>
    <?php if(isset($this->yinxiang_granted) && $this->yinxiang_granted): ?>var _yxgranted = true;<?php else: ?>var _yxgranted = false;<?php endif; ?>
    <?php if(isset($this->gtask_granted) && $this->gtask_granted): ?>var _gtgranted = true;<?php else: ?>var _gtgranted = false;<?php endif; ?>
   </script>

	<title><?php echo $this->title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="IDL Innovative Design Lab">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/lightbox.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/layout/style.css" />
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes" />
    <link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo SITE_URL; ?>/layout/images/apple_web/touch-icon-ipad-retina.png">

    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/fonts/ok-icon-fonts/icon-fonts.css">
    
    <meta name="renderer" content="webkit"> 
    <!--[if ie]><meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" /><![endif]-->
    <!--[if lt IE 9]>
    	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
   <![endif]-->
</head>
<body class="<?php echo $this->body_class; ?> note-app<?php if(isset($this->yinxiang_granted) && $this->evernote_granted): ?> yx-granted<?php endif; ?><?php if(isset($this->evernote_granted) && $this->evernote_granted): ?> ev-granted<?php endif; ?><?php if(isset($this->gtask_granted) && $this->gtask_granted): ?> gt-granted<?php endif; ?>" data-last-app="note-app">
    
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    
    <div id="wrapper">
        <!-- 新便签添加框 -->
        <header class="main-header">
            <div class="header-wrapper">
            <!-- 菜单与用户信息 -->
            <div class="menu">
                <a href="#" class="refresh" title="刷新页面"><span class="ok-icon-refresh icon-font"></span></a>
                <div class="user-info">
                    <span class="email"><?php echo $this->lang->WELCOME; ?><?php if(!empty($this->login_user) && $this->login_user->nickname != ""){echo ", " . $this->login_user->nickname; }; ?>!</span>
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
                            <a href="#" class="submit" title="<?php echo $this->lang->SUBMIT; ?>">OK</a>
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
                        <?php $is_pined_opened = false; ?>
                        <?php if(isset($this->pined_tags) && count($this->pined_tags) > 0): ?>
                            <?php foreach($this->pined_tags as $pined_tag): ?>
                            <?php if($pined_tag->tid == $panel["tid"] || $panel["tid"] == 0){$is_pined_opened = true; } ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="by-tag<?php if(!$is_pined_opened): ?> custom<?php endif; ?>">
                            <!-- 上部分为被固定的tag，默认包括任务与笔记，用户可拖拽其他的tag上来作为快捷方式 -->
                            <div class="pined-tags">
                            <?php if(isset($this->pined_tags) && count($this->pined_tags) > 0): ?>
                            <?php $pined_tags_num = count($this->pined_tags); $pined_tag_width = 90*(1/$pined_tags_num)."%"; ?>
                            <?php $pined_first = true; ?>
                            <?php foreach($this->pined_tags as $pined_tag): ?>
                            <?php if($panel["tid"] == 0): ?>
                                <div class="tag-con pined<?php if($pined_first){ echo " first"; } ?><?php if($pined_tag->tname == "notes"): ?> active<?php endif; ?><?php if($pined_tag->is_default){ echo " default"; } ?>" style="width:<?php echo $pined_tag_width; ?>"><?php if($pined_first){ $pined_first=false; } ?><a draggable="false" href="#" class="<?php if($pined_tag->is_default): ?><?php echo $pined_tag->tname; ?> default-tag <?php endif; ?>tag<?php if($pined_tag->tname == "notes"): ?> active<?php endif; ?>" id="tag_<?php echo $pined_tag->tname; ?>" <?php if($pined_tag->tname == "notes"): ?>data-num="<?php echo $panel['num']; ?>"<?php endif; ?> <?php if($pined_tag->color): ?> data-color="<?php echo $pined_tag->color; ?>" style="color: <?php echo $pined_tag->color; ?>" <?php endif; ?> data-id="<?php echo $pined_tag->tid; ?>"><?php if($pined_tag->is_default): ?><?php $lang_token = strtoupper($pined_tag->tname); echo $this->lang->{"TAG_".$lang_token}; ?><?php else: ?><?php echo $pined_tag->tname; ?><?php endif; ?></a></div>
                            <?php else: ?>
                                <div class="tag-con pined<?php if($pined_first){ echo " first"; } ?><?php if($panel["tid"] == $pined_tag->tid): ?> active<?php endif; ?><?php if($pined_tag->is_default){ echo " default"; } ?>" style="width:<?php echo $pined_tag_width; ?>"><?php if($pined_first){ $pined_first=false; } ?><a draggable="false" href="#" class="<?php if($pined_tag->is_default): ?><?php echo $pined_tag->tname; ?> default-tag <?php endif; ?>tag<?php if($panel["tid"] == $pined_tag->tid): ?> active<?php endif; ?>"<?php if($pined_tag->is_default): ?> id="tag_<?php echo $pined_tag->tname; ?>" <?php endif; ?><?php if($pined_tag->tid == $panel["tid"]): ?>data-num="<?php echo $panel['num']; ?>"<?php endif; ?> <?php if($pined_tag->color): ?> data-color="<?php echo $pined_tag->color; ?>" style="color: <?php echo $pined_tag->color; ?>" <?php endif; ?> data-id="<?php echo $pined_tag->tid; ?>"><?php if($pined_tag->is_default): ?><?php $lang_token = strtoupper($pined_tag->tname); echo $this->lang->{"TAG_".$lang_token}; ?><?php else: ?><?php echo $pined_tag->tname; ?><?php endif; ?><?php if($pined_tag->tname=="tasks"): ?><span class="today-num<?php if($this->today_tasks_num == 0): ?> all-finished <?php endif; ?>"><?php if($this->today_tasks_num > 0): ?><?php echo $this->today_tasks_num; ?><?php else: ?>0<?php endif; ?></span><?php endif; ?></a></div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </div>

                            <!-- 其余的标签需要有分页的功能 -->
                            <!-- 按最后查看时间排序 -->
                            <!-- 新加的标签放在第一个位置上（最后查看时间为添加时间） -->
                            <div class="custom-tags">
                                <div class="tags-con">
                                <?php if(isset($this->all_tags) && count($this->all_tags) > 0): ?>
                                <?php foreach($this->all_tags as $tag): ?>
                                    <?php if(!$tag->pined): ?>
                                    <div class="tag-con<?php if($tag->is_default){ echo " default"; } ?><?php if($panel["tid"] == $tag->tid): ?> active<?php endif; ?>">
                                        <a href="#" draggable="false" class="tag<?php if($tag->is_default): ?> <?php echo $tag->tname; ?> default-tag<?php endif; ?><?php if($panel["tid"] == $tag->tid): ?> active<?php endif; ?>" <?php if($tag->is_default): ?>id="tag_<?php echo $tag->tname; ?>"<?php endif; ?> <?php if($tag->tid == $panel["tid"]): ?>data-num="<?php echo $panel['num']; ?>"<?php endif; ?><?php if($tag->color): ?> data-color="<?php echo $tag->color; ?>" style="color: <?php echo $tag->color; ?>" <?php endif; ?> data-id="<?php echo $tag->tid; ?>"><?php if($tag->is_default): ?><?php $lang_token = strtoupper($tag->tname); echo $this->lang->{"TAG_".$lang_token}; ?><?php else: ?><?php echo $tag->tname; ?><?php endif; ?><?php if($tag->tname=="tasks"): ?><span class="today-num<?php if($this->today_tasks_num == 0): ?> all-finished <?php endif; ?>"><?php if($this->today_tasks_num > 0): ?><?php echo $this->today_tasks_num; ?><?php else: ?>0<?php endif; ?></span><?php endif; ?></a>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>

                                <!-- 添加标签 -->
                                <div class="new-tag-con">
                                    <input name="tag_name" class="tag-name" size="3" placeholder="    ,    " type="text">
                                    <input id="submit" class="submit" value="" type="button">
                                    <span class="ok-icon-complete icon-font"></span>
                                </div>
                                <a href="#" class="new-btn"><span class="ok-icon-submit icon-font"></span></a>
                                </div>
                                <a href="#" id="edit_tag"><span class="ok-icon-eidt-tag icon-font"></span></a><a href="#" id="edit_tag_finish"><span class="ok-icon-eidt-tag icon-font"></a>
                            </div>
                            <a href="#" class="expand-tags">
                                <span class="ok-icon-tagExpand icon-font"></span>
                                <span class="ok-icon-tagBack icon-font"></span>
                            </a>
                        </div> 
                        </div>
                    </div>

                    <!-- 搜索结果展示区域 -->
                    <div id="search_results">
                        <div id="title_sec">
                            <h2>
                                <span class="title">

                                    <?php if($panel["is_default_tag"]): ?>
                                    <?php $lang_token = strtoupper($panel["tag_name"]); echo $this->lang->{"TAG_".$lang_token}; ?>
                                    <?php else: ?>
                                    <?php echo $panel["tag_name"]; ?>
                                    <?php endif; ?>
                                </span>
                                <span class="num">(<?php echo $panel["num"]; ?>)</span>
                            </h2>
                            <a href="#" class="img-wall-btn"><span class="ok-icon-imgwall2 icon-font"></span></a>
                        </div>
                        <div class="by-keywords result"></div>
                        <div class="archived result"></div>
                        <div class="by-tag result">
                            <div class="tag-result tag-<?php echo $panel["tid"]; ?> show">
                            <!-- 如果是任务面板，则分为两个区域，分别盛放今日任务和以后任务 -->
                            <?php if($panel["is_tasks"]): ?>
                            <!-- 今日任务区域 -->
                            <div id="today_tasks">
                                <h1 class="today-area">今天<hr></h1>
                                <!-- 列出今日任务 -->
                                <?php if($panel["today_tasks"] && count($panel["today_tasks"]) > 0): ?>
                                <?php foreach($panel["today_tasks"] as $today_task): ?>
                                    <?php echo display_note($today_task); ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <!-- 以后任务区域 -->
                            <div id="later_tasks">
                                <h1 class="later-area">以后<hr></h1>
                            <?php endif; ?>

                            <?php if(!empty($panel["notes"])): ?>
                                <?php $order = 0; ?>
                                <?php foreach($panel["notes"] as $note): ?>
                                    <?php echo display_note($note); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if($panel["is_tasks"]): ?>
                            </div> <!-- End of #later_tasks DIV -->
                            <?php endif; ?>
                            </div> <!-- End of tag-result DIV -->
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
                        <div class="share-icon"><div><a href="#" class="qqmail component"><span class="ok-icon-email-line icon-font"></span></a></div></div><!-- 7-24 -->
                        <div class="share-icon"><div><a href="#" class="weibo component"><span class="ok-icon-sinaweibo-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="douban component"><span class="ok-icon-douban-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="qzone component"><span class="ok-icon-qqzone-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="tqq component"><span class="ok-icon-tencentweibo-line icon-font"></span></a></div></div>
                        <div class="share-icon"><div><a href="#" class="google component"><span class="ok-icon-google icon-font"></span></a></div></div>
                        <div class="share-icon last"><div><a href="#" class="facebook component"><span class="ok-icon-facebook-line icon-font"></span></a></div></div>
                    </div>
                </div>

                <div class="tags section">
                    <!-- 自定义创建标签 -->
                    <div class="custom">
                        <?php if(!empty($this->default_tags)): ?>
                            <?php foreach($this->default_tags as $tag): ?>
                            <?php if($tag->color): ?>
                            <a href="#" class="colored-tag tag" id="tag_<?php echo $tag->tname; ?>" data-color="<?php echo $tag->color; ?>" style="color: <?php echo $tag->color; ?>" data-id="<?php echo $tag->tid; ?>"><?php $lang_token = strtoupper($tag->tname); echo $this->lang->{"TAG_".$lang_token}; ?></a>
                            <?php else: ?>
                            <a href="#" class="tag" id="tag_<?php echo $tag->tname; ?>" data-id="<?php echo $tag->tid; ?>"><?php $lang_token = strtoupper($tag->tname); echo $this->lang->{"TAG_".$lang_token}; ?></a>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if(!empty($this->custom_tags)): ?>
                        <?php foreach($this->custom_tags as $tag): ?>
                            <?php if(isset($tag->color)): ?>
                                <a href="#" class="colored-tag tag" data-color="<?php echo $tag->color; ?>" data-id="<?php echo $tag->tid; ?>" style="color: <?php echo $tag->color; ?>"><?php echo $tag->tname; ?></a>
                            <?php else: ?>
                                <a href="#" class="tag" data-id="<?php echo $tag->tid; ?>"><?php echo $tag->tname; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="new-tag-con">
                            <input name="tag_name" class="tag-name" size="3" placeholder="    ,    " type="text" />
                            <input class="submit" value="" type="button" /><span class="ok-icon-complete icon-font"></span>
                        </div>
                        <a href="#" class="new-btn"><span class="ok-icon-submit"></span></a>
                        <!-- <div class="add-tag"><input type="text" class="tag-name" placeholder="标签以 , 分隔" /><input type="submit" class="submit" value="√"></div> -->
                    </div>
                </div>
            </div>
            <a href="#" id="backtotop"><span class="ok-icon-edit-top icon-font"></span></a>
        </div><!-- note app ends -->
        <!-- =========================便签区域结束========================= -->
    </div><!-- 应用包含容器#app_wrapper结束 -->
    </div>
    <!-- #wrapper结束 -->

    <!-- =========================设置页面========================= -->
    <div id="settings">
        <div class="settings-wrapper">
            <header>
                <div class="logo"></div>
                <a href="#" class="back"><span class="ok-icon-undefinded02 icon-font"></span></a>
            </header>
            <h2>MENU</h2>
            <div class="sections">
                <!-- 用户设置，包括昵称，短网址，icon -->
                <section class="user">
                    <h3>账户设置</h3>
                    <div class="inner-con">
                        <div class="portrait">
                            <label>头像</label><div class="portrait-con"></div>
                        </div>

                        <div class="nickname">
                            <label>昵称</label>
                            <div class="name-con"><span>Vincenrow</span><input name="nickname" value="" maxlength="15"/></div>
                        </div>

                        <div class="password">
                            <label>密码</label><div class="password-con"><a href="#" id="reset_pwd">修改</a></div>
                            <div class="re-pass-con">
                                <form>
                                  <label>修改密码</label>
                                    <div class="inp-con"><input class="inp" name="cur_pwd" id="cur_pwd" type="password" placeholder="请输入原始密码"/></div>
                                    <div class="inp-con"><input class="inp" name="new_pwd" id="new_pwd" type="password" placeholder="请输入修改密码"/></div>
                                    <div class="inp-con"><input class="inp" name="re_new_pwd" id="re_new_pwd" type="password" placeholder="请验证修改密码"/></div>
                                    <div class="inp-con"><a class="inp" id="reset_pw_btn"/>确认</a><a class="inp" id="cancel_reset"/>取消</a></div>
                                </form>
                            </div>
                        </div> 

                        <div class="signature">
                            <label>简介</label>
                            <div class="signature-con">
                                <a href="#" class="sign">蛋疼的青春，逗比的岁月。</a>
                                <textarea name="editting " value="" maxlength="30"></textarea>
                            </div>
                        </div>

                        <div class="fancyurl unavailable">
                            <label>短网址</label>
                            <div class="fancyurl-con">
                                <a href="#" class="url">eff.do/vincenrow</a>
                                <input name="short-link" value="" maxlength="15"/>
                            </div>  
                        </div>

                        <div class="account">
                            <label>账号</label>
                            <div class="account-con"><a href="#" id="logout">登出</a></div>
                        </div>

                        
                    </div>
                </section><!-- 用户设置结束 -->

                <!-- 各大记事账户同步管理 -->
                <section class="accounts">
                    <h3>同步设置</h3>
                    <div class="inner-con">
                        <div class="gtask open-app">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>Google Task(同步)</label>
                            <p class="status">
                                <span class="on">已开启 |</span>
                                <span class="off">已关闭 |</span>
                                <span class="safe">同步正常</span>
                                <span class="defeat">连接失败</span>
                                <a class="reassociation" href="#">请重新关联</a> 
                            </p>
                            <p class="description">此选项仅对您的“Task”类进行同步</p>
                        </div><!-- 对gtask是进行同步 -->

                        <div class="backups">
                            <div class="evernote open-app">
                                <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                                <label>Evernote(备份)</label>
                                <p class="status">
                                    <span class="on">已开启 |</span>
                                    <span class="off">已关闭 |</span>
                                    <span class="safe">备份正常</span>
                                    <span class="defeat">连接失败</span>
                                    <a class="reassociation" href="#">请重新关联</a>
                                </p>
                                <p class="description">将您的"OK记"备份到Evernote</p>
                            </div>
                            <div class="yinxiang open-app">
                                <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                                <label>印象笔记(备份)</label>
                                <p class="status">
                                    <span class="on">已开启 |</span>
                                    <span class="off">已关闭 |</span>
                                    <span class="safe">备份正常</span>
                                    <span class="defeat">连接失败</span>
                                    <a class="reassociation" href="#">请重新关联</a>
                                </p>
                            </div>
                            <div class="sync-now btn">立即同步和备份一次</div>
                        </div><!-- 对evernote和印象是备份 -->
                        
                        <div class="collect">
                            <div class="weibo open-app">
                                <label>微博收藏</label>
                                <p class="status">
                                    上次导入时间：<span class="time">2014-8-8</span>&nbsp;导入条数：<span class="num">300</span>
                                </p>
                                <p class="description">将您的微博收藏导入便签（收藏内容将被分配进"微博收藏"的Tag中。）</p>
                                <div class="lead-in btn">导入</div>
                            </div>

                            <div class="twitter open-app">
                                <label>Twitter收藏</label>
                                <p class="status">
                                上次导入时间：<span class="time">2014-8-8</span>&nbsp;导入条数：<span class="num">300</span>
                                </p>
                                <p class="description">将您的Twitter收藏导入便签（收藏内容将被分配进"微博收藏"的Tag中。）</p>
                                <div class="lead-in btn">导入</div>
                            </div>
                        </div><!-- 微博和teitter是导入收藏 -->

                    </div>
                </section><!-- 各大记事账户同步管理结束 -->

                <section class="task-eater">
                  <h3>任务提醒 </h3> 
                    <div class="inner-con">
                        <!--邮件发送设置-->
                        <div class="mail">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>用邮件提醒</label>
                            <p class="description">将当天需要处理的任务，以邮件形式提醒。</p>
                            <div class="send-mail">
                                <div class="send-time">
                                    <p class="status">发送邮件时间
                                        <div class="get-info btn">
                                            <span class="reduce ok-icon-reduce-line"></span><span class="clock" href="#">08:00</span><span class="add ok-icon-add-line"></span>
                                        </div>
                                    </p>
                                    <a href="#"><input type="range" value="7" name="points" min="0" max="23"  step="1"/></a>
                                </div>
                            </div>
                        </div><!--邮件发送设置结束-->

                        <div class="gle-calendar">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>用谷歌日历提醒</label>
                            <p class="status">
                                <span class="on">已开启 |</span>
                                <span class="off">已关闭 |</span>
                                <span class="safe">状态正常</span>
                                <span class="defeat">连接失败</span>
                                <a class="reassociation" href="#">请重新关联</a>
                            </p>
                            <p class="description">您设定过日期的任务将自动发送到日历</p>
                        </div>

                        <div class="apple-calendar">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>用苹果日历提醒</label>
                            <p class="status">
                                <span class="on">已开启 |</span>
                                <span class="off">已关闭 |</span>
                                <span class="safe">状态正常</span>
                                <span class="defeat">连接失败</span>
                                <a class="reassociation" href="#">请重新关联</a>
                            </p>
                            <p class="description">您设定过日期的任务将自动发送到日历</p>
                        </div>
                    </div>  
                </section>

                <!-- 界面设置，包括主题，字体，语言 -->
                <section class="ui">
                    <h3>外观设置</h3>
                    <div class="inner-con">
                        <div class="langs">
                            <label>界面语言</label>
                            <div class=""></div>
                            <ul class="langs-con">
                                <div class="current-state"><a href="#">简体中文</a><span class=" ok-icon-option icon-font"></span></div>
                                <li class="lang choosed"><a href="#" data-lang="zh_cn">简体中文</a></li>
                                <li class="lang"><a href="#" data-lang="zh_tw">繁体中文</a></li>
                                <li class="lang"><a href="#" data-lang="jp">日文</a></li>
                                <li class="lang"><a href="#" data-lang="en">英语</a></li>
                            </ul>
                        </div>

                        <div class="fonts">
                            <label>自定义字体</label>
                            <ul class="fonts-con">
                                <div class="current-state"><a href="#">微软雅黑</a><span class=" ok-icon-option icon-font"></span></div>
                                <li class="font choosed"><a href="#" data-font="">微软雅黑</a></li>
                                <li class="font"><a href="#" data-font="">Nixie One</a></li>
                                <li class="font"><a href="#" data-font="">Gill Sans</a></li>
                            </ul>
                        </div>

                        <div class="font-size">
                            <label>字号大小</label>
                            <ul class="size-con">
                                <div class="current-state"><a href="#">中</a><span class=" ok-icon-option icon-font"></span></div>
                                <li class="size small choosed"><a href="#" data-size="">小</a></li>
                                <li class="size medium"><a href="#" data-size="">中</a></li>
                                <li class="size large"><a href="#" data-size="">大</a></li>
                            </ul>
                        </div>

                        <div class="themes">
                            <label>主题选择</label>
                            <div>
                                <ul class="theme-con">
                                    <div class="current-state"><a href="#">伤心蓝</a><span class=" ok-icon-option icon-font"></span></div>
                                    <li class="theme" ><a href="#" data-id="0">神经病</a></li>
                                    <li class="theme" ><a href="#" data-id="1">优雅黑</a></li>
                                    <li class="theme choosed" ><a href="#" data-id="2">伤心蓝</a></li>
                                    <li class="theme" ><a href="#" data-id="3">风骚紫</a></li>
                                    <li class="theme" ><a href="#" data-id="4">逗比绿</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="unfold">
                            <label>展开方式</label>
                            <ul class="unfold-con">
                                <div class="current-state"><a href="#">挤出</a><span class=" ok-icon-option icon-font"></span></div>
                                <li class="mode choosed"><a href="#" class="push">挤出</a></li>
                                <li class="mode"><a href="#" class="overlay">覆盖</a></li>
                            </ul>
                        </div>

                        <!-- <div class="favicon">
                             <label>显示网址图标(favicon)</label>
                            <ul class="show-choose">
                                <li class="show choosed"><a href="#" data-font="">显示</a><span class="ok-pull-down"></span></li>
                                <li class="hidden"><a href="#" data-font="">隐藏</a><span class="ok-pull-down"></span></li>
                            </ul>
                        </div> -->
                    </div>
                </section><!-- 界面设置结束 -->

                <!-- 分享组件管理 -->
                <section class="share">
                    <h3>社交分享</h3>
                    <div class="inner-con">
                      <p class="description">在虚线框中的六个社交分享将会出现在您的OK记分享中</p>
                      <div class="show-icon">
                        <span class="item ok-icon-friends-line" data-id="1"></span><span class="item ok-icon-sinaweibo-line" data-id="2"></span><span class="item ok-icon-tencentweibo-line" data-id="3"></span><span class="item ok-icon-tumblr-line" data-id="4"></span><span class="item ok-icon-twitter-line" data-id="5"></span><span class="item ok-icon-wechat-line" data-id="6"></span>
                      </div>
                        <span class="item ok-icon-qqzone-line" data-id="7"></span><span class="item ok-icon-QQfriend-line" data-id="8"></span><span class="item ok-icon-douban-line" data-id="9"></span><span class="item ok-icon-email-line" data-id="10"></span><span class="item ok-icon-evernote-line" data-id="11"></span><span class="item ok-icon-facebook-line" data-id="12"></span><span class="item ok-icon-line" data-id="13"></span><span class="item ok-icon-google" data-id="14"></span>                 
                    </div>
                </section><!-- 分享组件管理结束 -->

                  <!-- 图片设置 -->
                <section class="picture">
                    <h3>图片设置</h3>
                    <div class="inner-con">
                        <div class="picture-con">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>自动下载收藏图片</label>
                            <p class="description">当您将图片拖拽至侧栏收藏时自动下载图片到您的电脑（仅支持Chrome/Firefox）</p>
                        </div>

                        <div class="pic-download">
                            <label>图片下载默认地址</label>
                            <p class="status"><span>/下载 /</span>&nbsp;<input type="text" class="set-addr" placeholder="OK记图片"></p>
                        </div> 

                        <div class="pic-wall">
                            <label>图片墙筛选</label>
                            <p class="status">进入图片墙图片不小于
                                <div class="get-info btn">
                                    <span class="reduce ok-icon-reduce-line"></span><span class="size" href="#">200px</span><span class="add ok-icon-add-line"></span>
                                </div>
                            </p>
                              <a href="#"><input type="range" id="image_size" name="points" value="<?php echo IMAGE_WALL_MIN_WIDTH; ?>" min="<?php echo IMAGE_WALL_MIN_WIDTH; ?>" max="<?php echo IMAGE_WALL_MAX_WIDTH; ?>" step="50"/></a>
                        </div> 
                    </div>
                </section>
                  <!-- 图片设置结束 -->

                <section class="other-set">
                  <h3>其他设置</h3> 
                    <div class="inner-con">
                        <!--图片墙设置-->
                        <!-- <div class="picture-con">
                          <label>图片</label>
                            <p><a class="checkbox checked" href="#"></a><span>拖拽图片进OK记后马上下载</span></p><p class="desc">仅对chrome用户支持</p>
                            <div class="pic-wall">
                              <p class="status-title">进入图片墙图片不小于<span class="get-info">300px</span></p>
                              <a href="#"><input type="range" name="points" min="300" max="500"  step="50"/></a>
                            </div>
                        </div> --><!--图片墙设置结束-->

                        <!-- 地理位置开关管理 -->
                        <div class="geo">
                            <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                            <label>开启本浏览器地理定位</label>
                            <p class="description">开启地理位置可以帮助您快速查找过往便签,地理位置的信息只有您本人可以看到.</p>
                            <!-- <div class="geo-set">
                                <a class="checkbox" href="#"></a><span class="loca">地理位置定位</span>
                                <p class="desc">上次访问地址: <span>湖南省株洲市天元区</span></p>
                            </div> -->
                        </div><!-- 地理位置开关管理结束 -->

                        <!-- 设备认证管理 -->
                        <div class="equipment unavailable">
                            <label>设备保持登录</label>
                            <p class="description">由于您的允许，以下设备目前保持自动登录，当您取消其选项后，该选项设备需重新输入密码方可访问。</p>
                            <div  class="prefsession">
                                <p data-id="">
                                    <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                                    <span class="device">TF的MacBook Pro</span>
                                    <p class="status">上次访问时间：
                                        <span class="time">2014-8-8</span>&nbsp;
                                        <span class="addr">湖南株洲</span>
                                    </p>
                                </p>
                                <p data-id="" >
                                    <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                                    <span class="device">Tianfei-ipad</span>
                                     <p class="status">上次访问时间：
                                        <span class="time">2014-8-8</span>&nbsp;
                                        <span class="addr">湖南株洲</span>
                                    </p>
                                </p>

                                <p data-id="">
                                    <div class="checkbox"><span class="ok-icon-complete icon-font"></span></div>
                                    <span class="device">Android-sunmsung</span>
                                     <p class="status">上次访问时间：
                                        <span class="time">2014-8-8</span>&nbsp;
                                        <span class="addr">湖南株洲</span>
                                    </p>
                                </p>
                            </div>
                        </div><!-- 设备认证管理结束 -->
                    </div>  
                </section>
                <section class="about"><!-- 关于模块 -->
                    <h3>关于</h3>
                    <div class="inner-con">

                        <div class="versions-info">
                            <label>插件版本</label>
                            <p class="versions description">您正在使用的是OKmemo浏览器插件版本<span>Chrome 1.0.0.5</span></p>
                            <div class="update btn"><a href="#">获取最新版本</a></div>
                        </div>

                        <div class="contact">
                            <label>联络开发小组</label>
                            <p class="status">电子邮件：<a href="#">Connect@okay.do</a></p>
                            <p class="status">QQ体验群：<span>228781627</span></p>
                        </div>

                        <div class="feedback">
                            <label>意见反馈</label>
                            <div class="feedback-con">
                                <!-- <a href="#" class="close">x</a> -->
                                <form action="" mothod="">
                                    <textarea class="info" id="info" cols="20" rows="8" placeholder="骚年，哪有不爽，来喷吧！"></textarea>
                                    <!-- <input type="text"class="user-contact" placeholder="求联系方式(邮箱/QQ/电话)！"> -->
                                    <input type="submit" id="submit" value="OK">
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
           <iframe src="" >
            
           </iframe>
        </div>   
    </div>
    <!-- =========================点击链接展开浮窗页====结束========================= -->




     <!-- =========================点击链接展开浮窗页====开始========================= -->
    <div id="image_wall">
        
        <div class="image-wall drop-down">
            <div class="wall-op"><div>
                <a href="#" class="close"><span class="ok-icon-undefinded02 icon-font"></span></a>
                </div>
            </div>

            <div class="con-wrap" style="-webkit-overflow-scrolling:touch">
                <iframe src="" id="container" class="content"></iframe>
            </div>
        </div>   
    </div>
    <!-- =========================点击链接展开浮窗页====结束========================= -->





    <!-- <div id="iframe_modal"><div id="win_wrapper"><iframe src="" id="view_win">></iframe><a class="close" href="#"></a></div></div> -->
    
    <!-- 图片泡泡 -->
    <div id="img_modal"><div class="image_con"></div><a href="#" class="download"></a>
        <div class="triangle"></div><div class="triangle-b"></div>
        <div class="up-triangle"></div><div class="up-triangle-b"></div>
    </div>

    <!-- 打开外部链接时给出加载动画 -->
    <div class="resource_loading"></div>

    <!-- 提示消息 -->
    <div id="message"></div>

    <!-- 用户反馈表单 -->
    <!-- <div id="feedback">
        <div>
            <textarea class="content" placeholder="说下你的感受吧，小伙伴..."></textarea>
            <p><input type="submit" value="提交"/></p>
        </div>
    </div> -->

    <div id="stick_menu2"><div id="close_panel"><a href="#" class="switch"></a></div></div>
    
    <!-- 加载javascript文件 -->
    <?php if(!empty($this->js) && count($this->js) > 0): ?>
        <?php foreach($this->js as $js): ?>
        <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/jquery.sortable.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/main.js"></script>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/scripts/masonry.js"></script>

    <script type="text/javascript">
    idl.apps.note.tasks.today_tasks_num = <?php echo $this->today_tasks_num; ?>;
    <?php if(!empty($panel["notes"])): ?>idl.apps.note.tag["tag_"+<?php echo $panel["tid"]; ?>] = {}; idl.apps.note.tag["tag_"+<?php echo $panel["tid"]; ?>].num = <?php echo $panel["num"]; ?>; idl.apps.note.tag["tag_"+<?php echo $panel["tid"]; ?>].notes = <?php echo json_encode($panel["notes"]) ?>; <?php endif; ?>
    </script>
</body>
</html>



