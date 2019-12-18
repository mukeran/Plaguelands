<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?php echo isset($_GET['title']) ? $_GET['title'] : 'title'; ?></h1>
    <form action="reflected_xss.php" method='GET'>
        <input type="text" name="title">
        <input type="submit">
    </form>
</body>
</html>