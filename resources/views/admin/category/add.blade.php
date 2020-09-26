@extends('admin.layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
  <form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
        
          <div class="card-body">
            <div class="form-group">
              <label for="name">Tên loại</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-success float-right">Thêm mới</button>
      </div>
    </div>
  </form>
</section>
@endsection