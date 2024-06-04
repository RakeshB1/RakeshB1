<!DOCTYPE html>
<html>
<head>
    <title>Add Animal</title>
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
            width: 100px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: calc(100% - 120px);
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
    <h1>Add Animal</h1>
    <form id="animalForm" action="add_animal.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter the Animal Name"><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder = "Enter Age of Animal"><br><br>
        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight" placeholder = "Weight of Animal"><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"><br><br>
        <input type="submit" value="Add Animal">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $age = $_POST["age"];
            $weight = $_POST["weight"];
            $dob = $_POST["dob"];

            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

            // Check connection
            if (!$conn) {
                die("Connection failed: ". mysqli_connect_error());
            }

            // Insert animal information into database
            $sql = "INSERT INTO animals (name, age, weight, dob) VALUES ('$name', '$age', '$weight', '$dob')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('New animal information added successfully!');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>
