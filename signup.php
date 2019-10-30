<?php session_start();
if(@!$_SESSION['isloggedin']){?>
<?php require 'db.php'; ?>
<?php 
if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email format');
  }
  $password = mysqli_real_escape_string($con, md5($_POST['pwd']));
  $query = "INSERT INTO `user_data`(id, uname, email, password)
VALUES ('', '$username', '$email', '$password')";
$result = mysqli_query($con, $query);
if($result){
  echo "<h3> sign up succussfully</h3>";
  header('Location: http://localhost/Contact/Project/login.php');

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
    <label for="uname">Your User name</label>
    <input type="text" name="username" placeholder="Enter Your name" class="form-control" required id="uname">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email"  placeholder="abc@example.com" class="form-control" required id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="pwd"  placeholder="Enter Your Password" class="form-control" required id="pwd">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 <a class="btn btn-danger" href="login.php">Signin</a>
</form>
</body>
</html>
<?php  }
else 
header('Location: index.php');
?>