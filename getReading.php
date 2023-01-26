<?php

include "dbFunction.php"; 
date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d'); // Retreive the current date of user's entry
// SQL query returns multiple database records.
$query = "SELECT * FROM sugarreading order by readingLvl"; 
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $sugar[] = $row;
}
mysqli_close($link);

echo json_encode($sugar);
?>
