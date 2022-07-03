<?php

require_once("conn.php");
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
	
	$fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $dob=$_POST["dob"];
	$mob=$_POST["mob"];
    $gen=$_POST["gen"];
	$email=$_POST["email"];
    $sub=$_POST["sub"];
	


/*Password Matching Validation*/
// if($pass != $conf) {
// 	$error_message='password must be same<br>';
// }
// 	if(!isset($error_message)) {
// 		$epass=password_hash($pass,PASSWORD_BCRYPT);
//    $q1 = mysqli_query($con,"INSERT INTO `login` (`username`, `password`) VALUES ('$em', '$epass');");
//    if($q1){
   $q2 = mysqli_query($con,"INSERT INTO `register` (`fname`, `lname`, `dob`, `gender`, `email`, `mob`, `sub`) VALUES (`$fname`, `$lname`, `$dob`, `$gen`, `$email`, `$mob`, `$sub`)"); 
   if($q2)
   {
	   unset($_POST);
	   $success_message="<strong>Success</strong>, You are successfully registred.<br> <a href=\"login.php\">Login Now</a>";
   }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="wrapper rounded bg-white">

        <div class="h3">Registration Form</div>


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
        <div class="form">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Birthday</label>
                    <input type="date" class="form-control" name="dob" required>
                </div>
                <div class="col-md-6 mt-md-0 mt-3">
                    <label>Gender</label>
                    <div class="d-flex align-items-center mt-2">
                        <label class="option">
                            <input type="radio" name="gen" value="m">Male
                            <span class="checkmark"></span>
                        </label>
                        <label class="option ms-4">
                            <input type="radio" name="gen" value="f">Female
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <label class="form-control-label text-muted">Email Address</label>
                <input type="email" name="email" placeholder="Enter a valid email address" class="form-control" required>
            </div>

            <div class="col-md-6 mt-md-0 mt-3">
                <label class="form-control-label text-muted">Mobile</label>
                <input type="text" name="mob" placeholder="Enter a valid mobile no" class="form-control" required>
            </div>
            </div>

            <!-- <div class="form-group">
                <label class="form-control-label text-muted">Password</label>
                <input type="password" name="pass" placeholder="Password" class="form-control" Required>
            </div>

            <div class="form-group">
                <label class="form-control-label text-muted">Confirm Password</label>
                <input type="password"  name="cpass" placeholder="Confirm Password" class="form-control">
            </div>
             -->
            <div class=" my-md-2 my-3">
                <label>Subject</label>
                <select name="sub" required>
                    <option value="" selected hidden>Choose Option</option>
                    <option value="Maths">Maths</option>
                    <option value="Science">Science</option>
                    <option value="Social">Social</option>
                    <option value="Hindi">Hindi</option>
                </select>
            </div>
        </div>
        <div class="row justify-content-center my-3 px-3">
            <button type="submit"  class="btn btn-primary mt-3">Sign Up</button>
        </div>
        </form>
    </div>
</body>
</html>