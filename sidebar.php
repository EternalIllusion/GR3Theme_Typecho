<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <!--
        <section class="widget">
            <h3 class="widget-title"><?php _e('最新文章'); ?></h3>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </section>   
-->
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('分类'); ?></h3>
            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('归档'); ?></h3>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>




    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title" id="zrwnb"><?php _e('最近回复'); ?></h3>
            <ul class="widget-list">
                <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                <?php while ($comments->next()): ?>
                    <li>
                        <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('其它'); ?></h3>
            <ul class="widget-list">
                <li><a href="https://eterill.xyz/">EterIll Blogs</a></li>
                <li><a href="https://typecho.org">Typecho</a></li>
            </ul>
        </section>
    <?php endif; ?>
    

    

</div><!-- end #sidebar -->
