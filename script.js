const themeToggle = document.getElementById("theme-toggle");

if (themeToggle) {
  themeToggle.addEventListener("click", function () {
    const current = document.documentElement.getAttribute("data-theme");
    const next = current === "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-theme", next);
    try {
      localStorage.setItem("theme", next); // remember the choice
    } catch (err) {
      // storage can be blocked (e.g. private mode) — the toggle still works
    }
  });
}

const filterButtons = document.querySelectorAll(".filter-btn");
const projectCards = document.querySelectorAll(".project");

filterButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const filter = button.dataset.filter;

    filterButtons.forEach(function (b) {
      b.classList.remove("active");
    });
    button.classList.add("active");

    projectCards.forEach(function (card) {
      const show = filter === "all" || card.dataset.category === filter;
      card.classList.toggle("hidden", !show);
    });
  });
});
