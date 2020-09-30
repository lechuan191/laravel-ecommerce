@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand Edit</li>
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
                    <form action="{{ url('/admin/brand/edit-brand',$brandDetails->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brandname">Brand Name</label>
                                <input type="text" class="form-control" name="name" value="{{$brandDetails->brand_name}}">
                            </div>
                            <div class="form-group">
                                <label > Old Brand Logo</label>
                                <img src="{{ url('upload/brand/',$brandDetails->brand_logo) }}" height="70px;" width="90px;">
                                <input type="hidden" name="old_logo" value="{{ $brandDetails->brand_logo }}">
                            </div>
                            <div class="form-group">
                                <label>Brand Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="logo" value="{{ $brandDetails->brand_name }}" >
                                        <label class="custom-file-input"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('brand.index') }}" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-success float-right">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        </form>
    </section>
@endsection
