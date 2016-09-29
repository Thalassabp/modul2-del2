<?php

//Skal skrives først i dokumentet for at kunne bruge sessions
session_start();

if( isset($_SESSION['user_id']) ){
header("Location: /");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$message = '';

//Checker om brugernavn og password passer sammen
if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
$_SESSION['user_id'] = $results['id'];
header("Location: /");
} else {
$message = 'Brugernavn og password passer ikke sammen';
}

endif;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Log ind nedenfor</title>
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

<div id="login2">    
<h1>Log ind</h1>
 <span> eller <a href="register.php">registrer dig her</a> </span>   
<form action="login.php" method="POST">
<input type="text" placeholder="Email Adresse" name="email">    
 <input type="password" placeholder="Password" name="password">
<input type="submit">    
</form> 
</div>    
</body>
</html>
