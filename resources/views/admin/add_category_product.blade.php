@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               THÊM DANH MỤC SẢN PHẨM
            </header>
            <div class="panel-body">
               
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" data-validation="length" data-validation-length="min20" data-validation-error-msg="Hãy điền tên danh mục" name="category_product_name" placeholder="Name category">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea  class="form-control" name="category_product_desc" id="exampleInputPassword1"
                                placeholder="Description category"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                           <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                              
                            </select>
                        </div>
                       
                        <button type="submit" name="add_category_product" class="btn btn-info">ADD</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    
</div>
@endsection