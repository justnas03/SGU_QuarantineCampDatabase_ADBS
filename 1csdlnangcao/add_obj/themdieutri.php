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
    ?>

    <div class="container">
        <h2>Thông tin Điều trị</h2>
        <form method="post">
            <div class="form-group">
                <label for="patientSelection">Mã bệnh nhân</label>
                <select name="patientSelection" id="patientSelection">
                    <?php
                        $sqlGetPatient = "SELECT bn.MaBN, bn.HoTen FROM benhnhan bn";
                        $resultGetPatient = $db->execute($sqlGetPatient);
                        while ($row = $resultGetPatient->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['MaBN'] ?>"><?php echo $row['MaBN'] ?> - <?php echo $row['HoTen'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="doctorsSelection">Mã bác sĩ</label>
                <select name="doctorsSelection" id="doctorsSelection">
                    <?php
                        $sqlGetDoctors = "SELECT d.Ma_Doctors, nv.HoTen FROM nhanvien nv, doctors d WHERE nv.MaNV = d.Ma_Doctors";
                        $resultGetDoctors = $db->execute($sqlGetDoctors);
                        while ($row = $resultGetDoctors->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Ma_Doctors'] ?>"><?php echo $row['Ma_Doctors'] ?> - <?php echo $row['HoTen'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="thuocSelection">Mã thuốc</label>
                <select name="thuocSelection" id="thuocSelection">
                    <?php
                        $sqlGetThuoc = "SELECT t.MaThuoc, t.TenThuoc FROM thuoc t";
                        $resultGetThuoc = $db->execute($sqlGetThuoc);
                        while ($row = $resultGetThuoc->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['MaThuoc'] ?>"><?php echo $row['MaThuoc'] ?> - <?php echo $row['TenThuoc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ketqua">Kết quả</label>
                <input type="text" id="ketqua" name="ketqua" required>
            </div>
            
            <div class="form-group">
                <label for="ngaybatdau">Ngày bắt đầu điều trị</label>
                <input type="datetime-local" id="date-start" name="ngaybatdau" required>
            </div>
            <div class="form-group">
                <label for="ngayketthuc">Ngày kết thúc điều trị</label>
                <input type="datetime-local" id="date-start" name="ngayketthuc">
            </div>
            
           
           
           
            <input type="submit" name="submit" value="Lưu Thông Tin">
        </form>
    </div>
    </div>
    <?php
        if (isset($_POST["submit"])){
            $result = $db->execute("SELECT Ma_DT FROM dieutri");
            if ($result){
                $num_rows = mysqli_num_rows($result) + 1;
            }
            $pat_mabenhnhan = $_POST["patientSelection"];
            $pat_mabacsi = $_POST["doctorsSelection"];
            $pat_mathuoc = $_POST["thuocSelection"];
            $pat_ketqua = $_POST["ketqua"];
            $pat_startDay = $_POST["ngaybatdau"];
            $pat_endDay = $_POST["ngayketthuc"];
            $sqlPeople = "INSERT INTO dieutri (Ma_DT, MaBN, Ma_Doctors, MaThuoc, ketqua, startdate, enddate) VALUES
            ('$num_rows', '$pat_mabenhnhan', '$pat_mabacsi', '$pat_mathuoc', '$pat_ketqua', '$pat_startDay',
            '$pat_endDay');
            ";
             $resultInsertEmployee = $db->execute($sqlPeople);
             if ($resultInsertEmployee) {
                 echo '<script>window.location.href = "../dieutri.php";</script>';
             }else{
                 echo '<script>window.location.href = "../dieutri.php";</script>';
             }
        }

    
    ?>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <script src="../js/main-homepage.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>