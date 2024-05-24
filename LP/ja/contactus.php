<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="../css/styles-ja.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- https://example.com/contact -->
    <link rel="alternate" hreflang="en" href="http://localhost/nuptial/lp/contactus.php">
    <link rel="alternate" hreflang="ja" href="http://localhost/nuptial/lp/ja/contactus.php">

</head>
<style>
.contact-section {
  width: 50%;
  margin: auto;
  padding: 70px;
  text-align: center;
}

.contact-section h2 {
  color: #333;
}

.contact-section p {
  font-size: 1em;
  margin-bottom: 30px;
}

.contact-section form {
  display: flex;
  flex-direction: column;
}

.contact-section input[type="text"],
.contact-section input[type="email"] {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.contact-section textarea {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  resize: vertical; 
  max-width: 100%; 
}

.contact-section .checkbox {
  text-align: left;
  margin-bottom: 20px;
}

.contact-section button {
  padding: 10px 15px;
  background-color: #f7bdc0;
  color: white;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

.contact-section button:hover {
  background-color: #eaeaea;
  color:#333;
}

</style>
<body>

<?php include '../template/header.php'; ?>

    <div class="contact-section">
        <h2>お問い合わせ</h2>
        <p>お問い合わせいただいた内容は運営メンバーが確認し、迅速に対応させていただいておりますが、お問い合わせの内容によっては、お答えすることが難しい場合や、回答までに時間がかかることがございます。ご理解とご協力をお願いいたします。
             </p>
        <form action="insert.php" method="post">
            <input type="text" name="name" placeholder="お名前">
            <input type="email" name="email" placeholder="メールアドレス" required>
            <textarea name="message" placeholder="メッセージ" required></textarea>
            <div class="checkbox">
                <input type="checkbox" name="agree" required> I agree to the terms and privacy policy.
            </div>
            <button type="submit">送信</button>
        </form>
    </div>

<?php include '../template/footer.php'; ?>

</body>
</html>

