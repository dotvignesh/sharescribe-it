<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Processing</title>
	<script src='jquery-3.6.0.min.js'></script>

	<style>

	body{
		margin-top: 200px;
		text-align: center;
	}

	span{
		display: none;
		}

</style>
</head>
<body>

	<?php session_start() ?>

	<form action="update_num_sharing.php" method="POST">
		<input type="hidden" id="hiddencontainer" name="hiddencontainer"/>
	</form>

	<div class='content'>
		<span id='one'>⚡</span>
		<span id='two'>⚡</span>
		<span id='three'>⚡</span>
	
	</div>

	<script>

		var crypt = function (str, shift) {

			if (shift < 0) {
				return crypt(str, shift + 26);
			}

			var output = "";

			for (var i = 0; i < str.length; i++) {

				var c = str[i];

				if (c.match(/[a-z]/i)) {

					var asciiCode = str.charCodeAt(i);

					// Uppercase letters
					if (asciiCode >= 65 && asciiCode <= 90) {
						c = String.fromCharCode(((asciiCode - 65 + shift) % 26) + 65);
					}

					// Lowercase letters
					else if (asciiCode >= 97 && asciiCode <= 122) {
						c = String.fromCharCode(((asciiCode - 97 + shift) % 26) + 97);
					}
				}

				output += c;
			}

			return output;

		}

		var currentPass = "<?php echo $_SESSION['subPass']; ?>";
		currentPass = crypt(currentPass, 13);
		document.querySelector("#hiddencontainer").value = currentPass;

		console.log(currentPass);

			$(document).ready(function() {

				setInterval(function() {

					$('#one').css('display','inline');

				}, 1000);

				setInterval(function() {

					$('#two').css('display','inline');

				}, 2000);

				setInterval(function() {

					$('#three').css('display','inline');
				}, 3000);

				setInterval(function() {
					// location.href = 'update_num_sharing.php';
					document.querySelector("form").submit();
				}, 5000);

		});
	

	</script>


</body>
</html>
