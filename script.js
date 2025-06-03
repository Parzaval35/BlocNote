document.addEventListener('DOMContentLoaded', function () {
    const nightModeCheckbox = document.getElementById('nightModeCheckbox');
    const logo = document.getElementById('logo');

    // charge le mode 
    const savedNightMode = localStorage.getItem('nightMode');
    if (savedNightMode === 'enabled') {
        document.body.classList.add('night-mode');
        nightModeCheckbox.checked = true;
        logo.src = "images/dark_logo.png";
    } else {
        document.body.classList.remove('night-mode');
        nightModeCheckbox.checked = false;
        logo.src = "images/logo.png";
    }

    nightModeCheckbox.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('night-mode');
            logo.src = "images/dark_logo.png";
            localStorage.setItem('nightMode', 'enabled');
        } else {
            document.body.classList.remove('night-mode');
            logo.src = "images/logo.png";
            localStorage.setItem('nightMode', 'disabled');
        }
    });

    const buttons = document.querySelectorAll(".accordion-btn");
    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            const panel = btn.nextElementSibling;
            panel.classList.toggle("open");
        });
    });
});
