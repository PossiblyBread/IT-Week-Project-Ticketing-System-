<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $s_name = $_POST['s_name'];
    $s_number = $_POST['s_number'];
    $s_email = $_POST['s_email'];
    // $s_subject = $_POST['s_subject'];
    $s_discription = $_POST['s_discription'];
    $d_created = $_POST['d_created'];
    $t_request = $_POST['s_request'];

    $sql = "INSERT INTO `support`(`id`, `s_name`, `s_number`,`s_email`, `s_discription`, `d_created`,`t_request`) 
            VALUES (NULL,'$s_name','$s_number','$s_email','$s_discription','$d_created','$t_request')";

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="s_name" placeholder="Full Name">
                    </div>

                    <div class="col">
                        <label class="form-label">Student Number:</label>
                        <input type="text" class="form-control" name="s_number" placeholder="Student Number">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="s_email" placeholder="name@example.com">
                </div>


                <div class="mb-4">
                    <label class="form-label">Issue Discription:</label>
                    <input type="email" class="form-control" name="s_discription" placeholder="Reason on sending a ticket">
                </div>


                <div class="form-group mb-3">
                    <label>Type of Request:</label>&nbsp;
                    <input type="radio" class="form-check-input" name="t_request" id="SR" value="SR">
                    <label for="SR" class="form-input-label">Service Request</label>&nbsp;
                    <input type="radio" class="form-check-input" name="t_request" id=" IR" value="IR">
                    <label for="IR" class="form-input-label">Incident Report</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">


    </script>

</body>

</html>