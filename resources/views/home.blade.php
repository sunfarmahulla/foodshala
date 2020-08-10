@extends('layouts.app2')

@section('content')
<section></section>
<div class=" card container" >
    <div class=" card-header col-xl-9 mx-auto mt-3">
       <center><h5 class="mb-5" style="color: #f56942"><b>SELECT AND BUY YOUR FOOD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! $data->render() !!}</b></h5></center>
    </div>
    <div class=" card-body row col-md-12">
    @forelse($data as $row)
        <div class="col-sm-12">
            <div class="card card-cascade narrower">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" width="200px" height="345px" src="{{asset('storage/images/'.$row->image)}}"
                            alt="Card image cap">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="card-body card-body-cascade " style="font-size:12px">
                        <h5 class="pink-text pb-2 pt-1"><i class="fas fa-utensils"></i> {{$row->food_title}} ({{$row->food_type}})</h5>
                        <h6 class="blue-text pb-2 pt-1"><i class="fas fa-home"></i> {{$row->restaurent_name}}</h6>
                    
                        <ul style="list-style-type:none border">
                            <li><b>Discount Price: </b> <i class="fa fa-rupee"></i>{{$row->discount_price}}&nbsp; &nbsp;&nbsp;&nbsp;<i class="fa fa-rupee"></i><strike>{{$row->actual_price}}</strike></li>
                        </ul>
                        <h4 class="font-weight-bold card-title">Food Discription</h4>
                        <p class="card-text">{!! substr($row->food_discription, 0,200) !!}...</p>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <form action="/customer/add-to-cart/{{$row->id}}" method="Post">@csrf <input type="hidden" name="user_id" value="{{$row->user_id}}"><button title="add to card and buy" class="btn btn-secondary" type="submit"><i class="fa fa-shopping-cart"></i></button></form>
                                <a href="/customer/view-food/{{$row->id}}" class="btn btn-secondary" title="read more"><i class="fa fa-eye">...</i></a>
                            </div>
                        </div>
                    </div>
                    </div>
                 </div>
            </div>
        </div>
        <section></section>
        @empty
        <div class="alert alert-info alert-dismissible col-sm-12">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>oops! no item available</p>
        </div>
    @endforelse
   
    </div>
   
</div>
   
@endsection
