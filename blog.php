<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuptialAgree</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">


</head>
<body>

<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
  line-height: 1.6;
  background-color: #fff; 
}

.blog-header h1 {
    text-align: center;
    padding: 20px 0; /* 上下の余白 */
    margin: 0; /* 左右の余白 */
    background-color: #fbf3f3;  
    color: #333; 
}

.blog-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); 
    background-color: #fbf3f3;
    gap: 20px; 
    padding: 20px;
}

.blog-image img {
    width: 100%; /* 画像の幅をブログボックスの幅に合わせる */
    height: 200px; /* 高さを固定 */
    object-fit: cover; /* 画像のアスペクト比を維持しながらコンテナに合わせて調整 */
    border-radius: 10px; /* 画像の角を丸くする */
}

.blog-box {
    padding: 20px; 
    border-radius: 10px; 
    background-color: #ffffff94; 
}

.blog-title {
    font-size: 1.2em; 
    margin-bottom: 0.5em; 
    font-weight: 600;   
}

.blog-subtitle,
.blog-category,
.blog-content {
    margin-bottom: 0.5em; 
}

.keyword-container {
    display: flex;
    justify-content: start;
    gap: 10px; /* キーワード間のスペース */
}

.keyword {
    padding: 5px 15px; /* 文字の周りの余白 */
    border: 1px solid #333;
    border-radius: 20px; /* 角を丸くする */
    color: #333; /* 文字色 */
    font-size: small;
    font-weight: bold; /* 文字を太くする */
    cursor: pointer; /* カーソルを指にする */
}

.keyword:hover {
    background-color: #333; /* ホバー時の背景色 */
    color: #fff; /* ホバー時の文字色 */
}


@media (max-width: 768px) {
    .blog-container {
        grid-template-columns: 1fr; /* 画面が狭いときは1列にする */
    }
}

</style>

<?php include 'header.php'; ?>

<div class="blog-header">
<h1>Our Blog</h1>
</div>

    <div class="blog-container">
    <?php
    // データベース設定
    $dbHost = 'localhost';
    $dbName = 'nuptialagree';
    $dbUsername = 'root';
    $dbPassword = '';


    try {
        // PDOインスタンスを作成
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUsername, $dbPassword);
        
        // エラーモードを例外モードに設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // CSS classes for keywords
        $keywordClass = 'keyword';
        $keywordContainerClass = 'keyword-container';

        // データベースからブログデータを取得
        $sql = "SELECT image_path, title, subtitle, category, keywords, content FROM blog ORDER BY post_date DESC";
        $stmt = $pdo->query($sql);  

        // 取得したデータをループ処理で表示
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="blog-box">';
            if (!empty($row['image_path'])) {
                echo '<div class="blog-image"><img src="cms/' . htmlspecialchars($row['image_path']) . '" alt="Blog Image"></div>';
            }        
            echo '<div class="blog-title">' . htmlspecialchars($row['title']) . '</div>';
            echo '<div class="blog-subtitle">' . htmlspecialchars($row['subtitle']) . '</div>';
            // echo '<div class="blog-category">' . htmlspecialchars($row['category']) . '</div>';

 
            echo '<div class="blog-content">' . mb_substr($row['content'], 0, 200) . ' ...</div>';

            // Process keywords
            echo '<div class="' . $keywordContainerClass . '">';
            $keywords = explode(',', $row['keywords']); // Assuming keywords are comma-separated
            foreach ($keywords as $keyword) {
                echo '<div class="' . $keywordClass . '">' . htmlspecialchars(trim($keyword)) . '</div>';
            }
            echo '</div>'; // Close keyword-container
           

            echo '</div>';
        }

    } catch (PDOException $e) {
        // エラーが発生した場合はメッセージを表示
        die("Database error: " . $e->getMessage());
    }
    ?>
</div>


<?php include 'footer.php'; ?>
  
</body>
</html>



