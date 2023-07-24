function toggleMenu() {
    var menuLinks = document.getElementById("menuLinks");
    if (menuLinks.style.display === "block") {
        menuLinks.style.display = "none";
    } else {
        menuLinks.style.display = "block";
    }
}

function openPopup() {
    var popup = document.getElementById("popupForm");
    popup.style.display = "block";
}

function closePopup() {
    var popup = document.getElementById("popupForm");
    popup.style.display = "none";
}

const cards = document.querySelectorAll(".card");

cards.forEach(card => {
card.addEventListener("mouseover", () => {
cards.forEach(c => {
if (c !== card) {
c.classList.add("blur");
}
});
});

card.addEventListener("mouseout", () => {
cards.forEach(c => {
c.classList.remove("blur");
});
});
});


