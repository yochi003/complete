<?php
session_start();
include "condb.php";
// if(!isset($_SESSION["admin_id"])){
//     $show=header("location:login.php")
// }
//รายการสั่งซื้อที่ยังไม่ชำระ
$sql1="select COUNT(orderID) AS order_no from tb_order where order_status='1' ";
$hand=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($hand);

//รายการสั่งซื้อที่ชำระเงินเเล้ว
$sql2="select COUNT(orderID) AS order_yes from tb_order where order_status='2' ";
$hand2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($hand2);

//รายการสั่งซื้อที่ยกเลิกสั่งซื้อเเล้ว
$sql3="select COUNT(orderID) AS order_cancel from tb_order where order_status='0' ";
$hand3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($hand3);

//รายการสั่งซื้อที่เหลือน้อยกว่า 10 ชิ้น
$sql4="select COUNT(pro_id) AS pro_num from product where amount < 10 ";
$hand4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($hand4);



?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <?php include 'menu1.php';   ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                

                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="alert alert-danger"> รายการสินค้าที่เหลือน้อยกว่า 10 ชิ้น </h4>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <!-- <th>รายละเอียด</th> -->
                                    <th>ประเภทสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>เพิ่มสต็อกสินค้า</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>pro_id</th>
                                    <th>pro_name</th>
                                    <th>detail</th>
                                    <th>type_name</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
    $sql="SELECT * FROM product p, type t WHERE p.type_id=t.type_id and amount < 10";
    $hand=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){

?>
                                <tr>
                                    <td><img src="../image/<?=$row['image']?>" width="100" height="150"></td>
                                    <td><?=$row['pro_id']?></td>
                                    <td><?=$row['pro_name']?></td>
                                    <!-- <td><?=$row['detail']?></td> -->
                                    <td><?=$row['type_name']?></td>
                                    <td><?=$row['price']?></td>
                                    <td><?=$row['amount']?></td>

                                    <td><a href="addStock.php?id=<?=$row['pro_id']?>" class="btn btn-secondary">เพิ่ม</a></tr>

                                </tr>
                                <?php
    }
    mysqli_close($conn);
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php'   ?>


    </div>
    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>