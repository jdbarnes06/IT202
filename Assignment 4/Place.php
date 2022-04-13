<!DOCTYPE html>

<html>
<head>
    <title>Place Order</title>
    <link rel="stylesheet" href="LLAL.css">
    <script src="Home.js"></script>
</head>
<body>
    <div class="mainDiv">
        <form name="orderform" method="post">
            <h1>Lushest Lawns And Landscaping: Place An Order</h1>

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

            <div class="row">
                <div class="column">
                    <label for="servicedate">Date of Service:</label>
                </div>
                <div class="column">
                    <input type="text" id="servicedate" name="servicedate" placeholder="Required">
                </div>
            </div>

            <input type="button" onclick="message()" value="Submit">
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
            $serviceid = $_POST['serviceid'];
            $producttype = $_POST['producttype'];

            $sql = "SELECT * FROM ClientRecords WHERE ClientFirst = '$clientfirst'
                    AND ClientLast = '$clientlast' AND ClientID = $clientid";
            $result = $con->query($sql);
        
            if ($result->num_rows > 0)
            {
                $sql = "SELECT * FROM ClientAppointments WHERE ClientID = $clientid";
                $result = $con->query($sql);

                if ($result->num_rows > 0)
                {

                }
                else 
                {
                    echo "<script> alert('Client cannot be found. Recheck data entered or create an account.'); </script>";
                }
            }
            else
            {
                echo "<script> alert('Client cannot be found. Recheck data entered or create an account.'); </script>";
            }

            $con->close();
        }
    ?>
</body>
</html>