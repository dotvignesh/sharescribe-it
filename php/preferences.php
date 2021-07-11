<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel='stylesheet' href='../css/main.css'>
	<link rel='stylesheet' href='../css/register.css'>
	<!-- <script src="http://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
</head>

<body>

	<div class="main">

		<div class='welcome'>
			Welcome 
			<?php
				session_start();
				echo $_SESSION["username"];
			?> 
		</div>

		<div class='tellus mt'>
			Before we get going, tell us a bit about yourself!
		</div>

		<form action='interests.php' method='POST' class="mt">

			<div class="part">
				<div class='question'>
					1. What subscriptions are you primarily looking for ?</div>
				<br>
				<input type='checkbox' name='Q1[]' value="streaming" id='streaming'>	
				<span><label for='streaming'> Streaming </label></span>

				<input type='checkbox' name='Q1[]' value="productivity" id='productivity'>
				<span><label for='productivity'> Productivity </label></span>

				<input type='checkbox' name='Q1[]' value="education" id='education'>
				<span><label for='education'> Education </label></span>

				<input type='checkbox' name='Q1[]' value="magazines" id='magazines'>
				<span><label for='magazines'> Magazines and Newsletters </label></span>
				
				<input type='checkbox' name='Q1[]' value="music" id='music'>
				<span><label for='music'> Music </label></span>
			</div>

			<div class="part mt">
				<div class='question'>
					2. How much do you normally spend on subscriptions?</div>
				<br>
				<input type='radio' name='Q2' id='lessthan500' value='lessthan500' required>
				<span><label for='lessthan500'> Less than 500 </label></span>
				<input type='radio' name='Q2' id='lessthan1000' value='lessthan1000' required>
				<span><label for='lessthan1000'> Less than 1000 </label></span>
				<input type='radio' name='Q2' id='lessthan2000' value='lessthan2000' required>
				<span><label for='lessthan2000'> Less than 2000 </label></span>
				<input type='radio' name='Q2' id='morethan2000' value='morethan2000' required>
				<span><label for='morethan2000'> More than 2000</label></span>
			</div>

			<div class="part mt">
				<div class='question'>
					3. How much are you willing to spend as a sharescriber ?</div>
				<br>
				<input type='radio' name='Q3' id='lessthan500_2' value='lessthan500' required>
				<span><label for='lessthan500_2'>Less than 500</label></span>
				<input type='radio' name='Q3' id='lessthan1000_2' value='lessthan1000' required>
				<span><label for='lessthan1000_2'>Less than 1000</label></span>
				<input type='radio' name='Q3' id='lessthan2000_2' value='lessthan2000' required>
				<span><label for='lessthan2000_2'>Less than 2000</label></span>
			</div>


			<div class='next'>
				<!-- <span><input type='submit' value='Next' id='submit'>Next</span> -->
				<button id="submit">Next</button>
			</div>


			<br><br>
		</form>


		<div class="dialogBox mt-2">

		</div>

	</div>

	<script>
		
		document.addEventListener('keyup', function(event) {
			if(event.keyCode === 13)
				document.getElementById('submit').click();
		});

		const button = document.querySelector("#submit");
		const dialogBox = document.querySelector(".dialogBox");

		button.addEventListener("click", function (e) {

			let checkBox = document.querySelector("input[type=checkbox]:checked");
			let radio = document.querySelector("input[type=radio]:checked");

			if (!checkBox) {

				dialogBox.innerHTML = `
				<div class='container mt' id='red'>
        
					<div>
						<h1>Oops!</h1>
						<p>
							You must select at least one subscription category you're interested in!
						</p>
					</div>

				</div>
				`;

				e.preventDefault();

				// return false;
			} else if (!radio) {

				dialogBox.innerHTML = `
				<div class='container mt' id='red'>
        
					<div>
						<h1>Sorry!</h1>
						<p>
							You must select how much you're willing to spend on subscriptions before you can proceed!
						</p>
					</div>

				</div>
				`;

				e.preventDefault();

			} else {

				button.submit();

			}

		});

	</script>

</body>

</html>
