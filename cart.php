<?php
use Mpdf\Tag\Table;
session_start();
include 'condb.php';
if(!isset($_SESSION['ctm_user'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<?php
include 'navbar.php'
    ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="mt-5">
                    <h1 class="text-dark fw-bold"> รายการสั่งซื้อสินค้า </h1>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวนสินค้า</th>
                        <th>ราคารวม</th>
                        <th>เพิ่ม - ลด</th>
                        <th>ลบ</th>

                    </tr>
                    <?php
                    // echo $_SESSION["intLine"] "NOOOOOOOOOOO!!!!!"; 
                    $Total = 0;
                    $sumPrice = 0;
                    $m = 1;
                    $sumTotal = 0;

                    if (isset($_SESSION["intLine"])) { //ถ้าว่างให้ทำงานใน {}
                    
                        for ($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
                            if (($_SESSION["strProductID"][$i]) != "") {
                                $sql = "select * from product where pro_id ='" . $_SESSION["strProductID"][$i] . "' ";
                                $result = mysqli_query($conn, $sql);
                                $row_pro = mysqli_fetch_array($result);

                                $_SESSION["product_id"] = $row_pro['pro_id'];
                                $_SESSION["price"] = $row_pro['price'];
                                $Total = $_SESSION["strQty"][$i];
                                $sum = $Total * $row_pro['price'];
                                $sumPrice = (float) $sumPrice + $sum;
                                $_SESSION["sum_price"] = $sumPrice;
                                $sumTotal = $sumTotal + $Total;
                    ?>
                    <tr>
                        <td>
                            <?= $m ?>
                        </td>
                        <td>
                            <img src="admin/image/<?= $row_pro['image'] ?>" width="100" height="150   " class="border">
                            <?= $row_pro['pro_name'] ?>
                        </td>
                        <td>
                            <?= $row_pro['price'] ?>
                        </td>
                        <td>
                            <?= $_SESSION["strQty"][$i] ?>
                        </td>
                        <td>
                            <?= number_format($sum, 2) ?>
                        </td>
                        <td>
                            <a href="order.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-outline-warning">+</a>
                            <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                            <a href="order_del.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-outline-warning">-</a>
                            <?php } ?>


                        </td>
                        <td><a href="pro_delete.php?Line=<?= $i ?>"><img src="image/images.png" width="36"></a></td>
                    </tr>
                    <?php
                                $m = $m + 1;
                            }
                        }
                    }
                    mysqli_close($conn);
                    ?>
                    <tr>
                        <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                        <td class="text-center">
                            <?= number_format($sumPrice, 2) ?>
                        </td>
                        <td>บาท</td>
                    </tr>
                    <tr>
                        <form method="GET">
                            <td>ส่วนลด</td>
                            <td><input type="text" class="form-control" name="promotion_name" placeholder="โค้ดส่วนลด">
                            </td>
                            <td><button type="submit" class="btn btn-outline-success">ยืนยันรับโปรโมชั่น</button></td>
                        </form>
                        <?php
                        if (isset($_GET['promotion_name'])) {
                            include 'condb.php';
                            $promo = $_GET['promotion_name'];

                            $sth = $conn->prepare("SELECT pomo_number , pomo_sale  FROM promotion WHERE pomo_name = '$promo' AND pomo_status = '1'");
                            $sth->execute();
                            $sth->store_result();
                            $sth->bind_result($pomo_number, $pomo_sale);
                            $sth->fetch();
                            if ($sumTotal >= $pomo_number) {
                                $_SESSION["sum_price"] = $_SESSION["sum_price"] - $pomo_sale;
                        ?>
                        <td class="text-center">ส่วนลด <?=($pomo_sale) ?>
                        </td>
                        <td>บาท</td>
                        <?php
                            } else {
                                echo "ส่วนลดใช้ไม่ได้";
                            }
                        }
                        ?>

                    </tr>
                    <tr>
                        <td class="text-end" colspan="4">รวมทั้งหมด(*หักตามโปรโมชั่น)</td>
                        <td class="text-center">
                            <?= number_format($_SESSION["sum_price"], 2) ?>
                        </td>
                        <td>บาท</td>
                    </tr>
                </table>
                <p class="text-end">จำนวนสินค้าที่สั่งซื้อ <?= $sumTotal ?> แก้ว</p>
                <div style="text-align:right">
                    <a href="show_product.php"><button type="button" class="btn btn-outline-danger">เลือกสินค้าเพิ่ม
                            +</button> </a>

                </div>
            </div>
            <br>
            <div class="container">
                <form id="form1" method="POST" action="insert_cart.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mt-2">
                                <h1 class="text-dark"> ข้อมูลสำหรับการจัดส่ง </h1>
                            </div>
                            ชื่อ - นามสกุล
                            <input type="text" name="cus_name" class="form-control" required placeholder="ชื่อ-นามสกุล"
                                value="<?= $_SESSION['ctm_name'] ?> <?= $_SESSION['ctm_sname'] ?> " readonly> <br>
                            ที่อยู่จัดส่งสินค้า/หมายเหตุ
                            <textarea class="form-control" required placeholder="ที่อยู่" name="cus_add"
                                row="3"></textarea>
                            <br>
                            เบอร์โทรศัพท์
                            <input type="number" name="cus_tel" class="form-control" required
                                placeholder="เบอร์โทรศัพท์"> <br>
                            อัปโหลดหลักฐานชำระเงิน
                            <input type="file" name="slip" class="form-control" required
                                placeholder="อัปโหลดหลักฐานชำระเงิน">
                            <br>
                            <br><br><br>
                        </div>
                        <div class="col-md-4 mt-2">

                            <div class="card" style="width: 18rem;">
                                <img src="image/slip1.jpg">
                                <div class="alert alert-info text-center" h4 role="alert">แสกน Qrcode เพื่อชำระเงิน
                                </div>
                            </div>
                        </div>
                </form>
                <button type="submit" class="btn btn-outline-success"
                    style="margin-bottom: 20px;">ยืนยันการสั่งซื้อ</button>
            </div>
</body>

</html>