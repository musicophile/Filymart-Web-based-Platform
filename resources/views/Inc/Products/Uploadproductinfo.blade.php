@if (Auth::guest())
<div style="height: 400px;">
<h1>Please <a href="/register">Sign up For Admin</a> or <a href="/login">Login For Admin</a> First. Thank You</h1>
</div>

@elseif(Auth::user())
<div class="col-md-12">
<h2 class="text-center" style=" font-weight:bold; font-size:18px;">Product  Information</h2>
{!! Form::open(['url' => 'submitt' , 'enctype' => 'multipart/form-data']) !!}

<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('product_name', 'Product Name')}}
{{ Form::text('product_name', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('price', 'Price')}}
{{ Form::text('price', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('unit', 'Unit')}}
{{ Form::text('unit', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('amount', 'Amount')}}
{{ Form::text('amount', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('category', 'Category')}}
{{ Form::text('category', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('benefits', 'Benefits')}}
{{ Form::textarea('benefits', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>
<div style="font-size:16px;" class="col-md-6 mb-3">
{{Form::label('about', 'About')}}
{{ Form::textarea('about', '', ['class'=> 'form-control', 'placeholder' => 'Enter Address'])}}
</div>

<div style="font-size:16px;" class="col-md-6">
{{Form::label('logo', 'Upload Logo')}}
{{ Form::file('logo', '', ['class'=> 'form-control', 'placeholder' => 'Choose Image', 'type' => 'file'])}}
</div>

  <div class="form-group">
  <div class="col-md-8 ">
    {{Form::submit('UPLOAD',[ 'class'=>'btn btn-lg btn-success'])}}
      </div>
  </div>

{!! Form::close() !!}
<a href="view-product" class="btn btn-success btn-lg">VIEW PRODUCT</a>
</div>     
@endif     
