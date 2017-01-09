<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <!--jQuery -->
    <!--script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="footer-distributed-with-contact-form.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap-theme.css">
    <link rel="stylesheet" href="hotel.css">
    <link rel="stylesheet" href="../navbar.css">
<body>

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
<!--div class="title">
    <a href="../home%20page/page1.html"><img src="../images/logo.png" alt="logo"></a>
</div-->

   <div class="row">
            <div id="top">
                <div id="topwrite">
                    <div class="jumbotron text-center">
                        <h2>Find a Deal,And Book a Hotel...</h2>
                        <form class="form-inline">
                            <input type="email" class="form-control" size="50" placeholder="Email Address" required>
                            <button type="button" class="btn btn-danger">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

   <div class="row">
       <div class="col-md-12">
           <div id="blurr">
               <div id="explore">
                   <h3>Explore by Tribes</h3>
                    <div class="col-md-12">
                        <div class="container-fluid text-center">

                                <div class="col-sm-3">
                                   <a><span class="glyphicon glyphicon-star logo-small"></span>
                                    <h4>Luxury</h4></a>
                                </div>

                                <div class="col-sm-3">
                                   <a> <span class="glyphicon glyphicon-fire logo-small"></span>
                                    <h4>Popular</h4></a>
                                </div>

                                <div class="col-sm-3">
                                    <a><span class="glyphicon glyphicon-credit-card logo-small"></span>
                                    <h4>Budget</h4></a>
                                </div>

                                <div class="col-sm-3">
                                    <a><span class="glyphicon glyphicon-heart logo-small"></span>
                                    <h4>Families</h4></a>
                                </div>

                        </div>
                    </div>
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
    $result = mysqli_query($conn, "select * from  hotel Limit $start, $perpage");

    $rows = mysqli_num_rows($result);

    if($rows){
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-3 text-center portion1" style="overflow: hidden">
                <img src="<?php echo $row['path']?>" alt="Dubai">
                <a><h3><strong><?php echo $row['h_name']?></strong></h3></a>
            <div class="rating">
                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            </div>
                <h4><?php echo $row['address']?></h4>
                <h6>Latest booking: 06 hours ago</h6>
                <p><?php echo $row['description']?></p>

        </div>
        <?php
    }
        }
        ?>
<div class="col-md-5"></div>
    <ul class="pagination  footer">
    <?php
    if(isset($page))
    {
        $result = mysqli_query($conn,"select Count(*) As Total from hotel");
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
        <li><?php echo "<a href='hotel.php?page=$j'>Prev</a>" ?></li>
        <?php
        }
        for($i=1; $i <= $totalPages; $i++)
        {
            if($i<>$page)
            {
                ?>
        <li><?php echo "<a href='hotel.php?page=$i'>$i</a>" ?></li>
                <?php
            }
            else
            {
                ?>
        <li><?php echo "<a href='hotel.php?page=$i'>$i</a>" ?></li>
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
        <li><?php echo "<a href='hotel.php?page=$j'>Next</a>" ?></li>
           <?php
        }

    }
    ?>
</ul>

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

</body>
</html>