// document.addEventListener("DOMContentLoaded", function () {
//   var priceElements = document.querySelectorAll(".price");

//   priceElements.forEach(function (priceElement) {
//     var gia = parseFloat(priceElement.dataset.gia);
//     var giaFormatted = formatCurrency(gia);
//     priceElement.textContent = giaFormatted + " ₫";
//   });
// });

// function formatCurrency(gia) {
//   return gia.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
// }

const duong_dan_anh = "img/";

const them_vao_gio = document.querySelector(".them_vao_gio button");
const thong_bao = document.querySelector(".kich_co .chua_chon_size");

if (them_vao_gio && thong_bao) {
  them_vao_gio.addEventListener("click", () => {
    if (kich_co.innerHTML == "") {
      thong_bao.style.opacity = 1;
      thong_bao.style.visibility = "visible";
    } else {
      const id_sp_ht = document.querySelector(
        ".thong_tin_sp .ma_sp span"
      ).innerHTML;
      const ten_sp_ht = document.querySelector(
        ".thong_tin_sp .name_san_pham h5"
      ).innerHTML;
      const gia_ht = document.querySelector(".thong_tin_sp .gia").dataset.gia;
      const id_mau_ht = parseInt(
        document.querySelector(".thong_tin_sp .chon_mau img").dataset.id_mau
      );
      const ten_mau_ht = document.querySelector(
        ".thong_tin_sp .mau span"
      ).innerHTML;
      const ten_img_ht = document.querySelector(
        ".thong_tin_sp .bang_mau .anh.chon_mau img"
      ).src;
      const kt_ht = document.querySelector(
        ".thong_tin_sp .kich_co .size"
      ).innerHTML;
      const sl_ht = parseInt(
        document.querySelector(".thong_tin_sp .so_luong input").value
      );

      // Dữ liệu bạn muốn lưu vào session
      const dataToSave = {
        id_sp: id_sp_ht,
        ten_sp: ten_sp_ht,
        gia: gia_ht,
        id_mau: id_mau_ht,
        ten_mau: ten_mau_ht,
        ten_img: ten_img_ht,
        kt: kt_ht,
        sl: sl_ht,
      };

      console.log(dataToSave);
      // Sử dụng XMLHttpRequest để gửi yêu cầu không đồng bộ
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Xử lý kết quả từ server (nếu cần)
          // alert(xhr.responseText);
          // console.log(xhr.responseText);
        }
      };
      xhr.open("POST", "model/gio_hang.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

      // Gửi dữ liệu JSON lên server
      xhr.send(JSON.stringify({ gio_hang: dataToSave }));
      hienThiGioHang();
      hientien();
      tang_giam_sl();
      layCacNutXoaGioHang();
    }
  });
}

function hienThiGioHang() {
  // Gửi yêu cầu Ajax để lấy thông tin giỏ hàng từ server
  var xhrGioHang = new XMLHttpRequest();
  xhrGioHang.onreadystatechange = function () {
    if (xhrGioHang.readyState === 4 && xhrGioHang.status === 200) {
      // Xử lý kết quả từ server và cập nhật giao diện người dùng
      document.getElementById("san_pham_gio_hang").innerHTML =
        xhrGioHang.responseText;
    }
  };
  xhrGioHang.open("GET", "model/gio_hang1.php", true);
  xhrGioHang.send();
}

function hientien() {
  var priceElements = document.querySelectorAll(".price");

  priceElements.forEach(function (priceElement) {
    var gia = parseFloat(priceElement.dataset.gia);
    var giaFormatted = formatCurrency(gia);
    priceElement.innerHTML = giaFormatted + " ₫";
  });
  console.log('hien tien');

}

function formatCurrency(gia) {
  return gia.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}

//tăng số lượng sản phẩm

function tang_giam_sl() {
  const so_luong_sanpham = document.querySelectorAll(".so_luong");

  so_luong_sanpham.forEach((value) => {
    const input_so_luong = value.querySelector(".so_luong input");
    const giam = value.querySelector(".so_luong .bt1");
    const tang = value.querySelector(".so_luong .bt2");

    tang.addEventListener("click", () => {
      var so = parseInt(input_so_luong.value);
      console.log(so);
      input_so_luong.value = so + 1;
      tinhTongTienTrongGioHang();
      hientien();
    });
    giam.addEventListener("click", () => {
      var so = parseInt(input_so_luong.value);
      if (so > 1) {
        input_so_luong.value = so - 1;
        tinhTongTienTrongGioHang();
        hientien();
      }
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  hienThiGioHang();
});

function tinhTongTienTrongGioHang() {
  var priceElements = document.querySelectorAll(".box .gia");
  var tongTien = 0;
  if (priceElements) {
    // console.log(priceElements);

    priceElements.forEach(function (priceElement) {
      var gia = parseFloat(priceElement.querySelector(".price").dataset.gia);
      var soLuong = parseInt(priceElement.querySelector("input").value);
      tongTien += gia * soLuong;
    });

  }
  document.querySelector(".tien .gia").dataset.gia = tongTien;
}

// Bắt sự kiện click vào button xóa
function layCacNutXoaGioHang() {
  var cacNutXoaGioHang = document.querySelectorAll(".xoa_gh");
  console.log(cacNutXoaGioHang);
  cacNutXoaGioHang.forEach((btn) => {
    btn.addEventListener("click", () => {
      var indexCanXoa = parseInt(btn.dataset.index);
      console.log(indexCanXoa);
      xoaSanPhamTheoIndex(indexCanXoa);
    });
  });
}
// Hàm để xóa sản phẩm theo index và cập nhật giao diện
function xoaSanPhamTheoIndex(indexCanXoa) {
  // Sử dụng XMLHttpRequest để gửi yêu cầu không đồng bộ
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Xử lý kết quả từ server (nếu cần)
      // Cập nhật giao diện người dùng mà không cần load lại trang
      hienThiGioHang();
      console.log('hien thi');
      tinhTongTienTrongGioHang();
      console.log('tinh tien');
      setTimeout(() => hientien(), 1000);


      tang_giam_sl();
      console.log('so luong');

      layCacNutXoaGioHang();
      console.log('hien thi');

    }
  };

  // Gửi yêu cầu xóa sản phẩm đến server với index tương ứng
  xhr.open("GET", "model/xoa_gio_hang.php?index=" + indexCanXoa, true);
  xhr.send();
}

var button_giohang = document.getElementById("gio_hang");
button_giohang.addEventListener("click", () => {

    tinhTongTienTrongGioHang();
    hientien();
    tang_giam_sl();
    layCacNutXoaGioHang();
});

// function load_all_giohang() {
//   tinhTongTienTrongGioHang();
//   hientien();
//   tang_giam_sl();
//   layCacNutXoaGioHang();
// }
