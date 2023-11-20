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