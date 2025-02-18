<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{

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
        _t('侧边栏显示 | Theme by Eternal Illusion')
    );

    $form->addInput($sidebarBlock->multiMode());
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
 Helper::options()->commentsMaxNestingLevels = 999;//评论回复楼侧最高999层.这个正常设置最高只有7层    楼 侧 是啥？。。。
}