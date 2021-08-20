<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
	$msg="";
	$FirstName=$_POST['First_name'];
	$LastName=$_POST['Last_name'];
    $phonenumber=$_POST['phonenumber'];
    $password=$_POST['password'];
    $Cpassword=$_POST['confirm_password'];

    $rows= "SELECT * FROM userlog where PhoneNumber=$phonenumber";
    if($row_result = mysqli_query($conn,$rows)){
    	$rownum=mysqli_num_rows($row_result);
    	if($rownum>0){
        		$msg="Phone number already exist";
    	}
    	else if($password!=$Cpassword){
	    	$msg="Passwords do not match !";
		}
		else
		{
      $query = "INSERT INTO userlog(FirstName,LastName,PhoneNumber,Password)  VALUES ('$FirstName','$LastName','$phonenumber','$password')";
      $result = mysqli_query($conn,$query);
      $msg="User registration Successfull !";
        }}
       header('Location: Signup.php?msg='.$msg);
       die;
    }

			//save to database
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complainti Management</title>
	<link rel="stylesheet" type="text/css" href="Signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >
	<div class="div1">
		<span><h1 class="header">Ward Complaint Mangement</h1><a id="home" href="Home.php" class="fa fa-home header-home" style="font-size: 40px;margin-left: 100px" ></a></span>
	</div>
	<br><br>
	<b><div><h2 class="signup">Sign Up</h2></div></b>
	<div class= "model">
	<form  method="post" >

		<input type="text" class="box" name="First_name"  placeholder="First Name"  required>
		<input type="text" class="box" name="Last_name" placeholder="Last Name" ><br><br>
		<input type="text" class="box" name="phonenumber" style="padding-right: 190px" placeholder="Phone Number"  required><br><br>

		<div>
			<input type="password" class="box" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="padding-right: 190px" placeholder='Password' required>
		    <span id="eye" style="margin-left: -40px"><i class="fa fa-eye" onclick='myfun()' aria-hidden="true" ></i></span>
		</div>
		<br><br>
		
		<input type="Password" class="box"  id="cpsw" name="confirm_password" style="padding-right: 190px" placeholder="Confirm Password" required><br>
		<input type="submit" class="sub"  value="Sign Up"  ><br><br>
		</form>
	</div>
	<br>
		<a href="SignIn.php" class="signin">Have an account/SignIn</a>
		<h2 style="color:rgb(245, 78, 66);margin-left: 60%;margin-top:-220px;"> 
			<?php 
			if(isset($_GET['msg'])){
			 echo $_GET['msg']; 
			}
			?> 
		</h2>
		<script type="text/javascript">
			      function myfun(){
        if(document.getElementById("psw").type=="text"){
        document.getElementById("psw").type="password";
        }
        else{
          document.getElementById("psw").type="text";
        }
      }
       </script>
</body>
</html>