@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>{{$khachhang->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/khachhang/sua/{{$khachhang->id}}" method="POST">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên khách hàng:</label>
                                <input class="form-control" name="Ten" value="{{$khachhang->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính:</label>
                                <input class="form-control" name="Gioitinh" value="{{$khachhang->gender}}" />
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="form-control" name="Email" placeholder="Nhập email" value="{{$khachhang->email}}" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ:</label>
                                <input class="form-control" name="Address" placeholder="Nhập tên địa chỉ" value="{{$khachhang->address}}"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại:</label>
                                <input class="form-control" name="Phone" placeholder="Nhập số điện thoại" value="{{$khachhang->phone_number}}" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection