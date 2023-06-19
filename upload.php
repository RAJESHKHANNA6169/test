<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['image'])) {
            $targetDir = 'uploads/';
            $targetFile = $targetDir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false) {
                echo 'File is an image - ' . $check['mime'] . '.';
                $uploadOk = 1;
            } else {
                echo 'File is not an image.';
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                echo 'Sorry, file already exists.';
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES['image']['size'] > 500000) {
                echo 'Sorry, your file is too large.';
                $uploadOk = 0;
            }

            // Allow only certain file formats
            if (
                $imageFileType !== 'jpg' &&
                $imageFileType !== 'jpeg' &&
                $imageFileType !== 'png' &&
                $imageFileType !== 'gif'
            ) {
                echo 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed.';
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk === 0) {
                echo 'Sorry, your file was not uploaded.';
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    echo 'The file

                    was uploaded successfully.';
                } else {
                echo 'Sorry, there was an error uploading your file.';
                }
                }
                } else {
                echo 'No file was selected.';
                }
                }
                ?>