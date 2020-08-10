@extends('layouts.app2')

@section('content')
<section></section>
<style>
#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-xs-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                             <h3 class="box-title" style="color:red"><b>All Order History</b></h3>
                        </div>
                        <div>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by restaurent names.." title="Type in a name">
                        </div>
                    </div>
                </div>
                <div class="card-body  table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Restaurent Name</th>
                                <th scope="col">Process</th>
                                <th scope="col">Food Image</th>
                                <th scope="col">Food Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Address</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($food as $row)
                        @php
                            $menu=\App\AddMenu::where('id','=',$row->product_id)->first();
                        @endphp
                            <tr>
                                <td scope="col">{{$menu->restaurent_name}}</td>
                                <th scope="col">
                                @if($row->status=='pending')
                                    <button type="button" class="btn btn-warning">Pending..</button>
                                @elseif($row->status=='process')
                                    <button type="button" class="btn btn-info">Process..</button>
                                @else
                                    <button type="button" class="btn btn-success">Shiped</button>
                                @endif
                                </th>
                                <td scope="col"><img src="{{asset('storage/images/'.$menu->image)}}" class="img-responsive" width="20%" height="20%"></td>
                                <td scope="col">{{$menu->food_type}}</td>
                                <td scope="col">{{$menu->discount_price}}</td>
                                <td scope="col">{{$menu->location}}</td>
                                <td scope="col">{{\Carbon\Carbon::parse($row->created_at)->format('d-M-Y')}}</td>
                            </tr>
                        </tfoot>
                        @empty
                        <div class="alert alert-info alert-dismissible col-sm-12">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <p>oops! no item available</p>
                        </div>
                        @endforelse
                        </tbody>
                        
                    </table>
                </div>
                {!! $food->render() !!}
            </div>
        </div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
   
@endsection