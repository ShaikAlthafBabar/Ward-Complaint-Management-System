<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];

		if(!empty($phonenumber) && !empty($password))
		{

			//read from database
			$query = "select * from userlog where phonenumber = '$phonenumber' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $password)
					{

						$_SESSION['User_ID'] = $user_data['User_ID'];
						header("Location: User.php");
						die;
					}
				}
			}
		header('Location:SignIn.php?msg='."Wrong Username or Password !");
		}else
		{
		 header('Location:SignIn.php?msg='."Wrong Username or Password !");
		}
	}
       	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint Management</title>
	<link rel="stylesheet" type="text/css" href="SignIn.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="div1">
		<span><h1 class="header">Ward Complaint Mangement</h1><a id="home" href="Signup.php" class="fa fa-home header-home" style="font-size: 30px" ></a></span>
	</div>
	<br><br>
	<b><div><h2 class="signin">User Sign In</h2></div></b>
	<div class= "model">
	<form name="myform" method="post" >
		<input type="text" class="box" name="phonenumber" size="47%" placeholder="Phone Number"  required><br><br>
		<div>
			<input type="password" class="box" id="psw" name="password" size="47%" placeholder='Password' required><span id="eye" style="margin-left: -40px"><i class="fa fa-eye" onclick='myfun()' aria-hidden="true" ></i></span>
		</div>
		<input type="submit" class="Log"  value="Login" ><br><br>
	</form>
	</div>
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
       <h2 style="margin-left: 700px;margin-top: -100px">
       	<?php 
       		if(isset($_GET['msg'])){
       			echo $_GET['msg'];
       		}
       		 ?>
       </h2>
</body>
</html>