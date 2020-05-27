<?php
    session_start();
    if(isset($_SESSION['uid']))
    {
        header('location:index.php');
    }
?>
<?php require_once "hinit.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
    <form action="login.php" method='POST'>
        <label>username:</label><input type="text" name='username' /><br><br>
        <label>password:</label><input type="password" name='password' /><br><br>
        <input type="submit" name="submit" value="login" />
    </form>
    <hr>
    <h3>Create Account</h3>
    <form action="login.php" method='POST'>
        <label>username:</label><input type="text" name='c_username' /><br><br>
        <label>password:</label><input type="password" name='c_password' /><br><br>
        <input type="submit" name="c_submit" value="create account" />
    </form>
</body>
</html>

<?php
    global $user;
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $user_found = Huser::verify_user($username, $password);

        if($user_found){
            $data = mysqli_fetch_assoc($user_found);
            $user->id = $data['id'];
			$_SESSION['uid'] = $user->id;
			header('location:index.php');
        }else{
			?><script>alert('Invalid Username or Password');</script><?php
		}

    }
    if(isset($_POST['c_submit'])){
        $username = trim($_POST['c_username']);
        $password = trim($_POST['c_password']);

        $new_user = Huser::add_new_user($username, $password);

        if($new_user){
            $user_found = Huser::verify_user($username, $password);
            if($user_found){
                $data = mysqli_fetch_assoc($user_found);
                $user->id = $data['id'];
                $_SESSION['uid'] = $user->id;
                header('location:index.php');
            }
        }else{
			?><script>alert('Error Occured!!');</script><?php
		}
    }

?>