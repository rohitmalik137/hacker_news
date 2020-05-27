<?php 
    session_start();
    if(!isset($_SESSION['uid']))
    {
        header('location:login.php');
    }
    require_once "hinit.php";
?>
<?php require_once 'header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <form action="index.php" method="POST" class="main">
        <textarea name="content" placeholder="Type a Comment..." rows="5" cols="100" class="textarea"></textarea>
    </form>
</body>
</html>