<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อวัตถุดิบ</title>
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
    <div class="alert alert-primary  h2 text-center mb-4 mt-4" role="alert">
    แสดงข้อวัตถุดิบ
            </div>
            <a class="btn btn-primary mb-4" href="fr_mat.php" role="button">เพิ่มข้อมูลวัตถุดิบ+</a> <br>
    <table class="table table-striped table-hover">
           <tr>
            <th>รหัสวัตถุดิบ</th>
            <th>ชื่อวัตถุดิบ</th>
            <th>จำนวนวัตถุดิบ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
           </tr> 
           
<?php
$sql="SELECT * FROM staple WHERE material_id  ";
$hand = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){
?>
           <tr>
            <td><?=$row['material_id']?></td>
            <td><?=$row['material_name']?></td>
            <td><?=$row['material_number']?></td>
            <td><a href="edit_mat.php?id=<?=$row['material_id']?>" class="btn btn-success"> แก้ไข</a></td>
            <td><a href="delete_mat.php?id=<?=$row['material_id']?>" class="btn btn-danger"> ลบ</a></td>
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
