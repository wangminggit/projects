<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_build_password">
    <div>
        <label for="user_build_password"></label>
        <div class="content">
            <input type="button" id="user_build_password" value=" 生成密码 ">
            <div id="user_build_password_done"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#user_build_password").click(function(){
            $("#user_build_password_done").html('<img src="/images/common/loader/1.gif">');
            $.ajax({
                type:'post',
                url:'/admin.php/admin_user/ajaxgetnewpassword',
                success:function(res) {
                    $("#user_build_password_done").html(res);
                    $("#admin_user_password").val($("#ajax_user_build_new_password").attr("value"));
                    $("#admin_user_password_confirm").val($("#ajax_user_build_new_password").attr("value"));
                    $('#admin_user_password').trigger("keyup");
                }
            });  
        });
    });
</script>