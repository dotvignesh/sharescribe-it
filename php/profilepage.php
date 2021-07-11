<!-- file 7 -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/profilepage.css">
</head>

<body>

    <?php
            session_start();

            $this_id = $_SESSION['id'];
            $name=$_SESSION["username"];
            $assoc_users = '';
            include "config.php";
            $connection = mysqli_connect($server, $dbUser, $dbPassword, $db);
        ?>

    <div class="navbar">

        <div class="brand">
            Subscription Sharing
        </div>

        <div class="navitems">
            <a href="add_subscriptions.php">Add Subscription</a>
            <a href="profilepage.php" class="active">Profile</a>
            <a href="home_page.php">Home</a>
        </div>

    </div>

    <br>
    <br>
    <div class="container" style="align-items:center;">
        <div style="margin-left:100px;">
            <?php 

            echo "Name : ".$name;
            echo "<br>";
            echo "<br>";
            $sql1="SELECT * FROM user_preferences WHERE username='$name'";
            $res=mysqli_query($connection,$sql1);
            $row=mysqli_fetch_assoc($res);
            $interests=$row["interests"];
            $interests=str_replace(","," , ",$interests);
            $interests=substr($interests,0,strrpos($interests,','));
            $subscriptions="";
            $num_accounts_shared=0;
            $num_users_shared=0;
            $icost = 0;
            $rcost = 0;

            echo "Interests : ".$interests; 

            $sql2="SELECT * FROM subscriptions WHERE username='$name'";
            $res1=mysqli_query($connection,$sql2);

             if( $res1 === false){

                 echo " ";
             }
             else {

                while($row1 = mysqli_fetch_assoc($res1)){

                $subscriptions=$subscriptions.$row1["subscription_service"];
                $subscriptions.=" , ";
                $num_users_shared += $row1["num_users_sharing"];
                $num_accounts_shared++;
                $icost += $row1['subscription_cost'];
                for($i = 1 ; $i <= $row1["num_users_sharing"] ; $i++){
                    $rcost += $row1['subscription_cost']/($i+1);
                }
            }
            $rcost = round($icost - $rcost);
            if($rcost < 0){
                $rcost = -$rcost;
                $rcost = "Nil and earning $rcost";
            }
            $subscriptions=substr($subscriptions,0,strrpos($subscriptions,','));
            echo "<br>";
            echo "<br>";
            ?>

            <button onclick="location.href='updatepreferences.php'" style="width:50%;"> Change Interests </button>


            <?php

            include('config.php');

            $connect = mysqli_connect($server, $dbUser, $dbPassword, $db);

            if(!$connect){

                //fill in later
            } else {

                $get_users = 'SELECT id, sharescription_ids FROM users';

                $result = mysqli_query($connect, $get_users);

                if(!$result){

                    //fill in later
                }else{

                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    $assoc_users = " ";

                    foreach($result as $row){

                        $sharescription_ids = explode(',',$row['sharescription_ids']);

                        foreach($sharescription_ids as $id){

                            if((int)$id == $this_id){

                    
                              $get_users = "SELECT username FROM users 
                              WHERE id = ${row['id']}";

                              $result = mysqli_query($connect, $get_users);

                              $users = mysqli_fetch_array($result, MYSQLI_NUM);

                              $assoc_users .= $users[0].", ";

                            }
                         }
                    }

                }
                $assoc_users = substr($assoc_users, 0, strlen($assoc_users)-2);

            }
        }
            ?>
            <?php
            echo "<br>";
            echo "<br>";
            echo"Subscriptions owned : ".$subscriptions; 
            echo "<br>";
            echo "<br>";
            echo"Number of people sharing your subscriptions : $num_users_shared"; 
            echo "<br>";
            echo "<br>";
            echo"Number of accounts shared : $num_accounts_shared";
            echo "<br>";
            echo "<br>";
            echo"List of associated users : ".$assoc_users;
            echo "<br>";
            echo "<br>";

            $connect = mysqli_connect($server, $dbUser, $dbPassword, $db);

            $if_one_user = mysqli_query($connect, 'SELECT * FROM users');
            if(mysqli_num_rows($if_one_user) === 1){
            }
            else{
                
            echo"Initial amount spent on subscriptions : ₹$icost";
            echo "<br>";
            echo "<br>";
            echo"Current amount spent on subscriptions : ₹$rcost";
        }

            //declaring session variables
            $_SESSION['currentspend'] = $rcost;
            ?>
        </div>
    </div>
    <div>
        <button type='button' onclick='logout()' class='logout'>LOG OUT</button>
    </div>
    <script>
        function logout() {
            
            window.location.href = '../index.html';
        }
        
    </script>
</body>

</html>

