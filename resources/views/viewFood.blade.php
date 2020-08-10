@extends('layouts.app2')

@section('content')
<section></section>
<div class=" card container" >
    <div class=" card-header col-xl-9 mx-auto mt-3">
       <center><h5 class="mb-5" style="color: #f56942"><b>BUY FOOD</b></h5></center>
    </div>
    <div class=" card-body row col-md-12">
        <div class="col-sm-12">
            <div class="card card-cascade narrower">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" width="200px" height="345px" src="{{asset('storage/images/'.$data->image)}}"
                            alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="card-body card-body-cascade " >
                        <h5 class="pink-text pb-2 pt-1"><i class="fas fa-utensils"></i> {{$data->food_title}} ({{$data->food_type}})</h5>
                        <h6 class="blue-text pb-2 pt-1"><i class="fas fa-home"></i> {{$data->restaurent_name}}</h6>
                    
                        <ul style="list-style-type:none border">
                            <li><b>Discount Price: </b> <i class="fa fa-rupee"></i>{{$data->discount_price}}&nbsp; &nbsp;&nbsp;&nbsp;<i class="fa fa-rupee"></i><strike>{{$data->actual_price}}</strike></li>
                            <li><b>Deliverable address</b> {{$data->location}}</li>
                        </ul>
                        <h4 class="font-weight-bold card-title">Food Discription</h4>
                        <p class="card-text">{!!$data->food_discription!!}</p>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <form action="/customer/add-to-cart/{{$data->id}}" method="Post">@csrf <input type="hidden" name="user_id" value="{{$data->user_id}}"><button title="add to card and buy" class="btn btn-secondary" type="submit"><i class="fa fa-shopping-cart"></i></button></form>
                            </div>
                        </div>
                    </div>
                    </div>
                 </div>
            </div>
        </div>
        <section></section>
    </div>
   
</div>
   
@endsection
