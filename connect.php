<?php
 $firstname = $_POST [ 'firstname' ];
 $lastname = $_POST [ 'lastname' ];
 $email = $_POST [ 'email' ];
 $company = $_POST [ 'company' ];
 $number = $_POST [ 'number' ];
 $address = $_POST [ 'address' ];
 $pin = $_POST [ 'pin' ];
 $password = $_POST [ 'password' ];

 $conn = new mysqli('localhost', 'root', '', 'credentials');
 if ($conn -> connect_error){
     die('Connection Failed : '.$conn->connect_error);
 }else{
     $stmt = $conn -> prepare("insert into user_details (firstname, lastname, email, company, number, address, pin, password)
     values (?, ?, ?, ?, ?, ?, ?, ?)");
     $stmt-> bind_param("ssssisis", $firstname, $lastname, $email, $company, $number, $address, $pin, $password);
     $stmt->execute();
     echo "Registration Successful";
     $stmt->close();
     $conn->close();
 }
?>