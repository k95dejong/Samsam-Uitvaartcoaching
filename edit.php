<?php
include('head.php');
include('dbconnect.php');
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
header ("Location: inlog.php");
}

$id=$_REQUEST['coaches_id'];
$sql = "SELECT * from coaches where id='".$id."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="form">
    <h1>Update Record</h1>
    <?php
    $status = "";
    if(isset($_POST['new']) && $_POST['new']==1)
    {
        $id=$_REQUEST['id'];
        $name =$_REQUEST['coaches_name'];
        $age =$_REQUEST['coaches_description'];
        $update="update coaches set coaches_name='".$name."', coaches_description='".$age."' where id='".$id."'";
        mysqli_query($update) or die(mysqli_error());
        $status = "Record Updated Successfully. </br></br><a href='coacheslist.php'>View Updated Record</a>";
        echo '<p>'.$status.'</p>';
    } else { ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['coaches_id'];?>" />
            <p><input type="text" name="name" placeholder="Vul naam in" required value="<?php echo $row['coaches_name'];?>" /></p>
            <p><input type="text" name="age" placeholder="Vul tekst in" required value="<?php echo $row['coaches_description'];?>" /></p>
            <p><input name="submit" type="submit" value="Update" /></p>
        </form>
        <?php } ?>
    </div>
</div>

<?php include ('footer.php'); ?>