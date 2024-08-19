<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $s_name = $_POST['s_name'];
    $s_number = $_POST['s_number'];
    $s_email = $_POST['s_email'];
    // $s_subject = $_POST['s_subject'];
    $s_discription = $_POST['s_discription'];
    $t_request = $_POST['s_request'];

    $sql = "INSERT INTO `support`(`id`, `s_name`, `s_number`, `s_email`, `s_discription`, `t_request`) 
            VALUES (NULL,'$s_name','$s_number','$s_email','$s_discription','$t_request')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:istsupport.php?msg=New Ticket Created Succesfully!");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticketing Form</title>
</head>

<body>
    <div class="ticket-form">
        <img class="image-at" src="img/st.gif" alt="Your Image Description">
        <h2>Ticket Submission Form</h2>
        <!-- <form id="submit"> -->
        <!-- <form id="submit" onsubmit="saveSubmission(event)"> -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="s_name" required>
        </div>
        <div class="form-group">
            <label for="studentNumber">Student Number:</label>
            <input type="text" name="s_number">
        </div>
        <div class="form-group">
            <div class="email-group">
                <label for="email">Email:</label>
                <input type="email" name="s_email" required>
            </div>
        </div>
        <!-- <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div> -->
        <div class="form-group">
            <label for="issueDescription">Issue Description:</label>
            <textarea name="s_discription" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Type of Request:</label>
            <div>
                <label for="incident">
                    <input type="radio" name="t_request" value="Incident" required>
                    Incident Report
                </label>
            </div>
            <div>
                <label for="service">
                    <input type="radio" name="t_request" value="Service" required>
                    Service Request
                </label>
            </div>
        </div>
        <!-- <div class="form-group">
                <label for="priorityLevel">Priority Level:</label>
                <select id="priorityLevel" name="priorityLevel">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Urgent">Urgent</option>
                </select>
            </div> -->
        <div class="form-groups">
            <button type="submit" class="btn-submit" name="submit">Submit</button>
            <button type="button" class="btn-cancel" onclick="goBack()">Cancel</button>
        </div>
        </form>
    </div>

    <!-- <script>
        function saveSubmission(event) {
            event.preventDefault();

            var name = document.getElementById("name").value;
            var studentNumber = document.getElementById("studentNumber").value;
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;
            var issueDescription = document.getElementById("issueDescription").value;
            var requestType = document.querySelector('input[name="s_request"]:checked').value;
            var priorityLevel = document.getElementById("priorityLevel").value;

            var formData = {
                s_name: name,
                s_number: studentNumber,
                s_email: email,
                s_subject: subject,
                s_discription: issueDescription,
                s_request: requestType,
                priorityLevel: priorityLevel,
            };

            var formDataJSON = JSON.stringify(formData);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "your_server_endpoint.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log("Form data sent successfully");
                }
            };

            

            document.getElementById("subbmit").reset(); 
        }

        function goBack() {
            window.history.back();
        }
    </script> -->


</body>
<style>
    body {
        background-image: linear-gradient(to bottom right, #007bff, #00bfff);
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .image-at-one {
        position: relative;
        top: 10%;
        left: 10%;
        width: 5%;

    }

    .ticket-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea,
    .form-group select {
        width: calc(100% - 12px);
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 12px;
    }

    .form-groups select {
        cursor: pointer;
    }

    .form-groups .btn-submit,
    .form-groups .btn-cancel {
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-groups .btn-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .form-groups .btn-cancel {
        background-color: #ccc;
        color: #000;
        border: none;
        margin-right: 10px;
    }

    .form-groups .btn-submit:hover {
        background-color: #0056b3;
    }

    .form-groups .btn-cancel:hover {
        background-color: #999;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .email-group {
        display: flex;
        align-items: flex-start;
    }

    .email-group label {
        margin-right: -90px;
        flex: 0 0 90px;
        margin-top: -3px;
    }

    .email-group input[type="email"] {
        flex: 1;
        width: calc(100% - 100px);
        margin-top: 20px;
    }
</style>

</html>