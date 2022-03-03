@extends('admin.layout.master')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/buttons.bootstrap4.min.css"  rel="stylesheet">
    <link href="assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Danh sách lễ hội</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class=" btn-list">
                <a class="btn btn-primary btn-custom" data-placement="top" href="{{ route('festivals.create') }}" data-toggle="tooltip"> <i class="fe fe-plus"></i> Thêm lễ hội</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="festivals-table">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">ID</th>
                                    <th class="border-bottom-0">Tên lễ hội</th>
                                    <th class="border-bottom-0">Ảnh đại diện</th>
                                    <th class="border-bottom-0">Di tích</th>
                                    <th class="border-bottom-0">Ngày tổ chức</th>
                                    <th class="border-bottom-0">Ngày thêm</th>
                                    <th class="border-bottom-0">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($festivals as $festival)
                                    <tr>
                                        <td>{{ $festival->id }}</td>
                                        <td><a href="{{ route('festivals.edit', ['id'=>$festival->id]) }}">{{ $festival->name }}</a></td>
                                        <td>
                                            <a href="{{ $festival->slug }}">
                                                <img class="img-index" src="{{ $festival->featured_img }}" alt="">
                                            </a>
                                        </td>
                                        <td><a href="">{{ $festival->relic->name }}</a></td>
                                        <td>{{ $festival->created_at->format('H:i d/m/Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($festival->date)->format('d/m/Y') }}</td>
                                        <td>
                                            <a href="{{ route('festivals.edit', ['id'=>$festival->id]) }}" class="btn btn-info">Sửa</a>
                                            <form style="display: inline-block;" action="{{ route('festivals.destroy', ['id'=>$festival->id]) }}" method="POST">
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa lễ hội này không, nếu chắc chắn muốn xóa nhấn vào ok còn chưa chắc chắn nhấn cancel?');" type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
        <script>
            $('#festivals-table').DataTable({
                responsive: false,
                language: {
                    searchPlaceholder: 'Tìm kiếm...',
                    sSearch: '',
                    "lengthMenu": "Hiển thị &nbsp;_MENU_&nbsp; lễ hội",
                    //"info": "Hiển thị _PAGE_ trên _PAGES_ lễ hội",
                    "info": "",
                    "paginate": {
                        "previous": "Trước",
                        "next": "Sau"
                    }
                },
                "order": [[ 6, 'desc' ]]
            });
        </script>
    @endsection
@endsection