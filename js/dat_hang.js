const host = "https://provinces.open-api.vn/api/";

function fetchProvinces() {
  return fetch(`${host}?depth=1`)
    .then((response) => response.json())
    .then((data) => {
      renderOptions(data, "city");
    })
    .catch((error) =>
      console.error("Lỗi khi lấy dữ liệu tỉnh thành từ API:", error)
    );
}

function fetchDistricts(provinceId) {
  return fetch(`${host}p/${provinceId}?depth=2`)
    .then((response) => response.json())
    .then((data) => {
      renderOptions(data.districts, "district");
    })
    .catch((error) =>
      console.error("Lỗi khi lấy dữ liệu quận huyện từ API:", error)
    );
}

function fetchWards(districtId) {
  return fetch(`${host}d/${districtId}?depth=2`)
    .then((response) => response.json())
    .then((data) => {
      renderOptions(data.wards, "ward");
    })
    .catch((error) =>
      console.error("Lỗi khi lấy dữ liệu phường xã từ API:", error)
    );
}

function renderOptions(array, selectId) {
  const selectElement = document.getElementById(selectId);
  selectElement.innerHTML = '<option value="" selected></option>';

  array.forEach((element) => {
    const option = document.createElement("option");
    option.value = element.code;
    option.textContent = element.name;
    selectElement.appendChild(option);
  });
}

document.getElementById("city").addEventListener("change", function () {
  renderOptions([], "district");
  renderOptions([], "ward");
  const selectedProvinceId = this.value;
  if (selectedProvinceId) {
    fetchDistricts(selectedProvinceId);
  } else {
    renderOptions([], "district");
    renderOptions([], "ward");
  }
});

document.getElementById("district").addEventListener("change", function () {
  const selectedDistrictId = this.value;
  if (selectedDistrictId) {
    fetchWards(selectedDistrictId);
  } else {
    renderOptions([], "ward");
  }
});

fetchProvinces();

function hien() {
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
}


  var tongTien = 0;
  var all_gia_sp = document.querySelectorAll(".box");

  if (all_gia_sp) {
    all_gia_sp.forEach(function (priceElement) {
      var gia = parseFloat(priceElement.querySelector(".price").dataset.gia);
      var soLuong = parseInt(priceElement.querySelector(".sl").innerHTML);
      tongTien += gia * soLuong;
      console.log(tongTien);
  
    });
  }
  var tien = document.querySelector(".gia");
  console.log(tien);
  tien.setAttribute("data-gia", tongTien);
  console.log("tinh tien");

hien();
