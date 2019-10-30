<?php session_start();
require 'db.php';
if ($_SESSION['isloggedin']) {
    $id = @$_GET['id'];
    $user_id = $_SESSION['id'];
    $q = mysqli_query($con,  "SELECT * FROM user_data WHERE id='$id'");
    $result = mysqli_fetch_array($q);
   $file_store = $result['filepath'];

    if (isset($_POST['update'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $company = mysqli_real_escape_string($con, $_POST['company']);
        $phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
        $notes = mysqli_real_escape_string($con, $_POST['notes']);

        if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
            $file_name = $_FILES["image"]["name"];
            $file_tem_loc = $_FILES["image"]["tmp_name"];
            $urlCount = mysqli_query($con, "SELECT id FROM user_data");
            $counterURL = mysqli_num_rows($urlCount);
            $file_name = "u_" . $user_id . "_image" . $counterURL;
            $counterURL++;
            $file_store  = "upload/" . $file_name . ".jpg";
            move_uploaded_file($file_tem_loc, $file_store);
        }

        if (empty($name) || empty($company) || empty($phone1) || empty($notes)) {

            if (empty($name)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }

            if (empty($company)) {
                echo "<font color='red'>Company field is empty.</font><br/>";
            }

            if (empty($phone1)) {
                echo "<font color='red'>Phone field is empty.</font><br/>";
            }
            if (empty($notes)) {
                echo "<font color='red'>Notes field is empty.</font><br/>";
            }
        }
         else {
             
             $result = mysqli_query($con, "UPDATE user_data SET name='$name', company='$company', filepath='$file_store', phone='$phone1', notes='$notes' WHERE id='$id'");
           
            

             if ($result) {
                echo "Record has been updated 
                <script>
                setTimeout(function(){ location.href = 'index.php'}, 3000);
                </script>";
            }
        }
    }

    ?>
    <html>

    <head>
        <title>Edit Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <a href="index.php">Home</a>
        <br /><br />

        <form name="form1" enctype="multipart/form-data" method="post" action="">
            <table class="table table-striped">
                <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>"></td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td><input type="text" class="form-control" name="company" value="<?php echo $result['company']; ?>"></td>
                </tr>
                <tr>
                    <td>Select image to upload:</td>
                    <td><input type="file" name="image" id="fileToUpload"></td>
                    <td><img src="<?php echo $result['filepath']; ?>" alt="image" width="150" height="100" />
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" class="form-control" name="phone1" value="<?php echo $result['phone']; ?>"></td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td><input type="text" class="form-control" name="notes" value="<?php echo $result['notes']; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo @$_GET['id']; ?>></td>
                    <td><input type="submit" class="btn btn-success" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>

    </html>
<?php } else {
    header("Location:login.php");
} ?>