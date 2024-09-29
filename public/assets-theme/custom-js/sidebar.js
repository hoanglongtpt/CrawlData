let isCollapsed = false;
const collapseBtn = document.getElementById("sidebarToggle");
const priceTags = document.querySelectorAll(".price-tag");
const navLinks = document.querySelectorAll(".nav-link-layout");
const contactLabels = document.querySelectorAll(".contact-label");
const contactHeader = document.querySelector(".contact-header");
const contactLogos = document.querySelectorAll(".contact-logo");
collapseBtn.addEventListener("click", function () {
    isCollapsed = !isCollapsed;
    if (isCollapsed) {
        contactHeader.classList.add("text-md");
    } else {
        contactHeader.classList.remove("text-md");
    }
    priceTags.forEach((tag) => {
        if (isCollapsed) {
            tag.classList.add("hidden");
        } else {
            tag.classList.remove("hidden");
        }
    });
    navLinks.forEach((nav) => {
        if (isCollapsed) {
            nav.classList.add("block");
        } else {
            nav.classList.remove("block");
        }
    });
    contactLabels.forEach((label) => {
        if (isCollapsed) {
            label.classList.add("hidden");
        } else {
            label.classList.remove("hidden");
        }
    });
    contactLogos.forEach((logo) => {
        if (isCollapsed) {
            logo.classList.add("m-auto");
        } else {
            logo.classList.remove("m-auto");
        }
    });
});
