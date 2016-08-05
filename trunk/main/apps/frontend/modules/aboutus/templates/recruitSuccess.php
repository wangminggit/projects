<div class="information">
    <div class="left">
        <ul>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/index" >&nbsp;&nbsp;关于青西大宗</a></div></li>
            <li><div class="list "><div class="triangle"></div><a href="/aboutus/law">&nbsp;&nbsp;法律声明</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/contact">&nbsp;&nbsp;联系我们</a></div></li>
            <li><div class="list"><div class="triangle"></div><a href="/aboutus/recruit" style="color:#035AB7 ">&nbsp;&nbsp;诚聘英才</a></div></li>
        </ul>
    </div>
    <div class="right">
        <div class="top">当前位置 : 首页 > 关于我们 > </div>
        <div class="recruit">
            <?php foreach ($pager as $aboutus) { ?>
                <div class="recruit_top">
                    <div class="title"><span class="fa fa-user"></span>&nbsp;<?php echo $aboutus->getTitle(); ?></div>
                    <div class="date">发布日期：<?php echo $aboutus->getReleaseDate(); ?></div>
                </div>
                <div class="recruit_text">
                        <?php echo htmlspecialchars_decode($aboutus->getBody(ESC_RAW)); ?>
                </div>
            <?php } ?>
        </div>
        <div class="contact_method"><span class="fa fa-envelope-o fa-lg"></span>&nbsp;&nbsp;有意者可将个人简历发送至人事部邮箱：hr@qcecn.com,我们将尽快给您回复！</div>
    </div>
</div>
