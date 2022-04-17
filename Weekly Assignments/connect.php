<?php
//Makes DB connection
$servername = "sql1.njit.edu";
$username = "jb724";
$password = "ejmUc3O1%#W7";
$dbname = "jb724";
$con = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    echo "CONNECTED ";
}
?>