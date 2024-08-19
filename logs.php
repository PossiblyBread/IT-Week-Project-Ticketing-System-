<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Add your CSS styling here or link to an external CSS file -->
    <title>IT Support Management</title>

</head>

<body>
    <div class="navbar">
        <h1>IT Support Management</h1>
        <span>Admin</span>
    </div>
    <div class="content">
        <div class="control-panel">
            <a href="#">Dashboard</a>
            <a href="#">Open</a>
            <a href="#">Solved</a>
            <a href="#">Closed</a>
            <a href="#">Pending</a>
            <a href="#">Unassigned</a>
            <a href="#">My Tickets</a>
            <a href="#">My Teams</a>
            <a href="#">Users</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="container">
            <?php
            // Check if there is any message in the URL
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                // Display a warning alert with the message
                echo '<div class="alert alert-warning" role="alert">
                ' . $msg . '
                </div>';
            }
            ?>
            <br />
            <!-- Button to create a new ticket -->
            <a href="ticketing.php" class="btn btn-dark mb-3">Create New Ticket</a>
            <a href="itsupport.php" class="btn btn-dark mb-3">back</a>

            <!-- Table to display tickets -->
            <table class="custom-table text-center">
                <thead style="background-color: #343a40; color: #fff;">
                    <tr>
                        <!-- Table column headers -->
                        <th class="grid-item">Ticket Number</th>
                        <th class="grid-item">Full Name</th>
                        <th class="grid-item">Student Number</th>
                        <th class="grid-item">Email</th>
                        <th class="grid-item">Issue Discription</th>
                        <th class="grid-item">Ticket Age</th>
                        <th class="grid-item">Type of Request</th>
                        <th class="grid-item">Ticket Status</th>
                        <th class="grid-item">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SQL query to select all tickets from the database
                    $sql = "SELECT * FROM `support`";
                    // Execute the query
                    $result = mysqli_query($conn, $sql);
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <!-- Table data for each ticket -->
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["s_name"] ?></td>
                            <td><?php echo $row["s_number"] ?></td>
                            <td><?php echo $row["s_email"] ?></td>
                            <td><?php echo $row["s_discription"] ?></td>
                            <td><?php echo calculateTimeElapsed($row["d_created"]); ?></td>   <!-- Call the PHP function to calculate time elapsed -->
                            <td><?php echo $row["t_request"] ?></td>
                            <td><?php echo "Pending" ?></td>  <!-- needs more modifiers -->
                            <td>
                                <!-- Dropdown menu for actions -->
                                <div class="dropdown">
                                    <button class="dropbtn">Actions</button>
                                    <div class="dropdown-content">
                                        <!-- Links for each action -->
                                        <a href="view.php?id=<?php echo $row["id"]; ?>" class="link-dark">View</a>
                                        <a href="deleteTicket_action.php?id=<?php echo $row["id"]; ?>" class="link-dark">Delete</a>
                                        <a href="edit.php?id=<?php echo $row_id; ?>" class="link-dark">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .navbar {
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid gainsboro;
    }

    .navbar h1 {
        margin: 0;
    }

    .navbar span {
        margin-right: 20px;
    }

    .content {
        flex: 1;
        display: flex;
    }

    .control-panel {
        height: 80%;
        width: 200px;
        background-color: #333;
        color: #fff;
        overflow-y: auto;
        padding-top: 2px;
    }

    .control-panel a {
        text-decoration: none;
        color: #fff;
        display: block;
        padding: 29.2px;
        padding-left: 30px;
        transition: background-color 0.3s;
        border-bottom: 3px solid gainsboro;
        border-radius: 10px;
    }

    .control-panel a:hover {
        background-color: #555;
    }

    /* .grid-container {
        display: table;
        margin-top: 20px;
    } */

    /* .grid-item {
        display: table-cell;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    } */

    .custom-table {
        width: 89vw;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .custom-table th,
    .custom-table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .custom-table thead {
        background-color: #343a40;
        color: #fff;
    }

    .custom-table tbody tr:hover {
        background-color: #f5f5f5;
    }


    /* 
    .alert {
        margin-top: 20px;
        margin-bottom: 0;
    }

    .btn-dark {
        background-color: #343a40;
        color: #fff;
    }

    .table {
        margin-top: 20px;
    }

    .link-dark {
        color: #000 !important;
    } */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Style for the dropdown button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
    }

    /* Style for the dropdown content */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Style for the dropdown links */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color on hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown content when the dropdown button is hovered over */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* add ticket */
    .btn-dark {
        background-color: #424242; /* Dark background color */
        color: #fff; /* White text color */
        padding: 10px 10px; /* Padding for the button */
        margin-left: 5px;
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* No underlining */
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }

    .btn-dark:hover {
        background-color: #555; /* Darker background color on hover */
        cursor: pointer; /* Change cursor to pointer on hover */
    }
</style>

</html>