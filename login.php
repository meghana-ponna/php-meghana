<?php
   ob_start();
   session_start();
?>

<html lang = "en">
   
   <body>
      <div class = "container form-signin">
         
         <?php
        require "vendor/autoload.php";
      $mongoClient = new MongoDB\Client("mongodb://172.18.0.3:27017/?compressors=disabled&gssapiServiceName=mongodb");
         echo $mongoCLient;
         $database = $mongoClient->newdata;
         $collection = $database->users;
         echo $collection;
         //echo "hii";
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['Email']) && !empty($_POST['password'])) {
            //echo "hello";
         $Email= $_POST['Email'];
         echo "<br>";
         echo $Email;
         $password = $_POST['password'];
         echo $Email;
         //echo $password;
         $user = $collection->findOne(['email' => $_POST['Email']]);
         echo $user["email"];
         echo $password;
         echo $user['password'];
      if ($password==$user['password']) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['Email'] = $Email;
            echo "<br>";
            echo 'You have entered valid use name and password';
            header('Location:logout.php');
         } 
  else {
    echo "Invalid username or password";
  }
}

            
         //    if (isset($_POST['login']) && !empty($_POST['Email']) 
         //       && !empty($_POST['password'])) {
				
         //       if ($_POST['Email'] == 'megh@gmail.com' && 
         //          $_POST['password'] == '1234') {
         //          $_SESSION['valid'] = true;
         //          $_SESSION['timeout'] = time();
         //          $_SESSION['Email'] = 'megh@gmail.com';
                  
         //          echo 'You have entered valid use name and password';
         //       }else {
         //          echo 'Wrong username or password';
         //       }
         //    }
         // 
         ?>
      </div> <!-- /container -->


      <br>
      <br>
      
   </body>
</html>