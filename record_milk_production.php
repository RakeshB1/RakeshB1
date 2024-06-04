<!DOCTYPE html>
<html>
<head>
    <title>Record Milk Production</title>
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

        select,
        input[type="date"],
        input[type="number"] {
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
    <h1>Record Milk Production</h1>
    <form action="record_milk_production.php" method="post">
        <label for="animal_id">Select Animal:</label>
        <select id="animal_id" name="animal_id">
            <?php
                // Connect to database
                $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

                // Check connection
                if (!$conn) {
                    die("Connection failed: ". mysqli_connect_error());
                }

                // Retrieve animal list from database
                $sql = "SELECT * FROM animals";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                }

                mysqli_close($conn);
            ?>
        </select><br><br>
        <label for="production_date">Production Date:</label>
        <input type="date" id="production_date" name="production_date"><br><br>
        <label for="quantity">Milk Quantity:</label>
        <input type="number" id="quantity" name="quantity"><br><br>
        <input type="submit" value="Record Milk Production">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $animal_id = $_POST["animal_id"];
            $production_date = $_POST["production_date"];
            $milk_quantity = $_POST["quantity"];

            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

            // Check connection
            if (!$conn) {
                die("Connection failed: ". mysqli_connect_error());
            }

            // Insert milk production information into database
            $sql = "INSERT INTO milk_production (animal_id, production_date, quantity) VALUES ('$animal_id', '$production_date', '$milk_quantity')";
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
