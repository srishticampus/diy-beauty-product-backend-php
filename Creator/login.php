<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 9%;
    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #f05837;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
::placeholder {
  color: black;
  opacity: 1; /* Firefox */
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}
</style>
<body>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
	  	<?php
if(isset($_GET['status'])){
	$msg=$_GET['status'];
	if($msg=='regSuccess'){
		echo '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Registration Successfull.Please Login.
</div>';
	}
	else if($msg=='regFailed'){

		echo '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Registration Failed.
</div>';
}

}

            	?>
            <div class="row">

                <div class="col-md-6 login-form-1">
                    <h3>Login </h3>
                    <form action="login_action.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" value=""  required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" required value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="sub" value="Login" />
                        </div>
                    </form>
                        
                    
                </div>
                <div class="col-md-6 login-form-2">
                   
                    <h3>Registration</h3>
                    <form action="reg_action.php" method="post">
                    <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Your Phone Number *" required value="" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Your Address *"  required ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" required value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="submit" value="Register" />
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

</body>
</html>