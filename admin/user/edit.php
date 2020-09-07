<?php include 'header.php'; ?>
<?php include '../../include/user_meta_q.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 text-center">
            <h1><i class="fas fa-user-edit"></i> แก้ไขข้อมูลบัญชีผู้ใช้</h1>
            <hr>
        </div>
    </div>
    <form method="post" class="row">
        <h5><i class="fas fa-info-circle"></i> ข้อมูลส่วนตัว</h5>
        <hr>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <label for="gender">คำนำหน้า</label>
                    <input type="text" name="gender" id="gender" class="form-control" required placeholder="คำนำหน้าชื่อ" value="<?php echo $gender; ?>">
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="name">ชื่อ</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="ชื่อ" value="<?php echo $name; ?>">
                </div>
                <div class="col-md-5 col-sm-12">
                    <label for="lastname">สกุล</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required placeholder="สกุล" value="<?php echo $lastname; ?>">
                </div>
            </div>
        </div>
        <h5><i class="fas fa-key"></i> สำหรับเข้าใช้งานระบบ</h5>
        <hr>
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="username">ชื่อผู้ใช้งาน</label>
                    <input type="text" name="username" id="username" class="form-control" required placeholder="ชื่อผู้ใช้สำหรับเข้าสู่ระบบ"  value="<?php echo $username; ?>">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="รหัสผ่านสำหรับเข้าสู่ระบบ"  value="<?php echo $password; ?>">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="role">ประเภทผู้ใช้</label>
                    <select name="role" id="role" required class="form-select">
                        <option value="" disabled>เลือกประเภทผู้ใช้</option>
                        <option value="1" <?php if ($role == 1) {
                            echo 'selected';
                        } ?>>ครูประจำชั้น</option>
                        <option value="99" <?php if ($role == 99) {
                            echo 'selected';
                        } ?>>ผู้ดูแลระบบ</option>
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
                        <option value="0" <?php if ($level == 0) {
                            echo 'selected';
                        } ?>>ไม่ประจำชั้น</option>
                        <option value="1" <?php if ($level == 1) {
                            echo 'selected';
                        } ?>>ม.1</option>
                        <option value="2" <?php if ($level == 2) {
                            echo 'selected';
                        } ?>>ม.2</option>
                        <option value="3" <?php if ($level == 3) {
                            echo 'selected';
                        } ?>>ม.3</option>
                        <option value="4" <?php if ($level == 4) {
                            echo 'selected';
                        } ?>>ม.4</option>
                        <option value="5" <?php if ($level == 5) {
                            echo 'selected';
                        } ?>>ม.5</option>
                        <option value="6" <?php if ($level == 6) {
                            echo 'selected';
                        } ?>>ม.6</option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="room">ระดับชั้น</label>
                    <select name="room" id="room" class="form-select" required>
                        <option value="" disabled>เลือกห้อง</option>
                        <option value="0" <?php if ($room == 0) {
                            echo 'selected';
                        } ?>>ไม่ประจำชั้น</option>
                        <option value="1" <?php if ($room == 1) {
                            echo 'selected';
                        } ?>>ห้อง 1</option>
                        <option value="2" <?php if ($room == 2) {
                            echo 'selected';
                        } ?>>ห้อง 2</option>
                        <option value="3" <?php if ($room == 3) {
                            echo 'selected';
                        } ?>>ห้อง 3</option>
                        <option value="4" <?php if ($room == 4) {
                            echo 'selected';
                        } ?>>ห้อง 4</option>
                        <option value="5" <?php if ($room == 5) {
                            echo 'selected';
                        } ?>>ห้อง 5</option>
                        <option value="6" <?php if ($room == 6) {
                            echo 'selected';
                        } ?>>ห้อง 6</option>
                        <option value="7" <?php if ($room == 7) {
                            echo 'selected';
                        } ?>>ห้อง 7</option>
                        <option value="8" <?php if ($room == 8) {
                            echo 'selected';
                        } ?>>ห้อง 8</option>
                        <option value="9" <?php if ($room == 9) {
                            echo 'selected';
                        } ?>>ห้อง 9</option>
                        <option value="10" <?php if ($room == 10) {
                            echo 'selected';
                        } ?>>ห้อง 10</option>
                        <option value="11" <?php if ($room == 11) {
                            echo 'selected';
                        } ?>>ห้อง 11</option>
                        <option value="12" <?php if ($room == 12) {
                            echo 'selected';
                        } ?>>ห้อง 12</option>
                        <option value="13" <?php if ($room == 13) {
                            echo 'selected';
                        } ?>>ห้อง 13</option>
                        <option value="14" <?php if ($room == 14) {
                            echo 'selected';
                        } ?>>ห้อง 14</option>
                    </select>
                </div>
            </div>
        </div>
        <?php include '../../include/edit_q.php'; ?>
        <div class="col-12">
            <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-save"></i> บันทึก</button>
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
