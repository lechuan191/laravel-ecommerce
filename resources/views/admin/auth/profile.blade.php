@extends('admin.layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Change Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="">Old Password</label>
                          <input type="password" class="form-control" id="" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                          <label for="">New Password</label>
                          <input type="password" class="form-control" id="" placeholder="Password">
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection