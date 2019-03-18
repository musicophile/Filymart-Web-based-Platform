<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\MoreDetails;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Post;
use Auth;

class PagesController extends Controller
{
    public function getHome()
    {
       
        $Products = DB::select('select * from products');
        $Orders = DB::table('orders')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
       // ->where(['orders.user_id' => $user_id])
        ->count();
        return view('home',['Products'=>$Products],['Orders'=>$Orders]);
    }

    public function getProducts()
    {
        

        if(Auth::user()){
            $user_id = Auth::user()->id;
        $Products = DB::select('select * from products');
        $Orders = DB::table('orders')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
        ->where(['orders.user_id' => $user_id])
        ->count();

        $OrdersDb = DB::table('orders')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
        ->where(['orders.user_id' => $user_id])
        ->get();

        

        $Address = DB::table('addresses')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('addresses.*')
        ->where(['addresses.user_id' => $user_id])
        ->count();
        
        $Addresss = DB::table('addresses')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('addresses.*')
        ->where(['addresses.user_id' => $user_id])
        ->get();


        return view('home', compact('Products', 'Orders', 'Address', 'Addresss'));
        }else{
           // $user_id = Auth::user()->id;
            $Products = DB::select('select * from products');
            $Orders =0;
            return view('home',['Products'=>$Products],['Orders'=>$Orders]);
        }
        
    }

    public function getAllProducts()
    {
        $Orders = DB::table('orders')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
        ->get();

        $Address = DB::table('addresses')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('addresses.*')
        ->get();

        $Products = DB::table('products')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('products.*')
        ->get();

        $Users = DB::table('users')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('users.*')
        ->get();


        return view('home', compact('Products', 'Orders', 'Address', 'Users'));
       }
       public function getContactUs()
       {
        if(Auth::user()){
            $user_id = Auth::user()->id;
           $Orders = DB::table('orders')
           //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
           ->select('orders.*')
           ->where(['orders.user_id' => $user_id])
           ->count();
   
           $Address = DB::table('addresses')
           //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
           ->select('addresses.*')
           ->get();
   
           $Products = DB::table('products')
           //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
           ->select('products.*')
           ->get();
   
           $Users = DB::table('users')
           //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
           ->select('users.*')
           ->get();
   
   
           return view('home', compact('Products', 'Orders', 'Address', 'Users'));}else{
            // $user_id = Auth::user()->id;
             $Products = DB::select('select * from products');
             $Orders =0;
             return view('home',['Products'=>$Products],['Orders'=>$Orders]);
         }
          }
          public function getAboutUs()
          {
            if(Auth::user()){
                $user_id = Auth::user()->id;
               $Orders = DB::table('orders')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('orders.*')
               ->where(['orders.user_id' => $user_id])
               ->count();
       
               $Address = DB::table('addresses')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('addresses.*')
               ->get();
       
               $Products = DB::table('products')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('products.*')
               ->get();
       
               $Users = DB::table('users')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('users.*')
               ->get();
       
       
               return view('home', compact('Products', 'Orders', 'Address', 'Users'));}else{
                // $user_id = Auth::user()->id;
                 $Products = DB::select('select * from products');
                 $Orders =0;
                 return view('home',['Products'=>$Products],['Orders'=>$Orders]);
             }}
 public function getProjects()
             { if(Auth::user()){
                $user_id = Auth::user()->id;
               $Orders = DB::table('orders')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('orders.*')
               ->where(['orders.user_id' => $user_id])
               ->count();
       
               $Address = DB::table('addresses')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('addresses.*')
               ->get();
       
               $Products = DB::table('products')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('products.*')
               ->get();
       
               $Users = DB::table('users')
               //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
               ->select('users.*')
               ->get();
       
       
               return view('home', compact('Products', 'Orders', 'Address', 'Users'));}else{
                // $user_id = Auth::user()->id;
                 $Products = DB::select('select * from products');
                 $Orders =0;
                 return view('home',['Products'=>$Products],['Orders'=>$Orders]);
             } return view('home', compact('Products', 'Orders', 'Address', 'Users'));
                }
    public function getAjax()

{          // $MoreDetails = new MoreDetails;
           // $MoreDetails -> moreGetailsId  = $request->input('id');
           // $MoreDetails->save();
   
            $user_id = Auth::user()->id;          
            $Products = DB::select('select * from products');
            $Orders = DB::table('orders')
            //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
            ->select('orders.*')
            ->where(['orders.user_id' => $user_id])
            ->count();
            return view('home',['Products'=>$Products],['Orders'=>$Orders]);
}
   
