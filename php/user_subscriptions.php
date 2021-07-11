<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register subscriptions</title>
	<link rel='stylesheet' href='../css/register.css'>
</head>
<body>
	<?php
	session_start();

	include('config.php');

	$id = $_SESSION['id'];

	$array_q1 = $_POST['Q1'];
	$streaming = "";

	$array_q2 = $_POST['Q2'];
	$education = "";

	$array_q3 = $_POST['Q3'];
	$productivity = "";

	$array_q4 = $_POST['Q4'];
	$newsletters = "";

	$array_q5 = $_POST['Q5'];
	$music = "";

	foreach($array_q1 as $element)
	{
		$streaming .= $element.",";
	}

	foreach($array_q2 as $element)
	{
		$education .= $element.",";
	}

	foreach($array_q3 as $element)
	{
		$productivity .= $element.",";
	}

	foreach($array_q4 as $element)
	{
		$newsletters .= $element.",";
	}

	foreach($array_q5 as $element)
	{
		$music .= $element.",";
	}

	$username = $_SESSION['username'];

	$connect = mysqli_connect($server, $dbUser, $dbPassword, $db);

	if(!$connect){
		echo "
		<div class='container' id='red'>
		  <div>
		    <h1> Something went wrong :( </h1>
		      <p>
		       No connection
		      </p>
		  </div>
		</div>";

	} else {

		$create_tb = 'CREATE TABLE IF NOT EXISTS user_subscriptions
		(id INT(3) PRIMARY KEY,
		username VARCHAR(20) UNIQUE,
		streaming VARCHAR(30),
		education VARCHAR(30),
	    productivity VARCHAR(30),
	    newsletters VARCHAR(30),
	    music VARCHAR(30))';

		if(!(mysqli_query($connect, $create_tb)))
		{
		echo "
	    <div class='container' id='red'>
		  <div>
		    <h1> Something went wrong :( </h1>
		      <p>
		       Error creating a table ".mysqli_error($connect)."
		      </p>
		  </div>
		</div>";

		} else {

			$insert = "INSERT INTO user_subscriptions (id, username, streaming, education, productivity, newsletters, music)
			VALUES ('$id','$username','$streaming','$education','$productivity','$newsletters','$music')";

			if(!(mysqli_query($connect, $insert))){

		echo "
	    <div class='container' id='red'>
		  <div>
		    <h1> Something went wrong :( </h1>
		      <p>
		       Error inserting values into table ".mysqli_error($connect)."
		      </p>
		  </div>
		</div>";
		
			} else {
				echo "
				<div class='container' id='green'>
				  <div>
				    <h1> Updated! </h1>
				      <p>
				      Redirecting .... 
				      </p>
				   </div>
				</div>";

				header('Location:home_page.php');
			}
		}
	}
?>	

</body>
</html>