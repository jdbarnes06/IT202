<!DOCTYPE html>

<html>
<head>
    <title>Place Order</title>
    <link rel="stylesheet" href="LLAL.css">
    <script src="Home.js"></script>
</head>
<body>
    <div class="mainDiv">
        <form method="post">
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

            <input type="submit" onclick="message()">
        </form>
    </div>
</body>
</html>