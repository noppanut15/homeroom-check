<?php include './header.php'; ?>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Datapicker -->
<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker-custom.js"></script>
<script src="../bootstrap-datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<div class="container">
    <div class="row mt-3 text-center">
        <div class="col-12">
            <h1><i class="fas fa-print"></i> รายงานการเข้าร่วมกิจกรรมหน้าเสาธง ห้อง ม. <?php echo $_SESSION[
                'level'
            ] .
                '/' .
                $_SESSION['room']; ?></h1>
        </div>
    </div>
    <form action="report_print.php" method="get" class="row my-3 bg-danger text-white p-2" target="_blank">
        <div class="col-md-6 col-sm-12 text-center text-md-right">
            <p class="h3">เลือกวันที่ที่ต้องการ</p>
        </div>
        <div class="col-md-2 col-sm-12">
            <input id="inputdatepicker" class="form-control datepicker" name="date" data-date-format="mm-dd-yyyy">
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right">
            <p class="h3">เลือกประเภทการเข้าร่วม</p>
        </div>
        <div class="col-md-2 col-sm-12">
            <select name="type" id="type" class="form-select">
                <option value="-1">ทั้งหมด</option>
                <optgroup label="เข้าร่วม">
                    <option value="0">มา</option>
                </optgroup>
                <optgroup label="ไม่เข้าร่วม">
                    <option value="1">ไม่เข้าร่วมทั้งหมด</option>
                    <option value="2">ลา</option>
                    <option value="3">ขาด</option>
                    <option value="4">สายโฮมรูม</option>
                    <option value="5">สายรร.</option>
                    <option value="6">กิจกรรม</option>
                </optgroup>
            </select>
        </div>
        <div class="col-md-12 col-sm-12 my-1">
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-search"></i> ค้นหา</button>
        </div>
    </form>
    <div class="row my-3">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>


    <!-- JQuery Thai Date BY Ratchanon Panmas -->
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayBtn: true,
                language: 'th', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0"); //กำหนดเป็นวันปัจุบัน
        });
    </script>
</div>
<?php include './footer.php';
?>
