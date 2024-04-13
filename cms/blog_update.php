<?php include '../key.php'; ?>

<style>
    .confirmation-message {
        padding: 20px;
        margin: 140px auto;
        max-width: 600px;
        color: #333; 
        text-align: center;
        font-size: 1.1em; 
    }

    /* Responsive design for smaller screens */
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
    // Assuming you send the ID as a hidden input in the form
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;

    if ($id) {
        function sanitizeInput($input) {
            return htmlspecialchars(stripslashes(trim($input)));
        }

        $author = sanitizeInput($_POST['author']);
        $title = sanitizeInput($_POST['title']);
        $subtitle = sanitizeInput($_POST['subtitle']);
        $category = sanitizeInput($_POST['category']);
        $keywords = sanitizeInput($_POST['keywords']);
        $content = sanitizeInput($_POST['content']);
        $filepath = '';

        try {
            $pdo = new PDO(DSN, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = './uploads/';
                $filename = uniqid() . "-" . basename($_FILES['image']['name']);
                $filepath = $uploadDir . $filename;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
                    echo '<div class="error-message">There was an error uploading the file.</div>';
                    $filepath = '';  // Use existing image path if upload fails
                }
            }

            // Update the existing blog post
            $sql = "UPDATE blog SET author = :author, title = :title, subtitle = :subtitle, category = :category, keywords = :keywords, image_path = :image_path, content = :content WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':author', $author, PDO::PARAM_STR);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
            $stmt->bindValue(':keywords', $keywords, PDO::PARAM_STR);
            $stmt->bindValue(':image_path', $filepath, PDO::PARAM_STR);
            $stmt->bindValue(':content', $content, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            echo '<div class="confirmation-message">Update successful!</div>';
            // Optionally, redirect to a confirmation page or back to the edit form
            // header("Location: blog_edit.php?id=" . $id);
            // exit();

        } catch (PDOException $e) {
            exit("Database error: " . $e->getMessage());
        }
    } else {
        echo '<div class="error-message">Invalid request: No ID provided.</div>';
    }
} else {
    echo '<div class="error-message">Please submit the form.</div>';
}
?>

</body>
</html>