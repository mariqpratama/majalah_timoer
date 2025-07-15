const menuButton = document.getElementById("menu-button");
const mobileMenu = document.getElementById("mobile-menu");

menuButton.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
});

// Highlight current link
const navLinks = document.querySelectorAll(".nav-link");
const currentPath = window.location.pathname;

navLinks.forEach((link) => {
    if (link.getAttribute("href") === currentPath) {
        link.classList.add(
            "text-white",
            "bg-blue-700",
            "md:bg-transparent",
            "md:text-blue-700",
            "md:dark:text-blue-500"
        );
    } else {
        link.classList.add(
            "text-gray-900",
            "hover:bg-gray-100",
            "md:hover:bg-transparent",
            "md:hover:text-blue-700",
            "dark:text-white",
            "dark:hover:bg-gray-700",
            "dark:hover:text-white",
            "md:dark:hover:bg-transparent"
        );
    }
});
