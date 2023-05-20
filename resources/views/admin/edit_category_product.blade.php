@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
              Edit Category Product
            </header>
            <div class="panel-body">
                    @foreach ($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Category</label>
                            <input type="text" class="form-control" value="{{$edit_value->category_name}}" name="category_product_name"
                                placeholder="Name category">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description category</label>
                            <textarea class="form-control" name="category_product_desc" id="exampleInputPassword1"
                                value=""> {{$edit_value->category_desc}}</textarea>
                        </div>
                      

                        <button type="submit" name="update_category_product" class="btn btn-info">Update</button>
                    </form>
                </div>
                @endforeach

            </div>
        </section>

    </div>

</div>
@endsection