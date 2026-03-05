<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$username = mysqli_real_escape_string($conn,$username);

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn,$query);

if($result && mysqli_num_rows($result)>0){

$row = mysqli_fetch_assoc($result);

if(password_verify($password,$row['password'])){

$_SESSION['username'] = $row['username'];

header("Location: dashboard.php");
exit();

}else{
echo "Wrong password";
}

}else{
echo "User not found";
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

</head>
<body>
<form method="post">
 <h3><u>LOGIN</u></h3>
<input type="text" name="username" placeholder="Enter username" required>
<br><br>

<input type="password" name="password" placeholder="Enter password" required>
<br><br>

<button type="submit" name="login">Login</button>

<br><br>

<a href="create.php">Create account</a>
</form>

</body>
</html>