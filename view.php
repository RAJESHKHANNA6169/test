
<?php
    if (isset($_GET['image'])) {
        $imagePath = $_GET['image'];
        echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
    } else {
        echo 'Image not found.';
    }
?>
