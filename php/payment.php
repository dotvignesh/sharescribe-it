<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<title>Payment</title>
    <link rel='stylesheet' href='../css/homepage.css'> 
    <link rel='stylesheet' href='../css/app.css'> 
</head>
<body>


	<?php


			$start_date = getdate(); 

			session_start();


			$index = $_POST["to-subscribe"];
		
			$unarr = $_SESSION['uname_arr'];
			$snarr = $_SESSION['subName_arr'];
			$sparr = $_SESSION['subPass_arr'];
			$ssarr = $_SESSION['subscription_service_arr'];
			$scarr = $_SESSION['subscription_cost_arr'];
			$bcarr = $_SESSION['billing_cycle_arr'];
			$nuarr = $_SESSION['num_of_users_arr'];

			$_SESSION['uname'] = $unarr[$index+1];
            $_SESSION['subName'] = $snarr[$index+1];
            $_SESSION['subPass'] = $sparr[$index+1];
            $_SESSION['subscription_service'] = $ssarr[$index+1];
            $_SESSION['subscription_cost'] = $scarr[$index+1];
            $_SESSION['billing_cycle'] = $bcarr[$index+1];
            $_SESSION['num_of_users']=$nuarr[$index+1];
		
			$service = $_SESSION['subscription_service'];



			echo "
		           <ul>
				   	  <h2>Order Summary:</h2>
		              <li>Username of subscription holder: ".$_SESSION['uname']."</li><br>
		              <li>Subscription service: ".$_SESSION['subscription_service']."</li><br>
		              <li>Subscription cost: ₹".$_SESSION['subscription_cost']."</li><br>
		              <li>Validity: $start_date[mday]/$start_date[mon]/$start_date[year] - auto renews ".$_SESSION['billing_cycle']."</ul>";
			   ?>

		<div class='details' style='margin-left: 40px;'>

			<div class='payment'> <div class='pay-method'> <strong> UPI </strong> </div><br> <div
			class='text'> Enter UPI ID <input type='text'></div> <br>
			(OR)<br><br>
			<div class='pay-method'> <strong> DEBIT/CREDIT CARD </strong> </div>
			<div class='text'> <br> Enter credit/Debit card number <input
			type='number' pattern='[0-9]{12}'> <br> Expiry Date <input
			type='text' pattern='[0-9]|[1][0-2]/[0-3]
			[0-9]' placeholder='MM/YY'> <br> CVV <input type='number'> </div> </div>


			<div class='confirm'>
				<button class='confirm-pay' onclick='location.href="processing.php"'>Make Payment</button>
				<button type='button' onclick='location.href="home_page.php"'>Cancel Order</button>
			</div>

		</div>

	</body>
	</html>
