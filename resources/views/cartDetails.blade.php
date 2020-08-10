@extends('layouts.app2')
@section('content')
<section></section>
<div class="conatiner col-sm-12">
    <div class="card">
        <div class="card-header">Cart Details</div>
        <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="table-responsive">
                <table class="table border">
                    <tbody>
                       @php $sum=0; @endphp
                        @forelse($product as $data)
                        @php
                            $price=\App\AddMenu::where('id','=',$data->product_id)->sum('discount_price');
                            $sum+=$price;
                            $menu=\App\AddMenu::where('id','=',$data->product_id)->first();
                           
                        @endphp
                        <tr class="col-xs-12">
                            <td></td>
                            <td ><img src="{{asset('storage/images/'.$menu->image)}}" class="img-responsive" width="20%" height="20%"></td>
                            <td class="col-xs-4">{{$menu->food_title}}({{$menu->food_type}})</td>
                            <td class="col-xs-3"><i class="fa fa-rupee"></i> {{$menu->discount_price}}</td>
                            <td class="col-xs-2"><a href="/delete-from-cart/{{$data->id}}"><i style="color:red" title="delete from cart" class="fa fa-trash"></i></a></td>
                           
                        </tr>
                        @empty
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <p>oops! your card is empty</p>
                         </div>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <h4><b>Shipping Address</b></h5>
                        <p>{{Auth::user()->mobile}}<br>{{Auth::user()->email}}
                        <br>{{Auth::user()->Address->address1}}<br>{{Auth::user()->Address->address2}}
                        {{Auth::user()->Address->city}}.{{Auth::user()->Address->state}}<br>
                        {{Auth::user()->Address->zip}}</p>
                    </div>
                    <div class="col-sm-6">
                        <table class="table border">
                            <tbody>
                                <tr>
                                    <td><b>Total Price:</b></td>
                                    <td><i class="fa fa-rupee"></i> {{$sum}}</td>
                                    
                                </tr>
                                <tr>
                                    <td><b>GST</b></td>
                                    <td><i class="fa fa-rupee"></i>0.00</td>
                                    
                                </tr> 
                                <tr>
                                    <td><b>Grant Total:</b></td>
                                    <td><i class="fa fa-rupee"></i> {{$sum}}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                              <form action="/customer/order-food/{{$sum}}" method="post">@csrf<button title="add to card and buy" class="btn btn-primary" type="submit">Order Now</button></form></form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
    </div>
</div>
@endsection