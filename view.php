<?php
include "db_conn.php";

if(isset($_GET["id"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    $sql = "SELECT * FROM `support` WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $ticket = mysqli_fetch_assoc($result); // Display ticket details here
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Ticket</title>
        </head>
        
        <body>
            <div class="container-wrapper">
                <div class="container">
                    <h1>Ticket Details</h1>
                    <p><strong>Ticket Number:</strong> <?php echo $ticket["id"]; ?></p>
                    <p><strong>Full Name:</strong> <?php echo $ticket["s_name"]; ?></p>
                    <p><strong>Student Number:</strong> <?php echo $ticket["s_number"]; ?></p>
                    <p><strong>Email:</strong> <?php echo $ticket["s_email"]; ?></p>
                    <p><strong>Issue Description:</strong> <?php echo $ticket["s_discription"]; ?></p>
                    <p><strong>Ticket Age:</strong> <?php echo calculateTimeElapsed($ticket["d_created"]); ?></p>
                    <p><strong>Type of Request:</strong> <?php echo $ticket["t_request"]; ?></p>

                    <form action="" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                    <label class="form-label"><strong>Ticket Status:</strong></label>
                            <select name="t_status" id="t_status">
                            <option value="Pending">Pending</option>
                            <option value="Assigned">Assigned</option>
                            <option value="Escalated">Escalated</option>
                            <option value="Resolved">Resolved</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>


                    <br />
                    <!-- Add Send and Delete buttons -->
                    <!-- <button onclick="sendEmail('<?php echo $ticket["s_email"]; ?>')">Send</button>  -->
                    <a href="#" class="link-dark" onclick="showConfirmation()">Delete</a>
                    <a href="itsupport.php" class="btn btn-danger">Back</a>
                    <button type="Save" class="btn btn-success" name="Save">Save</button>

                <script>
                    function validateForm() {
                        var t_status = document.getElementById("t_status").value;

                        return true;
                    }
                </script>
            </div>
        </body>
                <!-- Confirmation message -->
                <div class="confirmation" id="confirmationMessage">
                    <div class="confirmation-overlay"></div>
                    <div class="confirmation-box">
                        <div class="confirmation-message">
                            Are you sure you want to delete?
                            <br><br>
                            <div class="confirmation-buttons">
                                <button onclick="cancelDelete()" class="confirmation-button">No</button>
                                <a href="ticket_action.php?id=<?php echo $ticket["id"]; ?>" class="confirmation-button confirmation-button-yes">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function showConfirmation() {
                    // Show the confirmation message
                        document.getElementById('confirmationMessage').style.display = 'block';
                    }
                    function cancelDelete() {
                    // Hide the confirmation message if "No" is clicked
                        document.getElementById('confirmationMessage').style.display = 'none';
                    }
                </script>
            </div>
    </html>
    <!-- CSS styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ebd28f;
        }

        .container-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 900px; /* Fixed width */
            max-width: 900px; /* Adjust as needed */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background: linear-gradient(to bottom, #ddd, #999); /* Gradient background */
            margin: 20px auto; /* Center the container horizontally */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #343a40; /* Dark background color */
            color: #fff; /* White text color */
            text-decoration: none; /* No underlining */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        .btn:hover {
            background-color: #555; /* Darker background color on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
        .delete-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545; /* Bootstrap danger color */
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
            cursor: pointer;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }
        .link-dark {
            display: inline-block;
            padding: 8px 16px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .link-dark:hover {
            background-color: #c82333;
        }
        .confirmation {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .confirmation-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .confirmation-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .confirmation-buttons {
            text-align: center;
            font-weight: bold;
        }

        .confirmation-buttons {
            text-align: center;   
        }

        .confirmation-buttons button {
            margin-right: 10px;
        }
        .confirmation-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #ccc;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .confirmation-button:hover {
            background-color: #999;
        }

        .confirmation-button-yes {
            background-color: #d9534f;
            color: #fff;
        }

        .confirmation-button-yes:hover {
            background-color: #c9302c;
        }

    </style>

<?php
    } else {
        // If ticket does not exist, display an error message
        echo "Ticket not found.";
    }
    } else {
        // If ticket id is not provided, display an error message
        echo "No ticket id provided.";
    }
?>
