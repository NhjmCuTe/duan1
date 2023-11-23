<h1 class="text-center">Thêm tài khoản</h1>

<form class="pt-9 px-9" action="index.php?act=them_tk" method="post">
    <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Tên</label>
        <input type="text" name="username" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-4">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>

    <input type="submit" name="them_tk" value="Thêm tài khoản" class="btn btn-primary">
    <button type="reset" class="btn btn-danger">Reset</button>
</form>