<?php

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    // echo "Connection failed!";
    die("Connection Failed " . mysqli_connect_error());
}
// echo "Connected Succesfully";

//creating ticket as a student
if (isset($_POST['submit'])) {
    $s_name = $_POST['s_name'];
    $s_number = $_POST['s_number'];
    $s_email = $_POST['s_email'];
    $s_discription = $_POST['s_discription'];
    $t_request = $_POST['t_request'];
    $t_status = $_POST['t_status'] = "Pending";

    $sql = "INSERT INTO `support`(`id`, `s_name`, `s_number`,`s_email`, `s_discription`, `t_request`, `t_status`) 
            VALUES (NULL,'$s_name','$s_number','$s_email','$s_discription','$t_request','$t_status')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:main.php? msg=New Ticket Created Succesfully!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

//for when creating ticket using admin
if (isset($_POST['Submit'])) {
    $s_name = $_POST['s_name'];
    $s_number = $_POST['s_number'];
    $s_email = $_POST['s_email'];
    $s_discription = $_POST['s_discription'];
    $t_request = $_POST['t_request'];
    $t_status = $_POST['t_status'] = "Pending";

    $sql = "INSERT INTO `support`(`id`, `s_name`, `s_number`,`s_email`, `s_discription`, `t_request`, `t_status`) 
            VALUES (NULL,'$s_name','$s_number','$s_email','$s_discription','$t_request','$t_status')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:itsupport.php? msg=New Ticket Created Succesfully!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

//status update
if(isset($_POST['Save'])) {

    $id = mysqli_real_escape_string($conn, $_GET["id"]);
   
    $t_status = $_POST['t_status'];

    $sql = "UPDATE `support` SET `t_status` = '$t_status' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: itsupport.php");
        exit(); // Always exit after redirecting
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}


date_default_timezone_set('Asia/Singapore');
// Function to calculate time elapsed
function calculateTimeElapsed($timestamp) {
    $now = time();
    $createdTime = strtotime($timestamp);
    
    $elapsed = $now - $createdTime;
    // Check if elapsed time is less than 1 day
    if ($elapsed < 86400) {
        $hours = floor($elapsed / 3600);
        $minutes = floor(($elapsed % 3600) / 60);
        $seconds = $elapsed % 60;
        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds); // Format as hours:minutes:seconds
    } else {
        $days = floor($elapsed / 86400);
        return $days . " day" . ($days != 1 ? "s" : ""); // Format as number of days
    }
}