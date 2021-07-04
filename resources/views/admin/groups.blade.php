@extends('admin.base')
@section('title','sino - Dõi bước theo bạn')
@section('main')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhóm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-label-left input_mask">
                        {{ csrf_field() }}
                        <input type="text" class="none" id="inputSuccess1" name="id">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                   placeholder="Tên nhóm" name="name">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess3" placeholder="Mã code"
                                   name="code">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary edit-form none">Sửa</button>
                    <button type="button" class="btn btn-primary save save-form block">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="x_title">
            <button id="add-account" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm nhóm
            </button>
        </div>
    </div>
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý nhóm tài khoản
                    <small></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên nhóm</th>
                        <th>Mã Code</th>
                        <th>Thời gian chỉnh sửa</th>
                        <th>Thời gian tạo</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $key => $group)
                        <tr>
                            <th scope="row">{{$group->id}}</th>
                            <td>{{$group->name}}</td>
                            <td>{{$group->code}}</td>
                            <td>{{$group->updated_at}}</td>
                            <td>{{$group->created_at}}</td>
                            <td><button type="button" class="btn btn-outline-primary btn-sm edit" data-toggle="modal" data-target="#exampleModal">Sửa</button>
                                <button type="button" class="btn btn-outline-danger btn-sm delete">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        $(".save").click(function(e){
            e.preventDefault();
            let name = $("input[name=name]").val();
            let code = $("input[name=code]").val();
            $.ajax({
                url: "{{asset('/admin/groups/add')}}",
                type:"POST",
                data:{
                    name: name,
                    code: code,
                    _token: "{{ csrf_token() }}"
                },
                success:function(response){
                    if(response) {
                        location.reload();
                    }
                    else {
                        alert('Có lỗi khi lưu Data! Xin vui lòng thử lại');
                    }
                },
            });
        });
        // update data
        $(".edit-form").click(function(e){
            e.preventDefault();
            let id = $("input[name=id]").val();
            let name = $("input[name=name]").val();
            let code = $("input[name=code]").val();
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/groups/update')}}",
                type:"POST",
                data:{
                    id:id,
                    name: name,
                    code: code,
                    _token: "{{ csrf_token() }}"
                },
                success:function(response){
                    if(response) {
                        location.reload();
                    }
                    else {
                        alert('Có lỗi khi update Data! Xin vui lòng thử lại');
                    }
                },
            });
        });
        // chỉnh sửa
        $(".edit").click(function(e){
            let id = $(this).closest('tr').find('th:nth-child(1)').text();
            let name = $(this).closest('tr').find('td:nth-child(2)').text();
            let code = $(this).closest('tr').find('td:nth-child(3)').text();
            $('#inputSuccess1').val(id);
            $('#inputSuccess2').val(name);
            $('#inputSuccess3').val(code);
            $('.save-form').removeClass("block");
            $('.save-form').addClass("none");
            $('.edit-form').removeClass("none");
            $('.edit-form').addClass("block");
        });
        $("#add-account").click(function(e){
            $('.save-form').removeClass("none");
            $('.save-form').addClass("block");
            $('.edit-form').removeClass("block");
            $('.edit-form').addClass("none");
        });
        $(".delete").click(function (e) {
            if (confirm("Bạn muốn xóa dữ liệu")) {

            let id = $(this).closest('tr').find('th:nth-child(1)').text();
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/groups/delete')}}",
                type:"POST",
                data:{
                    id:id,
                    _token: "{{ csrf_token() }}"
                },
                success:function(response){
                    if(response) {
                        location.reload();
                    }
                    else {
                        alert('Có lỗi khi xóa Data! Xin vui lòng thử lại');
                    }
                },
            });
            }
        });
    </script>
    <style>
        .none {
            display: none;
        }
        .block {
            display: block;
        }
    </style>
@stop
