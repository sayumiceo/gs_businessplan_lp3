<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/styles-ja.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="alternate" hreflang="en" href="http://localhost/Nuptial/lp/about-us.php">
    <link rel="alternate" hreflang="ja" href="http://localhost/Nuptial/lp/ja/about-us.php">

</head>

<style>
        /* スタイルの追加 */
        .vision-message-container {
            position: relative;
            /* text-align: center; */
            color: #fff; 
            font-size: 14px; 
            font-weight: bold;
            background: url('../img/7.jpeg') no-repeat center center;
            background-size: cover;
            height: 600px; 
            /* display: flex;
            align-items: center;
            justify-content: center; */
        }
        .vision-message {
            position: absolute;
            bottom: 260px; /* 下からの位置 */
            right: 80px; /* 画面の右端から50ピクセルの位置に設定 */
            color: #fff; /* テキストの色 */
            font-size: 2em; /* テキストのサイズ */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            padding: 10px 20px; /* テキストのパディング */
        }

        .about-header h1 {
            text-align: center;
            padding: 20px 0; /* 上下の余白 */
            margin: 0; /* 左右の余白 */
            background-color: #fbf3f3;  
            color: #333; 
        }
    </style>
</head>
<body>

<?php include '../template/header.php'; ?>

<!-- 画像とビジョンメッセージのコンテナ -->
<div class="vision-message-container">
    <div class="vision-message">
    深く理解し合ってもっと幸せに満ちた未来へ
    </div>
</div>

<div class="about-header">
<h1>私たちについて</h1>
</div>

<?php include '../template/footer.php'; ?>

</body>
</html>


