const tabs = document.querySelectorAll(".tab");
const contents = document.querySelectorAll(".content");
console.log(tabs);
console.log(contents);
tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        console.log("click", tab);
        // Remove active class from all tabs and content
        tabs.forEach((t) => t.classList.remove("active"));
        contents.forEach((c) => c.classList.remove("active"));

        // Add active class to the clicked tab and corresponding content
        tab.classList.add("active");
        document
            .getElementById(tab.getAttribute("data-tab"))
            .classList.add("active");
    });
});
