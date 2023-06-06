@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Brand Product
            </header>
            <div class="panel-body">
                @foreach ($edit_brand_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}"
                        method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name brand</label>
                            <input type="text" class="form-control" value="{{$edit_value->brand_name}}"
                                name="brand_product_name" placeholder="Name brand">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description brand</label>
                            <textarea class="form-control" name="brand_product_desc" id="exampleInputPassword1"
                                value=""> {{$edit_value->brand_desc}}</textarea>
                        </div>
                       

                        <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>
                    </form>
                </div>
                @endforeach

            </div>
            </header>
            {{-- <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}"
                        method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name brand</label>
                            <input type="text" class="form-control" value="{{$edit_brand_product->brand_name}}"
                                name="brand_product_name" placeholder="Name brand">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description brand</label>
                            <textarea class="form-control" name="brand_product_desc" id="exampleInputPassword1"
                                value=""> {{$edit_brand_product->brand_desc}}</textarea>
                        </div>


                        <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>
                    </form>
                </div>


            </div> --}}
        </section>

    </div>

</div>
@endsection