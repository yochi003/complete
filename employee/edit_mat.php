<?php
session_start();
if(!isset($_SESSION['emp_user'])){
    header('location:login_emp.php');
}
include 'condb.php';
$matid = (isset($_GET['id'])) ? $_GET['id'] : '';
$sql = "SELECT * FROM staple WHERE material_id='$matid' ";
$result= mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลลูกค้า</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
<body>
<?php include 'menu1.php'   ?>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">
<div class="card mb-4 mt-4">
   <div class="card-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="alert alert-primary  h4 text-center mb-4" role="alert">
            แก้ไขข้อมูลวัตถุดิบ
            </div>
                <form name="form1" method="post" action="update_mat.php" enctype="multipart/form-data">
                <label> รหัสวัตถุดิบ</label>
                <input type="text" name="matid" class="form-control" readonly value="<?php echo $rs['material_id']?>" >
                <label> ชื่อวัตถุดิบ</label>
                <input type="text" name="matname" class="form-control" value="<?php echo $rs['material_name']?>" >
                <label> จำนวนวัตถุดิบ </label>
                <input type="number" name="matnum" class="form-control"  value="<?php echo $rs['material_number']?>" > <br>
                <button type="submit" class="btn btn-success">แก้ไข</button>
                <a class="btn btn-danger" href="sh_mat.php" role="button">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>