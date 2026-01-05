<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-wrapper">
    <div class="welcome-text">Selamat Datang</div>

    <div class="login-box">
        <h2>Login Admin</h2>
        <form method="post" action="proses_login.php">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>
