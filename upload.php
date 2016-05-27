<?php
// Check if user is logged in, otherwise send to login page
session_start();
if(!isset($_SESSION['login'])) {
    header ("Location: inlog.php");
}
require('dbconnect.php');
include('head.php');

if(isset($_FILES['image'])){
    $status = "";
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    // Array of file allowed extensions
    $expensions= array("jpeg","jpg","png");
    // Error wrong file extension
    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Type bestand niet ondersteund, kies een JPEG of PNG bestand.";
        $status="Type bestand niet ondersteund, kies een JPEG of PNG bestand.";
    }
    // Error file size too big
    if($file_size > 2097152){
        $errors[]='Bestand te groot, kies een kleiner bestand.';
        $status='Bestand te groot, kies een kleiner bestand.';
    }
    // If no errors -> upload image to server in /images and add path to database
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

    <div class="coachForm">
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
            <br>
        <input type="submit" value="Uploaden"/>
        </form>
        <br>
        <p><?php echo $status;?></p>
    </div>
<?php include ('footer.php'); ?>
