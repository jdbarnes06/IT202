<!DOCTYPE html>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="LLAL.css">
</head>
<body>
    <div class="mainDiv">
        <form method="post">
            <h1>Lushest Lawns and Landscaping</h1>

            <div class="row">
                <div class="column">
                    <label for="firstname">First Name:</label>
                </div>
                <div class="column" style="opacity: 1">
                    <input type="text" id="firstname" name="firstname" placeholder="Required">                    
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="lastname">Last Name:</label>
                </div>
                <div class="column">
                    <input type="text" id="lastname" name="lastname" placeholder="Required">
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
                    <label for="idnumber">ID Number:</label>
                </div>
                <div class="column">
                    <input type="text" id="idnumber" name="idnumber" placeholder="Required">
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

            <input type="submit" onclick="validate()">
            <button type="reset">Reset</button>
        </form>
    </div>
    <script src="Home.js"></script>

    <?php
        $servername = "sql1.njit.edu";
        $username = "jb724";
        $password = "ejmUc3O1%#W7";
        $dbname = "jb724";

        $con = mysqli_connect($servername,$username,$password,$dbname);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $idnumber = $_POST['idnumber'];
        $phonenumber = $_POST['phonenumber'];
        $emailaddress = $_POST['emailaddress'];
        $transaction = $_POST['transaction'];

        $sql = "SELECT * FROM LandscaperRecords WHERE FirstName = '$firstname' AND LastName = '$lastname'
                AND Password = '$password' AND IDNumber = $idnumber";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0)
        {
            session_start();
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['password'] = $password;
            $_SESSION['idnumber'] = $idnumber;
            $_SESSION['phonenumber'] = $phonenumber;
            $_SESSION['emailaddress'] = $emailaddress;
        }

        $con->close();
    ?>
</body>
</html>