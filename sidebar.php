<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">

    <section class="widget">
                <form id="search" method="post" action="./" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" name="s" class="text" placeholder="<?php $this->options->description(); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
	</section>


    <section class="widget">
		<h4 class="widget-title"><?php _e('分类'); ?></h4>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>


<?php if($this->is('index')): ?>

    <section class="widget">
		<h4 class="widget-title"><?php _e('最近回复'); ?></h4>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>

<?php elseif($this->is('page','archives')): ?>

    <section class="widget">
		<h4 class="widget-title"><?php _e('最近回复'); ?></h4>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>

<?php else: ?>

    <section class="widget">
		<h4 class="widget-title"><?php _e('最新文章'); ?></h4>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>

<?php endif; ?>

	<section class="widget">
		<h4 class="widget-title"><?php _e('友情链接'); ?></h4>
        <ul class="widget-list">
            <li><a href="http://eterill.us.kg">EterIll Blogs</a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
	</section>

</div><!-- end #sidebar -->
