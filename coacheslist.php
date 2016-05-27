<?php
session_start();
if(!isset($_SESSION['login'])) {
    header ("Location: inlog.php");
}

include('head.php');
include('dbconnect.php'); ?>

<div class="container">

<h2 class="overzichtTitle">Overzicht Coaches<a class="plusSign" href="newcoach.php">+</a></h2>
<table class="coachesList">
    <thead>
    <tr>
        <th><strong>Naam</strong></th>
        <th><strong>Omschrijving</strong></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Retrieve coaches from database query
    $sql="SELECT * FROM coaches;";
    $result = $conn->query($sql);
    // List of coaches with links to edit pages
    while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td class="tableCoachname">
                <?php echo $row["coaches_name"]; ?>
            </td>
            <td class="tableDescription">
                <?php echo $row["coaches_description"]; ?>
            </td>
            <td>
                <a href="upload.php?id=<?php echo $row["coaches_id"]; ?>">Upload foto</a>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $row["coaches_id"]; ?>">Bewerk</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row["coaches_id"]; ?>">Verwijder</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include ('footer.php'); ?>