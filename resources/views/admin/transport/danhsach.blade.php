@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hình thức vận chuyển<small>/Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    @if(session('thongbao'))
                        <div class="alert alert-success">{{session('thongbao')}}</div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center;>
                                <th style="text-align: center;>ID</th>
                                <th style="text-align: center;">Tên dịch vụ</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transport as $tsp)
                            <tr class="odd gradeX" style="text-align: center;">
                                <td>{{$tsp->id}}</td>
                                <td>{{$tsp->name}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/transport/sua/{{$tsp->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$transport->links()}}</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection