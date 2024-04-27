<?php
// 言語設定の取得、デフォルトは英語
$lang = 'en'; // デフォルト言語を英語に設定
// 現在のURLパスを取得
$currentPath = $_SERVER['REQUEST_URI'];

// URLに基づいて言語を設定
if (strpos($currentPath, '/ja/') !== false) {
    $lang = 'ja'; // URLに '/ja/' が含まれていれば、言語を日本語に設定
}
?>

<div id="header">
    <nav class="nav-bar">
        <div>
            <a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/index.php' : '/Nuptial/lp/index.php' ?>">
                <img src="/Nuptial/lp/img/NuptialAgree_sample02.png" alt="Company Logo" />
        </a>
            </a>
        </div>

        <ul>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/about.php' : 'about.php' ?>"><?= ($lang === 'ja') ? '私たちについて' : 'About Us' ?></a></li>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/how-it-works.php' : 'how-it-works.php' ?>"><?= ($lang === 'ja') ? '使い方' : 'How it Works' ?></a></li>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/partners.php' : 'partners.php' ?>"><?= ($lang === 'ja') ? 'パートナー' : 'Our Partners' ?></a></li>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/blog.php' : 'blog.php' ?>"><?= ($lang === 'ja') ? 'ブログ' : 'Blog' ?></a></li>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/community.php' : 'community.php' ?>"><?= ($lang === 'ja') ? 'コミュニティ' : 'Community' ?></a></li>
            <li><a href="<?= ($lang === 'ja') ? '/Nuptial/lp/ja/contactus.php' : 'contactus.php' ?>"><?= ($lang === 'ja') ? 'お問い合わせ' : 'Contact Us' ?></a></li>
        </ul>
        <ul>
            <li><a href="login.php"><?= ($lang === 'ja') ? 'ログイン' : 'Log In' ?></a></li>
            <li><a href="#" id="get-started-button" class="button button-primary"><?= ($lang === 'ja') ? '無料で試す' : 'Try NaptialAgree for free' ?></a></li>
        </ul>
    </nav>
</div>

<!-- モーダルコンテンツのHTML -->
<div id="signupModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Create Account</h2>
        <button id="googleSignIn">Continue with Google</button>
        <p>or</p>
        <form id="emailSignUpForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <input type="submit" value="Create account">
        </form>
        <p>Already have an account? <a href="#">Log in</a></p>
    </div>
</div>

<!-- モーダルを制御するJavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the modal element
    var modal = document.getElementById('signupModal');
    
    // Get the button element that opens the modal
    var btn = document.getElementById('get-started-button');
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = 'block';
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = 'none';
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    
    // Form submission logic
    var form = document.getElementById('emailSignUpForm');
    form.onsubmit = function(event) {
        event.preventDefault(); // Prevent the form from submitting through the HTTP POST method
        // Here you would handle the form submission, for example via AJAX.
        console.log('Form submission logic goes here.');
    }
  });
</script>

<style>
  /* モーダルの全体的なスタイル */
.modal {
  display: none; /* デフォルトでは非表示 */
  position: fixed; /* 画面に固定 */
  z-index: 1000; /* 他の要素よりも前面に */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* 内容がはみ出た場合スクロールバーを表示 */
  background-color: rgba(0,0,0,0.4); /* 背景を暗くする */
}

/* モーダル内部のコンテナ */
.modal-content {
  background-color: #fefefe; /* 背景色 */
  margin: 10% auto; /* 中央に表示 */
  padding: 20px;
  border-radius: 10px; /* 角を丸くする */
  width: 90%; /* 幅 */
  max-width: 400px; /* 最大幅 */
}

/* 閉じるボタンのスタイル */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* グーグルで続けるボタン */
#googleSignIn {
  background-color: #4285F4; /* グーグルのブルー */
  color: white;
  border: none;
  padding: 12px 20px;
  margin-bottom: 10px; /* 余白 */
  border-radius: 4px; /* 角を丸くする */
  cursor: pointer;
  font-size: 1rem; /* 文字の大きさ */
  text-align: center; /* 中央揃え */
}

#googleSignIn:hover {
  background-color: #357ae8; /* ホバー時は少し濃い色に */
}

/* 分離線 "or" のスタイル */
.or-separator {
  margin: 20px 0;
  text-align: center;
}

/* Eメール・パスワード入力フィールドのスタイル */
input[type="email"],
input[type="password"] {
  width: calc(100% - 24px); /* パディングを考慮した幅 */
  padding: 12px; /* 余白 */
  margin-top: 8px; /* 上の余白 */
  margin-bottom: 8px; /* 下の余白 */
  border: 1px solid #ccc; /* 枠線 */
  border-radius: 4px; /* 角を丸くする */
}

/* ボタンのスタイル */
input[type="submit"] {
  width: 100%; /* 幅 */
  background-color: #000000; /* 背景色 */
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px; /* 角を丸くする */
  cursor: pointer; /* カーソルをポインタに */
  font-size: 1rem; /* 文字の大きさ */
}

input[type="submit"]:hover {
  background-color: #333333; /* ホバー時は少し濃い色に */
}

/* その他リンクのスタイル */
.modal-content a {
  color: #4285F4; /* グーグルのブルー */
  text-decoration: none; /* 下線を消す */
}

.modal-content a:hover {
  text-decoration: underline; /* ホバー時に下線を表示 */
}

/* チェックボックスのカスタムスタイル */
.checkbox-custom {
  margin: 10px 0; /* 余白 */
}

.checkbox-custom input {
  margin-right: 5px; /* チェックボックスとテキストの間の余白 */
}

/* シングルサインオン用のリンクのスタイル */
.single-sign-on {
  display: block; /* ブロック要素として表示 */
  margin-top: 20px; /* 上の余白 */
  font-size: 0.9rem; /* 文字の大きさ */
  text-align: center; /* 中央揃え */
}


</style>