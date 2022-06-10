<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_uid = trim($_POST["uid"]);
    $UserId = $input_uid;

    $input_fname = trim($_POST["fname"]);
    $FirstName = $input_fname;

    $input_lname = trim($_POST["lname"]);
    $LastName = $input_lname;

    $input_gen = trim($_POST["gen"]);
    $Gender = $input_gen;

    $input_bday = trim($_POST['bday']);
    $BirthDate = $input_bday;

    $input_branch = trim($_POST["branch"]);
    $Branch = $input_branch;

    $input_phone = trim($_POST["phone"]);
    $MobileNumber = $input_phone;

    $input_email = trim($_POST["email"]);
    $Email = $input_email;

    $input_address = trim($_POST["address"]);
    $Address = $input_address;

    $sql = "INSERT INTO user_info (UserId, FirstName, LastName, Gender, BirthDate, Branch, MobileNumber, Email, Address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
    
        mysqli_stmt_bind_param($stmt, "issssssss", $param_id, $param_fname, $param_lname, $param_gender, $param_bday, $param_branch, $param_mobile, $param_email, $param_address);

        $param_id = $UserId;
        $param_fname = $FirstName;
        $param_lname = $LastName;
        $param_gender = $Gender;
        $param_bday = $BirthDate;
        $param_branch = $Branch;
        $param_mobile = $MobileNumber;
        $param_email = $Email;
        $param_address = $Address;

        if (mysqli_stmt_execute($stmt)) {
            ?>
			    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/index_page.php">					
			<?php
        } else {
            echo "<script>alert('Something went wrong. Please try again later.')</script>";
            ?>
			    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/create_user.php">					
			<?php
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}
?>

<?php 
include('create_user.html');
?>
