document.addEventListener("DOMContentLoaded", function () {
    // Handler when the DOM is fully loaded
    console.log("js executed...");

    const textInputs = document.querySelectorAll('input[type="text"]');

    textInputs.forEach((input) => {
        input.setAttribute("data-lpignore", true);
    });

    const toggleMenu = document.querySelector("#menu-icon");
    const closeMenu = document.querySelector("#menu-icon-close");
    const burgerMenu = document.querySelector("#burger-menu");

    toggleMenu.onclick = () => {
        burgerMenu.classList.toggle("menu-open");
    };

    closeMenu.onclick = () => {
        burgerMenu.classList.remove("menu-open");
    };
});
