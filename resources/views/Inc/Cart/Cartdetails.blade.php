@if (Auth::guest())
@include('Inc.messages')

@elseif(Auth::user())
@if($Orders < 3)

<div  class=" mb-10 row">

<div class="col col-md-3">
<h1>Image</h1>
@foreach($Order as $row)
<div style="height:100px;">
<img style="width:100px; height:50px;" src="{{$row -> image}}" alt=""></div>
@endforeach
</div>
<div class="col col-md-1">
<h1>Name</h1>
@foreach($Order as $row)
<div  style="height:100px; font-size: 16px;">{{$row -> product_name}}</div>
@endforeach

</div>
<div class="col text-center col-md-4">
<h1> Amount</h1>
@foreach($Order as $row)
 <div id="{{$row -> id}}" style="height:100px;">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} <label style="font-size: 16px;" for="quantity">Qnty</label>
<input id="idq"  name="idq" type="hidden" value="{{$row -> id}}"> 
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> quantity}}" type="number">
{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} {!! Form::close() !!} </div>
@endforeach
</div>
<div class="col col-md-2">
<h1>Price</h1>
@foreach($Order as $row)
<div style="font-size: 16px; height:100px;">{{$row -> total}} </div>
@endforeach 
</div>
<div class="col-md-1">
<h1>Action</h1>
@foreach($Order as $row)
<div style="height:100px;">  {!! Form::open(['url' => 'delete-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<input id="id"  name="id" type="hidden" value="{{$row -> id}}"> 
{{Form::submit('DELETE',[ 'class'=>'btn btn-lg btn-success'])}} {!! Form::close() !!}</div>
@endforeach 
</div>
</div>
@else

<div  class=" mb-10 row">

<div class="col col-md-3">
<h1>Image</h1>
@foreach($Order as $row)
<div style="height:100px;">
<img style="width:100px; height:50px;" src="{{$row -> image}}" alt=""></div>
@endforeach
</div>
<div class="col col-md-1">
<h1>Name</h1>
@foreach($Order as $row)
<div  style="height:100px; font-size: 16px;">{{$row -> product_name}}</div>
@endforeach

</div>
<div class="col text-center col-md-4">
<h1> Amount</h1>
@foreach($Order as $row)
 <div id="{{$row -> id}}" style="height:100px;">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} <label style="font-size: 16px;" for="quantity">Qnty</label>
<input id="idq"  name="idq" type="hidden" value="{{$row -> id}}"> 
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> quantity}}" type="number">
{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} {!! Form::close() !!} </div>
@endforeach
</div>
<div class="col col-md-2">
<h1>Price</h1>
@foreach($Order as $row)
<div style="font-size: 16px; height:100px;">{{$row -> total}} </div>
@endforeach 
</div>
<div class="col-md-1">
<h1>Action</h1>
@foreach($Order as $row)
<div style="height:100px;">  {!! Form::open(['url' => 'delete-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<input id="id"  name="id" type="hidden" value="{{$row -> id}}"> 
{{Form::submit('DELETE',[ 'class'=>'btn btn-lg btn-success'])}} {!! Form::close() !!}</div>
@endforeach 
</div>
</div>
@endif

<div class="mt-5 row">
<div class="col col-md-7">
<h1>Total Price</h1>

</div>
<div class="col col-md-5">
<h1></h1>
<div style="font-size: 16px;" class="text-center">{{$Ordersum}}</div>

     
        <a class="mt-5 btn btn-lg btn-success btn-block" href="{{url('/continue-checkout')}}">Processes Checkout</a>
</div>
<a class="mr-5 btn btn-lg btn-success" href="{{url('/empty-busket')}}">Empty Busket</a>
       
       <a class="btn btn-lg btn-success " href="{{url('/start-shopping')}}">Back To Shopping</a> 
</div>
<div class=" row">
<div class="mt-5 text-center ">
        </div>
        <div class=" mt-5 ml-5 text-center ">
        </div>
        </div>



@endif