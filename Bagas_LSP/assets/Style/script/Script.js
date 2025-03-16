document.getElementById("hamburger").onclick = function toggleMenu() {
  const navToggle = document.getElementsByClassName("toggle");
  for (let i = 0; i < navToggle.length; i++) {
    navToggle.item(i).classList.toggle("hidden");
  }
};
// JavaScript for animation
const button = document.getElementById("flyButton");
const aircraft = document.getElementById("aircraft");

button.addEventListener("mouseenter", () => {
  aircraft.classList.add("animate-circle");
});

button.addEventListener("mouseleave", () => {
  aircraft.classList.remove("animate-circle");
});
