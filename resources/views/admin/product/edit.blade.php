@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{-- <label for="brandname">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Enter Product name" aria-describedby="exampleInputEmail1-error">
                                        @error('product_name')
                                            <span style="display:block;" class="error invalid-feedback">{{ $message }}</span>
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror --}}
                                        <label for="brandname">Product Name</label>
                                        <input  type="text" class="form-control" name="product_name" autocomplete="product_name" value="{{$product->product_name}}" autofocus>
                                        @error('product_name')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="text" name="product_code" class="form-control" placeholder="Enter ..." value="{{$product->product_code}}">
                                        @error('product_code')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="text" name="product_quantity" class="form-control" placeholder="Enter ..." value="{{$product->product_quantity }}">
                                        @error('product_quantity')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option>Choose a category </option>
                                            @foreach($category as $row)
                                                <option value="{{ $row->id }}" @if ($row->id==$product->category_id) selected @endif> {{ $row->category_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" id="subcategory_id" name="subcategory_id">
                                            @foreach ($subcategory as $item)
                                                <option value="{{ $item->id }}" @if ($item->id==$product->subcategory_id) selected @endif>{{ $item->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_id">
                                            @foreach($brand as $row)
                                                <option value="{{ $row->id }}" @if ($row->id==$product->brand_id) selected @endif> {{ $row->brand_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Product Size</label>
                                        {{-- <input type="text" name="product_size" class="form-control" value="{{ $product->product_size }}"> --}}
                                        <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="{{ $product->product_size }}" >
                                        @error('product_size')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Color</label>
                                        {{-- <input type="text" name="product_color" class="form-control" placeholder="Enter ..." value="{{ $product->product_color }}" > --}}
                                        <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="{{ $product->product_color }}" >
                                        @error('product_color')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Product Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control" placeholder="Enter ..." value="{{ $product->selling_price }}">
                                        @error('selling_price')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control" placeholder="Enter ..." value="{{ $product->discount_price }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="textarea" placeholder="Place some text here" name="product_details">{{$product->product_details}}
                                        </textarea>
                                        @error('product_details')
                                            <span class="error invalid-feedback" style="display:block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="main_slider" value="1" @if($product->main_slider == "1") checked @endif>
                                            <label class="form-check-label">Main Slider</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hot_deal" value="1" @if($product->hot_deal == "1") checked @endif>
                                            <label class="form-check-label">Hot Deal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="best_rated" value="1" @if($product->best_rated == "1") checked @endif>
                                            <label class="form-check-label">Best Rated</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="mid_slider" value="1" @if($product->mid_slider == "1") checked @endif>
                                            <label class="form-check-label">Mid Slider</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hot_new" value="1" @if($product->hot_new == "1") checked @endif>
                                            <label class="form-check-label">Hot New</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="trend" value="1" @if($product->trend) checked= "1") checked @endif>
                                            <label class="form-check-label">Trend</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            {{-- @if ($product->status==1)
                                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                                            @else
                                            <input class="form-check-input" type="checkbox" name="status" value="1">
                                            @endif --}}
                                            {{-- <input class="form-check-input" type="checkbox" name="status" value="1" @php if ($product->status == 1) { echo "checked"; } @endphp> --}}
                                            <input class="form-check-input" type="checkbox" name="status" value="1" @if($product->status == "1") checked @endif >
                                            <label class="form-check-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-success float-right">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Image Product</h3>
                    </div>
                    <form role="form" action="{{ route('product.update.image',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image_one" id="image_one">
                                                <label class="custom-file-input" ></label>
                                                <img src="" id="image_one_preview" width="50px"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 1 Old:</label>
                                        <img src="{{ url('upload/product/',$product->image_one) }}" width="50px;">
                                        <input type="hidden" name="old_image_one" value="{{ $product->image_one }}">
                                    {{-- <img src="{{}}"/> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image_two" id="image_two">
                                                <label class="custom-file-input" ></label>
                                                <img src="" id="image_two_preview" width="50px"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 2 Old:</label>
                                        <img src="{{ url('upload/product/',$product->image_two) }}" width="50px;">
                                        <input type="hidden" name="old_image_two" value="{{ $product->image_two }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 3</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image_three" id="image_three">
                                                <label class="custom-file-input" ></label>
                                                <img src="" id="image_three_preview" width="50px"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Images 3 Old:</label>
                                        <img src="{{ url('upload/product/',$product->image_three) }}" width="50px;">
                                        <input type="hidden" name="old_image_three" value="{{ $product->image_three }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
{{-- <script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script> --}}

    <script>
        $(function () {
    $('#category_id').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {

           $.ajax({
            url: "{{ url('/admin/product/get/subcategory/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    var d =$('#subcategory_id').empty();
                    $.each(data, function(key, value){

                        $('#subcategory_id').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                    });
                },
           });

        }else{
           alert('danger');
        }
    });
});
    </script>
@endsection
