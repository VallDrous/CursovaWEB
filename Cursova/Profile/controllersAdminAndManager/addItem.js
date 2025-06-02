document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".addItem").forEach(function (item) {
        item.querySelector(".addItemButton").addEventListener("click", () => {
            const nameItem = item.querySelector(".name_item").value;
            const categoryItem = item.querySelector(".category_item").value;
            const countItem = item.querySelector(".count_item").value;
            const priceItem = item.querySelector(".price_item").value;
            console.log(nameItem + " " + categoryItem + " " + countItem + " " + priceItem);
            addItem(nameItem, categoryItem, countItem, priceItem);
        });
    });
    function addItem(nameItem, categoryItem, countItem, priceItem) {
        fetch("../app/controllers/addItem.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `name_item=${nameItem}&category_item=${categoryItem}&count_item=${countItem}&price_item=${priceItem}`
        })
        .then(res => res.json())
        .then(data => {
        if (data.success) {
            alert("Товар додано");
        } 
        else {
            alert("Товар не додано");
        }
        });
    }
});