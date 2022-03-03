@extends('admin.layout.master')
@section('style')
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Thêm lễ hội
                @if ((isset($_GET['relic']) && App\Models\Relic::find($_GET['relic']) != null) || (isset($_GET['relic']) && $_GET['relic'] == null))
                    cho <span style="color: rgb(145, 255, 0)">{{ App\Models\Relic::find($_GET['relic'])->name }}</span>
                @endif
            </h4>
        </div>
    </div>

    <form action="{{ route('festivals.store') }}" id="festivalForm" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h4 class="card-title">lễ hội</h4>
                    </div>
                    <div class="card-body body-showhide">
                        <div id="festival" class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group">
                                    @if ((isset($_GET['relic']) && App\Models\Relic::find($_GET['relic']) != null) || (isset($_GET['relic']) && $_GET['relic'] == null))
                                        <input type="hidden" name="relic_id" value="{{ $_GET['relic'] }}">
                                    @endif
                                    <label class="form-label" for="name">Tên lễ hội <span class="text-red">*</span></label>
                                    <input style="margin-bottom: 5px" type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên lễ hội">
                                    <span style="display: block" id="spanslug">Đường dẫn: {{ URL::to('/'); }}/le-hoi/<span id="slug">{{ old('slug') }}</span>/<button onclick="return changeinput()" class="button-white" id="editslug" type="button">Sửa</button></span>
                                    <input type="hidden" name="slug" id="slughidden" value="{{ old('slug') }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-8">
                                <label class="form-label" for="name">Ngày tổ chức <span class="text-red">*</span></label>
                                <div class="input-group">
                                    <input name="date" value="{{ old('date') }}" class="form-control fc-datepicker hasDatepicker" placeholder="MM/DD/YYYY" type="date" id="datepicker">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="name">Ảnh đại diện <span class="text-red">*</span></label>
                                    <div style="width: 100%;" id="featured_preview" onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=1&popup=1&field_id=featured_img&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" class="featured_preview img-2colum">
                                        @if (old('featured_img') != '')
                                            <img class="featured_img" src="{{ old('featured_img') }}" alt="">
                                        @else
                                            <div class="img-add"><i class="fe fe-plus"></i></div> 
                                        @endif
                                    </div>
                                    <input type="hidden" name="featured_img" id="featured_img" value="{{ old('featured_img') }}">
                                </div>
                            </div>

                            @if (!isset($_GET['relic']) || $_GET['relic'] == null || (isset($_GET['relic']) && App\Models\Relic::find($_GET['relic']) == null))
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Chọn di tích <span class="text-red">*</span></label>
                                        <select class="form-control" name="relic_id" id="relic_id">
                                            <option value="">Chọn di tích</option>
                                            @foreach ($relics as $relic)
                                                <option value="{{ $relic->id }}">{{ $relic->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="editorfestival">Nội dung lễ hội<span class="text-red">*</span></label>
                                    <textarea id="editor" name="description" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="image" name="image">
                                    <label class="form-label" for="media">Ảnh lễ hội</label>
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
                                    <label onclick="return openresponfile('{{ asset('assets/filemanager/dialog.php') }}?type=2&popup=1&field_id=document&akey=HPa8auX8Zi1G0UFGngbBbhkHQ1iSq9Ui8BftAI5Ac')" style="cursor: pointer;" class="form-label" for="docs">Tài liệu lễ hội</label>
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
                        <button type="submit" class="btn btn-primary btncus">Lưu lễ hội và hoàn thành</button>
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
            $("#festivalForm").validate({
                ignore: [],
                rules: {
                    "name": {
                        required: true,
                        minlength: 5,
                        maxlength: 200,
                    },
                    "featured_img": { 
                        required: true,
                    },
                    "slug": { 
                        required: true,
                    },
                    "relic_id": { 
                        required: true,
                    },
                    "description": {
                        required: true,
                        minlength: 200,
                        maxlength: 50000,
                    },
                },
                messages: {
                    "name": {
                        required: 'Vui lòng nhập tên lễ hội',
                        minlength: 'Tên lễ hội quá ngắn',
                        maxlength: 'Tên lễ hội quá dài',
                    },
                    "featured_img": { 
                        required: 'Vui lòng chọn một ảnh',
                    },
                    "slug": { 
                        required: 'Đường dẫn không được để trống',
                    },
                    "relic_id": { 
                        required: 'Vui lòng chọn ít nhất một di tích',
                    },
                    "description": {
                        required: 'Vui lòng nhập nội dung',
                        minlength: 'Nội dung quá ngắn',
                        maxlength: 'Nội dung quá dài',
                    },
                },
            });
        });
    </script>
@endsection