<div class="information">
    <div class="left">
        <ul>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/index" >&nbsp;&nbsp;关于青西大宗</a></div></li>
            <li><div class="list "><div class="triangle"></div><a href="/aboutus/law" style="color:#035AB7 ">&nbsp;&nbsp;法律声明</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/contact">&nbsp;&nbsp;联系我们</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/recruit">&nbsp;&nbsp;诚聘英才</a></div></li>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 关于我们 > </div>
        <?php
        foreach ($pager as $aboutus) {
            echo htmlspecialchars_decode($aboutus->getBody());
        }
        ?>
    </div>
</div>
