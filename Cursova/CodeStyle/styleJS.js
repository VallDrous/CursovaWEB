//функція для закритя та відкритя категорій у хедері 
document.addEventListener("DOMContentLoaded", function() {
    const btn = document.getElementById("category-btn");
    const menu = document.getElementById("category");

    btn.addEventListener("click", function() {
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    });
});