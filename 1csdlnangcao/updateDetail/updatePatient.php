<!--Tạo nút thêm mới bệnh nhân, tạo form thêm bệnh nhân, tạo nút đăng xuất thông tin tài khoản admin
tạo nút thêm mới bệnh nhân
tạo form thêm bệnh nhân
tạo nút đăng xuất và thông tin tài khoản admin -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style-homepage.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Document</title>
</head>
<?php
include("../mvc/Models/DBConfig.php");
$db = new Database;
$db->connect();
?>
<body>
    <?php
        include("../include/headerAnotherFile.php");
        $id = $_GET["id"];
        $sql = "SELECT bn.MaBN, bn.HoTen, bn.SoCMND, bn.SDT, bn.DiaChi, bn.Gioitinh, bn.chuyendentu, bn.thongtinxnbandau, bn.Ma_Staff, 
        bn.Ngay_nhap_vien, bn.Ngay_xuat_vien, bn.Ma_Nurse FROM benhnhan bn WHERE bn.MaBN = $id";
        $result = $db->execute($sql);
        
    ?>

    <div class="container">
        <h2>Thông tin Bệnh Nhân</h2>
        <?php
            if ($result){
                while ($row = $db->getData()) {
        ?>
        <form method="post">
            <div class="form-group">
                <label for="ten">Họ và Tên</label>
                <input type="text" id="ten" name="ten" value = "<?php echo $row['HoTen'] ?>">
            </div>
            <div class="form-group">
                <label for="socmnd">Số CMND</label>
                <input type="text" id="socmnd" name="socmnd" value = "<?php echo $row['SoCMND'] ?>">
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="text" id="sdt" name="sdt" value = "<?php echo $row['SDT'] ?>">
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" id="diachi" name="diachi" value = "<?php echo $row['DiaChi'] ?>">
            </div>
            <div class="form-group">
                <label for="gender">Giới Tính:</label>
                <select id="gender" name="gender">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="chuyendentu">Chuyển đến từ</label>
                <input type="text" id="chuyendentu" name="chuyendentu" value = "<?php echo $row['chuyendentu'] ?>">
            </div>
            <div class="form-group">
        <?php
                        $sqlGetTrieuchungthuong = "SELECT ten_trieu_chung_thuong FROM trieuchungthuong WHERE MaBN = $id";
                        $resultGetTrieuchungthuong = $db->execute($sqlGetTrieuchungthuong);

                        // Kiểm tra xem truy vấn có thành công không
                        if ($resultGetTrieuchungthuong) {
                            // Lấy dữ liệu từ kết quả truy vấn
                            $row = $resultGetTrieuchungthuong->fetch_assoc();
                            $getTrieuchungthuong = $row['ten_trieu_chung_thuong'];

                            echo '<label for="trieuchungthuong">Triệu chứng thường</label>';
                            echo '<input type="text" id="trieuchungthuong" name="trieuchungthuong" value="' . $getTrieuchungthuong . '">';
                        } else {
                            // Xử lý trường hợp truy vấn không thành công
                            echo "Lỗi khi thực hiện truy vấn.";
                        }

                        ?>
                    </div>
            
                    <div class="form-group">
                        <?php
                        $sqlGetTrieuchungnghiemtrong = "SELECT ten_trieu_chung_nghiem_trong FROM trieuchungnghiemtrong WHERE MaBN = $id";
                        $resultGetTrieuchungnghiemtrong = $db->execute($sqlGetTrieuchungnghiemtrong);

                        // Kiểm tra xem truy vấn có thành công không
                        if ($resultGetTrieuchungnghiemtrong) {
                            // Lấy dữ liệu từ kết quả truy vấn
                            $row = $resultGetTrieuchungnghiemtrong->fetch_assoc();
                            if ($row && isset($row['ten_trieu_chung_nghiem_trong'])) {
                                $getTrieuchungnghiemtrong = $row['ten_trieu_chung_nghiem_trong'];
                                echo '<label for="trieuchungnghiemtrong">Triệu chứng nghiêm trọng</label>';
                                echo '<input type="text" id="trieuchungnghiemtrong" name="trieuchungnghiemtrong" value="' . $getTrieuchungnghiemtrong . '">';
                            } else {
                                // Handle the case where the key doesn't exist or the value is null
                                $getTrieuchungnghiemtrong = "";
                                echo '<label for="trieuchungnghiemtrong">Triệu chứng nghiêm trọng</label>';
                                echo '<input type="text" id="trieuchungnghiemtrong" name="trieuchungnghiemtrong" value="' . $getTrieuchungnghiemtrong . '">';
                            }                            
                            
                        } else {
                            // Xử lý trường hợp truy vấn không thành công
                            echo "Lỗi khi thực hiện truy vấn.";
                        }

                        ?>
                    </div>
                    <div class="form-group">
                        <label for="staffSelection">Mã Staff</label>
                        <select name="staffSelection" id="staffSelection">
                    <?php
                        $sqlGetStaff = "SELECT s.Ma_Staff, nv.HoTen FROM nhanvien nv, staff s WHERE nv.MaNV = s.Ma_Staff";
                        $resultGetStaff = $db->execute($sqlGetStaff);
                        while ($row = $resultGetStaff->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Ma_Staff'] ?>"><?php echo $row['Ma_Staff'] ?> - <?php echo $row['HoTen'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ngayketthuc">Ngày xuất viện</label>
                <input type="datetime-local" id="date-start" name="ngayketthuc" value = "<?php echo $row['Ngay_xuat_vien'] ?>">
            </div>
            <div class="form-group">
                <label for="nurseSelection">Mã Nurse</label>
                <select name="nurseSelection" id="nurseSelection">
                    <?php
                        $sqlGetNurse = "SELECT n.Ma_Nurse, nv.HoTen FROM nhanvien nv, nurse n WHERE nv.MaNV = n.Ma_Nurse";
                        $resultGetNurse = $db->execute($sqlGetNurse);
                        while ($row = $resultGetNurse->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Ma_Nurse'] ?>"><?php echo $row['Ma_Nurse'] ?> - <?php echo $row['HoTen'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
    <label for="phanvaophong">Phòng</label>
    <select name="phanvaophong" id="phanvaophong">
        <?php
        $sqlGetRoom = "SELECT * FROM phong";
        $resultGetRoom = $db->execute($sqlGetRoom);

        // Lấy phòng hiện tại của bệnh nhân
        $sqlGetIdRoomBefore = "SELECT MaPhong FROM staff_phanvao_phong WHERE MaBN = $id ORDER BY dateChange DESC LIMIT 1";
        $resultGetIdRoomBefore = $db->execute($sqlGetIdRoomBefore);
        $idRoomBefore = ($resultGetIdRoomBefore->num_rows > 0) ? $resultGetIdRoomBefore->fetch_assoc()['MaPhong'] : null;

        while ($row = $resultGetRoom->fetch_assoc()) {
            // $totalRoomCurrent = 25 - $row['succhua'];
            $idRoomCurrent = $row['MaPhong'];

            // Kiểm tra xem có phải là phòng hiện tại của bệnh nhân không
            $isSelected = ($idRoomBefore == $idRoomCurrent) ? 'selected' : '';
            if ($row['loaiphong'] == "PT") {
                $totalRoomCurrent = 10 - $row['succhua'];
            } elseif ($row['loaiphong'] == "CC") {
                $totalRoomCurrent = 7 - $row['succhua'];
            } elseif ($row['loaiphong'] == "HS") {
                $totalRoomCurrent = 5 - $row['succhua'];
            }
            ?>
        ?>
        
        <option value="<?php echo $idRoomCurrent ?>" <?php echo ($row['succhua'] == 0) ? 'disabled' : ''; echo $isSelected; ?>>
            Loại phòng: <?php echo $row['loaiphong'] ?> - Tầng <?php echo $row['toanha'] ?> - Sức chứa: <?php echo $totalRoomCurrent; ?>/<?php if ($row['loaiphong'] == "PT") {
                echo 10;
            } elseif ($row['loaiphong'] == "CC") {
                echo 7;
            } elseif ($row['loaiphong'] == "HS") {
                echo 5;
            } ?>
        </option>
        <?php
        }
        ?>
    </select>
    <div class="form-group">
        <?php
            $sqlGetTinhTrangBefore = "SELECT Tinh_trang_hien_tai FROM staff_phanvao_phong WHERE MaBN = $id ORDER BY dateChange DESC LIMIT 1";
            $resultGetTinhTrangBefore = $db->execute($sqlGetTinhTrangBefore);
            
            // Kiểm tra xem truy vấn có thành công không
            if ($resultGetTinhTrangBefore) {
                // Lấy dữ liệu từ kết quả truy vấn
                $row = $resultGetTinhTrangBefore->fetch_assoc();
                $tinhTrangBefore = $row['Tinh_trang_hien_tai'];
            
                echo '<label for="tinhtranghientai">Tình trạng hiện tại</label>';
                echo '<input type="text" id="tinhtranghientai" name="tinhtranghientai" value="' . $tinhTrangBefore . '">';
            } else {
                // Xử lý trường hợp truy vấn không thành công
                echo "Lỗi khi thực hiện truy vấn.";
            }
            
        ?>
    </div>
</div>
            <?php
            }}
            ?>
            <!-- BỆNH LÝ ĐI KÈM, TRIỆU CHỨNG THƯỜNG, TRIỆU CHỨNG NGHIÊM TRONG (CAN NULL), PHÂN VÀO PHONG (DỰA VÀO TÌNH TRẠNG) -->
            <input type="submit" name="submit" value="Lưu Thông Tin">
        </form>
    </div>
    </div>
    <?php
        if (isset($_POST["submit"])){
            $pat_lname = $_POST["ten"];
            $pat_socmnd = $_POST["socmnd"];
            $pat_phone = $_POST["sdt"];
            $pat_address = $_POST["diachi"];
            $pat_gender = $_POST["gender"];
            $pat_chuyendentu = $_POST["chuyendentu"];
            $pat_mastaff = $_POST["staffSelection"];
            $pat_endDay = $_POST["ngayketthuc"];
            $pat_manurse = $_POST["nurseSelection"];
            $pat_phanvaophong = $_POST["phanvaophong"];
            $pat_trieuchungthuong = $_POST['trieuchungthuong'];
            $pat_trieuchungnghiemtrong = $_POST['trieuchungnghiemtrong'];
            if ($pat_endDay == NULL){
                $pat_endDay = '0000-00-00 00:00:00';
            }
            $sqlPeople = "UPDATE benhnhan SET HoTen = '$pat_lname', SoCMND = '$pat_socmnd', SDT = '$pat_phone',DiaChi = '$pat_address', Gioitinh = '$pat_gender', chuyendentu = '$pat_chuyendentu', Ma_Staff = '$pat_mastaff', Ngay_xuat_vien = '$pat_endDay', Ma_Nurse = '$pat_manurse' WHERE MaBN = $id;
            ";
            $resultUpdateEmployee = $db->execute($sqlPeople);
            $sqlTrieuchungthuong = "UPDATE trieuchungthuong SET ten_trieu_chung_thuong = '$pat_trieuchungthuong' WHERE MaBN = $id";
            $resultTrieuchungthuong = $db->execute($sqlTrieuchungthuong);
            $sqlTrieuchungnghiemtrong = "UPDATE trieuchungnghiemtrong SET ten_trieu_chung_nghiem_trong = '$pat_trieuchungnghiemtrong' WHERE MaBN = $id";
            $resultTrieuchungnghiemtrong = $db->execute($sqlTrieuchungnghiemtrong);
            if ($idRoomBefore != $pat_phanvaophong){
                $sqlNewRoomPatient = "INSERT INTO staff_phanvao_phong (MaPhong, Ma_Staff, MaBN, Tinh_trang_hien_tai, vitri_BN, dateChange) VALUES ('$pat_phanvaophong', '$pat_mastaff', '$id','$pat_tinhtranghientai','$pat_phanvaophong',NOW())";
                $sqlUpdateRoomAfterChange = "UPDATE phong SET succhua = succhua + 1 WHERE MaPhong = $idRoomBefore";
                $sqlUpdateRoomAfterChangeNewRoom = "UPDATE phong SET succhua = succhua - 1 WHERE MaPhong = $pat_phanvaophong";
                $resultNewRoomPatient = $db->execute($sqlNewRoomPatient);
                $resultUpdateRoomAfterChangeNewRoom = $db->execute($sqlUpdateRoomAfterChangeNewRoom);
                $resultUpdateRoomAfterChange = $db->execute($sqlUpdateRoomAfterChange);
                // var_dump($resultUpdateRoomAfterChange);
            }
            else{
                $sqlUpdateRoomPatient = "UPDATE staff_phanvao_phong SET Tinh_trang_hien_tai = '$pat_tinhtranghientai' WHERE MaBN = '$id' AND MaPhong = '$idRoomBefore' ORDER BY dateChange DESC LIMIT 1";
                $resultUpdateRoomPatient = $db->execute($sqlUpdateRoomPatient);
            }
            
            if ($resultUpdateEmployee) {
                echo '<script>window.location.href = "../Benhnhan.php";</script>';
            }else{
                echo '<script>window.location.href = "../Benhnhan.php";</script>';
            }
        }

    
    ?>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <script src="../js/main-homepage.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>