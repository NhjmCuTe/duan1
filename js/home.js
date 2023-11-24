document.addEventListener("DOMContentLoaded", function() {
  // Lấy tất cả các phần tử có class 'anh' (bảng màu)
  var mauElements = document.querySelectorAll(".bst-thu-dong .anh");


  // Lặp qua từng phần tử màu
  mauElements.forEach(function (mauElement) {
    // Thêm sự kiện click cho mỗi phần tử màu


    mauElement.addEventListener("click", function () {
      // Lấy giá trị thuộc tính data-ten_anh bằng thuộc tính dataset
      var mauDuocChon = mauElement.querySelector("img").src;

      // Lấy phần tử hình ảnh chính của sản phẩm cụ thể
      var hinhAnhChinh = mauElement
        .closest(".sanpham")
        .querySelector(".img img");

      // Đặt giá trị thuộc tính src của hình ảnh chính thành màu đã chọn
      hinhAnhChinh.src = mauDuocChon;
    });
  });
});
