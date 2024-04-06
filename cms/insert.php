<?php include '../key.php'; ?>

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

        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

    function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        // $input = htmlspecialchars($input);
        return $input;
    }

    $title = sanitizeInput($_POST['title']);
    $subtitle = sanitizeInput($_POST['subtitle']);
    $category = sanitizeInput($_POST['category']);
    $keywords = sanitizeInput($_POST['keywords']); 
    $content = sanitizeInput($_POST['content']);
    $filepath = ''; 


    try {

    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if a file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Define the directory where you'll save uploaded images
        $uploadDir = './uploads/';
        
        // Generate a unique file name to avoid overwriting existing files
        $filename = uniqid() . "-" . basename($_FILES['image']['name']);
        $filepath = $uploadDir . $filename;


        // Move the file to the designated directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {           
            // Success! The file path will be saved in the database.    
        
    } else {
         // Handle the error if the file can't be moved to the upload directory
         echo '<div class="error-message">There was an error uploading the file.</div>';
         $filepath = ''; // Set filepath as empty if upload fails
        
    } 
    } else {
        // Handle the error if no file was uploaded or if there's an upload error
        echo '<div class="error-message">Invalid file upload.</div>';
    }

       // データベースにデータを挿入
        $sql = "INSERT INTO blog (title, subtitle, category, keywords, image_path, content, post_date) VALUES (:title, :subtitle, :category, :keywords, :image_path, :content, NOW())";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':keywords', $keywords, PDO::PARAM_STR); 
        $stmt->bindValue(':image_path', $filepath, PDO::PARAM_STR); // Bind the file path
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
       
        $stmt->execute();
       
        // 処理後にユーザーをリダイレクト
        // header("Location: thank_you.php");
        echo '<div class="confirmation-message">Done! Successfully posted!</div>';

    } catch (PDOException $e) {
        exit("Database error: " . $e->getMessage());
    }
} else {
    echo '<div class="confirmation-message">Please submit the form.</div>';
}   

?>


</body>
</html>

