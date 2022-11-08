<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มวัตถุดิบ</title>
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
    
<body>
<?php include 'menu1.php';   ?>
<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
    <div class="container">
    
        <div class="row">
            <div class="col-sm-6">
            <div class="h2 mb-4 mt-4">
    <b> เพิ่มข้อมูลวัตถุดิบ </b>
            </div>
                <form name="form1" method="post" action="insert_mat.php" enctype="multipart/form-data">
                    <div>
                <label> ชื่อวัตถุดิบ</label>
                <input type="text" name="matname" class="form-control" required>
                </div>
                <!-- <label> จำนวนวัตถุดิบ </label>
                <input type="number" name="matnum" class="form-control"required> <br>
 -->
                <div class="mt-2">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <a class="btn btn-danger" href="sh_mat.php" role="button">ยกเลิก</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>