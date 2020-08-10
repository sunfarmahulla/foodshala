@extends('layouts.restaurent')

@section('content')
<div class="container col-sm-12">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus"></i> Add Menu</h3>
    </div>
    <form role="form" method="POST" action="{{route('additeminmenu')}}" enctype="multipart/form-data">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="">Food Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}"  placeholder="Enter Food Title" autofocus required>

            </div>
            <div class="form-group">
                <label>Select Food Type</label>
                <select multiple  name="food_type" class="form-control">
                    <option value="veg">veg</option>
                    <option value="non-veg">non-veg</option>
                    <option value="veg-non-veg">veg/non-veg</option>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <!-- <input type="text" class="form-control" value="{{old('location')}}" name="location" id="location" placeholder="Type Deliverable Location" autofocus required> -->
                <input type="text" id="location" name="location"  onFocus="geolocate()"  class="form-control"  required="" placeholder="Type Deliverable Location" value="{{ old('location')  }}" autofocus required>

            </div>
            
            <div class="form-group">
                  <label for="exampleInputFile">Upload Food Image</label>
                  <input type="file" id="exampleInputFile" name="image" required>
                    <p class="help-block">Image can be jpg, gif,jpeg</p>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add Short Description About Food
                        <small>Simple and fast</small>
                    </h3>
                
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                
                </div>
                
                <div class="box-body pad">
                
                <div class="form-group">
			  	    <textarea class="textarea" name="about" rows="5" placeholder="Write Something About Model" value="{{old('about')}}"  required></textarea>
	                
	  		    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Actual Price in Ruppess</label>
                <input type="number" min="0" class="form-control" value="{{old('actual_price')}}" name="actual_price" placeholder="Type Actula price" autofocus required>

            </div>

            <div class="form-group">
                <label for="">Discount Price in Ruppess</label>
                <input type="number" min="0" class="form-control" value="{{old('discount_price')}}" name="discount_price" placeholder="Type Discount Price" autofocus required>
            </div>
            
        </div>
        
        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDxTV3a6oL6vAaRookXxpiJhynuUpSccjY&amp;libraries=places&amp;callback=initAutocomplete" async defer></script>
<script>
                var placeSearch, autocomplete;
                function initAutocomplete() {
                    autocomplete = new google.maps.places.Autocomplete(
                            (document.getElementById('location')), {
                        types: ['geocode']
                    });
                    autocomplete.addListener('place_changed', fillInAddress);
                }
                function geolocate() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var geolocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            var circle = new google.maps.Circle({
                                center: geolocation,
                                radius: position.coords.accuracy
                            });
                            autocomplete.setBounds(circle.getBounds());
                        });
                    }
                }
</script>

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
  <script>
            
            CKEDITOR.replace( 'about' );
  </script>
  
@endsection