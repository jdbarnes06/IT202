<!DOCTYPE html>

<html>
<head>
    <title>Chat Table Names</title>
</head>
<body>
    <?php
        $servername = "sql1.njit.edu";
        $username = "jb724";
        $password = "8hIzY0VU%brS";
        $dbname = "jb724";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_errno())
        {
            exit("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        $sql = "SELECT Name FROM ChatTable";

        $result = mysqli_query($con,$sql);

        echo "<table border='1px' cellpadding=5><tr><th>Name</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>" . $row["Name"] . "</td></tr>";
        }

        echo "</table>";
        
        mysqli_close($con);
    ?>        
</body>
</html>