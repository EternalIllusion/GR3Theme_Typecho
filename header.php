<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
$the_host = $_SERVER['HTTP_HOST'];
$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

?>
<title><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?> - <?php $this->options->description(); ?><?php endif; ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="http://cdn.staticfile.org/normalize/2.1.3/normalize.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('icomoon/style.css'); ?>">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>

    <script src="http://cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script defer src="https://cloud.umami.is/script.js" data-website-id="68698c69-5dc5-4d70-b42e-e45429224292"></script>

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<div id="h" class="clearfix o">
<div id="nav" class="container" style="width:98%;max-width:unset">
    <a href="javascript:;" class="x" onclick = "toggleSidebar();"><div><span class="t"></span><span class="m"></span><span class="b"></span></div></a>
    <div class="logo"><a href="<?php $this->options->siteUrl(); ?>"><img height="40px" src="<?php $this->options->themeUrl('logo.png'); ?>" height="40px" alt="<?php $this->options->title() ?>" height="40px" /></a></div>
    <ul></ul>
</div>
</div><!-- end #header -->

<div id="header" class="clearfix"><div class="container"></div></div>
<?php $this->need('actbar.php'); ?>

<div id="body">
    <div class="container">
        <div class="row">

    
    
