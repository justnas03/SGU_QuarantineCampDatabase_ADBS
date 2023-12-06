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
    <?php include("../include/headerAnotherFile.php"); ?>

    <div class="container">
        <h2>Thông tin Nhân Viên</h2>
        <form method="post">
            <div class="form-group">
                <label for="ten">Họ và Tên</label>
                <input type="text" id="ten" name="ten" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" id="diachi" name="diachi" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="roleEmployee">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="chucvu">Chức vụ</label>
                <select name="role-employee" id="roleEmployee">
                    <option value="Bác Sĩ">Bác Sĩ</option>
                    <option value="Y Tá">Y Tá</option>
                    <option value="Tình nguyện viên">Tình nguyện viên</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="ngaybatdau">Ngày bắt đầu làm việc</label>
                <input type="datetime-local" id="date-start" name="ngaybatdau" required>
            </div>
            <input type="submit" name="submit" value="Lưu Thông Tin">
        </form>
    </div>
    </div>
    <?php
        if (isset($_POST["submit"])){
            $result = $db->execute("SELECT MaNV FROM nhanvien");
            if ($result){
                $num_rows = mysqli_num_rows($result) + 1;
            }
            $pat_lname = $_POST["ten"];
            $pat_role = $_POST["role-employee"];
            $pat_address = $_POST["diachi"];
            $pat_startDay = $_POST["ngaybatdau"];
            $pat_gender = $_POST["gender"];
            $pat_phone = $_POST["phone"];
            $sqlPeople = "INSERT INTO nhanvien (MaNV, Ngaybatdaulamviec, HoTen, DiaChi, Gioitinh, SDT, ChucVu) VALUES
            ('$num_rows', '$pat_startDay', '$pat_lname', '$pat_address', '$pat_gender', '$pat_phone', '$pat_role');
            ";
            $resultInsertEmployee = $db->execute($sqlPeople);
            if ($pat_role == "Bác Sĩ"){
                $sqlDoctor = "INSERT INTO doctors (Ma_Doctors) VALUES ('$num_rows')";
                $resultSqlDoctor = $db->execute($sqlDoctor);
            }
            else if ($pat_role == "Y Tá"){
                $sqlNurse = "INSERT INTO nurse (Ma_Nurse) VALUES ('$num_rows')";
                $resultSqlNurse = $db->execute($sqlNurse);
            }
            else if ($pat_role == "Tình nguyện viên"){
                $sqlVolunteer = "INSERT INTO volunteers (Ma_Volunteers) VALUES ('$num_rows')";
                $resultSqlVolunteer = $db->execute($sqlVolunteer);
            }
            else if ($pat_role == "Staff"){
                $sqlStaff = "INSERT INTO staff (Ma_Staff) VALUES ('$num_rows')";
                $resultSqlStaff = $db->execute($sqlStaff);
            }
            echo '<script>window.location.href = "../nhanvien.php";</script>';
        }
    
    ?>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="../js/main-homepage.js"></script>
    <script src="../js/sidebar.js"></script>
</body>

</html>