<div class="information">
    <div class="left">
        <ul>
            <?php foreach (RegulationCategoryPeer::getItems() as $regulation_category) { ?>
            <li <?php echo ($regulation_category->getid() == $regulation_category_id) ? 'class="click"' : '' ?>><div class="list"><div class="triangle"></div><a href="/regulation/index/category/<?php echo $regulation_category->getId(); ?>">&nbsp;&nbsp;<?php echo $regulation_category->getvalue(); ?></a></div></li>
            <?php } ?>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 信息中心 > </div>
        <div class="title"><?php echo $regulation->getTitle();?></div>
        <div class="date"><?php echo $regulation->getReleaseDate();?></div>
        <div class="text"><?php echo $regulation->getBody(ESC_RAW);?></div>
    </div>
</div>
