<?php if ($pager->haveToPaginate()) { ?>
    <div class="global-pager">
        <a href="<?php echo $url_page . '1'; ?>">首页</a>
        
        <?php if ($pager->getPage() != 1) { ?>
            <a href="<?php echo $url_page . $pager->getPreviousPage(); ?>">上一页</a>
        <?php } ?>

        <?php foreach ($pager->getLinks(10) as $page) { ?>
            <?php if ($page == $pager->getPage()) { ?>
                <a class="current" href="javascript:void(0)" >
                    <?php echo $page ?>
                </a>
            <?php } else { ?>
                <a href="<?php echo $url_page . $page; ?>">
                    <?php echo $page ?>
                </a>
            <?php } ?>
        <?php } ?>

        <?php if ($pager->getPage() != $pager->getLastPage()) { ?>
            <a href="<?php echo $url_page . $pager->getNextPage(); ?>">下一页</a>
        <?php } ?>
            
        <a href="<?php echo $url_page . $pager->getLastPage(); ?>">尾页</a>
    </div>
<?php } ?>