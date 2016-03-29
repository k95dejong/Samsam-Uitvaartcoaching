<?php
require('dbconnect.php');
include('head.php');
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: inlog.php");
}

if(isset($_FILES['image'])){
    $status = "";
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Type bestand niet ondersteund, kies een JPEG of PNG bestand.";
        $status="Type bestand niet ondersteund, kies een JPEG of PNG bestand.";
    }

    if($file_size > 2097152){
        $errors[]='Bestand te groot, kies een kleiner bestand.';
        $status='Bestand te groot, kies een kleiner bestand.';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        $id = $_REQUEST['id'];
        $imagepath = "images/".$file_name;
        $query="UPDATE coaches SET coaches_image='$imagepath' WHERE `coaches_id` = $id";
        $result = mysqli_query($conn, $query);
        $status = "Nieuwe foto succesvol toegevoegd.</br></br><a href='coaches.php'>Laat nieuwe toevoeging zien.</a>";
    }else{
        print_r($errors);
    }
}

?>
    <div class="container">
    <h2 class="overzichtTitle">Foto upload</h2>

        <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit"/>
        </form>
        <br>
        <p><?php echo $status;?></p>

<?php include ('footer.php'); ?>
