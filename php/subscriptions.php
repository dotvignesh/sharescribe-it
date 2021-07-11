<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Subscriptions</title>
	<link rel='stylesheet' href='../css/main.css'>
	<link rel='stylesheet' href='../css/register.css'>
	<script src="jquery-3.6.0.min.js"></script>

</head>

<body>

	<div class="main">

		<div class='welcome'>
			<?php
				session_start();
				echo $_SESSION['username'].", Please take a moment to tell us what you're currently using:";
			?> 
		</div><br>

		<div class='tellus mt'>
			By telling us what you use, you can find users who are looking for your subscription to share with ! You can always come back and edit this form ! 
		</div><br><br>

		<form action='user_subscriptions.php' method='POST' class="mt">


			<div class="part"> 
				<div class='question'>
			     Please click below all that you have subscribed to<br><br>
			     I. Streaming </div>
				<br>
				<input type='checkbox' name='Q1[]' value="netflix" id='netflix'>	
				<span><label for='netflix'> Netflix </label></span>

				<input type='checkbox' name='Q1[]' value="prime" id='prime'>
				<span><label for='prime'> Prime Video </label></span>

				<input type='checkbox' name='Q1[]' value="hotstar" id='hotstar'>
				<span><label for='hotstar'> Hotstar </label></span>

				<input type='checkbox' name='Q1[]' value="sony" id='sony'>
				<span><label for='sony'> Sony Liv </label></span>

				<input type='text'>
			</div>
			<br>


			<div class='cost-streaming'>
				<div class='cost-netflix cost'>
				Current Netflix subscription cost? <input type='text' class='input-cost input-netflix' name='cost-netlfix'>
			    </div>
			    <div class='cost cost-prime'>
			    Current Prime subscription cost? <input type='text' class='input-cost input-prime' name='cost-prime'>
			    </div>
                <div class='cost cost-hotstar'>
	            Current Hotstar subscription cost? <input type='text' class='input-cost input-hotstar' name='cost-hotstar'>
                </div>
                <div class='cost cost-sony'>
	            Current Sony subscription cost? <input type='text' class='input-cost input-sony' name='cost-sony'>
                </div>
            </div>


	
			<div class="part">
				<div class='question'>
					II. Education </div>
				<br>
				<input type='checkbox' name='Q2[]' id='udemy' value='udemy'>
				<span><label for='udemy'> Udemy </label></span>

				<input type='checkbox' name='Q2[]' id='coursera' value='coursera'>
				<span><label for='coursera'> Coursera </label></span>

				<input type='checkbox' name='Q2[]' id='upgrad' value='upgrad'>
				<span><label for='upgrad'> Upgrad </label></span>

				<input type='checkbox' name='Q2[]' id='edx' value='edx'>
				<span><label for='edx'> edX </label></span>

				<input type='checkbox' name='Q2[]' id='byjus' value='byjus'>
				<span><label for='byjus'> Byju's </label></span>
			</div>
			<br>


			<div class='cost-education'>
				<div class='cost-udemy cost'>
				Current Udemy subscription cost? <input type='text' class='input-cost input-udemy' name='cost-udemy'>
			    </div>
			    <div class='cost cost-coursera'>
			    Current Coursera subscription cost? <input type='text' class='input-cost input-coursera' name='cost-coursera'>
			    </div>
                <div class='cost cost-upgrad'>
	            Current Upgrad subscription cost? <input type='text' class='input-cost input-upgrad' name='cost-upgrade'>
                </div>
                <div class='cost cost-edx'>
	            Current edX subscription cost? <input type='text' class='input-cost input-edx' name='cost-edx'>
                </div>
                <div class='cost cost-byjus'>
                	Current Byju's subscription cost? <input type='text' class='input-cost input-byjus' name='cost-byjus'>
                </div>
            </div> 


       
			<div class="part">
				<div class='question'>
					III. Productivity
					</div>
				<br>
				<input type='checkbox' name='Q3[]' id='kindle' value='kindle'>
				<span><label for='kindle'> Kindle </label></span>

				<input type='checkbox' name='Q3[]' id='adobe' value='adobe'>
				<span><label for='adobe'> Adobe </label></span>

				<input type='checkbox' name='Q3[]' id='canva' value='canva'>
				<span><label for='canva'> Canva </label></span>
			</div>
			<br>

			<div class='cost-productivity'>
				<div class='cost-kindle cost'>
				    Current Kidle subscription cost? <input type='text' class='input-cost input-kindle' name='cost-kindle'>
				</div>
				<div class='cost-adobe cost'>
					Current Adobe subscription cost? <input type='text' class='input-cost input-adobe' name='cost-adobe'>
				</div>
				<div class='cost-canva cost'>
					Current Canva subscription cost? <input type='text' class='input-cost input-canva' name='cost-canva'>
				</div>
			</div>
			<br>


            
			<div class='part'>
				<div class='question'>
					IV. Magazines and Newsletters
				</div>
				<br>

			    <input type='checkbox' name='Q4[]' id='insider' value='insider'>
			    <span><label for='insider'>Business Insider </label></span>

                <input type='checkbox' name='Q4[]' id='nyt' value='nyt'>
                <span><label for='nyt'>New York Times </label></span>

                <input type='checkbox' name='Q4[]' id='indiatoday' value='indiatoday'>
                <span><label for='indiatoday'>India Today </label></span>

                <input type='checkbox' name='Q4[]' id='magzter' value='magzter'>
                <span><label for='magzter'> Magzter </label></span>
            </div><br>

            <div class='cost-newsletters'>
            	<div class='cost-insider cost'>
            		Current Insider subscription cost? <input type='text' class='input-cost input-insider' name='cost-insider'>
            	</div>
            	<div class='cost-nyt cost'>
            		Current NYT subscription cost? <input type='text' class='input-cost input-nyt' name='cost-nyt'>
            	</div>
            	<div class='cost-itoday cost'>
            		Current India Today subscription cost? <input type='text' class='input-cost input-itoday' name='cost-itoday'>
            	</div>
            </div>



            <div class='part'>
            	<div class='question'>
            		V. MUSIC
            	</div>
            	<br>

            	<input type='checkbox' name='Q5[]' id='spotify' value='spotify'>
            	<span><label for='spotify'>Spotify</label></span>
		    
            	<input type='checkbox' name='Q5[]' id='primemusic' value='primemusic'>
            	<span><label for='primemusic'>Prime Music</label></span>
		    
            	<input type='checkbox' name='Q5[]' id='gaana' value='gaana'>
            	<span><label for='gaana'>Gaana</label></span>
            </div><br>

            <div class='cost-music'>
               <div class='cost-spotify cost'>
                 Current Spotify subcription cost? <input type='text' class='input-cost input-spotify' name='cost-spotify'>
               </div> 
               <div class='cost-pmusic cost'>
               	 Current Prime subcription cost? <input type='text' class='input-cost input-pmusic' name='cost-pmusic'>
               </div>
               <div class='cost-gaana cost'>
	             Current Gaana subcription cost? <input type='text' class='input-cost input-gaana' name='cost-gaana'>
               </div>

			<div class='next'>
				<!-- <span><input type='submit' value='Next' id='submit'>Next</span> -->
				<button id="submit">SKIP</button>
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
		

	 $(document).ready( () => {

	 	   $('label').click(function() {
	 	   	$('button').html('NEXT');
	 	   });	

	 	   //jquery for streaming

           $('#netflix').click(function() {
           $(".cost-netflix").toggle(this.checked);
           });

           $('#prime').click(function() {
           	$('.cost-prime').toggle(this.checked);
           });

           $('#hotstar').click(function() {
           	$('.cost-hotstar').toggle(this.checked);
           })

           $('#sony').click(function() {
           	$('.cost-sony').toggle(this.checked);
           })


           //jquery for education

           $('#udemy').click(function() {
           	$('.cost-udemy').toggle(this.checked);
           });

           $('#coursera').click(function() {
           	$('.cost-coursera').toggle(this.checked);
           });

           $('#upgrad').click(function() {
           	$('.cost-upgrad').toggle(this.checked);
           });

           $('#edx').click(function() {
           	$('.cost-edx').toggle(this.checked);
           });

           $('#byjus').click(function() {
           	$('.cost-byjus').toggle(this.checked);
           });


           //jquery for productivity

           $('#kindle').click(function() {
           	$('.cost-kindle').toggle(this.checked);
           });

           $('#adobe').click(function() {
           	$('.cost-adobe').toggle(this.checked);
           });

           $('#canva').click(function() {
           	$('.cost-canva').toggle(this.checked);
           });


           //jquery for newsletters

           $('#insider').click(function() {
           	$('.cost-insider').toggle(this.checked);
           });

           $('#nyt').click(function() {
           	$('.cost-nyt').toggle(this.checked);
           });

           $('#indiatoday').click(function() {
           	$('.cost-itoday').toggle(this.checked);
           });

           $('#magzter').click(function() {
           	$('.cost-magzter').toggle(this.checked);
           });


           //jquery for music

           $('#spotify').click(function() {
           	$('.cost-spotify').toggle(this.checked);
           });

           $('#primemusic').click(function() {
           	$('.cost-pmusic').toggle(this.checked);
           });

           $('#gaana').click(function() {
           	$('.cost-gaana').toggle(this.checked);
           });


	 });

	</script>
</body>
</html>
