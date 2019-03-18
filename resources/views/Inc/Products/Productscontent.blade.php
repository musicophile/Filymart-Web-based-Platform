<div class="row">
<div class="col-md-6">
{!! Form::open(['url' => 'search' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <input class="form-control col-md-4" style="font-size: 16px;" id="search" name="search" type="search" placeholder="Search">
      
      <button class="btn btn-success  my-2 my-sm-0" style="font-size: 16px;" type="submit">Search</button>
    {!! Form::close() !!}
    @if ($errors->has('search'))
                                    <span style="color: #008000; font-size:18px;" class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif</div>
<div class="col-md-6">
<h1 class="text-right">Location:Arusha,Tanzania</h1>
@if ($errors->has('quantity'))
                                    <span style="color: #008000; font-size:18px;" class="help-block">
                                        <strong >{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
</div>

</div>

 <div>
     <body onload="onload();">
    <!--input type="text" name="enter" class="enter" id="lolz" value=""/>
    <input type="button" value="click" onclick="kk();"/-->
</body>
<script type="text/javascript">

function openOnImageClick10(id)
{
var c = 2;
        var d = 3;
       // alert ("hello");
       // alert (id);
         $.ajax({
                url:"/getAjax",
                method:"get",
                data:{id: id } ,
                    success:function(data){
                        console.log(data);
                       // alert(id);
                        
                        window.location.href = "/product-details?id="+id;
                    }
                
            })

}

function addToCart(id)
{
var c = 2;
        var d = document.getElementById("quantity").value;
        //alert ("hello");
        //alert (d);
         $.ajax({
                url:"/getAjax",
                method:"get",
                data:{id: id, d:d } ,
                    success:function(data){
                        console.log(data);
                     
                        window.location.href = "/add-to-cart?d="+ encodeURIComponent ( + escape(d))+"&id="+ escape(id);
                     
                        
                    }
                
            })

}
        
    </script>
    <?php
// Include database connection

define("DB_HOST", Config::get('database.connections.nombre.anfitrión'));
define("DB_USER", Config::get('database.connections.nombre.nombre-de-usuario'));
define("DB_PASSWORD", Config::get('database.connections.nombre.contraseña'));
define("DB_DATABASE", Config::get('database.connections.nombre.base-de-datos'));


     
    // Connecting to mysql database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
// SQL query to interact with info from our database
$sql = mysqli_query($conn, "SELECT id, product_name, image, price FROM products LIMIT 8  "); 
$i = 0;
// Establish the output variable
 ?> 
 
 <div class="text-center" style="font-size:16px;" >

          @if(Request::is('search'))
         <h1> {{$searchTer}}  </h1>
          <?php
// Include database connection


     
    // Connecting to mysql database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
// SQL query to interact with info from our database
$sql = mysqli_query($conn, "SELECT id, product_name, image, price FROM products WHERE product_name like '%".$searchTerm."%' "); 
$i = 0;
// Establish the output variable
 ?> <div><table align="center"  padding=""><?php
while($row = mysqli_fetch_array($sql)){ 
    
    $id = $row["id"];
    $product_name = $row["product_name"];
    $image = $row["image"];
    $price = $row["price"];
    
    if ($i % 4 == 0) { // if $i is divisible by our target number (in this case "3")
      ?> <tr width="100%"><td width="29%" ><div style="font-size:16px;" class="row text-center">
      {!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div  class="">
          <div  class="card">
             
            
              <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
             
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">{{$unit}}1-Tsh.{{$price}}</h4>
           <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
          
                                       </div>
         <div class="card-footer">
         <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success'])}}
      {!! Form::close() !!}
         </div>
       </div>
     </div></td>
    
<?php 
    } else {
         ?> <td width="28.5%" ><div style="font-size:16px;" class="row text-center">
         
{!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div  class="">
          <div  class="card">
             
            
              <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
             
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">{{$unit}}1-Tsh.{{$price}}</h4>
           <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
                                       </div>
         <div class="card-footer">
         <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success'])}}
{!! Form::close() !!}
         </div>
       </div>
     </div>
     </td>
<?php 
    }
    $i++;
}

?>
</tr></table>
</div>

                  
                  <div>
                  <?php
$i = 0;
?>
                  @else
                  
      <div class="text-center"><h1>New Arrival Product available ....</h1></div>
 <div><table align="center"  padding=""><?php
while($row = mysqli_fetch_array($sql)){ 
    
    $id = $row["id"];
    $product_name = $row["product_name"];
    $image = $row["image"];
    $price = $row["price"];
    
    if ($i % 4 == 0) { // if $i is divisible by our target number (in this case "3")
      ?> <tr width="100%"><td width="29%" ><div style="font-size:16px;" class="row text-center">

        <div  class="">
          <div  class="card">
                <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
                {!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
           <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
                        </div>
         <div style="font-size: 16px;" class="card-footer">
         <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success'])}}
      
         </div>
         {!! Form::close() !!}
       </div>
     </div></td>
    
<?php 
    } else {
         ?> <td width="28.5%" ><div style="font-size:16px;" class="row text-center">
         
{!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div  class="">
          <div  class="card">
             
            
              <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
             
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
            <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
                          </div>
         <div style="font-size:16px;" class="card-footer">
         <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success',  ])}}
{!! Form::close() !!}
         </div>
       </div>
     </div>
     </td>
<?php 
    }
    $i++;
}

?>
</tr></table>
</div>
@endif
<div class=" mt-4 mb-4 container">
<div class="btn-group dropdown">
  <button type="button" style="font-size:16px;" class="btn btn-lg  btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    PRODUCTS CATEGORIES
  </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" style="font-size:16px;" href="featured-products">Featured Products</a>
  <a class="dropdown-item" style="font-size:16px;" href="fruits-vergetables">Fruits & Vergetables</a>
    <a class="dropdown-item" style="font-size:16px;" href="food-grain-oil">Food Grains & Oil</a>
    <a class="dropdown-item" style="font-size:16px;" href="bakery-cakes-diary">Bakery Cakes & Diary</a>
    <a class="dropdown-item" style="font-size:16px;" href="beverages-drinks">Beverages & Drinks</a>
    <a class="dropdown-item" style="font-size:16px;" href="branded-food-snacks">Branded Food, Snacks & BreakFast Cereals</a>
    <a class="dropdown-item" style="font-size:16px;" href="eggs-meat-fish">Eggs, Meat & Fish</a>
    </div>
  </div>
</div>



<div  class="container">
<div class="text-center" style="font-size:16px;" >
<?php
// Include database connection

$i = 0;
// Establish the output variable
 ?>
                  
@if(Request::is('eggs-meat-fish'))
@include('Inc.ProductsCategories.eggs-meat-fish')

@elseif(Request::is('featured-products'))
@include('Inc.ProductsCategories.featured-products')

@elseif(Request::is('fruits-vergetables'))
@include('Inc.ProductsCategories.fruitsvergetable')        
        
@elseif(Request::is('branded-food-snacks'))
@include('Inc.ProductsCategories.branded-food-snacks') 
        
@elseif(Request::is('food-grain-oil'))
@include('Inc.ProductsCategories.food-grains-oil')       
       
@elseif(Request::is('bakery-cakes-diary'))
@include('Inc.ProductsCategories.bacery-cakes-diary')
        
@elseif(Request::is('beverages-drinks'))
@include('Inc.ProductsCategories.beverages-drinks')
         
          @else          
           <h1>Featured Products</h1>

            <?php
// Include database connection


     
    // Connecting to mysql database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
// SQL query to interact with info from our database
$sql = mysqli_query($conn, "SELECT id, product_name, image, price FROM products  "); 
$i = 0;
// Establish the output variable
 ?> <div><table align="center"  padding=""><?php
while($row = mysqli_fetch_array($sql)){ 
    
    $id = $row["id"];
    $product_name = $row["product_name"];
    $image = $row["image"];
    $price = $row["price"];
    
    if ($i % 4 == 0) { // if $i is divisible by our target number (in this case "3")
      ?> <tr width="100%"><td width="29%" ><div style="font-size:16px;" class="row text-center">
      {!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div  class="">
          <div  class="card">
             
            
              <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
             
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
           <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
             </div>
         <div class="card-footer">
         {{ Form::hidden('data-name', $id) }}
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success'])}}
      {!! Form::close() !!}
         </div>
       </div>
     </div></td>
    
<?php 
    } else {
         ?> <td width="28.5%" ><div style="font-size:16px;" class="row text-center">
         
{!! Form::open(['url' => 'direct-cart' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div  class="">
          <div  class="card">
             
            
              <img  id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
             
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
           <label for="quantity">Qnty</label>
            <input id="quantity" name="quantity" class="text-center" style="font-size:12px; width:60px;" type="number" min="1" max="999" placeholder="Qnty"/>
              </div>
         <div class="card-footer">
         {{ Form::hidden('data-name', $id) }}
         {{Form::submit('ADD TO CART',[ 'class'=>'btn btn-lg btn-success'])}}
{!! Form::close() !!}
         </div>
       </div>
     </div>
     </td>
<?php 
    }
    $i++;
}

?>
</tr></table>
</div>
     
         
           @endif

</div>
</div>

            </div>
           



</div>