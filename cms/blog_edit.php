<?php include '../key.php'; ?>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//変数初期化
$writer = $title = $subtitle = $category = $keywords = $image = $content = '';


$id = $_GET['id'] ?? null;

if ($id) {
    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the query
        $stmt = $pdo->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->execute([$id]);

        // Fetch the blog post
        $blog_post = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set form fields with the blog post data

        $writer = $blog_post['writer'] ?? '';
        $title = $blog_post['title'] ?? '';
        $subtitle = $blog_post['subtitle'] ?? '';
        $category = $blog_post['category'] ?? '';
        $keywords = $blog_post['keywords'] ?? '';
        $image = $blog_post['image'] ?? '';
        $content = $blog_post['content'] ?? '';
    } catch (PDOException $e) {
        // Display error message if something goes wrong
        echo "Database error: " . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Editor</title>
    <link rel="stylesheet" href="css/styles.css">


    <script src="https://cdn.tiny.cloud/1/<?= tiny_key ?>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#content',
            branding: false,
            height: 800,
            forced_root_block : "", 
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
                ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                    alignleft aligncenter alignright alignjustify | \
                    bullist numlist outdent indent | removeformat | help | link image media | code',
            images_upload_url: './uploads/',
            });
       
        });  
    </script>

   <style>

        .label-title {
        margin-bottom: 5px;
        display: block; /* ラベルをブロック要素にする */
        }

        .tag-input-container {
        min-height: 38px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        }

        .tag-input-container .tag-input {
        flex: 1;
        border: none;
        padding: 5px;
        height: 38px;
        font-size: 14px;
        }

        .tag-input:focus {
        outline: none;
        }

        .tags {
        display: flex;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        }

        .tag {
        display: flex;
        align-items: center;
        height: 32px;
        margin-right: 5px;
        margin-bottom: 5px;
        padding: 0 8px;
        font-size: 14px;
        background: #eeeeee;
        border-radius: 16px;
        line-height: 18px;
        }

        .remove-tag {
        display: block;
        margin-left: 8px;
        cursor: pointer;
        }

    </style>
</head>

<body>

    <div class="cms-container">

    <?php include 'sidebar.php'; ?>


    <main class="content">
        <form action="blog_update.php" method="post" enctype="multipart/form-data">
            <h1>Write a blog</h1>

            <div class="buttons-container">
                <button type="submit" name="action" value="publish">投稿</button> 
                <button type="submit" name="action" value="draft">下書き</button>
                <button type="button" onclick="deletePost();">削除</button>
            </div>


            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


            <div class="form-group">
                <label for="writer">writer</label>
                <div class="title-box">
                <input type="text" id="writer" name="writer" value="<?php echo htmlspecialchars($writer); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="title">Blog Title</label>
                <div class="title-box">
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="subtitle">Blog Subtitle</label>
                <div class="title-box">
                <input type="text" id="subtitle" name="subtitle" value="<?php echo htmlspecialchars($subtitle); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="category">Blog Category</label>
                <select id="category" name="category" required>
                    <option value="news" <?php echo $category == 'news' ? 'selected' : ''; ?>>News</option>
                    <option value="updates" <?php echo $category == 'updates' ? 'selected' : ''; ?>>Updates</option>
                </select>
            </div>
            <div class="form-group">
                <label class="label-title" for="keywordInput">Keywords</label>
                <div id="keywords" class="tag-input-container">
                    <div id="keywordTags" class="tags">
                        <?php
                            // キーワードをカンマで分割
                            $keywordsArray = explode(',', $blog_post['keywords']);
                            foreach ($keywordsArray as $keyword) {
                                // HTMLエンティティを避け、トリムして表示
                                $keyword = trim(htmlspecialchars($keyword));
                                if ($keyword) { // 空のキーワードは無視
                                    echo "<span class='tag'>$keyword<span class='remove-tag'>&times;</span></span>";
                                }
                            }
                        ?>
                    </div>
                    <input type="text" id="keywordInput" class="tag-input" placeholder="Enter to add keyword">
                    <input type="hidden" id="hiddenKeywords" name="keywords" value="<?php echo htmlspecialchars($blog_post['keywords']); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="image">Blog Image</label>
                <?php if (!empty($blog_post['image'])): ?>
                    <img src="path/to/images/<?php echo htmlspecialchars($blog_post['image']); ?>" alt="Blog Image">
                <?php endif; ?>
                <input type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea>

            </div>

        </form>
    </main>



    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const keywordInput = document.getElementById('keywordInput');
        const keywordTags = document.getElementById('keywordTags');
        let composing = false; // 日本語入力中かどうかのフラグ

        keywordInput.addEventListener('compositionstart', function(event) {
            composing = true; // 日本語入力が開始された
        });

        keywordInput.addEventListener('compositionend', function(event) {
            composing = false; // 日本語入力が終了した
        });

        keywordInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && !composing) {
            event.preventDefault();
            const keywordValue = keywordInput.value.trim();
            if (keywordValue) {
                addKeywordTag(keywordValue, keywordTags);
                keywordInput.value = '';
                updateHiddenKeywords();
            }
        }
    });
});

function addKeywordTag(text, container) {
    const tag = document.createElement('div');
    tag.className = 'tag';
    tag.textContent = text;

    // タグの削除ボタン
    const removeBtn = document.createElement('span');
    removeBtn.className = 'remove-tag';
    removeBtn.textContent = '×';
    removeBtn.onclick = function() { 
        container.removeChild(tag);
        // 隠しフィールドの更新
        updateHiddenKeywords();
    };

    tag.appendChild(removeBtn);
    container.appendChild(tag);
}


function updateHiddenKeywords() {
    const tags = document.querySelectorAll('#keywordTags .tag');
    const keywords = Array.from(tags).map(tag => tag.textContent.replace('×', '').trim());
    document.getElementById('hiddenKeywords').value = keywords.join(',');

    // console.log(document.getElementById('hiddenKeywords').value);
}


function deletePost() {
    if (confirm('Are you sure you want to do this blog?')) {
        // Set the form action dynamically or send a delete request via Ajax
        var form = document.querySelector('form');
        form.action = 'blog_delete.php'; // change action to the deletion script
        form.submit(); // submit the form
    }
}

    </script>
</body>
</html>

