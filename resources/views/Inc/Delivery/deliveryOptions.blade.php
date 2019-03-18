@if (Auth::guest())
@include('Inc.messages')

@elseif(Auth::user())
<div  >

<div class="row">
<div class="col-md-3">
<h1>Delivery Options</h1>
<p style="font-size:16px; font-weight: bold;"  >Standard Delivery</p> <br>
<p style="font-size:16px; font-weight: bold;" > Express Delivery</p>
</div>
<div class="col-md-2">
<h1>Fee Charge</h1>
<p style="font-size:16px; font-weight: bold;" >Tsh.{{$StandarddeliveryCost}}</p> <br>
<p style="font-size:16px; font-weight: bold;" >Tsh.{{$ExpressdeliveryCost}}</p>
</div>
<div class="col-md-2">
<h1>Delivery Time</h1>
<div> 
{!! Form::open(['url' => 'delivery-options-standard' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<select style="font-size:16px;  font-weight: bold;" name="deliverytime" id="deliverytime">
<option style="font-size:16px; height:10px; font-weight: bold;" value="07:30am-11:00am">07:30am-11:00am</option>
<option style="font-size:16px; font-weight: bold;" value="02:00pm-06:00pm">02:00pm-06:00pm</option>
</select>
</div><br>
<div><p style="font-size:16px; font-weight: bold;" >within 90 minutes</p>
</div>
</div>
<div class="col-md-1">
<h1>SELECT</h1>
<p style="font-size:16px; font-weight: bold;" >
<input type="hidden" id="delivery" name="delivery" value="1">
<input type="hidden" id="cost" name="cost" value="{{$StandarddeliveryCost}}">
<input type="hidden" id="time" name="time" value="90minutes">
<input type="hidden" id="name" name="name" value="Standard Delivery">
{{Form::submit('STANDARD',[ 'class'=>'btn btn-success'])}} 
{!! Form::close() !!}
</p> <br>
<p style="font-size:16px; font-weight: bold;" >
{!! Form::open(['url' => 'delivery-options' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<input type="hidden" id="delivery" name="delivery" value="2">
<input type="hidden" id="cost" name="cost" value="{{$ExpressdeliveryCost}}">
<input type="hidden" id="time" name="time" value="90minutes">
<input type="hidden" id="name" name="name" value="Fast Delivery">
{{Form::submit('FAST',[ 'class'=>'btn btn-success'])}} {!! Form::close() !!}</p>
</div>
<div class="col-md-4">
<h1>Order Summary</h1>

@foreach($Order as $row)
<div class="row">
<div style="font-size:16px;" class="col-md-4">{{$row -> product_name}}</div>
<div style="font-size:16px;" class="col-md-2">  Tsh.{{$row -> total}}</div></div>
@endforeach

<hr>
<div class="row">
<div style="font-size:16px;" class=" col-md-4 ">Busket Total</div>
<div style="font-size:16px;" class=" col-md-2 text-right">Tsh.{{$Ordersum}}</div>
</div>
<div class="row">
<div style="font-size:16px;" class=" col-md-4 ">Delivery Total</div>

<div style="font-size:16px;" class=" col-md-2">Tsh.<?php if ($Delivery == '0'){ ?>Null <?php   }else{ ?>{{$delivery }} <?php } ?></div>

</div>

<hr>
<div class="row">
<div style="font-size:16px;" class=" col-md-4 ">Total Cost</div>
<div style="font-size:16px;" class=" col-md-2 text-right">Tsh.<?php if ($Delivery == '0'){ ?>Null <?php   }else{ ?>{{$MainTotal }} <?php } ?></div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-7">

</div>
<div class="col-md-5">
{!! Form::open(['url' => 'payment' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
<button type="submit" class="mt-5 btn btn-lg btn-success btn-block" <?php if ($Delivery == '0'){ ?> disabled <?php   } ?> >
            PROCEED PAYMENT
    </button>
{!! Form::close() !!}
         </div>


</div>
<div class="row">
<div class="col-md-8">
<p style="font-size:16px;">Your order will be delivered to this location

{{$AddressName}} {{$AddressForDelivery}} <br>
 Please if Address is Correct procee if Not you may Click the button to Change <br> <a class="btn btn-success btn-lg" href="/continue-checkout">CHANGE ADDRESS</a>
</p>
</div>
</div>
</div>
@endif`