<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <!-- <link rel='stylesheet' href='homepage.css'> -->
    <link rel='stylesheet' href='../css/results.css'>
    <script src='jquery-3.6.0.min.js'></script>
</head>

<body>

    <button id="back">Back</button>

    <div class="topbar">
        <h1>Showing available
            <?php
           session_start();

           $searchVal = $_GET["search"];

           echo $searchVal;
        ?>
            subscriptions
        </h1>

    </div>

    <div class="unavailable-container">

    </div>
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

                    $create = "CREATE TABLE IF NOT EXISTS subscriptions 
                    (id INT(3) AUTO_INCREMENT PRIMARY KEY, 
                    username VARCHAR(20), 
                    subscription_service VARCHAR(30), 
                    subscription_cost INT(6),
                    billing_cycle VARCHAR(10),
                    subscription_username VARCHAR(20),
                    subscription_password VARCHAR(30),
                    category VARCHAR(30),
                    num_users_sharing INT(10))";

                    mysqli_query($connection, $create);


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

                     // echo "
                     //     <div class='navbar'>
                     //      <div class='brand'>
                     //         AVAILABLE SUBSCRIPTIONS
                     //      </div>
                     //     <div class='navitems'>
                     //         <a href='add_subscriptions.php'>Add Subscription</a>
                     //         <a href='profilepage.php'>Profile</a>
                     //         <a href='home_page.php'>Home</a>
                     //     </div>
                     //     </div>
                     //     <br>
                     //     <br>";

                     $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                     $i=0;

                     $un=array([]);
                     $sn=array([]);
                     $sp=array([]);
                     $sc=array([]);
                     $ss=array([]);
                     $bc=array([]);
                     $nu=array([]);

                     if(count($result) == 0) {

                        // echo "Sorry!NO SUBSCRIPTIONS CURRENTLY AVAILABLE :(";

                        // echo "
                        // <div class='container' id='red'>
        
                        //     <div>
                        //         <h1>Sorry :(</h1>
                        //         <p>
                        //             There are no subscriptions available currently for sharing!
                        //             <br><br>
                        //             Why don't you subscribe to a new one from the official provider and share it with the world?
                        //             <br>
                        //             Both you, and others who share the subscription with you get it at a lower cost!
                        //         </p>
                        //     </div>
        
                        // </div>
                        // ";
                        echo "
                            <script>
                            document.querySelector('.unavailable-container').innerHTML = `
                            <div class='container' id='red'>
                            
                                <div>
                                    <h1>Sorry :(</h1>
                                    <p>
                                        There are no subscriptions available currently for sharing!
                                        <br><br>
                                        Why don't you subscribe to a new one from the official provider and share it with the world?
                                        <br>
                                        Both you, and others who share the subscription with you get it at a lower cost!
                                    </p>
                                </div>
                    
                            </div>`;
                            </script>
                        ";

                        echo "
                            <div class='list-card'>

                                <div class='img'>
                                    <img src='../images/${searchVal}.jpg' class='card-img'>
                                </div>

                                <div class='userInfo'>
                                posted by ".$searchVal."
                                </div>

                                <div class='info'>
                                    <button class='buy-new' >&#9889; Check It Out</button>
                                </div>
                            </div>
                        ";

                     } else {
                        echo "<form action='payment.php' method='POST'>";

                     foreach($result as $array){

                     // echo $array['username']." ";
                     // echo $array['subscription_service']." ";
                     // echo $array['subscription_cost']." ";
                     // echo $array['billing_cycle']." ";
                     // echo $array['num_users_sharing']." ";


                     //    Add cards here, data requrired has been stored in the above variables,
                     //    loops through each query result to find the subscrition that was searched for

                     $postedBy =  $array['username'];

                        if( ($array['username'] != $name) and ($array['num_users_sharing'] < 4) ) {
                            $array['subscription_cost'] /= ($array['num_users_sharing']+2);


                        echo "
                                <div class='list-card'>

                                    <div class='img'>
                                        <img src='../images/${searchVal}.jpg' class='card-img'>
                                    </div>

                                    <div class='userInfo'>
                                        posted by $postedBy
                                    </div>

                                    <div class='info'>
                                        <span> ₹ ${array['subscription_cost']} </span>
                                        <button class='to-subscribe' id='to-subscribe$i' name='to-subscribe' value='$i'>&#9889; Buy</button>
                                    </div>

                                </div>


                            <script>

                                var next = document.getElementById('to-subscribe$i');
                                next.addEventListener('click', function () {
                                    location.href = 'payment.php';
                                });
                            </script>
                            ";
                                
                            $_SESSION['uname'] = $array['username'];
                            $_SESSION['subName'] = $array['subscription_username'];
                            $_SESSION['subPass'] = $array['subscription_password'];
                            $_SESSION['subscription_service'] = $array['subscription_service'];
                            $_SESSION['subscription_cost'] = $array['subscription_cost'];
                            $_SESSION['billing_cycle'] = $array['billing_cycle'];
                            $_SESSION['num_of_users']=$array['num_users_sharing'];
            
                            array_push($un , $array['username']);
                            array_push($sn , $array['subscription_username']);
                            array_push($sp , $array['subscription_password']);
                            array_push($ss , $array['subscription_service']);
                            array_push($sc , $array['subscription_cost']);
                            array_push($bc , $array['billing_cycle']);
                            array_push($nu , $array['num_users_sharing']);
            
                            $i++;

                            } else {

                                echo "
                                <div class='list-card'>

                                    <div class='img'>
                                        <img src='../images/${searchVal}.jpg' class='card-img'>
                                    </div>

                                    <div class='userInfo'>
                                        posted by $postedBy
                                    </div>

                                    <div class='info'>
                                        <span> &#9889; Already Subscribed</span>

                                    </div>

                                </div>";


                            }

                     }
                     echo "</form>";
                 }

                 }

                //  $_SESSION['subscription_service']= $result['subscription_service'];

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
    
    <script>
        const backBtn = document.querySelector("#back");
        backBtn.addEventListener("click", () => {
            window.location.href = "home_page.php";
        });


        const currentPage = '<?php echo $searchVal; ?>';
        try {
            const unavailableBtn = document.querySelector(".buy-new");
            unavailableBtn.addEventListener("click", () => {

                switch (currentPage) {
                    case "netflix":
                        window.open('https://www.netflix.com/signup', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "primevideo":
                        window.open('https://www.amazon.in/amazonprime', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "hotstar":
                        window.open('https://www.hotstar.com/in/subscribe/get-started', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "sonyliv":
                        window.open('https://www.sonyliv.com/subscription', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "kindle":
                        window.open('https://www.amazon.in/kindle-dbs/hz/subscribe/ku?shoppingPortalEnabled=true', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "adobe":
                        window.open('https://www.adobe.com/in/creativecloud/plans.html', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "canva":
                        window.open('https://www.canva.com/en_in/pricing/', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "udacity":
                        window.open('https://www.udacity.com/', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "coursera":
                        window.open('https://www.coursera.org/courseraplus', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "upgrad":
                        window.open('https://www.upgrad.com/', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "edx":
                        window.open('https://www.edx.org/?hs-referral=B2B-Nav', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "byjus":
                        window.open('https://shop.byjus.com/', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "businessinsider":
                        window.open('https://www.businessinsider.com/subscription?IR=T', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "NYT":
                        window.open('https://www.nytimes.com/subscription', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "indiatoday":
                        window.open('https://subscriptions.intoday.in/indiatoday?utm_source=ITHomepage', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "magzter":
                        window.open('https://www.magzter.com/magztergold', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "mint":
                        window.open('', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "gaana":
                        window.open('https://gaana.com/subscribe/buy-gaana-plus', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "spotify":
                        window.open('https://www.spotify.com/in-en/premium/', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "primemusic":
                        window.open('https://www.amazon.in/music/prime', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "saavn":
                        window.open('https://www.jiosaavn.com/pro/?_marker=0', '_blank');
                        window.location.href = "home_page.php";
                        break;
                    case "":
                        window.open('', '_blank');
                        window.location.href = "home_page.php";
                        break;
                }


            });

        } catch (e) {
            console.log(e);
        }
  

        // function copydetails(str) {  

        //     var x = str.charAt(str.length - 1);

        //     $_SESSION['subName'] =  $sn[$j];
        //     $_SESSION['subPass'] =  $sp[$j];
        //     $_SESSION['subscription_service'] =  $ss[$j];
        //     $_SESSION['subscription_cost'] =  $sc[$j];
        //     $_SESSION['billing_cycle'] =  $bc[$j];
        //     $_SESSION['num_of_users']= $nu[$j];
            
        //     location.href = 'payment.php';
            
        //  }

        // var buttons = document.querySelectorAll(".to-subscribe");
        // for (let btn of buttons) {

        //         btn.addEventListener("click", function () {
        //             copydetails(elem.id);
        //         });

        // }

    </script>

</body>

</html>
