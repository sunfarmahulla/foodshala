
@extends('layouts.restaurent')
@section('content')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<div class="container col-sm-12">
  <div class="row">

  <div class="box box-primary col-sm-12">
  <div class="box-header with-border"><h4>All Orders<h4></div>
        <div class="box-body table-responsive no-padding">
        <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
            <caption class="text-center">All Order</caption>
            <thead>
            <tr>
                <th>View</th>
                <th>Action</th>
                <th>Status</th>
                <th>Food Image</th>
                <th>Food Name</th>
                <th>Food Type</th>
                <th>Food Price</th>
                <th>Delivarable Location</th>
                <th>Name of Customer</th>
                <th>Mobile of Customer</th>
                <th>Email of Customer</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order as $row)
            
            @php
                $menu=\App\AddMenu::where('id','=',$row->product_id)->first();
                $user=\App\User::where('id','=',$row->user_id)->first();
            @endphp
            <tr>
                <td></td>

                <td>
                @if($row->status=='process')
                    <form action="/change-status-to-confirm-shipped/{{$row->id}}" method="Post">@csrf<button  class="btn btn-primary" type="submit">CHANGE STATUS TO CONFIRM SHIPPED</button></form>
                @elseif($row->status=='pending')
                <form action="/change-status-to-confirm-shipped/{{$row->id}}" method="Post">@csrf<button  class="btn btn-primary" type="submit">CHANGE STATUS TO CONFIRM SHIPPED</button></form>
                @else
                    <button class="btn btn-success"><i class="fa fa-check" style="color:green" aria-hidden="true"></i></button>
                @endif
                </td>
                <td>@if($row->status=='process')
                    <button type="button" class="btn btn-warning">Process..</button>
                    @elseif($row->status=='pending')
                        <button type="button" class="btn btn-warning">Process..</button>
                    @else
                         <button type="button" class="btn btn-success">Shiped</button>
                    @endif
                </td>
                <td><img src="{{asset('storage/images/'.$menu->image)}}" class="img-responsive" width="20%" height="20%"></td>
                <td>{{$menu->food_title}}</td>
                <td>{{$menu->food_type}}</td>
                <td>{{$menu->discount_price}}</td>
                <td>{{$user->Address->address1}}.{{$user->Address->address2}}.{{$user->Address->city}}.{{$user->Address->state}}.{{$user->Address->zip}}</td>
                <td>{{$user->first_name}}.{{$user->middle_name}}.{{$user->last_name}}</td>
                <td>{{$user->mobile}}</td>
                <td>{{$user->email}}</td>
                <td>{{\Carbon\Carbon::parse($row->created_at)->format('d-M-Y')}}</td>
            </tr>
            @empty
                
            @endforelse
            
            </tbody>
            <tfoot>
            <tr>
                <td colspan="9" class="text-center">All Order, Please replay soon</td>
            </tr>
            </tfoot>
        </table>
        </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script>
    $('table').DataTable();
</script>

@endsection