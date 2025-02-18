<?php
/**
 * ☝️🤓全新天才主题<span style='border-radius: 2px;padding: .10rem .20rem;margin: 0 .40rem 0 .40rem;position: relative;background-color: #E040FB;color: #fff;'><a href="http://eterill.us.kg" style="color:#fff;text-decoration:none;">by EternalIllusion</a></span>
 * 
 * <span style='border-radius: 2px;padding: .10rem .20rem;margin: 0 .40rem 0 .40rem;position: relative;background-color: #333;color: #fff;'><a href="http://eterill.us.kg" style="color:#fff;text-decoration:none;">✨😋👇 点击启用开始品尝</a></span>

 * 
 * @package Genius Revolve 3
 * @author Eternal Illusion
 * @version 3.6
 * @link http://eterill.us.kg
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

//需要替换 Gravatar 头像为 Cravatar 头像，要不然卡的你怀疑人生。
//define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cravatar.cn/avatar/');
//写到config.inc.php里面

 $this->need('header.php');
 ?>

<div class="col-mb-12 col-8" id="main" role="main">
	<?php while($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<div class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></div>
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

    <?php $this->pageNav('<span class="icon-arrow-left"></span>','<span class="icon-arrow-right"></span>',0,'...');?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>