    public function getUploadProduct(Request $request){
        $this->validate($request, [
            'product_name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'image' => 'required',
            'benefits' => 'required',
            'about' => 'required',
        ]);
        
      //  $user_id = Auth::user()->id;
       $Product = new Product;
        $Product -> product_name = $request->input('product_name');
        $Product -> price = $request->input('price');
        $Product -> unit = $request->input('unit');
        $Product -> amount = $request->input('amount');
        $Product -> category = $request->input('category');
        $Product -> benefits = $request->input('benefits');
        $Product -> about = $request->input('about');
       
       // $Product-> user_id = Auth::user()->id;
    
       if(Input::hasFile('image')){
        $file = Input::file('image');
        $file -> move(public_path(). '/uploads/', $file -> getClientOriginalName());
       $url = URL::to("/") . '/uploads/'. $file->getClientOriginalName();
      
}
$Product -> image = $url;

       $Product->save();
    
       $Products = DB::select('select * from products');
       $Orders = DB::table('orders')
       //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
       ->select('orders.*')
      // ->where(['orders.user_id' => $user_id])
       ->count();
       return "success";
   
  /*     $Product = DB::table('products')
        ->select('products.*')
      ;

//ridirect
return view('home', ['Product'=> $Product]);
*/

}
public function addProductInfo(Request $request){
    $this->validate($request, [
        'logo' => 'required',
        'product_name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'benefits' => 'required',
            'about' => 'required',
       
    ]);
    
  //  $user_id = Auth::user()->id;
   $Product = new Product;
   $Product -> product_name = $request->input('product_name');
   $Product -> price = $request->input('price');
   $Product -> unit = $request->input('unit');
   $Product -> amount = $request->input('amount');
   $Product -> category = $request->input('category');
   $Product -> benefits = $request->input('benefits');
   $Product -> about = $request->input('about');
   // $Product-> user_id = Auth::user()->id;

   if(Input::hasFile('logo')){
    $file = Input::file('logo');
    $file -> move(public_path(). '/uploads/', $file -> getClientOriginalName());
   $url = URL::to("/") . '/uploads/'. $file->getClientOriginalName();
  
}
$Product -> image = $url;

   $Product->save();

   $Products = DB::select('select * from products');
   $Orders = DB::table('orders')
   //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
   ->select('orders.*')
  // ->where(['orders.user_id' => $user_id])
   ->count();
   return "success";

/*     $Product = DB::table('products')
    ->select('products.*')
  ;

//ridirect
return view('home', ['Product'=> $Product]);
*/

}
public function next(){
  
    
    $user_id = Auth::user()->id;
   $Products = DB::select('select * from products');
   $Orders = DB::table('orders')
   //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
   ->select('orders.*')
   ->where(['orders.user_id' => $user_id])
   ->count();
   return view('home',['Products'=>$Products],['Orders'=>$Orders]);

/*     $Product = DB::table('products')
    ->select('products.*')
  ;

//ridirect
return view('home', ['Product'=> $Product]);
*/

}
public function getProduct()
{
    $id = $_GET['id'];

    $user_id = Auth::user()->id;
   
        $Products = DB::table('products')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('products.*')
                    ->where(['products.id' => $id])
                    ->first();
                    $Orders = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->count();
                    return view('home',['Products'=>$Products],['Orders'=>$Orders]);
}
public function getProduct_(Request $request)
{   
    $id = $request->input('product-id');
    if (Auth::user()) {
        $user_id = Auth::user()->id;
   
        $Products = DB::table('products')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('products.*')
                    ->where(['products.id' => $id])
                    ->get();
                    $Orders = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->count();
                    return view('home',['Products'=>$Products],['Orders'=>$Orders]);
    }else{
       
        $Products = DB::table('products')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('products.*')
        ->where(['products.id' => $id])
        ->get();
        return view('home',['Products'=>$Products]);
    }
    
}

public function getCart(Request $request)
{  
    $this->validate($request, [
    'quantity' => 'required',]);
    if(Auth::user()){
        $id = $request -> input('id');
        $d = $request -> input('quantity');
        $Products = DB::table('products')
                ->select('products.*')
                ->where(['products.id' => $id])
                ->first();

                $user_id = Auth::user()->id;
                $OrdersDelete = DB::table('orders')
                ->select('orders.*')
                ->where(['orders.product_id' => $id])
                ->where(['orders.user_id' => $user_id])
                ->delete();
                
        $user_id = Auth::user()->id;
        $Order = new Order;
        $Order -> product_id  = $id;
        $Order -> user_id  = $user_id;
        $Order -> product_name  = $Products-> product_name;
        $Order -> image  = $Products-> image;
        $price= $Products-> price;
        $Order -> price  = $price;
        $Order -> quantity  = $d;
        $Order -> total  = $d * $price;
        $Order->save();
    
        $Orders = DB::table('orders')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();
       return view('home',['Products'=>$Products],['Orders'=>$Orders]);
    }else{
        return view('home');
    }
           
                
       
}


public function showOrder()
{
            
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                $Order = DB::table('orders')
                        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                        ->select('orders.*')
                        ->where(['orders.user_id' => $user_id])
                        ->get();
    
                        $Ordersum = DB::table('orders')
                        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                      // ->select('orders.*')
                        ->where(['orders.user_id' => $user_id])
                        ->sum('orders.total');
                       
    
                        
                $Orders = DB::table('orders')
                        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                        ->select('orders.*')
                        ->where(['orders.user_id' => $user_id])
                        ->count();
                       // return view('home',['Order'=>$Order],['Orders'=>$Orders]);
                        return view('home', compact('Order','Orders','Ordersum'));
            }else{
                return view('home');
            }
           
   
}
public function getUpdate(Request $request)

