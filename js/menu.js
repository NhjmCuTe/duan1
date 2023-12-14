// Lắng nghe sự kiện khi modal được mở
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
$("#modal_gio_hang").on("show.bs.modal", function () {
  // Thêm class vào body khi modal được mở
  $("body").addClass("hien_gio_hang");
});

// Lắng nghe sự kiện khi modal được đóng
$("#modal_gio_hang").on("hidden.bs.modal", function () {
  // Xóa class khỏi body khi modal được đóng
  $("body").removeClass("hien_gio_hang");
});
