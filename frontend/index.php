# frontend/index.php
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($user === 'admin' && $pass === 'password') {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
