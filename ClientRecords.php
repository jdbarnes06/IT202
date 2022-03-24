<!DOCTYPE html>

<html>
<head>
    <title>Client Records</title>
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

            $sql = "SELECT FirstName, LastName, ClientID FROM ClientRecords";
            $result = $con->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<table><tr><th>First Name</th><th>Last Name</th><th>Client ID</th></tr>";
            
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" .$row["FirstName"]. "</td><td>" .$row["LastName"]. "</td>
                          <td>" .$row["ClientID"]. "</td></tr>";
                }
            
                echo "</table>";
            }
            else
            {
                echo "0 results";
            }
            $con->close();
        ?>
    </form>
</body>
</html>