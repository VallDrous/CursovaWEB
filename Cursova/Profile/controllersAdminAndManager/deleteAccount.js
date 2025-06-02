document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".deleteAccount").forEach(function (item) {
        item.querySelector(".deleteAccountButton").addEventListener("click", () => {
            const nameUser = item.querySelector(".name_user").value;
            console.log(nameUser);
            deleteAccount(nameUser);
        });
    });
    function deleteAccount(nameUser) {
        fetch("../app/controllers/deleteAccount.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `name_user=${nameUser}`
        })
        .then(res => res.json())
        .then(data => {
        if (data.success) {
            alert("Аккаунт видалено");
        } 
        else {
            alert("Аккаунт не знайдено для видалення");
        }
        });
    }
});