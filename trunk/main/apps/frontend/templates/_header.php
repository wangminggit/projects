<?php
$module = sfContext::getInstance()->getModuleName();
$action = sfContext::getInstance()->getActionName();
?>
<div class="header_top">
    <img src="/images/apps/frontend/public/head_title.png">
</div>
<div class="header_bottom">
    <div class="nav_bar">
        <nav>
            <ul class="dropdown">
                <li>
                    <a href="#">首页</a>
                </li>
                <li class="drop"><a href="/pattern/index"  <?php echo $module == 'pattern' ? 'class="header_bg"' : ''; ?>>模式介绍</a>
                    <ul class="sub_menu">
                        <li><a href="/pattern/index">模式简介</a></li>
                        <li><a href="#">服务体系</a></li>
                        <li><a href="#">常见问题</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/information/index" <?php echo $module == 'information' ? 'class="header_bg"' : ''; ?>>信息中心</a>
                </li>
                <li>
                    <a href="/commodity_list/index"  <?php echo $module == 'commodity_list' ? 'class="header_bg"' : ''; ?>>商品目录</a>
                </li>
                <li>
                    <a href="/regulation/index" <?php echo $module == 'regulation' ? 'class="header_bg"' : ''; ?>>规则制度</a>
                </li>
                <li>
                    <a href="#" >下载专区</a>
                </li>
                <li>
                    <a href="/aboutus/index" <?php echo $module == 'aboutus' ? 'class="header_bg"' : ''; ?>>关于我们</a>
                    <ul class="sub_menu">
                        <li><a href="/aboutus/index">关于青西大宗</a></li>
                        <li><a href="/aboutus/law">法律声明</a></li>
                        <li><a href="/aboutus/contact">联系我们</a></li>
                        <li><a href="/aboutus/recruit">诚聘英才</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>