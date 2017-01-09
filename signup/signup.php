<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title></title>
	 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!--Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">
    <script type="text/javascript" src="../incre.js"></script>
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="../login/log.css">
    <link rel="stylesheet" href="../navbar.css">
	
</head>

<body>





<?php include ('../projectdb.php'); 
 // define variables and set to empty values
$NameErr = $EmailErr = $PassErr = $CPassErr = "";
$Name = $Email = $Password = $Confirm_Password="";
$valid=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["name"];
    if (empty($_POST["name"])) {
        $NameErr = "Name is required";
        $valid = false;
    } else {
        $Name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
            $NameErr = "Only letters and white space allowed";
            $valid = false;
        }
    }

    if (empty($_POST["emailaddress"])) {
        $EmailErr = "Email is required";
        $valid = false;
    } else {
        $Email = test_input($_POST["emailaddress"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[a-zA-Z0-9\.\-\_]*@[a-z]*\.[a-z]*$/", $Email)) {
            $EmailErr = "Invalid email format";
            $valid = false;
        }
    }

    if (empty($_POST["password"])) {
        $PassErr = "Password is required";
        $valid = false;
    } else {
        $Password = $_POST['password'];
    }


    if (empty($_POST["cpassword"])) {
        $CPassErr = "Confirm your Password";
        $valid = false;
    } else {
        $Confirm_Password = $_POST['cpassword'];
    }

    if (!empty($Password) and !empty($Confirm_Password)) {
        if (strcmp($Password, $Confirm_Password) <> 0) {
            $valid = false;
            $CPassErr = "Password does not match";
        }
    }

    if ($valid) {
        $sql = "insert into signup(Name,Email,Password) VALUES ('$Name','$Email','$Password')";
        $success = mysqli_query($conn, $sql);
        $id = "select * from signup where Name='$Name'";
        $result = mysqli_query($conn,$id);
        $row = mysqli_fetch_array($result);
        if ($success){
            $path = "../user panel/user.php?v_id=".$row['v_id'];
            header('Location:'.$path);
        }
    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
<script>
function validateform(){
        
var name=document.forms["myform"]["name"].value; 
var email=document.forms["myform"]["emailaddress"].value;  
var password=document.forms["myform"]["password"].value;
var second=document.forms["myform"]["cpassword"].value;
// var atposition=x.indexOf("@");  
// var dotposition=x.lastIndexOf(".");  

if (name==null || name==""){  
  //alert("Name can't be blank");
    document.getElementById('user').innerHTML = "Name can't be blank";
    document.getElementById('user').style.color = 'goldenrod';
  return false;
}
else{
    document.getElementById('user').innerHTML = '';
}
if (email==null || email==""){  
 // alert("email can't be blank");
    document.getElementById('email').innerHTML = "email can't be blank";
    document.getElementById('email').style.color = 'goldenrod';
  return false;  
}
else{
    var reg = /[a-zA-Z0-9\.\-\_]*@[a-z]*\.[a-z]*/;
    if (!reg.test(email)){
        document.getElementById('email').innerHTML = "invalid email format";
        document.getElementById('email').style.color = 'goldenrod';
        return false;
    }
    document.getElementById('email').innerHTML = '';
}
if(password.length < 6 || password==null || password==""){
 // alert("Password must be at least 6 characters long.");
    document.getElementById('pswrd').innerHTML = "Password must be at least 6 characters long.";
    document.getElementById('pswrd').style.color = 'goldenrod';
  return false;  
  }
  else{
    document.getElementById('pswrd').innerHTML = '';
}
if(password!=second || second==null || second ==""){
   // alert ('password must be same');
    document.getElementById('confirm').innerHTML = 'password must be same';
    document.getElementById('confirm').style.color = 'goldenrod';
return false;
}
}  
    </script>
<div class="col-md-3 form">
    <form  name="myform" method="post" action="signup.php" onsubmit="return validateform();">
        <h2 style="color:goldenrod">Sign up now!</h2>

        <label for="Name">Name</label>
        <input type="text" id="name" name="name" placeholder="UserName" class="form-control" value="<?php echo $Name;?>">
        <span class="error" id="user"> <?php echo $NameErr;?></span><br><br>

        <label for="emailaddress">Email Address</label>
        <input type="text" id="emailaddress" name="emailaddress" placeholder="example@example.com" class="form-control" value="<?php echo $Email;?>">
        <span class="error" id="email"><?php echo $EmailErr;?></span><br><br>

        <label for="pass ">Password</label>
        <input type="password" id="pass" name="password" placeholder="password" class="form-control" value="<?php echo $Password;?>">
        <span class="error" id="pswrd"> <?php echo $PassErr;?></span><br><br>

        <label for="pass1">Confirm Password</label>
        <input type="password" id="pass1" name="cpassword" placeholder="Confirm password" class="form-control" value="<?php echo $Confirm_Password;?>">
        <span class="error" id="confirm"> <?php echo $CPassErr;?></span><br><br>
	<input type="submit" name="submit" value="Register" class="btn btn-primary">
    </form>
</div>

<div class="col-md-6 quote">
    <p>
        “Travel far enough, <br>you meet yourself” <br>~CLOUD ATLAS
    </p>
</div>
</body>
</html>