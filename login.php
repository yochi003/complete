<!DOCTYPE html>
<html lang="en">

<head>

    <title>เข้าสู่ระบบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sheet.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    
</head>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
<body>

    <div class="login">

        <h4 class="text-center text-secondary">เข้าสู่ระบบ</h4>
        <h1 class="text-center text-secondary">Coffee Shop</h1>
        

        <form class="needs-validation" action="login_check.php" method="POST">
            <div class="form-group was-validated">
                <label class="form-label text-success" for="name">Username</label>
                <input class="form-control" type="type" name="ctm_user" required>
                <div class="invalid-feedback">
                    โปรดกรอกชื่อผู้ใช้
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label text-success" for="password">Password</label>
                <input class="form-control" type="password" name="ctm_password" id="myPassword" required>
                <div class="invalid-feedback">
                    กรุณากรอกรหัสผ่าน
                </div>
            </div>
        <div class="form-group">
                <input type="checkbox" onclick="passShow()">
                <label>แสดงรหัสผ่าน</label>
            </div>
            <div>
                <input class="btn btn-primary w-100" type="submit" name="login" value="เข้าสู่ระบบ">
            </div>
            <div class="mt-2">
                <a href="register.php" class="btn btn-danger w-100">สมัครสมาชิกผู้ใช้ใหม่</a>
            </div>
        </form>

    </div>

</body>

</html>