<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <div class="login-container">
        <form action="login_act.php" method="POST">
            <h2>Login</h2>
            <div class="form-group">
                <label for="userid">UserID:</label>
                <input type="text" id="userid" name="lid" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="lpw" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>


</body>
</html>