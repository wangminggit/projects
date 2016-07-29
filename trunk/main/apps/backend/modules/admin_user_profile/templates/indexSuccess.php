<div id="sf_admin_container">
    <h1>编辑我的资料</h1>
    <?php if (isset($result_success)) { ?>
        <div class="notice"><?php echo $result_success; ?></div>
    <?php } else if (isset($result_error)) { ?>
        <div class="error"><?php echo $result_error; ?></div>
    <?php } ?>
    <div id="sf_admin_header"> </div>
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <form action="/admin.php/admin_user_profile" method="post">
                <fieldset id="sf_fieldset_none">
                    <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_department_id">
                        <div>
                            <label for="admin_user_department_id">登录名</label>
                            <div class="content">
                                <?php echo $admin_user->getUsername(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_admin_user_group_id">
                        <div>
                            <label for="admin_user_admin_user_group_id">后台用户组</label>
                            <div class="content">
                                <?php echo $admin_user->getAdminUserGroupTxt(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_username">
                        <?php echo $form['name']->renderError() ?>
                        <div>
                            <label for="admin_user_username">姓名</label>
                            <div class="content">
                                <?php echo $form['name']->render() ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_email">
                        <?php echo $form['email']->renderError() ?>
                        <div>
                            <label for="admin_user_email">E-mail</label>
                            <div class="content">
                                <?php echo $form['email']->render() ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_change_password">
                        <?php echo $form['change_password']->renderError() ?>
                        <div>
                            <label for="admin_user_change_password">修改密码</label>
                            <div class="content">
                                <?php echo $form['change_password']->render() ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_password" style="display: block;">
                        <?php echo $form['password']->renderError() ?>
                        <div>
                            <label for="admin_user_password">新 密 码</label>
                            <div class="content">
                                <?php echo $form['password']->render() ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_password_confirm" style="display: block;">
                        <?php echo $form['password_confirm']->renderError() ?>
                        <div>
                            <label for="admin_user_password_confirm">密码确认</label>
                            <div class="content">
                                <?php echo $form['password_confirm']->render() ?>
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_build_password" style="display: block;">
                        <div>
                            <label for="user_build_password"></label>
                            <div class="content">
                                <input id="user_build_password" type="button" value=" 生成密码 ">
                                <div id="user_build_password_done"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php // echo $form['_csrf_token']->render() ?>
                <ul class="sf_admin_actions">
                    <li class="sf_admin_action_save">
                        <input type="submit" value="保存">
                        <?php echo $form['admin_user_id']->render() ?>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <div id="sf_admin_footer"> </div>
</div>
<script>
    $(document).ready(function() {
        if ($('#admin_user_profile_change_password').is(':checked')) {
            $('.sf_admin_form_field_password').show();
            $('.sf_admin_form_field_password_confirm').show();
            $('.sf_admin_form_field_build_password').show();
        } else {
            $('.sf_admin_form_field_password').hide();
            $('.sf_admin_form_field_password_confirm').hide();
            $('.sf_admin_form_field_build_password').hide();
        }
        $('#admin_user_profile_change_password').change(function() {
            if ($(this).is(':checked')) {
                $('.sf_admin_form_field_password').show();
                $('.sf_admin_form_field_password_confirm').show();
                $('.sf_admin_form_field_build_password').show();
            } else {
                $(this).next().hide();
                $('.sf_admin_form_field_password').hide();
                $('.sf_admin_form_field_password_confirm').hide();
                $('.sf_admin_form_field_build_password').hide();
            }
        });

        <?php if (isset($result_success)) { ?>
            if ($('#admin_user_profile_change_password').attr('checked',false)) {
                $('.sf_admin_form_field_password').hide().find("#admin_user_profile_password").val("");
                $('.sf_admin_form_field_password_confirm').hide().find("#admin_user_profile_password_confirm").val("");
                $('.sf_admin_form_field_build_password').hide();
            }
        <?php } ?>

        // 生成强密码
        $("#user_build_password").click(function() {
            $("#user_build_password_done").html('<img src="/images/common/loader/1.gif">');
            $.ajax({
                type: 'post',
                url: '/admin.php/admin_user_profile/ajaxgetnewpassword',
                success: function(res) {
                    $("#user_build_password_done").html(res);
                    $("#admin_user_profile_password").val($("#ajax_user_build_new_password").attr("value"));
                    $("#admin_user_profile_password_confirm").val($("#ajax_user_build_new_password").attr("value"));
                    $('#admin_user_profile_password').trigger("keyup");
                }
            });
        });

        // 错误提示
        $(".sf_admin_form_row").each(function() {
            if ($(this).children(".error_list").length > 0) {
                $(this).find("div .content input").css("borderColor", "#f22");
            }
        });

        // 修改面包屑导航
        $("#header_breadnav .admin_path").html('<a href="/admin.php">管理面板</a> <img class="breadcrumb_break" src="/images/apps/admin/breadcrumb_break.png"> <a href="/admin.php/admin_user_profile">我的资料</a> <img class="breadcrumb_break" src="/images/apps/admin/breadcrumb_break.png"> <span class="current">编辑</span>');
    });
</script>