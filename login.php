<?php

if(!empty($_POST['email']) && !empty($_POST['password'])):

endif;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Login Below</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    
<div class="header">
<a href="/">Homepage</a>    
</div>    
<h1>Login</h1>
 <span> Or <a href="register.php">register here</a> </span>   
<form action="login.php" method="POST">
<input type="text" placeholder="Enter your email" name="email">    
 <input type="password" placeholder="And password" name="password">
<input type="submit">    
</form>    
</body>
</html>
