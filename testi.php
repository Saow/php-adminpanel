<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- HTML code -->
<a href="#" id="settings-btn">Settings</a>

<div id="settings-popup" class="popup">
  <h2>Settings</h2>
  <p>Some settings go here...</p>
  <button id="close-btn">Close</button>
</div>

<!-- JavaScript code -->
<script>
// Get the settings button and popup box elements
const settingsBtn = document.getElementById('settings-btn');
const popup = document.getElementById('settings-popup');
const closeBtn = document.getElementById('close-btn');

// Add an event listener to the settings button that displays the popup box
settingsBtn.addEventListener('click', function() {
  popup.style.display = 'block';
});

// Add an event listener to the close button that hides the popup box
closeBtn.addEventListener('click', function() {
  popup.style.display = 'none';
});

</script>

<!-- CSS code -->
<style>
.popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 300px;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
}

.popup h2 {
  margin-top: 0;
}

.popup p {
  margin-bottom: 20px;
}

</style>

</body>
</html>