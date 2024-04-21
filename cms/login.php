<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Apply a font */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Style the container for the form */
.login-container {
    background-color: #fff;
    padding: 2em;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the form itself */
form {
    display: flex;
    flex-direction: column;
}

/* Style the heading */
h2 {
    color: #333;
    margin-bottom: 1em;
}

/* Style the form groups */
.form-group {
    margin-bottom: 1em;
}

/* Style the labels */
label {
    display: block;
    margin-bottom: .5em;
    color: #666;
}

/* Style the inputs */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: .5em;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
}

/* Style the submit button */
button {
    padding: .5em 1em;
    background-color: #88b8f8;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Change background color on hover */
button:hover {
    background-color: #0056b3;
}

</style>
<body>

    <div class="login-container">
        <form action="login_act.php" method="POST">
            <h2>Login</h2>
            <div class="form-group">
                <label for="userid">User ID:</label>
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