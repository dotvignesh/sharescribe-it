<!-- file 6 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subscriptions</title>

    <link rel="stylesheet" href="../css/subs.css">

</head>

<body>


    <div class="navbar">

        <div class="brand">
            Subscription Sharing
        </div>

        <div class="navitems">
            <a href="add_subscriptions.php" class="active">Add Subscription</a>
            <a href="profilepage.php">Profile</a>
            <a href="home_page.php">Home</a>
        </div>

    </div>
    
    <div class="content">
        
        <!-- <button id="back">Back</button> -->
        <h2>Add Your Existing Subscription To Share</h2>

        <div class="formContent">

            <form action="add.php" method="POST">

                <div class="mt">
                    <label for="slct">What is the name of the subscription service you own?</label>
                    <select name="slct" id="slct">
                        <option>Choose an option</option>
                        <option disabled>----Streaming----</option>
                        <option value="netflix">Netflix</option>
                        <option value="primevideo">Prime Video</option>                   
                        <option value="hotstar">Disney+ Hotstar</option>
                        <option value="sonyliv">SonyLIV</option>
                        <option disabled>----Education----</option>
                        <option value="udacity">Udacity</option>
                        <option value="coursera">Coursera</option>
                        <option value="upgrad">Upgrad</option>
                        <option value="edx">edX</option>
                        <option value="byjus">BYJU'S</option>
                        <option disabled>----Productivity & Related tools----</option>
                        <option value="kindle">Kindle Unlimited</option>
                        <option value="adobe">Adobe Creative Cloud</option>
                        <option value="canva">Canva Pro</option>
                        <option disabled>----Magazines & Newsletters----</option>
                        <option value="businessinsider">Business Insider</option>
                        <option value="NYT">The New York Times</option>
                        <option value="indiatoday">India Today</option>
                        <option value="magzter">Magzter Gold</option>
                        <option value="mint">Mint</option>
                        <option disabled>----Music----</option>
                        <option value="spotify">Spotify</option>
                        <option value="primemusic">Prime Music</option>
                        <option value="saavn">Saavn</option>
                        <option value="gaana">Gaana</option>
                    </select>
                </div>

                <div class="mt-2">
                    <label for="cost">What's your current subscription cost?</label>

                    <div class="inputBox">
                        <span class="prefix">₹</span>
                        <input type="number" id="cost" name="cost">
                    </div>
                </div>

                <div class="mt-2">
                    <label for="billing_cycle">Choose your billing cycle:</label>

                    <input type="radio" name="billing_cycle" value="Monthly" checked> Monthly
                    <input type="radio" name="billing_cycle" value="Anually"> Anually

                </div>

                <div class="mt-2">
                    <label for="subName">What's the username you use for this subscription service?</label>

                    <div class="inputBox">
                        <span class="prefix">@</span>
                        <input type="text" id="subName" name="subName">
                    </div>
                </div>

                <div class="mt-2">
                    <label for="subPass">What's the password you use for this subscription service?</label>

                    <div class="inputBox">
                        <span class="prefix">&#128274</span>
                        <input type="password" id="subPass" name="subPass">
                    </div>
                </div>

            </form>

        </div>

        <button id="share">Share Your Subscription</button>

        
		<div class="dialogBox mt-2"></div>
        
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


        const btn = document.querySelector("#share");
        const dialogBox = document.querySelector(".dialogBox");

        btn.addEventListener("click", function (e) {
            
            let select = document.querySelector("select");
            let cost = document.querySelector("input[type='number']");
            let uname = document.querySelector("input[type='text']");
            let pass = document.querySelector("input[type='password']");

			if (select.selectedIndex == 0) {

				dialogBox.innerHTML = `
				<div class='container' id='red'>
        
					<div>
						<h1>Oops!</h1>
						<p>
							Name of the subsscription service can't be blank!
						</p>
					</div>

				</div>
				`;

				e.preventDefault();

				// return false;
			} else if (cost.value.length == 0) {

				dialogBox.innerHTML = `
				<div class='container' id='red'>
        
					<div>
						<h1>Oops!</h1>
						<p>
							Subscription service cost can't be empty!
						</p>
					</div>

				</div>
				`;

				e.preventDefault();

            } else if (uname.value.length == 0) {

                dialogBox.innerHTML = `
                <div class='container' id='red'>

                    <div>
                        <h1>Oops!</h1>
                        <p>
                            Username of your subscription service can't be empty!
                        </p>
                    </div>

                </div>
                `;

                e.preventDefault();

            } else if (pass.value.length == 0) {

                dialogBox.innerHTML = `
                <div class='container' id='red'>

                    <div>
                        <h1>Oops!</h1>
                        <p>
                            Password of your subscription service can't be empty!
                        </p>
                    </div>

                </div>
                `;

                e.preventDefault();

			} else {

                pass.value = crypt(pass.value, 13);
				document.querySelector("form").submit();

			}


        });

    </script>

</body>

</html>
