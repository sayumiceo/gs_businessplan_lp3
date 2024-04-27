<?php
// 最初にSESSIONを開始！ココ大事！
session_start();

// POSTデータの受取
$userid = $_POST['lid'] ?? '';
$password = $_POST['lpw'] ?? '';

// データベース接続
include '../inc/config.php';

$pdo = new PDO(DSN, DB_USER, DB_PASS);

// ユーザー認証クエリ
$stmt = $pdo->prepare("SELECT * FROM cms_users WHERE lid = :lid");
$stmt->bindValue(':lid', $userid, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行時にエラーがある場合は処理を中断
if ($status==false) {
    sql_error($stmt);
}

$val = $stmt->fetch(PDO::FETCH_ASSOC);

// パスワードの検証
if ($val && password_verify($password, $val['lpw'])) {
    // セッションIDの再生成
    session_regenerate_id(true);

    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION['name'] = $val['name'];

    // 管理者フラグに応じてリダイレクト先を変更
    if ($_SESSION["kanri_flg"] == 0) {
        // スタッフユーザーの場合はblog.phpにリダイレクト
        header("Location: blog.php");
    } else {
        // 管理者ユーザーの場合はdashboard.phpにリダイレクト
        header("Location: dashboard.php");
    }
} else {
    // ログイン失敗時のリダイレクト
    header("Location: login.php");
}

exit();
?>

