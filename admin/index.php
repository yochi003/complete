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

// //รายการสั่งซื้อที่เหลือน้อยกว่า 10 ชิ้น
// $sql4="select COUNT(pro_id) AS pro_num from product where amount < 10 ";
// $hand4=mysqli_query($conn,$sql4);
// $row4=mysqli_fetch_array($hand4);



?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>coffee</title>
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

<body class="sb-nav-fixed">
    <!-- <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Coffee Shop ยินดีต้อนรับ : <?php echo $_SESSION['name'].'  '.$_SESSION['surname']?></h4>
            </div>
        </div>
    </div> -->
    <?php include 'menu1.php';   ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">จัดการภายในร้าน</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">coffee shop</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">รายการสั่งซื้อสินค้า(ยังไม่ได้ชำระเงิน)<h4><?=$row1['order_no']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">รายการสั่งซื้อสินค้า(ชำระเงินเเล้ว)<h4><?=$row2['order_yes']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_yes.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">รายการสั่งซื้อสินค้า(ยกเลิกสั่งซื้อ)<h4><?=$row3['order_cancel']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_no.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">รายการสินค้าที่เหลือน้อยกว่า 10 ชิ้น <h4><?=$row4['pro_num']?></h4></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pro_stock.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div> -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        รายการสินค้า
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
    $sql="SELECT * FROM product p, type t WHERE p.type_id=t.type_id";
    $hand=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){

?>
                                <tr>
                                    <td><img src="../admin/image/<?=$row['image']?>" width="100" height="150"></td>
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