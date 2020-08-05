<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-user-plus"></i> เพิ่มบัญชีผู้ใช้</h1>
            <hr>
        </div>
    </div>
    <form method="post" class="row was-validated">
        <h5><i class="fas fa-info-circle"></i> ข้อมูลส่วนตัว</h5>
        <hr>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <label for="gender">คำนำหน้า</label>
                    <input type="text" name="gender" id="gender" class="form-control" required placeholder="คำนำหน้าชื่อ">
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="name">ชื่อ</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="ชื่อ">
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="lastname">สกุล</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required placeholder="สกุล">
                </div>
            </div>
        </div>
        <h5><i class="fas fa-key"></i> สำหรับเข้าใช้งานระบบ</h5>
        <hr>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="username">ชื่อผู้ใช้งาน</label>
                    <input type="text" name="username" id="username" class="form-control" required placeholder="ชื่อผู้ใช้สำหรับเข้าสู่ระบบ">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="รหัสผ่านสำหรับเข้าสู่ระบบ">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="role">ประเภทผู้ใช้</label>
                    <select name="role" id="role" required class="form-select">
                        <option value="" disabled selected>เลือกประเภทผู้ใช้</option>
                        <option value="1">ครูประจำชั้น</option>
                        <option value="99">ผู้ดูแลระบบ</option>
                    </select>
                </div>
            </div>
        </div>
        <h5><i class="fas fa-school"></i> ข้อมูลประจำชั้น</h5>
        <hr>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="level">ระดับชั้น</label>
                    <select name="level" id="level" class="form-select" required>
                        <option value="" disabled selected>เลือกระดับชั้น</option>
                        <option value="0">ไม่ประจำชั้น</option>
                        <option value="1">ม.1</option>
                        <option value="2">ม.2</option>
                        <option value="3">ม.3</option>
                        <option value="4">ม.4</option>
                        <option value="5">ม.5</option>
                        <option value="6">ม.6</option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="room">ระดับชั้น</label>
                    <select name="room" id="room" class="form-select" required>
                        <option value="" disabled selected>เลือกห้อง</option>
                        <option value="0">ไม่ประจำชั้น</option>
                        <option value="1">ห้อง 1</option>
                        <option value="2">ห้อง 2</option>
                        <option value="3">ห้อง 3</option>
                        <option value="4">ห้อง 4</option>
                        <option value="5">ห้อง 5</option>
                        <option value="6">ห้อง 6</option>
                        <option value="7">ห้อง 7</option>
                        <option value="8">ห้อง 8</option>
                        <option value="9">ห้อง 9</option>
                        <option value="10">ห้อง 10</option>
                        <option value="11">ห้อง 11</option>
                        <option value="12">ห้อง 12</option>
                        <option value="13">ห้อง 13</option>
                        <option value="14">ห้อง 14</option>
                    </select>
                </div>
            </div>
        </div>
        <?php include '../../include/add_q.php';?>
        <div class="col-12">
            <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-user-plus"></i> เพิ่มผู้ใช้</button>
        </div>
    </form>
    <div class="row my-3">
        <div class="col-12">
            <a href="./" class="text-decoration-none">
                <button class="btn btn-lg btn-primary btn-block"><i class="fas fa-home"></i> กลับเข้าสู่หน้าจัดการผู้ใช้</button>
            </a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>