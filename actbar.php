<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style>
    /* 右侧边栏的基本样式 */
    #sidebar {
        display: flex;
        flex-direction: column;
        width: 75px;
        height: 100%;
        position: fixed;
        right: 0;
        top: 0;
        background-color: #f4f4f4;
        transition: width 0.3s;
        overflow: auto;
        z-index:69;
    }
    
    #subbar {
        display: flex;
        flex-direction: column;
        width: 0;
        height: 100%;
        position: fixed;
        right: 0;
        top: 0;
        background-color: #fcfcfc;
        transition: width 0.3s;
        overflow: auto;
        z-index:64;
    }
    
    /* 展开按钮的基本样式 */
    #expandButton {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 50px;
        height: 50px;
        background-color: #bbbbbb;
        color: black;
        border: none;
        cursor: pointer;
        border-radius: 25px;
        font-size: 24px;
        line-height: 50px;
        text-align: center;
        transition: transform 0.3s, bottom 0.3s, right 0.3s;
        transform-origin: center;
        display: block; /* 默认隐藏 */
    }
    
    /* 边栏展开时，展开按钮移动到左下角并旋转180度 */
    #sidebar:not(.collapsed) + #expandButton {
        right: 72.5px;
        bottom: 0;
        transform: rotate(180deg);
    }
    
    /* 边栏收起时，展开按钮回到右下角 */
    #sidebar.collapsed + #expandButton {
        display: block;
        right: 0;
        bottom: 0;
        transform: rotate(0deg);
    }
    
    .fsbtn{
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 60px; /* 限制宽度以看到溢出隐藏效果 */
        border: 2px solid #333>; /* 边框用于可视化边界 */
        border-radius:10px;
        margin:7.5px;
        margin-bottom:0;
        padding: 2px 5px; /* 按钮内边距 */
    }
    .fbbtn{
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 96px; /* 限制宽度以看到溢出隐藏效果 */
        border: 2px solid #333>; /* 边框用于可视化边界 */
        border-radius:10px;
        margin:2px;
        margin-bottom:0;
        padding: 2px 5px; /* 按钮内边距 */
    }
    #tbar {
        margin-top:auto;
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 75px; /* 限制宽度以看到换行效果 */
       
    }
    
    #sbar {
        margin-top:auto;
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 100px; /* 限制宽度以看到换行效果 */
       
    }
    #sbar p{
    margin:2px;
    }
    #actlogin {
        opacity: 0%;
        display:none;
        z-index: 114;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        transition: all .5s ease;
        background-color:#ccc;
        border: #aaa 1px solid;
        border-radius:10px;
        width:0;
        height:0;
        overflow:hidden;
        padding:5px;
    }
    #actlogin.showlogin {
        opacity:100%;
        width:unset;
        height:unset;
    }
    #actlogin * {
        margin:2px;
        border-radius:2px;
    }
    #actlogin #loggin-buttons {
        display:flex;
        justify-content:space-between;
        padding:0 10% 0 10%;
    }
    
    
    .night #sidebar {
        background-color: #222;
        color: #eee;
    }
    
    .night #subbar {
        background-color: #383838;
    }
    
    .night #actlogin {
        background-color:#333;
    }
</style>
<!-- 右侧边栏 -->
<div id="sidebar">
    <!-- 边栏内容 -->
    <div id="tbar">
        <button onclick="location.reload()" class="fsbtn">刷新</button>
        <a href="javascript:;" onclick="popsub('subftp');"><button class="fsbtn">&lt;跳转</button></a>
        <a href="javascript:;" onclick="popsub('sublk');"><button class="fsbtn">&lt;页面</button></a>
        <?php if ($this->user->hasLogin()): ?>
        <?php if($this->options->enablefc){ ?>
        <a href="javascript:;" onclick="popsub('subfc');"><button class="fsbtn">&lt;回复</button></a>
        <?php } ?>
        <a href="javascript:;" onclick="popsub('subzh');"><button class="fsbtn">&lt;帐号</button></a>
        <?php else: ?>
        <a href="javascript:;" onclick="openlogin();"><button class="fsbtn">登录</button></a>
        <?php endif; ?>
        <?php if($this->options->fcquit){ ?>
        <a onclick="quiacc();"><button class="fsbtn">下线</button></a>
        <?php } ?>
        
        
    </div>
</div>

