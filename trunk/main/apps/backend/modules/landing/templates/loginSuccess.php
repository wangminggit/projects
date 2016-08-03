
<div  id="logo">
    <img src="/images/apps/admin/huiju_logo.png" width="156" style="margin-left: -5px;">
</div>

<div id="user_login">
    <div class="login_form">
        <h1 style="text-align:center;">欢迎登陆</h1>
        <form id="validate" method="post" action="/admin.php/landing/login">
            <div class="row-fluid">
                <div class="input-prepend" title="用户名">
                    <input class="validate[required] username" type="text" placeholder="用户名" id="signin_username" name="signin[username]">
                    <?php echo $form['username']->renderError() ?>
                </div>
                <div class="input-prepend signin_password_area" title="密码">
                    <input class="validate[required] password" type="password" placeholder="密码" id="signin_password" name="signin[password]">
                    <?php echo $form['password']->renderError() ?>
                </div>
                <?php if (LogPeer::isEnableCaptcha(3)) { ?>
                    <div class="input-prepend" title="验证码">
                        <input id="signin_captcha" class="captcha" type="text" placeholder="验证码" name="signin[captcha]">
                        <a title="点击更换验证码" onclick="return false" href="">
                            <img class="captcha" style="height: 40px !important" border="0" onclick="this.src = '/captcha?r=' + Math.random() + '&reload=1'" src="/captcha?r=0.39241819168661607&reload=1">
                        </a>
                        <?php echo $form['captcha']->renderError() ?>
                    </div>
                <?php } ?>
                <div class="dr">
                    <span></span>
                </div>
            </div>
            <div class="row-fluid">
                <input class="button_1" type="submit" value=" 登  录 ">
            </div>
        </form>
        <div class="footer">
            <span class="footer_text">© <?php echo date('Y', time()); ?> 青西大宗</span>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("body").height($(window).height());

        $(window).resize(function () {
            $("body").height($(window).height());
        });

        $(".input-prepend").each(function () {
            if ($(this).children("ul.error_list").length > 0) {
                $(this).find("input").css('borderColor', 'red');
            } else {
                $(this).find("input").css('borderColor', '#ccc');
            }
        });

        $(".signin_password_area ul.error_list li").each(function () {
            if ($(this).html() == "用户名或密码错误.") {
                $("#signin_username").css('borderColor', 'red');
            }
        });
    });
</script>