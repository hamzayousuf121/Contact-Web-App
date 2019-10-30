<?php session_start();
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
    }
    if(@!$_SESSION['isloggedin'] === true){?>
<?php require 'db.php'; ?>
<?php 
if(isset($_POST['submit'])){
  $email = mysqli_real_escape_string($con, $_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email format');
  }
  $password = mysqli_real_escape_string($con, md5($_POST['pwd']));
$login = mysqli_query($con, "Select * from user_data where email='$email' AND password='$password'");
$data = mysqli_fetch_array($login);
 $numRows = mysqli_num_rows($login);
if($numRows > 0){
    $_SESSION['isloggedin'] = true;
     $_SESSION['id'] = $data['id'];
    echo "<h3> signIn succussfully</h3>";
    header('Location: http://localhost/Contact/Project/index.php');
}
else{
    echo "Email or Password is incorrect";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="form-group">
<label name="email" required for="email">Email</label>
  <input type="text" name="email"  placeholder="abc@example.com"  class="form-control" id="email">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" required name="pwd"  placeholder="Enter Your password"  class="form-control" id="pwd">
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<a class="btn btn-info" href="signup.php">SignUp</a>
</form>
</body>
</html>
<?php  }
else 
header('Location: index.php');
?>