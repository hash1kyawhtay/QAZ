# frontend/dashboard.php
<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}

function fetchApiData($endpoint) {
    $url = "http://localhost:9090/api.php?endpoint=$endpoint";
    $result = @file_get_contents($url);
    return $result ? json_decode($result, true) : null;
}

$data1 = fetchApiData('data1');
$data2 = fetchApiData('data2');
$data3 = fetchApiData('data3');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p><a href="index.php">Logout</a></p>

    <h3>Data 1</h3>
    <pre><?= json_encode($data1, JSON_PRETTY_PRINT) ?></pre>

    <h3>Data 2</h3>
    <pre><?= json_encode($data2, JSON_PRETTY_PRINT) ?></pre>

    <h3>Data 3</h3>
    <pre><?= json_encode($data3, JSON_PRETTY_PRINT) ?></pre>
</body>
</html>
