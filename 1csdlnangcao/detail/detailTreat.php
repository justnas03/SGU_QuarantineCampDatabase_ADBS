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
    $sql = "SELECT dt.Ma_DT, dt.MaBN, dt.Ma_Doctors, dt.MaThuoc, dt.ketqua, dt.startdate, dt.enddate FROM dieutri dt WHERE dt.Ma_DT = $id";
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
            <h2>Chi tiết điều trị</h2>
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
                        <p class="sub-info-avatar">Ngày bắt đầu điều trị</p>
                        <p><strong><?php echo $row['startdate'] ?></strong></p>
                        <p class="sub-info-avatar">Ngày kết thúc điều trị</p>
                        <p><strong><?php echo $row['enddate'] ?></strong></p>
                    </div>
                </div>
            </div>
            <div class="data-form-employee">
                <h2>Thông tin điều trị</h2>
                <div class="flex-info">
                    <div class="flex-info-left">
                    <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã điều trị</p>
                    <p><strong><?php echo $row['Ma_DT'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã bệnh nhân</p>
                    <p><strong><?php echo $row['MaBN'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã bác sĩ</p>
                    <p><strong><?php echo $row['Ma_Doctors'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Mã thuốc</p>
                    <p><strong><?php echo $row['MaThuoc'] ?></strong></p>
                </div>
                <div class="col-info sub-data">
                    <p class="sub-info-avatar ">Kết quả</p>
                    <p><strong><?php echo $row['ketqua'] ?></strong></p>
                </div>
                    </div>
                   
        <?php
            }}
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