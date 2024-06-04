<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Vaccination</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #666;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Insert Vaccination</h1>

        <?php
            // Get the form data
            $animal_id = $_POST["animal_id"];
            $vaccine_name = $_POST["vaccine_name"];
            $vaccination_date = $_POST["vaccination_date"];

            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Insert the vaccination into the database
            $sql = "INSERT INTO vaccinations (animal_id, vaccine_name, vaccination_date) VALUES ('$animal_id', '$vaccine_name', '$vaccination_date')";

            if (mysqli_query($conn, $sql)) {
                echo "<p>New vaccination added successfully!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            }

            // Close the connection
            mysqli_close($conn);
        ?>

        <div class="button-container">
            <a href="vaccination.php" class="button">Back to Vaccination Page</a>
            <a href="view_vaccinations.php" class="button">View Vaccination Page</a>
        </div>
    </div>
</body>
</html>
