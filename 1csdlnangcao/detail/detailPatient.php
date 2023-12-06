<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style-homepage.css">
    <link rel="stylesheet" href="../css/style-detail.css">
    <link rel="stylesheet" href="./css/style-detail.css">
    <title>Document</title>
    <style>
        body {font-family: DejaVu Sans, sans-serif;}
    </style>
</head>

<body>
    <?php
    session_start();
    include("../include/headerAnotherFile.php");
    include("../mvc/Models/DBConfig.php");
    $db = new Database;
    $db->connect();
    $id = $_GET["id"];
    $sql = "SELECT bn.MaBN, bn.HoTen, bn.SoCMND, bn.SDT, bn.DiaChi, bn.Gioitinh, bn.chuyendentu, bn.thongtinxnbandau, bn.Ma_Staff, 
    bn.Ngay_nhap_vien, bn.Ngay_xuat_vien, bn.Ma_Nurse FROM benhnhan bn WHERE bn.MaBN = $id";
    $result = $db->execute($sql);
    
    ?>
    <div class="home_content">
        <div class="search-area">
            <i class='bx bx-refresh' style='display: block;font-size: 50px;text-align:right' onclick="refreshPages()"></i>
            <script>
                function refreshPages() {
                    location.reload();
                }
            </script>
        </div>
        
        <div class="title-form-employee">
            <h2>Chi tiết bệnh nhân</h2>
        </div>
        <div class="add-new-obj">
            <form action="../updateDetail/updatePatient.php?id=<?= $id ?>" method="post" style="border:none;">
                <input type="submit" value="Chỉnh sửa bệnh nhân">
            </form>
        </div>
        <?php
        if ($result) {
            while ($row = $db->getData()) {
                $sqlGetDateTest = "SELECT ThoigianXN FROM XetNghiem WHERE MaBN = $id ORDER BY ThoigianXN DESC LIMIT 1";
                $ngayXuatVienDuKienResult = $db->execute($sqlGetDateTest);
                
                if ($ngayXuatVienDuKienResult) {
                    $ngayXuatVienDuKienRow = $db->getData($ngayXuatVienDuKienResult);
        
                    // Check if the 'ThoigianXN' column exists in the result set
                    if (isset($ngayXuatVienDuKienRow['ThoigianXN'])) {
                        $ngayXuatVienDuKienInsert = $ngayXuatVienDuKienRow['ThoigianXN'];
                        $ngayXuatVienDuKien = date('d-m-Y', strtotime($ngayXuatVienDuKienRow['ThoigianXN']));
                    } else {
                        // Handle the case where the 'ThoigianXN' column is not present
                        $ngayXuatVienDuKien = "Chưa có dữ liệu";
                    }
                } else {
                    // Handle the case where the query doesn't return a result
                    $ngayXuatVienDuKien = "Chưa có dữ liệu";
                }
        ?>
        
        <div class="flex-form-employee">
            <div class="image-employee">
                <div class="area-avatar">
                    <img src="https://th.bing.com/th/id/OIP.7Zf_YAZDsTjp98Lj0lt1WgHaHa?w=512&h=512&rs=1&pid=ImgDetMain"
                        alt="">
                </div>
                <form action="" method="post" style="border:none; height: 300px; display: block;">
                    <div class="area-info" style="height: 150px;">
                        <div class="col-info">
                            <p class="sub-info-avatar">Ngày nhập viện</p>
                            <p><strong><?php echo date('d-m-Y', strtotime($row['Ngay_nhap_vien'])); ?></strong></p>
                            <p class="sub-info-avatar">Ngày xuất viện dự kiến</p>
                            <p><strong><?php echo $ngayXuatVienDuKien ?></strong></p>
                            <p class="sub-info-avatar">Ngày xuất viện</p>
                            <p><strong>
                                <?php 
                                    if ($row['Ngay_xuat_vien'] == '0000-00-00 00:00:00') {
                                        echo "Không có dữ liệu";
                                    }else{
                                        echo date('d-m-Y', strtotime($row['Ngay_xuat_vien']));
                                    }
                                ?>
                            </strong></p>
                        </div>
                    </div>
                    <?php
                        if ($ngayXuatVienDuKien == "Chưa có dữ liệu") {
                        
                        }else{
                    ?>
                            <input type="submit" name="updateDatePatient" Value="Thiết lập ngày xuất viện"></input>
                    <?php
                        }
                    ?>
                </form>
            </div>
        
            <div class="data-form-employee">
                <h2>Thông tin cá nhân</h2>
                <div class="flex-info">
                    <div class="flex-info-left">
                    <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã số Bệnh nhân</p>
                    <p><strong><?php echo $row['MaBN'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Họ và Tên</p>
                    <p><strong><?php echo $row['HoTen'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Số CMND</p>
                    <p><strong><?php echo $row['SoCMND'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Số điện thoại</p>
                    <p><strong><?php echo $row['SDT'] ?></strong></p>
                </div>
                    </div>
                    <div class="flex-info-right">
                    <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Địa chỉ</p>
                    <p><strong><?php echo $row['DiaChi'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Giới tính</p>
                    <p><strong><?php echo $row['Gioitinh'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Chuyển đến từ</p>
                    <p><strong><?php echo $row['chuyendentu'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Thông tin xét nghiệm ban đầu</p>
                    <p><strong><?php echo $row['thongtinxnbandau'] ?></strong></p>
                </div>
                    </div>
                </div>
        <?php
            }}
        ?>

        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Triệu chứng thường</th>
                </tr>
                <?php
                    $sqlTrieuchungthuong = "SELECT * FROM trieuchungthuong WHERE MaBN = $id";
                    $resultTrieuchungthuong = $db->execute($sqlTrieuchungthuong); 
                    if($resultTrieuchungthuong){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['ten_trieu_chung_thuong'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>

        <div class="table-BN">
            <!-- <span>Triệu chứng nghiêm trọng</span> -->
            <table>
                <tr class="tr-title">
                    <th>Triệu chứng nghiêm trọng</th>
                </tr>
                <?php
                    $sqlTrieuchungnghiemtrong = "SELECT * FROM trieuchungnghiemtrong WHERE MaBN = $id";
                    $resultTrieuchungnghiemtrong = $db->execute($sqlTrieuchungnghiemtrong); 
                    if($resultTrieuchungnghiemtrong){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['ten_trieu_chung_nghiem_trong'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>

        <div class="table-BN">
            <!-- <span>Bệnh lý đi kèm</span> -->
            <table>
                <tr class="tr-title">
                    <th>Bệnh lý đi kèm</th>
                </tr>
                <?php
                    $sqlBenhlydikem = "SELECT * FROM benhlydikem WHERE MaBN = $id";
                    $resultBenhlydikem = $db->execute($sqlBenhlydikem); 
                    if($resultBenhlydikem){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['benhlydikem'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>

        <div class="table-BN">
        <span style="font-size: 20px; font-weight:700; font-family:'Poppins', sans-serif;">Thông tin xét nghiệm của bệnh nhân</span>
            <table>
                <tr class="tr-title">
                    <th>Mã xét nghiệm</th>
                    <th>Ngày bắt đầu xét nghiệm</th>
                    <th>SPO2</th>
                    <th>Respiratory Rate</th>
                    <th>PCR Test</th>
                    <th>Quick Test</th>
                    <th>CT Value</th>
                    <th>Warning Mark</th>
                </tr>
                <?php
                    $sqlXetNghiem = "SELECT * FROM xetnghiem WHERE MaBN = $id";
                    $resultXetNghiem = $db->execute($sqlXetNghiem); 
                    if($resultXetNghiem){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['MaXN'] ?></td>
                    <td><?php echo $row['ThoigianXN'] ?></td>
                    <td><?php echo $row['SPO2'] ?></td>
                    <td><?php echo $row['Respiratiory_Rate'] ?></td>
                    <td><?php echo $row['PCR_result'] ?></td>
                    <td><?php echo $row['QT_result'] ?></td>
                    <td><?php echo $row['ct'] ?></td>
                    <td>
                        <?php if ($row['Warning'] == 1){
                            echo '<span style="color: red;">Nguy cấp</span>';
                        }else{
                            echo '<span style="color: green;">Không nguy cấp</span>';
                        } 
                        ?>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>

        <div class="table-BN">
        <span style="font-size: 20px; font-weight:700; font-family:'Poppins', sans-serif;">Thông tin điều trị của bệnh nhân</span>
            <table>
                <tr class="tr-title">
                    <th>Mã điều trị</th>
                    <th>Mã bác sĩ</th>
                    <th>Mã thuốc</th>
                    <th>Kết quả</th>
                    <th>Ngày bắt đầu điều trị</th>
                    <th>Ngày kết thúc điều trị</th>
                </tr>
                <?php
                    $sqlXetNghiem = "SELECT * FROM dieutri WHERE MaBN = $id";
                    $resultXetNghiem = $db->execute($sqlXetNghiem); 
                    if($resultXetNghiem){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['Ma_DT'] ?></td>
                    <td><?php echo $row['Ma_Doctors'] ?></td>
                    <td><?php echo $row['MaThuoc'] ?></td>
                    <td><?php echo $row['ketqua'] ?></td>
                    <td><?php echo $row['startdate'] ?></td>
                    <td><?php echo $row['enddate'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
        
        <div class="table-BN">
        <span style="font-size: 20px; font-weight:700; font-family:'Poppins', sans-serif;">Thông tin chuyển phòng của bệnh nhân</span>
            <table>
                <tr class="tr-title">
                    <th>Mã phòng</th>
                    <th>Tầng</th>
                    <th>Loại phòng</th>
                    <th>Toà nhà</th>
                    <th>Tinh trạng</th>
                    <th>Thời gian</th>
                </tr>
                <?php
                    $sqlHistoryChangeRoom = "SELECT * FROM staff_phanvao_phong sc, phong p WHERE sc.MaPhong = p.MaPhong AND sc.MaBN = 1 ORDER BY sc.dateChange ASC";
                    $resultHistoryChangeRoom = $db->execute($sqlHistoryChangeRoom); 
                    if($resultHistoryChangeRoom){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table">
                    <td><?php echo $row['MaPhong'] ?></td>
                    <td><?php echo $row['tang'] ?></td>
                    <td><?php echo $row['loaiphong'] ?></td>
                    <td><?php echo $row['toanha'] ?></td>
                    <td><?php echo $row['Tinh_trang_hien_tai'] ?></td>
                    <td><?php echo $row['dateChange'] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>


        <form action="./exportPDF.php?id=<?= $id; ?>" method="post"style="border:none;">
            <input type="submit" value="Export to PDF" name="exportPDF" >
        </form>

        <?php
        if (isset($_POST['updateDatePatient'])) {
            $sqlUpdateDate = "UPDATE benhnhan SET Ngay_xuat_vien = '$ngayXuatVienDuKienInsert' WHERE MaBN = $id";
            $resultUpdateDate = $db->execute($sqlUpdateDate);
            $sqlGetIdRoom = "SELECT MaPhong FROM staff_phanvao_phong WHERE MaBN = '$id'";
            $resultGetIdRoom = $db->execute($sqlGetIdRoom);
            if ($resultGetIdRoom) {
                $row = $resultGetIdRoom->fetch_assoc();
                $maPhong = $row['MaPhong'];
                $sqlUpdateRangeRoom = "UPDATE phong SET succhua = succhua + 1 WHERE MaPhong = '$maPhong'";
                $resultUpdateRangeRoom = $db->execute($sqlUpdateRangeRoom);
                echo '<script>window.location.href = "../Benhnhan.php";</script>';
            } else {
                echo "Error retrieving room ID.";
            }
        }
        else{
            
        }
        ?>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="./js/main-homepage.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // When the admin name is clicked, toggle the Log Out link visibility
            $('#adminName').on('click', function () {
                $('#logOutLink').toggleClass('active');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/sidebar.js"></script>
    

</body>

</html>