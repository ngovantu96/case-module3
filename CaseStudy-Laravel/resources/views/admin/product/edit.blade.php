@extends('admin.master')
@section('page-title','Danh Sách Nguoi Dung')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Mới Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        {{--                        <li class="breadcrumb-item active">Danh Sách Khách Hàng</li>--}}
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
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <form method="post" action="{{ route('product.update',$product->id) }}"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Tên Sản Phẩm</label>
                                                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter name" >
                                                        @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Loại Sản Phẩm</label>
                                                        <select class="form-control" name="brand" id="">
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}"{{ ($category->name==$product->category->name)?'selected' :''}}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Ảnh Sản Phẩm</label>
                                                        <input type="file" class="form-control" name="image" >
                                                        <img src="{{ $product->getImage() }}" alt="" width="100px" height="150px">
                                                        @error('image')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Ảnh Chi Tiết </label>
                                                        <input type="file" class="form-control" name="image_detail">
                                                        <img src="{{ $product->getImageDetail() }}"  alt="" width="100px" height="150px">
                                                        @error('image_detail')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Số Lượng</label>
                                                        <input type="number" class="form-control" name="quantity" min="0" value="{{ $product->quantity }}">
                                                        @error('quantity')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cost_price">Giá Nhập Vào</label>
                                                        <input type="text" class="form-control" name="cost_price" value="{{ $product->price }}"  >
                                                        @error('cost_price')
                                                        <p class="text-center">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">Giá Bán Ra</label>
                                                        <input type="text" class="form-control" name="price"  value="{{ $product->costPrice }}">
                                                        @error('price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="size">Kích Thước</label>
                                                        <input type="number" class="form-control" name="size" value="{{ $product->size }}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô Tả</label>
                                                <textarea class="ckeditor" id="ckeditor" name="description">{!! $product->description !!}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
