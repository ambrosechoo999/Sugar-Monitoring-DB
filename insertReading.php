<?php
include "dbFunction.php";
$meal = $_POST['meal'];
$bsr = $_POST['bsr'];
$message = "";



// open connection 


// build sql query
$query = "INSERT INTO sugarreading(readingTimes,readingLvl)
         VALUES('$meal',$bsr)";

// execute sql query
$result = mysqli_query($link,$query) or die(mysqli_error($link));

// process the result
if($result){
    $message = "Record inserted successfully
     Click here to go <a href='sugarMonitoring.php'>back</a>.</p>";
    
}
else{
    $message = "Record insertion failed
     Click here to go <a href='sugarMonitoring.php'>back</a>.</p>";
}
// close connection

mysqli_close($link);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Get Together </title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Get Together - Insert</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>