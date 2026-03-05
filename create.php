<?php
include("db.php");

if (isset($_POST['save'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username'";
    $add = mysqli_query($conn, $query);

    if ($add && mysqli_num_rows($add) > 0) {
        echo "$username already exists";
    } else {

        if (strlen($username) >= 5) {

            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users(username, password) VALUES ('$username','$password')";
            $add2 = mysqli_query($conn, $insert);

            if ($add2) {
                echo "Account created successfully!";
            }

        } else {
            echo "$username must have at least 5 characters!";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
<form method="post">
    <p><u>Create Account</u></p>
 <div class="username">
    <input type="text" name="username" placeholder="enter username" required><br><br>
 </div>
   <div class="password">
            <input type="password" placeholder="Password" name="password" required><br><br>
    </div>
     <div class="button">
            <button type="submit">Save</button> <br><br>
        </div>
   <a href="login.php">Login</a>
</form>
</body>
</html>
