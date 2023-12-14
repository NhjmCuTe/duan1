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

