const hien_thi = document.querySelectorAll('.hien_thi');
// console.log(hien_thi);
hien_thi.forEach((value) => {
    const button = value.querySelector('.button');
    const form = value.querySelector('.form');

    button.addEventListener('click',()=>{
        button.style.display = "none";
        form.style.display = "block";
    });
});

// Lấy danh sách checkbox và input text tương ứng
const checkboxes = document.querySelectorAll('.check_box');
const textInputs = document.querySelectorAll('input[type="text"]');
console.log(checkboxes);
// Thêm sự kiện cho từng checkbox
checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener("change", function () {
        if (this.checked) {
            textInputs[index].style.display = "block";
            document.querySelectorAll('.trang_thai')[index].style.display='none';
        } else {
            document.querySelectorAll('.trang_thai')[index].style.display='block';
            textInputs[index].style.display = "none";
        }
    });
});
