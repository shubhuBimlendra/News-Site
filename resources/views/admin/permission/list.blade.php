@extends('admin.layout.master')
@section('content')

    <!-- All the CSS file of this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{$page_name}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                    <div class="card">
                        @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                        @endif
                        <div class="card-header">
                            <strong class="card-title">{{$page_name}}</strong>
                            <a href="{{url('/back/permission/create')}}" class="btn btn-primary pull-right">Create</a>
                        </div>
                    <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i=>$row)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->display_name}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    <a href="{{url('/back/permission/edit/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                    {{Form::open(['method'=>'DELETE','url'=>['/back/permission/delete/'.$row->id],'style'=>'display:inline'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {{Form::close()}}
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>


    <!-- All the JS file of this page -->
    <script src="{{asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>


    <script src="{{asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/datatables-init.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });
    </script>

@endsection
