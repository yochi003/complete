<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    header('location:login_am.php');
}
include 'condb.php';

// if(isset($_SESSION['userid'])){
//     $cusid = $_SESSION['userid'];
//     $sql = "SELECT * FROM customer WHERE customer_id = '$cusid'";
//     $result = mysqli_query($conn,$sql);
//     $rs = mysqli_fetch_array($result);
// }
// $cusid = (isset($_GET['id'])) ? $_GET['id'] : '';
// $sql = "SELECT * FROM customer WHERE customer_id='$cusid' ";
// $result= mysqli_query($conn,$sql);
// $rs=mysqli_fetch_array($result);
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
</head>

<body>
    <?php
    include 'menu1.php';
    ?>
    <div class="container-fluid px-4">
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="h2 mb-4 mt-4">
                                <b> แก้ไขข้อมูลส่วนตัว </b>
                            </div>
                            <?php
                            include 'condb.php';
                            if (isset($_SESSION['adminid'])) {
                                $id = $_SESSION['adminid'];
                                $sql = "SELECT * FROM admin WHERE admin_id = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $am = mysqli_fetch_array($result);
                            }
                            ?>
                            <form name="form1" method="post" action="adedit_profile.php">
                                <label> รหัส</label>
                                <input type="text" name="admin_id" class="form-control" readonly
                                    value="<?php echo $am['admin_id'] ?>">
                                <label> ชื่อ</label>
                                <input type="text" name="ad_name" class="form-control" value="<?php echo $am['ad_name'] ?>">
                                <label> นามสกุล </label>
                                <input type="text" name="ad_surname" class="form-control"
                                    value="<?php echo $am['ad_surname'] ?>"> <br>
                                <label> ชื่อผู้ใช้ </label>
                                <input type="text" name="admin_username" class="form-control" readonly
                                    value="<?php echo $am['admin_username'] ?>"> <br>
                                <label> รหัสผ่าน </label>
                                <input type="password" name="admin_password" class="form-control"
                                    value="<?php echo $am['admin_password'] ?>"> <br>
                                <label> อีเมล </label>
                                <input type="text" name="email" class="form-control" value="<?php echo $am['email'] ?>">
                                <br>
                                <label> เบอร์โทรศัพท์ </label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $am['phone'] ?>">
                                <br>
                                <button type="submit" class="btn btn-warning">แก้ไข</button>
                                <a class="btn btn-danger" href="index.php" role="button">ยกเลิก</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php' ?>
</body>

</html>