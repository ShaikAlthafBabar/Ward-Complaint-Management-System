<?php

function check_login($conn)
{

	if(isset($_SESSION['User_ID']))
	{

		$id = $_SESSION['User_ID'];
		$query = "select * from userlog where User_ID = '$id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: SignIn.php");
	die;

}
function admin_login_check($conn)
{

	if(isset($_SESSION['AdminID']))
	{

		$id = $_SESSION['AdminID'];
		$query = "select * from admin where AdminID = '$id' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: Admin.php");
	die;

}
?>
