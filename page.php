<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<?php if($this->is('page', 'archives')):?>
<div class="col-mb-12 col-8" id="main" role="main">
    <article class="postt" itemscope itemtype="http://schema.org/BlogPosting">
<div class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
<div class="post-content">
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
$year=0; $day=0; $i=0; $j=0;    
while($archives->next()):   
$year_tmp = date('Y',$archives->created);   
$mon_tmp = date('m',$archives->created); 
$day_tmp = date('d',$archives->created);     
//var_dump($year_tmp);   
$y=$year; $m=$mon;  $d=$day;   
if ($day != $day_tmp && $day > 0) $output .= '</ul></li>';   
if ($mon != $mon_tmp && $mon > 0) $output .= '</ul>';  
if ($year != $year_tmp){   
$year = $year_tmp;
$output .= '<div>'. $year .' 年</div>'; //输出年份   
}   
$output .= '<li>'.date('m/d',$archives->created).'&nbsp;&nbsp;<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>'; //输出文章日期和标题   
endwhile;   
$output .= '</ul></li></ul>';   
echo $output;   
?>
</div>
    </article>
</div><!-- end #main-->
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>

<?php else: ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
<?php endif; ?>


