@extends('admin.layout.master')
@section('datatable-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('datatable-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  toastr.options.closeButton = true;
  toastr.options.closeMethod = 'fadeOut';
  toastr.options.closeDuration = 100;
  toastr.success("{{Session::get('message')}}");
  @endif
  
</script>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
  <form action="{{ url('/admin/category/edit-category',$cateDetails->id) }}" method="POST">
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
              <input type="text" id="name" name="name" class="form-control" value="{{$cateDetails->name}}">
            </div>
            <div class="form-group">
              <label for="parent_id">Parent Id</label>
              <select class="form-control" name="parent_id">
                <option value="0">Main Category</option>
                @foreach($levels as $val)
                <option value="{{ $val->id }}" @if($val->id==$cateDetails->parent_id) selected @endif>{{ $val->name }}</option>
                @endforeach
                    {{-- <option selected>2</option>
                    <option value="3" selected></option> --}}
              </select>
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea id="description" name="description" class="form-control" rows="4">{{$cateDetails->description}}</textarea>
            </div>
            {{-- <div class="form-group">
              <label for="url">URL</label>
              <input type="text" id="url" name="url" class="form-control" value="{{$cateDetails->url}}">
            </div> --}}
            <div class="form-group">
              <label for="inputStatus">Trạng thái</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" id="status" @if($cateDetails->status == "1") checked @endif value="1">
              </div>
              {{-- <select class="form-control custom-select">
                <option selected disabled>Select one</option>
                <option>On Hold</option>
                <option>Canceled</option>
                <option>Success</option>
              </select> --}}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <a href="{{'/admin/category'}}" class="btn btn-secondary">Hủy</a>
        <button type="submit" class="btn btn-success float-right">Lưu</button>
      </div>
    </div>
  </form>
</section>
@endsection