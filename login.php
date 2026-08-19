<?php

session_start();

include "db.php";

$message = "";
$message_type = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users 
            WHERE username = '$username' 
            AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['username'];

        $message = "Login Successfully!";
        $message_type = "success";

    } else {

        $message = "Invalid username or password";
        $message_type = "error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="stylesheet" href="style.css">

    <?php if ($message_type == "success") { ?>
        <meta http-equiv="refresh" content="2;url=dashboard.php">
    <?php } ?>

</head>

<body>

    <div class="form-container">

        <h1>Admin Login</h1>

        <br>

        <?php if ($message != "") { ?>

            <p class="<?php echo $message_type; ?>">
                <?php echo $message; ?>
            </p>

        <?php } ?>

        <form method="POST">

            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>

            <button
                type="submit"
                name="login"
                class="form-btn"
            >
                Login
            </button>

        </form>

    </div>

</body>

</html>