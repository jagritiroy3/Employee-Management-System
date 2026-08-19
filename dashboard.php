<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        .dashboard {
            background: white;
            width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .add {
            background: green;
        }

        .employees {
            background: blue;
        }

        .logout {
            background: red;
        }

    </style>

</head>

<body>

<div class="dashboard">

    <h1>Welcome to Admin Dashboard</h1>

    <p>
        Login successfully.
    </p>

    <p>
        Welcome,
        <?php echo htmlspecialchars($_SESSION['username']); ?>
    </p>

    <br>

    <!-- Add Employee -->

    <a href="add_employee.php" class="btn add">
        Add Employee
    </a>

    <!-- Employee List -->

    <a href="view_employee.php" class="btn employees">
    Employee List
    </a>
    <br>

    <!-- Logout -->

    <a href="logout.php" class="btn logout">
        Logout
    </a>

</div>

</body>

</html>