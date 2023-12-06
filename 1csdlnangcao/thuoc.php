<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style-homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <title>CV19 Camp - Thuốc</title>
</head>

<body>
    <?php
    include("./include/header.php");
    include("./mvc/Models/DBConfig.php");
    $db = new Database;
    $db->connect();
    $sql = "SELECT * FROM thuoc";
    $result = $db->execute($sql);
    ?>
    <div class="home_content">
        <div class="header-title">
            <h1>Quản lý Thuốc</h1>
            <i class='bx bx-refresh' onclick="refreshPages()"></i>
            <script>
                function refreshPages() {
                    location.reload();
                }
            </script>
        </div>
        <div class="search-sort">
            <form action="" method="post">
                <div class="search-bar">
                <i class='bx bx-search'></i>
                <input type="text" name="searchdata" id="searchdata" placeholder="Tìm kiếm theo tên thuốc">
                <button type="submit" name="search">Search</button>
            </div>
        </form>
        </div>
        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Mã Thuốc</th>
                    <th>Tên Thuốc</th>
                    <th>Tác dụng</th>
                    <th>Ngày hết hạn</th>
                    <th>Giá tiền</th>
                </tr>
                <?php
                    if (isset($_POST["search"])) {
                        $searchTerm = $_POST['searchdata'];
                        $sqlSearchName = "SELECT * FROM thuoc WHERE TenThuoc LIKE '%$searchTerm%'";
                        $resultSearchName = $db->execute($sqlSearchName);
                        if ($resultSearchName){
                            while ($rowSearchName = $resultSearchName->fetch_assoc()) {
                ?>
                <tr class="data-table">
                    <td><?php echo $rowSearchName['MaThuoc'] ?></td>
                    <td><?php echo $rowSearchName['TenThuoc'] ?></td>
                    <td><?php echo $rowSearchName['TacDung'] ?></td>
                    <td><?php echo $rowSearchName['HSD'] ?></td>
                    <td><?php echo $rowSearchName['Gia'] ?></td>
                </tr>
                <?php
                        }
                    }
                    }else{
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                ?>
                <tr class="data-table">
                    <td><?php echo $row['MaThuoc'] ?></td>
                    <td><?php echo $row['TenThuoc'] ?></td>
                    <td><?php echo $row['TacDung'] ?></td>
                    <td><?php echo $row['HSD'] ?></td>
                    <td><?php echo $row['Gia'] ?></td>
                </tr>
                <?php
                            }
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