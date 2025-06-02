document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".card").forEach(function (card) {
                const itemId = card.dataset.id;
                const countLabel = card.querySelector(".item-count");
                const totalLabel = card.querySelector(".item-total");

                const pricePerUnit = parseFloat(
                totalLabel.textContent / parseInt(countLabel.textContent)
                );

                card.querySelector(".btn-increase").addEventListener("click", () => {
                    updateCount(itemId, "increase", countLabel, totalLabel, pricePerUnit, card);
                });

                card.querySelector(".btn-decrease").addEventListener("click", () => {
                    updateCount(itemId, "decrease", countLabel, totalLabel, pricePerUnit, card);
                });
            });

            function updateCount(itemId, action, countEl, totalEl, pricePerUnit, cardDiv) {
                fetch("../app/controllers/changeCount.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `item_id=${itemId}&action=${action}`
                })
                .then(res => res.json())
                .then(data => {
                if (data.success) {
                    if(data.delete){
                        cardDiv.remove();
                    }
                    else{
                        countEl.textContent = data.new_count;
                        totalEl.textContent = (data.new_count * pricePerUnit).toFixed(2);
                    }
                } 
                else {
                    alert("Не вдалося оновити");
                }
                });
            }
        });