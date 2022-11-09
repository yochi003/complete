<?php 
    include 'condb.php';
    session_start();
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                    <p class="lead fw-normal text-dark-50 mb-0">กาแฟของเราเป็นกาแฟที่ดีที่สุดในไทย</p>
                    <img class="img-fluid" src="assets/img/coffee3.png" alt="..." />
                </div>
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
                <img src="../pomo/<?=$row['image']?>" width="300px" height="450" class="mt-5 p-2 my-2 border"> <br>
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
