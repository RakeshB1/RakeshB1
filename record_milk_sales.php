<!DOCTYPE html>
<html>
<head>
    <title>Record Milk Sales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        input[type="number"],
        input[type="date"] {
            width: calc(100% - 170px);
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Record Milk Sales</h1>
    <form action="record_milk_sales.php" method="post">
        <label for="quantity">Milk Quantity:</label>
        <input type="number" id="quantity" name="quantity"><br><br>
        <label for="sale_date">Sale Date:</label>
        <input type="date" id="sale_date" name="sale_date"><br><br>
        <input type="submit" value="Record Milk Sales">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $milk_quantity = $_POST["quantity"];
            $sale_date = $_POST["sale_date"];

            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

            // Check connection
            if (!$conn) {
                die("Connection failed: ". mysqli_connect_error());
            }

            // Insert milk sales information into database
            $sql = "INSERT INTO sold_milk (quantity, sale_date) VALUES ('$milk_quantity', '$sale_date')";
			if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Recorded Successfully!');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
