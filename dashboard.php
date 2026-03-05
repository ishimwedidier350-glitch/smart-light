<?php
session_start();

// Redirect to login if not logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

// Simulate sensor data (in real system, you would fetch from DB or IoT device)
$lightStatus = rand(0,1) ? "ON" : "OFF";  // 0 = OFF, 1 = ON
$brightness = rand(0,100);                 // 0-100%
$temperature = rand(20,30);                // 20-30°C
$motionDetected = rand(0,1) ? "Yes" : "No";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Smart Light System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .card { border:1px solid #ccc; padding:20px; margin:10px; display:inline-block; width:200px; }
        .status-on { color: green; font-weight:bold; }
        .status-off { color: red; font-weight:bold; }
        button { padding:10px 20px; margin-top:10px; cursor:pointer; }
    </style>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
<p>IoT Smart Light System Dashboard</p>

<div class="card">
    <h3>Light Status</h3>
    <p>Status: 
        <span class="<?php echo $lightStatus=='ON'?'status-on':'status-off'; ?>">
            <?php echo $lightStatus; ?>
        </span>
    </p>
    <p>Brightness: <?php echo $brightness; ?>%</p>
    <form method="post">
        <button name="toggle"><?php echo $lightStatus=='ON'?'Turn OFF':'Turn ON'; ?></button>
    </form>
</div>

<div class="card">
    <h3>Motion Sensor</h3>
    <p>Motion Detected: <?php echo $motionDetected; ?></p>
</div>

<div class="card">
    <h3>Temperature Sensor</h3>
    <p>Room Temp: <?php echo $temperature; ?> °C</p>
</div>

<br><br>
<a href="logout.php">Logout</a>

<?php
if(isset($_POST['toggle'])){
    $lightStatus = ($lightStatus=='ON') ? 'OFF' : 'ON';
    echo "<p>Light turned $lightStatus</p>";
}
?>

</body>
</html>