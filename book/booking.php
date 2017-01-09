<?php
session_start();
$user = "";
$logged = false;
if (isset($_SESSION['login_user'])){
    $user = $_SESSION['login_user'];
    $logged=true;
}
else{
    header ('location: ../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>

    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="../navbar.css">
    <script type="text/javascript" src="../incre.js"></script>
    <script>
        function calculate(chk_in,chk_out,one) {
            var from = chk_in.split(['/']);
            var to = chk_out.split(['/']);
            var days=0;
            //days = parseInt(from[1])-parseInt(to[1]);
            if (from[2] == to[2]){//same year
                if (from[0]==to[0]){//same month
                    days = parseInt(to[1])-parseInt(from[1]);
                }
                else{//diff month
                    days = 30-parseInt(from[1]);
                    days = days+parseInt(to[1]);
                }
                }
            document.getElementById("days").value = days;
            document.getElementById("rent").value = days*one;
        }
    </script>
</head>
<body onload="calculate('<?= $_GET['chkin']?>','<?= $_GET['chkout']?>','<?= $_GET['rent']?>')">
<div class="menu">
    <a href="../home%20page/page1.html" class="navbar-brand"><img src="../images/logo.png" alt="logo"></a>
    <nav class="navbar">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="../home%20page/page1.php">Home</a></li>
            <li class="active"><a href="../hotel/hotel.php">Hotels</a></li>
            <li><a href="../location/location.php">Discover</a></li>
            <li><a href="../guides/guides.php">Guides</a></li>
            <li><a href="../gallery/gallery.php">Gallery</a></li>
            <li><a href="../special%20occasions/page3.php">Special events</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php
            if (!$logged) {
                ?>
                <li><a href="../login/login.php">Login</a></li>
                <?php
            }else {
                ?>
                <li><a href="../user%20panel/user.php?v_id=<?= $_SESSION['id']?>"><?= $user?></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>
<div class="col-md-2"></div>
<?php
require ('../projectdb.php');
if (isset($_GET['sub'])) {
    ?>
    <?php
    $name= $email=$id="";
    if ($logged){
        $query = "select * from signup where v_id=".$_SESSION['id'];
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $name = $row['Name'];
        $email = $row['Email'];
        $id = $row['v_id'];
    }
    ?>
    <div class="col-md-8 form">
        <form action="insert.php" method="get">
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Name:</label>
                <div class="col-xs-4"><input type="text" class="form-control" name="first" placeholder="First name" value="<?=$name?>" readonly>
                </div>
                <div class="col-xs-4"><input type="text" class="form-control" name="last" placeholder="Last name"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Email:</label>
                <div class="col-xs-8">
                    <input  class="form-control" type="email" name="email" placeholder="abc@abc.com" value="<?=$email?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Address:</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control"  name="add" placeholder="abc@abc.com">
                </div>
            </div>

            <hr>
            <fieldset>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Adults:</label>
                <div class="col-xs-8 input-group">
                    <input type="text" class="form-control" name="adults" id='adult' value="<?php echo $_GET['adult']?>">
                    <span class="input-group-addon"><a class="btn btn-sm" onclick="inc('adult')"><span class="glyphicon glyphicon-plus"></span></a></span>
                    <span class="input-group-addon"><a class="btn btn-sm" onclick="dec('adult')"><span class="glyphicon glyphicon-minus"></span></a></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Children:</label>
                <div class="col-xs-8 input-group">
                    <input type="text" class="form-control" name="child" id="child" value="<?php echo $_GET['child']?>">
                    <span class="input-group-addon"><a class="btn btn-sm" onclick="inc('child')"><span class="glyphicon glyphicon-plus"></span></a></span>
                    <span class="input-group-addon"><a class="btn btn-sm" onclick="dec('child')"><span class="glyphicon glyphicon-minus"></span></a></span>
                </div>
            </div>

            <hr>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Checkin Date:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="chkin" value="<?php echo $_GET['chkin']?>"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Checkout Date:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="chkout" value="<?php echo $_GET['chkout']?>"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Total days:</label>
                <div class="col-xs-8"><input type="text" class="form-control" id="days" placeholder="2"> </div>
            </div>

            <hr>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Hotel name:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="hotel" value="<?php echo $_GET['hotel']?>"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Room name:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="room" value="<?php echo $_GET['room']?>"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Rent per day:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="rentone" value="<?php echo $_GET['rent']?>"></div>
            </div>

            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Total rent:</label>
                <div class="col-xs-8"><input type="text" class="form-control" name="rent" id="rent"></div>
            </div>
            </fieldset>
            <hr>
            <div class="form-group row">
                <label class="col-xs-4 col-form-label">Guide name:</label>
                <div class="col-xs-8">
                        <?php
                        if (isset($_GET['guide'])){?>
                            <input type="text" class="form-control" name="guide" value="<?php echo $_GET['guide']?>" readonly>
                        <?php
                        }else {
                            ?>
                    <div class="input-group">
                            <input type="text" class="form-control" name="guide" placeholder="abc" readonly>
                            <span class="input-group-addon"><a href="../guides/guides.php" class="btn btn-default btn-sm">Select a guide</a></span>
                    </div>
                            <?php
                        }
                        ?>
                </div>
            </div>

            <hr>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button class="btn btn-default">Change Details</button>
            <button class="btn btn-default" type="submit">Confirm Details</button>
        </form>
    </div>
    <?php
}
?>
<div class="col-md-2"></div>
</body>
</html>
