<?php
$name1 = $email1 = $password1= ""; 
$name = $email = $password = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ if (empty($_POST["name"])) 
    {
     $name1= "Name is required";
      } 
      else {
         $name = test_input($_POST["name"]);
          }
           if (empty($_POST["Email"]))
            {
             $email1 = "Email is required";
              } else {
                 $email = test_input($_POST["Email"]);
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email1 = "Invalid email format";
    }
                  } 
            if (empty($_POST["password"])) {
                 $password1 = "password is required";
                  } else {
                     $password = test_input($_POST["password"]);
                      }
                
                       require 'vendor/autoload.php'; 
                      $client = new MongoDB\Client('mongodb://172.18.0.3:27017/?compressors=disabled&gssapiServiceName=mongodb');
                    
                       $database = $client->newdata;
                       $collection = $database->users;
                       $insertOneResult = $collection->insertOne(['username' => $name,'email' => $email,'password' => $password,]);
                       echo "user added to database";
                       header('Location:login1.php');
                     }
else{
   echo "there is an eror";
}
            function test_input($data)
            { 
                $data = trim($data);
                 $data = stripslashes($data);
                  $data = htmlspecialchars($data); 
                  return $data;
         } 
    ?>