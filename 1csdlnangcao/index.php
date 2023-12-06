<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/login-style.css">
    <title>CV19 Camp</title>
</head>
    <?php
        include("./mvc/Models/DBConfig.php");
        $db = new Database;
        $conn = $db->connect();
    ?>
<body>
    <nav>
        <a href="#"><i class='bx bx-heart logo-main'></i></a>
        <span>CV19 Camp</span>
    </nav>
    <form action="" method="post">
        <div class="form-wrapper">
            <h2>Sign In</h2>
            <form action="#" method="post">
                <div class="form-control">
                    <input type="text" required id="user" name ="username">
                    <label>Username</label>
                </div>
                <div class="form-control">
                    <input type="password" required id="pass" name="pass_user">
                    <label>Password</label>
                </div>
                <button type="submit" name="submit" class="btn-submit">Sign In</button>
            </form>
            <small>
                Tình hình dịch bệnh đang diễn biến phức tạp, chúng ta mỗi người một tay cùng nhau đẩy lùi dịch bệnh, chấp hành nghiêm túc những quy định của nhà nước, đeo khẩu trang nơi công cộng, giữ gìn vệ sinh và khoảng cách đúng quy định, không được chủ quan bạn nhé. Ở nhà vì bạn, vì tôi, vì cộng đồng!
            </small>
        <?php
        if (isset($_POST["submit"])) {
            
            $username = $_POST["username"];
            $password = $_POST["pass_user"];

            $sql = "SELECT * FROM user WHERE (username = ? AND password = ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                header("location: benhnhan.php");
            } else {
                echo '<p style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng</p>';
            }
            $stmt->close();
        }
        ?>
        </div>

    </form>
    
                
</body>

</html>