<h1 class="text-center">Toàn bộ đơn hàng hủy (<?= $sl_dh_huy['sl_dh'] ?>)</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_donhang" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Đơn hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng số lượng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Cách thanh toán</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>


            <!-- <th scope="col"></th>
            <th scope="col"></th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_donhang as $value) : extract($value);
            $mang_trang_thai = explode(',', $trang_thai);
            $mang_thoi_gian = explode(',', $thoi_gian);

        ?>
            <tr>
                <th scope="row"><?= $id_donhang ?></th>
                <th><?= $ngay_dat_hang ?></th>
                <td><?= $so_luong_mua ?></td>
                <td><?= number_format($tong_tien,0,'','.')  ?></td>
                <td><?= $ten_khachhang ?></td>
                <td><?= $dia_chi ?></td>
                <td><?= $sdt ?></td>
                <td><?= $cach_thanh_toan ?></td>
                <td><?= $ghi_chu ?></td>
                <td><?= end($mang_trang_thai) ?> <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#donhang<?= $id_donhang ?>" aria-controls="offcanvasWithBothOptions">Chi tiết</button></td>
                <td><a href="index.php?act=chi_tiet_dh&id_dh=<?= $id_donhang ?>">Chi tiết</a></td>


                
                <!-- <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td> -->
            </tr>



            <div class="offcanvas offcanvas-end " tabindex="-1" id="donhang<?= $id_donhang ?>" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Trạng thái đơn hàng</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <?php foreach (array_map(null, $mang_thoi_gian, $mang_trang_thai) as [$tg, $tt]) : ?>
                        <div class="mb-2 row">
                            <span class="col-5"><?= $tg ?></span><span class="col-5"><?= $tt ?> <br></span>
                        </div>
                    <?php endforeach ?>
                    <!-- <form action="index.php?act=ds_donhang" method="post">
                        <div class="form-floating  trang_thai">
                            <select name="trang_thai" class="form-select mt-4" id="floatingSelect" aria-label="Floating label select example">
                               
                                <option value="Đã xác nhận">Đã xác nhận</option>
                                <option value="Đang giao hàng">Đang giao hàng</option>
                                <option value="Đã giao hàng">Đã giao hàng</option>
                                <option value="Đã hủy">Đã hủy</option>
                            </select>
                            <label for="floatingSelect">Chọn trạng thái</label>
                        </div>
                        <input type="hidden" name="id_don_hang" value="<?= $id_donhang ?>">
                        <label for="checkbox1">Trạng thái khác</label>
                        <input name="check" type="checkbox" id="checkbox1" class="check_box mt-3 mb-4 ms-3">
                        <input name="trang_thai_khac" class="form-control form-control-lg hidden-input" type="text" placeholder="Nhập trạng thái" aria-label=".form-control-lg example">
                        <br>
                        <button name="thay_doi" type="submit" class="btn btn-primary mt-2" style="width: 100%;" onclick="return confirm('bạnc có muốn cập nhật trạng thái không?')">Thay đổi</button>
                    </form> -->
                </div>
            </div>


        <?php endforeach ?>

    </tbody>
</table>