var priceElements = document.querySelectorAll(".price");

priceElements.forEach(function (priceElement) {
  var gia = parseFloat(priceElement.dataset.gia);
  var giaFormatted = formatCurrency(gia);
  priceElement.innerHTML = giaFormatted + " ₫";
});
console.log("hien tien");

function formatCurrency(gia) {
  return gia.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
