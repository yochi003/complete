

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Coffee Shop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
                    
            </form>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item text-warning" href="profile_emp.php"><i class="fa-solid fa-user-pen"></i> โปรไฟล์</a></li>
                        <li><a class="dropdown-item text-danger" href="logout_emp.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-house"></i></div>
                                หน้าเเรก
                            </a> 
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        เพิ่มลบแก้ไข
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="fr_product.php">เพิ่มข้อมูลสินค้า</a>
                                        </nav>
                                    </div>   
                            </div>
                            <div class="sb-sidenav-menu-heading">จัดการข้อมูล</div>
                            <a class="nav-link" href="sh_product.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-mug-hot"></i></div>
                                ข้อมูลสินค้า 
                            </a>
                            <a class="nav-link" href="sh_type.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-mug-hot"></i></div>
                                ข้อมูลประเภทสินค้า 
                            </a>
                            <a class="nav-link" href="sh_mat.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-cart-shopping"></i></div>
                                ข้อมูลวัตถุดิบ
                            </a>
                            <a class="nav-link" href="sh_pomo.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-wallet"></i></div>
                                ข้อมูลโปรโมชั่น
                            </a>
                            <a class="nav-link" href="report_order.php">
                                <div class="sb-nav-link-icon text-white"><i class="fa-solid fa-cart-arrow-down"></i></div>
                                ออเดอร์
                            </a>
                            <div class="sb-sidenav-menu-heading">รายงาน</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                                รายงานการขาย
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="show-product2.php">รายงานการขายวัตุดิบ</a>
                                    <a class="nav-link" href="show_product1.php">รายงานสรุปยอดขายตามช่วงเวลา</a>
                                    <a class="nav-link" href="show-product3.php">รายงานการขายทั้งหมด</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                </nav>
            </div>