{           $idd =   $request->input('idq');
            $qnty =   $request->input('quantity');
            $OrderPrice = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                  //  ->select('orders.price')
                    ->where('orders.id', $idd)
                    ->first()->price;
            $total = $OrderPrice * $qnty;
            $OrderUpdate = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.id' => $idd])
                    ->update(['orders.quantity' =>  $qnty, 'orders.total' => $total]);
                    
            $user_id = Auth::user()->id;
           
            $Order = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->get();

                    $Ordersum = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                  // ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->sum('orders.total');
                                      
            $Orders = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->count();
                    return view('home', compact('Order','Orders','Ordersum'));
                  
}

public function getDelete(Request $request)
{
           
            $idd =   $request->input('id');
            $OrderDelete = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.id' => $idd])
                    ->delete();
            
            $user_id = Auth::user()->id;
            $Order = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->get();

                    $Ordersum = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                  // ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->sum('orders.total');
                   

                    
            $Orders = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->count();
                    return view('home', compact('Order','Orders','Ordersum'));
  
}

public function getEmpty()
{
           
            $user_id = Auth::user()->id;
            $OrderDelete = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->delete();
            
            
            $Order = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->get();

                    $Ordersum = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                  // ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->sum('orders.total');
                   

                    
            $Orders = DB::table('orders')
                    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                    ->select('orders.*')
                    ->where(['orders.user_id' => $user_id])
                    ->count();
                    return view('home', compact('Order','Orders','Ordersum'));
  
}
public function directToCart(Request $request){
    $this->validate($request, [
        'quantity' => 'required',]);
        
    $id= $request->input('data-name');
    $qnty= $request->input('quantity');

    $Products = DB::table('products')
    ->select('products.*')
    ->where(['products.id' => $id])
    ->first();

    if (Auth::user()) {
        $user_id = Auth::user()->id;
        $OrdersDelete = DB::table('orders')
        ->select('orders.*')
        ->where(['orders.product_id' => $id])
        ->where(['orders.user_id' => $user_id])
        ->delete();

        $user_id = Auth::user()->id;
$Order = new Order;
$Order -> product_id  = $id;
$Order -> user_id  = $user_id;
$Order -> product_name  = $Products-> product_name;
$Order -> image  = $Products-> image;
$price= $Products-> price;
$Order -> price  = $price;
$Order -> quantity  = $qnty;
$Order -> total  = $qnty * $price;
$Order->save();



$Orders = DB::table('orders')
    ->select('orders.*')
    ->where(['orders.user_id' => $user_id])
    ->count();
return view('home',['Products'=>$Products],['Orders'=>$Orders]);
    }else{
        


return view('home');
    }



}
public function getsearch(Request $request) 
{
    $this->validate($request, [
        'search' => 'required']);
        
    $searchTerm = $request->input('search');

    //Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $Products = DB::table('products')
                ->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                ->count();
        
    // returns a view and passes the view the list of articles and the original query.
    if ($Products == '0') {
        $searchTer = "The result of $searchTerm is Not found";
        $Orders = DB::table('orders')
        ->select('orders.*')
        ->count();
        return view('home', compact('searchTer','Orders', 'searchTerm')); 
    }
    else{
        $searchTer = "The result of $searchTerm is ...";
        $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTer','Orders', 'searchTerm'));
    }
    
}
public function getFeatured(Request $request) 
{
     
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('Orders'));
}
public function getFruitsVege(Request $request) 
{
    $searchTerm = 2;

 
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}
public function getEggsMeatFish(Request $request) 
{
    $searchTerm = 7;

    //Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $Products = DB::table('products')
                ->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
    // returns a view and passes the view the list of articles and the original query.
    
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}
public function getBrandedFoodSnacks(Request $request) 
{
    $searchTerm = 6;

    //Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $Products = DB::table('products')
                ->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
    // returns a view and passes the view the list of articles and the original query.
    
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}
public function getBeveragesDrinks(Request $request) 
{
    $searchTerm = 5;

    //Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $Products = DB::table('products')
                ->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
    // returns a view and passes the view the list of articles and the original query.
    
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}
public function getBakeryCakesDiary(Request $request) 
{
    $searchTerm = 4;

    //Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $Products = DB::table('products')
                ->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
    // returns a view and passes the view the list of articles and the original query.
    
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}
public function getFoodGrainOil(Request $request) 
{
    $searchTerm = 3;

  
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    return view('home', compact('searchTerm','Orders'));
}

public function getMyAccount(){
    $user_id = Auth::user()->id;
    $Orders = DB::table('orders')
    ->select('orders.*')
    ->count();
    $userInfo = DB::table('users')
    //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
    ->select('users.*')
    ->where(['users.id' => $user_id])
    ->get();

    return view('home', compact('userInfo','Orders'));

}

}
