<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Notify</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6"> 
<form method="POST" action="insert_lineNotify.php"> 
    <br>   
    <h4>แจ้งเตือนผ่าน Line Notify</h4>
    <br>

    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success'] ;
        unset($_SESSION['success']);
    ?>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['error'] ;
        unset($_SESSION['error']);
    ?>
        </div>
    <?php } ?>
    <br>







Name - Surname:
<input type="text" name="pname" class="form-control" required placeholder="Name - Surname"> <br>
e-mail:
<input type="email" name="email" class="form-control" required placeholder="name@example.com"> <br>
Address:
<textarea class="form-control" required name="address" rows="3"  placeholder="Address"></textarea>

<button type="submit" name="submit" class="btn btn-primary mt-4">submit</button>
</form>

    </div>
    
</body>
</html>
