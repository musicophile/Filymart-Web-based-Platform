<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<img src="./images/logo_.png"  alt="">
<h2>Welcome Filymart {{$user['name']}}.The newest online Supermarket for all Groceries and food Products.</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
<h1>Thank you! Welcome Again! </h1>
</body>

</html>