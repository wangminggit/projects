<div class="new_password"><?php echo $new_password; ?></div>
<a href="javascript:void(0);" id="ajax_user_build_new_password" value="<?php echo $new_password; ?>">复制</a>

<script type="text/javascript">
    $(function() {
        //新建对象  
        var	clip = new ZeroClipboard.Client();
        //设置指向光标为手型  
        clip.setHandCursor(true);
        //设置SWF文件的路径 
        ZeroClipboard.setMoviePath('/js/apps/admin/admin_user/ZeroClipboard.swf');
        //绑定触发对象按钮ID
        clip.glue('ajax_user_build_new_password');
        //添加监听器，获取要复制的内容 
        clip.addEventListener('mouseDown',function() {
            clip.setText($('#ajax_user_build_new_password').attr('value'));
        });
        //添加监听器，完成点击复制后弹出警告 
        clip.addEventListener("complete", function () {   
            alert("已成功复制内容");   
        }); 
    });
</script>