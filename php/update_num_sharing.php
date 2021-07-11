<html>
<head>
	<title>Order Complete</title>
	<link rel='stylesheet' href='../css/register.css'>

	<style>
		button {
			border:none; 
			background-color: white;
			padding: 10px 18px;
			border-radius: 5px; 
		}

		button:hover {
			cursor: pointer;
		}

		button:nth-child(2) {
			float: right;
		}
	</style>
</head>
<body>
<?php 
	session_start();

	include('config.php');

	$this_id = $_SESSION['id'];
	$username = $_SESSION['uname'];
	$num_of_users = $_SESSION['num_of_users'];
	$subscription_service = $_SESSION['subscription_service'];
	$subscription_username = $_SESSION['subName'];
	$subscription_password = $_POST["hiddencontainer"];

	$connect = mysqli_connect($server, $dbUser, $dbPassword, $db);

	if(!$connect){

		echo "
				<div class='container' id='red'>
			
					<div>
						<h1>Something went wrong :(</h1>
			
						<p>
							".mysqli_connect_error()."
						</p>
					</div>
			
				</div>";
	} else {

		$num_of_users ++;

		$update = "UPDATE subscriptions
		SET num_users_sharing = ${num_of_users}
		WHERE username = '$username' AND subscription_service = '$subscription_service'";

		if(!(mysqli_query($connect, $update)))
		{
			echo "
					<div class='container' id='red'>

					<div>
						<h1> Something went wrong :( </h1>

					<p>

						".mysqli_error($connect)."
					</p>

					</div>
					</div>";
		} else {

			$get_id = "SELECT id FROM users 
			WHERE username = '$username'";

			$id_object = mysqli_query($connect, $get_id);

			$id_arr = mysqli_fetch_array($id_object, MYSQLI_NUM);

			if(0){
			// echo $id_arr[0];
			
				echo "
						<div class='container' id='red'>

						<div>
						<h1>Something went wrong :(</h1>

						<p>
						".mysqli_error($connect)."
						</p>

						</div>

						</div>";
			}  else {

					$id = $id_arr[0]; 
					
					$update_id = "UPDATE users 
					SET sharescription_ids = CONCAT(sharescription_ids, '${id},')
					WHERE id = ${this_id}";

					if(!(mysqli_query($connect, $update_id))) {

						echo "

						ERROR: ".mysqli_error($connect);
					}

					else {

					echo "
					<div class='container' id='green'>


					<div>
						<h1> Success! </h1>

						<p> Here's to saving many more on subscriptions ! </p>

					
						</div><br>

					<div>
						
						Please take a note of your subscribed credentials
						
						</div><br>
						
						<div>
						
						Username :  ".$subscription_username."
						
						</div><br>
						
						<div>
						
						Password : ".$subscription_password."
					
					</div><br>

					<div>

					<button onclick='back()'>HOME</button>
					<button onclick='logout()'>LOG OUT</button>

					</div>
					
					</div>";
				

		}
	}
	}

	}




?>
<script>

	function back(){

		location.href = 'home_page.php';
	}

	function logout() {

		location.href = '../index.html';
		
	}
</script>
</body>
