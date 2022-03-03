@extends('admin.layout.master')
@section('style')
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Thêm di tích</h4>
        </div>
    </div>

    <form action="{{ route('relics.store') }}" id="relicForm" method="POST">
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
                                    <input style="margin-bottom: 5px" type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên di tích">
                                    <input type="hidden" name="slug" id="slughidden" value="{{ old('slug') }}">
                                    <span style="display: block" id="spanslug">Đường dẫn: {{ URL::to('/'); }}/di-tich/<span id="slug">{{ old('slug') }}</span>/<button onclick="return changeinput()" class="button-white" id="editslug" type="button">Sửa</button></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="address">Đường/Số nhà <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="Nhập Đường/Số nhà">
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="tag">Thêm tag</label>
                                    <input type="text" class="form-control" name="tag" id="tag" value="{{ old('tag') }}" placeholder="Nhập tag ( Ngăn cách bởi dấu , )">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="rate">Xếp hạng <span class="text-red">*</span></label>
                                    <select name="rate[]" id="rate" class="form-control select2" data-placeholder="Xếp hạng" multiple>
                                        @foreach ($ranks as $rank)
                                            <option value="{{ $rank->id }}">
                                                {{ $rank->name }}
                                            </option>
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
                                    <input type="hidden" name="featured_img" id="featured_img" value="{{ old('featured_img') }}">
                                    <div id="featured_preview" onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=1&popup=1&field_id=featured_img&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" class="featured_preview">
                                        @if (old('featured_img') != '')
                                            <img class="featured_img" src="{{ old('featured_img') }}" alt="">
                                        @else
                                            <div class="img-add"><i class="fe fe-plus"></i></div> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="editor2">Mô tả ngắn <span class="text-red">*</span></label>
                                    <textarea id="editor2" name="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="editor">Nội dung <span class="text-red">*</span></label>
                                    <textarea id="editor" name="content" class="form-control"></textarea>
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
                                    <input type="hidden" id="image" name="image">
                                    <label class="form-label" for="media">Ảnh di tích</label>
                                    <ul class="list-preview row">
                                        <li id="img-add" class="col-6 col-md-3 col-xl-2 img-preview" onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=1&popup=1&field_id=image&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')">
                                            <div class="img-add"><i class="fe fe-plus"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="document" name="document">
                                    <label onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=2&popup=1&field_id=document&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" style="cursor: pointer;" class="form-label" for="docs">Tài liệu di tích</label>
                                    <div id="list-file"></div>
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
                        <button type="button" onclick="return submitback('relicForm')" class="btn btn-primary btncus">Lưu di tích và xem danh sách</button>
                        <button type="button" onclick="return submitnext('relicForm')" class="btn btn-secondary btncus">Lưu và sang bước tiếp theo</button>
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
    <script src="assets/js/admin/resposivefile.js"></script>
    <script src="assets/js/admin/slug.js"></script>
    <script>
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