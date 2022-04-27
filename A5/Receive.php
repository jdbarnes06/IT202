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

    $uname2 = $_GET["uname2"];

    $sql = "SELECT * FROM ChatTable WHERE Name = '$uname2'";

    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) > 0)
    {
	    $result = mysqli_query($con,"SELECT Message FROM ChatTable WHERE Name = '$uname2'");

        while ($row = mysqli_fetch_assoc($result))
        {
            echo $row["Message"];
        }
    }

    mysqli_close($con);
?>