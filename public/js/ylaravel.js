var editor = new wangEditor('content');
if(editor.config){
    editor.config.uploadImgUrl = '/posts/image/upload';
// 设置 headers（举例）
    editor.config.uploadHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    editor.create();
}