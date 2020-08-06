<?php
include './header.php'; ?>
<div class="container">
    <?php if(date("H") >= 9) header("location: timeout.php"); ?>
    <form action="../include/submission.php" method="post">
        <div class="row my-3 bg-light rounded shadow-lg">
            <div class="col-12">
                <h2 class="text-center">ลงข้อมูลประจำ<?php echo thai_date(
                                                            time(),
                                                        ); ?></h2 class="text-center">
            </div>
            <div class="col-12 bg-danger text-white p-2">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-center text-md-right">
                        <label class="h2" for="group">เลือกกลุ่มเลขที่</label>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <?php include '../include/show_group.php'; ?>
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
                            <div class="col font-weight-bolder text-center"><img src="../img/leave.svg" alt=""> = ลา</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/absent.svg" alt=""> = ขาด</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/late.svg" alt=""> = สายโฮมรูม</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/สายรร.svg" alt=""> = สายรร.</div>
                            <div class="col font-weight-bolder text-center"><img src="../img/activity.svg" alt=""> = กิจกรรม</div>

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

                </div>
                <!-- End All Table -->
                <script>
                    function showTable(obj) {

                        if (obj.checked) {
                            document.getElementById("stdTable").innerHTML = "";
                        } else {

                            var level = <?php echo $_SESSION['level']; ?>;
                            var classroom = <?php echo $_SESSION['room']; ?>;
                            var no_type = document.querySelector('#group').value;

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
                            xmlhttp.open("GET", "../include/std_name_show.php?level=" + level + "&room=" + classroom + "&no_type=" + no_type, true);
                            xmlhttp.send();
                        }
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
<?php include './footer.php'; ?>