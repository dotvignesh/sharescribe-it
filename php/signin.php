<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signing up</title>

    <link rel="stylesheet" href="../css/register.css">

</head>

<body>

    <?php
        session_start();
        include 'config.php';

        $username = $_SESSION["username"];
        $password = $_SESSION["password"];

        $connection = mysqli_connect($server, $dbUser, $dbPassword, $db);

        if (!$connection) {

            echo "
            <div class='container' id='red'>
        
                <div>
                    <h1>Something went wrong :(</h1>
        
                    <p>
                        No connection.
                    </p>
                </div>
        
            </div>";

        } else {


            $query = "SELECT * FROM users WHERE username='".$username."'";
            if (!($result = mysqli_query($connection, $query))) {

                echo "
                <div class='container' id='red'>
            
                    <div>
                        <h1>Something went wrong :(</h1>
            
                        <p>
                            Error selecting user. <br />
                            ".$connection->error."
                        </p>
                    </div>
            
                </div>";

            } else {
                
                $selected = mysqli_fetch_assoc($result);

                if ($selected["password"] === $password) {

                    echo "
                    <div class='container' id='green'>
                
                        <div>
                            <h1>Success!!!</h1>
                
                            <p>
                                Succesfully signed in!
                            </p>
                        </div>
                
                    </div>";

                    // Change this file name i.e homepage.html to wherever you want to redirect it to
                    header('Location:home_page.php');

                } else {

                    echo "
                    <div class='container' id='red'>
                    
                        <div>
                            <h1>Incorrect Password</h1>
                
                            <p>
                                Please check your credentials and try again! <br />
                            </p>
                        </div>
                    
                    </div>
                    
                    <div>
                        <button id='btn'>Go Back</button>
                    </div>
                    
                    ";

                }

            }

        }

    ?>

    <script>

        document.querySelector("#btn").onclick = () => {
            location.href = "../index.html";
        };

    </script>


</body>

</html>
