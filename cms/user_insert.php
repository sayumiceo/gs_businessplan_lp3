<?php
//$_SESSION使うよ！
session_start();

include '../key.php';
// sschk();


//1. POSTデータ取得
$name      = filter_input(INPUT_POST, "name");
$lid       = filter_input(INPUT_POST, "lid");
$lpw       = filter_input(INPUT_POST, "lpw");
$kanri_flg = filter_input(INPUT_POST, "kanri_flg");

$lpw_hashed = password_hash($lpw, PASSWORD_DEFAULT);

//2. DB接続します
// $pdo = db_conn();

try {
    // データベース接続
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//３．データ登録SQL作成
$sql = "INSERT INTO cms_users(name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, :kanri_flg, 0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw_hashed, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$status = $stmt->execute();


//４．データ登録処理後
if ($status) {
    header("Location: user.php");
    exit;
} else {
    $error = $stmt->errorInfo();
    throw new Exception("SQL Error: " . $error[2]);
}
} catch (Exception $e) {
echo "Exception Message: " . $e->getMessage();
exit;
}

?>