<!DOCTYPE html>

<html >
<head>
    <title>Landscaper Records</title>
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

            $sql = "SELECT FirstName, LastName, Password, IDNumber, PhoneNumber, EmailAddress FROM LandscaperRecords";
            $result = $con->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<table><tr><th>First Name</th><th>Last Name</th><th>Password</th>
                      <th>ID Number</th><th>Phone Number</th><th>Email Address</th></tr>";
            
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" .$row["FirstName"]. "</td><td>" .$row["LastName"]. "</td>
                          <td>" .$row["Password"]. "</td><td>" .$row["IDNumber"]. "</td>
                          <td>" .$row["PhoneNumber"]. "</td><td>" .$row["EmailAddress"]. "</td></tr>";
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