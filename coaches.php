<?php $pageName = "Coaches"; ?>
<?php include ('head.php'); ?>
<?php include ('dbconnect.php')?>

    <div class="jumbotron jumbotroncoaches">
        <div class="container coachesintro">
            <br><br>
            <p>Op deze pagina vind u een overzicht van de coaches die aangesloten zijn bij SamSam Uitvaartcoaching.</p>
        </div>
    </div>

    <div class="container">
        <div class="coaches">
            <?php
            $count = 1;
            // Run query
            $sql = "SELECT * FROM `coaches` WHERE `coaches_type` = 1";
            $result = $conn->query($sql);

            $rowcount=mysqli_num_rows($result);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $image = $row["coaches_image"];
                    $name = $row["coaches_name"];
                    $description = $row["coaches_description"];
                    $id = $row["coaches_id"];

                    if (($count === 1) || ($count === 4) || ($count === 7))  { // Start of a new row at 1st, 4th and 7th coach
                        echo '<div class="row">';
                    };

                    echo '<div class="col-md-4 coach">
                          <img class="ppic img-circle" src=' . $image . '>
                          <p class="coachnaam">' . $name . '</p>
                          <hr>
                          <p>' . $description . '</p>
                          </div>';

                    if (    ($count === 3)|| ($count === 6 ) || ($count === 9 )) { // End of a row at 3rd, 6th and 9th coach
                         echo '</div>';
                    };

                    $count++;
                }

            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>

<?php include ('footer.php'); ?>
