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
</head>

<body>
    <?php
    include("../include/headerAnotherFile.php");
    include("../mvc/Models/DBConfig.php");
    $db = new Database;
    $db->connect();
    $id = $_GET["id"];
    $sql = "SELECT nv.MaNV, nv.HoTen, nv.Diachi, nv.Gioitinh, nv.SDT, nv.ChucVu, nv.Ngaybatdaulamviec FROM nhanvien nv WHERE nv.MaNV = $id";
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
            <h2>Chi tiết nhân viên</h2>
        </div>
        <?php
        if ($result) {
            while ($row = $db->getData()) {
        ?>
        <div class="flex-form-employee">
            <div class="image-employee">
                <div class="area-avatar">
                    <img src="https://th.bing.com/th/id/OIP.7Zf_YAZDsTjp98Lj0lt1WgHaHa?w=512&h=512&rs=1&pid=ImgDetMain"
                        alt="">
                </div>
                <div class="area-info">
                    <div class="col-info">
                        <p class="sub-info-avatar">Ngày bắt đầu làm việc</p>
                        <p><strong><?php echo $row['Ngaybatdaulamviec'] ?></strong></p>
                        <p class="sub-info-avatar">Chức vụ</p>
                        <p><strong><?php echo $row['ChucVu'] ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="data-form-employee">
                <h2>Thông tin cá nhân</h2>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã số nhân viên</p>
                    <p><strong><?php echo $row['MaNV'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Họ và Tên</p>
                    <p><strong><?php echo $row['HoTen'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Địa chỉ</p>
                    <p><strong><?php echo $row['Diachi'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Giới tính</p>
                    <p><strong><?php echo $row['Gioitinh'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Số điện thoại</p>
                    <p><strong><?php echo $row['SDT'] ?></strong></p>
                </div>    
        </div>
    </div>
        <?php
                }
            }
        ?>

<?php

    $SqlGetIdDoctor = "SELECT Ma_Doctors FROM doctors WHERE Ma_Doctors = $id";
    $resultGetIdDoctor = $db->execute($SqlGetIdDoctor);

    if (isset($_POST["setup_doctor"])) {
        // Fetch data from the result object
        $row = $resultGetIdDoctor->fetch_assoc();
        $maDoctors = $row['Ma_Doctors'];

        // Check if the record already exists in the Manager table
        $checkSql = "SELECT * FROM Manager WHERE Ma_Manager = '$id' AND Ma_Doctors = '$maDoctors'";
        $checkResult = $db->execute($checkSql);

        if ($db->getNumRows($checkResult) == 0) {
            // Record doesn't exist, insert into Manager table
            $sqlInsertManager = "INSERT INTO Manager (Ma_Manager, Ma_Doctors) VALUES ('$id', '$maDoctors')";
            $resultInsertManager = $db->execute($sqlInsertManager);
        } else {
            echo '<script>';
            echo 'alert("This doctor is already a department head.");';
            echo '</script>';
        }
    }

    if (isset($_POST["delete_doctor"])) {
        // Prepare and execute the SQL query to delete the record
        $sqlDeleteManager = "DELETE FROM Manager WHERE Ma_Manager = '$id'";
        $resultDeleteManager = $db->execute($sqlDeleteManager);

        // Check if the deletion was successful
        if ($resultDeleteManager) {
            echo '<script>';
            echo 'alert("Xóa thành công");';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Không thể xóa.");';
            echo '</script>';
        }
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
    <script src="../js/sidebar.js"></script>

</body>

</html>