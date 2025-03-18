<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
?>
<h2>Genius Revolve 3 Theme</h2>
<br />
<span style='border-radius: 2px;padding: .10rem .20rem;margin: 0 .40rem 0 .40rem;position: relative;background-color: #333;color: #fff;'><a href="http://eterill.xyz" style="color:#fff;text-decoration:none;">天才革新 v3</a></span><span style='border-radius: 2px;padding: .10rem .20rem;margin: 0 .40rem 0 .40rem;position: relative;background-color: #E040FB;color: #fff;'><a href="http://eterill.xyz" style="color:#fff;text-decoration:none;">by EternalIllusion</a></span>
<?php
    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
    
    $umamiid = new \Typecho\Widget\Helper\Form\Element\Text(
       'umamiid', NULL, '', 'Umami Site ID(用于访问分析,留空关闭)');
    $form->addInput($umamiid);
    
    $importjq = new \Typecho\Widget\Helper\Form\Element\Radio(
          'importjq', 
          array('1' => '外部CDN', '0' => '内部'),
          '0', 
          _t('引入资源方式'), 
          _t('选择如何引入jQuery等，默认使用主题内部文件')
    );
    $form->addInput($importjq);
   //已实装 
   
    $enablefc = new \Typecho\Widget\Helper\Form\Element\Radio(
          'enablefc', 
          array('1' => '启用', '0' => '禁用'),
          '0', 
          _t('启用快捷回复'), 
          _t('选择是否启用快捷回复栏，如需启用建议禁用设置-评论-反垃圾以防失败')
    );
    $form->addInput($enablefc);
    //已实装
    
    //没做好
       $fccontent = new \Typecho\Widget\Helper\Form\Element\Text(
       'fccontent', NULL, '', '快捷回复文本(用‖分割,还没做awa)');
    $form->addInput($fccontent);
    //没做完
    
    $fcquit = new \Typecho\Widget\Helper\Form\Element\Radio(
          'fcquit', 
          array('1' => '启用', '0' => '关闭'),
          '0', 
          _t('快捷下线按钮'), 
          _t('选择是否在右侧一级菜单展示快捷下线按钮，适合论坛类网站')
    );
    $form->addInput($fcquit);
    //已实装
    
    //还没做
    $darktheme = new \Typecho\Widget\Helper\Form\Element\Radio(
          'darktheme', 
          array('1' => '接受', '0' => '不接受'),
          '1', 
          _t('暗黑模式'), 
          _t('选择是否接受暗黑模式，默认自动识别浏览器主题')
    );
    $form->addInput($darktheme);
    
    //这个再说
    $bootst = new \Typecho\Widget\Helper\Form\Element\Radio(
          'bootst', 
          array('1' => '外部CDN', '0' => '禁用'),
          '0', 
          _t('引入bootstrap'), 
          _t('选择是否引入bootstrap，默认禁用，不影响主题效果。')
    );
    $form->addInput($bootst);
    
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
       
*/
function themeInit($self){
/*
if ($self->request->getPathInfo() == "/getComment/dz") {//功能处理函数 - 评论点赞
commentLikes($self);
}
*/
 Helper::options()->commentsMaxNestingLevels = 999;//评论回复楼侧最高999层.这个正常设置最高只有7层 似乎不起效果？
}

