// Sélection des éléments
const themeToggle = document.getElementById('toggle');
const themeLink = document.getElementById('theme-link');
const savedTheme = localStorage.getItem('theme') || '../css/light-theme.css';
themeLink.setAttribute('href', savedTheme);

themeToggle.checked = savedTheme.includes('dark');

themeToggle.addEventListener('change', () => {
    if (themeToggle.checked) {
        themeLink.setAttribute('href', '../css/dark-theme.css');
        localStorage.setItem('theme', '../css/dark-theme.css');
    } else {
        themeLink.setAttribute('href', '../css/light-theme.css');
        localStorage.setItem('theme', '../css/light-theme.css');
    }
});
