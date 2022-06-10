<?php
include('loginpage.html');

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
					if (!empty($_POST["uid"]) and !empty($_POST["pwd"]) and isset($_POST["uid"]) and isset($_POST["pwd"]) ) {
						$uname = $_POST["uid"];
						$password = $_POST["pwd"];
						if ($uname == "DDU" and $password == "DDU") {
							session_start();
							$_SESSION[$uname] = "aam";
							$parts = explode("@", $uname);
							$param = urlencode(base64_encode($parts[0]));
							header("Location:index_page.php?uname=$param");
				
						} else {
							echo "<h1>Incorrect username and/or password. Please retry.</h1>";
						}
					} else {
						echo "<h1>Please enter username and password.</h1>";
					}
				
            }
        }
    }
?>