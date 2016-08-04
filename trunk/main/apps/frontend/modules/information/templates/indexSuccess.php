<div class="information">
    <div class="left">
        <ul>
            <?php foreach (InformationCategoryPeer::getItems() as $information_category) { ?>
                <li <?php echo ($information_category->getId() == $information_category_id) ? 'class="click"' : ''; ?>><div class="list"><div class="triangle"></div><a href="/information/index/category/<?php echo $information_category->getId(); ?>">&nbsp;&nbsp;<?php echo $information_category->getvalue(); ?></a></div></li>
            <?php } ?>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 信息中心 > </div>
        <ul>
            <?php foreach ($pager as $information) { ?>
                <li>
                    <a class="postion_left" href="/information/detail/<?php echo $information->getId();?>">
                        <?php echo Utils::substr_word($information->getTitle(), 40); ?>
                    </a>
                    <div class="postion_right">
                        <?php echo $information->getReleaseDate(); ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
            <?php include_partial('widgets/pagination', array('pager' => $pager, 'url_page' => '/information/index/category/' . $information_category_id . '/page/')); ?>
    </div>
</div>

