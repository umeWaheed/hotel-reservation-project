<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guides</title>

    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../room%20description/pg2.css">
    <link rel="stylesheet" href="g.css">
    <link rel="stylesheet" href="../navbar.css">

</head>
<body>
<div class="menu">
    <a href="../home%20page/page1.html" class="navbar-brand"><img src="../images/logo.png" alt="logo"></a>
    <nav class="navbar">
        <ul class="nav navbar-nav">
            <li><a href="../home%20page/page1.php">Home</a></li>
            <li><a href="../hotel/hotel.php">Hotels</a></li>
            <li><a href="../location/location.php">Discover</a></li>
            <li><a href="../guides/guides.php">Guides</a></li>
            <li><a href="../gallery/gallery.php">Gallery</a></li>
            <li><a href="../special%20occasions/page3.php">Special events</a></li>
        </ul>
    </nav>
</div>
<?php
require ('../projectdb.php');
$query = "select * from guide";
$result = mysqli_query ($conn,$query);
while ($row=mysqli_fetch_array($result)){
    ?>
<div class="top container">
    <div class="row r3 col-sm-12">
        <div class="col-md-3 col-sm-3">
            <img src="<?php echo $row['img']?>" class="hotel-img" alt="#">
        </div>
        <div class="col-md-4 col-sm4">
            <h3><?php echo $row['g_name']?></h3>
            <div class="rating">
                <span>Age: <?php echo $row['age']?> yrs</span>
                <span class="right">Experience: <?php echo $row['exp']?> yrs</span>
            </div>
            <p><br><?php echo $row['descrip']?></p>
        </div>
        <div class="col-md-3 col-sm-3 price">
            Book now
        </div>
        <div class="col-md-2 col-sm-2 arrow">
            <?php
            $prev = $_SERVER['HTTP_REFERER'];
            $required = "localhost/project/book/booking.php";
            ?>
            <a href="" id="<?= $row['g_id']?>" <?php if (strpos($prev,$required) != false){?>onclick="goback('<?= $row['g_name']?>',<?= $row['g_id']?>)" <?php }?>><img src="../images/arrow.png" alt="view"></a>
        </div>
        <div>

        </div>
    </div>
    </div>
    <?php
    }
    ?>

<div class="row">
    <div class="col-md-4 col-sm-4"></div>
    <div class="col-md-4 col-sm-4">
        <ul class="social">
            <li><a href="http://www.facebook.com"><img src="../images/fb.png" alt="fb"></a></li>
            <li><a href="http://www.twitter.com"><img src="../images/twitter.png" alt="twitter"></a></li>
            <li><a href="http://www.plus.google.com"><img src="../images/g+.png" alt="google+"></a></li>
            <li><a href="http://www.pintrest.com"><img src="../images/pin.png" alt="pintrest"></a></li>
        </ul>
    </div>
    <div class="col-md-4 col-sm-4"></div>
</div>
<script>
    function goback(name,id){
        var prev = document.referrer;
        var newone = prev+'&guide='+name;
        //alert ('previous; '+prev);
        //alert ('new: '+newone);
        document.getElementById(id).href = newone;
    }
</script>
</body>
</html>