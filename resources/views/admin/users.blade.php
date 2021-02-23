@extends('admin.base')
@section('title','Isu - DevBasic')
@section('main')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-label-left input_mask">
                        {{ csrf_field() }}
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                   placeholder="username" name="username">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess3" placeholder="fullname"
                                   name="Họ tên">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="email" class="form-control has-feedback-left" id="inputSuccess4"
                                   placeholder="Email" name="email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="tel" class="form-control" id="inputSuccess5" placeholder="Điện thoại" name="phone">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Địa chỉ</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Ngày sinh <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                       required="required" type="text" onfocus="this.type='date'"
                                       onmouseover="this.type='date'" onclick="this.type='date'"
                                       onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="birthday">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function () {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="x_title">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm tài khoản
            </button>
        </div>
    </div>
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Quản lý tài khoản
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
                        <th>Username</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh</th>
                        <th>Thời gian chỉnh sửa</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$user->username}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td><button type="button" class="btn btn-outline-primary btn-sm edit" data-toggle="modal" data-target="#exampleModal">Sửa</button>
                                <a href="" class="btn btn-outline-danger btn-sm">Xóa</a>
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
            let username = $("input[name=username]").val();
            let fullname = $("input[name=fullname]").val();
            let email = $("input[name=email]").val();
            let phone = $("input[name=phone]").val();
            let address = $("input[name=address]").val();
            let birthday = $("input[name=birthday]").val();
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/users/add')}}",
                type:"POST",
                data:{
                    username:username,
                    fullname:fullname,
                    email:email,
                    phone:phone,
                    address: address,
                    birthday: birthday,
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
        // chỉnh sửa
        $(".edit").click(function(e){
            let username = $(this).closest('tr').find('td:nth-child(2)').text();
            let fullname = $(this).closest('tr').find('td:nth-child(3)').text();
            let email = $(this).closest('tr').find('td:nth-child(4)').text();
            let phone = $(this).closest('tr').find('td:nth-child(5)').text();
            let address = $(this).closest('tr').find('td:nth-child(6)').text();
            let birthday = $(this).closest('tr').find('td:nth-child(7)').text();
            $('input #inputSuccess2').val(username);
            alert(username);
        });
    </script>
@stop
