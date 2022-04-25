<!DOCTYPE html>

<html>
<head>
    <title>Receive a Chat Message</title>
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

        mysqli_close($con);
    ?>        
</body>
</html>