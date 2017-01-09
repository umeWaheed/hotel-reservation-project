<!DOCTYPE html>
<html>
<head>
<title>Location</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap-theme.css">
    <link rel="stylesheet" href="loc.css">
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

<div class="row">
<div class="col-md-12">
    <div class="col-md-3 ">
        <div id="left1">
            <h1><img src="../images/final.png"></h1>
            <p>Check Out your favourite Spas,Restaurants and Locations</p>
        </div>
    </div>

    <div class="col-md-9">
        <div id="history">
            <img src="../images/his.jpg" >
            <p><h3>History</h3>When you observe the sprawling desert city packed with gleaming high-rise towers that Dubai has become today, it is hard to imagine that this monument to the modern world started out as a tiny fishing village. While the discovery of oil in the 1950s and 1960s was a turning point for Dubai's development, Dubai does, in fact, have a rich history that actually began centuries before.</p>
        </div>

<div id="map">
    <h3>Find us out</h3>
        <div id="googleMap" style="height:400px;width:100%;"></div>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            var myCenter = new google.maps.LatLng(25.2048, 55.2708);

            function initialize() {
                var mapProp = {
                    center:myCenter,
                    zoom:12,
                    scrollwheel:false,
                    draggable:false,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

                var marker = new google.maps.Marker({
                    position:myCenter,
                });

                marker.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
</div>
    </div>
</div>
    </div>

 <?php
    include ('../projectdb.php');
    $perpage = 3;

    if(isset($_GET["page"])){
        $page = intval($_GET["page"]);
    }
    else {
        $page = 1;
    }
    $calc = $perpage * $page;
    $start = $calc - $perpage;
    $result = mysqli_query($conn, "select * from  facility Limit $start, $perpage");

    $rows = mysqli_num_rows($result);

    if($rows){
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        ?>


    <div class="col-md-4 text-center portion1">
        <img src="<?php echo $row['path']?>" alt="Dubai">
        <a><h3><strong><?php echo $row['f_name']?></strong></h3></a>
</div>
		 <?php
    }
        }
        ?>

    <ul class="pagination page p1">
    <?php
    if(isset($page))
    {
        $result = mysqli_query($conn,"select Count(*) As Total from facility");
        $rows = mysqli_num_rows($result);
        if($rows)
        {
            $rs = mysqli_fetch_assoc($result);
            $total = $rs["Total"];
        }
        $totalPages = ceil($total / $perpage);
        if($page <=1 ){
            ?>
            <li><a href="#">Prev</a></li>
        <?php
        }
        else
        {
            $j = $page - 1;
            ?>
        <li><?php echo "<a href='location.php?page=$j'>Prev</a>" ?></li>
        <?php
        }
        for($i=1; $i <= $totalPages; $i++)
        {
            if($i<>$page)
            {
                ?>
        <li><?php echo "<a href='location.php?page=$i'>$i</a>" ?></li>
                <?php
            }
            else
            {
                ?>
        <li><?php echo "<a href='location.php?page=$i'>$i</a>" ?></li>
                <?php
            }
        }
        if($page == $totalPages )
        {
            ?>
        <li><?php echo "<a href='#'>Next</a>" ?></li>
           <?php
        }
        else
        {
            $j = $page + 1;
            ?>
        <li><?php echo "<a href='location.php?page=$j'>Next</a>" ?></li>
           <?php
        }

    }
    ?>
</body>
</html>