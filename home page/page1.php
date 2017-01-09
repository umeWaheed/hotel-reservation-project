<?php
session_start();
$user = "";
if (isset($_SESSION['login_user'])){
    $user = $_SESSION['login_user'];
    $id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <!--jQuery-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!--Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">
    <script type="text/javascript" src="../incre.js"></script>

    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="pg1.css">
    <script>
        $(document).ready(function(){
            var date_input=$('input[id="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true
            })
        });

        function validate()
        {
            var x = document.forms["myform"]["chkin"].value;
            var y = document.forms["myform"]["chkout"].value;
            var error1 = chkDate(x,"chkin");
            var error2 = chkDate(y,"chkout");
            var error3 = checkout(x,y);

            if (error1!="" || error2!="" || error3!=""){
              // alert ('some fields are incorrectly filled');
                return false;
            }
                return true;
        }

        function chkDate(date,id){
           // var x = document.forms["myform"]["chkin"].value;
            var error = "";
            if (date == ""){
                error =  'fill out date';
                //alert (id);
                //return error;
            }
            else {
                var entered = date.split(['/']);
                var today = new Date();
                var dd = today.getDate();
                var m = today.getMonth() + 1; //january is 0
                var y = today.getFullYear();

                if (entered[2]==y) { //if year is same check month
                    if (entered[0] == m) { // if month is same check date
                        if (entered[1]<dd) { //if selected date is < current date, error
                            error = 'invalid date';
                        }
                    }
                    else if (entered[1]<m){
                        error = 'invalid date';
                    }
                }
                else if (entered[2]<y) {
                    error = 'invalid date';
                }
            }
            if(error !=""){
                document.getElementById(id).innerHTML = 'Invalid Date';
                document.getElementById(id).style.color = 'goldenrod';
            }
            else{
                document.getElementById(id).innerHTML = '';
            }
            return error;
        }

        function checkout(from,to){
            to = to.split(['/']);
            from = from.split(['/']);
            var error = "";
            if (from[2]==to[2]) { //if year is same check month
                if (from[0] == to[0]) { // if month is same check date
                    if (from[1] > to[1]) { //if selected date is < current date, error
                        error = 'invalid date';
                    }
                }
                else if (from[0] > to[0]){
                    error = 'invalid date';
                }
            }
            else if (from[2]>to[2]) {
                error = 'invalid date';
            }
            return error;
        }
    </script>
</head>
<body>
<div class="container-fluid">

    <form action="../room%20description/page2.php" method="get" name="myform" onsubmit="return validate();">
    <div class="row">
        <div class="head col-md-8">
            <div class="title">
                <a href="page1.html"><img src="../images/logo.png" alt="logo"></a>
            </div>

            <div class="menu">
                <ul class="#">
                    <li><a href="page1.php">Home</a></li>
                    <li><a href="../hotel/hotel.php">Hotels</a></li>
                    <li><a href="../location/location.php">Discover</a></li>
                    <li><a href="../guides/guides.php">Guides</a></li>
                    <li><a href="../gallery/gallery.php">Gallery</a></li>
                    <li><a href="../special%20occasions/page3.php">Special events</a></li>
                </ul>
            </div>

            <div class="book row">
                <div class="col-md-3">
                    <h3>From</h3>
                    <input type="text" id="date" name="chkin" class="form-control" placeholder="check-in">
                    <span id="chkin"></span>
                </div>

                <div class="col-md-3">
                    <h3>To</h3>
                    <input type="text" id="date" name="chkout" class="form-control" placeholder="check-out">
                    <span id="chkout"></span>
                </div>

                <div class="col-md-3">
                    <h3>With</h3>
                        <label for="adults">Adults</label>
                        <div class="input-group">
                            <input id="adults" type="text" class="form-control" value="2" name="adult">
                            <span class="input-group-addon"><a class="btn btn-sm" onclick="inc('adults')"><span class="glyphicon glyphicon-plus"></span></a></span>
                            <span class="input-group-addon"><a class="btn btn-sm" onclick="dec('adults')"><span class="glyphicon glyphicon-minus"></span></a></span>
                        </div>
                        <label for="child">Children</label>
                        <div class="input-group">
                            <input id="child" type="text" class="form-control" value="0" name="child">
                            <span class="input-group-addon"><a class="btn btn-sm" onclick="inc('child')"><span class="glyphicon glyphicon-plus"></span></a></span>
                            <span class="input-group-addon"><a class="btn btn-sm" onclick="dec('child')"><span class="glyphicon glyphicon-minus"></span></a></span>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>
        <div class="col-md-2 login navbar">
            <ul class="nav navbar-right navbar-nav">
                <?php
                 if (!isset($_SESSION['login_user'])) {
                     ?>
                     <li><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                     <?php
                 }
                 else {
                     ?>
                     <li title="panel"><a href="../user%20panel/user.php?v_id=<?= $_SESSION['id']?>"><span class="glyphicon glyphicon-log-in"></span>Hello, <?= $user ?></a></li>
                     <?php
                 }
                ?>
                <li><a href="#cont">Contact us</a></li>
            </ul>
        </div>

    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <input class="sub-btn col-md-2" type="submit" value="Get my Plan" name="get">
        <div class="col-md-8"></div>
    </div>
    </form>

    <div class="row hot">
        <p>Get the best hotels in town
            <span>
                    <button class="sub-btn" onclick="location.href='../hotel/hotel.php'">View Hotels</button>
                </span></p>
    </div>

    <div class="row contact" id="cont">
        <div class="col-md-5 address">
            <h3>Contact us</h3>
            <address>
                500 ABC Street <br>
                Lahore, Pakistan 54000 <br>
                info@ciitlahore.edu.pk <br>
                Tel: 123-456-7890 <br>
                Fax: 123-456-7890 <br>
                &copy; 2016 by u.s
            </address>
        </div>

        <?php
        $err = "";
        if (isset($_POST['feed'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sub = $_POST['subject'];
            $msg = $_POST['msg'];

            if (!preg_match("/^[a-zA-Z0-9\.\-\_]*@[a-z]*\.[a-z]*$/",$email) || empty($email)){
                $err = "invalid email format";
            }
        }
        ?>

        <div class="col-md-7">
            <form action="page1.php" class="feedback" method="post" onsubmit="return validate();" name="form">
                <div class="col-md-4">
                    <input type="text" placeholder="Name" class="form-control" name="name"><br>
                    <input type="text" placeholder="Email" class="form-control" name="email" id="email"><span><?= $err ?></span><br>
                    <input type="text" placeholder="Subject" class="form-control" name="subject"><br>
                </div>
                <div class="col-md-6">
                    <textarea name="msg" id="msg" cols="40" rows="6" class="form-control" placeholder="Your Message Here"></textarea>
                </div>
                <div class="col-md-2"><input class="btn btn-sm btn-primary" value="Send" type="submit" name="feed"></div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <ul class="social">
                <li><a href="http://www.facebook.com"><img src="../images/fb.png" alt="fb"></a></li>
                <li><a href="http://www.twitter.com"><img src="../images/twitter.png" alt="twitter"></a></li>
                <li><a href="http://www.plus.google.com"><img src="../images/g+.png" alt="google+"></a></li>
                <li><a href="http://www.pintrest.com"><img src="../images/pin.png" alt="pintrest"></a></li>
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>
</body>
</html>