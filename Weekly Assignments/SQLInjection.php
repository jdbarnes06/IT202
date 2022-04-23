<!DOCTYPE html>

<html>
<head>
    <title>SQL Injection</title>
</head>
<body>
    <form method="post">
        <label for="sname"><b>Student Name</b></label>
        <input type="text" name="sname">
        <input type="submit">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $servername = "sql1.njit.edu";
            $username = "jb724";
            $password = "8hIzY0VU%brS";
            $dbname = "jb724";

            $con = mysqli_connect($servername,$username,$password,$dbname);

            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $sname = $_POST['sname'];
            $sql = "SELECT * FROM Student WHERE Name = '$sname'";
            $result = $con->query($sql);

            echo $sql;
            echo "<table border='1px' cellpadding=5>";
            echo "<tr><td>Name</td><td>ID</td><td>Major</td></tr>";
        
            if ($result->num_rows > 0)
            {                 
                while ($row = $result->fetch_assoc()) 
                {
                    echo "<tr>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Major"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
        
            $con->close();
        }
    ?>
</body>
</html>