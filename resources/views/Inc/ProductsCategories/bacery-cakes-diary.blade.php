 
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
$sql = mysqli_query($conn, "SELECT id, product_name, image, price FROM products WHERE category = $searchTerm "); 
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
        <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
        {{Form::submit('ADD',[ 'class'=>'btn btn-lg btn-primary'])}}
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
        <input id="data-name"  name="data-name" type="hidden" value="{{$id}}"> 
        {{Form::submit('ADD',[ 'class'=>'btn btn-lg btn-success'])}}
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

