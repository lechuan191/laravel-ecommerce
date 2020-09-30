@extends('admin.layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Brand Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Brand Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
      <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="form-group">
                          <label for="brandname">Brand Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Brand name">
                      </div>
                      <div class="form-group">
                          <label>Brand Logo</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" name="logo">
                                  <label class="custom-file-input" ></label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                      <a href="{{ route('brand.index') }}" class="btn btn-secondary">Hủy</a>
                      <button type="submit" class="btn btn-success float-right">Thêm mới</button>
                  </div>
              </form>
          </div>
      </div>

    </div>
  </form>
</section>
@endsection
