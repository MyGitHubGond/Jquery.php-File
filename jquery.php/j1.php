<?php
include_once("index.php");

// Assuming $con is your database connection, make sure it's defined before using it.
// Example: $con = mysqli_connect("hostname", "username", "password", "database");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert_form.php" method="post" enctype="multipart/form-data">
        Enter fullname: <input type="text" name="fn" id="fn1"><br>
        Enter email: <input type="text" name="em" id="em1"><br>
        Select gender: 
        <input type="radio" name="gen" value="male"> Male
        <input type="radio" name="gen" value="female"> Female<br>
        Enter mobile number: <input type="text" name="mn" id="mn1"><br>
        Enter password: <input type="text" name="pwd" id="pwd1"><br>
        Enter confirm password: <input type="text" name="rewd" id="rewd1"><br>
        Select profile picture: <input type="file" name="pic" id="pic1"><br>
        <input type="submit" name="Register" id="reg_btn"><br>
    </form>
    
</body>
</html>

<?php

if(isset($_POST['Register'])){
    $fn = $_POST['fn'];
    $em = $_POST['em'];
    $mn = $_POST['mn'];
    $gen = $_POST['gen'];
    $pwd = $_POST['pwd'];
    $pic = $_FILES['pic']['name'];

    $insert = "INSERT INTO registration (fullname, email, mobile, gender, password, profile) VALUES ('$fn', '$em', '$mn', '$gen', '$pwd', '$pic')";

    if(mysqli_query($con, $insert)){
        if(!is_dir("uploads")){
            mkdir("uploads");
        }
        move_uploaded_file($_FILES['pic']['tmp_name'], "uploads/" . $_FILES['pic']['name']);
        echo "Registration successful";
    } else {
        echo "Error in registration: " . mysqli_error($con);
    }
}
?>
