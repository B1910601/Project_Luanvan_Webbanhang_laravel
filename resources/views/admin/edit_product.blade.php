@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT SẢN PHẨM
            </header>
            <div class="panel-body">

                <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" value="{{$pro->product_name}}" class="form-control" name="product_name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" value="{{$pro->product_price}}" name="product_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tóm tắt sản phẩm</label>
                            <textarea class="form-control" name="product_content"
                               >{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="product_desc" id="ckeditor1"
                                placeholder="Description ">{{$pro->product_desc}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thuộc danh mục</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thuộc thương hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id==$pro->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image">
                            <img src="{{URL::to('uploads/product/'.$pro->product_image)}}" alt="" height="100" width="100">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>

                            </select>
                        </div>

                        <button type="submit" name="update_product" class="btn btn-info">Update</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>

</div>
@endsection