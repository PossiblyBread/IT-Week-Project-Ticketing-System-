<?php
    include "db_conn.php";

    if(isset($_GET['download_excel'])) {
        // Set headers to specify the content type and force download
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=MyData.xls");

        // Output the Excel file content
        echo '<table>
            <tr>
                <th>Ticket Number</th>
                <th>Full Name</th>
                <th>Student Number</th>
                <th>Email</th>
                <th>Issue Discription</th>
                <th>Ticket Age</th>
                <th>Type of Request</th>
                <th>Ticket Status</th>
            </tr>';

            $sql = "SELECT * FROM `support`";
            $result = mysqli_query($conn, $sql);

            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Output data rows
                echo '<tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["s_name"].'</td>
                    <td>'.$row["s_number"].'</td>
                    <td>'.$row["s_email"].'</td>
                    <td>'.$row["s_discription"].'</td>
                    <td>'.calculateTimeElapsed($row["d_created"]).'</td>
                    <td>'.$row["t_request"].'</td>
                    <td>'.$row["t_status"].'</td>
                </tr>';
            }

            echo '</table>';
        exit(); 

    }
?>
