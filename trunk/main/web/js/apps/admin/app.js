$(document).ready(function() {
    $("#sf_admin_bar .sf_admin_filter table tbody td input:[type='checkbox']").each(function() {
        $(this).hide().next("label").hide();
    });

    $("#sf_admin_bar .sf_admin_filter .help").hide();

    // 英文转中文
    if ($("#header_breadnav .admin_path .current").length > 0) {
        var target_curretn_nav = "";
        var current_nav = $("#header_breadnav .admin_path .current").html();
        target_curretn_nav = current_nav.replace("edit", "编辑");
        target_curretn_nav = target_curretn_nav.replace("new", "新建");
        target_curretn_nav = target_curretn_nav.replace("update", "更新");
        target_curretn_nav = target_curretn_nav.replace("create", "创建");
        target_curretn_nav = target_curretn_nav.replace("view", "查看");
        target_curretn_nav = target_curretn_nav.replace("list", "列表");
        $("#header_breadnav .admin_path .current").html(target_curretn_nav);
    }
    if ($("#sf_admin_container .error").length > 0) {
        var target_error = "";
        var current_nav = $("#sf_admin_container .error").html();
        target_error = current_nav.replace("edit", "编辑");
        target_error = target_error.replace("new", "新建");
        target_error = target_error.replace("update", "更新");
        target_error = target_error.replace("create", "创建");
        target_error = target_error.replace("view", "查看");
        target_error = target_error.replace("list", "列表");
        $("#sf_admin_container .error").html(target_error);
    }
});