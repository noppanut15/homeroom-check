<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-eraser"></i> ล้างประวัติการไม่เข้าร่วมกิจกรรมโฮมรูม</h1>
            <hr>
        </div>
        <div class="col-12 text-center mb-2">
            <p class="h4">ข้อมูลที่จะถูกลบ ได้แก่</p>
            <p class="h4 text-danger font-weight-bolder">ประวัตินักเรียนที่ไม่เข้ากิจกรรมโฮมรูมทั้งหมด</p>
        </div>
        <form method="POST" class="row my-3">
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <label class="h4" for="password">ยืนยันรหัสผ่าน</label>
            </div>
            <div class="col-md-2 col-sm-12">
                <input type="password" id="password" name="password" required autofocus>
            </div>
            <div class="col-12 mt-4">
                <button class="btn btn-danger btn-lg btn-block" type="submit" name="submit" value="submit"><i class="fas fa-eraser"></i> ลบข้อมูล</button>
            </div>
        </form>
    </div>
    <?php include '../include/truncate_q.php'; ?>
    <div class="row my-3">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>