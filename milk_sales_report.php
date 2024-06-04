<!DOCTYPE html>
<html>
<head>
    <title>Milk Sales Report</title>
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

        form label {
            margin-right: 10px;
        }

        form button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function showAlert() {
            alert("No data available for the specified dates.");
        }
    </script>
</head>
<body>
    <h1>Milk Sales Report</h1>
    <form method="GET" action="">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <button type="submit">Filter</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Sale Date</th>
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

                // Retrieve milk sales information from database based on selected dates
                if(isset($_GET['start_date']) && isset($_GET['end_date'])) {
                    $start_date = $_GET['start_date'];
                    $end_date = $_GET['end_date'];

                    $sql = "SELECT * FROM sold_milk WHERE sale_date BETWEEN '$start_date' AND '$end_date'";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) === 0) {
                        echo '<script type="text/javascript">showAlert();</script>';
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row["sale_date"]."</td>";
                            echo "<td>".$row["quantity"]."</td>";
                            echo "</tr>";
                        }
                    }
                }

                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
