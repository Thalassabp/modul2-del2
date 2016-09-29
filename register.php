<?php

session_start();

if( isset($_SESSION['user_id']) ){
header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
// Enter the new user in the database

$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

if( $stmt->execute() ):
$message = 'Oprettelsen af ny bruger var en success';

else:
$message = 'Ny bruger blev ikke oprettet';
endif;

endif;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Register Below</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <div class="header">
<a href="/">Startside</a>    
</div>    
<?php
if(!empty($message)):  
?>
<p><?= $message ?></p>
<?php
  endif;  
?>    
 
<div id="registrer">  
<h1>Registrer</h1>
 <span> eller <a href="login.php">log ind her</a> </span>
    <form action="register.php" method="POST">
<input type="text" placeholder="Email Adresse" name="email">    
 <input type="password" placeholder="Password" name="password">
<input type="password" placeholder="Bekræft password" name="confirm_password">
<input type="submit">    
</form
</div>          
</body>
</html>
