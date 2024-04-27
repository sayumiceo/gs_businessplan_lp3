<?php
session_start();

include '../inc/config.php';
// sschk();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head> 
<body>

<div class="cms-container">

<?php include 'sidebar.php'; ?>

<main class="content">

    <h1>Hi, <?php echo htmlspecialchars($_SESSION["name"]); ?>👋</h1>

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
        <div class="form-container">
            <fieldset>
                <legend>User Registration</legend>
                <label>Name: <input type="text" name="name"></label><br>
                <label>ID: <input type="text" name="lid"></label><br>
                <label>Password: <input type="password" name="lpw"></label><br>
                <label>Admin Flag:
                    <input type="radio" name="kanri_flg" value="0" checked> Staff
                    <input type="radio" name="kanri_flg" value="1"> Administrator
                </label><br>
                <input type="submit" value="Submit">
            </fieldset>
        </div>
    </form>

</main>
</div>

</body>
</html>
