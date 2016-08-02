$(document).ready(function () {
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('#news_body', {
            resizeType: 1,
            filterMode: false,
            allowPreviewEmoticons: true,
            allowImageUpload: true,
            items: [
                'source', '|', 'undo', 'redo', '|', 'selectall', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'noColor', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'table', 'hr', 'fullscreen'],
            cssPath: '/js/3rd/kindeditor/plugins/code/prettify.css',
            uploadJson: '/admin.php/news/editoruploader',
            allowFileManager: false
        });
    });
    buildDate2('news_release_date');
    buildDate2('news_filters_release_date');
});

function buildDate1(id) {
    var today = new Date();             //获得当前日期
    var year = today.getFullYear();     //获得年份
    $('#' + id).datetimepicker({
        showHour: true,
        showMinute: true,
        showSecond: true,
        dateFormat: 'yy-mm-dd',
        timeFormat: 'hh:mm:ss',
        changeMonth: true,
        changeYear: true,
        yearRange: '1800:time',
        closeText: '完成',
        currentText: '当前',
        timeText: '时间',
        hourText: '时',
        minuteText: '分',
        secondText: '秒',
        monthNamesShort: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
        dayNamesMin: ['日', '一', '二', '三', '四', '五', '六']
    });
}

function buildDate2(id) {
    var today = new Date();             //获得当前日期
    var year = today.getFullYear();     //获得年份
    $('#' + id).datetimepicker({
        showHour: false,
        showMinute: false,
        showSecond: false,
        dateFormat: 'yy-mm-dd',
        timeFormat: '',
        changeMonth: true,
        changeYear: true,
        yearRange: '1800:time',
        closeText: '完成',
        currentText: '当前',
        timeText: '',
        hourText: '时',
        minuteText: '分',
        secondText: '秒',
        monthNamesShort: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
        dayNamesMin: ['日', '一', '二', '三', '四', '五', '六']
    });
}