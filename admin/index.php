<?php include './header.php'; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 col-sm-12 text-center text-md-left">
            <h1 class="h2"><i class="fas fa-user-shield"></i> หน้าผู้ดูแลระบบ</h1>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right my-auto">
            <h2 class="h5"><i class="fas fa-calendar-day"></i> <?php echo thai_date(
                time()
            ); ?></h2>
        </div>
        <hr>
    </div>
    <h4 class="font-weight-bolder"><i class="fas fa-print"></i> รายงานผล</h4>
    <hr>
    <div class="row row-cols-1 row-cols-md-2 g-2">
        <a href="report.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/021-printer-3.png" alt="Report" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">รายงานผล</h5>
                                <p class="card-text">รายงานข้อมูลการเข้าร่วมกิจกรรมหน้าเสาธง</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="checked.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/037-document.png" alt="Search" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">รายงานห้องที่ไม่ได้บันทึกข้อมูล</h5>
                                <p class="card-text">ค้นหาห้องที่ไม่ได้บันทึกข้อมูล</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="phone.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/phone.png" alt="Search" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">ค้นหาเบอร์โทรผู้ปกครอง</h5>
                                <p class="card-text">ค้นหาเบอร์โทรผู้ปกครองนักเรียนที่มาสาย</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="edit_status.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/pencil.png" alt="Search" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">แก้ไขข้อมูลสถานะนักเรียน</h5>
                                <p class="card-text">แก้ไขข้อมูลสถานะนักเรียน </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="weekly_report.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/pencil.png" alt="Search" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">รายงานข้อมูลรายสัปดาห์</h5>
                                <p class="card-text">รายงานข้อมูลรายสัปดาห์ </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <h4 class="font-weight-bolder"><i class="fas fa-users"></i> จัดการผู้ใช้งาน</h4>
    <hr>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <a href="user" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/001-elearning.png" alt="User" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">จัดการผู้ใช้</h5>
                                <p class="card-text">เพิ่ม ลบ แก้ไขผู้ใช้</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <h4 class="font-weight-bolder"><i class="fas fa-database"></i> จัดการข้อมูล</h4>
    <hr>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <a href="truncate.php" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/227-shredder.png" alt="Shredder" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">ลบประวัติการเข้าร่วมกิจกรรมหน้าเสาธง</h5>
                                <p class="card-text">ล้างฐานข้อมูลที่บันทึกประวัติการเข้าร่วม</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="text-decoration-none text-body">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 p-2 text-center">
                            <img src="../img/012-graduate.png" alt="Student" width="100%" style="max-height: 90px;max-width: 90px;">
                        </div>
                        <div class="col-md-10 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">นำเข้าข้อมูลนักเรียน</h5>
                                <p class="card-text">ทำก่อนเริ่มปีการศึกษาใหม่ <span class="text-danger">(ระบบยังอยู่ระหว่างการพัฒนา)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <form action="" method="post">
                <button class="btn btn-lg btn-block btn-danger" type="submit" name="logout" value="logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
            </form>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
