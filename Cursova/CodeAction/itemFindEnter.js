const baseUrl = window.BASE_URL;
const input = document.getElementById("iForFind");

input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        const query = encodeURIComponent(input.value.trim());
        if (query) {
            window.location.href = baseUrl + "CategoryItem/CategoryItemCS.php?enterWord=" + query;
        }
    }
});