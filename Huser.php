<?php
class Huser{
    public $id;
	public $username;
    public $password;
    
    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM users_info WHERE username = '{$username}' AND password = '{$password}'";
        $result = $database->query($sql);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
			return $result;
		}else{
			return false;
		}
    }

    public static function add_new_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "INSERT INTO `users_info`(`username`, `password`) VALUES ('{$username}','{$password}')";
        $result = $database->query($sql);
        if($result) return $result;
        return false;
    }

    public static function get_my_username(){
        global $database;
        $session_id = $_SESSION['uid'];
        $sql = "SELECT username FROM users_info WHERE id='{$session_id}'";
		$result = $database->query($sql);
		if (mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_assoc($result);
			return $data['username'];
		}
    }
}

$user = new Huser();

?>