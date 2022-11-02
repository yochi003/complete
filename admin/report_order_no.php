<?php include 'condb.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Order</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
    <body class="sb-nav-fixed">
        <?php include 'menu1.php'   ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แสดงข้อมูลการสั่งซื้อสินค้า (ยกเลิกใบสั่งซื้อ)

                                <div> 
                                    <br>
                                <a href="report_order_yes.php"> <button type="button" class="btn btn-outline-primary">ชำระเงินแล้ว</button> </a> 
                                <a href="report_order.php"> <button type="button" class="btn btn-outline-primary">ยังไม่ชำระเงิน</button> </a>
                                <a href="report_order_no.php"> <button type="button" class="btn btn-outline-primary">ยกเลิกใบสั่งซื้อ</button> </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>เลขที่ใบสั่งซื้อ</th>
                                            <th>ลูกค้า</th>
                                            <th>ที่อยู่จัดส่ง</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>ราคารวมสุทธิ</th>
                                            <th>วันที่สั่งซื้อ</th>
                                            <th>สถานะการสั่งซื้อ</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr> 
                                            <th>orderID</th>
                                            <th>cus_name</th>
                                            <th>address</th>
                                            <th>telephone</th>
                                        </tr>                                       
                                    </tfoot>
          <?php 
          $sql = "select * from tb_order where order_status='0' order by reg_date DESC";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
          $status = $row['order_status'];
          ?> 
                                    
                                        <tr>
                                            <td><?=$row['orderID']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['address']?></td>
                                            <td><?=$row['telephone']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td><?=$row['reg_date']?></td>
                                            <td>
                                                <?php 
                                            if($status == 1){
                                                echo "ยังไม่ชำระเงิน";
                                            }else if($status == 2){
                                                echo "<b style='color:green' >ชำระเงินแล้ว </b>";
                                            }else if($status == 0){
                                                echo "<b style='color:red' >ยกเลิกใบสั่งซื้อ </b>";
                                            }
                                                ?>

                                            </td>
                                            
                                        </tr>
                                        </tr>
                                    <?php 
                                     }
                                     mysqli_close($conn);
                                    ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
