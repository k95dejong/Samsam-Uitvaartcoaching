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
        <?php
        //run the query
        $sql = "SELECT * FROM `coaches` WHERE `coaches_type` = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $image = $row["coaches_image"];
            $name = $row["coaches_name"];
            $description = $row["coaches_description"];

            echo '<div class="row">
                    <div class="coaches">
                        <div class="col-md-4 coach">
                            <img class="ppic  img-circle" src=' . $image . '>
                            <p class="coachnaam">' . $name . '</p>
                            <hr>
                            <p>' . $description . '</p>
                        </div>';
        }

        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

        </div>
    </div>

<?php include ('footer.php'); ?>
