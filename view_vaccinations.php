<!DOCTYPE html>
<html>
<head>
    <title>View Vaccinations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>View Vaccinations</h2>
    <table>
        <thead>
            <tr>
                <th>Animal ID</th>
                <th>Vaccine Name</th>
                <th>Vaccination Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connect to the database
                $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query to get all vaccinations
                $sql = "SELECT animal_id, vaccine_name, vaccination_date FROM vaccinations";
                $result = mysqli_query($conn, $sql);

                // Display each vaccination in a table row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["animal_id"] . "</td>";
                    echo "<td>" . $row["vaccine_name"] . "</td>";
                    echo "<td>" . $row["vaccination_date"] . "</td>";
                    echo "</tr>";
                }

                // Close the connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
