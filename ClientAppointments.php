﻿<!DOCTYPE html>

<html>
<head>
    <title>Client Appointments</title>
</head>
<body>
    <?php
        $servername = "sql1.njit.edu";
        $username = "jb724";
        $password = "ejmUc3O1%#W7";
        $dbname = "jb724";
        $con = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql = "SELECT ServiceType, ServiceDate, LandscaperID, ClientID, ServiceID FROM ClientAppointments";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
            echo "<table><tr><th>Service Type</th><th>Service Date</th><th>Landscaper ID</th>
                  <th>Client ID</th><th>Service ID</th></tr>";
            
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" .$row["ServiceType"]. "</td><td>" .$row["ServiceDate"]. "</td>
                      <td>" .$row["LandscaperID"]. "</td><td>" .$row["ClientID"]. "</td>
                      <td>" .$row["ServiceID"]. "</td></tr>";
            }
            
            echo "</table>";
        }
        else
        {
            echo "0 results";
        }
        $con->close();
    ?>
</body>
</html>