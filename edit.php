<?php
include('head.php');
include('dbconnect.php');
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
header ("Location: inlog.php");}


$id=$_REQUEST['id'];
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
        $id=$_REQUEST['coaches_id'];
        $name =$_REQUEST['coaches_name'];
        $age =$_REQUEST['coaches_description'];
        $update="update new_record set name='".$name."', age='".$age."', submittedby='".$submittedby."' where id='".$id."'";
        mysqli_query($update) or die(mysqli_error());
        $status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
        echo '<p>'.$status.'</p>';
    } else { ?>
    <div>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
            <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
            <p><input type="text" name="age" placeholder="Enter Age" required value="<?php echo $row['age'];?>" /></p>
            <p><input name="submit" type="submit" value="Update" /></p>
        </form>
        <?php } ?>
    </div>
</div>