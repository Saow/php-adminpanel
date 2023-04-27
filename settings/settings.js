const settingsBtn = document.getElementById('settings-btn');
const popup = document.getElementById('settings-popup');
const closeBtn = document.getElementById('close-btn');

settingsBtn.addEventListener('click', function() {
  popup.style.display = 'block';
});

closeBtn.addEventListener('click', function() {
  popup.style.display = 'none';
});

const darkModeToggle = document.querySelector('#dark-mode-toggle');
const isDarkModeEnabled = localStorage.getItem('isDarkModeEnabled') === 'true';

if (isDarkModeEnabled) {
  document.body.classList.add('dark-mode');
  darkModeToggle.checked = true;
}

darkModeToggle.addEventListener('change', () => {
  if (darkModeToggle.checked) {
    document.body.classList.add('dark-mode');
    localStorage.setItem('isDarkModeEnabled', 'true');
  } else {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('isDarkModeEnabled', 'false');
  }
});
