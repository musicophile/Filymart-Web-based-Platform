@extends('layouts.app')

@section('content')
<div class="container">
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if(Request::is('/'))
                     @include('Inc.Home.Homecontent')
                     @endif
                     @if(Request::is('home'))
                     @include('Inc.Home.Homecontent')
                     @endif
                     @if(Request::is('contact-us'))
                     @include('Inc.Home.ContactUs')
                     @endif
                     @if(Request::is('about-us'))
                     @include('Inc.Home.aboutUs')
                     @endif

                     @if(Request::is('message'))
                     @include('Inc.Home.ContactUs')
                     @endif

                     @if(Request::is('projects'))
                     @include('Inc.Home.project')
                     @endif
                     @if(Request::is('terms-condition'))
                     @include('Inc.Home.termscondition')
                     @endif
                     @if(Request::is('start-shopping'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('fruits-vergetables'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('eggs-meat-fish'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('branded-food-snacks'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('beverages-drinks'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('bakery-cakes-diary'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('food-grain-oil'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('featured-products'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('view-product'))
                     @include('Inc.AdminFiles.viewallproducts')
                     @endif                  

                    @if(Request::is('direct-cart'))
                     @if(Auth::user())
                     @include('Inc.Products.Productscontent')
                     @else
                     @include('Inc.Cart.Cartdetails')
                     @endif
                     @endif


                     @if(Request::is('search'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     @if(Request::is('view'))
                     @include('Inc.Products.Productscontent')
                     @endif
                     
                     @if(Request::is('product-details'))
                     @if(Auth::user())
                     @include('Inc.Products.Productdetails')
                     @else
                     @include('Inc.Home.Homecontent')
                     @endif
                     @endif
                     @if(Request::is('details'))
                     @include('Inc.Products.Productdetails')
                     @endif

                     @if(Request::is('my-account'))
                     @include('Inc.Account.myaccount')
                     @endif

                     @if(Request::is('update-account'))
                     @include('Inc.Account.myaccount')
                     @endif

                     @if(Request::is('add-to-cart'))
                     @if(Auth::user())
                     @include('Inc.Products.Productscontent')
                     @else
                     @include('Inc.messages')
                     @endif
                     @endif
                     
                     @if(Request::is('continue-checkout'))
                     @include('Inc.Delivery.deliveraddress')
                     @endif
                     @if(Request::is('delete-address'))
                     @include('Inc.Delivery.deliveraddress')
                     @endif
                     @if(Request::is('new-address'))
                     @include('Inc.Delivery.newaddress')
                     @endif
                     @if(Request::is('validate-order'))
                     @include('Inc.Delivery.deliveryOptions')
                     @endif
                     @if(Request::is('select-address'))
                     @include('Inc.Delivery.deliveryOptions')
                     @endif
                     @if(Request::is('delivery-options'))
                     @include('Inc.Delivery.deliveryOptions')
                     @endif
                     @if(Request::is('delivery-options-standard'))
                     @include('Inc.Delivery.deliveryOptions')
                     @endif
                     @if(Request::is('payment'))
                     @include('Inc.Payment.Payment')
                     @endif
                     @if(Request::is('credit-card'))
                     @include('Inc.Payment.Payment')
                     @endif
                     @if(Request::is('on-delivery'))
                     @include('Inc.Payment.Payment')
                     @endif
                     @if(Request::is('upload-product'))
                     @include('Inc.Products.Uploadproductinfo')
                     @endif
                     @if(Request::is('upload'))
                     @include('Inc.Products.Uploadproductinfo')
                     @endif
                     @if(Request::is('show-order'))
                     @include('Inc.Cart.Cartdetails')
                     @endif
                     @if(Request::is('update-order'))
                     @include('Inc.Cart.Cartdetails')
                     @endif
                     @if(Request::is('delete-order'))
                     @include('Inc.Cart.Cartdetails')
                     @endif
                     @if(Request::is('empty-busket'))
                     @include('Inc.Cart.Cartdetails')
                     @endif
                     
                     
</div>
@endsection
