@extends('admin.layout.master')

@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Thêm di tích</h4>
        </div>
    </div>

    <form action="">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h4 class="card-title">Thông tin di tích</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Tên di tích <span class="text-red">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên di tích">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="district">Quận/Huyện <span class="text-red">*</span></label>
                                    <select onchange="return loadward(this)" name="district" id="district" class="form-control select2" data-placeholder="Choose One">
                                        <option label="Chọn Quận/Huyện"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="province">Tỉnh/Thành phố <span class="text-red">*</span></label>
                                    <select onchange="return loaddistrict(this)" name="province" id="province" class="form-control select2" data-placeholder="Choose One">
                                        <option label="Chọn Tỉnh/Thành phố"></option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="ward">Phường/Xã <span class="text-red">*</span></label>
                                    <select name="ward" id="ward" class="form-control select2" data-placeholder="Choose One">
                                        <option label="Chọn Phường/Xã"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="address">Đường/Số nhà</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Nhập Đường/Số nhà">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="editor">Mô tả <span class="text-red">*</span></label>
                                    <textarea id="editor" name="description" class="form-control"></textarea>
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
                                    <label class="form-label" for="media">Ảnh di tích</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên di tích">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="docs">Tài liệu di tích <span class="text-red">*</span></label>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection