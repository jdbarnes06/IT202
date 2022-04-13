<!DOCTYPE html>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="LLAL.css">
    <script src="Home.js"></script>
</head>
<body>
    <div class="mainDiv">
        <form name="homeform" method="post">
            <h1>Lushest Lawns and Landscaping</h1>

            <div class="row">
                <div class="column">
                    <label for="landscaperfirst">First Name:</label>
                </div>
                <div class="column">
                    <input type="text" id="landscaperfirst" name="landscaperfirst" placeholder="Required">                    
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="landscaperlast">Last Name:</label>
                </div>
                <div class="column">
                    <input type="text" id="landscaperlast" name="landscaperlast" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="password">Password:</label>
                </div>
                <div class="column">
                    <input type="password" id="password" name="password" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="landscaperid">Landscaper ID:</label>
                </div>
                <div class="column">
                    <input type="text" id="landscaperid" name="landscaperid" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="phonenumber">Phone Number:</label>
                </div>
                <div class="column">
                    <input type="text" id="phonenumber" name="phonenumber" placeholder="Required">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="emailaddress">Email Address:</label>
                </div>
                <div class="column">
                    <input type="text" id="emailaddress" name="emailaddress">
                </div>
            </div>

            <input type="checkbox" id="emailconfirmation" name="emailconfirmation">
            <label for="emailconfirmation">Check the Box to Request an Email Confirmation:</label><br>

            <label for="transaction">Select a Transaction:</label>
            <select id="transaction" name="transaction">
                <option value="search a landscaper's accounts">Search a Landscaper's Accounts</option>
                <option value="book a customer's appointment">Book a Customer's Appointment</option>
                <option value="place a customer's order">Place a Customer's Order</option>
                <option value="update a customer's order">Update a Customer's Order</option>
                <option value="cancel a customer's appointment">Cancel a Customer's Appointment</option>
                <option value="cancel a customer's order">Cancel a Customer's Order</option>
                <option value="create a new customer account">Create a New Customer Account</option>
            </select><br>

            <input type="button" onclick="validate()" value="Submit">
            <button type="reset">Reset</button>
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

            $landscaperfirst = $_POST['landscaperfirst'];
            $landscaperlast = $_POST['landscaperlast'];
            $password = $_POST['password'];
            $landscaperid = $_POST['landscaperid'];
            $transaction = $_POST['transaction'];

            $sql = "SELECT * FROM LandscaperRecords WHERE LandscaperFirst = '$landscaperfirst'
                    AND LandscaperLast = '$landscaperlast' AND Password = '$password'
                    AND LandscaperID = $landscaperid";

            $result = $con->query($sql);
        
            if ($result->num_rows > 0)
            {
                session_start();
                $_SESSION['landscaperfirst'] = $landscaperfirst;
                $_SESSION['landscaperid'] = $landscaperid;

                switch ($transaction)
                {
                    case "search a landscaper's accounts":
                        echo "<script> location.href='Search.php'; </script>";
                    case "book a customer's appointment":
                        echo "<script> location.href='Book.php'; </script>";
                    case "place a customer's order":
                        echo "<script> location.href='Place.php'; </script>";
                    case "update a customer's order":
                        echo "<script> location.href='Update.php'; </script>";
                    case "cancel a customer's appointment":
                        echo "<script> location.href='CancelApp.php'; </script>";
                    case "cancel a customer's order":
                        echo "<script> location.href='CancelOrder.php'; </script>";
                    case "create a new customer account":
                        echo "<script> location.href='Create.php'; </script>";
                }
            }
            else
            {
                echo "<script> alert('Information does not match any records.'); </script>";
            }

            $con->close();
        }
    ?>
</body>
</html>