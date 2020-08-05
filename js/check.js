const check = document.querySelector("#check");
const report = document.querySelector("#report");

check.addEventListener("click", () => {
  window.location.href = "check.php";
});

report.addEventListener("click", () => {
  window.location.href = "report.php";
});
