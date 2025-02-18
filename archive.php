<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-mb-12 col-8" id="main" role="main">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
    			<div class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
    			<ul class="post-meta">
				<li><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->dateWord(); ?></time></li>
				<li><span class="icon-menu"></span> <?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><span class="icon-eye"></span> <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论','%d 条评论'); ?></a></li>
    			</ul>
                <div class="post-content" itemprop="articleBody">
        			<?php $this->summary(); ?>
                </div>
    		</article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('<span class="icon-arrow-left"></span>','<span class="icon-arrow-right"></span>',0,'...');?>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
