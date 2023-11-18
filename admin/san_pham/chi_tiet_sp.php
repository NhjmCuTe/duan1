<a href="index.php?act=them_kich_thuoc=<?=$_GET['id_mau']?>">Thêm kích thước</a>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID kích thước</th>
            <th scope="col">Tên kích thước</th>
            
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php var_dump($size_sp); foreach ($size_sp as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_kichthuoc ?></th>
                <th scope="row"><?= $ten_kichthuoc ?></th>
                
                
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID màu</th>
            <th scope="col">Tên màu</th>
            <th scope="col">Ảnh màu</th>
            
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php  foreach ($mau_sp as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_mau ?></th>
                <th scope="row"><?= $ten_mau ?></th>
                <th scope="row"><img src="../<?=$duong_dan_anh.$img_mau ?>" alt="" width="80px"></th>
                
                
                <td><a href="index.php?act=anh_theo_mau&id_mau=<?= $id_mau ?>" >Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>