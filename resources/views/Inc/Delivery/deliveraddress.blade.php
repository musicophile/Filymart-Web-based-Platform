@if (Auth::guest())
@include('Inc.messages')

@elseif(Auth::user())        
        
        <div style="height:1000.3px;"class="mb-10">
          <h2 style=" font-weight:bold; font-size:18px;">Delivery Address Information</h2>
          @if ($Address > 0 )
          <div class="col-md-12">
          <div style="font-size:16px;" class="col-md-6">
          @foreach($Addresss as $address)
          <div>Your Address is {{$address -> address_name}}</div>
          <input type="hidden" name="address_id"  id="address_id" value="{{$address -> id}}">
        <div>If you want to use this address to deliever your order Please select The button bellow </div>
        
        {!! Form::open(['url' => 'select-address' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" id="id" name="id" value="{{$address -> id}}">
        {{Form::submit('SELECT ADDRESS',[ 'class'=>'btn btn-lg btn-success'])}} 
        {!! Form::close() !!}
        {!! Form::open(['url' => 'delete-address' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" id="id" name="id" value="{{$address -> id}}">
        {{Form::submit('DELETE ADDRESS',[ 'class'=>'btn btn-success'])}} 
        {!! Form::close() !!}
        @endforeach           

          </div>
          <div style="font-size:16px;" class="col-md-6">

            <div>Create New Address</div>
        <div style="font-size:16px;">If you want to use another addres to deliever your order Please select The button bellow </div>
            <a style="font-size:16px;" href="new-address" class="btn btn-lg btn-success">CREATE NEW ADDRESS</a>

          </div>
          </div>
            
         @else
          <div class="row">
          <div class="col-md-12">
          <h2 class="text-center" style=" font-weight:bold; font-size:18px;">Personal Information</h2>
          <form class="form-horizontal" method="GET" action="{{ url('/validate-order') }}">
          <div class="col-md-12">
                        {{ csrf_field() }}
                        <div style="font-size:16px;" class="form-group">
                         <label for="first_name" class="col-md-4 control-label">First Name</label>
                           <div class="col-md-6">
                                <input id="first_name" style="font-size:16px; height:30px;" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                         </div>
                        </div>
                        <div style="font-size:16px;" class="form-group"> <label for="last_name" class="col-md-4 control-label">Last Name</label>
                            
                            <div class="col-md-6">
                                <input id="last_name" style="font-size:16px; height:30px;" type="text0" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
                         </div>
                        </div>
                    
                    
                        </div>
                 <div class="col-md-12">
                        <h2 class="text-center" style=" font-weight:bold; font-size:18px;">Address Information</h2>
                    <div class="col-md-6">
                        
                        <div style="font-size:16px;" class="form-group" >
                            <label for="apartment_name" class="col-md-4 control-label">Apartment Name</label>
                            <div class="col-md-6">
                                <input id="apartment_name" style="font-size:16px; height:30px;" type="text" class="form-control" name="apartment_name" required>
                            </div>
                        </div>

                        <div style="font-size:16px;" class="form-group" >
                            <label for="street_details" class="col-md-4 control-label">Street Details</label>

                            <div class="col-md-6">
                                <input id="street_details" style="font-size:16px; height:30px;" type="textarea" class="form-control" name="street_details" required>
                            </div>
                        </div>
                        

                        <div style="font-size:16px;" class="form-group" >
                         <label for="city_name" class="col-md-4 control-label">City Name</label>
                            <div class="col-md-6">
                                <input id="city_name" style="font-size:16px; height:30px;" type="text" class="form-control" name="city_name" value="{{ old('city_name') }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div style="font-size:16px;" class="form-group">
                             <label for="location" class="col-md-4 control-label">Select location</label> 
                            <div class="col-md-6">
                                <input id="location" style="font-size:16px; height:30px;" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>
                            </div>
                        </div>

                        <div style="font-size:16px;" class="form-group">
                            <label for="address_name" class="col-md-4 control-label">Name Of The Address</label>

                            <div class="col-md-6">
                                <input id="address_name" style="font-size:16px; height:30px;" type="text" class="form-control" name="address_name" value="{{ old('address_name') }}" required>
                             </div>
                        </div>

                         <div style="font-size:16px;" class="form-group">
                            <label for="lat" class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input id="lat" style="font-size:16px; height:30px;" type="text" class="form-control" name="lat" value="{{ old('lat') }}" required>
                             </div>
                        </div>

                         <div style="font-size:16px;" class="form-group">
                            <label for="lng" class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input id="lng" style="font-size:16px; height:30px;" type="text" class="form-control" name="lng" value="{{ old('lng') }}" required>
                             </div>
                        </div>


                         <div style="font-size:16px;" class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">

                                <div class="input-group">
                                    <div style="width: 110px;" class="input-group-addon">
                                        <select name="country_code" style="width: 90px;" >
                                            <option value="+255">(+255) Tanzania</option>
                                            <option value="+254">(+254) Kenya</option>
                                            
                                        </select>
                                    </div>
                                    <input id="phone" style="font-size:16px; height:30px;" type="text" class="form-control" name="phone" required>

                                    @if ($errors->has('country_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        </div>

                       
                        </div>
                        <div style="font-size:16px;">
                        <p>1.Please enter your location/Street name <br>
                        2.Click satellite on the top left of the map <br>
                        3.Click the + button on the botom right to zoom a map <br>
                        4.Drag a red placemark ot top of your house <br>
                        5.You can Enter your own name on a field of location eg. Unnamed Road,Arusha,Tanzania to Mallya House,Arusha,Tanzania </p></div>
                        <div>
                        
                         <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgAwjdCJ_g5LKcDUPbw9lOKMqyRDYpvbY&libraries=places&callback=initMap"></script>
   
     <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
     <div class="map" id="map" style="width: 100%; height: 300px;"></div>
     <!--div class="form_area">
         <input type="text" name="location" id="location">
         <input type="text" name="lat" id="lat">
         <input type="text" name="lng" id="lng">
     </div-->
    <script>
    /* script */
    function initialize() {
       var latlng = new google.maps.LatLng(-3.3721946,36.69438739999998);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 13
        });
        var marker = new google.maps.Marker({
          map: map,
          position: latlng,
          draggable: true,
          anchorPoint: new google.maps.Point(0, -29)
       });
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var geocoder = new google.maps.Geocoder();
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();   
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
      
            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
           
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);          
        
            bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);
           
        });
        // this function will work on marker move event into map 
        google.maps.event.addListener(marker, 'dragend', function() {
            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {        
                  bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
                  infowindow.setContent(results[0].formatted_address);
                  infowindow.open(map, marker);
              }
            }
            });
        });
    }
    function bindDataToForm(address,lat,lng){
       document.getElementById('location').value = address;
       document.getElementById('lat').value = lat;
       document.getElementById('lng').value = lng;
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
        <style type="text/css">
            .input-controls {
              margin-top: 10px;
              border: 1px solid transparent;
              border-radius: 2px 0 0 2px;
              box-sizing: border-box;
              -moz-box-sizing: border-box;
              height: 32px;
              outline: none;
              box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }
            #searchInput {
              background-color: #fff;
              font-family: Roboto;
              font-size: 15px;
              font-weight: 300;
              margin-left: 12px;
              padding: 0 11px 0 13px;
              text-overflow: ellipsis;
              width: 50%;
            }
            #searchInput:focus {
              border-color: #4d90fe;
            }
        </style>
                        </div>

                        <div class="mt-5 " style="font-size:16px;" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" style="font-size:16px;"  class="btn btn-success">
                                    ADD ADDRESS
                                </button>
                            </div>
                        </div>
                    </form>
            
          </div>
          </div>
          @endif
          </div>
          @endif