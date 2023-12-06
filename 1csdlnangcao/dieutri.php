<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style-homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">

    <title>CV19 Camp - Điều trị</title>
</head>

<body>
    <?php
    include ("./include/header.php");
    

    include ("./mvc/Models/DBConfig.php");
    $db = new Database;
    $conn = $db->connect();
    $itemOfPage = !empty($_GET['itemOfPage']) ? $_GET['itemOfPage'] : 8;
    $currentPage = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemOfPage;
    $sql = "SELECT dt.Ma_DT, dt.MaBN, dt.Ma_Doctors, dt.MaThuoc, dt.ketqua, dt.startdate, dt.enddate FROM dieutri dt ORDER BY 'Ma_DT' ASC LIMIT " . $itemOfPage . " OFFSET " . $offset . "";
    $totalProduct = mysqli_query($conn, "SELECT * FROM `benhnhan`");
    $totalProduct = $totalProduct->num_rows;
    $totalPage = ceil($totalProduct / $itemOfPage);
    $result = $db->execute($sql);
    ?>
    <div class="home_content">
        <div class="header-title">
            <h1>Quản lý điều trị</h1>
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
                    <input type="search" name="searchdata" id="searchdata" placeholder="Tìm kiếm mã điều trị">
                    <button type="submit" name="search">Xác nhận</button>     
                </div>
            </form>
        </div>
        <div class="add-new-obj">
            <form action="./add_obj/themdieutri.php" method="post">
                <input type="submit" value="Thêm điều trị">
            </form>
        </div>
        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Mã điều trị</th>
                    <th>Mã bệnh nhân</th>
                    <th>Mã bác sĩ</th>
                    <th>Mã thuốc</th>
                    <th>Kết quả</th>
                    <th>Ngày bắt đầu điều trị</th>
                    <th>Ngày kết thúc điều trị</th>
                    
                </tr>
                <?php
                    if (isset($_POST["search"])) {
                        $searchTerm = $_POST['searchdata'];
                        $sqlSearchName = "SELECT * FROM dieutri WHERE Ma_DT LIKE '%$searchTerm%'";
                        $resultSearchName = $db->execute($sqlSearchName);
                        if ($resultSearchName){
                            while ($rowSearchName = $resultSearchName->fetch_assoc()) {
                ?>
                <tr class="data-table" data-href="./detail/detailPatient.php?id=<?= $rowSearchName['MaBN'] ?>">
                                <td><?php echo $rowSearchName["Ma_DT"]; ?></td>
                                <td><?php echo $rowSearchName["MaBN"]; ?></td>
                                <td><?php echo $rowSearchName["Ma_Doctors"]; ?></td>
                                <td><?php echo $rowSearchName["MaThuoc"]; ?></td>
                                <td><?php echo $rowSearchName["ketqua"]; ?></td>
                                <td><?php echo $rowSearchName["startdate"]; ?></td>
                                <td><?php echo $rowSearchName["enddate"]; ?></td>
                            </tr>
                <?php
                    }
                }
                }else{
                    if($result){
                        while($row = $db->getData()){   
                ?>
                            <tr class="data-table" data-href="./detail/detailPatient.php?id=<?= $row['Ma_DT'] ?>">
                                <td><?php echo $row["Ma_DT"]; ?></td>
                                <td><?php echo $row["MaBN"]; ?></td>
                                <td><?php echo $row["Ma_Doctors"]; ?></td>
                                <td><?php echo $row["MaThuoc"]; ?></td>
                                <td><?php echo $row["ketqua"]; ?></td>
                                <td><?php echo $row["startdate"]; ?></td>
                                <td><?php echo $row["enddate"]; ?></td>
                            </tr>
                <?php
                        }
                        }
                }
                
                ?>  
            </table>
        </div>
        <div class="paging-show-data">
            <div class="paging-data">
                <ul class="page-list">
                    <li class="page-detail">1</li>
                    <li class="page-detail">2</li>
                    <li class="page-detail">3</li>
                    <li class="page-detail">4</li>
                </ul>
            </div>
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