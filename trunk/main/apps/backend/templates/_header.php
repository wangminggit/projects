<div id="header_top">
    <div class="header_top_inner">
        <div class="header_top_left">
            <i class="fa fa-dashboard"></i>&nbsp;<a href="/admin.php">管理面板</a>
            <i class="fa fa-home" style="margin-left: 15px;"></i>&nbsp;<a href="/" target="_blank">主页</a>
        </div>
        <div class="header_top_right">
            欢迎 <?php echo Theuser::getCurrentAdminUser()->getName(); ?><i class="fa fa-user" style="margin-left: 20px;"></i>&nbsp;<a href="/admin.php/admin_user_profile">我的资料</a>
            <i class="fa fa-sign-out" style="margin-left: 15px;"></i>&nbsp;<a href="/admin.php/landing/logout">退出</a>
        </div>
    </div>
</div>
<?php include_component('sfAdminDash', 'header'); ?>