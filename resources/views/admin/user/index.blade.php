@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users_table" data-page-length='10' class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Email</th>
                  <th>Profession</th>
                  <th>Age</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($users as $user)
                <tr>
                  <td>{{$user->full_name}}</td>
                  <td>{{$user->getType->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->profile->profesion ?? '-'}}</td>
                  <td>{{$user->profile->age ?? '-'}}</td>
                  <td>{{date("d,m-Y", strtotime($user->created_at))}}</td>
                  <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info">Edit</button>
                            <button type="button" class="btn btn-info">Remove</button>
                        </div>
                  </td>
                </tr>
            @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Profession</th>
                    <th>Age</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    
$('#users_table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
</script>
@endsection