<?php
include('loginpage.html');

require_once "config.php";

    if(($_SERVER['REQUEST_METHOD'] == "POST")){
    	if(empty($_POST['captcha'])){
            	echo "<script>alert('Please enter the captcha')</script>";
    	}
        else{
            session_start();
            $captcha_code = $_SESSION['CAPTCHA_CODE'];
            if($captcha_code != $_POST['captcha']){
                echo "<script>alert('Invalid Captcha')</script>";
            }
            else{
				if (!empty($_POST["uid"]) and !empty($_POST["pwd"]) and isset($_POST["uid"]) and isset($_POST["pwd"])) {
					$uid = $_POST["uid"];
					$pwd = $_POST["pwd"];
			
					$sql = "SELECT * FROM user_info WHERE UserId='$uid' AND BirthDate='$pwd'";
			
					$result = mysqli_query($link, $sql);
			
					if (mysqli_num_rows($result) === 1) {
			
						$row = mysqli_fetch_assoc($result);
			
						if ($row['UserId'] === $uid && $row['BirthDate'] === $pwd) {
			
						session_start();
						$_SESSION['uid'] = $row['UserId'];
						$_SESSION['pwd'] = $row['BirthDate'];
						$parts = explode("@", $uname);
						$param = urlencode(base64_encode($parts[0]));
						header("Location:student_profile.php?uname=$param");
			
					} else {
						echo "<h1>Incorrect username and/or password. Please retry.</h1>";
					}
				} else {
					echo "<h1>Please enter username and password.</h1>";
				}
			}
				
            }
        }
    }
?>