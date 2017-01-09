<?php
session_start();
$user="";
$logged=false;
    if (isset($_SESSION['login_user'])){
        $user = $_SESSION['login_user'];
        $logged=true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room descrip</title>
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="pg2.css">
    <link rel="stylesheet" href="../navbar.css">
</head>
<body>

<?php
require ('../projectdb.php');
 if (isset($_GET['sub']))
 {

 }
?>

<div class="menu">
    <a href="../home%20page/page1.html" class="navbar-brand"><img src="../images/logo.png" alt="logo"></a>
    <nav class="navbar">
        <ul class="nav navbar-nav">
            <li><a href="../home%20page/page1.php">Home</a></li>
            <li class="active"><a href="../hotel/hotel.php">Hotels</a></li>
            <li><a href="../location/location.php">Discover</a></li>
            <li><a href="../guides/guides.php">Guides</a></li>
            <li><a href="../gallery/gallery.php">Gallery</a></li>
            <li><a href="../special%20occasions/page3.php">Special events</a></li>
        </ul>
    </nav>
</div>
<?php
if ($logged) {
    ?>
    <a href="../user%20panel/user.php?v_id=<?= $_SESSION['id'] ?>" title="details"><?= "Logged in as " . $user; ?></a>
    <?php
}
?>
<div class="row row1">
    <h2>Best Deals</h2>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel pnl">
            <div class="panel-heading">
                Filter by
            </div>
            <form action="page2.php" method="get">
            <div class="panel-body">
                <ul class="list-group">
                    <div class="list-group-item-heading">
                        Price
                    </div>
                    <li class="list-group-item">
                        <input type="checkbox" name="price" value="1">
                        Rs.0 to Rs 15,000
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="price" value="2">
                        Rs.15,500 to Rs 30,000
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="price" value="3">
                        Rs.30,500 to Rs 60,000
                    </li>

                </ul>

                <ul class="list-group">
                    <div class="list-group-item-heading">
                        Facilities
                    </div>
                    <li class="list-group-item">
                        <input type="checkbox" name="fac" value="1">
                        Breakfast
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="fac" value="2">
                        Gym
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="fac" value="3">
                        Free cancellation
                    </li>
                </ul>

                <ul class="list-group">
                    <div class="list-group-item-heading">
                        Reviews
                    </div>
                    <li class="list-group-item">
                        <input type="checkbox" name="rev" value="1">
                        Excellent
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rev" value="2">
                        Very Good
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rev" value="3">
                        Good
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rev" value="4">
                        Satisfactory
                    </li>
                </ul>

                <ul class="list-group">
                    <div class="list-group-item-heading">
                        Rating
                    </div>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="0">
                        No rating
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="5">
                        5 star
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="4">
                        4 star
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="3">
                        3 star
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="2">
                        3 star
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="rat" value="1">
                        1 star
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <input class="btn btn-primary" type="submit" value="Filter" name="sub">
            </div>
                </form>
        </div>
    </div>

    <div class="col-md-9 rooms">

        <?php
        if (isset($_GET['get'])) {
            $ad = $_GET['adult'];
            $ch = $_GET['child'];
            $query = "select * from hotel_room hr ,room r, hotel h where hr.r_id=r.r_id and 
r.adults>='$ad' and r.child>='$ch'and hr.h_id=h.h_id and r.adults>='$ad' and r.child>='$ch' order by hr.rent";
        $result = mysqli_query($conn, $query);
            if ($result=mysqli_query($conn, $query)){
                echo mysqli_error($conn);
            }
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="row r3">
                <div class="col-md-3">
                    <img src="../images/back.jpg" class="hotel-img" alt="#">
                </div>
                <div class="col-md-4">
                    <h3>
                        <?php
                        echo $row['h_name'];
                        ?>
                    </h3>
                    <div class="rating">
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        <span class="right">5 reviews</span>
                    </div>
                    <p><br>Room: <?php echo $row['r_name']?><br>
                    Adults: <?= $row['adults']?> &nbsp;&nbsp; Children: <?= $row['child']?></p>
                </div>
                <div class="col-md-3 price">
                    Rs. <?php
                    echo $row['rent'];
                    ?>
                </div>
                <div class="col-md-1 arrow">
                    <form action="../book/booking.php" method="get">
                        <input type="hidden" name="chkin" value="<?php echo $_GET['chkin']?>">
                        <input type="hidden" name="chkout" value="<?php echo $_GET['chkout']?>">
                        <input type="hidden" name="adult" value="<?php echo $_GET['adult']?>">
                        <input type="hidden" name="child" value="<?php echo $_GET['child']?>">
                        <input type="hidden" name="hotel" value="<?php echo $row['h_name']?>">
                        <input type="hidden" name="room" value="<?php echo $row['r_name']?>">
                        <input type="hidden" name="rent" value="<?php echo $row['rent']?>">
                        <?php if (!$logged){?>
                        <button type="button" name="sub" class="btn btn-success" onclick="login()">
                            <img src="../images/arrow.png" />
                        </button>
                        <?php
                        }else {
                            ?>
                            <button type="submit" name="sub" class="btn btn-success">
                                <img src="../images/arrow.png" />
                            </button>
                            <?php
                        }
                        ?>
                    </form>
                </div>
                <div>
,
                </div>
            </div>
            <hr>
            <?php
        }
        }
        ?>

        <ul class="pagination page">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
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
<script>
    function login(){
        alert('login to continue');
        window.location.href="../login/login.php";
    }
</script>
</body>
</html>