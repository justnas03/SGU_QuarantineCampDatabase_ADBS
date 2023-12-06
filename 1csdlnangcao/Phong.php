<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style-homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <title>CV19 Camp - Phòng</title>
</head>

<body>
    <?php
    include("./include/header.php");
    include("./mvc/Models/DBConfig.php");
    $db = new Database;
    $db->connect();
    $sql = "SELECT * FROM phong";
    $result = $db->execute($sql);
    ?>
    <div class="home_content">
        <div class="header-title">
            <h1>Quản lý Phòng bệnh</h1>
            <i class='bx bx-refresh' onclick="refreshPages()"></i>
            <script>
                function refreshPages() {
                    location.reload();
                }
            </script>
        </div>
        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Mã Phòng</th>
                    <th>Tầng</th>
                    <th>Tòa nhà</th>
                    <th>Sức chứa</th>
                    <th>Loại phòng</th>
                </tr>
                <?php
                if ($result){
                        while ($row = $db->getData()) { 
                ?>
                <tr class="data-table">
                    <td><?php echo $row['MaPhong'] ?></td>
                    <td><?php echo $row['tang'] ?></td>
                    <td><?php echo $row['toanha'] ?></td>
                    <td><?php echo $row['succhua'] ?> người</td>
                    <td>
                        <?php 
                        if($row['loaiphong'] == "HS"){
                            echo ("Hồi sức");
                        } else if ($row['loaiphong'] == "CC"){
                            echo ("Cấp cứu");
                        } else if ($row["loaiphong"] == "PT"){
                            echo ("Thường");
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
    </div>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="./js/main-homepage.js"></script>
    <script src="./js/sidebar.js"></script>

</body>

</html>