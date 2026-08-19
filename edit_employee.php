<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


include "db.php";

$message = "";

/* Check Employee ID */

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Employee ID is missing.");
}

$id = (int) $_GET['id'];

/* Fetch Employee */

$sql = "SELECT * FROM employees WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    die("Employee not found.");
}

$employee = mysqli_fetch_assoc($result);


/* Update Employee */

if (isset($_POST['update'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);

    $update_sql = "UPDATE employees SET
                    name = '$name',
                    email = '$email',
                    phone = '$phone',
                    department = '$department',
                    salary = '$salary'
                   WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {

        $message = "Employee Updated Successfully!";

        /* Fetch updated employee */

        $sql = "SELECT * FROM employees WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $employee = mysqli_fetch_assoc($result);

    } else {

        $message = "Update Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Employee</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .message {
            padding: 10px;
            margin-bottom: 15px;
            background: lightgreen;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Edit Employee</h1>

    <?php if ($message != "") { ?>

        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>

    <?php } ?>


    <form method="POST">

        <label>Name</label>

        <input
            type="text"
            name="name"
            value="<?php echo htmlspecialchars($employee['name']); ?>"
            required
        >


        <label>Email</label>

        <input
            type="email"
            name="email"
            value="<?php echo htmlspecialchars($employee['email']); ?>"
            required
        >


        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="<?php echo htmlspecialchars($employee['phone']); ?>"
        >


        <label>Department</label>

        <input
            type="text"
            name="department"
            value="<?php echo htmlspecialchars($employee['department']); ?>"
        >


        <label>Salary</label>

        <input
            type="number"
            name="salary"
            value="<?php echo htmlspecialchars($employee['salary']); ?>"
        >


        <button type="submit" name="update">
            Update Employee
        </button>

    </form>


    <a class="back" href="view_employee.php">
        ← Back to Employee List
    </a>

</div>

</body>

</html>