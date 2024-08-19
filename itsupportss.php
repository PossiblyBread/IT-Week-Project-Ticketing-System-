<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSM Interface</title>
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
            height: 100%;
            width: 200px;
            background-color: #333;
            color: #fff;
            overflow-y: auto;
            padding-top: 20px;
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

        .itsm-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1150px;
            margin: 0 auto;
        }

        .itsm-form h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group label {
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        .form-groups {
            display: flex;
            justify-content: space-between;
        }

        .btn-submit,
        .btn-cancel {
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        /* .btn-submit {
            background-color: #4caf50;
        }

        .btn-cancel {
            background-color: #f44336;
        }

        .btn-submit:hover,
        .btn-cancel:hover {
            background-color: #45a049;
        } */

        .grid-container {
            display: table;
            /* Use table display for the container */
            width: 100%;
            /* Make the table take full width of the container */
            margin-top: 20px;
        }

        .grid-item {
            display: table-cell;
            /* Use table-cell display for the items */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>IT Support Management</h1>
        <span>Agent: K.I. Molinyawe</span>
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

        <div class="itsm-form">
            <h2>IT Service Management</h2>
            <!-- Your PHP code and logic can be included here -->
            <!-- For simplicity, I've kept the form as it is -->

            <!-- Add the grid container -->
            <div class="grid-container">
                <!-- Automatically add 10 grid items using JavaScript -->
                <div class="grid-item">SR/IR</div>
                <div class="grid-item">Ticket ID</div>
                <div class="grid-item">Email</div>
                <div class="grid-item">Created At</div>
                <div class="grid-item">Priority Level</div>
                <div class="grid-item">View</div>
                <div class="grid-item">Team</div>
                <div class="grid-item">Assigned Agent</div>
                <div class="grid-item">Level Priority</div>
                <div class="grid-item">Status</div>
                <div class="grid-item">Action</div>

            </div>

            <form id="itsmForm" onsubmit="saveSubmission(event)">
                <!-- Your existing form content goes here -->
            </form>
        </div>
    </div>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var gridContainer = document.querySelector('.grid-container');

            for (var i = 0; i < 0; i++) {
                var gridItem = document.createElement('div');
                gridItem.classList.add('grid-item');
                gridItem.textContent = 'Row ' + (i + 1);
                gridContainer.appendChild(gridItem);
            }
        });


        function saveSubmission(event) {

            event.preventDefault();
        }
    </script> -->

</body>

</html>