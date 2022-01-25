@extends('admin.layout.master')
@section('style')
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Sửa di tích</h4>
        </div>
    </div>

    <form action="{{ route('relics.update', ['id'=>$relic->id]) }}" id="relicForm" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h4 class="card-title">Thông tin di tích</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên di tích <span class="text-red">*</span></label>
                                    <input style="margin-bottom: 5px" type="text" name="name" id="name" value="{{ $relic->name }}" class="form-control" placeholder="Nhập tên di tích">
                                    <input type="hidden" name="slug" id="slughidden" value="{{ $relic->slug }}">
                                    <span style="display: block" id="spanslug">Đường dẫn: {{ URL::to('/'); }}/di-tich/<span id="slug">{{ $relic->slug }}</span>/<button onclick="return changeinput()" class="button-white" id="editslug" type="button">Sửa</button></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="address">Đường/Số nhà <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ $relic->address }}" placeholder="Nhập Đường/Số nhà">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                {{-- <div class="form-group">
                                    <label class="form-label" for="province">Tỉnh/Thành phố <span class="text-red">*</span></label>
                                    <select onchange="return loaddistrict(this)" name="province" id="province" class="form-control select2" data-placeholder="Chọn Tỉnh/Thành phố">
                                        <option label="Chọn Tỉnh/Thành phố"></option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                
                                {{-- <div class="form-group">
                                    <label class="form-label" for="ward">Phường/Xã <span class="text-red">*</span></label>
                                    <select name="ward" id="ward" class="form-control select2" data-placeholder="Chọn Phường/Xã">
                                        <option label="Chọn Phường/Xã"></option>
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label style="margin-bottom: 7px;" for="category" class="form-label">Thêm danh mục <span class="text-red">*</span></label>
                                    <select name="category[]" id="category" class="form-control select2" data-placeholder="Chọn danh mục" multiple>
                                        @foreach ($categories as $category)
                                            <?php $check = 0; ?>
                                            @foreach ($relic->category as $cat)
                                                @if ($cat == $category->id)
                                                    <?php $check = 1; ?>
                                                @endif
                                            @endforeach
                                            @if ($check == 1)
                                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tag">Thêm tag</label>
                                    <input type="text" class="form-control" name="tag" id="tag" value="{{ $tag }}" placeholder="Nhập tag ( Ngăn cách bởi dấu , )">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="rate">Xếp hạng <span class="text-red">*</span></label>
                                    <select name="rate[]" id="rate" class="form-control select2" data-placeholder="Xếp hạng" multiple>
                                        @foreach ($ranks as $rank)
                                            <?php $check = 0; ?>
                                            @foreach ($relic->rate as $rate)
                                                @if ($rate == $rank->id)
                                                    <?php $check = 1; ?>
                                                @endif
                                            @endforeach
                                            @if ($check == 1)
                                                <option selected value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @else
                                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                {{-- <div class="form-group">
                                    <label class="form-label" for="district">Quận/Huyện <span class="text-red">*</span></label>
                                    <select onchange="return loadward(this)" name="district" id="district" class="form-control select2" data-placeholder="Chọn Quận/Huyện">
                                        <option label="Chọn Quận/Huyện"></option>
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label class="form-label" for="featured_img">Ảnh đại diện <span class="text-red">*</span></label>
                                    <input type="hidden" name="featured_img" id="featured_img" value="{{ $relic->featured_img }}">
                                    <div id="featured_preview" onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=1&popup=1&field_id=featured_img&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" class="featured_preview">
                                        @if ($relic->featured_img != '')
                                            <img class="featured_img" src="{{ $relic->featured_img }}" alt="">
                                        @else
                                            <div class="img-add"><i class="fe fe-plus"></i></div> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="editor2">Mô tả ngắn <span class="text-red">*</span></label>
                                    <textarea id="editor2" name="description" class="form-control">{{ $relic->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="editor">Nội dung <span class="text-red">*</span></label>
                                    <textarea id="editor" name="content" class="form-control">{{ $relic->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h4 class="card-title">Tài liệu di tích</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="image" name="image" value="{{ !empty($relic->image) ? implode(',', $relic->image) : NULL }}">
                                    <label class="form-label" for="media">Ảnh di tích</label>
                                    <ul class="list-preview row">
                                        <li id="img-add" class="col-6 col-md-3 col-xl-2 img-preview" onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=1&popup=1&field_id=image&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')">
                                            <div class="img-add"><i class="fe fe-plus"></i></div>
                                        </li>
                                        @if (!empty($relic->image))
                                            @foreach ($relic->image as $image)
                                                <li class='col-6 col-md-3 col-xl-2 img-select'><img class='img-preview' src='{{ $image }}'></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="document" name="document" value="{{ !empty($relic->document) ? implode(',', $relic->document) : NULL }}">
                                    <label onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=2&popup=1&field_id=document&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" style="cursor: pointer;" class="form-label" for="docs">Tài liệu di tích</label>
                                    <div id="list-file">
                                        @if (!empty($relic->document))
                                            @foreach ($relic->document as $document)
                                                @php
                                                    $arr = explode('/', $document);
                                                    $name = $arr[count($arr) - 1];
                                                @endphp
                                                <li><a href='{{ $document }}'>{{ $name }}</a></li>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="buttondiv">
                        <button type="submit" class="btn btn-primary btncus">Lưu di tích</button>
                        <a href="{{ route('relics.index') }}" class="btn btn-secondary btncus">Trở về danh sánh di tích</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <script src="assets/js/select2.js"></script>
    <script src="assets/plugins/validate/jquery.validate.min.js"></script>
    <script>
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
                    let val = '';
 
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

        $().ready(function() {
            $("#relicForm").validate({
                ignore: [],
                rules: {
                    "name": {
                        required: true,
                        minlength: 5,
                        maxlength: 200,
                    },
                    "address": {
                        required: true,
                        minlength: 5,
                        maxlength: 200,
                    },
                    "category[]": { 
                        required: true,
                    },
                    "rate[]": { 
                        required: true,
                    },
                    "featured_img": { 
                        required: true,
                    },
                    "description": {
                        required: true,
                        minlength: 20,
                        maxlength: 500,
                    },
                    "content": {
                        required: true,
                        minlength: 200,
                        maxlength: 50000,
                    },
                },
                messages: {
                    "name": {
                        required: 'Vui lòng nhập tên di tích',
                        minlength: 'Tên di tích quá ngắn',
                        maxlength: 'Tên di tích quá dài',
                    },
                    "address": {
                        required: 'Vui lòng nhập địa chỉ',
                        minlength: 'Địa chỉ quá ngắn',
                        maxlength: 'Địa chỉ quá dài',
                    },
                    "category[]": {
                        required: 'Vui lòng chọn ít nhất một danh mục',
                    },
                    "rate[]": { 
                        required: 'Vui lòng chọn ít nhất một xếp hạng',
                    },
                    "featured_img": { 
                        required: 'Vui lòng chọn ít nhất một ảnh đại diện',
                    },
                    "description": {
                        required: 'Vui lòng nhập mô tả',
                        minlength: 'Mô tả quá ngắn',
                        maxlength: 'Mô tả quá dài',
                    },
                    "content": {
                        required: 'Vui lòng nhập nội dung',
                        minlength: 'Nội dung quá ngắn',
                        maxlength: 'Nội dung quá dài',
                    },
                },
            });
        });
    </script>
@endsection