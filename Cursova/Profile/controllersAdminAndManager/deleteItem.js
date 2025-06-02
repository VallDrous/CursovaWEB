document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".deleteItem").forEach(function (item) {
        item.querySelector(".deleteItemButton").addEventListener("click", () => {
            const nameItem = item.querySelector(".name_item").value;
            console.log(nameItem);
            deleteItem(nameItem);
        });
    });
    function deleteItem(nameItem) {
        fetch("../app/controllers/deleteItem.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `name_item=${nameItem}`
        })
        .then(res => res.json())
        .then(data => {
        if (data.success) {
            alert("Товар видалено");
        } 
        else {
            alert("Товар не знайдено для видалення");
        }
        });
    }
});