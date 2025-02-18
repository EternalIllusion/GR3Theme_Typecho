<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <a href="javascript:window.history.back();" style="margin:5px unset unset 10px; font-size:20px;position:absolute;">&lt;返回</a>&nbsp;&nbsp;

    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="post-title" itemprop="name headline">
        <a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
        <ul class="post-meta">
				<li><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->dateWord(); ?></time></li>
				<li><span class="icon-menu"></span> <?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><span class="icon-eye"></span> <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论','%d 条评论'); ?></a></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('TAG:'); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
