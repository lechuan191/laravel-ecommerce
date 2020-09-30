@extends('admin.layouts.master')
@section('content')
 <!-- DataTables -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" style="display: flex;justify-content: space-between;">
          <h1>Brand</h1>
          <a class="btn btn-primary btn-sm" href="{{ route('brand.create') }}"><i class="fas fa-plus"></i> Add Brand</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Projects</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($brand as $item)

                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->brand_name }}</td>
{{--                    <td> <img src="{{ URL::to($item->brand_logo) }}" height="50px;" width="150px;" alt=""> </td>--}}
                    <td> <img src="{{url('upload/brand/',$item->brand_logo)}}" height="50px;" width="150px;"> </td>
                  <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('brand.edit',$item->id)}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a class="btn btn-danger btn-sm " id="deleteRecord" href="{{route('brand.destroy',$item->id)}}"><i class="fas fa-trash"></i> Delete</a>                    {{-- <form action="{{url('/admin/category/delete-category',$item->id)}}" method="PUT">
                      @csrf
                      @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>Delete</button>
                    </form> --}}
                    {{-- <form action="{{ route('category.destroy',$item->id) }}" method="POST">

                      <a class="btn btn-info" href="{{ route('category.show',$item->id) }}">Show</a>

                      <a class="btn btn-primary" href="{{ route('category.edit',$item->id) }}">Edit</a>

                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
              {{-- <div style="display:flex;justify-content:flex-end"> {!! $cate ?? ''->links() !!}</div> --}}

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
  <!-- DataTables -->
