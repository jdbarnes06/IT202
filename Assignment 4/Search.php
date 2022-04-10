﻿<!DOCTYPE html>

<html>
<head>
    <title>Search Landscaper's Records</title>
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
        
        session_start();
        $firstname = $_SESSION['firstname'];
        
        $sql = "SELECT LandscaperRecords.FirstName, LandscaperRecords.LastName, LandscaperRecords.IDNumber, 
                LandscaperRecords.PhoneNumber, LandscaperRecords.EmailAddress, ClientRecords.FirstName, 
                ClientRecords.LastName, ClientRecords.ClientID, ClientOrders.ShippingAddress, 
                ClientAppointments.ServiceType, ClientAppointments.ServiceDate, ClientAppointments.ServiceID,
                ClientOrders.ProductType, ClientOrders.OrderNumber
                FROM ClientAppointments
                INNER JOIN LandscaperRecords ON ClientAppointments.LandscaperID = LandscaperRecords.IDNumber
                INNER JOIN ClientRecords ON ClientAppointments.ClientID = ClientRecords.ClientID
                INNER JOIN ClientOrders ON ClientAppointments.ServiceID = ClientOrders.ServiceID
                WHERE LandscaperRecords.FirstName = '$firstname'";

        $result = $con->query($sql);
        
        if ($result->num_rows > 0)
        {
            echo "<table><tr><th>Landscaper First Name</th><th>Landscaper Last Name</th><th>Landscaper ID</th>
                  <th>Landscaper Phone</th><th>Landscaper Email</th><th>Customer First Name</th>
                  <th>Customer Last Name</th><th>Customer ID</th><th>Customer Address</th>
                  <th>Type of Service</th><th>Service Date</th><th>Service ID</th><th>Product Needed</th>
                  <th>Product Order ID</th></tr>";
            
            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>".$row["LandscaperRecords.FirstName"]."</td>
                          <td>".$row["LandscaperRecords.LastName"]."</td>
                          <td>".$row["LandscaperRecords.IDNumber"]."</td>
                          <td>".$row["LandscaperRecords.PhoneNumber"]."</td>
                          <td>".$row["LandscaperRecords.EmailAddress"]."</td>
                          <td>".$row["ClientRecords.FirstName"]."</td>
                          <td>".$row["ClientRecords.LastName"]."</td>
                          <td>".$row["ClientRecords.ClientID"]."</td>
                          <td>".$row["ClientOrders.ShippingAddress"]."</td>
                          <td>".$row["ClientAppointments.ServiceType"]."</td>
                          <td>".$row["ClientAppointments.ServiceDate"]."</td>
                          <td>".$row["ClientAppointments.ServiceID"]."</td>
                          <td>".$row["ClientOrders.ProductType"]."</td>
                          <td>".$row["ClientOrders.OrderNumber"]."</td></tr>";
            }
            
            echo "</table>";
        }
        
        $con->close();
    ?>
</body>
</html>