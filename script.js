// JavaScript to toggle night mode background
document.addEventListener('DOMContentLoaded', function () {
    const nightModeCheckbox = document.getElementById('nightModeCheckbox');
    nightModeCheckbox.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('night-mode');
        } else {
            document.body.classList.remove('night-mode');
        }
    });
});
