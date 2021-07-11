<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Profile Page</title>
        <link rel="stylesheet" href="../css/profilepage.css">
        <?php
            session_start();
            $name=$_SESSION["username"];
            include "config.php";
            $connection = mysqli_connect($server, $dbUser, $dbPassword, $db);
        ?>
        <style>
            td,th{
                padding:10px;
            }
            .sub-cnt{
                overflow-y:scroll;
                margin-left:100px; 
                height:400px;
            }
        </style>
    </head>
    <body>
        <div style="display:flex;"><button onclick="location.href='home_page.php'" style="width:10%;"> Back </button>
        <?php
        $sub=$_POST["sub"];
        ?>
        <h1 style="position:relative; left:10%;"> List of users with <?php echo $sub?> subscription </h1>
        </div>
        <br>
        <br>
        <div class="container" style="align-items:center;">
            <div class="sub-cnt">
                <table style="padding:10px;">
                    <tr>
                        <th colspan="3">
                        
                        </th>
                        <th colspan="8">
                        Username
                        </th>
                        <th colspan="5">
                        Original amount
                        </th>
                        <th colspan="5">
                        Amount after sharing
                        </th>
                        <th colspan="5">
                        
                        </th>
                    </tr>
                    <br>
                    <?php
                        $c=array([]);
                        $i=0;
                        $sql1="SELECT * FROM subscriptions WHERE subscription_service='$sub'";
                        $res=mysqli_query($connection,$sql1);
                        while( $row=mysqli_fetch_assoc($res) ){
                            $j=$i+1;
                            echo"<tr style='text-align:center;'>";
                            echo"<td colspan='3'>";
                            echo $j;
                            echo"</td>";
                            echo"<td colspan='8'>";
                            echo $row["username"];
                            echo"</td>";
                            echo"<td colspan='5'>";
                            echo $row["subscription_cost"];
                            echo"</td>";
                            echo"<td colspan='5'>";
                            echo $row["subscription_cost"] / ( $row["num_users_sharing"] + 2 );
                            echo"</td>";
                            echo"<td colspan='5'>";
                            echo "<button class='share' id='$i' style='width:100%;'> request share </button>";
                            echo"</td>";
                            echo"</tr>";
                            array_push($c,0);
                        }
                    ?>
                </table>
            </div>
        </div>
        <script>
            var arr=[];
            var len= <?php echo $i; ?>;
            for(let j=0;j<len;j++){
                arr.push(0);
            }
            console.log(arr);
            function fn(id){
                arr[id]++;
                if( ( arr[id] % 2 == 0 ) ) {
                    document.getElementById(id).innerHTML=`request share`;
                }
                else{
                    document.getElementById(id).innerHTML=`decline share request`;
                }
            }
            var buttons=document.querySelectorAll(".share");
            for(let elem of buttons){
                elem.addEventListener("click",function(){
                    fn(elem.id);
                });
            }
        </script>
    </body>
</html>