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

/* contact us */
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

<?php include 'header.php'; ?>

    <div class="contact-section">
        <h2>CONTACT US</h2>
        <p>All messages will be reviewed. Due to the amount of messages we receive, we may not be able to send a reply to every inquiry, or there will be a considerable delay in response. 
            <br>We appreciate your understanding and patience with us.</p>
        <form action="insert.php" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email address" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <div class="checkbox">
                <input type="checkbox" name="agree" required> I agree to the terms and privacy policy.
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>

<?php include 'footer.php'; ?>

</body>
</html>

