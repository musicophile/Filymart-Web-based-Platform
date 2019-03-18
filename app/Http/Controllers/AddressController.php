<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Token;
use App\Address;
use App\OrderDeliveryAddress;
use App\DeliveryMethod;
use App\DeliveryPayment;
use App\FinalOrderInfo;
use App\FinalUserInfo;
use App\TotalCost;
use App\Message;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Post;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;

class AddressController extends Controller
{
     

    protected function registered(Request $request)
    {   
        $this->validate($request, [
            'first_name'         => 'required|max:255',
            'last_name'        => 'required|max:255',
            'apartment_name'     => 'required',
            'street_details' => 'required',
            'phone'        => 'required',
            'city_name'        => 'required',
            'address_name'        => 'required',
            'country_code'        => 'required',
            'location'        => 'required',
            'lat'        => 'required',
            'lng'        => 'required'
        ]);
        
        $user_id = Auth::user()->id;
        $Address = new Address;
        $Address -> first_name  = $request->input('first_name');
        $Address -> last_name  = $request->input('last_name');
        $Address -> apartment_name  = $request->input('apartment_name');
        $Address -> street_details  = $request->input('street_details');
        $Address -> phone  = $request->input('phone');
        $Address -> city_name  = $request->input('city_name');
        $Address -> address_name  = $request->input('address_name');
        $Address -> country_code  = $request->input('country_code');
        $Address -> location  = $request->input('location');
        $Address -> lat  = $request->input('lat');
        $Address -> lng  = $request->input('lng');
        $Address -> user_id  = $user_id;
        $Address->save();

        
        
        
        $Order = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->get();

                 $Delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->count();

                $Ordersum = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.total');

                $OrderQuantity = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.quantity');
               
                
        $Orders = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();

                $address_id = DB::table('addresses')
                ->where('addresses.user_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->pluck('id')
                ->first()
                ;



                        $addressDelete = DB::table('order_delivery_addresses')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('order_delivery_addresses.*')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->delete();
                //$address_id = DB::select('select id from addresses ');

                $OrderDeliveryAddress = new OrderDeliveryAddress;
                $OrderDeliveryAddress -> address_id  = $address_id;
                $OrderDeliveryAddress -> user_id  = $user_id;
                $OrderDeliveryAddress->save();

               
        $delivery = DB::table('delivery_methods')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        //->select('delivery_methods.cost')
        ->where(['delivery_methods.user_id' => $user_id])
        ->sum('delivery_methods.cost');

        $Totalcost = $Ordersum + $delivery;
        $MainTotal_ = DB::table('total_costs')
        ->where(['total_costs.user_id' => $user_id])
        ->delete();

        $TotalCost_ = new TotalCost;
        $TotalCost_ -> total  = $Totalcost;
        $TotalCost_ -> user_id  = $user_id;
        $TotalCost_ ->save();

        $MainTotal = DB::table('total_costs')
        ->where(['total_costs.user_id' => $user_id])
        ->sum('total_costs.total');

                if ($OrderQuantity < 11) {
                        $StandarddeliveryCost = 1500;

                        $ExpressdeliveryCost = 3000;
                }elseif($OrderQuantity > 10 && $OrderQuantity < 25){

                        $StandarddeliveryCost = 3000;

                        $ExpressdeliveryCost = 4500;
                }elseif($OrderQuantity > 24 && $OrderQuantity < 35){

                        $StandarddeliveryCost = 4500;

                        $ExpressdeliveryCost = 6000;
                }elseif($OrderQuantity > 34 && $OrderQuantity < 50){

                        $StandarddeliveryCost = 6000;

                        $ExpressdeliveryCost = 7500;
                }elseif($OrderQuantity > 49 && $OrderQuantity < 65){

                        $StandarddeliveryCost = 7500;

                        $ExpressdeliveryCost = 9000;
                }elseif($OrderQuantity > 64){

                        $StandarddeliveryCost = 10000;

                        $ExpressdeliveryCost = 12000;
                }

                $AddressForDel = DB::table('order_delivery_addresses')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->pluck('address_id');


                $AddressForDelivery =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('location');
        
                $AddressName =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('address_name');


                return view('home', compact('Order','Orders','AddressName', 'AddressForDelivery','Ordersum', 'Delivery', 'delivery', 'MainTotal', 'StandarddeliveryCost', 'ExpressdeliveryCost'));
    }

    protected function messages(Request $request)
    {   
        $this->validate($request, [
            'name'         => 'required|max:255',
            'email'        => 'required|max:255',
            'message'     => 'required',
            
        ]);
        
        $user_id = Auth::user()->id;
        $Message = new Message;
        $Message -> name  = $request->input('name');
        $Message -> email  = $request->input('email');
        $Message -> message  = $request->input('message');
        $Message->save();


                if(Auth::user()){
        $Orders = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();
                        
                return view('home', compact('Orders'));
                }else{
                        
                return view('home');
                }

    }

    
    protected function direct(Request $request)
    {   
             
        $AddressId = $request->input('id');
        $user_id = Auth::user()->id;
        $Order = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->get();

                 $Delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->count();

                $Ordersum = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.total');

                $OrderQuantity = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.quantity');

                $addressDelete = DB::table('order_delivery_addresses')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('order_delivery_addresses.*')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->delete();

               // $address_id = DB::select('select * from products');

                $OrderDeliveryAddress = new OrderDeliveryAddress;
                $OrderDeliveryAddress -> address_id  = $AddressId;
                $OrderDeliveryAddress -> user_id  = $user_id;
                $OrderDeliveryAddress->save();
               
                
        $Orders = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();
                
               // return view('home',['Order'=>$Order],['Orders'=>$Orders]);

               
        $delivery = DB::table('delivery_methods')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        //->select('delivery_methods.cost')
        ->where(['delivery_methods.user_id' => $user_id])
        ->sum('delivery_methods.cost');

        $Totalcost = $Ordersum + $delivery;
        $MainTotal_ = DB::table('total_costs')
        ->where(['total_costs.user_id' => $user_id])
        ->delete();

        $TotalCost_ = new TotalCost;
        $TotalCost_ -> total  = $Totalcost;
        $TotalCost_ -> user_id  = $user_id;
        $TotalCost_ ->save();

        $MainTotal = DB::table('total_costs')
        ->where(['total_costs.user_id' => $user_id])
        ->sum('total_costs.total');

                if ($OrderQuantity < 11) {
                        $StandarddeliveryCost = 1500;

                        $ExpressdeliveryCost = 3000;
                }elseif($OrderQuantity > 10 && $OrderQuantity < 25){

                        $StandarddeliveryCost = 3000;

                        $ExpressdeliveryCost = 4500;
                }elseif($OrderQuantity > 24 && $OrderQuantity < 35){

                        $StandarddeliveryCost = 4500;

                        $ExpressdeliveryCost = 6000;
                }elseif($OrderQuantity > 34 && $OrderQuantity < 50){

                        $StandarddeliveryCost = 6000;

                        $ExpressdeliveryCost = 7500;
                }elseif($OrderQuantity > 49 && $OrderQuantity < 65){

                        $StandarddeliveryCost = 7500;

                        $ExpressdeliveryCost = 9000;
                }elseif($OrderQuantity > 64){

                        $StandarddeliveryCost = 10000;

                        $ExpressdeliveryCost = 12000;
                }

                $AddressForDel = DB::table('order_delivery_addresses')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->pluck('address_id');


                $AddressForDelivery =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('location');

                $AddressName =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('address_name');
        


                return view('home', compact('Order','AddressName','AddressForDelivery','Orders','Ordersum', 'Delivery', 'delivery', 'MainTotal', 'StandarddeliveryCost', 'ExpressdeliveryCost'));
    }

    protected function delete(Request $request)
    {   
             
        $AddressId = $request->input('id');
        $user_id = Auth::user()->id;
        $Order = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->get();

                 $Delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->count();

                $addressDelete = DB::table('addresses')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('addresses.*')
                ->where('addresses.id', $AddressId)
                ->delete();

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
    
    
            return view('home', compact('Products', 'Orders', 'Delivery', 'Address', 'Addresss'));

    }

    protected function onDeliveryPayment(Request $request)
    {   
        $this->validate($request, [
            'firstname'         => 'required',
            'lastname'        => 'required',
            'email'     => 'required',
            'phone' => 'required',
            'sex'        => 'required',
            'date'        => 'required',
            'sig-dataUrl'        => 'required',
            
        ]);
        
        $user_id = Auth::user()->id;
        $DeliveryPayment = new DeliveryPayment;
        $DeliveryPayment -> first_name  = $request->input('firstname');
        $DeliveryPayment -> last_name  = $request->input('lastname');
        $DeliveryPayment -> email  = $request->input('email');
        $DeliveryPayment -> phone  = $request->input('phone');
        $DeliveryPayment -> sex  = $request->input('sex');
        $DeliveryPayment -> date  = $request->input('date');
        $DeliveryPayment -> terms_condition  = $request->input('terms_condition');
        $DeliveryPayment -> sig_dataUrl  = $request->input('sig-dataUrl');
        $DeliveryPayment -> user_id  = $user_id;
        $DeliveryPayment->save();

      

      $Fdelivery = DB::table('users')
            ->select('users.*')
            ->where(['users.id' => $user_id])
            ->get();

       $MainTotal = DB::table('total_costs')
        ->where(['total_costs.user_id' => $user_id])
        ->sum('total_costs.total');

        $AddressForDel = DB::table('order_delivery_addresses')
        ->where('order_delivery_addresses.user_id', $user_id)
        ->pluck('address_id');


        $DeliveryName =  DB::table('delivery_methods')
        ->where('delivery_methods.user_id', $user_id)
        ->value('name');

        $DeliveryCost =  DB::table('delivery_methods')
        ->where('delivery_methods.user_id', $user_id)
        ->value('cost');

        $DeliveryTime =  DB::table('delivery_methods')
        ->where('delivery_methods.user_id', $user_id)
        ->value('time');

        $AddressName =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('address_name');

        $AddressFName =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('first_name');

        $AddressLName =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('last_name');

        $AddressAppart =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('apartment_name');

        $AddressStreet =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('street_details');

        $AddressCity =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('city_name');

        $AddressLocation =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('location');

        $AddressLat =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('lat');

        $AddressLng =  DB::table('addresses')
        ->where('addresses.id', $AddressForDel)
        ->value('lng');

        
        $FinalUserInfo = new FinalUserInfo;
        $FinalUserInfo -> user_name  = Auth::user()->name;
        $FinalUserInfo -> user_email  = Auth::user()->email;
        $FinalUserInfo -> user_phone  = Auth::user()->phone;
        $FinalUserInfo -> total_cost  = $MainTotal;
        $FinalUserInfo -> method_name  = $DeliveryName;
        $FinalUserInfo -> method_cost  = $DeliveryCost;
        $FinalUserInfo -> method_time  = $DeliveryTime;
        $FinalUserInfo -> address_fname  = $AddressFName;
        $FinalUserInfo -> address_sname  = $AddressLName;
        $FinalUserInfo -> address_appartmentname  = $AddressAppart; 
        $FinalUserInfo -> address_street_details  = $AddressStreet;
        $FinalUserInfo -> address_city  = $AddressCity;
        $FinalUserInfo -> address_location  = $AddressLocation;
        $FinalUserInfo -> lat  = $AddressLat;
        $FinalUserInfo -> lng  = $AddressLng;
        $FinalUserInfo -> address_name  = $AddressName;
        $FinalUserInfo -> save();

        $Fid = DB::table('final_user_infos')
        ->where('final_user_infos.user_email', Auth::user()->email)
        ->orderBy('created_at', 'desc')
        ->pluck('id')
        ->first();

        $Forder = DB::table('orders')
        //->jin('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
        ->where(['orders.user_id' => $user_id])
        ->get();
        foreach ($Forder as $forder) {
                $FinalOrderInfo = new FinalOrderInfo;
                $FinalOrderInfo -> product_id  = $forder -> product_id;
                $FinalOrderInfo -> product_name  = $forder -> product_name;
                $FinalOrderInfo -> image  = $forder -> image;
                $FinalOrderInfo -> price  = $forder -> price;
                $FinalOrderInfo -> total  = $forder -> total;
                $FinalOrderInfo -> quantity  = $forder -> quantity;
                $FinalOrderInfo -> user_id  = $Fid;
                $FinalOrderInfo -> save();
                }
    
                $DeleteDeliveryM = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->delete();

                $DeleteOrder = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->delete();

                $DeleteOrderDA = DB::table('order_delivery_addresses')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('order_delivery_addresses.*')
                ->where(['order_delivery_addresses.user_id' => $user_id])
                ->delete();
                $DeleteTotalCost = DB::table('total_costs')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('total_costs.*')
                ->where(['total_costs.user_id' => $user_id])
                ->delete();
                $email = Auth::user()->email;
                $name = Auth::user()->name;
                $user = User::create([
                        'name' => $email,
                        'email' => $name,
                    ]);

                Mail::to($user->email)->send(new ConfirmMail($user));

        

                return redirect('/home')->with('success', 'You have successfully place your order');
    }

    protected function getDelivery(Request $request)
    {   
             
        $this->validate($request, [
            'delivery'         => 'required',
           
        ]);
        
        $user_id = Auth::user()->id;
        $Order = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->get();

                $Delete = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->delete();

        $DeliveryMethod = new DeliveryMethod;
        $DeliveryMethod -> value  = $request->input('delivery');
        $DeliveryMethod -> name  = $request->input('name');
        $DeliveryMethod -> cost  = $request->input('cost');
        $DeliveryMethod -> time  = $request->input('time');
        $DeliveryMethod -> user_id  = $user_id;
        $DeliveryMethod ->save();

  
        $delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                //->select('delivery_methods.cost')
                ->where(['delivery_methods.user_id' => $user_id])
                ->sum('delivery_methods.cost');

                $OrderQuantity = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.quantity');
        

                 $Delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->count();

                $Ordersum = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.total');
               
                $Totalcost = $Ordersum + $delivery;
                $MainTotal_ = DB::table('total_costs')
                ->where(['total_costs.user_id' => $user_id])
                ->delete();

                $TotalCost_ = new TotalCost;
                $TotalCost_ -> total  = $Totalcost;
                $TotalCost_ -> user_id  = $user_id;
                $TotalCost_ ->save();

                $MainTotal = DB::table('total_costs')
                ->where(['total_costs.user_id' => $user_id])
                ->sum('total_costs.total');
                
        $Orders = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();
                if ($OrderQuantity < 11) {
                        $StandarddeliveryCost = 1500;

                        $ExpressdeliveryCost = 3000;
                }elseif($OrderQuantity > 10 && $OrderQuantity < 25){

                        $StandarddeliveryCost = 3000;

                        $ExpressdeliveryCost = 4500;
                }elseif($OrderQuantity > 24 && $OrderQuantity < 35){

                        $StandarddeliveryCost = 4500;

                        $ExpressdeliveryCost = 6000;
                }elseif($OrderQuantity > 34 && $OrderQuantity < 50){

                        $StandarddeliveryCost = 6000;

                        $ExpressdeliveryCost = 7500;
                }elseif($OrderQuantity > 49 && $OrderQuantity < 65){

                        $StandarddeliveryCost = 7500;

                        $ExpressdeliveryCost = 9000;
                }elseif($OrderQuantity > 64){

                        $StandarddeliveryCost = 10000;

                        $ExpressdeliveryCost = 12000;
                }

              

                $AddressForDel = DB::table('order_delivery_addresses')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->pluck('address_id');


                $AddressForDelivery =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('location');
                
                $AddressName =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('address_name');

                                return view('home', compact('Order', 'AddressName','AddressForDelivery','Orders','Ordersum', 'Delivery', 'delivery' , 'MainTotal', 'StandarddeliveryCost', 'ExpressdeliveryCost'));
              
    }

    protected function getDeliveryStandard(Request $request)
    {   
             
               
      
        $user_id = Auth::user()->id;
        $Order = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->get();

                $Delete = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->delete();

        $DeliveryMethod = new DeliveryMethod;
        $DeliveryMethod -> value  = $request->input('delivery');
        $DeliveryMethod -> name  = $request->input('name');
        $DeliveryMethod -> cost  = $request->input('cost');
        $DeliveryMethod -> time  = $request->input('deliverytime');
        $DeliveryMethod -> user_id  = $user_id;
        $DeliveryMethod ->save();

  
        $delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                //->select('delivery_methods.cost')
                ->where(['delivery_methods.user_id' => $user_id])
                ->sum('delivery_methods.cost');

                $OrderQuantity = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.quantity');
        

                 $Delivery = DB::table('delivery_methods')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('delivery_methods.*')
                ->where(['delivery_methods.user_id' => $user_id])
                ->count();

                $Ordersum = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
              // ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->sum('orders.total');
               
                $Totalcost = $Ordersum + $delivery;
                $MainTotal_ = DB::table('total_costs')
                ->where(['total_costs.user_id' => $user_id])
                ->delete();

                $TotalCost_ = new TotalCost;
                $TotalCost_ -> total  = $Totalcost;
                $TotalCost_ -> user_id  = $user_id;
                $TotalCost_ ->save();

                $MainTotal = DB::table('total_costs')
                ->where(['total_costs.user_id' => $user_id])
                ->sum('total_costs.total');
                
        $Orders = DB::table('orders')
                //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
                ->select('orders.*')
                ->where(['orders.user_id' => $user_id])
                ->count();
                if ($OrderQuantity < 11) {
                        $StandarddeliveryCost = 1500;

                        $ExpressdeliveryCost = 3000;
                }elseif($OrderQuantity > 10 && $OrderQuantity < 25){

                        $StandarddeliveryCost = 3000;

                        $ExpressdeliveryCost = 4500;
                }elseif($OrderQuantity > 24 && $OrderQuantity < 35){

                        $StandarddeliveryCost = 4500;

                        $ExpressdeliveryCost = 6000;
                }elseif($OrderQuantity > 34 && $OrderQuantity < 50){

                        $StandarddeliveryCost = 6000;

                        $ExpressdeliveryCost = 7500;
                }elseif($OrderQuantity > 49 && $OrderQuantity < 65){

                        $StandarddeliveryCost = 7500;

                        $ExpressdeliveryCost = 9000;
                }elseif($OrderQuantity > 64){

                        $StandarddeliveryCost = 10000;

                        $ExpressdeliveryCost = 12000;
                }

                $AddressForDel = DB::table('order_delivery_addresses')
                ->where('order_delivery_addresses.user_id', $user_id)
                ->pluck('address_id');


                $AddressForDelivery =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('location');

                $AddressName =  DB::table('addresses')
                ->where('addresses.id', $AddressForDel)
                ->value('address_name');
                return view('home', compact('Order','AddressName','AddressForDelivery','Orders','Ordersum', 'Delivery', 'delivery' , 'MainTotal', 'StandarddeliveryCost', 'ExpressdeliveryCost'));
              
    }

    public function getPayment()
    {
        

        if(Auth::user()){
            $user_id = Auth::user()->id;

            $MainTotal = DB::table('total_costs')
                ->where(['total_costs.user_id' => $user_id])
                ->sum('total_costs.total');

        $Products = DB::select('select * from products');
        $Orders = DB::table('orders')
        //->join('Businesses', 'users.id', '=', 'Businesses.user_id')
        ->select('orders.*')
        ->where(['orders.user_id' => $user_id])
        ->count();
        return view('home', compact('Products', 'Orders', 'MainTotal'));
        }else{
           // $user_id = Auth::user()->id;
            $Products = DB::select('select * from products');
            $Orders =0;

            return view('home', compact('Products', 'Orders', 'MainTotal'));
        }
        
    }

}
