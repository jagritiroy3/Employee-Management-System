<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

$search_safe = mysqli_real_escape_string($conn, $search);

$sql = "SELECT * FROM employees
        WHERE name LIKE '%$search_safe%'
        OR email LIKE '%$search_safe%'
        OR department LIKE '%$search_safe%'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee List</title>

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
            transition: 0.3s;
        }

        .navbar a:hover {
            color: #60a5fa;
        }


        /* ================= CONTAINER ================= */

        .container {
            width: 90%;
            max-width: 1200px;

            margin: 40px auto;
        }

        .container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
        }


        /* ================= SEARCH ================= */

        .search-box {
            background: white;

            padding: 20px;

            border-radius: 10px;

            box-shadow: 0 3px 12px rgba(0,0,0,0.08);

            display: flex;

            gap: 10px;

            margin-bottom: 25px;
        }

        .search-box input {
            flex: 1;

            padding: 11px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;

            outline: none;
        }

        .search-box input:focus {
            border-color: #2563eb;

            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .search-btn {
            padding: 11px 20px;

            border: none;

            border-radius: 6px;

            background: #2563eb;

            color: white;

            font-size: 15px;

            cursor: pointer;
        }

        .search-btn:hover {
            background: #1d4ed8;
        }

        .clear-btn {
            display: inline-flex;

            align-items: center;

            padding: 11px 20px;

            background: #6b7280;

            color: white;

            text-decoration: none;

            border-radius: 6px;
        }

        .clear-btn:hover {
            background: #4b5563;
        }


        /* ================= ADD BUTTON ================= */

        .add-btn {
            display: inline-block;

            background: #16a34a;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 6px;

            margin-bottom: 20px;

            transition: 0.3s;
        }

        .add-btn:hover {
            background: #15803d;

            transform: translateY(-2px);
        }


        /* ================= TABLE ================= */

        .table-container {
            background: white;

            padding: 20px;

            border-radius: 10px;

            box-shadow: 0 3px 12px rgba(0,0,0,0.08);

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th {
            background: #1f2937;

            color: white;

            padding: 14px;

            text-align: left;
        }

        td {
            padding: 13px;

            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f5f9;
        }


        /* ================= EDIT ================= */

        .edit {
            color: #2563eb;

            text-decoration: none;

            font-weight: bold;

            margin-right: 10px;
        }

        .edit:hover {
            color: #1d4ed8;

            text-decoration: underline;
        }


        /* ================= DELETE ================= */

        .delete {
            color: #dc2626;

            text-decoration: none;

            font-weight: bold;
        }

        .delete:hover {
            color: #b91c1c;

            text-decoration: underline;
        }


        /* ================= DASHBOARD ================= */

        .dashboard-btn {
            display: inline-block;

            margin-top: 25px;

            background: #374151;

            color: white;

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 6px;

            transition: 0.3s;
        }

        .dashboard-btn:hover {
            background: #1f2937;
        }


        /* ================= NO EMPLOYEE ================= */

        .no-data {
            text-align: center;

            padding: 25px;

            color: #777;

            font-size: 16px;
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

            .container {
                width: 95%;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box input,
            .search-btn,
            .clear-btn {
                width: 100%;
            }

            table {
                font-size: 13px;
            }

            th,
            td {
                padding: 9px;
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


<!-- ================= MAIN CONTAINER ================= -->

<div class="container">

    <h1>
        Employee List
    </h1>


    <!-- ================= SEARCH ================= -->

    <form method="GET" class="search-box">

        <input
            type="text"
            name="search"
            placeholder="Search by name, email or department..."
            value="<?php echo htmlspecialchars($search); ?>"
        >

        <button
            type="submit"
            class="search-btn"
        >
            Search
        </button>

        <a
            href="view_employee.php"
            class="clear-btn"
        >
            Clear
        </a>

    </form>


    <!-- ================= ADD EMPLOYEE ================= -->

    <a
        href="add_employee.php"
        class="add-btn"
    >
        + Add Employee
    </a>


    <!-- ================= TABLE ================= -->

    <div class="table-container">

        <table>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Phone</th>

                <th>Department</th>

                <th>Salary</th>

                <th>Action</th>

            </tr>


            <?php

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <tr>

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['name']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['email']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['phone']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($row['department']); ?>
                </td>

                <td>
                    ₹<?php echo htmlspecialchars($row['salary']); ?>
                </td>

                <td>

                    <a
                        class="edit"
                        href="edit_employee.php?id=<?php echo $row['id']; ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="delete"
                        href="delete_employee.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this employee?');"
                    >
                        Delete
                    </a>

                </td>

            </tr>

            <?php

                }

            } else {

            ?>

            <tr>

                <td
                    colspan="7"
                    class="no-data"
                >
                    No employees found.
                </td>

            </tr>

            <?php

            }

            ?>

        </table>

    </div>


    <!-- ================= DASHBOARD ================= -->

    <a
        href="index.php"
        class="dashboard-btn"
    >
        ← Back to Dashboard
    </a>


</div>


</body>

</html>