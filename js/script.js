// Sélection des éléments
const themeToggle = document.getElementById('toggle'); // Bouton de bascule
const themeLink = document.getElementById('theme-link'); // Lien du thème CSS

// Charger le thème sauvegardé depuis le localStorage
const savedTheme = localStorage.getItem('theme') || '../css/light-theme.css';
themeLink.setAttribute('href', savedTheme);

// Synchroniser l'état de la checkbox avec le thème actuel
themeToggle.checked = savedTheme.includes('dark');

// Gestion du changement d'état de la checkbox
themeToggle.addEventListener('change', () => {
    if (themeToggle.checked) {
        // Passer au thème sombre
        themeLink.setAttribute('href', '../css/dark-theme.css');
        localStorage.setItem('theme', '../css/dark-theme.css');
    } else {
        // Passer au thème clair
        themeLink.setAttribute('href', '../css/light-theme.css');
        localStorage.setItem('theme', '../css/light-theme.css');
    }
});
