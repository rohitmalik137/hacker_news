<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <form action="index.php" method="POST" class="main">
        <textarea name="content" placeholder="Type a Comment..." rows="5" cols="100" class="textarea"></textarea>
        <input type="submit" name="post" value="Post Comment" class="post" />
    </form>
</body>
</html>

<?php

    if(isset($_POST['post'])){
        $content = trim($_POST['content']);
        Huser::add_user_post($content);
    }

?>