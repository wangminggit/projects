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
                    <a href=".././information_center/index" <?php echo $module == 'information_center' ? 'class="header_bg"' : ''; ?>>信息中心</a>
                    <ul class="sub_menu">
                        <li><a href=".././information_center/index">青西大宗公告</a></li>
                        <li><a href=".././information_center/dynamic_state">青西大宗动态</a></li>
                        <li><a href=".././information_center/business">会员动态</a></li>
                        <li><a href=".././information_center/business">行业动态</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/commodity_list/index"  <?php echo $module == 'commodity_list' ? 'class="header_bg"' : ''; ?>>商品目录</a>
                </li>
                <li>
                    <a href="#">规则制度</a>
                    <ul class="sub_menu">
                        <li><a href=".././">挂牌流程</a></li>
                        <li><a href=".././">申购流程</a></li>
                        <li><a href=".././">交收流程</a></li>
                        <li><a href=".././">托管流程</a></li>
                        <li><a href=".././">补充细则</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" >下载专区</a>
                    <ul class="sub_menu">
                        <li><a href="#">软件下载</a></li>
                        <li><a href="#">文档下载</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">关于我们</a>
                    <ul class="sub_menu">
                        <li><a href="#">关于青西大宗</a></li>
                        <li><a href="#">法律声明</a></li>
                        <li><a href="#">联系我们</a></li>
                        <li><a href="#">诚聘英才</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>