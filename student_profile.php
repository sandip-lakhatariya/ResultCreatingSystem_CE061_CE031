<?php

    require_once "config.php";

    $sql = "SELECT  * FROM user_info WHERE UserId = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        session_start();
        
        $param_id = trim($_SESSION['uid']);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $fname = $row["FirstName"];
                $lname = $row["LastName"];
                $gender = $row["Gender"];
                $dob = $row["BirthDate"];
                $branch = $row["Branch"];
                $uid = $row["UserId"];
                $mobile = $row["MobileNumber"];
                $email = $row["Email"];
                $address = $row["Address"];

            } else {
                header("location: error.php");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    
    mysqli_close($link);

?>

<?php
    include('student_profile.html');
?>

<div class="box">
<div class="head">
    <div class="sp">
            <i class="uil uil-user-square main_icon"></i>
            <h1>Student Profile</h1>
</div>
            </div>
        <div class="alignname">
            <i class="uil uil-arrow-circle-right bullets"></i>
            <p class="name" id="student">Name : <span><?php echo "$lname"." "."$fname"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Date of Birth : <span><?php echo "$dob"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Gender : <span><?php echo "$gender"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Branch : <span><?php echo "$branch"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">ID No : <span><?php echo "$uid"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Mobile No : <span><?php echo "$mobile"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Email : <span><?php echo "$email"; ?></span></p>
            <i class="uil uil-angle-double-right icon"></i>
            <p class="name">Address : <span><?php echo "$address"; ?></span></p>
        </div>
    </div>