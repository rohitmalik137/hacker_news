<?php 
    require_once "hinit.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Hacker News</title>
</head>
<body>
    <header style="display: flex; justify-content: space-between;">
        <div></div>
        <div style="display: flex; justify-content: space-around;">
            <div style="font-size: larger;">
                <?php
                    global $database;
                    $my_username = Huser::get_my_username();
                ?>
                <strong><?php echo $my_username; ?></strong>
            </div>
            <form action="index.php" method="POST" style="margin-left: 20px;">
                <input type="submit" name="logout" value='logout' />
            </form>
        </div>
    </header>
</body>
</html>

<?php

    if(isset($_POST['logout'])){
        unset($_SESSION['uid']);
        header('location:login.php');
    }

?>