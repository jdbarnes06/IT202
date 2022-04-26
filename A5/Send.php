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

    $uname1 = $_GET["uname1"];
    $pwd = $_GET["pwd"];
    $msg = $_GET["msg"];

    $sql = "SELECT * FROM ChatTable WHERE Name = '$uname1' AND Password = $pwd";

    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) == 0)
    {
        echo "Incorrect Credentials";
    }
    else
    {
        mysqli_query($con,"UPDATE ChatTable SET Message = '$msg' WHERE Name = '$uname1'");
    }

    mysqli_close($con);
?>