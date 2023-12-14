

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
        document.querySelector(".thong_tin_sp .so_luong_chinh input").value
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


      // Sử dụng XMLHttpRequest để gửi yêu cầu không đồng bộ
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Xử lý kết quả từ server (nếu cần)
          // alert(xhr.responseText);
          // console.log(xhr.responseText);
          document.getElementById('sl_gio_hang').innerText = xhr.responseText;
        }
      };
      xhr.open("POST", "model/gio_hang.php", true);
      xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

      // Gửi dữ liệu JSON lên server
      xhr.send(JSON.stringify({ gio_hang: dataToSave }));
      hienThiGioHang();
    }
  });
}

function hienThiGioHang() {
  // Gửi yêu cầu Ajax để lấy thông tin giỏ hàng từ server
  var xhrGioHang = new XMLHttpRequest();
  xhrGioHang.onreadystatechange = function () {
    if (xhrGioHang.readyState === 4 && xhrGioHang.status === 200) {
      // Xử lý kết quả từ server và cập nhật giao diện người dùng
      var responseText = xhrGioHang.responseText.trim();
      if (responseText === '') {
        document.getElementById("san_pham_gio_hang").innerHTML = `<div class="gio_hang_rong">
                <img src="img/cart-empty.png" alt="">
                <h5>Giỏ hàng trống</h5>
            </div>`;
        document.querySelector('.modal_gio_hang .modal-footer').style.display = 'none';
      }
      else {
        document.getElementById("san_pham_gio_hang").innerHTML =
          responseText;
        document.querySelector('.modal_gio_hang .modal-footer').style.display = 'block';
        cap_nhat_dom();
        load_all_giohang();
      }


    }
  };
  xhrGioHang.open("GET", "model/hien_sp_giohang.php", true);
  xhrGioHang.send();
  console.log("hien thi");
}
var so_luong_sanpham;
var priceElements;
var all_gia_sp;
var cacNutXoaGioHang;
function cap_nhat_dom() {
  console.log('cập nhật dom');
  so_luong_sanpham = document.querySelectorAll(".so_luong");

  priceElements = document.querySelectorAll(".modal_gio_hang .price");
  all_gia_sp = document.querySelectorAll(".box .gia");
  cacNutXoaGioHang = document.querySelectorAll(".xoa_gh");
}
//tăng số lượng sản phẩm

function tang_giam_sl() {
  // so_luong_sanpham = document.querySelectorAll(".so_luong");
  console.log('tăng giảm sl');
  so_luong_sanpham.forEach((value) => {
    const input_so_luong = value.querySelector(".so_luong input");
    const giam = value.querySelector(".so_luong .bt1");
    const tang = value.querySelector(".so_luong .bt2");


    tang.addEventListener("click", () => {
      var so = parseInt(input_so_luong.value);

      console.log(input_so_luong.value);
      input_so_luong.value = so + 1;

      // tang_giam_sl();
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
  console.log("so luong");
}

document.addEventListener("DOMContentLoaded", function () {
  hienThiGioHang();
  // tang_giam_sl();
  // hientien();
});

function hientien() {
  // var priceElements = document.querySelectorAll(".price");
  if (priceElements) {
    priceElements.forEach(function (priceElement) {
      var gia = parseFloat(priceElement.dataset.gia);
      var giaFormatted = formatCurrency(gia);
      priceElement.innerHTML = giaFormatted + " ₫";
    });
    console.log("hien tien");
  }
}

function formatCurrency(gia) {
  return gia.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}

function tinhTongTienTrongGioHang() {
  var tongTien = 0;
  // var all_gia_sp = document.querySelectorAll(".box .gia");

  if (all_gia_sp) {
    all_gia_sp.forEach(function (priceElement) {
      var gia = parseFloat(priceElement.querySelector(".price").dataset.gia);
      var soLuong = parseInt(priceElement.querySelector("input").value);
      tongTien += gia * soLuong;
    });
  }
  var tien = document.querySelector(".tien .gia");

  tien.setAttribute("data-gia", tongTien);
  console.log("tinh tien");
}

// Bắt sự kiện click vào button xóa
function layCacNutXoaGioHang() {
  // var cacNutXoaGioHang = document.querySelectorAll(".xoa_gh");

  cacNutXoaGioHang.forEach((btn) => {
    btn.addEventListener("click", () => {
      var indexCanXoa = parseInt(btn.dataset.index);
      xoaSanPhamTheoIndex(indexCanXoa);
    });
  });
  console.log("laynutxoa");
}
// Hàm để xóa sản phẩm theo index và cập nhật giao diện
function xoaSanPhamTheoIndex(indexCanXoa) {
  if (confirm('Bạn có muốn xóa sản phẩm không?')) {
    // Sử dụng XMLHttpRequest để gửi yêu cầu không đồng bộ
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Xử lý kết quả từ server (nếu cần)
        // Cập nhật giao diện người dùng mà không cần load lại trang
        hienThiGioHang();
        document.getElementById('sl_gio_hang').innerText = xhr.responseText;
      }
    };

    // Gửi yêu cầu xóa sản phẩm đến server với index tương ứng
    xhr.open("GET", "model/xoa_gio_hang.php?index=" + indexCanXoa, true);
    xhr.send();
  }

}

var button_giohang = document.getElementById("gio_hang");
button_giohang.addEventListener("click", () => {
  hienThiGioHang();
});
// var button_giohang = document.getElementById("gio_hang");
// button_giohang.addEventListener("click", hienThiGioHang);

function load_all_giohang() {
  tinhTongTienTrongGioHang();
  hientien();
  tang_giam_sl();
  layCacNutXoaGioHang();
}

var duong_dan = window.location.href;
var hidden = document.querySelectorAll('.duong_dan');
console.log(hidden);
hidden.forEach(input => {
  input.value = duong_dan;
})
document.querySelector(".thanh_toan .mua button").addEventListener("click", function () {
  // Sử dụng Fetch API để kiểm tra session
  fetch("model/kiem_tra_user.php")
    .then(function (response) {
      return response.text(); // Chuyển đổi phản hồi thành văn bản
    })
    .then(function (data) {
      if (data === "ton_tai") {
        // Session tồn tại, chuyển hướng đến trang khác
       location.href = "index.php?act=thanh_toan_1&an";
      } else {
        // Session không tồn tại, hiển thị thông báo
        // alert("Vui lòng đăng nhập để thanh toán");

        $('#modal_dang_nhap').modal('show'); // Hiển thị modal
        $('#modal_gio_hang').modal('hide'); // Hiển thị modal
        // console.log(document.getElementById('modal_dang_nhap'));
      }
    })
    .catch(function (error) {
      console.error("Lỗi kiểm tra session:", error);
    });
});
document.getElementById('modal_dang_ky').modal('show'); // Hiển thị modal



