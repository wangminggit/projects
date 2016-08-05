<div class="sf_admin_pagination">
  <a class="first_page" href="<?php echo url_for('@aboutus') ?>?page=1" title="第一页">&lt;&lt;</a>
  <a class="prev_page" href="<?php echo url_for('@aboutus') ?>?page=<?php echo $pager->getPreviousPage() ?>" title="上一页">上一页</a>
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <a class="current_page" href="javascript:void(0)"><?php echo $page ?></a>
    <?php else: ?>
      <a class="page_link" href="<?php echo url_for('@aboutus') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
  <a class="next_page" href="<?php echo url_for('@aboutus') ?>?page=<?php echo $pager->getNextPage() ?>" title="下一页">下一页</a>
  <a class="last_page" href="<?php echo url_for('@aboutus') ?>?page=<?php echo $pager->getLastPage() ?>" title="最后一页">&gt;&gt;</a>
</div>
