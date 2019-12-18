<?php
require('common.php');
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage</title>
</head>
<body>
    <h1>Welcome! <?php echo $_SESSION['username']; ?></h1>
</body>
</html>