<!-- 展开按钮 
<button id="expandButton" onclick="toggleSidebar()">&lt;</button>-->
<!-- 二级菜单 -->
<div id="subbar">
    <div id="sbar">
        <div id="subftp">
            <a href="#top"><button class="fbbtn">顶部</button></a>
            <a href="#sjnb"><button class="fbbtn">最近回复</button></a>
            <a href="#response"><button class="fbbtn">评论</button></a>
            <div id="menutocbutton"></div>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>

        </div>
        <div id="subfc">
            <?php if ($this->allow('comment')): ?>
            <?php if ($this->user->hasLogin()): ?>
            <p>身份:<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></p>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form-fc" role="form" style="display:none;">
                <textarea name="text" id="subfcc" class="textarea" required></textarea>
                <button type="submit" id="subfcs" class="submit"></button>
            </form>

            <a href="javascript:;" onclick="fcomment('上线');"><button class="fbbtn">上线</button></a>
            <a href="javascript:;" onclick="fcomment('下线');"><button class="fbbtn">下线</button></a>
            <a href="javascript:;" onclick="fcomment('神金');"><button class="fbbtn">神金</button></a>
            <a href="javascript:;" onclick="fcomment('服了');"><button class="fbbtn">服了</button></a>
            <a href="javascript:;" onclick="fcomment('牛逼');"><button class="fbbtn">牛逼</button></a>
            <a href="javascript:;" onclick="fcomment('我要发长话了！');"><button class="fbbtn">我要发长话了</button></a>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>
            <?php else: ?>
            <p>
                请先登录
            </p>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>
            <?php endif; ?>

            <?php else: ?>
            <p> <?php _e('评论已关闭'); ?></p>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>
            <?php endif; ?>
        </div>
        <div id="sublk">
            <a href="<?php $this->options->siteUrl(); ?>"><button class="fbbtn">首页</button></a>

            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><button class="fbbtn"><?php $pages->title(); ?></button></a><?php endwhile; ?>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>
        </div>

        <?php if ($this->user->hasLogin()): ?>
        <div id="subzh">
            <p>身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></p>
            <?php 
/** 初始化组件 */
\Widget\Init::alloc();
/** 注册一个初始化插件 */
\Typecho\Plugin::factory('admin/common.php')->begin();
\Widget\Options::alloc()->to($options);
\Widget\User::alloc()->to($user);
\Widget\Security::alloc()->to($security);
\Widget\Menu::alloc()->to($menu);
/** 初始化上下文 */
$request = $options->request;
$response = $options->response;
$stat = \Widget\Stat::alloc();
?>
            <p><?php _e('发布 %s 文章</p><p>收到 %s 评论',
                        $stat->myPublishedPostsNum, $stat->myPublishedCommentsNum); ?></p>
            <?php if ($user->pass('contributor', true)): ?>
            <a href="<?php $options->adminUrl('write-post.php'); ?>"><button class="fbbtn"><?php _e('撰写新文章'); ?></button></a>
            <?php if ($user->pass('editor', true) && 'on' == $request->get('__typecho_all_comments') && $stat->waitingCommentsNum > 0): ?>

            <a href="<?php $options->adminUrl('manage-comments.php?status=waiting'); ?>"><button class="fbbtn"><?php _e('待审核的评论:'); ?></a>
            <?php $stat->waitingCommentsNum(); ?></button></a>

            <?php elseif ($stat->myWaitingCommentsNum > 0): ?>

            <a href="<?php $options->adminUrl('manage-comments.php?status=waiting'); ?>"><button class="fbbtn"><?php _e('待审核评论:'); ?></a>
            <?php $stat->myWaitingCommentsNum(); ?></button></a>

            <?php endif; ?>
            <?php if ($user->pass('editor', true) && 'on' == $request->get('__typecho_all_comments') && $stat->spamCommentsNum > 0): ?>

            <a href="<?php $options->adminUrl('manage-comments.php?status=spam'); ?>"><button class="fbbtn"><?php _e('垃圾评论:'); ?>
                    <?php $stat->spamCommentsNum(); ?></button></a>

            <?php elseif ($stat->mySpamCommentsNum > 0): ?>

            <a href="<?php $options->adminUrl('manage-comments.php?status=spam'); ?>"><button class="fbbtn"><?php _e('垃圾评论:'); ?>
                    <?php $stat->mySpamCommentsNum(); ?></button></a>

            <?php endif; ?>
            <?php if ($user->pass('administrator', true)): ?>
            <a href="<?php $options->adminUrl('options-general.php'); ?>"><button class="fbbtn"><?php _e('系统设置'); ?></button></a>

            <?php endif; ?>
            <?php endif; ?>
            <a href="https://cravatar.cn/wp-login.php"><button class="fbbtn">修改头像</button></a>
            <a href="<?php $this->options->logoutUrl(); ?>" id="quibtn"><button class="fbbtn">退出</button></a>
            <a href="javascript:;" onclick="closesub();;"><button class="fbbtn">&gt;关闭</button></a>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>


