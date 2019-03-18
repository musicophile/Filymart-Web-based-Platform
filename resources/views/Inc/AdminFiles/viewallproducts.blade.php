

<h1>These are Orders please</h1>

@foreach($Orders as $row)
 <div class="row text-center">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="col-md-12">
 <div class="col-md-3">
 <img style="width:100px; height:50px;" src="{{$row -> image}}" alt="">
 </div>
 <div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> id}}"> 
</div>
<div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> user_id}}"> 
</div>
 <div class="col-md-2"  style="font-size: 16px;">{{$row -> product_name}}</div>
 <div class="col-md-2" >
      <label style="font-size: 16px;" for="quantity">Qnty</label>
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> quantity}}" type="number">
</div>
<div class="col-md-1">{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} 
</div>

</div>{!! Form::close() !!} </div>
@endforeach
<h1>These are products please</h1>
@foreach($Products as $row)
 <div class="row text-center">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="col-md-12">
 <div class="col-md-3">
 <img style="width:100px; height:50px;" src="{{$row -> image}}" alt="">
 </div>
 <div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> price}}"> 
</div>
<div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> amount}}"> 
</div>
 <div class="col-md-2"  style="font-size: 16px;">{{$row -> product_name}}</div>
 <div class="col-md-2" >
      <label style="font-size: 16px;" for="quantity">Qnty</label>
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> category}}" type="number">
</div>
<div class="col-md-1">{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} 
</div>

</div>{!! Form::close() !!} </div>
@endforeach
<h1>These are Address please</h1>
@foreach($Address as $row)
 <div class="row text-center">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="col-md-12">
 <div class="col-md-2">
 <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> lat}}"> 
 </div>
 <div class="col-md-2">
 <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> lng}}"> 
 </div>
 <div class="col-md-1" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> user_id}}"> 
</div>
<div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> first_name}}"> 
</div>
 <div class="col-md-2"  style="font-size: 16px;">{{$row -> address_name}}</div>
 <div class="col-md-2" >
      <label style="font-size: 16px;" for="quantity">Qnty</label>
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> phone}}" type="number">
</div>
<div class="col-md-1">{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} 
</div>

</div>{!! Form::close() !!} </div>
@endforeach
<h1>These are Users please</h1>
@foreach($Users as $row)
 <div class="row text-center">
 {!! Form::open(['url' => 'update-order' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
 <div class="col-md-12">

 <div class="col-md-2">
 <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> verified}}"> 
 </div>
 <div class="col-md-1" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> id}}"> 
</div>
<div class="col-md-2" style="font-size:16px;">
  <input id="idq"  name="idq" type="text"  style="font-size: 16px; width:50px;" value="{{$row -> email}}"> 
</div>
 <div class="col-md-4"  style="font-size: 16px;">{{$row -> name}}</div>
 <div class="col-md-2" >
      <label style="font-size: 16px;" for="quantity">Qnty</label>
<input class="text-center"  id="quantity" name="quantity" style="font-size: 16px; width:60px;" min="1" max="999" value="{{$row -> password}}" type="number">
</div>
<div class="col-md-1">{{Form::submit('UPDATE',[ 'class'=>'btn btn-lg btn-success'])}} 
</div>

</div>{!! Form::close() !!} </div>
@endforeach
