

<!-- Jumbotron Header -->
<header  class="jumbotron my-4">
  <h1 class="display-3">Your Welcome to Home Supermarket</h1>
  <p style="font-size:16px;" class="lead">Home Supermarket is the best online supermarket for 
  all your daily needs. For all your grocery needs plus wide variety and range and brands you can get all in  home supermarket
  . Shop now easly Welcome again!
  </p>
  <!--a href="{{url('/upload-product')}}" class="btn btn-primary btn-lg">Call to action!</a-->
</header>
@if(session('success'))
        <div style="font-size:20px;" class="alert alert-success">
            {{session('success')}}

        </div>
    @endif
<div>
<p>
            <a style="font-size:16px;" class="btn btn-success  btn-lg" href="{{url('/start-shopping')}}">Start Shopping &raquo;</a>
          </p>
</div>
  <!-- Page Heading -->
  
  <h1 class="my-4">Categories of Products Available 
      </h1>

      <!-- Project One -->
      <div  style="font-size:16px;"   class="row">
        <div class="col-md-7">
          <a href="fruits-vergetables">
            <img class="img-fluid rounded mb-3 mb-md-0"  style = "width:700px; height:300px;" src="./images/vergetables.jpg" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3 style="font-size:16px; font-weight:bold;" >Fruits & Vergetables Products</h3>
          <p>Vegetables can be broken down into the following groups: bulbs, funghi, leafy greens and brassicas, pods and seeds, 
          roots and tubers, squashes, stalks and shoots, and vegetable fruits. Eat a variety of coloured fruit and vegetables – green,
           yellow, orange, red and purple in order to benefit from the variety of vitamins and minerals provided by each colour group. 
           I home supermarket you will get different vergetables and fruits buy now.</p>
          <a style="font-size:16px;" class="btn btn-success" href="fruits-vergetables">Buy Now</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>
       <!-- Project One -->
       <div style="font-size:16px;" class="row">
       <div class="col-md-5">
          <h3 style="font-size:16px; font-weight:bold;">Food Grains & Oil Products</h3>
          <p>Oils are fats that are liquid at room temperature, like the vegetable oils used in cooking. ... A number of foods are naturally high in oils, like nuts, olives, some fish, and avocados. A grain is all small, hard, dry seed, with or without an attached hull or fruit layer, harvested for human consumption. A grain crop is a grain-producing plant.</p>
          <a style="font-size:16px;" class="btn btn-success" href="food-grain-oil">Buy Now</a>
        </div>
        <div class="col-md-7">
          <a href="food-grain-oil">
            <img class="img-fluid rounded mb-3 mb-md-0" style = "width:700px; height:300px;"src="./images/Foodgrains.png" alt="">
          </a>
        </div>
        
      </div>
      <!-- /.row -->

      <hr>
       <!-- Project One -->
       <div style="font-size:16px;" class="row">
        <div class="col-md-7">
          <a href="eggs-meat-fish">
            <img class="img-fluid rounded mb-3 mb-md-0"  style = "width:700px; height:300px;"src="./images/eggs-meat-milk.png" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3 style="font-size:16px; font-weight:bold;" >Eggs & Meat and Fish</h3>
          <p>We are all now that Eggs meat and fish are very important foods for our health.Thank you for comming here we offer you a wide variety of meats and eggs and also fish from salt and fresh water. Buy now it will be deliverd to your Home.</p>
          <a style="font-size:16px;" class="btn btn-success" href="eggs-meat-fish">Buy Now</a>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      <div style="font-size:16px;" class="row">
       <div class="col-md-5">
          <h3 style="font-size:16px; font-weight:bold;">Bevarages & Drinks</h3>
          <p>All kinds of drinks and beverages are all found here at home supermarket. You can choose any brand of any drink or beverages and us homesupermarket we will deliver it to your home .enjoy shopping with us wherever your .You own it,just click it Buy now </p>
          <a style="font-size:16px;" class="btn btn-success" href="beverages-drinks">Buy Now</a>
        </div>
        <div class="col-md-7">
          <a href="beverages-drinks">
            <img class="img-fluid rounded mb-3 mb-md-0" style = "width:700px; height:300px;"src="./images/beverages.jpg" alt="">
          </a>
        </div>
        
      </div>
      <hr>


      <div>     
<div><h1 style="font-weight:bold; font-family: Arial, Helvetica, sans-serif;" >New Arrival Product available ....</h1></div>
<div style="font-size:16px;" class="row text-center">



<body onload="onload();">
    <!--input type="text" name="enter" class="enter" id="lolz" value=""/>
    <input type="button" value="click" onclick="kk();"/-->
</body>
 <script type="text/javascript">
