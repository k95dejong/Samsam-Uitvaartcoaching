<?php
session_start();

//Requires Database connection
include_once 'includes/dbConnect.php';

if (isset($_POST['submit'])) {
    $uid = htmlentities($_POST['uid']);
    $pwd = htmlentities($_POST['pwd']);

    //Check if data is valid & generate error if not so
    if ($uid == "") {
        $errors[] = 'Username cannot be empty';
    }
    if ($pwd == "") {
        $errors[] = 'Password cannot be empty';
    }

    $enryptUid=md5($uid);
    $enryptPwd=md5($pwd);

    $sql = "SELECT * FROM user WHERE uid='$enryptUid' AND pwd='$enryptPwd'";

    $result = mysqli_query($db, $sql);

    if (!$row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="error">
            <p>Your username or password is incorrect!</p>
        </div>
        <?php
    } else {
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");
    }
}

?>

<?php include ('head.php'); ?>

<div class="container">
    <div class="inlogveld">
        <form action="" method="POST">
            <input type="text" name="uid" placeholder="Username"><br><br>
            <input type="password" name="pwd" placeholder="Password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

<?php include ('footer.php'); ?>
