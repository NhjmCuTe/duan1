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
$(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    asNavFor: ".slider-nav",
    nextArrow: '<i class="fa-duotone next fa-arrow-right"></i>',
    prevArrow: '<i class="fa-duotone prev fa-arrow-left"></i>',
    speed: 500,
    zIndex: 1,
});
$(".slider-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
    arrows: false,
    speed: 500,
    focusOnSelect: true,
});

$(".slider-nav").on("click", ".slick-slide", function () {
    $(".slick-slide").removeClass("selected");
    $(this).addClass("selected");
});
const buttons = document.querySelectorAll(".bang_kich_co .size");
const kich_co = document.querySelector(".kich_co span");

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        them_vao_gio.id = "liveToastBtn";
        console.log(them_vao_gio.id);
        kich_co.innerHTML = button.innerHTML;
        thong_bao.style.opacity = 0;
        thong_bao.style.visibility = "hidden";
        buttons.forEach((btn) => {
            btn.classList.remove("chon");
        });
        button.classList.add("chon");
    });
});

const bang_mau = document.querySelectorAll(".bang_mau .anh");
const bang_mau_1 = document.querySelectorAll(".bang_mau img");
const mau_sac = document.querySelector(".mau span");

bang_mau[0].classList.add("chon_mau");

mau_sac.innerHTML = bang_mau_1[0].dataset.mau;
bang_mau.forEach((mau) => {
    mau.addEventListener("click", () => {
        var anh_mau = mau.querySelector("img");
        mau_sac.innerHTML = anh_mau.dataset.mau;
        bang_mau.forEach((mau) => {
            mau.classList.remove("chon_mau");
        });
        mau.classList.add("chon_mau");
    });
});
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
    const them_vao_gio = document.querySelector(
        ".them_vao_gio button"
    );
    const thong_bao = document.querySelector(
        ".kich_co .chua_chon_size"
    );

    them_vao_gio.addEventListener("click", () => {
        if (kich_co.innerHTML == "") {
            thong_bao.style.opacity = 1;
            thong_bao.style.visibility = "visible";
        }
    });
    const toastTrigger = document.getElementById("liveToastBtn");
    const toastLiveExample = document.getElementById("liveToast");

    if (toastTrigger) {
        const toastBootstrap =
            bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastTrigger.addEventListener("click", () => {
            if (kich_co.innerHTML != "") {
                toastBootstrap.show();
            }
        });
    }