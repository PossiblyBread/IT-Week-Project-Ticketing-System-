<!-- delete ticket -->
<?php
include "db_conn.php";

    if(isset($_GET["id"])) {
        $id = mysqli_real_escape_string($conn, $_GET["id"]);

        // SQL query to delete the row with the provided id
        $sql = "DELETE FROM `support` WHERE id = $id";

        if(mysqli_query($conn, $sql)) {
            // If deletion is successful, redirect back to the original page
            header("Location: itsupport.php");
            exit;
        } 
        else {
            // If deletion fails, display an error message
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        // If id parameter is not provided, display an error message
        echo "No id parameter provided.";
}
?>

<!-- ticket status -->
<?php
include "db_conn.php";

if(isset($_GET["id"]) && isset($_GET["status"])) {
    // Sanitize the ticket id and status to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $t_status = mysqli_real_escape_string($conn, $_GET["status"]);

    // SQL query to update ticket status
    $sql = "UPDATE `support` SET t_status = '$t_status' WHERE id = $id";

    // Execute the SQL query
    if(mysqli_query($conn, $sql)) {
        echo "Ticket status updated successfully.";
    } else {
        echo "Error updating ticket status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid parameters.";
}
?>
