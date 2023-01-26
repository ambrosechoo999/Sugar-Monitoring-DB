<!DOCTYPE html>
<!--
Allows user to login or register. You can choose to have a separate registration page.
This page is deliberately left blank.

-->
<html>
    <head>
        <meta charset="UTF-8">
         <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function()){
                alert("Your Reading entered after")
            }
            </script>
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src =" images/sugar1.png" width="150">
		<a class="navbar-brand" href="#">Sugar Monitoring App </a>
               
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				
			
			</ul>	
			
			
                    <form class="form-inline" method="POST" action="doLogin.php">
                        
                        <input class="form-control mr-sm-2" name="username" type="text" placeholder="Username" aria-label="Username">
                        <input class="form-control mr-sm-2" name="password" type="password" placeholder="Password" aria-label="Password">
			<button class="btn btn-outline-success" type="submit" >Login</button>
			</form>
		</div>
	</nav>
        <div class="container-fluid-p-b3">
            <form method="POST" action="doRegister.php">
                <div class="col-md-3 pink">
                <h3>Register with US!</h3>
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                 <input type="text" name="height" id="height" placeholder="Height in cm">
                   <input type="text" name="weight" id="weight" placeholder="Weight in kg">
                   <button type="submit" class="btn btn-outline-warning" style="width:300px">Sign up</button>

                
            </form>
</div>
</div>
    </body>
</html>
