<?php

require_once "config.php";

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) 
{
		$id = trim($_REQUEST["id"]);
        $sql = "DELETE user_info, result FROM user_info INNER JOIN result on user_info.UserId = result.UserId WHERE user_info.UserId = ?";

		if ($stmt = mysqli_prepare($link, $sql)) 
		{
			mysqli_stmt_bind_param($stmt, "i", $param_id);

			$param_id = $id ;

			if (mysqli_stmt_execute($stmt)) 
			{
					?>
					<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/sandip/Project/index_page.php">					
					<?php
			} 
			else 
			{
				echo "Something went wrong. Please try again later.";
			}
		}

	mysqli_stmt_close($stmt);
	mysqli_close($link);
}
?>

