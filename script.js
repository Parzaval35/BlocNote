// JavaScript to toggle night mode background
document.addEventListener('DOMContentLoaded', function () {
    const nightModeCheckbox = document.getElementById('nightModeCheckbox');
    const logo = document.getElementById('logo');

    nightModeCheckbox.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('night-mode');
            logo.src = "images/dark_logo.png"; 
        } else {
            document.body.classList.remove('night-mode');
            logo.src = "images/logo.png";
        }
    });
});

const buttons = document.querySelectorAll(".accordion-btn");
buttons.forEach((btn) => {
btn.addEventListener("click", () => {
        const panel = btn.nextElementSibling;
        panel.classList.toggle("open");
  });
});
