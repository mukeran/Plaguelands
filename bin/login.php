<?php
require('common.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if ($query === false) {
        die($db->error);
    }
    $num = $query->num_rows;
    if ($num != 0) {
        $_SESSION['username'] = $username;
        header('Location: manage.php');
        exit(0);
    } else {
        print('Wrong username or password');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="username"><br>
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>
</html>
