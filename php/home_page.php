<!-- file 5 -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="jquery-3.6.0.min.js"></script>
    <title>Home page</title>
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <?php
            session_start();

            include "config.php";

            $connection = mysqli_connect($server, $dbUser, $dbPassword, $db);

            $name=$_SESSION["username"];

            $get_id = "SELECT id FROM users WHERE username = '$name'";

            $result = mysqli_query($connection, $get_id);
            $result_arr = mysqli_fetch_array($result, MYSQLI_NUM);

            $_SESSION['id'] = $result_arr[0];
            
            
            $sql1= "SELECT * FROM user_preferences WHERE username='$name'";

            $res=mysqli_query($connection,$sql1);
            if(!$res){

                header('Location: preferences.php');
            }
    
            $row=mysqli_fetch_assoc($res);

            $interests=$row["interests"];
            // $interests=$_SESSION["interests"];
            $current_spend=$row["current_spend"];

            $arr=explode(",",$interests);

            $arr1="";
            $arr2="";
            $arr3="";
            $arr4="";
            $arr5="";

            for($i=0 ; $i < count($arr) ; $i++){

                if($i==0) {
                    $arr1=$arr[$i];
                }

                if($i==1) {
                    $arr2=$arr[$i];
                }

                if($i==2) {
                    $arr3=$arr[$i];
                }

                if($i==3) {
                    $arr4=$arr[$i];
                }

                if($i==4) {
                    $arr5=$arr[$i];
                }

            }
        ?>


    <div class="navbar">
            
        <div class="brand">
            Subscription Sharing
        </div>

        <div class="navitems">
            <a href="add_subscriptions.php">Add Subscription</a>
            <a href="profilepage.php">Profile</a>
            <a href="#home" class="active">Home</a>
        </div>

    </div>

    <div class="content">
        <span class="title streaming">Popular stuff from Streaming</span>
        <div class="opt-container streaming mt" id="abc">

            <div class="fl">
                <div class="opt" id="netflix">
                    <img src="../images/netflix.jpg" alt="netflix pic" class="res">
                </div>
            </div>

            <div class="fl">
                <div class="opt" id="primevideo">
                    <img src="../images/primevideo.jpg" alt="prime pic" class="res">
                </div>
            </div>

            <div class="fl">
                <div class="opt" id="hotstar">
                    <img src="../images/hotstar.jpg" alt="hotstar pic" class="res">
                </div>
            </div>

            <div class="fl">
                <div class="opt" id="sonyliv">
                    <img src="../images/sonyliv.jpg" alt="sonyliv pic" class="res">
                </div>
            </div>

        </div>


        <div class="mt">
            <span class="title productivity">Popular stuff from Productivity</span>
            <div class="opt-container productivity mt">

                <div class="fl">
                    <div id="kindle" class="opt">
                        <img src="../images/kindle.jpg" alt="kindle pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="adobe" class="opt">
                        <img src="../images/adobe.jpg  " alt="adobe pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="canva" class="opt">
                        <img src="../images/canva.jpg" alt="canva pic" class="res">
                    </div>
                </div>

            </div>
        </div>

        <div class="mt">
            <span class="title education">Popular stuff from Education</span>
            <div class="opt-container education mt">

                <div class="fl">
                    <div id="udacity" class="opt">
                        <img src="../images/udacity.jpg" alt="udacity pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="coursera" class="opt">
                        <img src="../images/coursera.jpg" alt="coursera pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="upgrad" class="opt">
                        <img src="../images/upgrad.jpg" alt="upgrad pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="edx" class="opt">
                        <img src="../images/edx.jpg" alt="edx pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="byjus" class="opt">
                        <img src="../images/byjus.jpg" alt="byjus pic" class="res">
                    </div>
                </div>

            </div>
        </div>

        <div class="mt">
            <span class="title magazines">Popular stuff from Magazines and Newsletters</span>
            <div class="opt-container magazines mt">

                <div class="fl">
                    <div id="businessinsider" class="opt">
                        <img src="../images/businessinsider.jpg" alt="businessinsider pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="NYT" class="opt">
                        <img src="../images/NYT.jpg" alt="NYT pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="indiatoday" class="opt">
                        <img src="../images/indiatoday.jpg" alt="indiatoday pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="magzter" class="opt">
                        <img src="../images/magzter.jpg" alt="magzter pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="mint" class="opt">
                        <img src="../images/mint.jpg" alt="mint pic" class="res">
                    </div>
                </div>

            </div>
        </div>

        <div class="mt">
            <span class="title music mt">Popular stuff from Music</span>
            <div class="opt-container music mt">

                <div class="fl">
                    <div id="gaana" class="opt">
                        <img src="../images/gaana.jpg" alt="gaana pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="spotify" class="opt">
                        <img src="../images/spotify.jpg" alt="spotify pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="primemusic" class="opt">
                        <img src="../images/primemusic.jpg" alt="primemusic pic" class="res">
                    </div>
                </div>

                <div class="fl">
                    <div id="saavn" class="opt">
                        <img src="../images/saavn.jpg" alt="saavn pic" class="res">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <br>
    <!-- <div class="title" style="text-align: center;">End of page</div> -->
    <footer class="mt">
        <div>
            Do follow us on &nbsp; &nbsp;
            <a href="https://www.facebook.com" class="fa fa-facebook"></a>
            &nbsp;
            <a href="https://www.twitter.com" class="fa fa-twitter"></a>
            &nbsp;
            <a href="https://www.LinkedIn.com" class="fa fa-linkedin"></a>
        </div>
    </footer>

    <script src="details.js"></script>

    <script>

        var service = document.querySelectorAll(".opt");
        for (let div of service) {

            div.addEventListener("click", function () {
                // console.log(div.id);
                window.location.href = `listings.php?search=${div.id}`;
                // this.parentNode.submit()
            });

        }

        // var buttons = document.querySelectorAll(".opt");
        var arrlist = ["streaming", "productivity", "education", "magazines", "music"];

        function dispdetails(str) {
            document.getElementById(str).innerHTML = ` 
                Description : ${descrip[str]}  Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ullam repellendus aliquam fugit, quas voluptatem excepturi rerum eos, neque delectus temporibus consequatur
                molestiae obcaecati aut nobis voluptatum eligendi fugiat! Deserunt, blanditiis.`;
        }

        function disporig(str) {
            var img_src = "images/" + str + ".jpg";
            document.getElementById(str).innerHTML = `<img src="${img_src}" alt="${str} pic" class="res" >`;
        }

        // for (let elem of buttons) {
        //     elem.addEventListener("mouseover", function () {
        //         dispdetails(elem.id);
        //     });
        // }

        // for (let elem of buttons) {
        //     elem.addEventListener("mouseout", function () {
        //         disporig(elem.id);
        //     });
        // }

        $(document).ready(function () {
            var c = [0, 0, 0, 0, 0];
            for (var i = 0; i < 5; i++) {
                if ("<?php echo $arr1?>" === arrlist[i]) {
                    c[i]++;
                }
                if ("<?php echo $arr2?>" === arrlist[i]) {
                    c[i]++;
                }
                if ("<?php echo $arr3?>" === arrlist[i]) {
                    c[i]++;
                }
                if ("<?php echo $arr4?>" === arrlist[i]) {
                    c[i]++;
                }
                if ("<?php echo $arr5?>" === arrlist[i]) {
                    c[i]++;
                }
                console.log(c);
            }
            if (c[0] == 0) {
                $(".streaming").hide();
            }
            if (c[1] == 0) {
                $(".productivity").hide();
            }
            if (c[2] == 0) {
                $(".education").hide();
            }
            if (c[3] == 0) {
                $(".magazines").hide();
            }
            if (c[4] == 0) {
                $(".music").hide();
            }
        });

    </script>
</body>

</html>
