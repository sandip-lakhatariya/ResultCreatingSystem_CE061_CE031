<?php

function grade(int $a){
    if($a > 90 && $a <= 100){
        return "AA";
    }
    elseif($a > 80){
        return "AB";
    }
    elseif($a > 70){
        return "BB";
    }
    elseif($a > 60){
        return "BC";
    }
    elseif($a>45){
        return "CC";
    }
    else{
        return "FAIL";
    }
}

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_pps = trim($_POST["pps"]);
    $pps = $input_pps;

    $input_maths = trim($_POST["maths"]);
    $maths = $input_maths;

    $input_physics = trim($_POST["physics"]);
    $physics = $input_physics;

    $input_hw = trim($_POST['hw']);
    $hw = $input_hw;

    $input_english = trim($_POST["english"]);
    $english = $input_english;

    $input_uid = trim($_POST["UserId"]);
    $UserId = $input_uid;

    $grade_pps = grade($pps);
    $grade_maths = grade($maths);
    $grade_physics = grade($physics);
    $grade_hw = grade($hw);
    $grade_english = grade($english);

    $total = $pps + $maths + $physics + $hw + $english;
    $percentage = $total / 5;
    $total_grade = grade($percentage);
    
    $sql = "INSERT INTO result ( PPS, PPS_GRADE, MATHS, MATHS_GRADE, PHYSICS, PHYSICS_GRADE, HW, HW_GRADE, ENGLISH, ENGLISH_GRADE, TOTAL, PERCENTAGE, GRADE, UserId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "isisisisisiisi",  $param_pps, $param_pps_grade, $param_maths, $param_maths_grade, $param_physics, $param_physics_grade, $param_hw, $param_hw_grade, $param_english, $param_english_grade,$param_total, $param_percentage, $param_grade, $param_id);
        
        $param_pps = $pps;
        $param_pps_grade = $grade_pps;
        $param_maths = $maths;
        $param_maths_grade = $grade_maths;
        $param_physics = $physics;
        $param_physics_grade = $grade_physics;
        $param_hw = $hw;
        $param_hw_grade = $grade_hw;
        $param_english = $english;
        $param_english_grade = $grade_english;
        $param_total = $total;
        $param_percentage = $percentage;
        $param_grade = $total_grade;
        $param_id = $UserId;

        if (mysqli_stmt_execute($stmt)) {
            ?>
			    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/index_page.php">					
			<?php
        } else {
           echo "<script>alert('Something went wrong. Please try again later.')</script>";
            ?>
			    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/create_result.php">					
			<?php
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} 
else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $UserId = trim($_GET["id"]);
    } 
}
?>

<?php 
    include('create_result.html');
?>

<div id="form">
<div class="head">
                <div class="heading">
                <i class="uil uil-file-plus-alt res"></i>
                    <h1>Create Result</h1>
        </div>
        </div>
    <div class="box">
    <form action="<?php echo basename($_SERVER['REQUEST_URI']); ?>" method="post">
        <label for="uid">Id : </label>
        <input type="number" name="UserId" id="UserId" class="textbox" value="<?php echo $UserId; ?>"><br><br>
        <label for="pps">PPS-II</label>
        <input type="number" name="pps" id="pps" class="textbox"><br><br>
        <label for="maths">MATHS-II</label>
        <input type="number" name="maths" id="maths" class="textbox"><br><br>
        <label for="physics">PHYSICS</label>
        <input type="Number" name="physics" id="physics" class="textbox"><br><br>
        <label for="hw">Hardware Workshop</label>
        <input type="number" name="hw" id="hw" class="textbox"><br><br>
        <label for="english">ENGLISH</label>
        <input type="number" name="english" id="english" class="textbox"><br><br>
        <button type="submit" name="submit" id="submit" onclick="return checkresult()">Submit</button>
        <button type="reset" name="cancel" id="cancel">Cancel</button>
    </form>
</div>
</div>

<script>
    function checkresult(){
        return confirm('Are you sure you want to create this result');
    }
</script>