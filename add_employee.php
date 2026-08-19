 <?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$message = "";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees
            (name, email, phone, department, salary)
            VALUES
            ('$name', '$email', '$phone', '$department', '$salary')";

    if (mysqli_query($conn, $sql)) {

        $message = "Employee Added Successfully!";

    } else {

        $message = "Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }


        /* ================= NAVBAR ================= */

        .navbar {
            background: #1f2937;
            padding: 18px 50px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }


        .navbar h2 {
            color: white;
        }


        .navbar-links {
            display: flex;
            align-items: center;
        }


        .navbar a {
            color: white;
            text-decoration: none;

            margin-left: 20px;

            font-size: 15px;

            transition: 0.3s;
        }


        .navbar a:hover {
            color: #60a5fa;
        }


        /* ================= FORM CONTAINER ================= */

        .form-container {

            width: 500px;

            max-width: 90%;

            margin: 50px auto;

            background: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }


        .form-container h1 {

            text-align: center;

            margin-bottom: 30px;

            color: #1f2937;
        }


        /* ================= SUCCESS MESSAGE ================= */

        .success {

            background: #dcfce7;

            color: #166534;

            padding: 12px;

            border-radius: 6px;

            text-align: center;

            margin-bottom: 20px;

            font-weight: bold;
        }


        /* ================= FORM ================= */

        .form-group {

            margin-bottom: 18px;
        }


        .form-group label {

            display: block;

            margin-bottom: 7px;

            font-weight: bold;

            color: #374151;
        }


        .form-group input {

            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;

            outline: none;

            transition: 0.3s;
        }


        .form-group input:focus {

            border-color: #2563eb;

            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }


        /* ================= BUTTON ================= */

        .add-btn {

            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 6px;

            background: #2563eb;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }


        .add-btn:hover {

            background: #1d4ed8;

            transform: translateY(-2px);
        }


        /* ================= BOTTOM LINKS ================= */

        .links {

            text-align: center;

            margin-top: 25px;
        }


        .links a {

            display: inline-block;

            text-decoration: none;

            color: white;

            background: #374151;

            padding: 10px 16px;

            border-radius: 6px;

            margin: 5px;

            transition: 0.3s;
        }


        .links a:hover {

            background: #1f2937;

            transform: translateY(-2px);
        }


        /* ================= MOBILE ================= */

        @media (max-width: 700px) {

            .navbar {

                padding: 15px;

                flex-direction: column;

                gap: 15px;
            }


            .navbar-links {

                flex-wrap: wrap;

                justify-content: center;
            }


            .navbar a {

                margin: 5px 8px;
            }


            .form-container {

                width: 90%;

                margin: 30px auto;

                padding: 25px;
            }

        }

    </style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

<div class="navbar">


    <h2>
        Employee Management
    </h2>


    <div class="navbar-links">

        <a href="index.php">
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


<!-- ================= ADD EMPLOYEE FORM ================= -->

<div class="form-container">


    <h1>
        Add Employee
    </h1>


    <?php

    if ($message != "") {

        echo "<div class='success'>";
        echo htmlspecialchars($message);
        echo "</div>";

    }

    ?>


    <!-- ONLY ONE FORM -->

    <form method="POST">


        <!-- NAME -->

        <div class="form-group">

            <label>
                Name
            </label>

            <input
                type="text"
                name="name"
                placeholder="Enter employee name"
                required
            >

        </div>


        <!-- EMAIL -->

        <div class="form-group">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Enter email"
                required
            >

        </div>


        <!-- PHONE -->

        <div class="form-group">

            <label>
                Phone
            </label>

            <input
                type="text"
                name="phone"
                placeholder="Enter phone number"
            >

        </div>


        <!-- DEPARTMENT -->

        <div class="form-group">

            <label>
                Department
            </label>

            <input
                type="text"
                name="department"
                placeholder="Enter department"
            >

        </div>


        <!-- SALARY -->

        <div class="form-group">

            <label>
                Salary
            </label>

            <input
                type="number"
                name="salary"
                placeholder="Enter salary"
            >

        </div>


        <!-- SUBMIT BUTTON -->

        <button
            type="submit"
            name="submit"
            class="add-btn"
        >
            Add Employee
        </button>


    </form>


    <!-- ================= LINKS ================= -->

    <div class="links">

        <a href="view_employee.php">
            Employee List
        </a>


        <a href="index.php">
            Dashboard
        </a>

    </div>


</div>


</body>

</html> 