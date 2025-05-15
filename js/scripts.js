function togglePopup() {
    const popup = document.getElementById('popup');
    popup.style.display = (popup.style.display === 'none') ? 'block' : 'none';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

// Fermer si on clique ailleurs
document.addEventListener('click', function (event) {
    const popup = document.getElementById('popup');
    const link = event.target.closest('a');
    if (!popup.contains(event.target) && link?.textContent !== 'Connexion') {
        popup.style.display = 'none';
    }
});