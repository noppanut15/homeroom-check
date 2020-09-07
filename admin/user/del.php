<?php include 'header.php'; ?>
<?php include '../../include/user_meta_q.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-user-minus"></i> ลบบัญชีผู้ใช้</h1>
            <hr>
        </div>
        <div class="col-12 text-center">
            <h2>ยืนยันการลบ</h2>
        </div>
        <div class="col-12 text-center">
            <h3 class="h1"><?php echo $gender .
                '' .
                $name .
                '  ' .
                $lastname; ?></h3>
        </div>
    </div>
    <form action="" method="post" class="row g-2">
        <div class="col-md-6 col-sm-12">
            <button class="btn btn-success btn-lg btn-block" type="submit" name="confirm" value="1">ยืนยัน</button>
        </div>
        <div class="col-md-6 col-sm-12">
            <button class="btn btn-danger btn-lg btn-block" type="submit" name="confirm" value="0">ยกเลิก</button>
        </div>
    </form>
    <?php include '../../include/del_q.php'; ?>
</div>
<?php include 'footer.php'; ?>
