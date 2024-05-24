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

<footer class="lp-footer">
  <div class="footer-top">
    <div class="footer-logo">
        <a href="<?= $lang === 'ja' ? '/nuptial/lp/ja/index.php' : '/nuptial/lp/index.php' ?>">
            <img src="/nuptial/lp/img/NuptialAgree_sample03.png" alt="Company Logo" />
        </a>
    </div>

    <section class="footer-column">
      <h4><?= ($lang === 'ja') ? 'サービス' : 'Service' ?></h4>
      <ul>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/how-it-works.php' : 'how-it-works.php' ?>"><?= ($lang === 'ja') ? '使い方' : 'How it Works' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/partners.php' : 'partners.php' ?>"><?= ($lang === 'ja') ? 'パートナー' : 'Our Partners' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/prices.php' : 'prices.php' ?>"><?= ($lang === 'ja') ? '料金' : 'Prices' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/community.php' : 'community.php' ?>"><?= ($lang === 'ja') ? 'コミュニティ' : 'Community' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/help.php' : 'help.php' ?>"><?= ($lang === 'ja') ? 'ヘルプセンター' : 'Help Center' ?></a></li>
      </ul>
    </section>

    <section class="footer-column">
      <h4><?= ($lang === 'ja') ? '会社情報' : 'Our COMPANY' ?></h4>
      <ul>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/about-us.php' : 'about-us.php' ?>"><?= ($lang === 'ja') ? '私たちについて' : 'About Us' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/contactus.php' : 'contactus.php' ?>"><?= ($lang === 'ja') ? 'お問い合わせ' : 'Contact Us' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/blog.php' : 'blog.php' ?>"><?= ($lang === 'ja') ? 'ブログ' : 'Blog' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/press.php' : 'press.php' ?>"><?= ($lang === 'ja') ? 'プレス' : 'Press' ?></a></li>
          <li><a href="<?= ($lang === 'ja') ? '/nuptial/lp/ja/affiliates.php' : 'affiliates.php' ?>"><?= ($lang === 'ja') ? 'アフィリエイト' : 'Affiliates' ?></a></li>
      </ul>
    </section>

  
    <div class="language-selector" aria-label="Select Language">
        <label for="language-select"><img src="/nuptial/lp/img/nuptialagree_globe_white.png" alt="Select Language" /></label>
        <select id="language-select" onchange="changeLanguage(this.value);">
          <option value="en" <?= $lang === 'en' ? 'selected' : '' ?>>English</option>
          <option value="ja" <?= $lang === 'ja' ? 'selected' : '' ?>>日本語</option>
        </select>
    </div>
  </div>

  <div class="footer-bottom">
      <div class="legal-links">
          <a href="<?= ($lang === 'ja') ? 'ja/terms.php' : 'terms.php' ?>"><?= ($lang === 'ja') ? '利用規約' : 'Terms of Use' ?></a>
          <a href="<?= ($lang === 'ja') ? 'ja/privacy.php' : 'privacy.php' ?>"><?= ($lang === 'ja') ? 'プライバシーポリシー' : 'Privacy Policy' ?></a>
      </div>

      <div class="social-links">
          <!-- social media icons here -->
      </div>

      <div class="copyright">
          ©2024 Sayumi Kurohira
      </div>
  </div>
</footer>

<script>
function changeLanguage(selectedLang) {
    // 現在のウェブサイトのURLを取得（クエリパラメータを含まない）
    var baseUrl = window.location.protocol + '//' + window.location.host + '/nuptial/lp/';

    // 新しい言語コードをURLに組み込む
    if (selectedLang === 'ja') {
        // 日本語を選択した場合は、/ja/を追加
        newUrl = baseUrl + 'ja/' + window.location.pathname.split('/').pop();
    } else {
        // それ以外（英語を選択した場合）は、/ja/を除去
        newUrl = baseUrl + window.location.pathname.split('/').pop().replace('ja/', '');
    }

    // 最終的なURLにリダイレクト
    window.location.href = newUrl;
}

</script>

