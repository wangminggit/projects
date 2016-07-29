<div id="sf_admin_container">
    <h1>用户登录报告</h1>
    <form id="myform" method="post" action="/admin.php/report_admin_user_login/list" >
        <fieldset class="filters">
            <ul style="height:20px;margin:0;" class="filter_option">
                <?php echo $form ?>
                <input type="hidden" id="page" name="page" value="<?php //echo $pager->getPage()   ?>">
                <input type="hidden" id="filter" name="filter" value="1">
            </ul>
            <div class="clr"></div>
            <div style="padding-right:20px;padding-top: 20px;">
                <div style="float:right;margin-left:10px;"> 
                    <input type="button" value="查看全部" onclick="window.location.href = '/admin.php/report_admin_user_login/list/reset/1'"/>
                </div>

                <div style="float:right;margin-left:10px;"> 
                    <input type="submit" value="过滤"/>
                </div>
            </div>
        </fieldset> 
        <div>
            <div class="export_icons">
                <div>
                    <a href="/admin.php/report_admin_user_login/e"><img src="/images/common/excel.png" />导出</a>                
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
    </form>

    <div id="sf_admin_content" class="sf_admin_content">
        <div class="sf_admin_list">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:10%">事件类型</th>
                        <th style="width:10%">后台用户组</th>
                        <th style="width:10%">姓名</th>
                        <th style="width:45%">描述</th>
                        <th style="width:12%">IP</th>
                        <th style="width:13%">日期</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pager->getResults() as $o) { ?>
                        <?php $admin_user = AdminUserPeer::retrieveByPK($o->getObjectId()); ?>
                        <tr>
                            <td><?php echo $o->getLogeventTxt(); ?></td>
                            <td><?php echo is_object($admin_user) ? $admin_user->getAdminUserGroup() : ' - '; ?></td>
                            <td><?php echo is_object($admin_user) ? $admin_user->getName() : ' - '; ?></td>
                            <td><?php echo $o->getDescription(); ?></td>
                            <td><?php echo $o->getIp(); ?></td>
                            <td><?php echo date("Y-m-d H:i:s", $o->getCreatedAt()); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="pager">
            <?php if ($pager->haveToPaginate()): ?>
                <?php echo link_to('[1]', '/admin.php/report_admin_user_login/list/page/1') ?>
                <?php echo link_to('&lsaquo;', '/admin.php/report_admin_user_login/list/page/' . $pager->getPreviousPage()) ?>

                <?php foreach ($pager->getLinks() as $page): ?>
                    <?php
                    if ($page == $pager->getPage()) {
                        echo '<span id="current_page">' . $page . '</span>';
                    } else {
                        echo link_to($page, '/admin.php/report_admin_user_login/list/page/' . $page);
                    }
                    ?>
                    <?php echo ($page != $pager->getCurrentMaxLink()) ? '-' : ''; ?>
                <?php endforeach; ?>

                <?php echo link_to('&rsaquo;', '/admin.php/report_admin_user_login/list/page/' . $pager->getNextPage()) ?>
                <?php echo link_to('[' . $pager->getLastPage() . ']', '/admin.php/report_admin_user_login/list/page/' . $pager->getLastPage()) ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>