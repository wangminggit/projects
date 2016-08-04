<div class="information">
    <div class="left">
        <ul>
            <?php foreach (InformationCategoryPeer::getItems() as $information_category) { ?>
            <li <?php echo ($information_category->getid() == $information_category_id) ? 'class="click"' : '' ?>><div class="list"><div class="triangle"></div><a href="/regulation/index/category/<?php echo $information_category->getId(); ?>">&nbsp;&nbsp;<?php echo $information_category->getvalue(); ?></a></div></li>
            <?php } ?>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 信息中心 > </div>
        <div class="title"><?php echo $information->getTitle();?></div>
        <div class="date"><?php echo $information->getReleaseDate();?></div>
        <div class="text"><?php echo $information->getBody(ESC_RAW);?></div>
    </div>
</div>
