<html>
    <style>
        table{
            border: 2px solid black;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border-collapse: collapse;
            width: 1250px;
        }
        th, td{
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #f2f2f2
            }

        th {
            background-color: #2c6776;
            color: white;
        }

    </style>
    <link rel="stylesheet" href="header.css">
    <body>
    <div class="header">
            <img src="logo1.jpe" style="float: left; width: 75px; height: 75px;">
            <a href="#default" class="logo">Dharmsinh Desai University</a>
            <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="create_user.php">Create User</a>
            <a href="logout.php" onclick="return checklogout()">Logout</a>
          </div>
        </div>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Create Result</th>
                    <th>Show Result</th>
                    <th>Delete Record</th>
                </tr>
                <?php

                    require_once "config.php";

                    $sql = "SELECT * FROM user_info";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['UserId'] . "</td>";
                                echo "<td>" . $row['FirstName'] . "</td>";
                                echo "<td>" . $row['BirthDate'] . "</td>";
                                echo "<td>" . $row['MobileNumber'] . "</td>";
                                echo "<td>" . $row['Email'] . "</td>";
                                echo "<td>" . "<a href='create_result.php?id=" . $row['UserId'] . "'>Create Result</a>" . "</td>";
                                echo "<td>" . "<a href='result.php?id=" . $row['UserId'] . "'>Show Result</a>" . "</td>";
                                echo "<td>" . "<a href='delete_record.php?id= $row[UserId] ' onclick = 'return checkdelete()'>Delete</a>" . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo '<em>No records were found.</em>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                        
                    mysqli_close($link);
                ?>
        
            </table>
            <script>
            function checkdelete(){
                return confirm('Are you sure you want to delete this record');
            }
        
            function checklogout(){
                return confirm('Are you sure you want to log out');
            }
            </script>
        </div>
        
    </body>
</html>



