
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left"> 
    <h1>Welcome</h1>
<?php
  session_start();
  if (!empty($_SESSION['loggedIn'])) {
    echo "<p>You are logged in as " . $_SESSION['Email'] . ".</p>";
  } else {
    echo "<p>You are not logged in.</p>";
  }
?>
</div>
</div>
<form action="logout1.php">
<div>
   <button type="submit"  class="btn btn-primary">Logout</button>
</div>
</form>
</body>
</html>
</body>
</html>

