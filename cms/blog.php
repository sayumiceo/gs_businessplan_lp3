<?php include '../inc/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts Overview</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<style>
    .blog-overview {
    width: 100%;
    overflow-x: auto; /* Enables horizontal scrolling if table is too wide */
}

table {
    width: 100%;
    border-collapse: collapse; /* Remove spaces between borders */
    background-color: #fff; 
    margin-top: 20px; 
}

table th,
table td {
    border: 1px solid #fff; 
    text-align: left;
    padding: 8px;
}

table th {
    background-color: #88b8f8; /* Blue background for headers */
    color: #fff; /* White text color */
    font-size: small;
}

table tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Zebra striping for rows */
}

.edit-button {
    background-color: #ffc107; 
    border: none;
    color:  #fff;
    text-decoration-line: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.edit-button:hover {
    background-color: #e0a800;
}

</style> 


<body>

<div class="cms-container">

<?php include 'sidebar.php'; ?>

<main class="content">
        <h1>Articles ・ Edit</h1>

            <div class="buttons-container">
            <button type="button" id="blog_post">New Post</button> 
            </div>

        <div class="blog-overview">
            <table>
                <thead>
                    <tr>
                        <!-- <th>公開ステータス</th> -->
                        <!-- <th>公開リンク</th> -->
                        <th>Date</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Writer</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                    try {
                        
                        $pdo = new PDO(DSN, DB_USER, DB_PASS);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        // データベースからブログデータを取得 - 後日link追加、writer修正
                        $sql = "SELECT id, status, post_date, category, writer, title FROM blog ORDER BY post_date DESC";
                        $stmt = $pdo->query($sql);  

                        // 取得したデータをループ処理で表示
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            // echo '<td><a href="' . htmlspecialchars($row['link']) . '">公開リンク</a></td>';
                            echo '<td>' . htmlspecialchars($row['post_date']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['category']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['writer']) . '</td>';
                            echo '<td><a href="blog_edit.php?id=' . $row["id"] . '" class="edit-button">編集</a></td>';
                            echo '</tr>';
                        }
                    } catch (PDOException $e) {
                        // エラーが発生した場合はメッセージを表示
                        echo "Database error: " . $e->getMessage();
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
document.getElementById('blog_post').onclick = function() {
    window.location.href = 'blog_new.php';
};
</script>

</body>
</html>