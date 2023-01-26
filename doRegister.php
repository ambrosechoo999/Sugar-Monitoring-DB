<?php
// php file that contains the common database connection code
include "dbFunction.php";

$username = $_POST['username'];
$password = $_POST['password'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$duplicatequery = "SELECT * FROM user WHERE username = '$username'";
$duplicate = mysqli_query($link, $duplicatequery);

if (mysqli_num_rows($duplicate) == 0) {
    $query = "INSERT INTO user
          (username,password,height,weight) 
          VALUES 
          ('$username',SHA1('$password'),'$height',
           '$weight')";
    $status = mysqli_query($link, $query); // or die(mysqli_error($link));
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='index.php'>login</a>.</p>";
} else {
    $message = "The username " . $username . " already exists";
}





mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Sugar Monitoring DB </title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Sugar Monitoring - Register</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>