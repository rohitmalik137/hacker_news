<?php 
    session_start();
    if(!isset($_SESSION['uid']))
    {
        header('location:login.php');
    }
    require_once "hinit.php";
?>
<?php require_once 'header.php' ?>
<?php require_once 'add_post.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="posts_list">
        <?php
            $list_of_posts = Huser::get_user_posts();
            if($list_of_posts){
                $count = 1;
                while($rows = mysqli_fetch_assoc($list_of_posts)){
                    $posts[] = $rows;
                }
                $posts = array_reverse($posts);
                foreach($posts as $rows){
                    // $array_list = mysqli_fetch_assoc($list_of_posts);
                    ?>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                        <div>
                            <div style="font-size: larger;">
                                <strong><?php echo $count.".  ".$rows['username']; ?></strong>
                            </div>
                            <div style="padding-left: 20px;">
                                <?php echo $rows['content']; ?>
                            </div>
                        </div>

                        <div>
                            <div>
                                <i class="fa fa-thumbs-up" style="font-size:20px;color:green; margin-right:10px;"></i>
                                <?php echo $rows['upvote']." upvotes"; ?>
                            </div>
                            <div>
                                <i class="fa fa-thumbs-down" style="font-size:20px;color:red; margin-right:10px;"></i>
                                <?php echo $rows['downvote']." downvotes"; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $count++;
                }
            }
        ?>
    </div>
</body>
</html>