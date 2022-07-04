<?php

require_once("db/conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	foreach($_POST as $key=>$value)
	{
	if(empty($_POST[$key]))
	{
		$error_message="All fields are required";
		break;
	}
	}
	
	$name=$_POST["name"];
	$phn=$_POST["mob"];
	$em=$_POST["email"];
	$pass=$_POST["pass"];
	$conf=$_POST["cpass"];
	


/*Password Matching Validation*/
if($pass != $conf) {
	$error_message='password must be same<br>';
}
	if(!isset($error_message)) {
		$epass=password_hash($pass,PASSWORD_BCRYPT);
   $q1 = mysqli_query($con,"INSERT INTO `login` (`username`, `password`) VALUES ('$em', '$epass');");
   if($q1){
   $q2 = mysqli_query($con,"INSERT INTO `user` (`name`, `email`, `mob`) VALUES ('$name', '$em', '$phn');"); 
   if($q2)
   {
	   unset($_POST);
	   $success_message="<strong>Success</strong>, You are successfully registred.<br> <a href=\"login.php\">Login Now</a>";
   }
   }
}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container px-4 py-5 mx-auto">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">

                            <h6 class="msg-info">Please login to your account</h6>

                            <?php if(!empty($success_message)) {?>
                                <div class="alert alert-success">
                                    <?php if (isset($success_message))echo $success_message;?>
                                    <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
                                    </div>	
                            <?php } ?>
                            <?php if(!empty($error_message)) {?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
                                    <?php if (isset($error_message))echo $error_message;?>
                                    </div>	
                            <?php } ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="form-control-label text-muted">Name</label>
                                <input type="text"  name="name" placeholder="Enter your name" class="form-control" Required>
                            </div>

                            <div class="row px-3">
                                <label class="form-control-label text-muted">Email Address</label>
                                <input type="email" name="email" placeholder="Enter a valid email address" class="form-control">
                            </div>

                            <div class="row px-3">
                                <label class="form-control-label text-muted">Mobile</label>
                                <input type="text" name="mob" placeholder="Enter a valid mobile no" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label text-muted">Password</label>
                                <input type="password" name="pass" placeholder="Password" class="form-control" Required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label text-muted">Confirm Password</label>
                                <input type="password"  name="cpass" placeholder="Confirm Password" class="form-control">
                            </div>
    
    
                            <div class="row justify-content-center my-3 px-3">
                                <button type="submit"  class="btn-block btn-color">Sign Up</button>
                            </div>
                        </form>
                            <div class="row justify-content-center my-2">
                                <a href="#"><small class="text-muted">Forgot Password?</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom text-center mb-5">
                        <p href="#" class="sm-text mx-auto mb-3">Don't have an account?<button class="btn btn-white ml-2">Create new</button></p>
                    </div>
                </div>
                <div class="card card2">
                    <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white">We are more than just a company</h3>
                        <small class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>