<script>
    // 写入布尔值到cookie
    function setCol(value) {
        var d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000)); // 设置cookie有效期为1天
        var expires = "expires=" + d.toUTCString();
        document.cookie = "sidebar=" + (value ? 'true' : 'false') + ";" + expires + ";path=/";
    }

    // 从cookie中读取布尔值，并转换为布尔类型
    function getCol() {
        var name = "sidebar=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length) === 'true';
            }
        }
        return false; // 如果没有找到l项，默认返回false
    }

    // 写入布尔值到cookie
    function setQui(value) {
        var d = new Date();
        d.setTime(d.getTime() + (1 * 60 * 1000)); // 设置cookie有效期为1min
        var expires = "expires=" + d.toUTCString();
        document.cookie = "Quiacc=" + (value ? 'true' : 'false') + ";" + expires + ";path=/";
    }

    // 从cookie中读取布尔值，并转换为布尔类型
    function getQui() {
        var name = "Quiacc=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length) === 'true';
            }
        }
        return false; // 如果没有找到l项，默认返回false
    }

    // 切换边栏显示状态的函数
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var togbar = document.getElementById('h');
        if (sidebar.classList.contains('collapsed')) {
            sidebar.classList.remove('collapsed');
            togbar.classList.add('o');
            sidebar.style.width = '75px'; // 确保边栏展开到完整宽度
            setCol(true);
        } else {
            sidebar.classList.add('collapsed');
            togbar.classList.remove('o');
            closesub();
            sidebar.style.width = '0px'; // 确保边栏完全收起
            setCol(false); // 旋转展开按钮
        }
    }

    function popsub(odom) {
        var sidebar = document.getElementById('subbar');
        var parent = document.getElementById('sbar');
        var htm = document.getElementById(odom);
        if (sidebar.classList.contains('collapsed')) {
            sidebar.classList.remove('collapsed');
            // 使用 children 遍历所有元素子节点
            for (let i = 0; i < parent.children.length; i++) {
                parent.children[i].style.display = "none";
            }
            htm.style.display = "block";
            sidebar.style.width = '175px'; // 确保边栏展开到完整宽度
        } else {
            if (htm.style.display == "none") {
                for (let i = 0; i < parent.children.length; i++) {
                    parent.children[i].style.display = "none";
                }
                htm.style.display = "block";
            } else {
                sidebar.classList.add('collapsed');
                sidebar.style.width = '0px'; // 确保边栏完全收起
            }
        }
    }

    function closesub() {
        var sidebar = document.getElementById('subbar');
        sidebar.classList.add('collapsed');
        sidebar.style.width = '0px'; // 确保边栏完全收起
    }

    function openlogin() {
        $.confirm({
            title: '登录',
            content: '<?php if(!$this->user->hasLogin()): ?><form action="<?php $this->options->loginAction()?>" method="post" name="login" role="form"><input type="text" name="name" autocomplete="username" placeholder="请输入用户名" required><input type="password" name="password" autocomplete="current-password" placeholder="请输入密码" required><input type="checkbox" name="remember" class="checkbox" value="1" id="remember">自动登录<input type="hidden" name="referer" value="<?php if($this->is('
            index ')){$this->options->siteUrl();}else{$this->permalink();} ?>"><button id="login-btn" class="actbtn" type="submit" style="display:none;">登录</button></form><?php else: ?>必扬得，你是怎么打开这个面板的？<?php endif; ?>',
            buttons: {
                regist: {
                    text: '注册',
                    action: function() {
                        location.href = "<?php $this->options->registerUrl(); ?>";

                    }
                },

                formSubmit: {
                    text: '登录',
                    btnClass: 'btn-blue',
                    action: function() {
                        var b = this.$content.find('#login-btn');
                        if (b) {
                            b.click();
                            return true;
                        }
                    }
                },
                cancel: {
                    text: "取消",
                    //close
                },
            }
        });

    }

    function fcomment(textc) {
        t = document.getElementById('subfcc');
        t.value = textc;
        $("#subfcs").click();
    }

    function quiacc() {
        setQui(true);
        fcomment("下线");
    }

    closesub();
    if (!getCol()) {
        toggleSidebar();
    }
    if (getQui()) {
        setQui(false);
        $("#quibtn").click();
    }
    
    
    <?php if($this->options->darktheme){ ?>
    function detectTheme() {
        const isNightMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (isNightMode) {
            document.body.classList.add('night');
            document.getElementById("logo-ctn-img").src="<?php $this->options->themeUrl('logo-night.png'); ?>";
        }
    }

        // 页面加载后延时展示内容
//    window.onload = function() {
        detectTheme();
//    }
    
    <?php } ?>
    
</script>