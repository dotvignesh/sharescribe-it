<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Subscription...</title>

    <link rel="stylesheet" href="../css/register.css">

</head>

<body>

    <?php
        
        session_start();

        include "config.php";

        $username = $_SESSION["username"];
        $subscription_service = $_POST["slct"];
        $subscription_cost = $_POST["cost"];
        $billing_cycle = $_POST["billing_cycle"];
        $subscription_username = $_POST["subName"];
        $subscription_password = $_POST["subPass"];

        $category = "";
        if ($subscription_service == "netflix" || $subscription_service == "primevideo" ||
            $subscription_service == "hotstar" || $subscription_service == "sonyliv") {

                $category = "streaming";
                
        } else if ($subscription_service == "udacity" || $subscription_service == "coursera" ||
                   $subscription_service == "upgrad" || $subscription_service == "edx" || $subscription_service == "byjus") {

                $category = "education";
            
        } else if ($subscription_service == "kindle" || $subscription_service == "adobe" || $subscription_service == "canva") {

                $category = "producitivity";
            
        } else if ($subscription_service == "businessinsider" || $subscription_service == "NYT" || 
                   $subscription_service == "indiatoday" || $subscription_service == "magzter" || $subscription_service == "mint") {

                $category = "magazines";
        
        } else if ($subscription_service == "spotify" || $subscription_service == "primemusic" || $subscription_service == "gaana" ||
                   $subscription_service == "saavn") {

                $category = "music";
        
        }  

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

            $query = "CREATE TABLE IF NOT EXISTS subscriptions 
                    (id INT(3) AUTO_INCREMENT PRIMARY KEY, 
                    username VARCHAR(20), 
                    subscription_service VARCHAR(30), 
                    subscription_cost INT(6),
                    billing_cycle VARCHAR(10),
                    subscription_username VARCHAR(20),
                    subscription_password VARCHAR(30),
                    category VARCHAR(30),
                    num_users_sharing INT(10))";

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

                $query2 = "INSERT INTO subscriptions (username, subscription_service, subscription_cost, billing_cycle,  subscription_username, subscription_password, category, num_users_sharing)
                VALUES ('$username' , '$subscription_service' , $subscription_cost, '$billing_cycle' , '$subscription_username', '$subscription_password', '$category', 0)";

                if (!(mysqli_query($connection, $query2))) {

                    echo "
                        <div class='container' id='red'>
                            
                            <div>
                                <h1>Something went wrong :(</h1>
                                    <p>
                                        Error inserting values into table. <br />
                                        ".mysqli_error($connection)."
                                    </p>
                            </div>
                            
                        </div>";

                } else {

                    echo "
                        <div class='container' id='green'>
                            
                            <div>
                                <h1>Added Succesfully!</h1>
                                    <p>
                                        Redirecting...
                                    </p>
                            </div>
                            
                        </div>";


                    // header('Location:home_page.php');
                    header("refresh:3; url=home_page.php");

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

    ?>

</body>

</html>