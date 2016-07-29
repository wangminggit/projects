$(document).ready( function() {
    buildDate('datefrom');
    buildDate('dateto');
});

function buildDate(id) {
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