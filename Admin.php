<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$loginid = $_POST['Login_ID'];
		$password = $_POST['password'];

		if(!empty($loginid) && !empty($password))
		{

			//read from database
			$query = "select * from admin where AdminID = '$loginid' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] == $password)
					{

						$_SESSION['AdminID'] = $user_data['AdminID'];
						header("Location: AdminLog.php");
						die;
					}
				}
			}
			
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Complaint Management</title>
	<link rel="stylesheet" type="text/css" href="Admin-CSS.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
background: #70e1f5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
	.div1{background: #56ab2f;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #a8e063, #56ab2f);
	border:2px solid grey;}
	</style>
</head>
<body >
	<div class="div1">
		<span><h1 class="header">Ward Complaint Mangement</h1><a id="home" href="Home.php" class="fa fa-home header-home" style="font-size: 30px"></a></span>
	</div><br><br>
	<b><h2 class="signin">Admin Sign In</h2></b>
	<div class= "model" >
	<form method="post" >
		<input type="text" class="box" name="Login_ID"  placeholder="Login_ID" style="border-radius: 7px;padding-right: 190px" required><br><br>
		<div>
			<input type="password" class="box" id="psw" name="password" size="47%" placeholder='Password' required><span id="eye" style="margin-left: -40px;border-radius: 7px;"><i class="fa fa-eye" onclick='myfun()' aria-hidden="true" ></i></span>
		</div>
		<input type="submit" class="sub"  value="Sign In"><br><br>
	</form>
	</div>
	<br><br>	
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