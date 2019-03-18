
@if(Request::is('update-user'))
<div>
{!! Form::open(['url' => 'save-user' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@foreach($userInfo as $row)
 <div class="row text-center">
 <div class="col-md-12">

 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Name</label>
 <div> <input id="name" name="name" style="font-size: 16px;" value="{{$row -> name}}" type="text"></div>
 </div>
 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Email</label>
 <div> <input style="font-size: 16px;" id="email" name="email" value="{{$row -> email}}" type="text"> </div>
 </div>
 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Phone Number</label>
 <div> <input style="font-size: 16px;" type="text" name="phone" id="phone" value="{{$row -> phone}}"> </div>
 </div>


</div> </div>
@endforeach
{{Form::submit('UPDATE INFO',[ 'class'=>'btn btn-lg btn-success'])}} 
{!! Form::close() !!}
</div>
@else
<div>
{!! Form::open(['url' => 'update-account' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@foreach($userInfo as $row)
 <div class="row text-center">
 <div class="col-md-12">

 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Name</label>
 <div>{{$row -> name}}</div>
 </div>
 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Email</label>
 <div>{{$row -> email}}</div>
 </div>
 <div class="col-md-4"  style="font-size: 16px;">
 <label style="font-size: 16px;" for="quantity">User Phone Number</label>
 <div>{{$row -> phone}}</div>
 </div>


</div> </div>
@endforeach
{{Form::submit('EDIT INFO',[ 'class'=>'btn btn-lg btn-success'])}} 
{!! Form::close() !!}
</div>
@endif
<div class="mt-7">
<h1 class=".color-danger">Delete Your Account</h1>
<p style="font-size:16px;">
If you delete Account and you have not finished to place your order you will also delete the unfinished process <br>
Any Finished order will be safe <br>
You may contact us fo any feed back or any support you need before deleting your Account.</p>
<a href="/delete-accout" class="btn btn-danger btn-lg">DELETE ACCOUNT</a>
</div>
