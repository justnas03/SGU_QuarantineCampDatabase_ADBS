<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style-homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <title>CV19 Camp - Nhân viên</title>
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

    $sql = "SELECT nv.MaNV, nv.HoTen, nv.Diachi, nv.Gioitinh, nv.SDT, nv.ChucVu, nv.Ngaybatdaulamviec 
        FROM nhanvien nv ORDER BY 'MaNV' ASC LIMIT " . $itemOfPage . " OFFSET " . $offset . "";
    $totalProduct = mysqli_query($conn, "SELECT * FROM `nhanvien`");
    $totalProduct = $totalProduct->num_rows;
    $totalPage = ceil($totalProduct / $itemOfPage);
    $result = $db->execute($sql);
    ?>
    <div class="home_content">
        <div class="header-title">
            <h1>Quản lý Nhân viên</h1>
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
                <input type="text" name="searchdata" id="searchdata" placeholder="Tìm kiếm theo tên nhân viên">
                <button type="submit" name="search">Search</button>
            </div>
        </form>
        </div>
        <div class="add-new-obj">
            <form action="./add_obj/themnhanvien.php" method="post">
                <input type="submit" value="Thêm nhân viên">
            </form>
        </div>

        

        <div class="table-BN">
            <table>
                <tr class="tr-title">
                    <th>Mã Nhân viên</th>
                    <th>Họ Tên</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Ngày bắt đầu làm việc</th>
                </tr>
                <?php
                    if (isset($_POST["search"])) {
                        $searchTerm = $_POST['searchdata'];
                        $sqlSearchName = "SELECT * FROM nhanvien WHERE HoTen LIKE '%$searchTerm%' ORDER BY 'MaNV' ASC LIMIT " . $itemOfPage . " OFFSET " . $offset . "";
                        $resultSearchName = $db->execute($sqlSearchName);
                        if ($resultSearchName){
                            while ($rowSearchName = $resultSearchName->fetch_assoc()) {
                ?>
                <tr class="data-table" data-href="./detail/detailEmployee.php?id=<?= $rowSearchName['MaNV'] ?>">
                    <td><?php echo $rowSearchName['MaNV'] ?></td>
                    <td><?php echo $rowSearchName['HoTen'] ?></td>
                    <td><?php echo $rowSearchName['DiaChi'] ?></td>
                    <td>
                        <?php if ($rowSearchName['Gioitinh'] == "M"){
                            echo 'Nam';
                        }else if ($rowSearchName['Gioitinh'] == "F"){
                            echo 'Nữ';
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td><?php echo $rowSearchName['SDT'] ?></td>
                    <td><?php echo $rowSearchName['ChucVu'] ?></td>
                    <td><?php echo $rowSearchName['Ngaybatdaulamviec'] ?></td>
                    
                </tr>
                <?php
                }
            }
            }else{
                    if($result){
                        while($row = $db->getData()){   
                ?>
                <tr class="data-table" data-href="./detail/detailEmployee.php?id=<?= $row['MaNV'] ?>">
                    <td><?php echo $row['MaNV'] ?></td>
                    <td><?php echo $row['HoTen'] ?></td>
                    <td><?php echo $row['Diachi'] ?></td>
                    <td>
                        <?php if ($row['Gioitinh'] == "M"){
                            echo 'Nam';
                        }else if ($row['Gioitinh'] == "F"){
                            echo 'Nữ';
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td><?php echo $row['SDT'] ?></td>
                    <td><?php echo $row['ChucVu'] ?></td>
                    <td><?php echo $row['Ngaybatdaulamviec'] ?></td>
                    
                </tr>
                <?php
                            }
                        }
                    }
                ?>
            </table>
        </div>

        <div class="table-BN">
            <h4>Trưởng khoa</h4>
            <table>
                <tr class="tr-title">
                    <th>Mã trưởng khoa</th>
                    <th>Họ Tên</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Ngày bắt đầu làm việc</th>
                </tr>
                <?php
                        $sqlDoctorManager = "SELECT * FROM manager m, nhanvien n WHERE m.Ma_Doctors = n.MaNV";
                        $resultDoctorManager = $db->execute($sqlDoctorManager);
                        if ($resultDoctorManager){
                            while ($rowDoctorManager = $resultDoctorManager->fetch_assoc()) {
                ?>
                <tr class="data-table" data-href="./detail/detailEmployee.php?id=<?= $rowDoctorManager['MaNV'] ?>">
                    <td><?php echo $rowDoctorManager['MaNV'] ?></td>
                    <td><?php echo $rowDoctorManager['HoTen'] ?></td>
                    <td><?php echo $rowDoctorManager['DiaChi'] ?></td>
                    <td>
                        <?php if ($rowDoctorManager['Gioitinh'] == "M"){
                            echo 'Nam';
                        }else if ($rowDoctorManager['Gioitinh'] == "F"){
                            echo 'Nữ';
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td><?php echo $rowDoctorManager['SDT'] ?></td>
                    <td><?php echo $rowDoctorManager['ChucVu'] ?></td>
                    <td><?php echo $rowDoctorManager['Ngaybatdaulamviec'] ?></td>
                    
                </tr>
                <?php
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

    


    <script src="./js/main-homepage.js"></script>
    <script src="./js/sidebar.js"></script>
    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>


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