function openOnImageClick10(id)
{
var c = 2;
        var d = 3;
        //alert ("hello");
        //alert (id);
         $.ajax({
                url:"/getAjax",
                method:"get",
                data:{id: id } ,
                    success:function(data){
                        console.log(data);
                      //  alert(id);
                        
                        window.location.href = "/product-details?id="+id;
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
$sql = mysqli_query($conn, "SELECT id, product_name, image, price FROM products LIMIT 8 "); 
$i = 0;
// Establish the output variable
 ?><table align="center"  padding=""><?php
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
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
               </div>
         <div class="card-footer">
         {!! Form::open(['url' => '/details' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
         <input id="product-id"  name="product-id" type="hidden" value="{{$id}}"> 
         {{Form::submit('BUY',[ 'class'=>'btn btn-lg btn-success'])}}
      {!! Form::close() !!}         </div>
       </div>
     </div></td>
    
<?php 
    } else {
         ?> <td width="28.5%" ><div style="font-size:16px;" class="row text-center">
        <div class="">
          <div class="card">
            
            
              <img id="{{$id}}" onclick="openOnImageClick10(this.id);"  class="card-img-top" style="width: 188.783px; height:125px;"  src="{{$image}}" alt="">
            
          
         <div class="card-body">
           <h4 class="card-title">{{$product_name}}</h4>
           <h4 class="card-title">Kg1-Tsh.{{$price}}</h4>
               </div>
         <div class="card-footer">
         {!! Form::open(['url' => '/details' ,'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
         <input id="product-id"  name="product-id" type="hidden" value="{{$id}}"> 
         {{Form::submit('BUY',[ 'class'=>'btn btn-lg btn-success'])}}
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


 <div class="row">
        <div style="font-size:16px;" class="col-sm-12">
          <h1 class="mt-4" style=" font-weight:bold;" >Home Supermarket</h2>
         <p>Did you now? Just by a click of button all the freshest of fruits and vegetables, top quality products and food grains, dairy products and hundreds of branded items could be handpicked and delivered to your home, all at the click of a button. Homesupermarket first comprehensive online biggerstore, brings a whopping 200+ products with more than 100 brands, to over a hundred's happy customers. From household cleaning products to beauty and makeup, homesupermarket has everything you need for your daily needs.
</p>
<h1>Home Supermarket is convenience personified.</h1> 
<p>
You know what? Us Homesupermarket we have taken away all the stress associated with shopping for daily essentials, and you can now order all your household products and even buy groceries online without travelling long distances or waste a lot of time at markert. Add to this the convenience of finding all your requirements at one single source, and you will realise that homesupermarket - Tanzania's largest online supermarket, has revolutionised the way Tanzania shops for groceries. Online grocery shopping has never been easier. Need things fresh? Whether it’s fruits and vegetables or dairy and meat, we have this covered as well! Get fresh eggs, meat, fish and more online at your convenience.
<br>

<br>
For now we deliver at Arusha and Moshi only soon we will start at other cities across East Africa include Tanzania, Kenya, Uganda and Rwanda then World wide. We ensure to maintain excellent delivery times, ensuring that all your products from groceries to all branded foods reach you in time.
 <br>
    <strong>Standard Delivery:</strong> Pick the most convenient delivery slot to have your grocery delivered. From early morning delivery for early birds, to late-night delivery for people who work the late shift, homesupermarket caters to every schedule
    <br> <strong>Express Delivery:</strong> This super useful service can be availed by any customers in Arusha Only in which we deliver your orders to your doorstep in 90 Minutes but it will start in Moshi soon 
   <br> 
        </div>
        
      </div>
      <div style="font-size:16px;" class="row mt-5 text-center">

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card">
    <img class="card-img-top" style="height: 125px;" src="./images/delivery.png" alt="">
    <div class="card-body">
      <h4 class="card-title">Delivery</h4>
      <p class="card-text">Pick the most convenient delivery slot to have your grocery delivered. We deliver on time</p>
    </div>
    
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card">
    <img class="card-img-top" style="height: 125px;" src="./images/payment.jpg" alt="">
    <div class="card-body">
      <h4 class="card-title">Payment</h4>
      <p class="card-text">We support both credit card online payment with high security Authentication and also On-Delivery payment</p>
    </div>
    
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card">
    <img class="card-img-top" style="height: 125px;" src="./images/aboutus.jpg" alt="">
    <div class="card-body">
      <h4 class="card-title">About Us</h4>
      <p class="card-text">This platform Founded January 2019 in Arusha, Tanzania. View more info about us and Our Terms and Condition <a style="color: #008000" href="about-us">About Us</a></p>
    </div>
   
  </div>
</div>

<div class="col-lg-3 col-md-6 mb-4">
  <div class="card">
    <img class="card-img-top" style="height: 125px;" src="./images/contactus.jpg" alt="">
    <div class="card-body">
      <h4 class="card-title">Contact Us</h4>
      <p class="card-text">Contact Us through our email and phone-number for any feedback and Support 24/7 <a style="color: #008000" href="contact-us">Contact Us</a> </p>
    </div>
    
  </div>
</div>

</div>
      <!-- /.row -->
      </div>

