//tăng số lượng sản phẩm
const so_luong_sanpham = document.querySelectorAll(".so_luong");

so_luong_sanpham.forEach((value) => {
  const input_so_luong = value.querySelector(".so_luong input");
  const giam = value.querySelector(".so_luong .bt1");
  const tang = value.querySelector(".so_luong .bt2");

  tang.addEventListener("click", () => {
    var so = parseInt(input_so_luong.value);
    input_so_luong.value = so + 1;
  });
  giam.addEventListener("click", () => {
    var so = parseInt(input_so_luong.value);
    if (so > 1) {
      input_so_luong.value = so - 1;
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var priceElements = document.querySelectorAll(".price");

  priceElements.forEach(function (priceElement) {
    var gia = parseFloat(priceElement.dataset.gia);
    var giaFormatted = formatCurrency(gia);
    priceElement.textContent = giaFormatted + " ₫";
  });
});

function formatCurrency(gia) {
  return gia.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}


const duong_dan_anh = 'img/';