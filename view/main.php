<main>


  <article class="container">
    <div class="uu-dai-doc-quyen">
      <h2>Ưu đãi độc quyền</h2>
      <div class="location">
        <button id="onlineBtn" class="active">Online</button>
        <button id="storeBtn">Cửa hàng</button>
      </div>
    </div>
    <div class="poster">
      <img src="img\banner-top-trang-chu-3-slide-21.png" alt="" />
      <img src="img\dongiolanh-banner-web_2880x960-.jpg" alt="" />
      <img src="img/3.-tat-giam-50_uu-dai_desktop-mobile.webp" alt="" />
    </div>
    <div class="bst-thu-dong">
      <div class="title-bst">
        <h2>Gợi ý cho bạn</h2>
        <div class="online">
          <button>Xem thêm</button><i class="fas fa-angle-double-right"></i>
        </div>
      </div>
      <div class=" row">

        <?php foreach ($san_pham_home as $value) : extract($value);
          $mang_anh = explode(',', $value['img_mau']); ?>


          <div class=" col-3 mb-4 sanpham">
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

      </div>



    </div>