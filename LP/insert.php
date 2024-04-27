<?php include '../inc/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">


</head>

<style>
    .confirmation-message {
        padding: 20px;
        margin: 140px auto;
        max-width: 600px;
        color: #333; 
        text-align: center;
        font-size: 1.1em; 
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .confirmation-message {
            margin: 20px 10px; 
            padding: 20px 10px; 
        }
    }

</style>

<body>

<?php include 'template/header.php'; ?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーティリティ関数を定義
    function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // フォームからのデータを取得してサニタイズ
    $name = sanitizeInput($_POST['name']);
    $email = filter_var(sanitizeInput($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = sanitizeInput($_POST['message']);
    $agree = isset($_POST['agree']) ? 1 : 0;  // チェックボックスがチェックされているか

    // サニタイズ後のバリデーション
    if (!$email) {
        die('Invalid email format');
    }

    // DB接続
    try {
     
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

        // データベースにデータを挿入
        $sql = "INSERT INTO contactus (name, email, message, agree, indate) VALUES (:name, :email, :message, :agree, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);
        $stmt->bindValue(':agree', $agree, PDO::PARAM_INT);
        $stmt->execute();

        // 処理後にユーザーをリダイレクト
        // header("Location: thank_you.php");
        echo '<div class="confirmation-message">Thank you for your message. It has been sent.</div>';

    } catch (PDOException $e) {
        exit("Database error: " . $e->getMessage());
    }
} else {
    echo '<div class="confirmation-message">Please submit the form.</div>';
}
?>

<?php include 'template/footer.php'; ?>

</body>
</html>

