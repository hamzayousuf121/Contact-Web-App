<?php session_start();
require 'db.php';
if($_SESSION['isloggedin']){
  $user_id = $_SESSION['id'];
  // ORDER BY id DESC
  $query = "SELECT * from `user_data`";
  $result = mysqli_query($con, $query);
    if(isset($_POST['submit'])){
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
				$file_name = $_FILES["image"]["name"];
				$file_tem_loc = $_FILES["image"]["tmp_name"];
						$urlCount = mysqli_query ($con, "SELECT id FROM user_data");
            $counterURL = mysqli_num_rows($urlCount);
            $file_name = "u_".$user_id."_image".$counterURL;
					  $file_store  = "upload/".$file_name.".jpg";
						move_uploaded_file($file_tem_loc, $file_store);
      }
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $company = mysqli_real_escape_string($con, $_POST['company']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
        $notes = mysqli_real_escape_string($con, $_POST['notes']);
        if($counterURL === 1){
           $query = mysqli_query($con, "UPDATE user_data SET name='$name', company='$company', filepath='$file_store',
          phone='$phone1', notes='$notes' where id='1'");
          echo  $counterURL++;
          if($query){
           echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
           <strong>Record</strong> has been updated!
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
           </button>
         </div>";
        }
      }
        else{
        $insertquery = "INSERT INTO `user_data` (name, company, filepath, phone, notes)
        VALUES('$name', '$company', '$file_store', '$phone$phone1', '$notes')";
        $test = mysqli_query($con,$insertquery);
                  if($test){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Record</strong> has been inserted!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <script>
                    setTimeout(function(){ location.href = 'index.php'}, 2000);
                  </script>";
                }
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
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
  <form method="post" id="form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <label for="fname">Name</label>
    <input type="text" id="fname" required name="name" maxlength="50" placeholder="Your name..">

    <label for="company">Company</label>
    <input type="text" id="company"required  name="company"  maxlength="100" placeholder="Your Company name..">

    <label for="country">Country</label>
    <select  class="col-4" id="country" required  onchange="func();">
      <option value="pakistan">Pakistan</option>
      <option value="canada">Canada</option>
      <option value="uk">United Kingdom</option>
    </select>
    <label for="phone">Phone</label>
    <input id="phone" class="col-1" required readonly value="+92"  maxlength="20" type="text" name="phone" style="height:50px; width:60px"/>
    <input class="col-3"  maxlength="30" type="text" id="phone1" name="phone1" style="height:50px" required /><br />
    Select image to upload:
    <input type="file" name="image" id="fileToUpload">
    <br />
    <label for="notes">Notes</label>
    <textarea id="notes" name="notes"  maxlength="200" required placeholder="Write something.." style="height:200px"></textarea>
    <input type="submit" name="submit" value="Submit">
    <a class="btn btn-danger" href="login.php?logout='logout'">Logout</a>
  </form>
</div>
<div class="container">
  <h2>User Table</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Company</th>
        <th>Phone</th>
        <th>Notes</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>  
    
        <?php 
        while(@$data = mysqli_fetch_array($result)){
        if(@$data['name']){?>
        <tr>
        <td><?php echo @$data['id'];?></td>
        <td><?php echo @$data['name'];?></td>
        <td><?php echo @$data['company'];?></td>
        <td><?php echo @$data['phone'];?></td>
        <td><?php echo @$data['notes'];?></td>
        <td><img alt="image" width="100" height="70" src="<?php echo @$data['filepath'];?>"></td>
        <?php 
        echo "<td><a class='btn btn-success' href=\"edit.php?id=$data[id]\">Edit</a> | <a class='btn btn-danger' href=\"delete.php?id=$data[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";  ?>
        </tr>
        <?php }
        } ?>
    </tbody>
    <div id="table"></div>
  </table>
</div>     
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>
</html>
<?php  }
else{
    header('Location:login.php');
}
?>