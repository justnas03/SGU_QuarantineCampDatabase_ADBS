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
        <h2>Thông tin xét nghiệm</h2>
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
                <label for="thoigianbatdau">Thời gian bắt đầu xét nghiệm</label>
                <input type="datetime-local" id="thoigianbatdau" name="thoigianbatdau" required>
            </div>
            
            <div class="form-group">
                <label for="pcr">PCR Test</label>
                <input type="text" id="pcr" name="pcr" required>
            </div>
            <div class="form-group">
                <label for="spo2">SPO2</label>
                <input type="text" id="spo2" name="spo2">
            </div>
            <div class="form-group">
                <label for="res">Respiratiory Rate</label>
                <input type="text" id="res" name="res">
            </div>
            <div class="form-group">
                <label for="qtresult">Quick Test</label>
                <input type="text" id="qtresult" name="qtresult">
            </div>
            <div class="form-group">
                <label for="qtct">CT Value</label>
                <input type="text" id="qtct" name="qtct">
            </div>
            
            <input type="submit" name="submit" value="Lưu Thông Tin">
        </form>
    </div>
    </div>
    <?php
        if (isset($_POST["submit"])){
            $result = $db->execute("SELECT MaXN FROM xetnghiem");
            if ($result){
                $num_rows = mysqli_num_rows($result) + 1;
            }
            $pat_mabenhnhan = $_POST["patientSelection"];
            $pat_thoigianxn = $_POST["thoigianbatdau"];
            $pat_pcr = $_POST["pcr"];
            $pat_pcrct = $_POST["pcrct"];
            $pat_spo2 = $_POST["spo2"];
            $pat_res = $_POST["res"];
            $pat_qtresult = $_POST["qtresult"];
            $pat_qtct = $_POST["qtct"];
            if ($pat_spo2 < 9.6 AND $pat_res > 20){
                $pat_warning = 1;
            }
            else{
                $pat_warning = 0;
            }

            $sqlPeople = "INSERT INTO xetnghiem (MaXN, MaBN, ThoigianXN, PCR_result, SPO2, Respiratiory_Rate, QT_result, ct, Warning) VALUES
            ('$num_rows', '$pat_mabenhnhan', '$pat_thoigianxn', '$pat_pcr', '$pat_spo2', '$pat_res',
            '$pat_qtresult', '$pat_qtct', '$pat_warning');
            ";
            $resultInsertEmployee = $db->execute($sqlPeople);
            if ($resultInsertEmployee) {
                echo '<script>window.location.href = "../xetnghiem.php";</script>';
            }else{
                echo '<script>window.location.href = "../xetnghiem.php";</script>';
            }
        }

    
    ?>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <script src="../js/main-homepage.js"></script>
    <script src="../js/sidebar.js"></script>
</body>
</html>