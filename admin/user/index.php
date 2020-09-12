<?php include 'header.php'; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-2">
            <a href="../" class="text-decoration-none">
                <button class="btn btn-sm btn-primary"><i class="fas fa-chevron-left"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-users"></i> จัดการผู้ใช้</h1>
            <hr>
        </div>
        <div class="col-md-6 col-sm-12">
            <p>รายชื่อผู้ใช้<?php echo $title . ' | ' . $school; ?></p>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right">
            <a href="add.php" class="text-decoration-none">
                <button class="btn btn-success btn-block"><i class="fas fa-user-plus"></i> เพิ่มผู้ใช้</button>
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th width=100>#</th>
                <th width=100>ระดับชั้น</th>
                <th width=100>ห้อง</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>สกุล</th>
                <th>ตำแหน่ง</th>
                <th>เข้าสู่ระบบครั้งสุดท้าย</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include '../../include/user_q.php'; ?>
        </tbody>
        <thead>
            <tr>
                <th width=100>#</th>
                <th width=100>ระดับชั้น</th>
                <th width=100>ห้อง</th>
                <th>คำนำหน้า</th>
                <th>ชื่อ</th>
                <th>สกุล</th>
                <th>ตำแหน่ง</th>
                <th>เข้าสู่ระบบครั้งสุดท้าย</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <div class="row my-3">
        <div class="col-12">
            <a href="../" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>
