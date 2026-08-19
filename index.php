<?php

session_start();

include "db.php";

$sql = "SELECT COUNT(*) AS total FROM employees";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

$total_employees = $data['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="navbar">

        <h2>Employee Management</h2>

        <div>

            <a href="dashboard.php">
                Dashboard
            </a>

            <a href="add_employee.php">
                Add Employee
            </a>

            <a href="view_employee.php">
                Employees
            </a>

            <a href="logout.php">
                Logout
            </a>

        </div>

    </div>


    <div class="container">

        <h1>Dashboard</h1>

        <?php if (isset($_SESSION['username'])) { ?>

    <p>
        Welcome,
        <?php echo htmlspecialchars($_SESSION['username']); ?>
    </p>

        <?php } else { ?>

    <p>
        Welcome to Employee Management System
    </p>

        <?php } ?>

        <br>


        <div class="dashboard-card">

            <h2>Total Employees</h2>

            <h1>
                <?php echo $total_employees; ?>
            </h1>

        </div>

        <br>


        <a href="add_employee.php" class="btn">
            + Add Employee
        </a>


        <a href="view_employee.php" class="btn">
            View Employees
        </a>

    </div>

</body>

</html>