<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-danger text-center" style="font-size: 140px;">
            <i class="fas fa-hourglass-end"></i>
        </div>
        <div class="col-12 text-danger text-center mb-5">
            <h1>ขณะนี้เวลา <?php echo date("H:i:s"); ?></h1>
            <h2>หมดเวลาลงข้อมูล หากต้องการบันทึกข้อมูลประจำวันกรุณาแจ้งผู้ดูแลระบบ</h2>
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
<?php include 'footer.php'; ?>