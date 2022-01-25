CKEDITOR.replace( 'editor', {
	filebrowserBrowseUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserUploadUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserImageBrowseUrl : 'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&lang=vi'
});

CKEDITOR.replace( 'editorartifact', {
	filebrowserBrowseUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserUploadUrl : 'assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&lang=vi',
	filebrowserImageBrowseUrl : 'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&lang=vi'
})

$( window ).resize(function() {
	$('.img-preview').height($('#img-add').width());
});

$( document ).ready(function() {
	$('.img-preview').height($('#img-add').width());
});

function showhideform(element) {
	if ($('#'+element).hasClass('hide') == true) {
		$('#'+element).removeClass('hide');
	} else {
		$('#'+element).addClass('hide');
	}
}