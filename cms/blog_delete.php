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
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Ensure the ID is an integer

    if ($id > 0) {
        try {
            $pdo = new PDO(DSN, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute the deletion query
            $stmt = $pdo->prepare("DELETE FROM blog WHERE id = ?");
            $stmt->execute([$id]);

            if ($stmt->rowCount()) {
                echo "<script>alert('The blog post has been successfully deleted.'); window.location.href='blog_top.php';</script>";
            } else {
                echo "<script>alert('Error: The blog post could not be found.'); window.history.back();</script>";
            }
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('Invalid blog post ID.'); window.history.back();</script>";
    }
} else {
    // Redirect if this script is accessed via a non-POST method
    header("Location: blog_top.php");
    exit;
}
?>
</body>
</html>