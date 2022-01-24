CKEDITOR.replace( 'editor', {
	filebrowserBrowseUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserUploadUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserImageBrowseUrl : 'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&lang=vi'
});

$( window ).resize(function() {
	$('.img-preview').height($('#img-add').width());
});

$( document ).ready(function() {
	$('.img-preview').height($('#img-add').width());
});

function openresponfile() {
	// window.open("assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&CKEditor=editor&CKEditorFuncNum=3&langCode=vi","_blank",
    // "toolbar,scrollbars,resizable,top=100,width=1200,height=700");
	window.open("assets/filemanager/dialog.php?type=0&editor=mce_0&field_id=image_link","_blank",
    "toolbar,scrollbars,resizable,top=100,width=1200,height=700");
}