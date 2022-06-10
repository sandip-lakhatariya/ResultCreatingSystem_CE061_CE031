<?php

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

    require_once "config.php";

    $sql = "SELECT  * FROM user_info INNER JOIN result on user_info.UserId = result.UserId WHERE result.UserId = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $fname = $row["FirstName"];
                $lname = $row["LastName"];
                $pps = $row["PPS"];
                $pps_grade = $row["PPS_GRADE"];
                $maths = $row["MATHS"];
                $maths_grade = $row["MATHS_GRADE"];
                $physics = $row["PHYSICS"];
                $physics_grade = $row["PHYSICS_GRADE"];
                $hw = $row["HW"];
                $hw_grade = $row["HW_GRADE"];
                $english = $row["ENGLISH"];
                $english_grade = $row["ENGLISH_GRADE"];
                $total = $row["TOTAL"];
                $percentage = $row["PERCENTAGE"];
                $grade = $row["GRADE"];
            } else {
                ?>
					<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/index_page.php">					
				<?php
                echo "<script>alert('Result not found !')</script>";
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
} else {
    header("location: error.php");
    exit();
}
?>

<?php
    include('result.html');
?>

<div class="result">
    <div class="head">
        <div class="heading">
        <i class="uil uil-university ulogo"></i>
<h1>Dharmsinh Desai University</h1>
</div>
</div>

<div class="result_box">
<table>
        <tr>
            <th style = "width: 25%">Name</th>
            <td colspan = "3"><?php echo "$lname"." "."$fname"; ?></td>
        </tr>
        <tr>
            <th >ID No.</th>
            <td style = "width : 30%"><?php echo $param_id; ?></td>
            <th style = "width : 30%">Semester</th>
            <td style = "width : 15%">Second</td>
        </tr>

        <tr style = "height : 15px">    
        </tr>
        <tr>
            <th>Subject</th>
            <th>Total Marks</th>
            <th>Marks Obtained</th>
            <th>Grade</th>
        </tr>
        <tr >
            <td >PPS</td>
            <td>100</td>
            <td><?php echo $pps; ?></td>
            <td><?php echo $pps_grade; ?></td>
        </tr>
        <tr>
            <td>MATHS</td>
            <td>100</td>
            <td><?php echo $maths; ?></td>
            <td><?php echo $maths_grade; ?></td>
        </tr>
        <tr>
            <td>PHYSICS</td>
            <td>100</td>
            <td><?php echo $physics; ?></td>
            <td><?php echo $physics_grade; ?></td>
        </tr>
        <tr>
            <td>HW</td>
            <td>100</td>
            <td><?php echo $hw; ?></td>
            <td><?php echo $hw_grade; ?></td>
        </tr>
        <tr>
            <td>ENGLISH</td>
            <td>100</td>
            <td><?php echo $english; ?></td>
            <td><?php echo $english_grade; ?></td>
        </tr>
        <tr style = "height : 15px">   
        <tr>
            <th style = "width : 20%">Total</th>
            <td><?php echo $total; ?></td>
            <th>Out Of</th>
            <td>500</td>
        </tr>
        <tr>
            <th>Percentage</th>
            <td><?php echo $percentage; ?></td>
            <th>Grade</th>
            <td><?php echo $grade; ?></td>
        </tr>
        </table>
</div>
</div>
