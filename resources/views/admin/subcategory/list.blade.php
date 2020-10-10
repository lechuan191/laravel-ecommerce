@extends('admin.layouts.master')
@section('content')
 <!-- DataTables -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6" style="display: flex;justify-content: space-between;">
          <h1>Sub Category</h1>
          <a class="btn btn-primary btn-sm" href="{{ route('subcategory.create') }}"><i class="fas fa-plus"></i> Add Sub Category</a>
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
                    <th>Sub Category name</th>
                    <th>Category name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($sub_cate as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                    <td>{{ $item->subcategory_name }}</td>
                    <td>{{ $item->category_name}}</td>

                  <td class="text-center">
                    <a class="btn btn-info btn-sm" href="{{route('subcategory.edit',$item->id)}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <a class="btn btn-danger btn-sm" id="deleteRecord" href="{{route('subcategory.destroy',$item->id)}}"><i class="fas fa-trash"></i> Delete</a>                    {{-- <form action="{{url('/admin/category/delete-category',$item->id)}}" method="PUT">
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
                    <th>Sub Category name</th>
                    <th>Category name</th>
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
