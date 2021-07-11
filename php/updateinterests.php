<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Preferences</title>

    <link rel="stylesheet" href="../css/register.css">

</head>

<body>

    <?php
    session_start();

    include 'config.php';

    $array = $_POST['Q1'];
    $interests = "";
    $prev_spend = $_POST['Q2'];
    $current_spend = $_POST['Q3'];

    foreach($array as $checkbox)
    {
        $interests .= $checkbox.",";
    }
    $_SESSION["interests"]=$interests;
    $_SESSION["spend"]=$current_spend;
    $username = $_SESSION['username'];
    echo $interests;
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

        $query = "CREATE TABLE IF NOT EXISTS user_preferences 
                (id INT(3) AUTO_INCREMENT PRIMARY KEY, 
                username VARCHAR(20) UNIQUE, 
                interests VARCHAR(60),
                prev_spend VARCHAR(20),
                current_spend VARCHAR(20))";

        if (!(mysqli_query($connection, $query))) {

            echo "
                <div class='container' id='red'>
                
                    <div>
                        <h1>Something went wrong :(</h1>
                
                        <p>
                            Error creating table. <br />
                            ".mysqli_error($connection)."
                        </p>
                    </div>
                
                </div>";

        } else {

            $query2 = "UPDATE user_preferences SET interests='$interests', prev_spend='$prev_spend', current_spend='$current_spend' 
            WHERE username='$username'";

            if (!(mysqli_query($connection, $query2))) {

                echo "
                    <div class='container' id='red'>
                        
                        <div>
                            <h1>Something went wrong :(</h1>
                                <p>
                                    Error updating values into table. <br />
                                    ".mysqli_error($connection)."
                                </p>
                        </div>
                        
                    </div>";

            } else {

                echo "
                    <div class='container' id='green'>
                        
                        <div>
                            <h1>Updated!</h1>
                                <p>
                                    Redirecting...
                                </p>
                        </div>
                        
                    </div>";


                header('Location:home_page.php');

            }


        } 

            // else {


        //         echo "
        //             <div class='container' id='green'>
                        
        //                 <div>
        //                     <h1>Worked!</h1>
        //                         <p>
        //                             Redirect stuff here!
        //                         </p>
        //                 </div>
                        
        //             </div>";

        //     }

        // }  

    }




    // mysqli_close($connect);
?>

<button onclick="location.href='home_page.php'"> rgreg</button>

</body>

</html>