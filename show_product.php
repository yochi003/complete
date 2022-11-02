<?php 
    include 'condb.php';
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:logout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>หน้าสินค้า</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
    
            </div>
        </nav>
<header class="bg-light py-3">
            <div class="secondary px-4 px-lg-1 my-2">
                <div class="text-center text-dark">
                    <h1 class="display-4 fw-bolder">Coffee Shop </h1>
                     <!-- <p class="lead fw-normal text-dark-50 mb-0">กาแฟของเราเป็นกาแฟที่ดีที่สุดในไทย</p>
                    <img class="img-fluid" src="assets/img/coffee3.png" alt="..." /> -->
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
     <img class="img-fluid" src="./image/pomo3.jpg" alt="..." />
    </div>
    <div class="carousel-item">
     <img class="img-fluid" src="./image/pomo1.jpg" alt="..." />
    </div>
    <div class="carousel-item">
    <img class="img-fluid" src="./image/pomo3.jpg" alt="..." />
</div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </header>
        
<?php
include 'navbar.php';
?>        
<body>
<div class = "container">
        <div class = "row">
            <?php
            $sql = "SELECT * FROM product WHERE amount > 0 ORDER BY pro_id";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){
            ?>
            <div class = "col-sm-3">
                <div class="text-center">
                <img src="admin/image/<?=$row['image']?>" width="300px" height="450" class="mt-5 p-2 my-2 border"> <br>
                ID : <?=$row['pro_id']?><br>
                <b class = "text-success"><?=$row['pro_name']?></b><br>
                ราคา <b class="text-danger"> <?=$row['price']?> </b> บาท <br>
                <a class = "btn btn-outline-success mt-4" href="sh_product_detail.php?id=<?=$row['pro_id']?>">รายละเอียด</a>
                </div>
                <br>
            </div>
            <?php
            } 
            mysqli_close($conn)
            ?>
        </div>
    </div>
     <?php include 'footer.php'; ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
