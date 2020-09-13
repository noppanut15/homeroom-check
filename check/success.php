<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-success text-center" style="font-size: 140px;">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="col-12 text-success text-center mb-5">
            <h2>บันทึกข้อมูลห้อง ม.<?php echo $_SESSION['level'] .
                '/' .
                $_SESSION['room']; ?> สำเร็จ</h2>
        </div>
    </div>
    <div class="row mb-5 mx-5">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>
