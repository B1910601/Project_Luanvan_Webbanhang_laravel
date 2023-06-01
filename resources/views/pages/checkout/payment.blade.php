@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                <li class="active">Thanh toán </li>
            </ol>
        </div>
        <!--/breadcrums-->




        <!--/register-req-->

      
        <div class="review-payment">
            <h2>Xem lại giỏ hàng </h2>
        </div>
<div class="table-responsive cart_info">
<?php
                $content = Cart::content();
            ?>
<table class="table table-condensed">
    <thead>

        <tr class="cart_menu">
            <td class="image">Hình ảnh</td>
            <td class="description">Mô tả</td>
            <td class="price">Giá</td>
            <td class="quantity">Số lượng</td>
            <td class="total">Tổng tiền</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($content as $v_content)
        <tr>
            <td class="cart_product">
                <a href=""><img src="{{URL::to('uploads/product/'.$v_content->options->image)}}" alt=""
                        width="100" /></a>
            </td>
            <td class="cart_description">
                <h4><a href="">{{$v_content->name}}</a></h4>
                <p>{{$v_content->id}}</p>
            </td>
            <td class="cart_price">
                <p>{{number_format($v_content->price,0,',','.'). ' ' . 'VNĐ'}}</p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                        {{csrf_field()}}
                        <input class="cart_quantity_input" type="number" min="1" size="1" name="cart_quantity"
                            value="{{$v_content->qty}}" autocomplete="off" size="2">
                        <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" class="form-control">
                        <input type="submit" name="update_qty" value="Cập nhật" class="btn btn-default btn-sm">
                    </form>
                </div>

            </td>
            <td class="cart_total">
                <p class="cart_total_price">
                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal,0,',','.'). ' ' . 'VNĐ';
                                ?>

                </p>
            </td>
            <td class="cart_delete">
                <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i
                        class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach



    </tbody>
</table>
</div>
        <div class="table-responsive cart_info">
            <h3>Chọn hình thức thanh toán</h3>
        </div>
        <form action="{{URL::to('/order-place')}}" method="POST">
            {{ csrf_field() }}
        <div class="payment-options">
            <span>
                <label><input name="payment_option" value="1" type="checkbox"> Thanh toán bằng thẻ ATM</label>
            </span>
            <span>
                <label><input name="payment_option"  value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
            </span>
            <span>
                <label><input name="payment_option"  value="3" type="checkbox"> Thanh toán bằng paypal</label>
            </span>
        </div>
        <input type="submit" name="send_order_place" value="Đặt hàng" class="btn btn-primary btn-sm">
        </form>
    </div>
</section>

@endsection