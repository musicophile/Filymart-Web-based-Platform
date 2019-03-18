<div style="height:670.3px;">
          <h2 style=" font-weight:bold; ">Contact Us</h2>
          <div style=" font-size:18px;">Homemegamart  Ltd,<br>
P.O.Box 11127,<br>
 Arusha, Tanzania<br>
Tel.: +255 765438924<br>
Email id: homemegamart@gmail.com, feusebius1710@gmail.com </div>

<form class="form-horizontal" role="form" method="GET" action="{{ url('/message') }}">
                        {{ csrf_field() }}
                            <div>
                        <div class="col-sm-6 col-md-8 form-group">
                            <label style="font-size:16px;" for="name">Name</label>

                            <div>
                                <input style="font-size:16px;" placeholder="Lifbert Fiblet" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8 form-group">
                            <label style="font-size:16px;" for="email">Your Email</label>

                            <div >
                                <input style="font-size:16px;" placeholder="homemegamart@gmail.com" id="email" type="email" class="form-control" name="email" value="{{ old('name') }}" required autofocus>

                            </div>
                        </div>
                        <div class="col-sm-8 col-md-12 form-group">
                            <label style="font-size:16px;" for="message" >Message</label>

                            <div class="">
                            <textarea id="message" style="font-size:16px;" name="message" class="form-control" placeholder="Add your message here!"  rows="5" required></textarea>
                      </div>
                        </div>
                        <div class="form-group">  
                        <div class="col-sm-4 col-md-6 col-md-offset-4">   
                                   <button type="submit" style="font-size:16px;" class="btn btn-lg btn-success">SEND MESSAGE</button>
                        </div>
                        </div>
                        </div>
                        </form>
</div>