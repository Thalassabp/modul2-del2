<?php
session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){
$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();    
$results = $records->fetch(PDO::FETCH_ASSOC);
    
$user = NULL;    
    
if( count($results) > 0){
$user = $results;
}    
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Velkommen</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <div class="header">
<a href="/">Startside</a>    
</div>    
 
<br><br><br><br><br>
<div id="loginform">    
<?php if( !empty($user) ): ?>
    
    <br />Hej <?= $user['email']; ?> </br>
    <br /><br />Du er logget ind! </br>
    <br /><br />
    <a href="logout.php">Log ud?</a>

<?php else: ?>
    
   <h1>Log ind eller registrer dig nedenfor</h1> 
    <a href="login.php">Log ind</a> eller 
    <a href="register.php">Registrer</a>
    
<?php endif; ?>  
</div>    
</body>
</html>
