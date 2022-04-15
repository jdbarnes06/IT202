<!DOCTYPE html>

<html>
<head>
    <title>Create Client Account</title>
    <link rel="stylesheet" href="LLAL.css">
</head>
<body>
    <ul>
        <li><a href="Home.php">Home</a></li>
        <li><a href="Search.php">Search Landscaper's Records</a></li>
        <li><a href="Book.php">Book Appointment</a></li>
        <li><a href="Place.php">Place Order</a></li>
        <li><a href="Update.php">Update Order</a></li>
        <li><a href="CancelApp.php">Cancel Appointment</a></li>
        <li><a href="CancelOrder.php">Cancel Order</a></li>
        <li><a href="Create.php">Create Client Account</a></li>
    </ul>

    <div class="mainDiv">
        <form method="post">
            <h1>Lushest Lawns And Landscaping: Create An Account</h1>

            <div class="row">
                <div class="column">
                    <label for="clientfirst">Client's First:</label>
                </div>
                <div class="column">
                    <input type="text" id="clientfirst" name="clientfirst" placeholder="Required">                    
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="clientlast">Client's Last:</label>
                </div>
                <div class="column">
                    <input type="text" id="clientlast" name="clientlast" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="clientid">Client ID:</label>
                </div>
                <div class="column">
                    <input type="text" id="clientid" name="clientid" placeholder="Required">
                </div>
            </div>

            <input type="submit">
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $servername = "sql1.njit.edu";
            $username = "jb724";
            $password = "ejmUc3O1%#W7";
            $dbname = "jb724";

            $con = mysqli_connect($servername,$username,$password,$dbname);

            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            $clientfirst = $_POST['clientfirst'];
            $clientlast = $_POST['clientlast'];
            $clientid = $_POST['clientid'];           

            $sql = "SELECT * FROM ClientRecords WHERE ClientFirst = '$clientfirst' AND ClientLast = '$clientlast' AND ClientID = $clientid";
            $result = $con->query($sql);

            if ($result->num_rows > 0)
            {               
                echo "<script> alert('Client already has an account.'); </script>";
            }
            else
            {
                $sql = "INSERT INTO ClientRecords (ClientFirst, ClientLast, ClientID) VALUES ('$clientfirst', '$clientlast', $clientid)";
                $result = $con->query($sql);

                echo "<script> alert('Client account created.'); </script>";                
            }              
     
            $con->close();
        }
    ?>
</body>
</html>