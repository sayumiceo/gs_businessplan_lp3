<?php
session_start();

// データベース接続情報
include '../inc/config.php';
$pdo = new PDO(DSN, DB_USER, DB_PASS);

// フォームからデータを受け取る
$name = $_POST['name'] ?? '';
$userid = $_POST['lid'] ?? '';
$password = $_POST['lpw'] ?? '';
$kanri_flg = $_POST['kanri_flg'] ?? '0'; // デフォルトは0（通常ユーザー）

// パスワードをハッシュ化
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL文を用意
$sql = "INSERT INTO user (name, lid, lpw, kanri_flg) VALUES (:name, :lid, :lpw, :kanri_flg)";

// プリペアドステートメント
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $userid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $hashed_password, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);

// 実行
try {
    $stmt->execute();
    $_SESSION['success'] = 'User registered successfully';
    header("Location: dashboard.php");
} catch (PDOException $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
    header("Location: registration_form.php");
    exit();
}
?>
