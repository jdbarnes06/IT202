<!DOCTYPE html>

<html>
<head>
    <title>Update Order</title>
    <link rel="stylesheet" href="LLAL.css">
    <script src="Home.js"></script>
</head>
<body>
    <div class="mainDiv">
        <form name="updateform" method="post">
            <h1>Lushest Lawns And Landscaping: Place An Order</h1>

            <input type="hidden" id="confirm" name="confirm" value="false" />

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
                    <label for="ordernumber">Order ID:</label>
                </div>
                <div class="column">
                    <input type="text" id="ordernumber" name="ordernumber" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="producttype">Updated Order:</label>
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

            $confirm = $_POST['confirm'];

            if ($confirm == "false")
            {
                $clientid = $_POST['clientid'];
                $ordernumber = $_POST['ordernumber'];
                $producttype = $_POST['producttype'];

                session_start();
                $_SESSION['clientid'] = $clientid;
                $_SESSION['ordernumber'] = $ordernumber;
                $_SESSION['producttype'] = $producttype;

                $sql = "SELECT * FROM ClientOrders WHERE ClientID = $clientid AND OrderNumber = $ordernumber";
                $result = $con->query($sql);

                if ($result->num_rows > 0)
                {
                    echo "<script> updateMessage(); </script>";
                }
                else
                {
                    echo "<script> alert('Order not found.'); </script>";
                }
            }
            else
            {
                session_start();
                $clientid = $_SESSION['clientid'];
                $ordernumber = $_SESSION['ordernumber'];
                $producttype = $_SESSION['producttype'];
                $sql = "UPDATE ClientOrders SET ProductType = '$producttype' WHERE ClientID = $clientid AND OrderNumber = $ordernumber";
                $result = $con->query($sql);
                echo "<script> alert('Order updated.'); </script>";               
            }

            $con->close();
        }
    ?>
</body>
</html>