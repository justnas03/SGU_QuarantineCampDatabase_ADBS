<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style-homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">

    <title>CV19 Camp - Bệnh nhân</title>
</head>

<body>
    <?php
    include("./include/header.php");
    include("./mvc/Models/DBConfig.php");
    $db = new Database;
    $conn = $db->connect();
    $itemOfPage = !empty($_GET['itemOfPage']) ? $_GET['itemOfPage'] : 8;
    $currentPage = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemOfPage;
    $sql = "SELECT bn.MaBN, bn.HoTen, bn.SoCMND, bn.SDT, bn.DiaChi, bn.Gioitinh, bn.chuyendentu, bn.thongtinxnbandau, bn.Ma_Staff, 
    bn.Ngay_nhap_vien, bn.Ngay_xuat_vien, bn.Ma_Nurse FROM benhnhan bn ORDER BY 'MaBN' ASC LIMIT " . $itemOfPage . " OFFSET " . $offset . "";
    $totalProduct = mysqli_query($conn, "SELECT * FROM `benhnhan`");
    $totalProduct = $totalProduct->num_rows;
    $totalPage = ceil($totalProduct / $itemOfPage);
    $result = $db->execute($sql);
    ?>
    <div class="home_content">
        <div class="header-title">
            <h1>Quản lý bệnh nhân</h1>
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
            <input type="text" name="searchdata" id="searchdata" placeholder="Tìm kiếm...">
            
            <input type="text" name="search_disease" placeholder="Bệnh lý...">
            <button type="submit" name="search">OK</button>
            </div>
        </form>
        </div>
        <div class="add-new-obj">
            <form action="./add_obj/thembenhnhan.php" method="post">
                <input type="submit" value="Thêm bệnh nhân">
            </form>
        </div>
        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Mã Bệnh nhân</th>
                    <th>Họ và Tên</th>
                    <th>Số CMND</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                </tr>
                <?php
                if (isset($_POST['search'])) {

                } else {
                    if ($result) {
                        while ($row = $db->getData()) {
                            ?>
                            <tr class="data-table" data-href="./detail/detailPatient.php?id=<?= $row['MaBN'] ?>">
                                <td>
                                    <?php echo $row["MaBN"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["HoTen"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["SoCMND"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["SDT"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["DiaChi"]; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row["Gioitinh"] == "M") {
                                        echo "Nam";
                                    } else {
                                        echo "Nữ";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>

            
        <?php
        if (isset($_POST['search'])) {
            $searchTerm = $_POST['searchdata'];
            $searchDisease = $_POST['search_disease'];
            $sqlSearch = "SELECT * FROM benhnhan bn
                                   JOIN benhlydikem bl ON bn.MaBN = bl.MaBN 
                                   WHERE (bn.HoTen LIKE '%$searchTerm%' OR bn.SDT LIKE '%$searchTerm%') AND bl.benhlydikem LIKE '%$searchDisease%'";
            $resultSearch = $db->execute($sqlSearch);

            if ($resultSearch) {
                while ($row = $db->getData()) {
                    ?>
                    <tr class="data-table" data-href="./detail/detailPatient.php?id=<?= $row['MaBN'] ?>">
                        <td>
                            <?php echo $row["MaBN"]; ?>
                        </td>
                        <td>
                            <?php echo $row["HoTen"]; ?>
                        </td>
                        <td>
                            <?php echo $row["SoCMND"]; ?>
                        </td>
                        <td>
                            <?php echo $row["SDT"]; ?>
                        </td>
                        <td>
                            <?php echo $row["DiaChi"]; ?>
                        </td>
                        <td>
                                    <?php
                                    if ($row["Gioitinh"] == "M") {
                                        echo "Nam";
                                    } else {
                                        echo "Nữ";
                                    }
                                    ?>
                                </td>
                       
                    <?php
                }
            } else {
                echo "<p>Không có kết quả tìm kiếm.</p>";
            }
        } else {
            if ($result) {
                while ($row = $db->getData()) {
                    ?>
                    <tr class="data-table" data-href="./detail/detailPatient.php?id=<?= $row['MaBN'] ?>">
                        <td>
                            <?php echo $row["MaBN"]; ?>
                        </td>
                        <td>
                            <?php echo $row["HoTen"]; ?>
                        </td>
                        <td>
                            <?php echo $row["SoCMND"]; ?>
                        </td>
                        <td>
                            <?php echo $row["SDT"]; ?>
                        </td>
                        <td>
                            <?php echo $row["DiaChi"]; ?>
                        </td>
                        <td>
                                    <?php
                                    if ($row["Gioitinh"] == "M") {
                                        echo "Nam";
                                    } else {
                                        echo "Nữ";
                                    }
                                    ?>
                                </td>
                        
                    <?php
                }
            }
        }
        ?>


        </table>
    </div>
    <div class="paging">
        <ul class="paging-lists">
            <?php
            if ($currentPage > 3) {
            ?>
                <li class="paging-item"><a href="?itemOfPage=<?= $itemOfPage ?>&page=1"><= </a>
                </li>
            <?php
            }
            ?>
            <?php
            if ($currentPage > 1) {
            ?>
                <li class="paging-item"><a href="?itemOfPage=<?= $itemOfPage ?>&page=<?= $currentPage - 1 ?>">
                        << </a>
                </li>
            <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i != $currentPage) {
                    if ($i > $currentPage - 3 && $i < $currentPage + 3) {
            ?>
                        <li class="paging-item" onclick="activeLink()"><a href="?itemOfPage=<?= $itemOfPage ?>&page=<?= $i ?>"><?= $i ?></a></li>
                    <?php
                    }
                } else {
                    ?>
                    <li class="paging-item active-paging"><a href="?itemOfPage=<?= $itemOfPage ?>&page=<?= $i ?>"><?= $i ?></a></li>
            <?php
                }
            }
            ?>
            <?php
            if ($currentPage < $totalPage - 1) {
            ?>
                <li class="paging-item"><a href="?itemOfPage=<?= $itemOfPage ?>&page=<?= $currentPage + 1 ?>"> >> </a></li>
            <?php
            }
            ?>
            <?php
            if ($currentPage < $totalPage - 2) {
            ?>
                <li class="paging-item"><a href="?itemOfPage=<?= $itemOfPage ?>&page=<?= $totalPage ?>">=></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    </div>

    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="./js/main-homepage.js"></script>
    <script src="./js/sidebar.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var rows = document.querySelectorAll(".data-table");
            rows.forEach(function (row) {
                row.addEventListener("click", function () {
                    var link = this.getAttribute("data-href");
                    if (link) {
                        window.location.href = link;
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // When the admin name is clicked, toggle the Log Out link visibility
            $('#adminName').on('click', function () {
                $('#logOutLink').toggleClass('active');
            });
        });
    </script>
</body>

</html>