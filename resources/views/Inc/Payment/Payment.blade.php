@if (Auth::guest())
@include('Inc.messages')

@elseif(Auth::user())
<div  class=" pb-30 container">
<h1>Choose Method Of Payment You want To use</h1>
<div class="col-md-4">

<div class="mt-4">
<div style="font-size:16px;" >1: CREDIT CARD PAYMENT METHODS</div>
<a style="font-size:16px;" href="credit-card" class="btn btn-lg btn-success">Credit Card</a>

</div>
<div class="mt-4">
<div style="font-size:16px;">2: ON-DELIVERY PAYMENT METHODS</div>
<a style="font-size:16px;" href="on-delivery" class="btn btn-lg btn-success">On-Delivery Payment</a>
</div>
</div>
<div class="col-md-8">
@if(Request::is('credit-card'))
<h1>Credit Card Payment Method </h1>
<strong style="font-size:16px;">Hi! We are sorry for credit card payment method will be enabled soon. Please use on-delivery payment method for now. Thank you. </strong> 
   <!--            
               <--  ?php require_once('./config.php'); ?>

<form action="./charge.php" method="post">
 <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
         data-key="<--?php echo $stripe['publishable_key']; ?>"
         data-description="Pay For Your Order"
         data-amount="{{$MainTotal}}"
         data-locale="auto"></script>
</form-->
                     @endif
                     @if(Request::is('on-delivery'))
                     <h1>For On-Delivery Payment You Have to Fill the Form Below</h1>

                       {!! Form::open(['url' => 'deliverypayment' , 'method' => 'GET' , 'enctype' => 'multipart/form-data' ]) !!}
<div class="form-horizontal">        
<div class="col-md-12">
              
                        {{ csrf_field() }}
                        <div style="font-size:16px;" class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                         <label for="firstname" class="col-md-4 control-label">First Name</label>
                           <div class="col-md-6">
                                <input id="firstname" style="font-size:16px; height:30px;" type="text" class="form-control" placeholder="Filbert" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="font-size:16px;" class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                         <label for="lastname" class="col-md-4 control-label">Last Name</label>  
                            <div class="col-md-6">
                                <input id="lastname" style="font-size:16px; height:30px;" type="text" class="form-control" placeholder="Libertf" name="lastname" value="{{ old('lastname') }}" required autofocus>
                         
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif   </div>
                                </div>
                        <div style="font-size:16px;" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         <label for="email" class="col-md-4 control-label">Email Address</label>
                           <div class="col-md-6">
                                <input id="email" style="font-size:16px; height:30px;" type="email" class="form-control" placeholder="homemegamart@gmail.com" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="font-size:16px;" class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                         <label for="phone" class="col-md-4 control-label">Phone Number</label>  
                            <div class="col-md-6">
                                <input id="phone" style="font-size:16px; height:30px;" type="text" class="form-control" name="phone" placeholder="+255 712456789" value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
      
                        <div style="font-size:16px;" class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                         <label for="sex" class="col-md-4 control-label">Sex</label>
                           <div class="col-md-6">
                           <select style="font-size:16px; height:30px;" name="sex" class="form-control" id="sex">
                        <option value="Male">Male</option>
                        <option  value="Female">Female</option>
                                </select>          
                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="font-size:16px;" class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                         <label for="date" class="col-md-4 control-label">Date Of Birth</label>  
                            <div class="col-md-6">
                                <input id="date" style="font-size:16px; height:31px;" type="date" class="form-control" name="date" value="2011-08-19" required autofocus>
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                     
                       
                        <style>
		
		#sig-canvas {
			border: 2px dotted #CCCCCC;
			border-radius: 5px;
			cursor: crosshair;
		}
		#sig-dataUrl {
			width: 100%;
		}
    </style>
    
    <div class="container">
		<div class="row">
            <div style="font-size:16px;" class="col-md-12">
            
				<h1>E-Signature</h1>
				<p style="font-size:16px;">Please sign below and click Submit Signature button to save Your Signature </p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		 		<canvas id="sig-canvas" width="620" height="160">
		 			Get a better browser, bro.
		 		</canvas>
		 	</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button style="font-size:16px;" class="btn btn-success" id="sig-submitBtn">Submit Signature</button>
				<button style="font-size:16px;" class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
            <textarea readonly id="sig-dataUrl" name="sig-dataUrl" class="form-control" required rows="5" required></textarea>
            </div>
		</div>
		<br/>
		<div class="row">
			<div class="col-md-12">
				<img id="sig-image" src="" alt="Your signature will go here!"/>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<!--<script src="https://code.angularjs.org/snapshot/angular.min.js"></script>-->
	<script src="./signature.js"></script>

        <a style="color: #008000; font-size:16px;" href="terms-condition">Terms And Condition For On-Delivery Payment </a>
    <div class="form-group">
    <div class="form-check">
        <input style="font-size:16px;" class="form-check-input" type="checkbox" value="1" name="terms_condition" id="terms_condition" required>

      <label style="font-size:16px;" class="ml-5 form-check-label " for="terms_condition">
                         Agree to terms and conditions
      </label>
    </div>
  </div>
                                        </div>
                                        <div class="form-group">
  <div class="col-md-8 ">
    {{Form::submit('UPLOAD',[ 'class'=>'btn btn-lg btn-success'])}}
      </div>
  </div>
                        </div>  
                        {!! Form::close() !!}
                
                     @endif
</div>
</div>
@endif