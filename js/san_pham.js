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
  slidesToShow: 3,
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
// anh_sp();
const buttons = document.querySelectorAll(".bang_kich_co .size");
const kich_co = document.querySelector(".kich_co span");

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    them_vao_gio.id = "liveToastBtn";

    kich_co.innerHTML = button.innerHTML;
    thong_bao.style.opacity = 0;
    thong_bao.style.visibility = "hidden";
    buttons.forEach((btn) => {
      btn.classList.remove("chon");
    });
    button.classList.add("chon");
  });
});

const toastTrigger = document.getElementById("liveToastBtn");
const toastLiveExample = document.getElementById("liveToast");

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
  toastTrigger.addEventListener("click", () => {
    if (kich_co.innerHTML != "") {
      toastBootstrap.show();
    }
  });
}

var productDivs = document.querySelectorAll(".bang_mau .anh");

productDivs.forEach(function (div) {
  var img = div.querySelector("img");
  var id_mau = img.dataset.id_mau;

  img.addEventListener("click", function () {
    fetch("view/san_pham/anh_theo_mau.php?id_mau=" + id_mau)
      .then((response) => response.json())
      .then((data) => {
        // Lấy đối tượng carousel Slick bằng ID
        var slickCarousel = $(".slider-for");
        var slickCarousel_2 = $(".slider-nav");
        var anh_da_load = "";
        slickCarousel.innerHTML = "";
        slickCarousel_2.innerHTML = "";

        for (let index = 0; index < data.length; index++) {
          const ten_anh = data[index]["img_anh"];
          anh_da_load +=
            '<div><img src="' + duong_dan_anh + ten_anh + '" alt="" /></div>';
        }

        // Xóa tất cả các slide hiện tại của carousel
        slickCarousel.slick("unslick");
        slickCarousel_2.slick("unslick");

        // Thêm các slide mới vào carousel
        slickCarousel.html(anh_da_load);
        slickCarousel_2.html(anh_da_load);

        // Khởi tạo lại carousel Slick với các hình ảnh mới

        // Lưu tất cả tùy chỉnh của slick carousel vào biến
        var slickCarousel1Settings = {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          fade: false,
          asNavFor: ".slider-nav",
          nextArrow: '<i class="fa-duotone next fa-arrow-right"></i>',
          prevArrow: '<i class="fa-duotone prev fa-arrow-left"></i>',
          speed: 500,
          zIndex: 1,
        };

        var slickCarouselNavSettings = {
          slidesToShow: 3,
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
        };

        // Gọi lại slick carousel với các tùy chỉnh đã lưu
        slickCarousel.slick(slickCarousel1Settings);
        slickCarousel_2.slick(slickCarouselNavSettings);

        slickCarousel.slick();
        slickCarousel_2.slick();
      })
      
  });
});

const bang_mau = document.querySelectorAll(".thong_tin_sp .bang_mau .anh");
const bang_mau_1 = document.querySelectorAll(".thong_tin_sp .bang_mau img");
const mau_sac = document.querySelector(".mau span");

if(bang_mau && bang_mau_1 && mau_sac){

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
}


