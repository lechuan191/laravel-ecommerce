@extends('admin.layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sub Category Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Sub Category Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <form action="{{ url('/admin/subcategory/edit-subcategory',$subcateDetails->id) }}" method="POST">
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
              <label for="name">Sub Category Name</label>
              <input type="text" id="name" name="subcategory_name" class="form-control" value="{{$subcateDetails->subcategory_name}}">
            </div>
              <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="category_id">
                      @foreach($cateDetails as $row)
                          <option value="{{ $row->id }}"
                             @if($row->id==$subcateDetails->category_id) selected @endif>{{ $row->category_name }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <a href="{{route('category.index')}}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-success float-right">Lưu</button>
      </div>
    </div>
  </form>
</section>
@endsection
