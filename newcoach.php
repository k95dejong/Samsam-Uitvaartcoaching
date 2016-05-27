<?php
// Check if user is logged in, otherwise send to login page
session_start();
if(!isset($_SESSION['login'])) {
    header ("Location: inlog.php");
}

require('dbconnect.php');
include('head.php');

// Creation of new coach to database
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $type = '1';
    $image = 'images/ppic.png';
    $name =$_REQUEST['name'];
    $description =$_REQUEST['description'];
    $query="INSERT INTO coaches(`coaches_type`,`coaches_image`,`coaches_name`,`coaches_description`)values('$type','$image','$name','$description')";
    $result = mysqli_query($conn, $query);
    $status = "Nieuwe gegevens succesvol toegevoegd.</br></br><a href='coacheslist.php'>Laat nieuwe toevoeging zien.</a>";
}
?>

<div class="container">
    <h2 class="overzichtTitle">Nieuwe coach</h2>

    <div class="coachForm">
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <p><input type="text" name="name" placeholder="Naam" required /></p>
            <p><input type="text" name="description" placeholder="Omschrijving" required /></p>
            <p><input name="submit" type="submit" value="Voeg toe" /></p>
        </form>
        <br>
        <p><?php echo $status; ?></p>
    </div>

<?php include ('footer.php');