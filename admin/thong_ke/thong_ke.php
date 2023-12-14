<div class="pt-9 thong_ke">
    <div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="index.php?act=ds_danhmuc">
                    <div class="info-box hover-expand-effect bg-success">
                        <div class="icon">
                            <i class="fa-regular fa-list"></i>
                        </div>
                        <div class="content">
                            <div class="text">DANH MỤC</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $sl_dm['sl_dm'] ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="index.php?act=ds_san_pham">
                    <div class="info-box bg-cyan hover-expand-effect bg-danger">
                        <div class="icon">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </div>
                        <div class="content">
                            <div class="text">SẢN PHẨM</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $sl_sp['sl_sp'] ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="index.php?act=ds_taikhoan">
                    <div class="info-box bg-light-green hover-expand-effect bg-primary">
                        <div class="icon">
                            <i class="fa-regular fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $sl_tk['sl_tk'] ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="index.php?act=ds_donhang">
                <div class="info-box bg-orange hover-expand-effect bg-indigo">
                    <div class="icon">
                        <i class="fa-regular fa-ballot-check"></i>
                    </div>
                    <div class="content">
                        <div class="text">ĐƠN HOÀN THÀNH</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?= $sl_dh_tc['sl_dh'] ?></div>
                    </div>
                </div></a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-9 khung">
            <div style="width: 100%;">
                <div class="d-flex justify-content-between">
                    <h3>Doanh thu ngày: </h3><input type="date" name="" id="datepicker">
                </div>
                <canvas id="ngay" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="col-3">
            <div class="khung">
                <h5>Tổng doanh thu ngày: </h5>
                <h2><span id="tong_tien_ngay"></span> đ</h2>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-9 khung">
            <div style="width: 100%;">
                <div class="d-flex justify-content-between">
                    <h3>Doanh thu tháng của năm: </h3>
                    <select id="input_nam" class="form-select" aria-label="Default select example" style="width: 100px;">
                        <?php foreach ($all_nam as $value) : ?>
                            <option value="<?= $value['nam'] ?>"><?= $value['nam'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <canvas id="thang" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="col-3 ">
            <div class="khung">
                <h5>Tổng doanh thu năm: </h5>
                <h2><span id="tong_tien_nam"></span> đ</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9 khung">
            <h3>Doanh thu và số lượng sản phẩm bán chạy </h3>
            <canvas id="sp_dt" width="400" height="200"></canvas>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-6">
                <div class="khung">
                    <h3>Top doanh thu theo sản phẩm </h3>
                    <table class="table bang table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Doanh thu</th>
                                <th scope="col"></th>


                                <!-- <th scope="col"></th>
                            <th scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($top_10_sp_doanh_thu as $value) :  ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $value['id_sanpham'] ?></td>
                                    <td><?= $value['ten_sanpham'] ?></td>
                                    <td><?= number_format($value['doanh_thu'], 0, ',', '.')  ?>đ</td>
                                    <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $value['id_sanpham'] ?>">Xem sản phẩm</a></td>
                                    <!-- <td><a href="index.php?act=ds_kichthuoc&id_kichthuoc_xoa=<?= $id_kichthuoc ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                                <td><a href="index.php?act=ds_kichthuoc&id_kt_edit=<?= $id_kichthuoc ?>">Sửa</a></td> -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="khung">
                    <h3>Top số lượng bán theo sản phẩm </h3>
                    <table class="table bang table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng bán</th>
                                <th scope="col"></th>


                                <!-- <th scope="col"></th>
                            <th scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($top_10_sp_so_luong as $value) :  ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $value['id_sanpham'] ?></td>
                                    <td><?= $value['ten_sanpham'] ?></td>
                                    <td><?= $value['so_luong_ban'] ?></td>

                                    <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $value['id_sanpham'] ?>">Xem sản phẩm</a></td>
                                    <!-- <td><a href="index.php?act=ds_kichthuoc&id_kichthuoc_xoa=<?= $id_kichthuoc ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                                <td><a href="index.php?act=ds_kichthuoc&id_kt_edit=<?= $id_kichthuoc ?>">Sửa</a></td> -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var myChart;
    var myChart_2;


    document.getElementById('datepicker').addEventListener('input', function() {
        loadData();
    });
    document.getElementById('input_nam').addEventListener('change', function() {
        loadData_nam();
    });



    function loadData_nam() {
        // Lấy giá trị ngày từ trường input date
        var selectedDate = document.getElementById('input_nam').value;

        // Kiểm tra xem ngày có hợp lệ không (ở đây là một kiểm tra đơn giản)
        if (!selectedDate) {
            alert("Vui lòng chọn một năm.");
            return;
        }

        // Gửi yêu cầu đến máy chủ để lấy tổng doanh thu theo giờ trong ngày đã chọn
        fetch('../model/thong_ke_nam.php?selectedDate=' + selectedDate)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                var thang = data.thang;
                var doanhThu = data.tong_tien;

                // Xóa biểu đồ hiện tại (nếu có)
                var bd_thang = document.getElementById('thang').getContext('2d');
                if (myChart_2) {
                    myChart_2.destroy();
                }

                document.getElementById('tong_tien_nam').innerText = '0';
                var tong_tien_nam = data.tong_tien_nam[0]['tong_tien'];
                if (tong_tien_nam !== null) {

                    document.getElementById('tong_tien_nam').innerText = parseFloat(tong_tien_nam).toLocaleString();
                } else {
                    document.getElementById('tong_tien_nam').innerText = 0;

                }




                var backgroundColors = [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ];

                myChart_2 = new Chart(bd_thang, {
                    type: 'bar',
                    data: {
                        labels: thang,
                        datasets: [{
                            label: 'Doanh thu',
                            data: doanhThu,
                            backgroundColor: backgroundColors, // Mỗi cột có màu sắc khác nhau
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                myChart_2.options.barThickness = 80;
                myChart_2.update();




            })
            .catch(function(error) {
                console.error('Lỗi: ' + error);
            });
    }














    function loadData() {
        // Lấy giá trị ngày từ trường input date
        var selectedDate = document.getElementById('datepicker').value;

        // Kiểm tra xem ngày có hợp lệ không (ở đây là một kiểm tra đơn giản)
        if (!selectedDate) {
            alert("Vui lòng chọn một ngày.");
            return;
        }

        // Gửi yêu cầu đến máy chủ để lấy tổng doanh thu theo giờ trong ngày đã chọn
        fetch('../model/thong_ke_ngay.php?selectedDate=' + selectedDate)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                var gio = data.gio;
                var doanhThu = data.tong_tien;

                // Xóa biểu đồ hiện tại (nếu có)
                var ngay = document.getElementById('ngay').getContext('2d');
                if (myChart) {
                    myChart.destroy();
                }

                // document.getElementById('tong_tien_ngay').innerText='0';
                var tong_tien_ngay = data.tong_tien_ngay[0]['tong_tien'];
                if (tong_tien_ngay !== null) {

                    document.getElementById('tong_tien_ngay').innerText = parseFloat(tong_tien_ngay).toLocaleString();
                } else {
                    document.getElementById('tong_tien_ngay').innerText = 0;

                }

                var backgroundColors = [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ];

                myChart = new Chart(ngay, {
                    type: 'bar',
                    data: {
                        labels: gio,
                        datasets: [{
                            label: 'Doanh thu',
                            data: doanhThu,
                            backgroundColor: backgroundColors,
                            fill: true, // Điền màu trong dưới đường
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }

                });
                myChart.options.barThickness = 80;
                myChart.update(); // Điều chỉnh độ dày của cột (ngắn hơn)


            })
            .catch(function(error) {
                console.error('Lỗi: ' + error);
            });
    }

    // myChart.update(); // Cập nhật biểu đồ để áp dụng thay đổi






    var currentDate = new Date();
    var options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit'
    };
    var formattedDate = currentDate.toLocaleDateString('en-US', options);
    var parts = formattedDate.split('/');
    var yyyyMMdd = parts[2] + '-' + parts[0] + '-' + parts[1];

    document.getElementById('datepicker').value = yyyyMMdd;



    document.addEventListener('DOMContentLoaded', () => {
        loadData();
        loadData_nam();
    })




    // Lấy dữ liệu tên đơn hàng và doanh thu từ server (hoặc sử dụng dữ liệu mẫu)
    // Dữ liệu mẫu
    var data = {
        labels: [<?php foreach ($top_10_sp_sl_dt as $value) : ?> "<?= $value['ten_sanpham'] ?>", <?php endforeach ?>],
        datasets: [{
            label: 'Số lượng bán',
            data: [<?php foreach ($top_10_sp_sl_dt as $value) : ?> <?= $value['so_luong_ban'] ?>, <?php endforeach ?>],
            yAxisID: 'quantity',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Doanh thu',
            data: [<?php foreach ($top_10_sp_sl_dt as $value) : ?> <?= $value['doanh_thu'] ?>, <?php endforeach ?>],
            yAxisID: 'revenue',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    var sp_dt = document.getElementById('sp_dt').getContext('2d');

    // Tạo biểu đồ cột với hai trục Y
    var myChart_3 = new Chart(sp_dt, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                quantity: {
                    position: 'left',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Số lượng bán'
                    }
                },
                revenue: {
                    position: 'right',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu'
                    }
                }
            }
        }
    });
    //   myChart_3.options.barThickness = 80;
    //                 myChart.update(); 
</script>