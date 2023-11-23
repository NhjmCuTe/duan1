<?php
// thêm tài khoản ki đăng kí
function insert_taikhoan($user, $pass, $email, $sdt, $address)
{
    $sql = "INSERT INTO tai_khoan(ten,pass,email,sdt,address) VALUES ('$user','$pass','$email','$sdt','$address') ";
    pdo_execute($sql);
}

// check tài khoản khi đăng nhập
function checkuser($user, $pass)
{
    $sql = "select * from tai_khoan where ten='" . $user . "' and pass='" . $pass . "'";
    $checkuser = pdo_query_one($sql);
    return $checkuser;
}

//load All danh sách tài khoản
function all_taikhoan()
{
    $sql = "select * from tai_khoan ";
    $kq = pdo_query($sql);
    return $kq;
}

// xuất thông tin tài khoản của người dùng
// function loadAllone_taikhoan($idUser){
//     $sql = " SELECT * FROM user where  idUser='".$idUser."'";
//     $listtk = pdo_query_one($sql);
//     return $listtk;
// }
// // xác minh tài khoản theo email khi quên
// function loadAllone_checkemail($email){
//     $sql = " SELECT * FROM user where  email='".$email."'";
//     $listtk = pdo_query_one($sql);
//     return $listtk;
// }
// // thay đổi thông tin dùng
// function update_taikhoan($user,$pass,$email,$sdt,$address){
//     $sql = "update user set user='".$user."',  pass='".$pass."' ,email='".$email."' ,tel='".$sdt."' ,address='".$address."'  where user='".$user."'";
//     pdo_execute($sql);

// }

function xoa_tk($id_tk){
    $sql = "delete from tai_khoan where id_taikhoan = $id_tk";
    pdo_execute($sql);
}
