<?php
include('../projectdb.php');
$id = $_GET['id'];
$hotel=$_GET['hotel'];
$room = $_GET['room'];
$in = $_GET['chkin'];
$out = $_GET['chkout'];
$rent = $_GET['rent'];
$hr = "select hr.hr_id from hotel h, room r, hotel_room hr where h.h_name='$hotel' and r.r_name='$room' and hr.h_id=h.h_id and hr.r_id=r.r_id";
if ($result = mysqli_query($conn,$hr)) {
    $hr = mysqli_fetch_array($result);
    $hr = $hr['hr_id'];
}
else{
   echo  mysqli_error($conn);
}
$query = "insert into booking (v_id,hr_id,check_in,check_out,total_rent) values ('$id','$hr','$in','$out','$rent')";
if (mysqli_query($conn,$query)){
    header('location: ../user%20panel/user.php?v_id='.$_GET['id']);
}
else{
    echo  mysqli_error($conn);
}
?>