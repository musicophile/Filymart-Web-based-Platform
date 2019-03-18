

@if(Request::is('details'))
<body onload="onload();">
    <!--input type="text" name="enter" class="enter" id="lolz" value=""/>
    <input type="button" value="click" onclick="kk();"/-->
</body>
@foreach($Products as $prod)

<div class="container text-center ">
@if ($errors->has('quantity'))
                                    <span style="color: #008000; font-size:18px;" class="help-block">
                                        <strong >{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
{!! Form::open(['url' => 'add-to-cart' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}

        <div class="text-center col-md-6">
          <h2 style="font-weight:bold; font-size:18px;">Product Name</h2>
           <h4 name="product_name" style="font-size:16px;">{{$prod -> product_name}}</h4>
          <h2 style=" font-weight:bold; font-size:18px;">Product Price</h2>
          <h4 id="price" name="price" style="font-size:16px;" class="">{{$prod -> unit}}1-Tsh.{{$prod -> price}}</h4>
          <h2 style=" font-weight:bold; font-size:18px;">Product Amount Available</h2> 

        <h4 style="font-size:16px;" class="">{{$prod -> unit}}{{$prod -> amount}}</h4>
        
        <h2 style=" font-weight:bold; font-size:18px;">Enter Your Amount</h2> 
                    <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:100px;" type="number" min="1" max="999" required placeholder="Qnty"/>                              
         </div>
        <div class="col-md-6">
          <img name="image" class="img-fluid rounded" style="width:500px; height:350px;" src="{{$prod -> image}}" alt="">
        </div>
      
      <div class=" mt-5 text-center ">
      
      <input id="id"  name="id" type="hidden" value="{{$prod -> id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg  btn-success'])}}
      
        </div>
        {!! Form::close() !!}
        </div>

        <div class="row">
        <div class="col-md-6">
        <h1 style="font-weight:bold; font-size:18px;" >About Product</h1>
        <p style="font-size:16px;">{{$prod -> about}}</p>
        </div>
        <div class="col-md-6">
        
        <h1 style="font-weight:bold; font-size:18px;" >Product Benefits</h1>
        <p style="font-size:16px;" >{{$prod -> benefits}} </p>
        
        </div></div>
        @endforeach
        @else

<body onload="onload();">
    <!--input type="text" name="enter" class="enter" id="lolz" value=""/>
    <input type="button" value="click" onclick="kk();"/-->
</body>



<div class="container text-center ">
@if ($errors->has('quantity'))
                                    <span style="color: #008000; font-size:18px;" class="help-block">
                                        <strong >{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
{!! Form::open(['url' => 'add-to-cart' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}

        <div class="text-center col-md-6">
          <h2 style="font-weight:bold; font-size:18px;">Product Name</h2>
           <h4 name="product_name" style="font-size:16px;">{{$Products -> product_name}}</h4>
          <h2 style=" font-weight:bold; font-size:18px;">Product Price</h2>
          <h4 id="price" name="price" style="font-size:16px;" class="">{{$Products -> unit}}1-Tsh.{{$Products -> price}}</h4>
          <h2 style=" font-weight:bold; font-size:18px;">Product Amount Available</h2> 

        <h4 style="font-size:16px;" class="">{{$Products -> unit}}{{$Products -> amount}}</h4>
        
        <h2 style=" font-weight:bold; font-size:18px;">Enter Your Amount</h2> 
                    <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:100px;" type="number" min="1" max="999" required placeholder="Qnty"/>                              
         </div>
        <div class="col-md-6">
          <img name="image" class="img-fluid rounded" style="width:500px; height:350px;" src="{{$Products -> image}}" alt="">
        </div>
      
      <div class=" mt-5 text-center ">
      <input id="id"  name="id" type="hidden" value="{{$Products -> id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg  btn-success'])}}
      
        </div>
        {!! Form::close() !!}
        </div>

        <div class="row">
        <div class="col-md-6">
        <h1 style="font-weight:bold; font-size:18px;" >About Product</h1>
        <p style="font-size:16px;">{{$Products -> about}}</p>
        </div>
        <div class="col-md-6">
        
        <h1 style="font-weight:bold; font-size:18px;" >Product Benefits</h1>
        <p style="font-size:16px;" >{{$Products -> benefits}} </p>
        
        </div></div>
       
        @endif
       