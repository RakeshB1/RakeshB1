<!DOCTYPE html>
<html>
<head>
    <title>Milk Production Report</title>
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

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function checkData() {
            var table = document.getElementById("reportTable");
            if (table.rows.length <= 1) {
                alert("No data available for the specified dates.");
                return false;
            }
        }
    </script>
</head>
<body>
    <h1>Milk Production Report</h1>
    <form method="GET" onsubmit="return checkData()">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <input type="submit" value="Filter">
    </form>
    <br>
    <table id="reportTable">
        <thead>
            <tr>
                <th>Animal Name</th>
                <th>Production Date</th>
                <th>Milk Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connect to database
                $conn = mysqli_connect("localhost", "root", "", "dairy_farm");

                // Check connection
                if (!$conn) {
                    die("Connection failed: ". mysqli_connect_error());
                }

                // Handle form submission
                $start_date = $_GET['start_date'] ?? null;
                $end_date = $_GET['end_date'] ?? null;

                // Retrieve milk production information from database based on selected dates
                if ($start_date && $end_date) {
                    $sql = "SELECT animals.name, milk_production.production_date, milk_production.quantity 
                            FROM animals 
                            INNER JOIN milk_production 
                            ON animals.id = milk_production.animal_id
                            WHERE milk_production.production_date BETWEEN '$start_date' AND '$end_date'";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["production_date"]."</td>";
                        echo "<td>".$row["quantity"]."</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
