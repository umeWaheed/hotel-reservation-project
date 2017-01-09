<?php
session_start();
$user="";
if (isset($_SESSION['login_user'])){
    $user = $_SESSION['login_user'];
}
else{
    header ('location: ../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="user.css">
</head>
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

<div class="col-md-12 heading">
    <h2>Welcome to your panel, <?= $_SESSION['login_user']?></h2>
</div>
<?php
include ('../projectdb.php');
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>sr#</th>
            <th>Hotel Name</th>
            <th>Room name</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Total Rent</th>
            <th>Change Status</th>
        </tr>
        <?php
        $index=1;
        $visitor = $_REQUEST['v_id'];
        $query = "select b.check_in,b.check_out,b.total_rent,h.h_name,r_name from booking b,hotel h,room r,hotel_room hr where v_id=$visitor and hr.h_id=h.h_id and hr.r_id=r.r_id and b.hr_id=hr.hr_id";
        if ($result = mysqli_query($conn,$query)){
        while ($row = mysqli_fetch_array($result)){
        ?>
            <tr>
            <td><?= $index ?></td>
            <td><?= $row['h_name'] ?></td>
            <td><?= $row['r_name'] ?></td>
            <td><?= $row['check_in'] ?></td>
            <td><?= $row['check_out'] ?></td>
            <td><?= $row['total_rent'] ?></td>
            <td><button class="btn btn-sm b1">Update</button><button class="btn btn-sm b1">Delete</button></td>
            </tr>
        <?php
            $index++;
            }
        }
        ?>
    </table>
    <a class="btn btn-default" href="../login/logout.php">Logout</a>
</div>
</body>
</html>