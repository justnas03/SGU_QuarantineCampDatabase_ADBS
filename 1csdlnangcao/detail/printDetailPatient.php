<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylePDF.css">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");
    *{
    margin: 0 30px;
    padding: 0;
    box-sizing: border-box;
}
body{
    font-family: DejaVu Sans, sans-serif;
}
.navbar{
    width: 100%;
    height: 100px;
}
.navbar img{
    width: 100px;
    height: 100px;
}
.content{
    text-align: center;
}
.content h2{
    font-size: 40px;
}
.content h4{
    font-size: 35px;
}
.info-patient{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 500px;
}
.info-patient-all{
    margin-top: 40px;
}
.info-1{
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 15px;
    margin: 15px 0;
    width: 500px;
}
strong{
    font-size: 15px;
}
table,
td,
th {
    /* border: 1px solid; */
    margin-top: 20px;
    padding: 20px;
    text-align: left;
    border: 1px solid #000;
}
th{
    color: red;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;

}
tr{
    color: #808080;
}
tr:hover{
    color: #555555;
    background-color: #f5f5f5;
    cursor: pointer;
}

    </style>
</head>
<body>
    <?php
        session_start();
        include("../mvc/Models/DBConfig.php");
        $db = new Database;
        $db->connect();
        $id = $_GET["id"];
        $sql = "SELECT bn.MaBN, bn.HoTen, bn.SoCMND, bn.SDT, bn.DiaChi, bn.Gioitinh, bn.chuyendentu, bn.thongtinxnbandau, bn.Ma_Staff, 
        bn.Ngay_nhap_vien, bn.Ngay_xuat_vien, bn.Ma_Nurse FROM benhnhan bn WHERE bn.MaBN = $id";
        $result = $db->execute($sql);
    ?>
    <div class="navbar">
        <img src="../images/R.png" alt="">
    </div>
    <div class="content">
        <h2>CV19 Camp</h2>
        <h4>Giấy xuất viện</h4>
    </div>
    <div class="info-patient">
        <?php
            if ($result){
                while($row = $db->getData()){
        ?>

                    <div class="info-patient-all">
                        <div class="info-1">
                            <p>Họ và tên: <?php echo $row['HoTen'] ?></p>
                            <p>SCMND: <?php echo $row['SoCMND'] ?></p>
                        </div>
                        <div class="info-1">
                            <p>Số điện thoại: <?php echo $row['SDT'] ?></p>
                            <p>Địa chỉ: <?php echo $row['DiaChi'] ?></p>
                        </div>
                        <div class="info-1">
                            <p>Ngày nhập viện: <?php echo $row['Ngay_nhap_vien'] ?></p>
                            <p>Ngày xuất viện: <?php echo $row['Ngay_xuat_vien'] ?></p>
                        </div>
                        <div class="info-1">
                            <?php 
                                $sqlBenhlydikem = "SELECT * FROM benhlydikem WHERE MaBN = $id"; $resultBenhlydikem = $db->execute($sqlBenhlydikem); 
                                if ($resultBenhlydikem){
                                    while ($row1 = $db->getData()){
                            ?>
                            <p>Bệnh lý đi kèm: <?php echo $row1['benhlydikem'] ?></p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <p><strong>Lịch sử điều trị</strong></p>
                        <div class="info-1">
                            <table>
                                <tr>
                                    <th>Ngày điều trị</th>
                                    <th>Kết quả điều trị</th>
                                </tr>
                            <?php 
                                $sqlDieutri = "SELECT * FROM dieutri WHERE MaBN = $id"; $resultDieutri = $db->execute($sqlDieutri); 
                                if ($resultDieutri){
                                    while ($row2 = $db->getData()){
                            ?>
                            <tr>
                                <td><?php echo $row2['startdate'] ?></td>
                                <td><?php echo $row2['ketqua'] ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                            </table>
                        </div>
                        <div class="info-1">
                            <?php 
                                $sqlTrieuchungthuong = "SELECT * FROM trieuchungthuong WHERE MaBN = $id"; $resultTrieuchungthuong = $db->execute($sqlTrieuchungthuong); 
                                if ($resultTrieuchungthuong){
                                    while ($row3 = $db->getData()){
                            ?>
                            <p>Triệu chuứng thường: <?php echo $row3['ten_trieu_chung_thuong'] ?></p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="info-1">
                            <?php 
                                $sqlTrieuchungnghiemtrong = "SELECT * FROM trieuchungnghiemtrong WHERE MaBN = $id"; $resultTrieuchungnghiemtrong = $db->execute($sqlTrieuchungnghiemtrong); 
                                if ($resultTrieuchungnghiemtrong){
                                    while ($row4 = $db->getData()){
                            ?>
                            <p>Triệu chuứng nghiêm trọng: <?php echo $row4['ten_trieu_chung_nghiem_trong'] ?></p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <p><strong>Lịch sử xét nghiệm</strong></p>
                        <div class="info-1">
                            <table>
                                <tr>
                                    <th>Ngày xét nghiệm</th>
                                    <th>PCR</th>
                                    <th>SPO2</th>
                                    <th>Respiratory Rate</th>
                                    <th>CT Value</th>
                                </tr>
                            <?php 
                                $sqlXetnghiem = "SELECT * FROM xetnghiem WHERE MaBN = $id"; $resultXetnghiem = $db->execute($sqlXetnghiem); 
                                if ($resultXetnghiem){
                                    while ($row5 = $db->getData()){
                            ?>
                            <tr>
                                <td><?php echo $row5['ThoigianXN'] ?></td>
                                <td><?php echo $row5['PCR_result'] ?></td>
                                <td><?php echo $row5['SPO2'] ?></td>
                                <td><?php echo $row5['Respiratiory_Rate'] ?></td>
                                <td><?php echo $row5['ct'] ?></td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                            </table>
                        </div>
                    </div>

        <?php
                }
            }
        ?>
    </div>

</body>
</html>