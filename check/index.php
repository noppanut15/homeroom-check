<?php include './header.php'; ?>
<div class="container">
    <div class="row my-3">
        <div class="col-12">
            <h1 class="text-center"><?php echo $title . '<br>'; ?></h1>
            <h2 class="text-center"><?php echo $eng; ?></h2>
            <h2 class="h3 text-center">ยินดีต้อนรับครูประจำชั้น ห้อง <?php echo $_SESSION[
                'level'
            ] .
                '/' .
                $_SESSION['room']; ?></h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <p class="h4">สถานะ (Status) : <?php include '../include/check_status.php'; ?></p>
        </div>
    </div>
    <div class="row gx-5 gy-5 my-3 pb-4 px-4 bg-light rounded-lg shadow-lg justify-content-center ">
        <div class="col-md-5 mx-md-auto col-sm-12 bg-success rounded-lg p-3 text-center" id="check">
            <img src="../img/164-pencil-5.png" width="100" alt="Check">
            <h2 class="text-white text-center mt-3"><strong>บันทึกข้อมูล<br>Attendance</strong></h2>
        </div>
        <div class="col-md-5 mx-md-auto col-sm-12 bg-warning rounded-lg p-3 text-center" id="report">
            <img src="../img/043-list.png" width="100" alt="Report">
            <h2 class="text-center mt-3"><strong>ดูข้อมูลย้อนหลัง<br>Attendance Report</strong></h2>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <form action="" method="post">
                <button class="btn btn-lg btn-block btn-danger" type="submit" name="logout" value="logout"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ (Logout)</button>
            </form>
        </div>
    </div>
</div>
<script src="../js/check.js"></script>
<?php include './footer.php';
?>
