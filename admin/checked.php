<?php include 'header.php'; ?>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Datapicker -->
<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker-custom.js"></script>
<script src="../bootstrap-datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-search"></i> ค้นหาห้องที่ไม่ได้บันทึกข้อมูล</h1>
            <hr>
        </div>
    </div>
    <form method="post" class="row my-3 bg-danger text-white p-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center text-md-right">
                    <label for="inputdatepicker" class="h3">เลือกวันที่ที่ต้องการ</label>
                </div>
                <div class="col-md-2 col-sm-12">
                    <input id="inputdatepicker" class="form-control datepicker" name="date" data-date-format="mm-dd-yyyy">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center text-md-right">
                    <label for="level" class="h3">เลือกระดับชั้น</label>
                </div>
                <div class="col-md-2 col-sm-12">
                    <select name="level" id="level" class="form-select">
                        <option value="0">ทั้งหมด</option>
                        <option value="1">ม.1</option>
                        <option value="2">ม.2</option>
                        <option value="3">ม.3</option>
                        <option value="4">ม.4</option>
                        <option value="5">ม.5</option>
                        <option value="6">ม.6</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 my-1">
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-search"></i> ค้นหา</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
    <?php include '../include/checked_q.php'; ?>

    </div>
    <div class="row my-3">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
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
<?php include 'footer.php'; ?>