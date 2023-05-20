@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add Brand Product
            </header>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Brand</label>
                            <input type="text" class="form-control" name="brand_product_name"
                                placeholder="Name brand">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description Brand</label>
                            <textarea class="form-control" name="brand_product_desc" id="exampleInputPassword1"
                                placeholder="Description brand"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Action</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>

                            </select>
                        </div>

                        <button type="submit" name="add_brand_product" class="btn btn-info">ADD</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection