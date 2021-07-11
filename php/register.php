<!-- file 2 -->

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

        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $username = trim($username);
        $password = trim($password);

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        $connection = mysqli_connect($server, $dbUser, $dbPassword);

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

            $query = "CREATE DATABASE IF NOT EXISTS subscriptionApp";
            if (!(mysqli_query($connection, $query))) {

                echo "
                <div class='container' id='red'>
            
                    <div>
                        <h1>Something went wrong :(</h1>
            
                        <p>
                            Error creating database. <br />
                            ".$connection->error."
                        </p>
                    </div>
            
                </div>";

            } else {

                mysqli_select_db($connection, $db);

                $query2 = "CREATE TABLE IF NOT EXISTS users 
                (id INT(3) AUTO_INCREMENT PRIMARY KEY, 
                username VARCHAR(20) NOT NULL UNIQUE, 
                password VARCHAR(60) NOT NULL,
                sharescription_ids VARCHAR(60))";

                if (!(mysqli_query($connection, $query2))) {

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

                    $query3 = "INSERT INTO users (username, password, sharescription_ids) VALUES ('$username', '$password', '')";

                    if (!(mysqli_query($connection, $query3))) {

                        if (mysqli_errno($connection) === 1062) {

                            echo " 
                            <div class='container' id='red'>
                        
                                <div>
                                    <h1>Username already exists!</h1>
                        
                                    <p>
                                        Do you want to sign in instead? <br />
                                    </p>
                                </div>
                        
                            </div>
                            
                            <div>
                                <button id='btn'>Sign In</button>
                                <button id='back'>Go Back</button>
                            </div>
                            ";

                        } else {

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

                        }


                    } else {
                        
                        $get_id = mysqli_insert_id($connection);
                        
                        $_SESSION['id'] = $get_id;

                        // Change this file name i.e homepage.html to wherever you want to redirect it to
                        header('Location:preferences.php');

                    }

                }

            }

        }

    ?>


    <script>

        document.querySelector("#btn").onclick = () => {
            location.href = "signin.php";
        };

        document.querySelector("#back").onclick = () => {
            location.href = "../index.html";
        };

    </script>

</body>

</html>

