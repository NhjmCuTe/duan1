
<?php

function insert_danhmuc($ten_danhmuc){
    $sql = "INSERT INTO `danh_muc` (`ten_danhmuc`) VALUES ('$ten_danhmuc')";
    pdo_execute($sql);
}

function delete_danhmuc($id_danhmuc){
    $sql = "DELETE FROM `danh_muc` WHERE `id_danhmuc` = $id_danhmuc";
    pdo_execute($sql);

    // Xóa các danh mục con liên quan
    $sql_sub = "DELETE FROM `danh_muc_con` WHERE `id_danhmuc` = $id_danhmuc";
    pdo_execute($sql_sub);
}

function loadAll_danhmuc(){
    $sql = "SELECT * FROM `danh_muc`";
    return pdo_query($sql);
}

function loadOne_danhmuc($id_danhmuc){
    $sql = "SELECT * FROM `danh_muc` WHERE `id_danhmuc` = $id_danhmuc";
    return pdo_query_one($sql);
}

function update_danhmuc($id_danhmuc, $ten_danhmuc){
    $sql = "UPDATE `danh_muc` SET `ten_danhmuc` = '$ten_danhmuc' WHERE `id_danhmuc` = $id_danhmuc";
    pdo_execute($sql);
}

function insert_danhmuccon($ten_danhmuc_con, $id_danhmuc){
    $sql = "INSERT INTO `danh_muc_con` (`ten_danhmuc_con`, `id_danhmuc`) VALUES ('$ten_danhmuc_con', $id_danhmuc)";
    pdo_execute($sql);
}

function loadAll_danhmuccon($id_danhmuc){
    $sql = "SELECT * FROM `danh_muc_con` WHERE `id_danhmuc` = $id_danhmuc";
    return pdo_query($sql);
}

function loadOne_danhmuccon($id_danhmuc_con){
    $sql = "SELECT * FROM `danh_muc_con` WHERE `id_danhmuc_con` = $id_danhmuc_con";
    return pdo_query_one($sql);
}

function update_danhmuccon($id_danhmuc_con, $ten_danhmuc_con){
    $sql = "UPDATE `danh_muc_con` SET `ten_danhmuc_con` = '$ten_danhmuc_con' WHERE `id_danhmuc_con` = $id_danhmuc_con";
    pdo_execute($sql);
}

function delete_danhmuccon($id_danhmuc_con){
    $sql = "DELETE FROM `danh_muc_con` WHERE `id_danhmuc_con` = $id_danhmuc_con";
    pdo_execute($sql);
}

?>
