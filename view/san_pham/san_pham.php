<div class="san_pham_all container">
    <div class="row">
        <div class="col-3">
            <div class="accordion accordion-flush mota" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Kích thước
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="bang_kich_co">
                                <?php
                                foreach ($all_kich_thuoc as $value) :
                                ?>
                                    <button class="size"><?= $value['ten_kichthuoc'] ?></button>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Khoảng giá
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body"><input type="range" class="form-range" min="0" max="5" id="customRange2"></div>
                    </div>
                </div>
                <!-- <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Hướng dẫn sử dụng
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            Giặt máy ở chế độ nhẹ, nhiệt độ thường. Không sử dụng hóa
                            chất tẩy có chứa Clo. Phơi trong bóng mát.Sấy thùng, chế độ
                            nhẹ nhàng. Là ở nhiệt độ trung bình 150 độ C. Giặt với sản
                            phẩm cùng màu. Không là lên chi tiết trang trí.
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="col-9">
            <div class=" row sp">
                <?php if (isset($tu_khoa_tim) && $tu_khoa_tim != '') : ?>
                    <h2 class="text-center">Tìm kiếm: <span class="text-primary"><?= $tu_khoa_tim ?></span></h2>
                <?php endif ?>
                <?php if (!empty($san_pham)) : foreach ($san_pham as $value) : extract($value);
                        $mang_anh = explode(',', $value['img_mau']); ?>


                        <div class=" col-4 mb-4 sanpham">
                            <div class="img-prd">
                                <div class="img"><a href="index.php?act=chitiet_sp&id_sp=<?= $value['id_sanpham'] ?>">
                                        <img src="<?= $duong_dan_anh . $mang_anh[0] ?>" alt="" /></a></div>
                                <button class="add-to-cart">
                                        <span>Xem sản phẩm</span>
                                    </button>
                            </div>
                            <div class="info-prd">
                                <div class="bang_mau">
                                    <?php
                                    foreach ($mang_anh as $anh) : ?>
                                        <div class="anh">
                                            <img src="<?= $duong_dan_anh . $anh ?>" alt="" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <h6 class="product-item-name">
                                    <a href="index.php?act=chitiet_sp&id_sp=<?= $value['id_sanpham'] ?>"><?= $ten_sanpham ?></a>
                                </h6>
                                <span class="price"><?= number_format($gia, 0, '', '.') ?> đ</span>
                            </div>
                        </div>

                    <?php endforeach ?>
                <?php else : ?>
                    <h1 class="text-center">Không có sản phẩm</h1>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<script>
    var size = document.querySelectorAll('.san_pham_all .bang_kich_co .size');
    size.forEach(button => {
        button.addEventListener('click', () => {
            size.forEach((btn) => {
                btn.classList.remove("chon");
            });
            button.classList.add("chon");





            var kich_thuoc = button.innerText;
            // Tạo một yêu cầu POST sử dụng fetch()
            fetch('model/sanpham_theo_kt.php?kich_thuoc=' + kich_thuoc)
                .then(response => response.text()) // Xử lý phản hồi thành dạng văn bản
                .then(textData => {
                    document.querySelector('.san_pham_all .sp').innerHTML = '';
                    document.querySelector('.san_pham_all .sp').innerHTML = textData;
                    thay_anh();
                    // console.log(textData);
                })
                .catch(error => {
                    // Xử lý lỗi nếu có
                    console.error('Lỗi:', error);
                });
        })
    });

    function thay_anh() {
        // Lấy tất cả các phần tử có class 'anh' (bảng màu)
        var mauElements = document.querySelectorAll(".anh");


        // Lặp qua từng phần tử màu
        mauElements.forEach(function(mauElement) {
            // Thêm sự kiện click cho mỗi phần tử màu


            mauElement.addEventListener("click", function() {
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
    }
    // const buttons = document.querySelectorAll(".bang_kich_co .size");
    // const kich_co = document.querySelector(".kich_co span");
    // console.log(buttons);
    // buttons.forEach((button) => {
    //     button.addEventListener("click", () => {
    //         buttons.forEach((btn) => {
    //             btn.classList.remove("chon");
    //         });
    //         button.classList.add("chon");
    //     });
    // });
</script>