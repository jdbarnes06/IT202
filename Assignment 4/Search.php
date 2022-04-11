<!DOCTYPE html>

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
        $landscaperfirst = $_SESSION['landscaperfirst'];
        
        $sql = "SELECT LandscaperRecords.LandscaperFirst, LandscaperRecords.LandscaperLast,
                LandscaperRecords.LandscaperID, LandscaperRecords.PhoneNumber, LandscaperRecords.EmailAddress,
                ClientRecords.ClientFirst, ClientRecords.ClientLast, ClientRecords.ClientID,
                ClientOrders.ShippingAddress, ClientAppointments.ServiceType, ClientAppointments.ServiceDate,
                ClientAppointments.ServiceID, ClientOrders.ProductType, ClientOrders.OrderNumber
                FROM ClientAppointments
                INNER JOIN LandscaperRecords ON ClientAppointments.LandscaperID = LandscaperRecords.LandscaperID
                INNER JOIN ClientRecords ON ClientAppointments.ClientID = ClientRecords.ClientID
                INNER JOIN ClientOrders ON ClientAppointments.ServiceID = ClientOrders.ServiceID
                WHERE LandscaperRecords.LandscaperFirst = '$landscaperfirst'";

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
                echo "<tr><td>".$row["LandscaperFirst"]."</td>
                          <td>".$row["LandscaperLast"]."</td>
                          <td>".$row["LandscaperID"]."</td>
                          <td>".$row["PhoneNumber"]."</td>
                          <td>".$row["EmailAddress"]."</td>
                          <td>".$row["ClientFirst"]."</td>
                          <td>".$row["ClientLast"]."</td>
                          <td>".$row["ClientID"]."</td>
                          <td>".$row["ShippingAddress"]."</td>
                          <td>".$row["ServiceType"]."</td>
                          <td>".$row["ServiceDate"]."</td>
                          <td>".$row["ServiceID"]."</td>
                          <td>".$row["ProductType"]."</td>
                          <td>".$row["OrderNumber"]."</td></tr>";
            }
            
            echo "</table>";
        }
        
        $con->close();
    ?>
</body>
</html>