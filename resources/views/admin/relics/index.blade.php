@extends('admin.layout.master')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/buttons.bootstrap4.min.css"  rel="stylesheet">
    <link href="assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-header d-lg-flex d-block">
        <div class="page-leftheader">
            <h4 class="page-title">Danh sách di tích</h4>
        </div>
        <div class="page-rightheader ml-md-auto">
            <div class=" btn-list">
                <button class="btn btn-primary btn-custom" data-placement="top" data-toggle="tooltip"> <i class="fe fe-plus"></i> Thêm di tích</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="relics-table">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">ID</th>
                                    <th class="border-bottom-0">Tên di tích</th>
                                    <th class="border-bottom-0">Ảnh đại diện</th>
                                    <th class="border-bottom-0">Địa chỉ</th>
                                    <th class="border-bottom-0">Danh mục</th>
                                    <th class="border-bottom-0">Ngày thêm</th>
                                    <th class="border-bottom-0">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relics as $relic)
                                    <tr>
                                        <td>{{ $relic->id }}</td>
                                        <td><a href="{{ route('relics.edit', ['id'=>$relic->id]) }}">{{ $relic->name }}</a></td>
                                        <td>
                                            <a href="{{ $relic->slug }}">
                                                <img style="height: 70px" src="https://scontent.fhph1-2.fna.fbcdn.net/v/t39.30808-6/p180x540/272221927_4685684891545435_160166894675441178_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=8bfeb9&_nc_ohc=Pn7ez2_jXC4AX_7rbki&_nc_ht=scontent.fhph1-2.fna&oh=00_AT-HUSmqZ_Er7a_0qXUeLiCgmMv3ujFeLbxsYMOEgRspXg&oe=61F287A2" alt="">
                                            </a>
                                        </td>
                                        <td>{{ $relic->address }}</td>
                                        <td>
                                            @foreach ($relic->getcategory as $cat)
                                                <a class="itemshow" href="">{{ $cat->name }}</a>
                                            @endforeach
                                        </td>
                                        <td>{{ $relic->created_at->format('h:i d/m/Y') }}</td>
                                        <td>{{ $relic->created_at->format('h:i d/m/Y') }}</td>
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
            $('#relics-table').DataTable({
                responsive: false,
                language: {
                    searchPlaceholder: 'Tìm kiếm...',
                    sSearch: '',
                    "lengthMenu": "Hiển thị &nbsp;_MENU_&nbsp; di tích",
                    //"info": "Hiển thị _PAGE_ trên _PAGES_ di tích",
                    "info": "",
                    "paginate": {
                        "previous": "Trước",
                        "next": "Sau"
                    }
                }
            });
        </script>
    @endsection
@endsection