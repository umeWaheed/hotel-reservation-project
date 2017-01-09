<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Occasions</title>
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="pg3.css">
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

    <div class="sp">
        <h2>Special Occasions</h2>
    </div>
    <?php
    include ('../projectdb.php');
    $perpage = 6;

    if(isset($_GET["page"])){
        $page = intval($_GET["page"]);
    }
    else {
        $page = 1;
    }
    $calc = $perpage * $page;
    $start = $calc - $perpage;
    $result = mysqli_query($conn, "select * from  special_occ Limit $start, $perpage");

    $rows = mysqli_num_rows($result);

    if($rows){
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="r1">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>
                            <?php
                            echo $row['occ'];
                            ?>
                        </h3>
                        <small>
                            <?php
                            echo $row['duration'];
                            ?>
                        </small>
                    </div>
                    <div class="panel-body">
                        <img src="<?php echo $row['image'] ?>" alt="Shopping">
                    </div>
                    <div class="panel-footer">
                        <a href="<?php echo $row['link'] ?>">Visit website</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
        }
        ?>
    <ul class="pagination page">
    <?php
    if(isset($page))
    {
        $result = mysqli_query($conn,"select Count(*) As Total from special_occ");
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
        <li><?php echo "<a href='page3.php?page=$j'>Prev</a>" ?></li>
        <?php
        }
        for($i=1; $i <= $totalPages; $i++)
        {
            if($i<>$page)
            {
                ?>
        <li><?php echo "<a href='page3.php?page=$i'>$i</a>" ?></li>
                <?php
            }
            else
            {
                ?>
        <li><?php echo "<a href='page3.php?page=$i'>$i</a>" ?></li>
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
        <li><?php echo "<a href='page3.php?page=$j'>Next</a>" ?></li>
           <?php
        }

    }
    ?>
</body>
</html>