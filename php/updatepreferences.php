<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel='stylesheet' href='../css/main.css'>
	<link rel='stylesheet' href='../css/register.css'>
	<!-- <script src="http://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
    <?php
    session_start();
    include "config.php";
    $connection = mysqli_connect($server, $dbUser, $dbPassword, $db);
    $name=$_SESSION["username"];
    $sql1="SELECT * FROM user_preferences WHERE username='$name'";
    $res=mysqli_query($connection,$sql1);
    $row=mysqli_fetch_assoc($res);
    $interests=$row["interests"];
    $interests=$_SESSION["interests"];
    $current_spend=$_SESSION["spend"];
    $arr=explode(",",$interests);
    $arr1="";
        $arr2="";
        $arr3="";
        $arr4="";
        $arr5="";
        for($i=0 ; $i < count($arr) ; $i++){
            if($i==0){
                $arr1=$arr[$i];
            }
            if($i==1){
                $arr2=$arr[$i];
            }
            if($i==2){
                $arr3=$arr[$i];
            }
            if($i==3){
                $arr4=$arr[$i];
            }
            if($i==4){
                $arr5=$arr[$i];
            }
        }
    ?>
</head>

<body>

	<div class="main">

		<div class='welcome'>
			Welcome 
			<?php
				echo $_SESSION["username"];
			?> 
		</div>

		<div class='tellus mt'>
			Before we get going, tell us a bit about yourself!
		</div>

		<form action='updateinterests.php' method='POST' class="mt">

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
					3. How much are you willing to spend as a (cool term after we decide on a name for the app)</div>
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

        var arrlist=["streaming","productivity","education","magazines","music"];

        var c=[0,0,0,0,0];
                for(var i=0;i<5;i++){
                    if("<?php echo $arr1?>"===arrlist[i]){
                        c[i]++;
                    }
                    if("<?php echo $arr2?>"===arrlist[i]){
                        c[i]++;
                    }
                    if("<?php echo $arr3?>"===arrlist[i]){
                        c[i]++;
                    }
                    if("<?php echo $arr4?>"===arrlist[i]){
                        c[i]++;
                    }
                    if("<?php echo $arr5?>"===arrlist[i]){
                        c[i]++;
                    }   
                }
                if(!(c[0]==0)){
                    document.getElementById("streaming").checked = true;
                }
                if(!(c[1]==0)){
                    document.getElementById("productivity").checked = true;
                }
                if(!(c[2]==0)){
                    document.getElementById("education").checked = true;
                }
                if(!(c[3]==0)){
                    document.getElementById("magazines").checked = true;
                }
                if(!(c[4]==0)){
                    document.getElementById("music").checked = true;
                }
		
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
