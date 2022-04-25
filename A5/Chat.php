<!DOCTYPE html>

<html>
<head>
    <title>Chat Application</title>
    <script src="Chat.js"></script>
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

        echo "<table border='1px' cellpadding=20><tr><th>Name</th>";
        
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<td>" . $row["Name"] . "</td>";
        }

        echo "</tr></table><br>";
        
        mysqli_close($con);
    ?>
    
    <form>
        <label for="username1">Name</label>
        <input type="text" id="username1"><br>

        <label for="password">Password</label>
        <input type="password" id="password"><br>

        <label for="msgsent">Message</label>
        <input type="text" id="msgsent" onkeyup="CreateXMLHTTPObj()">

        <p id="errormsg"></p>
    </form>

    <form>
        <label for="username2">Name</label>
        <input type="text" id="username2" onkeyup=""><br>

        <p>Message: <span id="msgrcvd"></span></p>
    </form>
</body>
</html>