<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.css">

    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="../navbar.css">
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

<?php
include ('../projectdb.php');
session_start();
$error="";
if(isset($_POST['submit'])){
	if(empty($_POST['email']) || empty($_POST['password'])) {
		$error="email or password is invalid";
	
	}
	else {
		$username=$_POST['email'];
		$password=$_POST['password'];
        $q1 = "select * from signup where Password='$password' AND Email='$username'";
		$query = mysqli_query($conn,$q1);
		$rows = mysqli_num_rows($query);
        $result = mysqli_fetch_array($query);
		if($rows){
			?>
			<h2>Success</h2>

			<?php
            $_SESSION['login_user']=$result['Name'];
            $_SESSION['id']=$result['v_id'];
            echo $_SESSION['login_user'];
            $path = "../user panel/user.php?v_id=".$result['v_id'];
            header ('Location:'.$path);
		}else {
			$error = "invalid username/password";
		}
		mysqli_close($conn);
	}
}?>
<script>
    function validateform(){
        var email=document.forms["myform"]["email"].value;
        var password=document.forms["myform"]["password"].value;

        if (email==null || email==""){
           // alert("email can't be blank");
            document.getElementById('email1').innerHTML = "please enter an email id";
            document.getElementById('email1').style.color = 'goldenrod';
            return false;
        }
        else{
            var reg = /[a-zA-Z0-9\.\-\_]*@[a-z]*\.[a-z]*/;
            if (!reg.test(email)){
                document.getElementById('email1').innerHTML = "invalid email format";
                document.getElementById('email1').style.color = 'goldenrod';
                return false;
            }
            document.getElementById('email1').innerHTML = "";
        }
        if(password.length < 6 || password==null || password==""){
            //alert("Enter password");
            document.getElementById('pass1').innerHTML = "please enter a 6 digit password";
            document.getElementById('pass1').style.color = 'goldenrod';
            return false;
        }
        else{
            document.getElementById('pass1').innerHTML = "";
        }
    }
</script>
<div class="col-md-4 form">
    <form name="myform" action="login.php" method="post" onsubmit="return validateform();">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="example@example.com" class="form-control">
        <span id="email1"></span><br>

        <label for="pass">Password</label>
        <input type="password" id="pass" name="password" placeholder="password" class="form-control">
        <span id="pass1"><?php echo $error; ?></span><br>
      <input type="submit" name="submit" value="Login" class="btn btn-primary"><br>
    <p>Don't have a account? <a href="../signup/signup.php">Sign up</a></p>
	</form>
</div>

<div class="col-md-6 quote">
    <p>
        “Traveling – it leaves you speechless, then turns you into a storyteller.” <br>– Ibn Battuta
    </p>
</div>
</body>
</html>