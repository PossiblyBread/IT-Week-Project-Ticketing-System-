<?php
include "db_conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Ticket Submission Form</title>
</head>

<body>
    <nav>
        Ticket Submission Form
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Ticket Form</h3>
            <p class="text-muted">Complete the form below to send a ticket.</p>
        </div>

        <div class="container">
            <form action="" method="post" onsubmit="return validateForm()">

        <!-- Added "onsubmit" attribute to the form element to call the validateForm() function before submission -->
        <div class="form-group">
            
            <div>
                <label class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="s_name" id="s_name" placeholder="Full Name" required>
                <!-- Added "required" attribute to make this field mandatory -->
            </div>

            <div>
                <label class="form-label">Student Number:</label>
                <input type="text" class="form-control" name="s_number" id="s_number" placeholder="Student Number" required>
                <!-- Added "required" attribute to make this field mandatory -->
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="s_email" id="s_email" placeholder="name@example.com" required>
            <!-- Added "required" attribute to make this field mandatory -->
        </div>

        <div class="mb-4">
            <label class="form-label">Issue Description:</label>
            <input type="text" class="form-control-issue" name="s_discription" id="s_discription" placeholder="Reason for sending a ticket" required>
            <!-- Added "required" attribute to make this field mandatory -->
        </div>

        <div class="form-group">
            <label class="form-label">Type of Request:</label>
            <input type="radio" class="form-check-input" name="t_request" id="Service_Request" value="Service Request" required>
            <!-- Added "required" attribute to make this field mandatory -->
            <label for="Service_Request" class="form-check-label">Service Request</label>
            <input type="radio" class="form-check-input" name="t_request" id="Incident_Report" value="Incident Report" required>
            <!-- Added "required" attribute to make this field mandatory -->
            <label for="Incident_Report" class="form-check-label">Incident Report</label>
        </div>

        <div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <a href="main.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>

    <script>
        function validateForm() {
            var s_name = document.getElementById("s_name").value;
            var s_number = document.getElementById("s_number").value;
            var s_email = document.getElementById("s_email").value;
            var s_discription = document.getElementById("s_discription").value;

            if (s_name == "" || s_number == "" || s_email == "" || s_discription == "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
        </div>
    </div>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: lightseagreen;
    }

    nav {
        background-color: lightskyblue;
        text-align: left;
        font-size: 1.5rem;
        padding: 1rem;
    }

    /* .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
        height: 500%;
    } */
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
        height: 80vh;
        /* Adjust the percentage as needed */
        display: flex;
        flex-direction: column;
        /* Change flex direction to column */
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    .form-control-issue {
        width: 100%;
        height: 50%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-check-label {
        margin-right: 20px;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
</style>

</html>