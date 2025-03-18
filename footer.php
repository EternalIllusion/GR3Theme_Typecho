<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->


<!-- 张嘉涵傻逼 -->
<style>
#recc {
   display:flex;
   justify-content:center;
}
#reccl a {
   color: inherit;
}
</style>

<div id="recc" class="container">
<section class="widget">
            <h3 class="widget-title" id="sjnb"><?php _e('最近回复'); ?></h3>
            <ul class="widget-list" id="reccl" style="height:150px;overflow-y:auto; border:#666 1px solid;border-radius:5px;padding:4px;">
                <?php \Widget\Comments\Recent::alloc()->to($commentss); ?>

                <?php while($commentss->next()): ?>
            <li class="rec-comment-li">
           <a href="<?php $commentss->permalink(); ?>"><p style="margin:1px;"><?php $commentss->gravatar('40', ''); ?><?php $commentss->author(false); ?>: </p>
           <span style="margin:1px;"><?php $commentss->excerpt(48, '...'); ?></span></a></li><hr />
        <?php endwhile; ?>
            </ul>
        </section>
</div>
<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>&nbsp;
    <?php _e('由 <a href="http://eterill.us.kg/">恒寂幻灭</a> 强力驱动'); ?>.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
