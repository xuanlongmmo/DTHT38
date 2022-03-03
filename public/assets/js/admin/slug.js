function convertslug(value){
    var Text = value;
    slug = Text.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
}

$('#name').keyup(function() {
    var slug = convertslug($("#name").val()); 
    $("#slug").html(slug);
    $("#slughidden").val(slug);
});
  
function changeinput () {
    var slug = $("#slug").html();
    var input = '<input id="valchange" type="text" value="'+ slug +'">';
    var cancel = '<span onclick="return cancel()" id="cancel">Hủy</span>';
    $("#editslug").attr('onclick', 'return submitchange()');
    $("#slug").html(input);
    $("#spanslug").append(cancel);
};

function cancel() {
    var slug = $("#slughidden").val(); 
    $("#slug").html(slug);
    $("#editslug").attr('onclick', 'return changeinput()');
    $("#valchange").remove();
    $("#cancel").remove();
};

function submitchange() {
    var valchange = $("#valchange").val();
    var valchange = convertslug($("#valchange").val());
    $("#slug").html(valchange);
    $("#slughidden").val(valchange);
    $("#editslug").attr('onclick', 'return changeinput()');
    $("#valchange").remove();
    $("#cancel").remove();
};

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});