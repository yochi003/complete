<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bold" href="#!">Coffee Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-secondary" aria-current="page" href="show_product.php"><i class="fa-solid fa-house"></i> หน้าเเรก</a></li>
                        <li class="nav-item"><a class="nav-link active text-secondary" href="history_order.php"><i class="fa-solid fa-briefcase"></i> ประวัติการสั่งซื้อ</a></li>
                        <li class="nav-item"><a class="nav-link active text-secondary" href="cart.php"><i class="fa-solid fa-cart-plus"></i> ตะกร้าสินค้า</a></li>
                        <li class="nav-item"><a class="nav-link active text-secondary" href="pomo_s.php"><i class="fa-solid fa-receipt"></i> โปรโมชั่น</a></li>
                        <li class="nav-item"><a class="nav-link active text-secondary" href="edit_profile.php"><i class="fa-solid fa-user-pen"></i> โปรไฟล์</a></li>
                        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="#">สวัสดีคุณ <?php echo $_SESSION['ctm_name'].'  '.$_SESSION['ctm_sname']?></a></li>
                    </ul>
                    <form class="d-flex">
                    <a class="btn btn-outline-danger" href="logout.php">ออกจากระบบ</a>
                    </form>
                </div>
            </div>
        </nav>