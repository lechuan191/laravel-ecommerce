@extends('admin.layouts.master')
@section('content')
    <!-- DataTables -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" style="display: flex;justify-content: space-between;">
                    <h1>Product</h1>
                    <a class="btn btn-primary btn-sm" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> Add Product</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
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
                                    <th>Name</th>
                                    <th>Images</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach ($product as $item)

                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td><img src="{{url('upload/product/',$item->image_one)}}" height="70px;" width="50px;"></td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->subcategory->subcategory_name }}</td>
                                        <td>{{ $item->brand->brand_name }}</td>
                                        <td>{{ $item->product_quantity }}</td>
                                        <td>
                                        @if ($item->status ==1)
                                                <span class="badge badge-success">Active</span>
                                        @else
                                                <span class="badge badge-danger">Inactive</span>

                                        @endif


                                        </td>
                                        <td class="text-center">
                                           <a class="btn btn-info btn-sm" href="{{route('product.edit',$item->id)}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" id="deleteRecord" href="{{route('product.destroy',$item->id)}}"><i class="fas fa-trash"></i> Delete</a>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input dataSwitch" data-id="{{$item->id}}" id="{{$item->id}}"  {{ $item->status==1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{$item->id}}"></label>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Images</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
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
@section('js')
<script>
$(document).ready(function() {
    $('.dataSwitch').change(function() {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let product_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            // url: '/admin/update-sattus',
            url: "{{ route('product.change.status') }}",
            data: { 'status': status, 'id': product_id },
            success: function(data) {
               // console.log(data.messege);
               toastr.success(data.messege);
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>
@endsection
