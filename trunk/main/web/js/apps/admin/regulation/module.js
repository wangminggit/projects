/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('#regulation_body', {
            resizeType: 1,
            filterMode: false,
            allowPreviewEmoticons: true,
            allowImageUpload: true,
            items: [
                'source', '|', 'undo', 'redo', '|', 'selectall', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'noColor', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'table', 'hr', 'fullscreen'],
            cssPath: '/js/3rd/kindeditor/plugins/code/prettify.css',
            uploadJson: '/admin.php/regulation/editoruploader',
            allowFileManager: false
        });
    });
buildDate('#regulation_release_date');
buildDate('#regulation_filters_release_date');
});

function buildDate(id){
    
laydate.skin('molv');

laydate({
   elem:id
})
};

