<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    header('location:login_am.php');
}
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลสินค้า</title>
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
    <b> ข้อมูลโปรโมชั่น </b>
            </div>
            <a class="btn btn-primary mb-4" href="fr_pomo.php" role="button">เพิ่มโปรโมชั่น+</a> <br>
            <table id="datatablesSimple" class="table table-striped table-hover">
           <tr>
            <!-- <th>รหัสโปรโมชั่น</th> -->
            <th>รูปภาพ</th>
            <th>โค้ดโปรโมชั่น</th>
            <th>จำนวนขั้นต่ำการสั่งซื้อ/เเก้ว</th>
            <th>ส่วนลด/บาท</th>
            <th width = "20%">รายละเอียดโปรโมชั่น</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
           </tr> 
<?php
$sql="SELECT * FROM promotion WHERE pomo_id = pomo_id ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
    $pomo_status = $row['pomo_status'];
?>
           <tr>
            <!-- <td><?=$row['pomo_id']?></td> -->
            <td><image src="../pomo/<?=$row['pomo_img']?>" width="100px" height="150px"></td>
            <td><?=$row['pomo_name']?></td>
            <td><?=$row['pomo_number']?></td>
            <td><?=$row['pomo_sale']?></td>
            <td><?=$row['detail_pomo']?></td>
            <td>
                <?php
                if($pomo_status == 1){
                    echo "<b style = 'color:green'>เปิดใช้งาน</b>";
                }else if($pomo_status == 2){
                    echo "<b style = 'color:red'>ปิดใช้งาน</b>";
                }
                ?>
            </td>
            <div>
            <td>
            <a href="open_pomo.php?id=<?=$row['pomo_id']?>" class="btn btn-success">เปิดโปรโมชั่น</a>
            <a href="close_pomo.php?id=<?=$row['pomo_id']?>" class="btn btn-danger">ปิดโปรโมชั่น</a>
            </td>
            </div>
            <td><a href="edit_pomo.php?id=<?=$row['pomo_id']?>" class="btn btn-success">แก้ไข</a></td>
            <td><a href="pomo_delete.php?id=<?=$row['pomo_id']?>" class="btn btn-danger">ลบ</a></td>
           </tr>
           <?php
           }
           mysqli_close($conn);
           ?>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
