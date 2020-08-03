<?php include './header.php'; ?>
<div class="container overflow-hidden h-100 d-flex">
    <div class="row justify-content-center py-auto text-center align-self-center">
        <div class="col-xl-4 col-md-8 col-sm-12 bg-light rounded-lg shadow-lg p-4">
            <form>
                <img class="mb-4" src="img/logo.png" alt="Logo" width="100" height="100">
                <h1 class="h4 mb-3 font-weight-normal">เข้าสู่ระบบ <br><?php echo $title; ?></h1>
                <label for="inputEmail" class="sr-only">ชื่อผู้ใช้</label>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="inputEmail" class="form-control" placeholder="ชื่อผู้ใช้" required autofocus>
                </div>
                <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" required>
                </div>
                <button class="btn btn-lg btn-danger btn-block my-3" type="submit">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>

</div>
<?php include './footer.php'; ?>