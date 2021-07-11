file 6

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel='stylesheet' href='homepage.css'>
    <link rel='stylesheet' href='results.css'>
    <script src='jquery-3.6.0.min.js'></script>
</head>

<body>

       <?php
          session_start();

          $searchVal = $_GET["search"];

       ?>
    </div>

    <form action="payment.php" method="POST">
    <div class="card-container">

        <?php

            include "config.php";

            $name=$_SESSION["username"];
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

                $query= "SELECT * FROM subscriptions WHERE subscription_service='$searchVal'";

                if (!($result = mysqli_query($connection, $query))) {

                    echo "
                    <div class='container' id='red'>
                
                        <div>
                            <h1>Something went wrong :(</h1>
                
                            <p>
                                Error retreiving data. <br />
                                ".$connection->error."
                            </p>
                        </div>
                
                    </div>";

                } else {

                     echo "
                         <div class='navbar'>
                          <div class='brand'>
                             AVAILABLE SUBSCRIPTIONS
                          </div>
                         <div class='navitems'>
                             <a href='home_page.php'>Home</a>
                             <a href='#'></a>
                             <a href='#'></a>
                         </div>
                         </div>
                         <br>
                         <br>";
                    
                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    $i=0;

                    $un=array([]);
                    $sn=array([]);
                    $sp=array([]);
                    $sc=array([]);
                    $ss=array([]);
                    $bc=array([]);
                    $nu=array([]);

                    if(count($result) == 0)
                    {
                        echo "<br><br>▶ NO SUBSCRIPTIONS CURRENTLY AVAILABLE :(";
                    }

                    else{

                    foreach($result as $array){ 

                    if($array['username'] != $name){


                        $array['subscription_cost'] /= ($array['num_users_sharing']+2);

                        $array['subscription_cost'] = round($array['subscription_cost']);

                        

                    echo "

                     <div class='content'>

                        <div class='sub' style='display: block;'>
                            <div class='list-card' style='float: left;'>

                                <div class='img'>
                                    <img src='images/${searchVal}.jpg' class='card-img'>
                                </div>

                                <div class='info'>
                                    <span> ₹ ${array['subscription_cost']} </span>
                                    <button class='to-subscribe' id='to-subscribe$i' name='to-subscribe' value='$i'>&#9889; Buy</button>
                                </div>
                            </div>

                                <div style='float: left; margin: 10px; height: 350px;'>
                                    <ul>
                                        <li style='margin: 15px;'>USERNAME : ".$array['username']."</li>
                                        <li style='margin: 15px;'>COST OF SUBSCRIPTION : ".$array['subscription_cost']."</li>
                                        <li style='margin: 15px;'>VALIDITY : ".$array['billing_cycle']."</li>
                                        <li style='margin: 15px;'>NUMBER OF USERS SHARING : ".$array['num_users_sharing']."</li>
                                    </ul>
                                </div>

                            </div>
                              ";

                $_SESSION['uname'] = $array['username'];
                $_SESSION['subName'] = $array['subscription_username'];
                $_SESSION['subPass'] = $array['subscription_password'];
                $_SESSION['subscription_service'] = $array['subscription_service'];
                $_SESSION['subscription_cost'] = $array['subscription_cost'];
                $_SESSION['billing_cycle'] = $array['billing_cycle'];
                $_SESSION['num_of_users']=$array['num_users_sharing'];
                array_push ($un , $array['username']);
                array_push ($sn , $array['subscription_username']);
                array_push ($sp , $array['subscription_password']);
                array_push ($ss , $array['subscription_service']);
                array_push ($sc , $array['subscription_cost']);
                array_push ($bc , $array['billing_cycle']);
                array_push ($nu , $array['num_users_sharing']);

                $i++;

                    } else {

                        echo "
                        <div class='content'>

                        <div class='list-card' style='float: left;'>
                            <div class='info'>

                        ⚡  AVAILABLE SUBSCRIPTION IS ALREADY SUBSCRIBED!

                        </div>
 
                         </div>
                        </div>";

                    }
                }
            }
        }



        

                $_SESSION['uname_arr'] = $un;
                $_SESSION['subName_arr'] = $sn;
                $_SESSION['subPass_arr'] = $sp;
                $_SESSION['subscription_service_arr'] = $ss;
                $_SESSION['subscription_cost_arr'] = $sc;
                $_SESSION['billing_cycle_arr'] = $bc;
                $_SESSION['num_of_users_arr']=$nu;
               
            }
            
            
        ?>

    </div>
    </form>

     <script>

        /* function copydetails(str){
            var x = str.charAt(str.length - 1);

            $_SESSION['subName'] =  $sn[$j];
            $_SESSION['subPass'] =  $sp[$j];
            $_SESSION['subscription_service'] =  $ss[$j];
            $_SESSION['subscription_cost'] =  $sc[$j];
            $_SESSION['billing_cycle'] =  $bc[$j];
            $_SESSION['num_of_users']= $nu[$j];
            
            location.href = 'payment.php';
            
         }*/

         var buttons = document.querySelectorAll(".to-subscribe");
         for (let btn of buttons) {

             btn.addEventListener("click", function () {
                 copydetails(elem.id);
            });
            
        }
     </script>

</body> 

</html>
