$(document).ready(function(){
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Kéo và thả tệp hoặc nhấp vào đây',
            replace: 'Kéo và thả tệp hoặc nhấp để thay thế',
            remove:  'Xóa ảnh',
            error:   'Xin lỗi, tệp quá lớn'
        }
    });

    // Used events
    var drEvent = $('.dropify-event').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Bạn muốn xóa ảnh \"" + element.filename + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
    });
});