<?php
if (isset($_FILES['file'])) {
    if ($_FILES['file']['type'] != 'image/png') {
        die('Not a PNG');
    }
    $path = 'upload/'.basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        die('Successfully uploaded file to '.$path);
    } else {
        die('Failed!');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit">
    </form>
</body>
</html>