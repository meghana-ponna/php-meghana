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
         //echo "hii";
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['Email']) && !empty($_POST['password'])) {
            //echo "hello";
         $Email= $_POST['Email'];
         echo "<br>";
         
         $password = $_POST['password'];
         
         //echo $password;
         $user = $collection->findOne(['email' => $_POST['Email']]);
      if ($password==$user['password']) {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['Email'] = $Email;
            $cookie_name = "Email";
             $cookie_value = $GLOBALS['Email']; 
             setcookie($cookie_name, $cookie_value,time()+(86400*30));
            echo "<br>";
            echo '<script type ="text/JavaScript">';  
            echo 'alert("You have entered valid use name and password")';  
            echo '</script>';  
            header('Refresh:0,url=logout.php');
         } 
  else {
   echo '<script type ="text/JavaScript">';  
   echo 'alert("invalid credentials")';  
   echo '</script>';
   header('Location:login1.php');
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