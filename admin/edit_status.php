<?php include 'header.php'; ?>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Datapicker -->
<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<link href="../bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="../bootstrap-datepicker/js/bootstrap-datepicker-custom.js"></script>
<script src="../bootstrap-datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

<script>
    function showClass(str) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("room").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../include/room.php?level=" + str, true);
        xmlhttp.send(); //Send Request
    }
</script>
<div class="container">
    <form action="../include/save.php" method="post">
        <div class="row my-3 bg-light rounded shadow-lg">
            <div class="col-12 bg-danger text-white pt-1">
                <h2 class="text-center">แก้ไขข้อมูล</h2>
            </div>
            <div class="col-12 bg-danger text-white pt-1">
                <div class="row justify-content-center">
                    <div class="col">
                        <h2>ระดับชั้น</h2>
                    </div>
                    <div class="col">
                        <select class="form-control" name="level" id="level" onchange="showClass(this.value)">
                            <option value="" selected disabled>-X-</option>
                            <?php include '../include/level.php'; ?>
                        </select>
                    </div>
                    <div class="col">
                        <h2>ห้อง</h2>
                    </div>
                    <div class="col">
                        <select class="form-control" name="room" id="room">

                        </select>
                    </div>
                    <div class="col">
                        <h2>วันที่</h2>
                    </div>
                    <div class="col">
                        <input id="inputdatepicker date" class="form-control datepicker" name="date" data-date-format="mm-dd-yyyy">
                    </div>
                    <div class="col-12 mb-2">
                        <button type="button" class="btn btn-success btn-lg btn-block" onclick="showTable()">เลือก</button>
                    </div>
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="row">
                    <div class="col-12">
                        <div class="col font-weight-bolder text-center">สัญลักษณ์</div>
                    </div>
                    <div class="col-12 pt-2">
                        <div class="row">
                            <div class="col font-weight-bolder text-center"><img src="../img/leave.svg" alt=""> = ลา (Leave)</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/absent.svg" alt=""> = ขาด (Absent)</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/late.svg" alt=""> = สายแถว (Late)</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/สายรร.svg" alt=""> = สายรร. (School Late)</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/activity.svg" alt=""> = กิจกรรม (Activity)</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start 2nd Section Form Display (Student Table Status Check) -->
        <div class="row my-2 py-3 bg-light rounded" style="overflow-x: hidden;">
            <div class="col-12">
                <!-- Start All Table -->
                <div id="stdTable">
                    <!-- Start Student List -->
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
                <script>
                    function showTable() {

                    

                            var level = document.getElementsByName("level")[0].value;
                            var room = document.getElementsByName("room")[0].value;
                            var date = document.getElementsByName("date")[0].value;

                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else { // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    document.getElementById("stdTable").innerHTML = xmlhttp.responseText;
                                }

                            }
                            xmlhttp.open("GET", "../include/std_name_show_edit.php?level=" + level + "&room=" + room + "&date=" + date, true);
                            xmlhttp.send();
                        
                    }
                </script>
            </div>
        </div>
        <!-- Submission -->
        <div class="row my-2 bg-light rounded-lg shadow-lg p-2">
            <div class="col-12">
                <button type="button" id="check" class="btn btn-lg btn-warning btn-block"><i class="fas fa-check-double"></i> ตรวจสอบข้อมูล</button>
            </div>
            <div class="row" id="showRow">
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-success text-center bg-light rounded" id="showPresent"></div>
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-warning text-center bg-light rounded" id="showLeave"></div>
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-danger text-center bg-light rounded" id="showAbsent"></div>
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-info text-center bg-light rounded" id="showLate"></div>
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-center bg-light rounded" style="color:#bd93f9;" id="showSchoolLate"></div>
                <div class="col-md-2 col-sm-4 h4 font-weight-bolder text-center bg-light rounded" style="color:#ff79c6;" id="showAct"></div>
            </div>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-lg btn-success btn-block " name="submit" onClick="this.form.submit(); this.disabled=true;"><i class="fas fa-save"></i> บันทึก</button>
            </div>
        </div>
    </form>
    <div class="row my-3">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าหลัก</button>
            </a>
        </div>
    </div>

</div>
<script src="../js/conclude.js"></script>




<?php include 'footer.php';
?>
