<div class="information">
    <div class="left">
        <ul>
            <?php foreach (RegulationCategoryPeer::getItems() as $regulation_category) { ?>
                <li <?php echo ($regulation_category->getId() == $regulation_category_id) ? 'class="click"' : ''; ?>><div class="list"><div class="triangle"></div><a href="/regulation/index/category/<?php echo $regulation_category->getId(); ?>">&nbsp;&nbsp;<?php echo $regulation_category->getvalue(); ?></a></div></li>
            <?php } ?>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 信息中心 > </div>
        <ul>
            <?php foreach ($pager as $regulation) { ?>
                <li>
                    <a class="postion_left" href="/regulation/detail/<?php echo $regulation->getId();?>">
                        <?php echo Utils::substr_word($regulation->getTitle(), 40); ?>
                    </a>
                    <div class="postion_right">
                        <?php echo $regulation->getReleaseDate(); ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
            <?php include_partial('widgets/pagination', array('pager' => $pager, 'url_page' => '/regulation/index/category/' . $regulation_category_id . '/page/')); ?>
    </div>
</div>

