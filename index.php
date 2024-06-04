<!DOCTYPE html>
<html>
<head>
    <title>Dairy Farm Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f0f0f0; */
            margin: 0;
            padding: 0;
           background-color: #00b3b3;
        }

        h1 {
            
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
            /* # */
            font-weight: 600;
            font-size: 40px;
            /* background: linear-gradient(135deg, #bdcdbd, #cfcfcf); */
            /* border-radius: 10px; */
            padding: 20px;
            padding-bottom: 40px;
            border-bottom: 5px solid;
        
        }

        nav {
            /* background-color: #007bff; */
            /* padding: 10px 0; */
            text-align: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        } 

        li {
            opacity: 0; /* Initially hide the buttons */
            animation: fadeIn 0.5s forwards; /* Apply fade-in animation */
            margin-bottom: 20px; /* Add margin between buttons */
        }

        a {
            text-decoration: none;
            color: #fff;
            
            padding: 10px 20px;
            border-radius: 5px;
            /* transition: 0.3s linear; */
            display: inline-block;
            border: 3px solid black; /* Add border */
            margin: 5px; /* Add margin to create space between buttons */
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2); /* Add shadow */
            /* # */
            font-size: 27px;
            font-weight: 700;
            padding: 17px 30px;
        }

        a:hover {
            /* background-color: #0056b3; */
            background-color: #2562db;
            outline: none;
            border: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px); /* Optional: Slide from top */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Dairy Farm Management System</h1>
        
    <nav>

    <ul>
            <li><a href="add_animal.php">Add Animal</a></li>
            <li><a href="record_milk_production.php">Record Milk Production</a></li>
            <li><a href="vaccination.php">Mark Vaccination</a></li>
            <li><a href="record_milk_sales.php">Record Milk Sales</a></li>
            <li><a href="view_reports.php">View Reports</a></li>
        </ul>

    </nav>
    

    <script>
        // JavaScript to delay the appearance of buttons
        document.addEventListener("DOMContentLoaded", function() {
            var buttons = document.querySelectorAll("nav ul li");
            buttons.forEach(function(button, index) {
                setTimeout(function() {
                    button.style.opacity = "1";
                }, (index + 1) * 200); // Adjust the delay time as needed
            });
        });
    </script>
</body>
</html>
