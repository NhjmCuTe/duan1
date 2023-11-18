<?php
function all_san_pham()
{
  $sql = "SELECT
    sp.id_sanpham,
    sp.ten_sanpham,
    sp.mo_ta,
    sp.gia,
    dm.ten_danhmuc,
    dmc.ten_danhmuc_con
  FROM
    san_pham sp
  JOIN
    danh_muc_con dmc ON sp.id_danhmuc_con = dmc.id_danhmuc_con
  JOIN
    danh_muc dm ON dmc.id_danhmuc = dm.id_danhmuc;
  ";
  $kq = pdo_query($sql);
  return $kq;
  var_dump($kq);
  die;
}
function xoa_san_pham($id_sanpham)
{
  $sql = "delete from san_pham where id_sanpham = $id_sanpham";
  pdo_execute($sql);
}
function size_san_pham($id_sanpham)
{
  $sql = "SELECT
    sct.id_kichthuoc,
    kt.ten_kichthuoc,
    GROUP_CONCAT(sct.id_sanpham_chitiet) AS id_sanpham_chitiet,
    GROUP_CONCAT(sct.id_sanpham) AS id_sanpham,
    GROUP_CONCAT(sct.id_mau) AS id_mau,
    GROUP_CONCAT(sct.so_luong) AS so_luong
  FROM
    sanpham_chitiet sct
  JOIN
    kich_thuoc kt ON sct.id_kichthuoc = kt.id_kichthuoc
  WHERE
    sct.id_sanpham = $id_sanpham
  GROUP BY
    sct.id_kichthuoc, kt.ten_kichthuoc;
  ";
  $kq = pdo_query($sql);
  return $kq;
}
function mau_san_pham($id_sanpham)
{
  $sql = "SELECT
    m.id_mau,
    m.ten_mau,
    m.img_mau,
    GROUP_CONCAT(sct.id_sanpham) AS id_sanpham
  FROM
    mau m
  JOIN
    sanpham_chitiet sct ON m.id_mau = sct.id_mau
  WHERE
    sct.id_sanpham = $id_sanpham
  GROUP BY
    m.id_mau, m.ten_mau, m.img_mau;
  
  ";
  $kq = pdo_query($sql);
  return $kq;
}

function anh_theo_mau($id_mau)
{
  $sql = "SELECT
    id_anh,
    img_anh,
    id_mau
  FROM
    anh
  WHERE
    id_mau = $id_mau;
  ";

  $kq = pdo_query($sql);
  return $kq;
}
function them_sp($ten, $gia, $mota, $id_dm_con)
{
  $sql = "insert into san_pham(id_sanpham, ten_sanpham, gia, mo_ta, id_danhmuc_con) values (null, '$ten', $gia, '$mota',$id_dm_con)";

  pdo_execute($sql);
}
function load_1_sp($id_sanpham)
{
  $sql = "SELECT
  san_pham.id_sanpham,
  san_pham.ten_sanpham,
  san_pham.mo_ta,
  san_pham.gia,
  danh_muc.id_danhmuc,
  danh_muc_con.id_danhmuc_con
FROM
  san_pham
JOIN
  danh_muc_con ON danh_muc_con.id_danhmuc_con = san_pham.id_danhmuc_con
JOIN
  danh_muc ON danh_muc.id_danhmuc = danh_muc_con.id_danhmuc
WHERE
  san_pham.id_sanpham = $id_sanpham;
";
  $kq = pdo_query_one($sql);
  return $kq;
}
function edit_san_pham($id_sanpham, $ten_sanpham, $gia, $mota, $danh_muc_con)
{
  $sql = "UPDATE `san_pham` SET `ten_sanpham` = '$ten_sanpham', `gia` = $gia, `mo_ta` = '$mota', `id_danhmuc_con` = $danh_muc_con
   WHERE `san_pham`.`id_sanpham` = $id_sanpham";

  pdo_execute($sql);
}
function them_kich_thuoc($ten){
  $sql = "insert into kich_thuoc(id_kichthuoc, ten_kichthuoc) values (null,'$ten')";
  pdo_execute($sql);
}
