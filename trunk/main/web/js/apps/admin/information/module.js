$(document).ready(function () {
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('#information_body', {
            resizeType: 1,
            filterMode: false,
            allowPreviewEmoticons: true,
            allowImageUpload: true,
            items: [
                'source', '|', 'undo', 'redo', '|', 'selectall', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'noColor', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'table', 'hr', 'fullscreen'],
            cssPath: '/js/3rd/kindeditor/plugins/code/prettify.css',
            uploadJson: '/admin.php/information/editoruploader',
            allowFileManager: false
        });
    });
    buildDate('#information_release_date');
    buildDate('#information_filters_release_date');
});

function buildDate(id){

laydate.skin('molv');

laydate({
   elem:id
})
};
