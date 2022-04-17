<!DOCTYPE html>

<html>
<head>
    <title>Student Info</title>
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
        $id = $_SESSION['ID'];
        $sql = "SELECT Student.Name, Student.ID, Student.Major, Transcript.Course, Transcript.Grade
        FROM Student
        INNER JOIN Transcript ON Student.ID = Transcript.ID WHERE Student.ID = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) 
        {
            echo "<table border='1px' cellpadding=5>";
            echo "<tr><td>Name</td><td>ID</td><td>Major</td><td>Course</td><td>Grade</td></tr>";
        
            while ($row = $result->fetch_assoc()) 
            {
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Major"] . "</td>";
                echo "<td>" . $row["Course"] . "</td>";
                echo "<td>" . $row["Grade"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        $con->close();
    ?>

    <a style="background-color: black; text-decoration: none; color: white; 
              padding: 5px; position: relative; top: 10px;" 
              href="https://web.njit.edu/~jb724/StudentForm.php">Home</a>
</body>
</html>