<?php
//Only shown when logged in
if (isset($_SESSION['id'])) {
    ?>
    <div class="upload">

        <div class="editblock">
            <h1>Upload</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Selecteer afbeelding:<br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>

                Titel:<br>
                <input type="text" name="description" id="description" style="width: 200px"/><br>

                <input type="submit" value="Upload Foto" name="submit">
                <input type="hidden" name="page" id="page" value="<?= $page; ?>">
            </form>
        </div>
    </div>

    <?php
}
?>

<div class="container">
    <?php $index = 1; ?>
    <?php foreach ($data as $index => $item) { ?>
        <!--    Pictures with description from db    -->
        <div class="data">
            <a class="story-small" href="<?= $item['picture-url']; ?>" data-lightbox="example-set"
               data-title="Click the right half of the image to move forward."><img class="example-image"
                                                                                    src="<?= $item['picture-url']; ?>"
                                                                                    alt=""/></a>
            <p><?= $item['description']; ?></p>
            <?php
            if (isset($_SESSION['id'])) {
                ?>
                <!--        Delete button, only showed when logged in        -->
                <form action="delete.php" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $item['id']; ?>"/>
                    <input type="hidden" name="page" id="page" value="<?= $page; ?>">
                    <input type="submit" value="Delete" name="submit">
                </form>

                <!--        Edit function, only showed when logged in      -->
                <form action="edit.php" method="post">
                    <input type="text" name="description" id="despription" style="width: 200px"/>
                    <input type="hidden" name="page" id="page" value="<?= $page; ?>">
                    <input type="hidden" id="id" name="id" value="<?= $item['id']; ?>"/>
                    <input type="hidden" id="picture-url" value="<?= $item['picture-url']; ?>">
                    <input type="submit" value="Edit Picture" name="submit">
                </form>
                <?php
            }
            ?>

        </div>
        <?php
        $index++;
    }
    ?>
</div>
