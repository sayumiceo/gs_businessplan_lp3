<?php include '../inc/config.php'; ?>

<style>
    .confirmation-message {
        padding: 20px;
        margin: 140px auto;
        max-width: 600px;
        color: #333; 
        text-align: center;
        font-size: 1.1em; 
    }

    @media (max-width: 768px) {
        .confirmation-message {
            margin: 20px 10px; 
            padding: 20px 10px; 
        }
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    if ($id) {
        // function sanitizeInput($input) {
        //     return htmlspecialchars(stripslashes(trim($input)));
        // }

        // $action = $_POST['action'];  // Get the action from form
        // $status = ($action == 'publish') ? 'published' : 'draft';
        // $writer = sanitizeInput($_POST['writer']);
        // $title = sanitizeInput($_POST['title']);
        // $subtitle = sanitizeInput($_POST['subtitle']);
        // $category = sanitizeInput($_POST['category']);
        // $keywords = sanitizeInput($_POST['keywords']);
        // $content = sanitizeInput($_POST['content']);
        // $filepath = '';

        $action = $_POST['action'] ?? 'draft';  
        $status = ($action == 'publish') ? 'published' : 'draft';
        $lang = $_POST['lang'] ?? '';  
        $writer = $_POST['writer'] ?? '';  
        $title = $_POST['title'] ?? '';
        $subtitle = $_POST['subtitle'] ?? '';
        $category = $_POST['category'] ?? '';
        $keywords = $_POST['keywords'] ?? '';
        $content = $_POST['content'] ?? '';
        $filepath = '';
        

        try {
            $pdo = new PDO(DSN, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // 画像ファイルが存在し、エラーがない場合に処理を実行
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

                $uploadDir = './uploads/';
                // ユニークなファイル名を生成し、アップロードされる画像の名前を決定
                $filename = uniqid() . "-" . basename($_FILES['image']['name']);
                // 最終的なファイルのパスを設定
                $filepath = $uploadDir . $filename;

                // 一時的なアップロード場所から指定のディレクトリにファイルを移動
                if (move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                    // ファイルのアップロードが成功した場合
                    // 成功したファイルパスは後のデータベース更新で使用される
                } else {
                    // ファイルのアップロードに失敗した場合、エラーメッセージを表示
                    echo '<div class="error-message">There was an error uploading the file.</div>';
                    // 既存の画像パスをデータベースから取得して使用
                    $filepath = getExistingImagePath($id, $pdo);
                }
            } else {
                // 新しいファイルがアップロードされなかった場合、既存の画像パスをデータベースから取得
                $filepath = getExistingImagePath($id, $pdo);
            }

            

            // Update the existing blog post
            $sql = "UPDATE blog SET status = :status, lang = :lang, writer = :writer, title = :title, subtitle = :subtitle, category = :category, keywords = :keywords, image_path = :image_path, content = :content WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':status', $status, PDO::PARAM_STR);
            $stmt->bindValue(':lang', $lang, PDO::PARAM_STR);
            $stmt->bindValue(':writer', $writer, PDO::PARAM_STR);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
            $stmt->bindValue(':keywords', $keywords, PDO::PARAM_STR);
            $stmt->bindValue(':image_path', $filepath, PDO::PARAM_STR);
            $stmt->bindValue(':content', $content, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<div class="confirmation-message">Update successful!</div>';
            } else {
                echo '<div class="error-message">No changes were made to the record.</div>';
            }

        } catch (PDOException $e) {
            exit("Database error: " . $e->getMessage());
        }
    } else {
        echo '<div class="error-message">Invalid request: No ID provided.</div>';
    }
} else {
    echo '<div class="error-message">Please submit the form.</div>';
}

    // 既存の画像パスを取得する関数
    function getExistingImagePath($id, $pdo) {
        // 指定されたIDのブログポストから画像パスを取得するSQLクエリ
        $sql = "SELECT image_path FROM blog WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // 結果が存在すれば画像パスを返し、存在しなければ空文字を返す
        return $result ? $result['image_path'] : '';
    }

?>

</body>
</html>