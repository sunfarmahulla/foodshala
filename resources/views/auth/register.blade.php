@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="card col-md-6">
            <form class="text-center border-light p-5" action="{{ route('register') }}" method="POST">
            @csrf
            <h5 class="card-header info-color white-text text-center py-4">
                <strong><p class="h4 mb-">Sign up as Customer</p></strong>
            </h5>

            <div class="form-group">
                <input type="hidden"  name="user_type" class="form-control" value="basic" placeholder="Restaurant Owner" readonly>
            </div>
            <div class="form-group">
                <input type="hidden"  name="name_of_restaurent" class="form-control" value="customer" placeholder="Restaurant Name" >
            </div>
            <div class="form-group">
            <label for><b>Choose Your Food Type</b></label>
                <select name="food_type" class="custom-select" multiple>
                    <option value="veg">Veg</option>
                    <option value="non-veg">Non-Veg</option>
                    <option value="veg-non-veg">Veg/Non-Veg</option>
                </select> 
            </div>
            <div class="form-row mb-4">
                <div class="col">
                    
                    <input type="text" id="defaultRegisterFormFirstName" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}" placeholder="First name" autocomplete="first_name" autofocus>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    
                    <input type="text" id="defaultRegisterFormMiddletName" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{old('middle_name')}}" placeholder="Middle name" autocomplete="middle_name" autofocus>
                    @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    
                    <input type="text" id="defaultRegisterFormLastName" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}" placeholder="Last name" autocomplete="last_name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
            <label>E-mail</label>
                <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4 @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="E-mail" autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group"> 
            <label>Phone Number</label>         
                <input class="form-control input--style-5 @error('mobile') is-invalid @enderror" id="tel" type="tel" value="+1"  name="mobile" title="Phone number id should be start with + and country code like" required  >
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
            <label>Password</label>
                <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" autocomplete="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>
            </div>

            <div class="form-group">
            <label>Password Confirm</label>
                <input type="password" id="defaultRegisterFormPasswordConfirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password confirm" aria-describedby="defaultRegisterFormPasswordHelpBlock" autocomplete="password_confirmation">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group" >
            <label >Address line 1</label>
                <input type="text" id="address1" name="address1"  onFocus="geolocate()"  class="form-control"  required="" placeholder="Address Line 1" value="{{ old('address1')  }}" >
            </div>
            <div class="form-group">
                <input type="text" id="address2" name="address2" class="form-control"   placeholder="Address Line 2"  value="{{old('address2')  }}">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>City:</label>
                            <input type="text" id="city" name="city" class="form-control"  required="" placeholder="City"  value="{{ old('city')  }}" required>
                    </div>
                </div>
                <div class="col">
                <div class="form-group">
                <label for="">State:</label>
                            <input type="text" id="state" name="state" class="form-control"  required="" placeholder="Province/State"  value="{{old('state')  }}" required>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                    <label>Country:</label>
                        <input type="text" id="country" name="country" class="form-control"  required="" placeholder="Country"  value="{{ old('country') }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                    <label>Zip:</label>

                        <input type="text" id="zip" name="zip" class="form-control"  required="" placeholder="Postal Code/ Zip"  value="{{old('zip')  }}" required>
                    </div>
                </div>
            </div>
           
            <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

            </form>
           
        </div>
        <div class="col-sm-6">
            <img class="img-responsive" src="{{asset('images/restaurant3.jpg')}}" width="100%" height="40%" alt="">
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>

<script type="text/javascript">
  $("#tel").intlTelInput({
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#tel").on("blur keyup change", function() {
if($(this).val() == '') {
    var getCode = $("#tel").intlTelInput('getSelectedCountryData').dialCode;
    $(this).val('+'+getCode);
}});
$(document).on("click",".country",function(){
    if($("#phone").val() == '') {
        var getCode = $("#tel").intlTelInput('getSelectedCountryData').dialCode;
        $("#tel").val('+'+getCode);
}});
</script>

<style type="text/css">

.intl-tel-input {
  display: block;
}
.intl-tel-input .selected-flag {
  z-index: 4;
}
.intl-tel-input .country-list {
  z-index: 5;
}
.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}
</style>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDxTV3a6oL6vAaRookXxpiJhynuUpSccjY&amp;libraries=places&amp;callback=initAutocomplete" async defer></script>
<script>
                var placeSearch, autocomplete;
                var componentForm = {
                    street_number: 'short_name',
                    route: 'long_name',
                    locality: 'long_name',
                    administrative_area_level_1: 'short_name',
                    country: 'long_name',
                    postal_code: 'short_name'
                };

                function initAutocomplete() {
                    autocomplete = new google.maps.places.Autocomplete(
                            (document.getElementById('address1')), {
                        types: ['geocode']
                    });
                    autocomplete.addListener('place_changed', fillInAddress);
                }

                function fillInAddress() {
                    var place = autocomplete.getPlace();
                    for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        console.log(addressType);
                        console.log(place.address_components[i]);
                        if (addressType == "street_number") {
                            document.getElementById("address1").value = place.address_components[i].short_name;

                        } else if (addressType == "route") {
                            document.getElementById("address2").value = place.address_components[i].short_name;

                        } else if (addressType == "locality") {
                            document.getElementById("city").value = place.address_components[i].short_name;

                        } else if (addressType == "administrative_area_level_1") {
                            document.getElementById("state").value = place.address_components[i].short_name;

                        } else if (addressType == "country") {
                            document.getElementById("country").value = place.address_components[i].long_name;

                        } else if (addressType == "postal_code") {
                            document.getElementById("zip").value = place.address_components[i].short_name;
                        }

                    }
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
<script>
$("#zip").keyup(function () {
      $("#zip").val($("#zip").val().toString().toUpperCase())  ;
});
</script>
@endsection



