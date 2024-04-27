<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Gamja+Flower&family=Overlock:wght@900&family=Roboto:wght@500&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<div id="signupModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Create Account</h2>
    <!-- Social Logins -->
    <div class="social-logins">
      <button id="googleSignIn">Continue with Google</button>
    </div>
    <p class="or-separator">or</p>
    <!-- Email/Password Signup -->
    <form id="emailSignUpForm">
      <input type="email" id="email" name="email" placeholder="Email" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <div class="form-footer">
        <input type="submit" value="Create account">
        <p>Already have an account? <a href="#">Log in</a></p>
      </div>
    </form>
  </div>
</div>

<!-- Styles related to the modal -->
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border-radius: 5px;
  width: 90%;
  max-width: 500px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.social-logins button {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: none;
  border-radius: 5px;
}

#googleSignIn {
  background-color: #db4437;
  color: white;
}

.or-separator {
  text-align: center;
  margin: 20px 0;
}

.form-footer {
  text-align: center;
  margin-top: 20px;
}
</style>

<!-- JavaScript to handle the modal actions -->
<script>
// Get the modal
var modal = document.getElementById('signupModal');

// Get the button that opens the modal
var btn = document.getElementById('signupButton');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Handle form submission here
var form = document.getElementById('emailSignUpForm');
form.onsubmit = function(e) {
  e.preventDefault();
  // Perform the sign up using AJAX or similar
  // After sign up, you might want to close the modal and clear the form
  modal.style.display = "none";
  form.reset();
}
</script>

</body>
</html>