<?php 
//0. SESSION開始！！
session_start();

include '../inc/config.php';

sschk();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>

<div class="cms-container">
    <?php include 'sidebar.php'; ?>

    <main class="content">
        <h1>Hi, <?php echo htmlspecialchars($_SESSION["name"]); ?> 👋</h1>

        <?php if ($_SESSION["kanri_flg"] == 1): ?>
            <!-- Administrator-only content -->
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
        <?php else: ?>
            <p>Thank you for your hard work🥰🌹</p>
        <?php endif; ?>
    </main>
</div>
</body>
</html>







    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.29/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>


</body>
</html>