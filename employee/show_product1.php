<?php 
session_start();
if(!isset($_SESSION['emp_user'])){
    header('location:login_emp.php');
}
include 'condb.php' ;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>report</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
    </head>
    <body class="sb-nav-fixed">
        <?php include 'menu1.php';   ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                รายงานสรุปยอดขายตามช่วงเวลา
                            </div>
                            <br>
                                <div>
                            <form name="form1" method="POST" action="show_product1.php">
                            <div class="row">
                         <div class="col-sm-2">
                            <input type="date" name="dt1" class="form-control">
                         </div>
                         <div class="col-sm-2">
                         <input type="date" name="dt2" class="form-control">
                         </div>
                         <div class="col-sm-4">
                         <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                         </div>
                      </div>
</form>
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
                                            <!-- <th>รายละเอียด</th>
                                            <th>ปรับสถานะการชำระเงิน</th>
                                            <th>ยกเลิกการสั่งซื้อ</th> -->
                                        </tr>
                                    </thead>
          <?php
          $ddt1=@$_POST['dt1'];
          $ddt2=@$_POST['dt2'];
          $add_date= date('Y/m/d', strtotime($ddt2. "+1 days"));

          if(($ddt1 != "") & ($ddt2 != "")){
            echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
            $sql = "select * from tb_order where order_status='2' and reg_date BETWEEN '$ddt1' and '$ddt2'
            order by reg_date DESC";
          }else{
            $sql = "select * from tb_order where order_status='2' order by reg_date DESC";
          }


          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($result)){
          ?> 
                                    
                                        <tr>
                                            <td><?=$row['orderID']?></td>
                                            <td><?=$row['cus_name']?></td>
                                            <td><?=$row['address']?></td>
                                            <td><?=$row['telephone']?></td>
                                            <td><?=$row['total_price']?></td>
                                            <td><?=$row['reg_date']?></td>
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
