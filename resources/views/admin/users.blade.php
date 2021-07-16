@extends('admin.base')
@section('title','Kai - DevBasic')
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
                        <input type="text" class="none" id="inputSuccess1" name="id">
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                   placeholder="username" name="username">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess3" placeholder="Họ tên"
                                   name="fullname">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="email" class="form-control has-feedback-left" id="inputSuccess4"
                                   placeholder="Email" name="email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="tel" class="form-control" id="inputSuccess5" placeholder="Điện thoại"
                                   name="phone">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <select class="select2_single form-control" tabindex="-1" style="padding-left: 45px;"
                                    name="group_id">
                                <option value="0" disabled="true" selected="true"> Chọn nhóm người dùng</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="text" class="form-control" id="inputSuccess6" placeholder="Địa chỉ"
                                   name="address">
                            <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 ">Ngày sinh <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                       id="inputSuccess7"
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
                        <div class="form-group row">
                            <div class="avatar-wrapper">
                                <img class="profile-pic" src=""/>
                                <div class="upload-button">
                                    <i class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" accept="image/*" name="avatar"/>
                            </div>
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
            <button id="add-account" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">Thêm tài khoản
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
                        <th>Group</th>
                        <th>Thời gian chỉnh sửa</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->username}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->group_name}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm edit" data-toggle="modal"
                                        data-target="#exampleModal">Sửa
                                </button>
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
        $(".save").click(function (e) {
            e.preventDefault();
            var formData = new FormData();
            var files = $("input[name=avatar]")[0].files;
            if (files.length > 0) {
                formData.append('avatar', files[0]);
            }
            formData.append('username', $("input[name=username]").val());
            formData.append('fullname', $("input[name=fullname]").val());
            formData.append('email', $("input[name=email]").val());
            formData.append('phone', $("input[name=phone]").val());
            formData.append('address', $("input[name=address]").val());
            formData.append('birthday', $("input[name=birthday]").val());
            formData.append('group_id', $("select[name=group_id]").val());
            formData.append('_token', "{{ csrf_token() }}");
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/users/add')}}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // if(response) {
                    //     location.reload();
                    // }
                    // else {
                    //     alert('Có lỗi khi lưu Data! Xin vui lòng thử lại');
                    // }
                },
            });
        });
        // update data
        $(".edit-form").click(function (e) {
            e.preventDefault();
            let id = $("input[name=id]").val();
            let username = $("input[name=username]").val();
            let fullname = $("input[name=fullname]").val();
            let email = $("input[name=email]").val();
            let phone = $("input[name=phone]").val();
            let address = $("input[name=address]").val();
            let birthday = $("input[name=birthday]").val();
            let group_id = $("select[name=group_id]").val();
            let avatar = $("input[name=avatar]").val();
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/users/update')}}",
                type: "POST",
                data: {
                    id: id,
                    username: username,
                    fullname: fullname,
                    email: email,
                    phone: phone,
                    address: address,
                    birthday: birthday,
                    group_id: group_id,
                    avatar: avatar,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
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
        $(".edit").click(function (e) {
            let id = $(this).closest('tr').find('th:nth-child(1)').text();
            let username = $(this).closest('tr').find('td:nth-child(2)').text();
            let fullname = $(this).closest('tr').find('td:nth-child(3)').text();
            let email = $(this).closest('tr').find('td:nth-child(4)').text();
            let phone = $(this).closest('tr').find('td:nth-child(5)').text();
            let address = $(this).closest('tr').find('td:nth-child(6)').text();
            let birthday = $(this).closest('tr').find('td:nth-child(7)').text();
            $('#inputSuccess1').val(id);
            $('#inputSuccess2').val(username);
            $('#inputSuccess3').val(fullname);
            $('#inputSuccess4').val(email);
            $('#inputSuccess5').val(phone);
            $('#inputSuccess6').val(address);
            $('#inputSuccess7').val(birthday);
            $('.save-form').removeClass("block");
            $('.save-form').addClass("none");
            $('.edit-form').removeClass("none");
            $('.edit-form').addClass("block");
        });
        $("#add-account").click(function (e) {
            $('.save-form').removeClass("none");
            $('.save-form').addClass("block");
            $('.edit-form').removeClass("block");
            $('.edit-form').addClass("none");
        });
        $(".delete").click(function (e) {
            let id = $(this).closest('tr').find('th:nth-child(1)').text();
            $.ajax({
                {{--url: "{{ route('admin/users/add')}}",--}}
                url: "{{asset('/admin/users/delete')}}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response) {
                        location.reload();
                    }
                    else {
                        alert('Có lỗi khi xóa Data! Xin vui lòng thử lại');
                    }
                },
            });
        });
        $(document).ready(function () {

            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function () {
                readURL(this);
            });

            $(".upload-button").on('click', function () {
                $(".file-upload").click();
            });
        });
    </script>
    <style>
        .none {
            display: none;
        }

        .block {
            display: block;
        }

        .avatar-wrapper {
            position: relative;
            height: 200px;
            width: 200px;
            margin: 50px auto;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 1px 1px 15px -5px black;
            transition: all .3s ease;
        }

        .avatar-wrapper .profile-pic {
            height: 100%;
            transition: all .3s ease;
        }

        .avatar-wrapper .upload-button {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .avatar-wrapper .fa-arrow-circle-up {
            position: absolute;
            font-size: 234px;
            top: -17px;
            left: 0;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #34495e;
        }
    </style>
@stop
