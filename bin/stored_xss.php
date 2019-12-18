<?php
require 'common.php';
if (isset($_POST['text'])) {
    global $db;
    $sql = "UPDATE `store` SET `value`=? WHERE `key`='stored_xss'";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_POST['text']);
    $stmt->execute();
}
$sql = "SELECT * FROM `store` WHERE `key`='stored_xss'";
$result = $db->query($sql);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stored XSS</title>
</head>
<body>
    <h1><?=$data['value']?></h1>
    <form action="stored_xss.php" method='POST'>
        <input type="text" name="text">
        <input type="submit">
    </form>
</body>
</html>