<?php
session_start();
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'menu1.php'   ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<div class="card mb-4 mt-4">
<div class="card-header">
    <div class="container">
    <div class="h2 mb-4 mt-4">
    <b> เพิ่มข้อมูลพนักงาน </b>
            </div>
                <form name="form1" method="post" action="insert_emp.php" enctype="multipart/form-data">
                <label> ชื่อ</label>
                <input type="text" name="name" class="form-control" required>
                <label> นามสกุล</label>
                <input type="text" name="sname" class="form-control" required>
                <label> ชื่อผู้ใช้</label>
                <input type="text" name="username" class="form-control" required>
                <label> รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" required>
                <label> อีเมล</label>
                <input type="text" name="email" class="form-control" required>
                <label> เบอร์โทรศัพท์</label>
                <input type="text" name="phone" class="form-control" required>
                <label> ที่อยู่</label>
                <input type="text" name="address" class="form-control" required><br>

                <button type="submit" class="btn btn-success">บันทึก</button>
                <a class="btn btn-danger" href="sh_employee.php" role="button">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>