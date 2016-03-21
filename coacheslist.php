<?php include('head.php');
include('dbconnect.php');
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header ("Location: inlog.php");
} ?>

<div class="container">

<h2 class="overzichtTitle">Overzicht Coaches</h2>
<table class="coachesList">
    <thead>
    <tr>
        <th><strong>#</strong></th>
        <th><strong>Naam</strong></th>
        <th><strong>Omschrijving</strong></th>
        <th><strong>Foto</strong></th>
        <th><strong>Edit</strong></th>
        <th><strong>Delete</strong></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count=1;
    $sql="SELECT * FROM coaches;";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td>
                <?php echo $row["coaches_id"]; ?>
            </td>
            <td>
                <?php echo $row["coaches_name"]; ?>
            </td>
            <td class="tableDescription">
                <?php echo $row["coaches_description"]; ?>
            </td>
            <td>
                <?php echo $row["coaches_image"]; ?>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $row["coaches_id"]; ?>">Edit</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo $row["coaches_id"]; ?>">Delete</a>
            </td>
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>

<?php include ('footer.php'); ?>