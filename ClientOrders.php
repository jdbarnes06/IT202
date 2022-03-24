<!DOCTYPE html>

<html>
<head>
    <title>Client Orders</title>
    <link rel="stylesheet" href="LLALDB.css"/>
</head>
<body>
    <form>
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

            $sql = "SELECT ProductType, ShippingAddress, OrderNumber, LandscaperID, ClientID, ServiceID FROM ClientOrders";
            $result = $con->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<table><tr><th>Product Type</th><th>Shipping Address</th><th>Order Number</th>
                      <th>Landscaper ID</th><th>Client ID</th><th>Service ID</th></tr>";
            
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" .$row["ProductType"]. "</td><td>" .$row["ShippingAddress"]. "</td>
                          <td>" .$row["OrderNumber"]. "</td><td>" .$row["LandscaperID"]. "</td>
                          <td>" .$row["ClientID"]. "</td><td>" .$row["ServiceID"]. "</td></tr>";
                }
            
                echo "</table>";
            }
            else
            {
                echo "0 results";
            }
            $con->close();
        ?>

        <a class="lowerHome" href="https://web.njit.edu/~jb724/LLALDB.html">Home</a>
    </form>
</body>
</html>