<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("Location: inlog.php");
}

require('dbconnect.php');
include('head.php');

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
    $name =$_REQUEST['name'];
    $description =$_REQUEST['description'];
    $query="UPDATE coaches SET coaches_name= '$name' WHERE `coaches_id` = $id)";
    $result = mysqli_query($conn, $query);
    $status = "Nieuwe gegevens succesvol gewijzigd.</br></br><a href='coacheslist.php'>Laat gewijzigde gegevens zien.</a>";
}
?>

    <div class="container">
    <h2 class="overzichtTitle">Coach wijzigen</h2>

    <div class="coachForm">
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <p><input type="text" name="name" placeholder="Naam" /></p>
            <p><input type="text" name="description" placeholder="Omschrijving" /></p>
            <p><input name="submit" type="submit" value="Wijzig" /></p>
        </form>
        <br>
        <p><?php echo $status; ?></p>
    </div>

<?php include ('footer.php');