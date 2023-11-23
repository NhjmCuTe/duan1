// Lắng nghe sự kiện khi modal được mở

$("#modal_gio_hang").on("show.bs.modal", function () {
  // Thêm class vào body khi modal được mở
  $("body").addClass("hien_gio_hang");
});

// Lắng nghe sự kiện khi modal được đóng
$("#modal_gio_hang").on("hidden.bs.modal", function () {
  // Xóa class khỏi body khi modal được đóng
  $("body").removeClass("hien_gio_hang");
});
