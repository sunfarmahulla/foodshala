@extends('layouts.restaurent')

@section('content')

<div class="container col-sm-12">
    <div class="box box-success box-header">
        <h5><i class="fa fa-list"></i> Food List</h5>
    </div>
    <div class="row">
    @forelse($data as $row)
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-yellow">
                
                <img class="img-responsive" src="{{asset('storage/images/'.$row->image)}}" width="300" height="200" alt="User Avatar">
                </br>
               <div class="row">
                <div class="col-sm-6">
                    <a href="/edit-get/food-item/{{$row->id}}" class="btn btn-info" title=""edit><i class="fa fa-edit"></i></a>
                </div>
                <div class="col-sm-6 ">
                 <a href="/delete/food-item/{{$row->id}}" style="float:right;" class="btn btn-danger" title=""edit><i class="fa fa-trash"></i></a>

                </div>
               </div>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Food Name<span class="pull-right badge bg-blue">{{$row->food_title}}</span></a></li>
                    <li><a href="#">Food Type <span class="pull-right badge bg-aqua">{{$row->food_type}}</span></a></li>
                    <li><a href="#">Actual Price<span class="pull-right badge bg-green"><i class="fa fa-inr"></i> {{$row->actual_price}}</span></a></li>
                    <li><a href="#">Discount Price<span class="pull-right badge bg-red"><i class="fa fa-inr"></i> {{$row->discount_price}}</span></a></li>
                    <li><a href="#">Deliverable Address<span class="pull-right badge bg-red">{{$row->location}}</span></a></li>
                    <li><a>{!!$row->food_discription!!}</a></li>
                </ul>
            </div>
            </div>
            
        </div>
        @empty
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            oops! data is not available Add some item-><a href="{{route('additeminmenu')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </div>
    @endforelse
    </div>
    {!! $data->render() !!}
</div>

@endsection