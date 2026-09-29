const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');

menuToggle.addEventListener('click', function (event) {
    event.stopPropagation();
    sidebar.classList.toggle('open');
});

document.addEventListener('click', function (event) {
    if (
        sidebar.classList.contains('open') &&
        !sidebar.contains(event.target) &&
        !menuToggle.contains(event.target)
    ) {
        sidebar.classList.remove('open');
    }
});