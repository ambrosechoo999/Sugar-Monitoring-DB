<?php
session_start();
// php file that contains the common database connection code
include "dbFunction.php";

$queryItems = "SELECT s.readingID,s.userID,s.readingDate,s.readingTimes,s.readingLvl,u.userid
            FROM sugarreading s, user u
            WHERE s.userID = u.userid";



$resultItems = mysqli_query($link, $queryItems) or
        die(mysqli_error($link));
$arrItems = [];
while ($row = mysqli_fetch_assoc($resultItems)) {
    $arrItems[] = $row;
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
         <script src="js/insertMessage.js" type="text/javascript"></script>
      <script>
             $(document).ready(function () {    
                $.ajax({
                    type: "GET",
                    url: "getReading.php",
                    cache: false,
                    dataType: "JSON",
                    
                    success: function (response) {
                        var message = "<tr><th>Date</th><th>After-Meal Reading</th><th>Reading</th></tr>";
                        
                        for (i = 0; i < response.length; i++) {
                            
                            message += "<tr><td>" + response[i].readingDate + "</td>"
                                        + "<td>" + response[i].readingTimes + "</td>"
                                     + "<td>" + response[i].readingLvl + "</td> </tr>";
                        }
                        $("#sugarTable").html(message);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            });
        </script>
        <title>Sugar Monitoring </title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src =" images/sugar1.png" width="150">
		<a class="navbar-brand" href="#">Sugar Monitoring App</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				
			
			</ul>	
			
			
                    <form class="form-inline" method="POST" action="doLogOut.php">
			
			<button class="btn btn-outline-danger" type="submit" >Sign Out</button>
			</form>
		</div>
	</nav>
        <div class="container">
           
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3 pink,p-3 mb-2 bg-secondary text-white"><span><h3>Blood Sugar Monitoring</h3></span>
                        <br/><br/>
                        <form method="POST" action="insertReading.php" form id="sugar">
                 <label for="meal">Reading Taken After:</label>

<select name="meal" id="meal" >
    
  <option value="Breakfast">Breakfast</option>
  <option value="Lunch">Lunch</option>
  <option value="Dinner">Dinner</option>
  
</select>
                 <h9 style=" color:#FFFFFF ; ">Readings are to be taken 2 hours after each meal</h9>
                 <br/><br/>
                     <label for="meal">Blood Sugar Readings (mmol/L):</label><br/>

                     <input type="number" id="bsr" id="bsr "name="bsr" placeholder="0"style="width:250px">
                     <input class="btn-outline-success" type="submit" value="Enter" style="width:250px">
                        </form>
                    </div>
                     <div class="col-md-9 pink">
                           
         <table id="sugarTable" class="table table-hover table-dark">
</table>
           
</div>
                </div>
       
        
</body>
</html>