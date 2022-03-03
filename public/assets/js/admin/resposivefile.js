function responsive_filemanager_callback(field_id){
    let urlImages = jQuery('#'+field_id).val();
    if (!urlImages.startsWith('[', 0)) {
        urlImages = [urlImages];
    } else  {
        urlImages = JSON.parse(urlImages);
    }

    let str =  "";
    let urlnew = '';
    if (field_id == 'image') {
        urlImages.forEach(function (value){
            str += "<li class='col-6 col-md-3 col-xl-2 img-select'><img class='img-preview' src='" + value + "'></li>"
        });
        $('.img-select').remove();
        $('.list-preview').append(str);
        $('.img-preview').height($('#img-add').width());
        jQuery('#'+field_id).val(urlImages);
    } else if (field_id == 'document') {
        urlImages.forEach(function (value){
            var arrval = value.split('/');
            var name = arrval[arrval.length - 1];
            var ext = name.split('.');

            if (ext[1] == 'pdf' || ext[1] == 'docx' || ext[1] == 'xlsx') {
                if (urlnew == '') {
                    urlnew = value;
                } else {
                    urlnew += ',' + value;
                }
                str += "<li><a href='" + value + "'>" + name + "</a></li>";
            }
        });
        jQuery('#'+field_id).val(urlnew);
        $('#list-file').html(str);
    } else if (field_id == 'featured_img') {
        var html = '<img class="featured_img" src="'+ urlImages[urlImages.length - 1] +'" alt="">';
        jQuery('#'+field_id).val(urlImages[urlImages.length - 1]);
        jQuery('#featured_preview').html(html);
    }
    
}

function openresponfile(url) {
    window.open(url, "_blank", "toolbar,scrollbars,resizable,top=100,width=1200,height=700");
}

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

function submitnext(formid) {
    $('#'+formid).prepend('<input id="next" type="hidden" name="next">');
    $('#'+formid).submit();
};

function submitback(formid) {
    $('#next').remove();
    $('#'+formid).submit();
};