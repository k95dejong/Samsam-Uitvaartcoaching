<?php
// Log in validator
session_start(); $username = $password = $userError = $passError = '';

// Check if password and username are correct
if(isset($_POST['submit'])){
    $username = htmlentities($_POST['username']); $password = htmlentities($_POST['password']);
    if($username === 'admin' && $password === 'admin'){
        $_SESSION['login'] = true; header('LOCATION:coacheslist.php'); die();
    }
    if($username !== 'admin')$userError = 'Gebruikersnaam is incorrect.';
    if($password !== 'admin')$passError = 'Wachtwoord is incorrect.';
}

include ('head.php'); ?>

<div class="container">
    <div class="inlogveld">
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Gebruikersnaam"><br><br>
            <input type="password" name="password" placeholder="Wachtwoord"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>

        <?php echo '<div class="loginError">'.$userError.'</div>';
        echo '<div class="loginError">'.$passError.'</div>';

include ('footer.php'); ?>

