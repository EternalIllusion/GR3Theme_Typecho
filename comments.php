<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
        
        <style>
        .comment-author img{
            width:40px;
            height:40px;
        }
        </style>
<?php function threadedComments($comments, $options) {
?>
</ol>
    <div id="<?php $comments->theId(); ?>" style="padding: 2px">
    <table><tr>
        <td class="comment-author">
            <?php $comments->gravatar('160', ''); ?>
            </td><td>
            <cite class="fn"><?php $comments->author(); ?>
            <?php if ($comments->authorId == $comments->ownerId) { ?>
            <span style='border-radius: 2px;padding: .10rem .20rem;margin: 0 .40rem 0 .40rem;position: relative;background-color: #FFAB00;color: #fff;'>作者</span>
            <?php } ?>
            </cite>
        <br />
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
        </td>
        </tr></table>
        <?php $comments->content(); ?>
<?php if ($comments->children) { ?>
    <p>回复给 <?php $comments->author(); ?> 的 <a href="<?php $comments->permalink(); ?>">评论</a> 的评论：</p>
    <div style="margin: 3px 2px 2px 5px;border: 1px #666 solid;border-radius:3px;">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</div><hr style="background-color:#aaa;margin:0 3px 0 3px;" />
<?php } ?>




        <?php $comments->listComments(); ?>




        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>





    <!-- <a href="javascript:void(0);" onclick="oneClickReply(<?php echo $comment->coid; ?>);">一键回复</a> -->





            <h3 id="response"><?php _e('评论一下'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a
                            href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
                            href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <p>
                        <label for="author" class="required"><?php _e('称呼'); ?></label>
                        <input type="text" name="author" id="author" class="text"
                               value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p>
                        <label
                            for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="text"
                               value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p>
                        <label
                            for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>"
                               value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                <p>
                    <label for="textarea" class="required"><?php _e('输入评论'); ?></label>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea"
                              required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="submit" id="sbsbsb"><?php _e('提交评论'); ?></button>
                </p>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var readButtons = document.querySelectorAll('.read-button');
    readButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var coid = this.getAttribute('data-coid');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php Helper::options()->siteUrl(); ?>action/markRead', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('coid=' + coid);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText == 'success') {
                        button.style.display = 'none'; // 已读后隐藏按钮
                    }
                }
            };
        });
    });
});
</script>