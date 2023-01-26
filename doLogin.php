<?php 
session_start();

// php file that contains the common database connection code
include "dbFunction.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM user
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    
    $_SESSION['username'] = $row['username'];
    $_SESSION['height'] = $row['height'];
    $_SESSION['weight'] = $row['weight'];
    
    
    
    $msg = "<h2><b>You are logged in as " . $_SESSION['username'] . "</b></h2>";
    $msg .= "<p><a href='sugarMonitoring.php'>Home</a></p>";
} else 
{
    $msg = "<p>Sorry, you must enter a valid username and password to log in</p>";
    $msg .= "<p><a href='index.php'>Go back to login page</a></p>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Get Together - Where the neighborhood comes together!</title>
    </head>
    <body>
        <h3>Get Together - Login</h3>
        <?php
        echo $msg;
        ?>
    </body>
</html>