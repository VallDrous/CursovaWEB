const avatarImage = document.getElementById("mainAvatar");
const image1 = document.getElementById("avatar1");
const image2 = document.getElementById("avatar2");
const button = document.getElementById("btnToShowAvatar");
const panelWithAvatars = document.getElementById("idAvatarsCollector");

image1.addEventListener("click", function(){
    avatarImage.src = image1.src;
})

image2.addEventListener("click", function(){
    avatarImage.src = image2.src;
})

button.addEventListener("click", function(){
    panelWithAvatars.style.display = (panelWithAvatars.style.display === "block") ? "none" : "block";
})

