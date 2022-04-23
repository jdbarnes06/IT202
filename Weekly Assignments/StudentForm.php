<!DOCTYPE html>

<html>
<head>
    <title>Student Form</title>
</head>
<body>
    <form method="post">
        <label for="id"><b>Student ID</b></label>
        <input type="text" name="id"><br>
        <input type="submit">
    </form>

    <?php
        $servername = "sql1.njit.edu";
        $username = "jb724";
        $password = "8hIzY0VU%brS";
        $dbname = "jb724";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $id = $_POST['id'];
        $sql = "SELECT ID FROM Student WHERE ID = $id";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0)
        {
            session_start();
            $_SESSION['ID'] = $id;
            echo "<script> location.href='StudentInfo.php'; </script>";
        }
        
        $con->close();
    ?>  
</body>
</html>