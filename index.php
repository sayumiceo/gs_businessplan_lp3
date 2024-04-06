<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuptialAgree</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">


</head>
<title>NuptialAgree</title>

<body>

  <?php include 'header.php'; ?>

<div class="hero-section">
    <h1>Faster, easier, and safer to create the best agreement</h1>
    <p>NaptialAgree helps you create your marital agreement with your lover. </p>
    <div class="buttons">
        <button class="button button-primary">Get started for free</button>
        <button class="button button-secondary">Test it</button>
    </div>
</div>

<div class="story-section">
  <div class="content-wrapper">
      <div class="story-image">
          <img src="img/Bezos_samplephoto.webp" alt="Person holding a shoe">
      </div>
      <div class="story-details">
          <h2>Jeff Bezos trusts us.</h2>
          <h1>“We Wanted to Create the Unexpected”</h1>
          <p>Before their divorce, Bezos's 16% stake in Amazon was valued at $150 billion. Following the divorce and subsequent financial decisions, including significant sales of Amazon stock to fund his Blue Origin space venture, Bezos's share in the company decreased to approximately 10%.</p>
      </div>
  </div>
</div>

<!-- Features Section -->
<div class="features-section">
    <div class="feature">
      <img src="img/1.jpeg" alt="Feature 1">
      <h3>1. Create an account</h3>
      <p>Use your email address to sign up for NuptialAgree here.</p>
    </div>
    <div class="feature">
      <img src="img/2.jpeg" alt="Feature 2">
      <h3>2. Get connected</h3>
      <p>Once you've created your NuptialAgree account, get connected with your partner here.</p>
    </div>
    <div class="feature">
      <img src="img/4.jpeg" alt="Feature 3">
      <h3>3. Set up your conditions</h3>
      <p>Create your agreement to start collaborating and discuss with AI tools.</p>
    </div>
  </div>


    <div class="career-section">
      <h2>Approved by top family law attorneys</h2>
      <div class="opportunities-grid">
        <div class="opportunity big">
          <h3>Live and Work Anywhere</h3>
        </div>
        <div class="opportunity">
          <h3>Open Positions</h3>
          <p>124 Open Positions</p>
        </div>
        <div class="opportunity big">
          <h3>Departments</h3>
          <p>17 Departments</p>
        </div>
        <div class="opportunity image">
          <img src="img/lawyer_sample02.jpeg" alt="Image description">
        </div>
        <div class="opportunity image">
          <img src="img/lawyer_sample.jpeg" alt="Image description">
        </div>
        <div class="opportunity">
          <h3>Open Positions</h3>
          <p>124 Open Positions</p>
        </div>
      </div>
    </div>    
  
  <div class="blog-section">
    <h2>Startup Founders and Asset Holders Choose Us</h2>
    <p>Listen to our customers.</p>
    
    <div class="blog-carousel-wrapper">
      <div class="blog-carousel">
        <!-- Blog Entry -->
        <div class="blog-entry">
            <img src="img/blog01.jpeg" alt="Article Title">
            <h3>Our experience.</h3>
            <p>April 1, 2024</p>
        </div>

        <div class="blog-entry">
          <img src="img/blog02.jpeg" alt="Article Title">
          <h3>Our story.</h3>
          <p>April 1, 2024</p>
        </div>

        <div class="blog-entry">
          <img src="img/blog03.jpeg" alt="Article Title">
          <h3>Our experience.</h3>
          <p>April 1, 2024</p>
        </div>

        <div class="blog-entry">
          <img src="img/blog04.jpeg" alt="Article Title">
          <h3>Our story.</h3>
          <p>April 1, 2024</p>
        </div>
        <div class="blog-entry">
          <img src="img/blog01.jpeg" alt="Article Title">
          <h3>Our experience.</h3>
          <p>April 1, 2024</p>
      </div>

      <div class="blog-entry">
        <img src="img/blog02.jpeg" alt="Article Title">
        <h3>Our story.</h3>
        <p>April 1, 2024</p>
      </div>

      <div class="blog-entry">
        <img src="img/blog03.jpeg" alt="Article Title">
        <h3>Our experience.</h3>
        <p>April 1, 2024</p>
      </div>

      <div class="blog-entry">
        <img src="img/blog04.jpeg" alt="Article Title">
        <h3>Our story.</h3>
        <p>April 1, 2024</p>
      </div>
      </div>
    </div>
</div>


  <!-- FAQ Section -->
  <div class="faq-section">
    <h2>FAQ</h2>
    <div class="faq" onclick="toggleAnswer('answer1')">
      <h3>What is NuptialAgree?</h3>
      <p id="answer1" class="answer">NuptialAgree is a platform that allows you to create prenuptial and postnuptial agreements with ease.</p>
    </div>
    <div class="faq" onclick="toggleAnswer('answer2')">
      <h3>I've already married. Is it too late to create an agreement?</h3>
      <p id="answer2" class="answer">It is not too late. You can create a postnuptial agreement at any time during your marriage.</p>
    </div>
    <div class="faq" onclick="toggleAnswer('answer3')">
      <h3>Why would I need a prenuptial agreement?</h3>
      <p id="answer3" class="answer">A prenuptial agreement can help protect your assets and clarify financial arrangements in the event of a marriage breakdown.</p>
    </div>
  </div>


  <div class="cta-section">
    <div class="cta-content">
      <h2>The best way to design your life together.</h2>
      <button onclick="location.href='#';">Sign up for NuptialAgree</button>
    </div>
  </div>
  

  <!-- footer -->

  <?php include 'footer.php'; ?>
  

<script>


document.addEventListener('DOMContentLoaded', function() {
    const blogEntries = document.querySelectorAll('.blog-carousel .blog-entry');
    
    // 全てのblog-entry要素の合計幅を計算します
    let totalWidth = 0;
    blogEntries.forEach(entry => {
        const style = window.getComputedStyle(entry);
        const margin = parseFloat(style.marginRight);
        totalWidth += entry.offsetWidth + margin;
    });

    const blogCarousel = document.querySelector('.blog-carousel');

    blogCarousel.animate([
      // key frames
      { transform: 'translateX(0px)' },
      { transform: 'translateX(-' + totalWidth/2+'px)' }
    ], {
      // sync options
      duration: 30000,
      iterations: Infinity
    });
});


function toggleAnswer(id) {
  var answer = document.getElementById(id);
  if (answer.style.display === 'block') {
    answer.style.display = 'none';
  } else {
    answer.style.display = 'block';
  }
}

function revealOnScroll() {
  var elements = document.querySelectorAll('.feature, .cta-content');
  var windowHeight = window.innerHeight;

  elements.forEach(function(element) {
    var elementTop = element.getBoundingClientRect().top;
    var elementVisible = 50;

    if (elementTop < windowHeight - elementVisible) {
      element.classList.add('animate-on-scroll');
    } 
  });
}

window.addEventListener('scroll', revealOnScroll);
document.addEventListener('DOMContentLoaded', revealOnScroll);

</script>

</body>
</html>