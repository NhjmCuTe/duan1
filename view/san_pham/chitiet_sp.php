<?php
extract($chitiet_sp) ?>

<main>
    <div class="container pt-3">
        <div class="row">

            <div class="col-5">
                <div class="slider-for">
                    <?php $mang_anh = explode(',', $all_anh);
                    foreach ($mang_anh as $anh) : ?>
                        <div><img src="<?= $duong_dan_anh . $anh ?>" alt="" /></div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-2">
                <div class="slider-nav">
                    <?php foreach ($mang_anh as $anh) : ?>
                        <div><img src="<?= $duong_dan_anh . $anh ?>" alt="" /></div>

                    <?php endforeach ?>
                </div>
            </div>

            <div class="col-5 thong_tin_sp">
                <div class="name_san_pham">
                    <h5 class="mau_chung"><?= $ten_sanpham ?></h5>
                </div>
                <div class="ma_sp">
                    Mã sp: <span class="mau_chung"><?= $id_sanpham ?></span>
                </div>
                <div class="gia price" data-gia="<?= $gia ?>"><?= number_format($gia,0,'','.')?> đ</div>
                <div class="mau">Màu sắc: <span class="mau_chung"></span></div>
                <div class="bang_mau">
                    <?php $mang_img_mau = explode(',', $img_mau);
                    $mang_id_mau = explode(',', $id_mau);
                    $mang_ten_mau = explode(',', $ten_mau);
                    foreach (array_map(null, $mang_id_mau, $mang_ten_mau, $mang_img_mau) as [$id, $ten, $img]) :
                    ?>
                        <div class="anh">
                            <img src="<?= $duong_dan_anh . $img ?>" data-id_mau="<?= $id ?>" data-mau="<?= $ten ?>" alt="" />
                        </div>

                    <?php endforeach ?>
                </div>

                <div class="kich_co">
                    Kích cỡ: <span class="mau_chun size"></span><span class="chua_chon_size">Vui lòng chọn kích
                        cỡ</span>
                </div>
                <div class="bang_kich_co">
                    <?php $mang_kichthuoc = explode(',', $ten_kichthuoc);
                    foreach ($mang_kichthuoc as $value) :
                    ?>
                        <button class="size"><?= $value ?></button>
                    <?php endforeach ?>
                </div>

                <div class="tim_size" data-bs-toggle="modal" data-bs-target="#modal_tim_size" id="tim_size">
                    <i class="fa-light fa-ruler"></i>Gợi ý tìm size<i class="fa-solid fa-chevron-right i2"></i>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal_tim_size" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Hướng dẫn chọn size
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./img/Man-measurement.png" alt="" width="100%" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="so_luong_chinh">
                    <span>Số lượng: </span><button class="bt1"><i class="fa-solid fa-minus"></i></button><input type="number" name="" id="" min="1" value="1" placeholder="Số lượng" disabled /><button class="bt2"><i class="fa-solid fa-plus"></i></button>
                </div>

                <div class="them_vao_gio">
                    <button id="liveToastBtn">
                        <i class="fa-regular fa-cart-shopping"></i>Thêm vào giỏ
                    </button>
                </div>

                <div class="toast-container position-fixed top-0 end-0 thong_bao">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                        <div class="align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body noi_dung">
                                    <i class="fa-light fa-circle-check fa-beat"></i><span>Sản phẩm đã được thêm vào
                                        giỏ hàng!</span>
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mua">
                    <button id="mua">Mua</button>
                </div>
                <div class="accordion accordion-flush mota" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Mô tả
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <?= $mo_ta ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Chất liệu
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">60% cotton 40% polyester</div>
                        </div>
                    </div>
                    <div class="accordion-item">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="banner2">
            <div class="box box1">
                <img src="./img/service1.png" alt="" />
                <div class="content">
                    <h4>Thanh toán khi nhận hàng (COD)</h4>
                    <span>Giao hàng toàn quốc.</span>
                </div>
            </div>
            <div class="box box2">
                <img src="./img/service2.png" alt="" />
                <div class="content">
                    <h4>Miễn phí giao hàng</h4>
                    <span>Với đơn hàng trên 599.000đ.</span>
                </div>
            </div>
            <div class="box box3">
                <img src="./img/service3.png" alt="" />
                <div class="content">
                    <h4>Đổi hàng miễn phí</h4>
                    <span>Trong 30 ngày kể từ ngày mua.</span>
                </div>
            </div>
        </div>
    </div>
</main>