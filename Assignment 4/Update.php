<!DOCTYPE html>

<html>
<head>
    <title>Update Order</title>
    <link rel="stylesheet" href="LLAL.css">
    <script>
        function updateMessage()
        {
            if (confirm("You are about to update this order. Continue?") == false)
            {
                return 0;
            }
        }
    </script>
</head>
<body>
    <div class="mainDiv">
        <form method="post">
            <h1>Lushest Lawns And Landscaping: Place An Order</h1>

            <div class="row">
                <div class="column">
                    <label for="clientid">Client ID:</label>
                </div>
                <div class="column">
                    <input type="text" id="clientid" name="clientid" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="serviceid">Service ID:</label>
                </div>
                <div class="column">
                    <input type="text" id="serviceid" name="serviceid" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="producttype">Product Needed:</label>
                </div>
                <div class="column">
                    <input type="text" id="producttype" name="producttype" placeholder="Required">
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

            $clientid = $_POST['clientid'];

            $sql = "SELECT * FROM ClientOrders WHERE ClientID = $clientid";
            $result = $con->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<script> updateMessage(); </script>";     
                
                if () // Condition to check return value of updateMessage()
                {
                    exit("Update canceled.");
                }
            }

            echo "<script> alert('Not exiting.'); </script>";

            $con->close();
        }
    ?>
</body>
</html>