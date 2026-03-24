// js/main.js

// Mobile menu toggle

function toggleMenu() {
    document.querySelector('.nav-links').classList.toggle('open');
}

// Highlight active nav link
(function() {
    var page = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.nav-links a').forEach(function(a) {
        if (a.getAttribute('href') === page) a.classList.add('active');
    });
})();
