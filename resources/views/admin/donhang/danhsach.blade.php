@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">ĐƠN HÀNG
                            <small>Danh sách</small>
                        </h1>
                    </div>
                     @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Ngày lập</th>
                                <th>Tổng Tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donhang as $hdb)
                            <tr class="odd gradeX" style="text-align: center;">
                                <td>{{$hdb->id}}</td>
                                <td>{{$hdb->customer->name}}</td>
                                <td>{{$hdb->date_order}}</td>
                                <td>{{$hdb->total}}</td>
                                <td>{{$hdb->payment->name}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/donhang/xoa/{{$hdb->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/donhang/sua/{{$hdb->id}}">Edit</a></td>
                                <td class="center"><a href="{{url('admin/donhang/pdf',$hdb->id)}}"><button type="submit" class="btn btn-primary">Chi tiết</button></a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection