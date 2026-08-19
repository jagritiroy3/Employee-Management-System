<?php


session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $sql = "DELETE FROM employees WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        header("Location: view_employee.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }

} else {

    echo "Employee ID is missing.";

}

?>