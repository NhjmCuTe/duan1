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
    danh_muc dm ON dmc.id_danhmuc = dm.id_danhmuc
    ORDER BY sp.id_sanpham DESC
  ";
  $kq = pdo_query($sql);
  return $kq;
}
function xoa_san_pham($id_sanpham)
{
  $sql = "delete from san_pham where id_sanpham = $id_sanpham;
  delete from sanpham_chitiet where id_sanpham = $id_sanpham";
  pdo_execute($sql);
}
function size_san_pham($id_sanpham)
{
  $sql = "SELECT
  sct.id_kichthuoc,
  kt.ten_kichthuoc

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
    id_mau = $id_mau
  ";

  $kq = pdo_query($sql);
  return $kq;
}
function them_sp($ten, $gia, $mota, $id_dm_con)
{
  $sql = "insert into san_pham( ten_sanpham, gia, mo_ta, id_danhmuc_con) values ('$ten', $gia, '$mota',$id_dm_con)";

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

function them_anh_sp($id_mau, $ten_anh)
{
  $sql = "insert into anh(img_anh,id_mau) values ('$ten_anh', $id_mau )";
  pdo_execute($sql);
}
function xoa_anh_sp($id_anh)
{
  $sql = "delete from anh where id_anh = $id_anh";
  pdo_execute($sql);
}
function all_size()
{
  $sql = "select * from kich_thuoc";
  $kq = pdo_query($sql);
  return $kq;
}
function them_kich_thuoc_sp($id_sanpham, $id_kichthuoc)
{
  $sql = "insert into sanpham_chitiet( id_sanpham, id_kichthuoc ) values ( $id_sanpham, $id_kichthuoc)";
  pdo_execute($sql);
}
function xoa_kichthuoc_sp($id_kichthuoc, $id_sanpham)
{
  $sql = "delete from sanpham_chitiet where id_sanpham = $id_sanpham and id_kichthuoc = $id_kichthuoc";

  pdo_execute($sql);
}
function xoa_mau_sp($id_mau)
{
  $sql = "DELETE FROM sanpham_chitiet WHERE id_mau = $id_mau;
  DELETE FROM mau WHERE id_mau = $id_mau;
  DELETE FROM anh WHERE id_mau = $id_mau";

  pdo_execute($sql);
}
function them_mau_sp($id_sanpham, $ten_mau, $anh_mau)
{
  $sql = "-- Thêm màu mới vào bảng mau
  INSERT INTO mau (ten_mau, img_mau) VALUES ('$ten_mau', '$anh_mau');
  
  -- Lấy id_mau của màu vừa thêm
  SET @id_mau = LAST_INSERT_ID();
  
  -- Thêm thông tin chi tiết về màu vào bảng sanpham_chitiet
  INSERT INTO sanpham_chitiet (id_sanpham, id_mau) VALUES ($id_sanpham, @id_mau)";
  pdo_execute($sql);
}
function load_1_mau($id_mau)
{
  $sql = "select * from mau where id_mau = $id_mau";
  $kq = pdo_query_one($sql);
  return $kq;
}
function edit_mau($id_mau, $ten_mau, $ten_anh = '')
{
  $sql = "update mau set ten_mau = '$ten_mau' ";
  if ($ten_anh != '') {
    $sql .= ",img_mau = '$ten_anh' ";
  }
  $sql .= "where id_mau = $id_mau";
  // echo $sql;die;
  pdo_execute($sql);
}
function sanpham_home()
{
  $sql = "SELECT sp.id_sanpham, sp.ten_sanpham,sp.gia, GROUP_CONCAT(m.img_mau) AS img_mau
  FROM san_pham sp
  JOIN sanpham_chitiet c ON sp.id_sanpham = c.id_sanpham
  JOIN mau m ON c.id_mau = m.id_mau 
  GROUP BY sp.id_sanpham, sp.ten_sanpham
  ORDER BY sp.id_sanpham DESC LIMIT 8
  ";
  return pdo_query($sql);
}
function chitiet_sp($id_sanpham)
{
  $sql = "SELECT
  sp.id_sanpham,
  sp.ten_sanpham,
  sp.mo_ta,
  sp.gia,
  GROUP_CONCAT(DISTINCT kt.ten_kichthuoc ) AS ten_kichthuoc,
  GROUP_CONCAT(DISTINCT m.id_mau ORDER BY m.id_mau) AS id_mau,
  GROUP_CONCAT(DISTINCT m.ten_mau ORDER BY m.id_mau) AS ten_mau,
  GROUP_CONCAT(DISTINCT m.img_mau ORDER BY m.id_mau) AS img_mau,
  (
      SELECT GROUP_CONCAT(DISTINCT a.img_anh)
      FROM anh a
      WHERE a.id_mau = MIN(m.id_mau)
  ) AS all_anh
FROM
  san_pham sp
LEFT JOIN sanpham_chitiet sct ON
  sp.id_sanpham = sct.id_sanpham
LEFT JOIN kich_thuoc kt ON
  sct.id_kichthuoc = kt.id_kichthuoc
LEFT JOIN mau m ON
  m.id_mau = sct.id_mau
WHERE
  sp.id_sanpham = $id_sanpham
GROUP BY
  sp.id_sanpham, sp.ten_sanpham, sp.mo_ta, sp.gia;

";
  return pdo_query_one($sql);
}
